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
declare(strict_types=1);

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
		if (self::$global_settings === null) {
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
		if (self::$global_styles === null) {
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
		BlockSettings\Image::class,
		BlockSettings\InlineColor::class,
		BlockSettings\InlineSvg::class,
		BlockSettings\Onclick::class,
		BlockSettings\Opacity::class,
		BlockSettings\Placeholder::class,
		BlockSettings\Responsive::class,
		BlockSettings\SubHeading::class,
		BlockSettings\TemplateTags::class,
		BlockSettings\TextShadow::class,
		BlockVariations\AccordionList::class,
		BlockVariations\Counter::class,
		BlockVariations\CurvedText::class,
		BlockVariations\Grid::class,
		BlockVariations\Icon::class,
		BlockVariations\Marquee::class,
		BlockVariations\Newsletter::class,
		BlockVariations\RelatedPosts::class,
		BlockVariations\Svg::class,
		CoreBlocks\Button::class,
		CoreBlocks\Buttons::class,
		CoreBlocks\Calendar::class,
		CoreBlocks\Code::class,
		CoreBlocks\Columns::class,
		CoreBlocks\Cover::class,
		CoreBlocks\Details::class,
		CoreBlocks\Group::class,
		CoreBlocks\Heading::class,
		CoreBlocks\Image::class,
		CoreBlocks\ListBlock::class,
		//CoreBlocks\Modal::class,
		CoreBlocks\Navigation::class,
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
		DesignSystem\BaseCss::class,
		DesignSystem\BlockCss::class,
		DesignSystem\BlockStyles::class,
		DesignSystem\BlockScripts::class,
		DesignSystem\BlockSupports::class,
		DesignSystem\ChildTheme::class,
		DesignSystem\ConicGradient::class,
		DesignSystem\CustomProperties::class,
		DesignSystem\DarkMode::class,
		DesignSystem\Emojis::class,
		DesignSystem\EditorAssets::class,
		DesignSystem\Hooks::class,
		DesignSystem\Layout::class,
		DesignSystem\Patterns::class,
		DesignSystem\SkipLink::class,
		DesignSystem\SvgUpload::class,
		DesignSystem\SystemFonts::class,
		DesignSystem\Templates::class,
		Integrations\AdvancedCustomFields::class,
		Integrations\BunnyCDN::class,
		Integrations\CodeBlockPro::class,
		Integrations\FluentForms::class,
		Integrations\LearnDash::class,
		Integrations\LifterLMS::class,
		Integrations\RankMath::class,
		Integrations\SenseiLMS::class,
		Integrations\SyntaxHighlightingCodeBlock::class,
		Integrations\WooCommerce::class,
		ThemeUpdater\ThemeUpdater::class,
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

		foreach ($this->services as $id) {
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

		Hook::annotations($scripts);
		Hook::annotations($styles);
	}
}
