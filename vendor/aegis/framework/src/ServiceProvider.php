<?php
/**
 * ServiceProvider.php
 *
 * Service provider for the Aegis WordPress theme framework.
 *
 * Manages registration of services and dependencies for the theme.
 *
 * @package   Aegis\Framework
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework;

use Aegis\Container\Container;
use Aegis\Container\Interfaces\Registerable;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Hooks\Hook;
use function is_object;

/**
 * Service provider.
 *
 * @since 1.0.0
 */
class ServiceProvider implements Registerable {

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
		DesignSystem\DeprecatedStyles::class,
		DesignSystem\Emojis::class,
		DesignSystem\EditorAssets::class,
		DesignSystem\Layout::class,
		DesignSystem\Patterns::class,
		DesignSystem\SystemFonts::class,
		DesignSystem\Templates::class,
		Integrations\FluentForms::class,
		Integrations\WooCommerce::class,
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
	public function __construct( string $file ) {
		$this->file = $file;
	}

	/**
	 * Registers the package configuration and returns instance.
	 *
	 * @param Container $container Dependency injection container.
	 *
	 * @return void
	 */
	public function register( Container $container ): void {
		$scripts = $container->make( Scripts::class, $this->file );
		$styles  = $container->make( Styles::class, $this->file );

		foreach ( $this->services as $id ) {
			$service = $container->make( $id );

			if ( is_object( $service ) ) {
				Hook::annotations( $service );
			}

			if ( $service instanceof Scriptable ) {
				$service->scripts( $scripts );
			}

			if ( $service instanceof Styleable ) {
				$service->styles( $styles );
			}
		}

		Hook::annotations( $scripts );
		Hook::annotations( $styles );
	}
}
