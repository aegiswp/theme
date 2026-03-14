<?php
/**
 * Analytics Tracker
 *
 * Outputs analytics tracking scripts on the frontend. All configuration
 * is rendered as inline <script> tags — zero enqueued JS files from the
 * theme. External libraries load with async/defer attributes.
 *
 * Free: GA4, GTM, Clarity, Plausible, Fathom, basic GDPR.
 * Pro:  Matomo, Meta Pixel, Consent Mode v2, Data Layer, Debug Mode.
 *
 * @package Aegis\Analytics
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Analytics;

use function add_action;
use function current_user_can;
use function defined;
use function esc_attr;
use function esc_url;
use function get_option;
use function get_post;
use function get_the_author_meta;
use function get_the_category;
use function is_admin;
use function is_404;
use function is_archive;
use function is_author;
use function is_cart;
use function is_category;
use function is_checkout;
use function is_front_page;
use function is_order_received_page;
use function is_page;
use function is_product;
use function is_search;
use function is_singular;
use function is_tag;
use function is_user_logged_in;
use Aegis\Admin\SettingsRepository;
use function class_exists;
use function function_exists;
use function sanitize_text_field;
use function wp_json_encode;

class Tracker {

	/**
	 * Option name for analytics settings.
	 *
	 * @deprecated Use SettingsRepository::ANALYTICS_OPTION instead.
	 *
	 * @var string
	 */
	public const OPTION = SettingsRepository::ANALYTICS_OPTION;

	/**
	 * Default settings.
	 *
	 * @deprecated Use SettingsRepository::ANALYTICS_DEFAULTS instead.
	 *
	 * @var array<string, mixed>
	 */
	public const DEFAULTS = SettingsRepository::ANALYTICS_DEFAULTS;

	/**
	 * Cached settings.
	 *
	 * @var array|null
	 */
	private ?array $settings = null;

	/**
	 * Script proxy instance.
	 *
	 * @var ScriptProxy
	 */
	private ScriptProxy $proxy;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->proxy = new ScriptProxy();
	}

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public function init(): void {
		if ( is_admin() ) {
			return;
		}

		$this->proxy->init();

		add_action( 'wp_head', [ $this, 'render_dns_prefetch' ], 0 );
		add_action( 'wp_head', [ $this, 'render_head_early' ], 1 );
		add_action( 'wp_head', [ $this, 'render_head_scripts' ], 5 );
		add_action( 'wp_body_open', [ $this, 'render_body_open' ] );
		add_action( 'wp_footer', [ $this, 'render_footer_scripts' ], 20 );
	}

	/**
	 * Get settings (cached).
	 *
	 * @return array
	 */
	public function get_settings(): array {
		if ( $this->settings === null ) {
			$saved          = get_option( self::OPTION, [] );
			$this->settings = is_array( $saved ) ? array_merge( self::DEFAULTS, $saved ) : self::DEFAULTS;
		}

		return $this->settings;
	}

	/**
	 * Check if any analytics are enabled.
	 *
	 * @return bool
	 */
	private function has_any_enabled(): bool {
		$s = $this->get_settings();

		return ! empty( $s['ga4_enabled'] )
			|| ! empty( $s['gtm_enabled'] )
			|| ! empty( $s['clarity_enabled'] )
			|| ! empty( $s['plausible_enabled'] )
			|| ! empty( $s['fathom_enabled'] )
			|| ( $this->is_pro_active() && ! empty( $s['matomo_enabled'] ) )
			|| ( $this->is_pro_active() && ! empty( $s['meta_pixel_enabled'] ) );
	}

	/**
	 * Check if scripts should load on this request.
	 *
	 * @return bool
	 */
	private function should_load(): bool {
		if ( ! $this->has_any_enabled() ) {
			return false;
		}

		// Skip for admin users (unless debug mode is on).
		$s = $this->get_settings();
		if ( current_user_can( 'manage_options' ) && empty( $s['gdpr_debug_mode'] ) ) {
			return false;
		}

		// Respect Do Not Track header.
		if ( ! empty( $s['gdpr_respect_dnt'] ) ) {
			$dnt = sanitize_text_field( $_SERVER['HTTP_DNT'] ?? '' );
			if ( $dnt === '1' ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Check if Aegis Pro plugin is active.
	 *
	 * @return bool
	 */
	private function is_pro_active(): bool {
		return defined( 'AEGIS_PRO_VERSION' );
	}

	/**
	 * Check if Complianz integration is active.
	 *
	 * @return bool
	 */
	private function is_complianz_active(): bool {
		$s = $this->get_settings();

		return ! empty( $s['gdpr_complianz'] ) && defined( 'CMPLZ_VERSION' );
	}

	/**
	 * Get the script type attribute for Complianz integration.
	 *
	 * @param string $service Complianz service name.
	 *
	 * @return string 'text/javascript' or 'text/plain' when Complianz manages consent.
	 */
	private function get_script_type( string $service = 'statistics' ): string {
		if ( $this->is_complianz_active() && ! empty( $this->get_settings()['gdpr_consent_required'] ) ) {
			return 'text/plain';
		}

		return 'text/javascript';
	}

	/**
	 * Get Complianz data attributes for a script tag.
	 *
	 * @param string $service  Complianz service name (e.g., 'google-analytics').
	 * @param string $category Complianz category (default: 'statistics').
	 *
	 * @return string HTML attributes string.
	 */
	private function get_complianz_attrs( string $service, string $category = 'statistics' ): string {
		if ( ! $this->is_complianz_active() || empty( $this->get_settings()['gdpr_consent_required'] ) ) {
			return '';
		}

		return ' data-service="' . esc_attr( $service ) . '" data-category="' . esc_attr( $category ) . '"';
	}

	// -------------------------------------------------------------------------
	// DNS Prefetch (wp_head priority 0)
	// -------------------------------------------------------------------------

	/**
	 * Output DNS prefetch hints for enabled external domains.
	 *
	 * @return void
	 */
	public function render_dns_prefetch(): void {
		if ( ! $this->should_load() ) {
			return;
		}

		$s       = $this->get_settings();
		$domains = [];

		// GA4/GTM — only prefetch if NOT loading locally.
		if ( ! empty( $s['local_scripts'] ) ) {
			// Local scripts — no prefetch needed for Google.
		} else {
			if ( ! empty( $s['ga4_enabled'] ) && ! empty( $s['ga4_measurement_id'] ) ) {
				$domains[] = '//www.googletagmanager.com';
			}
			if ( ! empty( $s['gtm_enabled'] ) && ! empty( $s['gtm_container_id'] ) ) {
				$domains[] = '//www.googletagmanager.com';
			}
		}

		// Clarity.
		if ( ! empty( $s['clarity_enabled'] ) && ! empty( $s['clarity_project_id'] ) ) {
			$domains[] = '//www.clarity.ms';
		}

		// Plausible (unless custom URL).
		if ( ! empty( $s['plausible_enabled'] ) && ! empty( $s['plausible_domain'] ) && empty( $s['plausible_script_url'] ) ) {
			$domains[] = '//plausible.io';
		}

		// Fathom.
		if ( ! empty( $s['fathom_enabled'] ) && ! empty( $s['fathom_site_id'] ) ) {
			$domains[] = '//cdn.usefathom.com';
		}

		// Meta Pixel (Pro).
		if ( $this->is_pro_active() && ! empty( $s['meta_pixel_enabled'] ) && ! empty( $s['meta_pixel_id'] ) ) {
			$domains[] = '//connect.facebook.net';
		}

		$domains = array_unique( $domains );

		foreach ( $domains as $domain ) {
			echo '<link rel="dns-prefetch" href="' . esc_attr( $domain ) . '">' . "\n";
		}
	}

	// -------------------------------------------------------------------------
	// Head Early (wp_head priority 1)
	// -------------------------------------------------------------------------

	/**
	 * Output early head scripts: Consent Mode v2 defaults, Data Layer.
	 *
	 * @return void
	 */
	public function render_head_early(): void {
		if ( ! $this->should_load() ) {
			return;
		}

		$s = $this->get_settings();

		// PRO: GA4 Consent Mode v2 denied defaults — must be before any gtag call.
		if ( $this->is_pro_active() && ! empty( $s['ga4_consent_mode'] ) && ! empty( $s['ga4_enabled'] ) && ! empty( $s['ga4_measurement_id'] ) ) {
			$this->render_consent_defaults();
		}

		// PRO: GTM Data Layer population — must be before GTM loads.
		if ( $this->is_pro_active() && ! empty( $s['gtm_data_layer'] ) && ! empty( $s['gtm_enabled'] ) && ! empty( $s['gtm_container_id'] ) ) {
			$this->render_data_layer();
		}
	}

	// -------------------------------------------------------------------------
	// Head Scripts (wp_head priority 5)
	// -------------------------------------------------------------------------

	/**
	 * Output head scripts: GA4, GTM.
	 *
	 * @return void
	 */
	public function render_head_scripts(): void {
		if ( ! $this->should_load() ) {
			return;
		}

		$s = $this->get_settings();

		// GA4.
		if ( ! empty( $s['ga4_enabled'] ) && ! empty( $s['ga4_measurement_id'] ) ) {
			$this->render_ga4();
		}

		// GTM head snippet.
		if ( ! empty( $s['gtm_enabled'] ) && ! empty( $s['gtm_container_id'] ) ) {
			$this->render_gtm_head();
		}
	}

	// -------------------------------------------------------------------------
	// Body Open (wp_body_open)
	// -------------------------------------------------------------------------

	/**
	 * Output body open scripts: GTM noscript iframe.
	 *
	 * @return void
	 */
	public function render_body_open(): void {
		if ( ! $this->should_load() ) {
			return;
		}

		$s = $this->get_settings();

		if ( ! empty( $s['gtm_enabled'] ) && ! empty( $s['gtm_container_id'] ) ) {
			$this->render_gtm_body();
		}
	}

	// -------------------------------------------------------------------------
	// Footer Scripts (wp_footer priority 20)
	// -------------------------------------------------------------------------

	/**
	 * Output footer scripts: Clarity, Plausible, Fathom, Matomo, Meta Pixel, Debug.
	 *
	 * @return void
	 */
	public function render_footer_scripts(): void {
		if ( ! $this->should_load() ) {
			return;
		}

		$s = $this->get_settings();

		// FREE: Clarity.
		if ( ! empty( $s['clarity_enabled'] ) && ! empty( $s['clarity_project_id'] ) ) {
			$this->render_clarity();
		}

		// FREE: Plausible.
		if ( ! empty( $s['plausible_enabled'] ) && ! empty( $s['plausible_domain'] ) ) {
			$this->render_plausible();
		}

		// FREE: Fathom.
		if ( ! empty( $s['fathom_enabled'] ) && ! empty( $s['fathom_site_id'] ) ) {
			$this->render_fathom();
		}

		// PRO: Matomo.
		if ( $this->is_pro_active() && ! empty( $s['matomo_enabled'] ) && ! empty( $s['matomo_url'] ) && ! empty( $s['matomo_site_id'] ) ) {
			$this->render_matomo();
		}

		// PRO: Meta Pixel.
		if ( $this->is_pro_active() && ! empty( $s['meta_pixel_enabled'] ) && ! empty( $s['meta_pixel_id'] ) ) {
			if ( $this->should_load_meta_pixel() ) {
				$this->render_meta_pixel();
			}
		}

		// PRO: Debug Mode.
		if ( $this->is_pro_active() && ! empty( $s['gdpr_debug_mode'] ) && current_user_can( 'manage_options' ) ) {
			$this->render_debug();
		}
	}

	// =========================================================================
	// FREE Provider Renderers
	// =========================================================================

	/**
	 * Render GA4 tracking code.
	 *
	 * @return void
	 */
	private function render_ga4(): void {
		$s   = $this->get_settings();
		$id  = esc_attr( $s['ga4_measurement_id'] );
		$url = $this->get_ga4_script_url();

		$type   = $this->get_script_type();
		$cmplz  = $this->get_complianz_attrs( 'google-analytics' );

		// External library — async.
		echo '<script type="' . $type . '" async src="' . esc_url( $url ) . '"' . $cmplz . '></script>' . "\n";

		// Inline config.
		$anon = ! empty( $s['ga4_anonymize_ip'] ) ? "'anonymize_ip':true" : '';
		$config = $anon ? ",{" . $anon . "}" : '';

		echo '<script type="' . $type . '"' . $cmplz . '>' . "\n";
		echo "window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','" . $id . "'" . $config . ");\n";
		echo '</script>' . "\n";
	}

	/**
	 * Get the GA4 script URL (local proxy or CDN).
	 *
	 * @return string
	 */
	private function get_ga4_script_url(): string {
		$s = $this->get_settings();

		if ( ! empty( $s['local_scripts'] ) && $this->proxy->has_local( 'gtag' ) ) {
			return $this->proxy->get_script_url( 'gtag', $s['ga4_measurement_id'] );
		}

		return $this->proxy->get_cdn_url( 'gtag', $s['ga4_measurement_id'] );
	}

	/**
	 * Render GTM head snippet.
	 *
	 * @return void
	 */
	private function render_gtm_head(): void {
		$s  = $this->get_settings();
		$id = esc_attr( $s['gtm_container_id'] );

		$type  = $this->get_script_type();
		$cmplz = $this->get_complianz_attrs( 'google-tag-manager' );

		$url = $this->get_gtm_script_url();

		echo '<script type="' . $type . '"' . $cmplz . '>' . "\n";
		echo "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='" . esc_url( $url ) . "';f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . $id . "');\n";
		echo '</script>' . "\n";
	}

	/**
	 * Get the GTM script URL (local proxy or CDN).
	 *
	 * @return string
	 */
	private function get_gtm_script_url(): string {
		$s = $this->get_settings();

		if ( ! empty( $s['local_scripts'] ) && $this->proxy->has_local( 'gtm' ) ) {
			return $this->proxy->get_script_url( 'gtm', $s['gtm_container_id'] );
		}

		return $this->proxy->get_cdn_url( 'gtm', $s['gtm_container_id'] );
	}

	/**
	 * Render GTM noscript iframe (body open).
	 *
	 * @return void
	 */
	private function render_gtm_body(): void {
		$s  = $this->get_settings();
		$id = esc_attr( $s['gtm_container_id'] );

		echo '<noscript><iframe src="' . esc_url( 'https://www.googletagmanager.com/ns.html?id=' . $id ) . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . "\n";
	}

	/**
	 * Render Microsoft Clarity snippet.
	 *
	 * @return void
	 */
	private function render_clarity(): void {
		$s   = $this->get_settings();
		$pid = esc_attr( $s['clarity_project_id'] );

		$type  = $this->get_script_type();
		$cmplz = $this->get_complianz_attrs( 'clarity' );

		echo '<script type="' . $type . '"' . $cmplz . '>' . "\n";
		echo "(function(c,l,a,r,i,t,y){c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};t=l.createElement(r);t.async=1;t.src='https://www.clarity.ms/tag/'+i;y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);})(window,document,'clarity','script','" . $pid . "');\n";
		echo '</script>' . "\n";
	}

	/**
	 * Render Plausible Analytics script tag.
	 *
	 * @return void
	 */
	private function render_plausible(): void {
		$s      = $this->get_settings();
		$domain = esc_attr( $s['plausible_domain'] );

		$script_url = ! empty( $s['plausible_script_url'] )
			? $s['plausible_script_url']
			: 'https://plausible.io/js/script.js';

		$type  = $this->get_script_type();
		$cmplz = $this->get_complianz_attrs( 'plausible' );

		echo '<script type="' . $type . '" async defer data-domain="' . $domain . '" src="' . esc_url( $script_url ) . '"' . $cmplz . '></script>' . "\n";
	}

	/**
	 * Render Fathom Analytics script tag.
	 *
	 * @return void
	 */
	private function render_fathom(): void {
		$s       = $this->get_settings();
		$site_id = esc_attr( $s['fathom_site_id'] );

		$type  = $this->get_script_type();
		$cmplz = $this->get_complianz_attrs( 'fathom' );

		echo '<script type="' . $type . '" src="https://cdn.usefathom.com/script.js" data-site="' . $site_id . '" defer' . $cmplz . '></script>' . "\n";
	}

	// =========================================================================
	// PRO Provider Renderers
	// =========================================================================

	/**
	 * Render GA4 Consent Mode v2 denied defaults (head priority 1).
	 *
	 * @return void
	 */
	private function render_consent_defaults(): void {
		echo '<script>' . "\n";
		echo "window.dataLayer=window.dataLayer||[];\n";
		echo "function gtag(){dataLayer.push(arguments);}\n";
		echo "gtag('consent','default',{'analytics_storage':'denied','ad_storage':'denied','ad_user_data':'denied','ad_personalization':'denied'});\n";
		echo '</script>' . "\n";
	}

	/**
	 * Render GTM Data Layer population (head priority 1, before GTM).
	 *
	 * @return void
	 */
	private function render_data_layer(): void {
		$data = [
			'pageType' => $this->get_page_type(),
		];

		if ( is_singular() ) {
			$post = get_post();
			if ( $post ) {
				$data['postType']   = $post->post_type;
				$data['postId']     = $post->ID;
				$data['postAuthor'] = get_the_author_meta( 'display_name', $post->post_author );

				$categories = get_the_category( $post->ID );
				if ( ! empty( $categories ) ) {
					$data['postCategory'] = $categories[0]->name;
				}
			}
		}

		$data['userLoggedIn'] = is_user_logged_in();

		echo '<script>' . "\n";
		echo 'window.dataLayer=window.dataLayer||[];dataLayer.push(' . wp_json_encode( $data ) . ');' . "\n";
		echo '</script>' . "\n";
	}

	/**
	 * Render Matomo tracking code.
	 *
	 * @return void
	 */
	private function render_matomo(): void {
		$s       = $this->get_settings();
		$url     = rtrim( $s['matomo_url'], '/' );
		$site_id = esc_attr( $s['matomo_site_id'] );
		$anon    = ! empty( $s['matomo_anonymize_ip'] );

		$type  = $this->get_script_type();
		$cmplz = $this->get_complianz_attrs( 'matomo' );

		echo '<script type="' . $type . '"' . $cmplz . '>' . "\n";
		echo "var _paq=window._paq=window._paq||[];\n";
		if ( $anon ) {
			echo "_paq.push(['setDoNotTrack',true]);\n";
		}
		echo "_paq.push(['trackPageView']);\n";
		echo "_paq.push(['enableLinkTracking']);\n";
		echo "(function(){var u='" . esc_url( $url ) . "/';\n";
		echo "_paq.push(['setTrackerUrl',u+'matomo.php']);\n";
		echo "_paq.push(['setSiteId','" . $site_id . "']);\n";
		echo "var d=document,g=d.createElement('script'),s=d.getElementsByTagName('script')[0];\n";
		echo "g.async=true;g.src=u+'matomo.js';s.parentNode.insertBefore(g,s);})();\n";
		echo '</script>' . "\n";
	}

	/**
	 * Render Meta Pixel (Facebook Pixel) base code.
	 *
	 * @return void
	 */
	private function render_meta_pixel(): void {
		$s        = $this->get_settings();
		$pixel_id = esc_attr( $s['meta_pixel_id'] );

		$type  = $this->get_script_type();
		$cmplz = $this->get_complianz_attrs( 'facebook' );

		echo '<script type="' . $type . '"' . $cmplz . '>' . "\n";
		echo "!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');\n";
		echo "fbq('init','" . $pixel_id . "');\n";
		echo "fbq('track','PageView');\n";
		echo '</script>' . "\n";
		echo '<noscript><img height="1" width="1" style="display:none" src="' . esc_url( 'https://www.facebook.com/tr?id=' . $pixel_id . '&ev=PageView&noscript=1' ) . '"/></noscript>' . "\n";

		// WooCommerce events.
		if ( ! empty( $s['meta_pixel_woo_events'] ) && class_exists( 'WooCommerce' ) ) {
			$this->render_meta_pixel_woo_events();
		}
	}

	/**
	 * Render Meta Pixel WooCommerce event tracking.
	 *
	 * @return void
	 */
	private function render_meta_pixel_woo_events(): void {
		$events = '';

		if ( function_exists( 'is_product' ) && is_product() ) {
			$product = wc_get_product();
			if ( $product ) {
				$events .= "fbq('track','ViewContent',{content_name:" . wp_json_encode( $product->get_name() ) . ",content_ids:['" . esc_attr( $product->get_id() ) . "'],content_type:'product',value:" . $product->get_price() . ",currency:'" . esc_attr( get_woocommerce_currency() ) . "'});\n";
			}
		}

		if ( function_exists( 'is_cart' ) && is_cart() ) {
			$events .= "fbq('track','AddToCart');\n";
		}

		if ( function_exists( 'is_checkout' ) && is_checkout() && ! is_order_received_page() ) {
			$events .= "fbq('track','InitiateCheckout');\n";
		}

		if ( function_exists( 'is_order_received_page' ) && is_order_received_page() ) {
			$events .= "fbq('track','Purchase');\n";
		}

		if ( $events ) {
			$type  = $this->get_script_type();
			$cmplz = $this->get_complianz_attrs( 'facebook' );
			echo '<script type="' . $type . '"' . $cmplz . '>' . "\n" . $events . '</script>' . "\n";
		}
	}

	/**
	 * Render admin-only debug console wrapper.
	 *
	 * @return void
	 */
	private function render_debug(): void {
		$s = $this->get_settings();

		$providers = [];
		if ( ! empty( $s['ga4_enabled'] ) )      $providers[] = 'GA4';
		if ( ! empty( $s['gtm_enabled'] ) )      $providers[] = 'GTM';
		if ( ! empty( $s['clarity_enabled'] ) )   $providers[] = 'Clarity';
		if ( ! empty( $s['plausible_enabled'] ) ) $providers[] = 'Plausible';
		if ( ! empty( $s['fathom_enabled'] ) )    $providers[] = 'Fathom';
		if ( ! empty( $s['matomo_enabled'] ) )    $providers[] = 'Matomo';
		if ( ! empty( $s['meta_pixel_enabled'] ) ) $providers[] = 'Meta Pixel';

		echo '<script>' . "\n";
		echo "console.log('%c[Aegis Analytics Debug]','color:#3b82f6;font-weight:bold','Active providers:','" . implode( ', ', $providers ) . "');\n";
		echo "console.log('%c[Aegis Analytics Debug]','color:#3b82f6;font-weight:bold','Consent required:'," . ( ! empty( $s['gdpr_consent_required'] ) ? 'true' : 'false' ) . ",'Complianz:'," . ( $this->is_complianz_active() ? 'true' : 'false' ) . ",'Local scripts:'," . ( ! empty( $s['local_scripts'] ) ? 'true' : 'false' ) . ");\n";
		echo '</script>' . "\n";
	}

	// =========================================================================
	// Helpers
	// =========================================================================

	/**
	 * Check if Meta Pixel should load on this page.
	 *
	 * Only loads on WooCommerce-relevant pages when WooCommerce is active.
	 *
	 * @return bool
	 */
	private function should_load_meta_pixel(): bool {
		// Load on all pages — PageView is always useful. WooCommerce events are additive.
		return true;
	}

	/**
	 * Get the current page type for Data Layer.
	 *
	 * @return string
	 */
	private function get_page_type(): string {
		if ( is_front_page() ) return 'home';
		if ( is_singular( 'post' ) ) return 'post';
		if ( is_page() ) return 'page';
		if ( is_category() ) return 'category';
		if ( is_tag() ) return 'tag';
		if ( is_author() ) return 'author';
		if ( is_search() ) return 'search';
		if ( is_archive() ) return 'archive';
		if ( is_404() ) return '404';
		if ( function_exists( 'is_shop' ) && is_shop() ) return 'shop';
		if ( function_exists( 'is_product' ) && is_product() ) return 'product';
		if ( function_exists( 'is_product_category' ) && is_product_category() ) return 'product_category';
		if ( function_exists( 'is_cart' ) && is_cart() ) return 'cart';
		if ( function_exists( 'is_checkout' ) && is_checkout() ) return 'checkout';

		return 'other';
	}

	/**
	 * Get the ScriptProxy instance.
	 *
	 * @return ScriptProxy
	 */
	public function get_proxy(): ScriptProxy {
		return $this->proxy;
	}
}
