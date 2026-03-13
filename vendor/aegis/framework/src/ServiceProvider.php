<?php
/**
 * Aegis Service Provider
 *
 * Provides registration and management of all Aegis Framework services and dependencies.
 *
 * Responsibilities:
 * - Registers core and block-related services with the container
 * - Integrates inline asset management, hooks, and service contracts
 *
 * @package    Aegis\Framework
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for the service provider.
declare( strict_types=1 );

// Declares the namespace for the core of the Aegis Framework.
namespace Aegis\Framework;

// Imports container, service contracts, inline asset managers, and hooks.
use Aegis\Container\Container;
use Aegis\Container\Interfaces\Registerable;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Hooks\Hook;
use function class_exists;
use function is_object;
use function wp_get_global_settings;
use function wp_get_global_styles;

// Implements the Aegis Framework service provider for dependency registration and management.

class ServiceProvider implements Registerable
{

	/**
	 * Cached global settings.
	 *
	 * @since 1.0.0
	 *
	 * @var array|null
	 */
	private static ?array $global_settings = null;

	/**
	 * Cached global styles.
	 *
	 * @since 1.0.0
	 *
	 * @var array|null
	 */
	private static ?array $global_styles = null;

	/**
	 * Get cached global settings.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_global_settings(): array
	{
		if ( self::$global_settings === null ) {
			self::$global_settings = wp_get_global_settings();
		}

		return self::$global_settings;
	}

	/**
	 * Get cached global styles.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_global_styles(): array
	{
		if ( self::$global_styles === null ) {
			self::$global_styles = wp_get_global_styles();
		}

		return self::$global_styles;
	}

	/**
	 * Services.
	 *
	 * @since 1.0.0
	 *
	 * @var string[]
	 */
	private array $services = [
		BlockSettings\AdditionalStyles::class,
		BlockSettings\Animation::class,
		BlockSettings\BackdropBlur::class,
		BlockSettings\BoxShadow::class,
		BlockSettings\CopyToClipboard::class,
		BlockSettings\CssFilter::class,
		// @todo Uncomment for v1.0.0 release.
		// BlockSettings\GlobalClasses::class,
		BlockSettings\Image::class,
		BlockSettings\QueryEnhancements::class,
		BlockSettings\QueryLayout::class,
		BlockSettings\QueryNoResults::class,
		BlockSettings\InlineColor::class,
		BlockSettings\InlineSvg::class,
		BlockSettings\Onclick::class,
		BlockSettings\Opacity::class,
		BlockSettings\Placeholder::class,
		BlockSettings\Responsive::class,
		BlockSettings\SubHeading::class,
		BlockSettings\TemplateTags::class,
		BlockSettings\TextShadow::class,
		BlockSettings\Transform::class,
		BlockSettings\Visibility::class,
		BlockVariations\AccordionList::class,
		BlockVariations\Counter::class,
		BlockVariations\CurvedText::class,
		BlockVariations\Grid::class,
		BlockVariations\Icon::class,
		BlockVariations\Marquee::class,
		BlockVariations\Newsletter::class,
		BlockVariations\Svg::class,
		CoreBlocks\Button::class,
		CoreBlocks\Buttons::class,
		CoreBlocks\Calendar::class,
		CoreBlocks\Code::class,
		CoreBlocks\Columns::class,
		CoreBlocks\Countdown::class,
		CoreBlocks\Cover::class,
		CoreBlocks\Details::class,
		CoreBlocks\Group::class,
		CoreBlocks\Heading::class,
		CoreBlocks\Image::class,
		CoreBlocks\ListBlock::class,
		CoreBlocks\Map::class,
		CoreBlocks\Modal::class,
		CoreBlocks\Navigation::class,
		CoreBlocks\RelatedPosts::class,
		CoreBlocks\Slider::class,
		CoreBlocks\Toggle::class,
		CoreBlocks\NavigationSubmenu::class,
		CoreBlocks\PageList::class,
		CoreBlocks\Paragraph::class,
		CoreBlocks\PostAuthor::class,
		CoreBlocks\PostCommentsForm::class,
		CoreBlocks\PostContent::class,
		CoreBlocks\PostDate::class,
		CoreBlocks\PostExcerpt::class,
		CoreBlocks\PostFeaturedImage::class,
		CoreBlocks\PostTemplate::class,
		CoreBlocks\PostTerms::class,
		CoreBlocks\PostTitle::class,
		CoreBlocks\Query::class,
		CoreBlocks\QueryPagination::class,
		CoreBlocks\QueryTitle::class,
		CoreBlocks\Search::class,
		CoreBlocks\Shortcode::class,
		CoreBlocks\SocialLink::class,
		CoreBlocks\SocialLinks::class,
		CoreBlocks\Spacer::class,
		CoreBlocks\TableOfContents::class,
		CoreBlocks\TagCloud::class,
		CoreBlocks\TemplatePart::class,
		CoreBlocks\Video::class,
		DesignSystem\AdminBar::class,
		DesignSystem\BuilderNotice::class,
		DesignSystem\BaseCss::class,
		DesignSystem\BlockCss::class,
		DesignSystem\BlockStyles::class,
		DesignSystem\BlockScripts::class,
		DesignSystem\BlockSupports::class,
		DesignSystem\ChildTheme::class,
		DesignSystem\ConicGradient::class,
		DesignSystem\CustomProperties::class,
		DesignSystem\DarkMode::class,
		// @todo Uncomment for v1.0.0 release.
		// DesignSystem\UtilityClasses::class,
		DesignSystem\Embed::class,
		DesignSystem\Emojis::class,
		DesignSystem\EditorAssets::class,
		DesignSystem\Hooks::class,
		DesignSystem\Layout::class,
		DesignSystem\Patterns::class,
		DesignSystem\SkipLink::class,
		DesignSystem\SvgUpload::class,
		DesignSystem\SystemFonts::class,
		DesignSystem\Templates::class,
		ThemeUpdater\ThemeUpdater::class,
	];

	/**
	 * Integration services mapped to their settings keys.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, string>
	 */
	private array $integrations = [
		Integrations\Plugins\AdvancedCustomFields::class => 'advanced_custom_fields',
		Integrations\Plugins\BunnyCDN::class => 'bunny_cdn',
		Integrations\Plugins\CoAuthorsPlus::class => 'co_authors_plus',
		Integrations\Plugins\CodeBlockPro::class => 'code_block_pro',
		Integrations\Plugins\FluentBooking::class => 'fluent_booking',
		Integrations\Plugins\FluentForms::class => 'fluent_forms',
		Integrations\Plugins\LearnDash::class => 'learndash',
		Integrations\Plugins\LifterLMS::class => 'lifter_lms',
		Integrations\Plugins\MetaBox::class => 'meta_box',
		Integrations\Plugins\RankMath::class => 'rank_math',
		Integrations\Plugins\SenseiLMS::class => 'sensei_lms',
		Integrations\Plugins\SyntaxHighlightingCodeBlock::class => 'syntax_highlighting',
		Integrations\Plugins\WooCommerce::class => 'woocommerce',
		Integrations\Plugins\WooCommerce\BlockStyles::class => 'woocommerce',
	];

	/**
	 * Main plugin or theme file.
	 *
	 * @var string
	 */
	private string $file;

	/**
	 * Constructor.
	 *
	 * @param string $file Main plugin or theme file.
	 *
	 * @return void
	 */
	public function __construct(string $file)
	{
		$this->file = $file;
	}

	/**
	 * Registers the package configuration and returns instance.
	 *
	 * @param Container $container Dependency injection container.
	 *
	 * @return void
	 */
	public function register(Container $container): void
	{
		$scripts = $container->make(Scripts::class, $this->file);
		$styles = $container->make(Styles::class, $this->file);

		// Register core services
		foreach ($this->services as $id) {
			$this->register_service($container, $id, $scripts, $styles);
		}

		// Register integrations (only if enabled in admin settings)
		foreach ($this->integrations as $id => $setting_key) {
			if ($this->is_integration_enabled($setting_key)) {
				$this->register_service($container, $id, $scripts, $styles);
			}
		}

		Hook::annotations($scripts);
		Hook::annotations($styles);
	}

	/**
	 * Register a single service.
	 *
	 * @param Container $container Dependency injection container.
	 * @param string    $id        Service class name.
	 * @param Scripts   $scripts   Scripts service.
	 * @param Styles    $styles    Styles service.
	 *
	 * @return void
	 */
	private function register_service(Container $container, string $id, Scripts $scripts, Styles $styles): void
	{
		$service = $container->make($id);

		if (is_object($service)) {
			Hook::annotations($service);
		}

		if ($service instanceof Scriptable) {
			$service->scripts($scripts);
		}

		if ($service instanceof Styleable) {
			$service->styles($styles);
		}
	}

	/**
	 * Check if an integration is enabled.
	 *
	 * @param string $setting_key Integration setting key.
	 *
	 * @return bool
	 */
	private function is_integration_enabled(string $setting_key): bool
	{
		// Check if the admin settings class exists
		if (class_exists('\Aegis\Admin\ConditionalLogicSettings')) {
			return \Aegis\Admin\ConditionalLogicSettings::is_integration_enabled($setting_key);
		}

		// Default to enabled if settings class not available
		return true;
	}

	/**
	 * Check if a block feature is enabled in admin settings.
	 *
	 * Encapsulates the class_exists() + is_block_enabled() pattern used
	 * across the framework. Returns true when the settings class is not
	 * available (e.g. standalone framework usage without the theme).
	 *
	 * @since 1.0.0
	 *
	 * @param string $block Block feature key.
	 *
	 * @return bool
	 */
	public static function is_block_enabled(string $block): bool
	{
		if (class_exists('\Aegis\Admin\ConditionalLogicSettings')) {
			return \Aegis\Admin\ConditionalLogicSettings::is_block_enabled($block);
		}

		return true;
	}

	/**
	 * Check if a schema type is handled by Rank Math.
	 *
	 * Encapsulates the class_exists() + is_schema_handled_by_rank_math()
	 * pattern. Returns false when the settings class is not available.
	 *
	 * @since 1.0.0
	 *
	 * @param string $schema_key Integration key for the schema handoff option.
	 *
	 * @return bool
	 */
	public static function is_schema_handled_by_rank_math(string $schema_key): bool
	{
		if (class_exists('\Aegis\Admin\ConditionalLogicSettings')) {
			return \Aegis\Admin\ConditionalLogicSettings::is_schema_handled_by_rank_math($schema_key);
		}

		return false;
	}
}
