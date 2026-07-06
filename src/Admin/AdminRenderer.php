<?php
/**
 * Admin Renderer
 *
 * All admin page render methods and reusable UI component helpers
 * for the Aegis settings dashboard.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Admin Renderer class.
 */
class AdminRenderer {

	/**
	 * Aegis brand mark as a data URI for wp-admin menu registration.
	 */
	public const BRAND_ICON_DATA_URI = 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIGZpbGw9ImN1cnJlbnRDb2xvciIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMC4wNiA3Ljc1IEwxMi4wMiAzLjg3IEwxMy45NSA3LjcyIEwxNi42NSA5LjI5IEwxMi4wMyAwIEw3LjM0IDkuMyBMMTAuMDYgNy43NSBaIE0xOC4zNyAxMi43MiBMMTguMiAxMi4zNiBMMTUuNSAxMC43OSBMMTcuMDIgMTMuNjggTDIwLjA1IDE4LjYxIEwxMi4wMiAxNS4xNyBMMy45OCAxOC42MiBMNi45NiAxMy42OCBMOC4zOSAxMC44MSBMNS42NyAxMi4zOSBMNS41IDEyLjcxIEwwIDIyLjg3IEwxMi4wMSAxNi44NyBMMjQgMjIuOTQgTDE4LjM3IDEyLjcyIFoiLz48L3N2Zz4=';

	/**
	 * Output the inline Aegis brand mark SVG.
	 *
	 * @param int $size Icon width and height in pixels.
	 * @return void
	 */
	public static function render_brand_icon( int $size = 24 ): void {
		?>
		<span class="aegis-brand-icon" aria-hidden="true">
			<svg viewBox="0 0 24 24" width="<?php echo esc_attr( (string) $size ); ?>" height="<?php echo esc_attr( (string) $size ); ?>" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z"/>
			</svg>
		</span>
		<?php
	}

	/**
	 * Render the top header bar with logo and links.
	 *
	 * @return void
	 */
	public function render_top_bar(): void {
		?>
		<div class="aegis-top-bar">
			<div class="aegis-top-bar-left">
				<div class="aegis-top-bar-title">
					<?php self::render_brand_icon( 24 ); ?>
					<span><?php esc_html_e( 'Native Block Framework', 'aegis' ); ?></span>
				</div>
			</div>
			<div class="aegis-top-bar-right">
				<a href="https://github.com/aegiswp/theme" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-editor-code"></span>
					<span><?php esc_html_e( 'GitHub', 'aegis' ); ?></span>
				</a>
				<?php if ( ! $this->is_aegis_pro_active() ) : ?>
				<a href="https://paypal.me/aedonation" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-heart"></span>
					<span><?php esc_html_e( 'Donate', 'aegis' ); ?></span>
				</a>
				<?php endif; ?>
				<a href="https://www.facebook.com/groups/aegiswp" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-groups"></span>
					<span><?php esc_html_e( 'Support', 'aegis' ); ?></span>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * Render the page tabs navigation.
	 *
	 * @param string $active_tab The currently active tab.
	 * @return void
	 */
	public function render_page_tabs( string $active_tab = 'dashboard' ): void {
		$tabs = array(
			'dashboard' => array(
				'label' => __( 'Dashboard', 'aegis' ),
				'url'   => admin_url( 'admin.php?page=aegis-dashboard' ),
			),
		);

		$tabs = apply_filters( 'aegis_admin_tabs', $tabs );

		?>
		<div class="aegis-page-tabs" role="tablist">
			<?php foreach ( $tabs as $tab_key => $tab ) : ?>
				<?php
				if ( ! is_array( $tab ) || ! isset( $tab['url'], $tab['label'] ) ) {
					continue;
				}
				?>
				<a href="<?php echo esc_url( $tab['url'] ); ?>"
					class="aegis-page-tab <?php echo $active_tab === $tab_key ? 'active' : ''; ?>"
					role="tab"
					aria-selected="<?php echo $active_tab === $tab_key ? 'true' : 'false'; ?>">
					<?php echo esc_html( $tab['label'] ); ?>
				</a>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Render a toggle control.
	 *
	 * @param string $group   Settings group.
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @param string $icon         Optional dashicon name.
	 * @param string $option_name  Option key for input name (default: conditional logic).
	 * @return void
	 */
	public function render_toggle( string $group, string $key, string $label, string $desc, array $options, string $icon = 'admin-generic', string $option_name = SettingsRepository::OPTION_NAME ): void {
		$name     = $option_name . "[{$group}][{$key}]";
		$defaults = $this->get_conditional_defaults_for_option( $option_name );
		$checked  = $options[ $group ][ $key ] ?? $defaults[ $group ][ $key ];
		?>
		<div class="aegis-toggle-card aegis-toggle-subcard">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr( $icon ); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html( $label ); ?></h3>
					<p><?php echo esc_html( $desc ); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $checked ); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block toggle control.
	 *
	 * @param string $key         Setting key.
	 * @param string $label       Toggle label.
	 * @param string $desc        Toggle description.
	 * @param array  $options     Current options.
	 * @param string $icon        Dashicon name.
	 * @param string $option_name Option name to read defaults from.
	 * @return void
	 */
	public function render_block_toggle( string $key, string $label, string $desc, array $options, string $icon = 'block-default', string $option_name = SettingsRepository::BLOCKS_OPTION ): void {
		$name     = $option_name . "[{$key}]";
		$defaults = $this->get_blocks_defaults_for_option( $option_name );
		$checked  = $options[ $key ] ?? $defaults[ $key ];
		?>
		<div class="aegis-toggle-card">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr( $icon ); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html( $label ); ?></h3>
					<p><?php echo esc_html( $desc ); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $checked ); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block toggle control with features support.
	 *
	 * @param string $key         Setting key.
	 * @param string $label       Toggle label.
	 * @param string $desc        Toggle description.
	 * @param array  $options     Current options.
	 * @param string $icon        Dashicon name.
	 * @param string $option_name Option name to read defaults from.
	 * @return void
	 */
	public function render_block_toggle_with_features( string $key, string $label, string $desc, array $options, string $icon = 'block-default', string $option_name = SettingsRepository::BLOCKS_OPTION ): void {
		$name     = $option_name . "[{$key}]";
		$defaults = $this->get_blocks_defaults_for_option( $option_name );
		$checked  = $options[ $key ] ?? $defaults[ $key ];
		?>
		<div class="aegis-toggle-card aegis-toggle-main">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr( $icon ); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html( $label ); ?></h3>
					<p><?php echo esc_html( $desc ); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $checked ); ?> class="aegis-block-main-toggle">
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block feature toggle control (sub-option).
	 *
	 * @param string $key            Setting key.
	 * @param string $label          Toggle label.
	 * @param string $desc           Toggle description.
	 * @param array  $options        Current options.
	 * @param string $icon           Dashicon name.
	 * @param bool   $is_pro         Whether this is a Pro feature.
	 * @param bool   $force_disabled Force the toggle to be disabled (e.g., when handled by another plugin).
	 * @param string $option_name    Option name to read defaults from.
	 * @return void
	 */
	public function render_block_feature_toggle( string $key, string $label, string $desc, array $options, string $icon = 'admin-generic', bool $is_pro = false, bool $force_disabled = false, string $option_name = SettingsRepository::BLOCKS_OPTION ): void {
		$name        = $option_name . "[{$key}]";
		$defaults    = $this->get_blocks_defaults_for_option( $option_name );
		$checked     = $options[ $key ] ?? $defaults[ $key ] ?? false;
		$has_pro     = $this->is_aegis_pro_active();
		$is_disabled = ( $is_pro && ! $has_pro ) || $force_disabled;

		$classes = 'aegis-toggle-card aegis-toggle-subcard';
		if ( $is_pro && ! $has_pro ) {
			$classes .= ' aegis-pro-feature';
		}
		if ( $is_disabled ) {
			$classes .= ' aegis-toggle-disabled';
		}
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr( $icon ); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3>
						<?php echo esc_html( $label ); ?>
						<?php if ( $is_pro && ! $has_pro ) : ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php echo $has_pro ? esc_html__( 'Pro', 'aegis' ) : esc_html__( 'Pro Feature', 'aegis' ); ?>
							</span>
						<?php endif; ?>
					</h3>
					<p><?php echo esc_html( $desc ); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $checked ); ?> <?php disabled( $is_disabled ); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Check if Aegis Pro plugin is active.
	 *
	 * @return bool
	 */
	public function is_aegis_pro_active(): bool {
		return defined( 'AEGIS_PRO_VERSION' ) || class_exists( 'Aegis_Pro' ) || class_exists( 'AegisPro\\Plugin' );
	}

	/**
	 * Render an integration toggle control.
	 *
	 * @param string $key          Setting key.
	 * @param string $label        Toggle label.
	 * @param string $desc         Toggle description.
	 * @param array  $options      Current options.
	 * @param string $plugin_check Plugin check identifier.
	 * @param string $icon         Dashicon name.
	 * @param string $option_name  Option name to read defaults from.
	 * @return void
	 */
	public function render_integration_toggle( string $key, string $label, string $desc, array $options, string $plugin_check = '', string $icon = 'admin-plugins', string $option_name = SettingsRepository::INTEGRATIONS_OPTION ): void {
		$defaults      = class_exists( '\Aegis\Plugin\Integrations\Settings' )
			? \Aegis\Plugin\Integrations\Settings::INTEGRATION_DEFAULTS
			: ( class_exists( \Aegis\Plugin\Settings\Repository::class )
				? \Aegis\Plugin\Settings\Repository::INTEGRATION_DEFAULTS
				: array() );
		$name          = $option_name . "[{$key}]";
		$checked       = $options[ $key ] ?? $defaults[ $key ];
		$plugin_status = $this->get_plugin_status( $plugin_check );
		$is_installed  = $plugin_status['class'] === 'active';
		$is_enabled    = $is_installed && $checked;
		?>
		<div class="aegis-toggle-card <?php echo ! $is_installed ? 'aegis-toggle-disabled' : ''; ?>">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr( $icon ); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3>
						<?php echo esc_html( $label ); ?>
						<?php if ( $plugin_check ) : ?>
							<span class="aegis-plugin-status <?php echo esc_attr( $plugin_status['class'] ); ?>">
								<?php echo esc_html( $plugin_status['label'] ); ?>
							</span>
						<?php endif; ?>
					</h3>
					<p><?php echo esc_html( $desc ); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="1" <?php checked( $checked ); ?> <?php disabled( ! $is_installed ); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
		// Video Sitemap option for Rank Math - Pro feature.
		if ( $key === 'rank_math' && $is_installed ) :
			$video_sitemap_key     = 'rank_math_video_sitemap';
			$video_sitemap_checked = $options[ $video_sitemap_key ] ?? false;
			$pro_active            = $this->is_aegis_pro_active();
			?>
		<div class="aegis-toggle-suboptions">
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo ! $pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-video-alt3"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e( 'Video Sitemap', 'aegis' ); ?>
							<?php if ( ! $pro_active ) : ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e( 'Pro', 'aegis' ); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e( 'Let Rank Math handle Video Sitemap instead of the Core Video Block. When enabled, the Video Block\'s built-in sitemap is disabled.', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . "[{$video_sitemap_key}]" ); ?>" value="1" <?php checked( $video_sitemap_checked ); ?> <?php disabled( ! $pro_active ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-editor-help"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e( 'FAQ Schema', 'aegis' ); ?></h3>
						<p><?php esc_html_e( 'Let Rank Math handle FAQ Schema for Accordion and Toggle blocks. When enabled, built-in FAQPage markup is suppressed.', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . '[rank_math_faq_schema]' ); ?>" value="1" <?php checked( $options['rank_math_faq_schema'] ?? false ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-calendar-alt"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e( 'Event Schema', 'aegis' ); ?></h3>
						<p><?php esc_html_e( 'Let Rank Math handle Event Schema for the Countdown block. When enabled, built-in Event markup is suppressed.', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . '[rank_math_event_schema]' ); ?>" value="1" <?php checked( $options['rank_math_event_schema'] ?? false ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-location"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e( 'Local Business Schema', 'aegis' ); ?></h3>
						<p><?php esc_html_e( 'Let Rank Math handle Local Business Schema for the Map block. When enabled, built-in LocalBusiness markup is suppressed.', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . '[rank_math_local_schema]' ); ?>" value="1" <?php checked( $options['rank_math_local_schema'] ?? false ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-format-video"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e( 'Video Schema', 'aegis' ); ?></h3>
						<p><?php esc_html_e( 'Let Rank Math handle Video Schema for the Video block. When enabled, built-in VideoObject markup is suppressed.', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . '[rank_math_video_schema]' ); ?>" value="1" <?php checked( $options['rank_math_video_schema'] ?? false ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php endif; ?>
		<?php
		// Co-Authors Plus sub-options â€” only show when the Aegis plugin is active.
		if ( $key === 'co_authors_plus' && defined( 'Aegis\\Plugin\\VERSION' ) ) :
			$pro_active          = $this->is_aegis_pro_active();
			$cap_social_checked  = $options['cap_social_links'] ?? false;
			$cap_roles_checked   = $options['cap_role_badges'] ?? false;
			$cap_pattern_options = get_option( 'aegis_pattern_control', array() );
			$cap_keep_patterns   = $cap_pattern_options['coauthors_keep_patterns'] ?? false;
			?>
		<div class="aegis-toggle-suboptions">
			<div class="aegis-toggle-card aegis-toggle-subcard" style="border-left: 3px solid #2271b1;">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-info"></span>
					</div>
					<div class="aegis-toggle-text">
						<p style="margin:0;"><?php esc_html_e( 'Co-Authors Plus integration is provided by the Aegis plugin with improved guest author support.', 'aegis' ); ?></p>
					</div>
				</div>
			</div>
			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-admin-site-alt3"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e( 'Author Schema', 'aegis' ); ?></h3>
						<p><?php esc_html_e( 'Outputs JSON-LD Person schema for each co-author on singular posts.', 'aegis' ); ?></p>
					</div>
				</div>
			</div>

			<?php
			$cap_social_key = 'cap_social_links';
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo ! $pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-share"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e( 'Social Links', 'aegis' ); ?>
							<?php if ( ! $pro_active ) : ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e( 'Pro', 'aegis' ); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e( 'Display social media links for each guest author (Facebook, LinkedIn, GitHub, Instagram, Bluesky, Website).', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . "[{$cap_social_key}]" ); ?>" value="1" <?php checked( $cap_social_checked ); ?> <?php disabled( ! $pro_active ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php
			$cap_roles_key = 'cap_role_badges';
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo ! $pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-nametag"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e( 'Role Badges', 'aegis' ); ?>
							<?php if ( ! $pro_active ) : ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e( 'Pro', 'aegis' ); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e( 'Show contribution role badges below author names (e.g., Researcher, Editor, Photographer).', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr( $option_name . "[{$cap_roles_key}]" ); ?>" value="1" <?php checked( $cap_roles_checked ); ?> <?php disabled( ! $pro_active ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo ! $pro_active ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-layout"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e( 'Co-Authors Plus Patterns', 'aegis' ); ?>
							<?php if ( ! $pro_active ) : ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e( 'Pro', 'aegis' ); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e( 'Remove default Co-Authors Plus block patterns from the editor.', 'aegis' ); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="aegis_pattern_control[coauthors_keep_patterns]" value="1" <?php checked( $cap_keep_patterns ); ?> <?php disabled( ! $pro_active ); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}

	/**
	 * Get plugin status.
	 *
	 * @param string $plugin_check Plugin check identifier.
	 * @return array Status with class and label.
	 */
	private function get_plugin_status( string $plugin_check ): array {
		if ( empty( $plugin_check ) ) {
			return array(
				'class' => '',
				'label' => '',
			);
		}

		// Check if plugin is active.
		$is_active = false;
		switch ( $plugin_check ) {
			case 'woocommerce':
				$is_active = class_exists( 'WooCommerce' );
				break;
			case 'acf':
				$is_active = class_exists( 'ACF' );
				break;
			case 'rank_math':
				$is_active = class_exists( 'RankMath' );
				break;
			case 'learndash':
				$is_active = defined( 'LEARNDASH_VERSION' );
				break;
			case 'lifter_lms':
				$is_active = class_exists( 'LifterLMS' );
				break;
			case 'sensei_lms':
				$is_active = class_exists( 'Sensei_Main' );
				break;
			case 'fluent_forms':
				$is_active = defined( 'FLUENTFORM' );
				break;
			case 'fluent_booking':
				$is_active = class_exists( 'FluentBooking\\App\\App' );
				break;
			case 'code_block_pro':
				$is_active = defined( 'CODE_BLOCK_PRO_VERSION' );
				break;
			case 'syntax_highlighting':
				$is_active = class_exists( 'Developer_Starter_Starter' ) || function_exists( 'Developer_Starter_Starter' );
				break;
			case 'co_authors_plus':
				$is_active = function_exists( 'get_coauthors' );
				break;
			case 'meta_box':
				$is_active = class_exists( 'RWMB_Loader' );
				break;
			case 'fluent_crm':
				$is_active = defined( 'FLUENTCRM' );
				break;
		}

		if ( $is_active ) {
			return array(
				'class' => 'active',
				'label' => __( 'Active', 'aegis' ),
			);
		}

		return array(
			'class' => 'not-installed',
			'label' => __( 'Not Installed', 'aegis' ),
		);
	}

	/**
	 * Default array for conditional logic toggles by option name.
	 *
	 * @param string $option_name Settings option key.
	 * @return array<string, array<string, bool>>
	 */
	private function get_conditional_defaults_for_option( string $option_name ): array {
		if ( $option_name === 'aegis_conditional_logic' && class_exists( '\Aegis\Plugin\Conditionals\Settings' ) ) {
			return \Aegis\Plugin\Conditionals\Settings::DEFAULTS;
		}

		return class_exists( \Aegis\Plugin\Settings\Repository::class )
			? \Aegis\Plugin\Settings\Repository::DEFAULTS
			: array();
	}

	/**
	 * Default array for block toggles by option name.
	 *
	 * @param string $option_name Settings option key.
	 * @return array<string, bool>
	 */
	private function get_blocks_defaults_for_option( string $option_name ): array {
		if ( $option_name === 'aegis_blocks' && class_exists( '\Aegis\Plugin\Blocks\Settings' ) ) {
			return \Aegis\Plugin\Blocks\Settings::DEFAULTS;
		}

		return class_exists( \Aegis\Plugin\Settings\Repository::class )
			? \Aegis\Plugin\Settings\Repository::BLOCKS_DEFAULTS
			: array();
	}

	/**
	 * Render the toolbar with search and export/import.
	 *
	 * @param string $group Settings group for export/import actions.
	 * @return void
	 */
	public function render_toolbar( string $group = '' ): void {
		?>
		<div class="aegis-toolbar">
			<div class="aegis-toolbar-left">
				<input type="text" class="aegis-search-input" placeholder="<?php esc_attr_e( 'Search settings...', 'aegis' ); ?>">
			</div>
			<div class="aegis-toolbar-right">
				<?php if ( $group ) : ?>
				<button type="button" class="aegis-btn aegis-btn-secondary aegis-reset-settings" data-group="<?php echo esc_attr( $group ); ?>">
					<?php esc_html_e( 'Reset Defaults', 'aegis' ); ?>
				</button>
				<?php endif; ?>
				<button type="button" class="aegis-btn aegis-btn-secondary aegis-export-btn">
					<?php esc_html_e( 'Export', 'aegis' ); ?>
				</button>
				<button type="button" class="aegis-btn aegis-btn-secondary aegis-import-btn">
					<?php esc_html_e( 'Import', 'aegis' ); ?>
				</button>
				<input type="file" id="aegis-import-file" accept=".json" style="display:none;">
			</div>
		</div>
		<?php
	}

	/**
	 * Render section header with bulk actions.
	 *
	 * @param string $title       Section title.
	 * @param string $description Section description.
	 * @param bool   $show_bulk_actions Whether to show bulk action buttons.
	 * @param string $icon        Optional dashicon name for the title.
	 * @return void
	 */
	public function render_section_header( string $title, string $description, bool $show_bulk_actions = true, string $icon = '' ): void {
		$pro_installed = $this->is_aegis_pro_active() ? 'true' : 'false';
		?>
		<div class="aegis-section-header">
			<div class="aegis-section-title">
				<h2>
					<?php if ( $icon ) : ?>
					<span class="dashicons dashicons-<?php echo esc_attr( $icon ); ?>"></span>
					<?php endif; ?>
					<?php echo esc_html( $title ); ?>
				</h2>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php if ( $show_bulk_actions ) : ?>
			<div class="aegis-bulk-actions">
				<button type="button" class="button button-small aegis-bulk-enable" data-pro-installed="<?php echo esc_attr( $pro_installed ); ?>"><?php esc_html_e( 'Enable All', 'aegis' ); ?></button>
				<button type="button" class="button button-small aegis-bulk-disable" data-pro-installed="<?php echo esc_attr( $pro_installed ); ?>"><?php esc_html_e( 'Disable All', 'aegis' ); ?></button>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Render the Aegis dashboard admin page.
	 *
	 * @return void
	 */
	public function render_dashboard_page(): void {
		$theme = wp_get_theme();

		// Gather live stats.
		$block_settings = class_exists( '\Aegis\Plugin\Blocks\Settings' )
			? \Aegis\Plugin\Blocks\Settings::get_settings()
			: get_option( SettingsRepository::BLOCKS_OPTION, array() );
		$active_blocks  = count( array_filter( is_array( $block_settings ) ? $block_settings : array() ) );

		$conditionals        = SettingsRepository::get_settings();
		$active_conditionals = 0;
		foreach ( $conditionals as $group ) {
			if ( is_array( $group ) ) {
				$active_conditionals += count( array_filter( $group ) );
			}
		}

		$integrations        = get_option( SettingsRepository::INTEGRATIONS_OPTION, array() );
		$active_integrations = count( array_filter( is_array( $integrations ) ? $integrations : array() ) );

		$hook_patterns_count = 0;
		if ( class_exists( \Aegis\Plugin\Hooks\PatternsManager::class ) ) {
			$hook_post_type = \Aegis\Plugin\Hooks\PatternsManager::POST_TYPE;
			if ( post_type_exists( $hook_post_type ) ) {
				$hook_counts         = wp_count_posts( $hook_post_type );
				$hook_patterns_count = isset( $hook_counts->publish ) ? (int) $hook_counts->publish : 0;
			}
		}

		$pro_active = defined( 'AEGIS_PRO_VERSION' );
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs( 'dashboard' ); ?>

			<div class="aegis-settings-wrap">

				<!-- Hero Welcome Banner -->
				<div class="aegis-dashboard-hero-card">
					<div class="aegis-dashboard-hero-card-header">
						<?php self::render_brand_icon( 20 ); ?>
						<span><?php esc_html_e( 'Dashboard', 'aegis' ); ?></span>
					</div>
					<div class="aegis-dashboard-hero-card-body">
						<h1><?php esc_html_e( 'Welcome to Aegis', 'aegis' ); ?></h1>
						<p><?php esc_html_e( 'The Native Block Framework for WordPress. Manage your blocks, conditionals, integrations, and more from one place.', 'aegis' ); ?></p>
						<div class="aegis-dashboard-hero-card-actions">
							<a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" class="aegis-btn aegis-btn-primary">
								<span class="dashicons dashicons-admin-appearance"></span>
								<?php esc_html_e( 'Open Site Editor', 'aegis' ); ?>
							</a>
							<a href="https://developer.wordpress.org/themes/" target="_blank" rel="noopener noreferrer" class="aegis-btn aegis-btn-secondary">
								<span class="dashicons dashicons-book"></span>
								<?php esc_html_e( 'Documentation', 'aegis' ); ?>
							</a>
						</div>
					</div>
				</div>

				<!-- At-a-Glance Stats -->
				<div class="aegis-dashboard-stats">
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-blocks' ) ); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--blue">
							<span class="dashicons dashicons-block-default"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html( (string) $active_blocks ); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e( 'Active Blocks', 'aegis' ); ?></span>
						</div>
					</a>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-settings' ) ); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--purple">
							<span class="dashicons dashicons-lock"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html( (string) $active_conditionals ); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e( 'Conditionals', 'aegis' ); ?></span>
						</div>
					</a>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-integrations' ) ); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--green">
							<span class="dashicons dashicons-admin-plugins"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html( (string) $active_integrations ); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e( 'Integrations', 'aegis' ); ?></span>
						</div>
					</a>
					<?php if ( class_exists( \Aegis\Plugin\Hooks\PatternsManager::class ) ) : ?>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-hook-patterns' ) ); ?>" class="aegis-stat-card">
						<div class="aegis-stat-icon aegis-stat-icon--amber">
							<span class="dashicons dashicons-editor-code"></span>
						</div>
						<div class="aegis-stat-content">
							<span class="aegis-stat-value"><?php echo esc_html( (string) $hook_patterns_count ); ?></span>
							<span class="aegis-stat-label"><?php esc_html_e( 'Hook Patterns', 'aegis' ); ?></span>
						</div>
					</a>
					<?php endif; ?>
				</div>

				<!-- Quick Actions -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e( 'Quick Actions', 'aegis' ); ?></h2>
					<div class="aegis-dashboard-actions">
						<a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-admin-appearance"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Site Editor', 'aegis' ); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e( 'Edit your site visually', 'aegis' ); ?></span>
						</a>
						<a href="<?php echo esc_url( admin_url( 'site-editor.php?path=%2Fwp_template' ) ); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-screenoptions"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Templates', 'aegis' ); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e( 'Manage page templates', 'aegis' ); ?></span>
						</a>
						<a href="<?php echo esc_url( admin_url( 'site-editor.php?path=%2Fpatterns' ) ); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-layout"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Patterns', 'aegis' ); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e( 'Browse block patterns', 'aegis' ); ?></span>
						</a>
						<a href="<?php echo esc_url( admin_url( 'site-editor.php?path=%2Fwp_global_styles' ) ); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-art"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Global Styles', 'aegis' ); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e( 'Customize colors & fonts', 'aegis' ); ?></span>
						</a>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-blocks' ) ); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-block-default"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Manage Blocks', 'aegis' ); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e( 'Enable or disable blocks', 'aegis' ); ?></span>
						</a>
						<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-plus-alt2"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'New Page', 'aegis' ); ?></span>
							<span class="aegis-action-card-desc"><?php esc_html_e( 'Create a new page', 'aegis' ); ?></span>
						</a>
					</div>
				</div>

				<!-- Getting Started -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e( 'Getting Started', 'aegis' ); ?></h2>
					<div class="aegis-dashboard-getting-started">
						<a href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-admin-customizer"></span>
							</div>
							<h3><?php esc_html_e( 'Customize Your Theme', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Use the Site Editor to customize templates, headers, footers, and global styles with full block control.', 'aegis' ); ?></p>
						</a>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-settings' ) ); ?>" class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-visibility"></span>
							</div>
							<h3><?php esc_html_e( 'Manage Block Visibility', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Show or hide any block based on user roles, devices, schedules, and custom conditions.', 'aegis' ); ?></p>
						</a>
						<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-integrations' ) ); ?>" class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-admin-plugins"></span>
							</div>
							<h3><?php esc_html_e( 'Extend with Integrations', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Connect WooCommerce, LMS plugins, and other tools to enhance your block-powered site.', 'aegis' ); ?></p>
						</a>
					</div>
				</div>

				<div class="aegis-dashboard-columns">
					<!-- System Info -->
					<div class="aegis-dashboard-section">
						<div class="aegis-dashboard-system-card">
							<div class="aegis-dashboard-system-card-header">
								<span class="dashicons dashicons-info-outline"></span>
								<span><?php esc_html_e( 'System Info', 'aegis' ); ?></span>
							</div>
							<div class="aegis-system-table">
								<div class="aegis-system-row">
									<span class="aegis-system-label"><?php esc_html_e( 'Theme Version', 'aegis' ); ?></span>
									<span class="aegis-system-value"><?php echo esc_html( $theme->get( 'Version' ) ); ?></span>
								</div>
								<div class="aegis-system-row">
									<span class="aegis-system-label"><?php esc_html_e( 'WordPress', 'aegis' ); ?></span>
									<span class="aegis-system-value"><?php echo esc_html( get_bloginfo( 'version' ) ); ?></span>
								</div>
								<div class="aegis-system-row">
									<span class="aegis-system-label"><?php esc_html_e( 'PHP', 'aegis' ); ?></span>
									<span class="aegis-system-value"><?php echo esc_html( PHP_VERSION ); ?></span>
								</div>
								<?php if ( $pro_active ) : ?>
									<div class="aegis-system-row">
										<span class="aegis-system-label"><?php esc_html_e( 'Aegis Pro', 'aegis' ); ?></span>
										<span class="aegis-system-value"><?php echo esc_html( AEGIS_PRO_VERSION ); ?></span>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<!-- Pro Status -->
					<div class="aegis-dashboard-section">
						<div class="aegis-dashboard-system-card">
							<div class="aegis-dashboard-system-card-header">
								<span class="dashicons dashicons-star-filled"></span>
								<span><?php esc_html_e( 'Aegis Pro', 'aegis' ); ?></span>
							</div>
							<div class="aegis-dashboard-system-card-body">
								<?php if ( $pro_active ) : ?>
									<?php
									if ( class_exists( '\Aegis\Pro\License\Settings' ) ) {
										$license_key = \Aegis\Pro\License\Settings::get_license_key();
										$is_valid    = \Aegis\Pro\License\Settings::is_valid();
										$masked_key  = \Aegis\Pro\License\Settings::get_masked_license_key();
									} else {
										$license_key = get_option( 'aegis_pro_license_key', '' );
										$is_valid    = get_option( 'aegis_pro_license_status', '' ) === 'valid';
										$masked_key  = $license_key !== '' ? substr( $license_key, 0, 8 ) . '••••••••' : '';
									}
									?>
									<div class="aegis-pro-status aegis-pro-status--<?php echo $is_valid ? 'active' : 'inactive'; ?>">
										<span class="dashicons dashicons-<?php echo $is_valid ? 'yes-alt' : 'warning'; ?>"></span>
										<div>
											<strong><?php echo $is_valid ? esc_html__( 'License Active', 'aegis' ) : esc_html__( 'License Inactive', 'aegis' ); ?></strong>
											<?php if ( ! empty( $license_key ) ) : ?>
												<p class="aegis-license-key"><?php echo esc_html( $masked_key ); ?></p>
											<?php else : ?>
												<p><?php esc_html_e( 'Enter your license key to activate Pro features.', 'aegis' ); ?></p>
											<?php endif; ?>
										</div>
									</div>
								<?php else : ?>
									<p class="aegis-dashboard-pro-desc"><?php esc_html_e( 'Unlock advanced features, integrations, and professional tools.', 'aegis' ); ?></p>
									<a href="<?php echo esc_url( admin_url( 'admin.php?page=aegis-license' ) ); ?>" class="aegis-btn aegis-btn-primary">
										<span class="dashicons dashicons-cart"></span>
										<?php esc_html_e( 'Get Aegis Pro', 'aegis' ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if ( ! $pro_active ) : ?>
				<!-- Pro Features Grid -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e( 'Unlock the Full Power of Aegis', 'aegis' ); ?></h2>
					<p class="aegis-license-section-desc"><?php esc_html_e( 'Aegis Pro extends every block with advanced features, integrations, and professional tools.', 'aegis' ); ?></p>

					<div class="aegis-license-features">
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-video-alt3"></span>
							</div>
							<h3><?php esc_html_e( 'Video Player Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Chapters, analytics, BunnyCDN streaming, email capture, and LMS integrations.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-lock"></span>
							</div>
							<h3><?php esc_html_e( 'Advanced Conditionals', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Cookie, referral, ACF, MetaBox, post meta, and location-based block visibility.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-chart-area"></span>
							</div>
							<h3><?php esc_html_e( 'Analytics & Tracking', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Per-user tracking, audience retention, buffering stats, and Google Analytics events.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-welcome-learn-more"></span>
							</div>
							<h3><?php esc_html_e( 'LMS Integrations', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'LearnDash, LifterLMS, and Sensei â€” auto-complete lessons based on video progress.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-location-alt"></span>
							</div>
							<h3><?php esc_html_e( 'Map Block Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Clustering, directions, store locator, heatmaps, KML/GeoJSON import, and Schema.org.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-images-alt2"></span>
							</div>
							<h3><?php esc_html_e( 'Slider Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Autoplay, effects, thumbnails, lightbox, lazy loading, and custom arrow/dot styles.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-arrow-down-alt2"></span>
							</div>
							<h3><?php esc_html_e( 'Toggle Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'URL sync, state persistence, animations, FAQ schema, nested toggles, and conditional visibility.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-clock"></span>
							</div>
							<h3><?php esc_html_e( 'Countdown Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Evergreen countdowns, animations, auto-restart, expiry actions, and urgency styling.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-slides"></span>
							</div>
							<h3><?php esc_html_e( 'Modal Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Exit intent, scroll depth, time delay triggers, auto close, show once, and device visibility.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-database"></span>
							</div>
							<h3><?php esc_html_e( 'Query Loop Pro', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Advanced filtering, custom field queries, date ranges, related posts, and AJAX pagination.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-cloud-upload"></span>
							</div>
							<h3><?php esc_html_e( 'BunnyCDN Streaming', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'HLS adaptive streaming, direct upload, AI transcription, thumbnails, and watermarking.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-layout"></span>
							</div>
							<h3><?php esc_html_e( 'Pattern Control', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Manage default block patterns from plugins. Remove unwanted patterns from the editor.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-editor-code"></span>
							</div>
							<h3><?php esc_html_e( 'Custom Code & Fonts', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Add custom CSS, JavaScript, and register custom fonts without child themes or extra plugins.', 'aegis' ); ?></p>
						</div>
						<div class="aegis-license-feature-card">
							<div class="aegis-license-feature-icon">
								<span class="dashicons dashicons-groups"></span>
							</div>
							<h3><?php esc_html_e( 'Co-Authors Plus', 'aegis' ); ?></h3>
							<p><?php esc_html_e( 'Social links, role badges, and enhanced author displays for multi-author publishing.', 'aegis' ); ?></p>
						</div>
					</div>

					<div class="aegis-license-purchase-cta">
						<a href="https://www.atmostfear-entertainment.com/aegis/pro" target="_blank" rel="noopener noreferrer" class="aegis-btn aegis-btn-primary aegis-btn-lg">
							<span class="dashicons dashicons-cart"></span>
							<?php esc_html_e( 'Get Aegis Pro', 'aegis' ); ?>
						</a>
						<span class="aegis-license-purchase-note"><?php esc_html_e( 'One-time purchase. Lifetime updates. 14-day money-back guarantee.', 'aegis' ); ?></span>
					</div>
				</div>
				<?php endif; ?>

				<!-- Resources -->
				<div class="aegis-dashboard-section">
					<h2><?php esc_html_e( 'Resources', 'aegis' ); ?></h2>
					<div class="aegis-dashboard-actions aegis-license-links">
						<a href="https://developer.wordpress.org/themes/" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-book"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Documentation', 'aegis' ); ?></span>
						</a>
						<a href="https://www.facebook.com/groups/aegiswp" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-groups"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Support Group', 'aegis' ); ?></span>
						</a>
						<a href="https://github.com/aegiswp/theme/releases" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-backup"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'Changelog', 'aegis' ); ?></span>
						</a>
						<a href="https://github.com/aegiswp/theme" target="_blank" rel="noopener noreferrer" class="aegis-action-card">
							<div class="aegis-action-card-icon">
								<span class="dashicons dashicons-editor-code"></span>
							</div>
							<span class="aegis-action-card-title"><?php esc_html_e( 'GitHub', 'aegis' ); ?></span>
						</a>
					</div>
				</div>

			</div>
		</div>
		<?php
	}

	/**
	 * Render top bar and tabs for the Integrations admin page (plugin-owned content).
	 *
	 * @return void
	 */
	public function render_integrations_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'integrations' );
	}

	/**
	 * Render top bar and tabs for the Blocks admin page.
	 *
	 * @return void
	 */
	public function render_blocks_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'blocks' );
	}

	/**
	 * Render top bar and tabs for the Modals admin page (plugin-owned content).
	 *
	 * @return void
	 */
	public function render_modals_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'modals' );
	}

	/**
	 * Render top bar and tabs for the Hooks admin page (plugin-owned content).
	 *
	 * @return void
	 */
	public function render_hooks_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'hook-patterns' );
	}

	/**
	 * Render top bar and tabs for the Conditionals admin page (plugin-owned content).
	 *
	 * @return void
	 */
	public function render_conditionals_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'conditional-logic' );
	}

	/**
	 * Render top bar and tabs for the General Settings admin page (plugin-owned content).
	 *
	 * @return void
	 */
	public function render_general_settings_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'general-settings' );
	}

	/**
	 * Render top bar and tabs for the License admin page (Pro-owned content).
	 *
	 * @return void
	 */
	public function render_license_chrome(): void {
		$this->render_top_bar();
		$this->render_page_tabs( 'license' );
	}
}
