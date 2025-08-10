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
 * @author     @atmostfear-entertainment
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
use function is_object;

// Implements the Aegis Framework service provider for dependency registration and management.

/**
 * The main Service Provider for the Aegis Framework.
 *
 * This class is responsible for bootstrapping the entire framework. It iterates through
 * a predefined list of service classes, instantiates them using the dependency
 * injection container, and integrates them with the framework's hook and asset
 * management systems.
 *
 * @package Aegis\\Framework
 * @since   1.0.0
 */
class ServiceProvider implements Registerable {

	/**
	 * The complete list of services to be loaded by the framework.
	 *
	 * This array contains the fully qualified class names of all modules,
	 * settings, integrations, and other services that make up the framework.
	 *
	 * @since 1.0.0
	 *
	 * @var   string[]
	 */
	private array $services = [
		// Block Settings
		BlockSettings\\AdditionalStyles::class,
		BlockSettings\\Animation::class,
		BlockSettings\\BackdropBlur::class,
		BlockSettings\\BoxShadow::class,
		BlockSettings\\CopyToClipboard::class,
		BlockSettings\\CssFilter::class,
		BlockSettings\\Image::class,
		BlockSettings\\InlineColor::class,
		BlockSettings\\InlineSvg::class,
		BlockSettings\\Onclick::class,
		BlockSettings\\Opacity::class,
		BlockSettings\\Placeholder::class,
		BlockSettings\\Responsive::class,
		BlockSettings\\SubHeading::class,
		BlockSettings\\TemplateTags::class,
		BlockSettings\\TextShadow::class,
		// Block Variations
		BlockVariations\\AccordionList::class,
		BlockVariations\\Counter::class,
		BlockVariations\\CurvedText::class,
		BlockVariations\\Grid::class,
		BlockVariations\\Icon::class,
		BlockVariations\\Marquee::class,
		BlockVariations\\Newsletter::class,
		BlockVariations\\RelatedPosts::class,
		BlockVariations\\Svg::class,
		// Core Block Overrides & Extensions
		CoreBlocks\\Button::class,
		CoreBlocks\\Buttons::class,
		CoreBlocks\\Calendar::class,
		CoreBlocks\\Code::class,
		CoreBlocks\\Columns::class,
		CoreBlocks\\Cover::class,
		CoreBlocks\\Details::class,
		CoreBlocks\\Group::class,
		CoreBlocks\\Heading::class,
		CoreBlocks\\Image::class,
		CoreBlocks\\ListBlock::class,
		CoreBlocks\\Navigation::class,
		CoreBlocks\\NavigationSubmenu::class,
		CoreBlocks\\PageList::class,
		CoreBlocks\\Paragraph::class,
		CoreBlocks\\PostAuthor::class,
		CoreBlocks\\PostCommentsForm::class,
		CoreBlocks\\PostContent::class,
		CoreBlocks\\PostDate::class,
		CoreBlocks\\PostExcerpt::class,
		CoreBlocks\\PostFeaturedImage::class,
		CoreBlocks\\PostTemplate::class,
		CoreBlocks\\PostTerms::class,
		CoreBlocks\\PostTitle::class,
		CoreBlocks\\Query::class,
		CoreBlocks\\QueryPagination::class,
		CoreBlocks\\QueryTitle::class,
		CoreBlocks\\Search::class,
		CoreBlocks\\Shortcode::class,
		CoreBlocks\\SocialLink::class,
		CoreBlocks\\SocialLinks::class,
		CoreBlocks\\Spacer::class,
		CoreBlocks\\TableOfContents::class,
		CoreBlocks\\TagCloud::class,
		CoreBlocks\\TemplatePart::class,
		CoreBlocks\\Video::class,
		// Design System & Styling
		DesignSystem\\AdminBar::class,
		DesignSystem\\BaseCss::class,
		DesignSystem\\BlockCss::class,
		DesignSystem\\BlockStyles::class,
		DesignSystem\\BlockScripts::class,
		DesignSystem\\BlockSupports::class,
		DesignSystem\\ChildTheme::class,
		DesignSystem\\ConicGradient::class,
		DesignSystem\\CustomProperties::class,
		DesignSystem\\DarkMode::class,
		DesignSystem\\DeprecatedStyles::class,
		DesignSystem\\Emojis::class,
		DesignSystem\\EditorAssets::class,
		DesignSystem\\Layout::class,
		DesignSystem\\Patterns::class,
		DesignSystem\\SystemFonts::class,
		DesignSystem\\Templates::class,
		// Third-party Plugin Integrations
		Integrations\\AffiliateWP::class,
		Integrations\\BbPress::class,
		Integrations\\FluentForms::class,
		Integrations\\GravityForms::class,
		Integrations\\LemonSqueezy::class,
		Integrations\\LifterLMS::class,
		Integrations\\SenseiLMS::class,
		Integrations\\NinjaForms::class,
		Integrations\\SyntaxHighlightingCodeBlock::class,
		Integrations\\WooCommerce::class,
	];

	/**
	 * The full path to the main plugin file or theme's functions.php.
	 *
	 * @var string
	 */
	private string $file;

	/**
	 * ServiceProvider constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file The full path to the main plugin file or theme's functions.php.
	 *                     This is used to correctly resolve asset paths.
	 */
	public function __construct( string $file ) {
		$this->file = $file;
	}

	/**
	 * Registers all framework services with the dependency injection container.
	 *
	 * This method orchestrates the initialization of the framework. It creates the
	 * primary asset managers and then loops through all defined services,
	 * instantiating them and connecting them to the hook and asset systems.
	 *
	 * @since 1.0.0
	 *
	 * @param Container $container The dependency injection container instance.
	 *
	 * @return void
	 */
	public function register( Container $container ): void {
		// Instantiate the primary script and style managers for the framework.
		$scripts = $container->make( Scripts::class, $this->file );
		$styles  = $container->make( Styles::class, $this->file );

		// Loop through and instantiate all registered services.
		foreach ( $this->services as $id ) {
			$service = $container->make( $id );

			// If the service is a valid object, register its hook annotations.
			if ( is_object( $service ) ) {
				Hook::annotations( $service );
			}

			// If the service needs to register scripts, pass the script manager to it.
			if ( $service instanceof Scriptable ) {
				$service->scripts( $scripts );
			}

			// If the service needs to register styles, pass the style manager to it.
			if ( $service instanceof Styleable ) {
				$service->styles( $styles );
			}
		}

		// Finally, register the hook annotations for the asset managers themselves.
		Hook::annotations( $scripts );
		Hook::annotations( $styles );
	}
}
