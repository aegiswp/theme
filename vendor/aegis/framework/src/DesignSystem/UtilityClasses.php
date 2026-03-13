<?php
/**
 * Utility Classes Component
 *
 * Generates utility CSS classes based on theme.json presets for spacing,
 * typography, layout, and effects.
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\ServiceProvider;

/**
 * Utility Classes generator.
 *
 * @since 1.0.0
 */
class UtilityClasses implements Styleable {

	/**
	 * Spacing sizes from theme.json.
	 *
	 * @var array
	 */
	private array $spacing_sizes = [ 'xxs', 'xs', 'sm', 'md', 'lg', 'xl', 'xxl' ];

	/**
	 * Font sizes to generate utilities for.
	 *
	 * @var array
	 */
	private array $font_sizes = [ '8', '10', '12', '14', '16', '18', '20', '22', '24', '28', '32', '36', '40', '44', '48' ];

	/**
	 * Font weight names from theme.json custom settings.
	 *
	 * @var array
	 */
	private array $font_weights = [
		'thin'       => 'thin',
		'extralight' => 'extra-light',
		'light'      => 'light',
		'regular'    => 'regular',
		'medium'     => 'medium',
		'semibold'   => 'semi-bold',
		'bold'       => 'bold',
		'extrabold'  => 'extra-bold',
		'black'      => 'black',
	];

	/**
	 * Shadow sizes from theme.json.
	 *
	 * @var array
	 */
	private array $shadow_sizes = [ 'none', 'xxs', 'xs', 'sm', 'md', 'lg', 'xl', 'xxl' ];

	/**
	 * Add utility classes CSS to styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$css = $this->generate_css();

		if ( $css ) {
			$styles->add_string( $css );
		}
	}

	/**
	 * Generate all utility CSS.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function generate_css(): string {
		$css = '';

		$css .= $this->generate_spacing_classes();
		$css .= $this->generate_typography_classes();
		$css .= $this->generate_layout_classes();
		$css .= $this->generate_effect_classes();

		return $css;
	}

	/**
	 * Generate spacing utility classes.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function generate_spacing_classes(): string {
		$css = '';

		foreach ( $this->spacing_sizes as $size ) {
			$var = "var(--wp--preset--spacing--{$size})";

			// Padding all sides
			$css .= ".aegis-p-{$size}{padding:{$var}}";

			// Padding directional
			$css .= ".aegis-pt-{$size}{padding-top:{$var}}";
			$css .= ".aegis-pr-{$size}{padding-right:{$var}}";
			$css .= ".aegis-pb-{$size}{padding-bottom:{$var}}";
			$css .= ".aegis-pl-{$size}{padding-left:{$var}}";
			$css .= ".aegis-px-{$size}{padding-left:{$var};padding-right:{$var}}";
			$css .= ".aegis-py-{$size}{padding-top:{$var};padding-bottom:{$var}}";

			// Margin all sides
			$css .= ".aegis-m-{$size}{margin:{$var}}";

			// Margin directional
			$css .= ".aegis-mt-{$size}{margin-top:{$var}}";
			$css .= ".aegis-mr-{$size}{margin-right:{$var}}";
			$css .= ".aegis-mb-{$size}{margin-bottom:{$var}}";
			$css .= ".aegis-ml-{$size}{margin-left:{$var}}";
			$css .= ".aegis-mx-{$size}{margin-left:{$var};margin-right:{$var}}";
			$css .= ".aegis-my-{$size}{margin-top:{$var};margin-bottom:{$var}}";

			// Gap
			$css .= ".aegis-gap-{$size}{gap:{$var}}";
			$css .= ".aegis-gap-x-{$size}{column-gap:{$var}}";
			$css .= ".aegis-gap-y-{$size}{row-gap:{$var}}";
		}

		// Zero spacing
		$css .= '.aegis-p-0{padding:0}';
		$css .= '.aegis-pt-0{padding-top:0}';
		$css .= '.aegis-pr-0{padding-right:0}';
		$css .= '.aegis-pb-0{padding-bottom:0}';
		$css .= '.aegis-pl-0{padding-left:0}';
		$css .= '.aegis-px-0{padding-left:0;padding-right:0}';
		$css .= '.aegis-py-0{padding-top:0;padding-bottom:0}';
		$css .= '.aegis-m-0{margin:0}';
		$css .= '.aegis-mt-0{margin-top:0}';
		$css .= '.aegis-mr-0{margin-right:0}';
		$css .= '.aegis-mb-0{margin-bottom:0}';
		$css .= '.aegis-ml-0{margin-left:0}';
		$css .= '.aegis-mx-0{margin-left:0;margin-right:0}';
		$css .= '.aegis-my-0{margin-top:0;margin-bottom:0}';
		$css .= '.aegis-gap-0{gap:0}';

		// Auto margin
		$css .= '.aegis-m-auto{margin:auto}';
		$css .= '.aegis-mx-auto{margin-left:auto;margin-right:auto}';
		$css .= '.aegis-my-auto{margin-top:auto;margin-bottom:auto}';
		$css .= '.aegis-ml-auto{margin-left:auto}';
		$css .= '.aegis-mr-auto{margin-right:auto}';
		$css .= '.aegis-mt-auto{margin-top:auto}';
		$css .= '.aegis-mb-auto{margin-bottom:auto}';

		return $css;
	}

	/**
	 * Generate typography utility classes.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function generate_typography_classes(): string {
		$css = '';

		// Font sizes
		foreach ( $this->font_sizes as $size ) {
			$css .= ".aegis-text-{$size}{font-size:var(--wp--preset--font-size--{$size})}";
		}
		$css .= '.aegis-text-inherit{font-size:inherit}';

		// Font weights
		foreach ( $this->font_weights as $class => $var ) {
			$css .= ".aegis-font-{$class}{font-weight:var(--wp--custom--font-weight--{$var})}";
		}

		// Text transforms
		$css .= '.aegis-uppercase{text-transform:uppercase}';
		$css .= '.aegis-lowercase{text-transform:lowercase}';
		$css .= '.aegis-capitalize{text-transform:capitalize}';
		$css .= '.aegis-normal-case{text-transform:none}';

		// Text alignment
		$css .= '.aegis-text-left{text-align:left}';
		$css .= '.aegis-text-center{text-align:center}';
		$css .= '.aegis-text-right{text-align:right}';
		$css .= '.aegis-text-justify{text-align:justify}';

		// Text decoration
		$css .= '.aegis-underline{text-decoration:underline}';
		$css .= '.aegis-line-through{text-decoration:line-through}';
		$css .= '.aegis-no-underline{text-decoration:none}';

		// Font style
		$css .= '.aegis-italic{font-style:italic}';
		$css .= '.aegis-not-italic{font-style:normal}';

		// Line height
		$css .= '.aegis-leading-none{line-height:1}';
		$css .= '.aegis-leading-tight{line-height:1.25}';
		$css .= '.aegis-leading-snug{line-height:1.375}';
		$css .= '.aegis-leading-normal{line-height:1.5}';
		$css .= '.aegis-leading-relaxed{line-height:1.625}';
		$css .= '.aegis-leading-loose{line-height:2}';

		// Letter spacing
		$css .= '.aegis-tracking-tighter{letter-spacing:-0.05em}';
		$css .= '.aegis-tracking-tight{letter-spacing:-0.025em}';
		$css .= '.aegis-tracking-normal{letter-spacing:0}';
		$css .= '.aegis-tracking-wide{letter-spacing:0.025em}';
		$css .= '.aegis-tracking-wider{letter-spacing:0.05em}';
		$css .= '.aegis-tracking-widest{letter-spacing:0.1em}';

		// Word break
		$css .= '.aegis-break-normal{word-break:normal;overflow-wrap:normal}';
		$css .= '.aegis-break-words{overflow-wrap:break-word}';
		$css .= '.aegis-break-all{word-break:break-all}';

		// Truncate
		$css .= '.aegis-truncate{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}';

		return $css;
	}

	/**
	 * Generate layout utility classes.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function generate_layout_classes(): string {
		$css = '';

		// Display
		$css .= '.aegis-block{display:block}';
		$css .= '.aegis-inline-block{display:inline-block}';
		$css .= '.aegis-inline{display:inline}';
		$css .= '.aegis-flex{display:flex}';
		$css .= '.aegis-inline-flex{display:inline-flex}';
		$css .= '.aegis-grid{display:grid}';
		$css .= '.aegis-inline-grid{display:inline-grid}';
		$css .= '.aegis-hidden{display:none}';

		// Flex direction
		$css .= '.aegis-flex-row{flex-direction:row}';
		$css .= '.aegis-flex-row-reverse{flex-direction:row-reverse}';
		$css .= '.aegis-flex-col{flex-direction:column}';
		$css .= '.aegis-flex-col-reverse{flex-direction:column-reverse}';

		// Flex wrap
		$css .= '.aegis-flex-wrap{flex-wrap:wrap}';
		$css .= '.aegis-flex-wrap-reverse{flex-wrap:wrap-reverse}';
		$css .= '.aegis-flex-nowrap{flex-wrap:nowrap}';

		// Flex grow/shrink
		$css .= '.aegis-flex-1{flex:1 1 0%}';
		$css .= '.aegis-flex-auto{flex:1 1 auto}';
		$css .= '.aegis-flex-initial{flex:0 1 auto}';
		$css .= '.aegis-flex-none{flex:none}';
		$css .= '.aegis-grow{flex-grow:1}';
		$css .= '.aegis-grow-0{flex-grow:0}';
		$css .= '.aegis-shrink{flex-shrink:1}';
		$css .= '.aegis-shrink-0{flex-shrink:0}';

		// Justify content
		$css .= '.aegis-justify-start{justify-content:flex-start}';
		$css .= '.aegis-justify-end{justify-content:flex-end}';
		$css .= '.aegis-justify-center{justify-content:center}';
		$css .= '.aegis-justify-between{justify-content:space-between}';
		$css .= '.aegis-justify-around{justify-content:space-around}';
		$css .= '.aegis-justify-evenly{justify-content:space-evenly}';

		// Align items
		$css .= '.aegis-items-start{align-items:flex-start}';
		$css .= '.aegis-items-end{align-items:flex-end}';
		$css .= '.aegis-items-center{align-items:center}';
		$css .= '.aegis-items-baseline{align-items:baseline}';
		$css .= '.aegis-items-stretch{align-items:stretch}';

		// Align self
		$css .= '.aegis-self-auto{align-self:auto}';
		$css .= '.aegis-self-start{align-self:flex-start}';
		$css .= '.aegis-self-end{align-self:flex-end}';
		$css .= '.aegis-self-center{align-self:center}';
		$css .= '.aegis-self-stretch{align-self:stretch}';

		// Width
		$css .= '.aegis-w-full{width:100%}';
		$css .= '.aegis-w-screen{width:100vw}';
		$css .= '.aegis-w-auto{width:auto}';
		$css .= '.aegis-w-fit{width:fit-content}';
		$css .= '.aegis-w-min{width:min-content}';
		$css .= '.aegis-w-max{width:max-content}';

		// Height
		$css .= '.aegis-h-full{height:100%}';
		$css .= '.aegis-h-screen{height:100vh}';
		$css .= '.aegis-h-auto{height:auto}';
		$css .= '.aegis-h-fit{height:fit-content}';
		$css .= '.aegis-h-min{height:min-content}';
		$css .= '.aegis-h-max{height:max-content}';

		// Min/Max width
		$css .= '.aegis-min-w-0{min-width:0}';
		$css .= '.aegis-min-w-full{min-width:100%}';
		$css .= '.aegis-max-w-full{max-width:100%}';
		$css .= '.aegis-max-w-none{max-width:none}';

		// Min/Max height
		$css .= '.aegis-min-h-0{min-height:0}';
		$css .= '.aegis-min-h-full{min-height:100%}';
		$css .= '.aegis-min-h-screen{min-height:100vh}';
		$css .= '.aegis-max-h-full{max-height:100%}';
		$css .= '.aegis-max-h-screen{max-height:100vh}';

		// Position
		$css .= '.aegis-static{position:static}';
		$css .= '.aegis-relative{position:relative}';
		$css .= '.aegis-absolute{position:absolute}';
		$css .= '.aegis-fixed{position:fixed}';
		$css .= '.aegis-sticky{position:sticky}';

		// Inset
		$css .= '.aegis-inset-0{inset:0}';
		$css .= '.aegis-top-0{top:0}';
		$css .= '.aegis-right-0{right:0}';
		$css .= '.aegis-bottom-0{bottom:0}';
		$css .= '.aegis-left-0{left:0}';

		// Z-index
		$css .= '.aegis-z-0{z-index:0}';
		$css .= '.aegis-z-10{z-index:10}';
		$css .= '.aegis-z-20{z-index:20}';
		$css .= '.aegis-z-30{z-index:30}';
		$css .= '.aegis-z-40{z-index:40}';
		$css .= '.aegis-z-50{z-index:50}';
		$css .= '.aegis-z-auto{z-index:auto}';

		// Overflow
		$css .= '.aegis-overflow-auto{overflow:auto}';
		$css .= '.aegis-overflow-hidden{overflow:hidden}';
		$css .= '.aegis-overflow-visible{overflow:visible}';
		$css .= '.aegis-overflow-scroll{overflow:scroll}';
		$css .= '.aegis-overflow-x-auto{overflow-x:auto}';
		$css .= '.aegis-overflow-y-auto{overflow-y:auto}';
		$css .= '.aegis-overflow-x-hidden{overflow-x:hidden}';
		$css .= '.aegis-overflow-y-hidden{overflow-y:hidden}';

		// Object fit
		$css .= '.aegis-object-contain{object-fit:contain}';
		$css .= '.aegis-object-cover{object-fit:cover}';
		$css .= '.aegis-object-fill{object-fit:fill}';
		$css .= '.aegis-object-none{object-fit:none}';
		$css .= '.aegis-object-scale-down{object-fit:scale-down}';

		// Aspect ratio
		$css .= '.aegis-aspect-auto{aspect-ratio:auto}';
		$css .= '.aegis-aspect-square{aspect-ratio:1/1}';
		$css .= '.aegis-aspect-video{aspect-ratio:16/9}';

		return $css;
	}

	/**
	 * Generate effect utility classes.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function generate_effect_classes(): string {
		$css = '';

		// Shadows
		foreach ( $this->shadow_sizes as $size ) {
			$css .= ".aegis-shadow-{$size}{box-shadow:var(--wp--preset--shadow--{$size})}";
		}

		// Border radius
		$css .= '.aegis-rounded{border-radius:var(--wp--custom--border--radius)}';
		$css .= '.aegis-rounded-none{border-radius:0}';
		$css .= '.aegis-rounded-sm{border-radius:0.125rem}';
		$css .= '.aegis-rounded-md{border-radius:0.375rem}';
		$css .= '.aegis-rounded-lg{border-radius:0.5rem}';
		$css .= '.aegis-rounded-xl{border-radius:0.75rem}';
		$css .= '.aegis-rounded-2xl{border-radius:1rem}';
		$css .= '.aegis-rounded-3xl{border-radius:1.5rem}';
		$css .= '.aegis-rounded-full{border-radius:9999px}';

		// Border radius directional
		$css .= '.aegis-rounded-t{border-top-left-radius:var(--wp--custom--border--radius);border-top-right-radius:var(--wp--custom--border--radius)}';
		$css .= '.aegis-rounded-r{border-top-right-radius:var(--wp--custom--border--radius);border-bottom-right-radius:var(--wp--custom--border--radius)}';
		$css .= '.aegis-rounded-b{border-bottom-left-radius:var(--wp--custom--border--radius);border-bottom-right-radius:var(--wp--custom--border--radius)}';
		$css .= '.aegis-rounded-l{border-top-left-radius:var(--wp--custom--border--radius);border-bottom-left-radius:var(--wp--custom--border--radius)}';

		// Border
		$css .= '.aegis-border{border:var(--wp--custom--border)}';
		$css .= '.aegis-border-0{border-width:0}';
		$css .= '.aegis-border-t{border-top:var(--wp--custom--border)}';
		$css .= '.aegis-border-r{border-right:var(--wp--custom--border)}';
		$css .= '.aegis-border-b{border-bottom:var(--wp--custom--border)}';
		$css .= '.aegis-border-l{border-left:var(--wp--custom--border)}';

		// Opacity
		$css .= '.aegis-opacity-0{opacity:0}';
		$css .= '.aegis-opacity-5{opacity:0.05}';
		$css .= '.aegis-opacity-10{opacity:0.1}';
		$css .= '.aegis-opacity-20{opacity:0.2}';
		$css .= '.aegis-opacity-25{opacity:0.25}';
		$css .= '.aegis-opacity-30{opacity:0.3}';
		$css .= '.aegis-opacity-40{opacity:0.4}';
		$css .= '.aegis-opacity-50{opacity:0.5}';
		$css .= '.aegis-opacity-60{opacity:0.6}';
		$css .= '.aegis-opacity-70{opacity:0.7}';
		$css .= '.aegis-opacity-75{opacity:0.75}';
		$css .= '.aegis-opacity-80{opacity:0.8}';
		$css .= '.aegis-opacity-90{opacity:0.9}';
		$css .= '.aegis-opacity-95{opacity:0.95}';
		$css .= '.aegis-opacity-100{opacity:1}';

		// Cursor
		$css .= '.aegis-cursor-auto{cursor:auto}';
		$css .= '.aegis-cursor-default{cursor:default}';
		$css .= '.aegis-cursor-pointer{cursor:pointer}';
		$css .= '.aegis-cursor-wait{cursor:wait}';
		$css .= '.aegis-cursor-text{cursor:text}';
		$css .= '.aegis-cursor-move{cursor:move}';
		$css .= '.aegis-cursor-not-allowed{cursor:not-allowed}';

		// Pointer events
		$css .= '.aegis-pointer-events-none{pointer-events:none}';
		$css .= '.aegis-pointer-events-auto{pointer-events:auto}';

		// User select
		$css .= '.aegis-select-none{user-select:none}';
		$css .= '.aegis-select-text{user-select:text}';
		$css .= '.aegis-select-all{user-select:all}';
		$css .= '.aegis-select-auto{user-select:auto}';

		// Visibility
		$css .= '.aegis-visible{visibility:visible}';
		$css .= '.aegis-invisible{visibility:hidden}';

		// Transition
		$css .= '.aegis-transition{transition:var(--wp--custom--transition)}';
		$css .= '.aegis-transition-none{transition:none}';
		$css .= '.aegis-transition-all{transition-property:all;transition-timing-function:ease-in;transition-duration:0.15s}';
		$css .= '.aegis-transition-colors{transition-property:color,background-color,border-color;transition-timing-function:ease-in;transition-duration:0.15s}';
		$css .= '.aegis-transition-opacity{transition-property:opacity;transition-timing-function:ease-in;transition-duration:0.15s}';
		$css .= '.aegis-transition-transform{transition-property:transform;transition-timing-function:ease-in;transition-duration:0.15s}';

		return $css;
	}

	/**
	 * Get all available utility class names organized by category.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_class_list(): array {
		$spacing = [];
		$sizes   = [ 'xxs', 'xs', 'sm', 'md', 'lg', 'xl', 'xxl', '0' ];

		foreach ( $sizes as $size ) {
			$spacing[] = "aegis-p-{$size}";
			$spacing[] = "aegis-pt-{$size}";
			$spacing[] = "aegis-pr-{$size}";
			$spacing[] = "aegis-pb-{$size}";
			$spacing[] = "aegis-pl-{$size}";
			$spacing[] = "aegis-px-{$size}";
			$spacing[] = "aegis-py-{$size}";
			$spacing[] = "aegis-m-{$size}";
			$spacing[] = "aegis-mt-{$size}";
			$spacing[] = "aegis-mr-{$size}";
			$spacing[] = "aegis-mb-{$size}";
			$spacing[] = "aegis-ml-{$size}";
			$spacing[] = "aegis-mx-{$size}";
			$spacing[] = "aegis-my-{$size}";
			$spacing[] = "aegis-gap-{$size}";
		}
		$spacing = array_merge( $spacing, [
			'aegis-m-auto',
			'aegis-mx-auto',
			'aegis-my-auto',
			'aegis-ml-auto',
			'aegis-mr-auto',
			'aegis-mt-auto',
			'aegis-mb-auto',
		] );

		return [
			'spacing'    => $spacing,
			'typography' => [
				'aegis-text-12',
				'aegis-text-14',
				'aegis-text-16',
				'aegis-text-18',
				'aegis-text-20',
				'aegis-text-24',
				'aegis-text-28',
				'aegis-text-32',
				'aegis-font-light',
				'aegis-font-regular',
				'aegis-font-medium',
				'aegis-font-semibold',
				'aegis-font-bold',
				'aegis-uppercase',
				'aegis-lowercase',
				'aegis-capitalize',
				'aegis-text-left',
				'aegis-text-center',
				'aegis-text-right',
				'aegis-underline',
				'aegis-no-underline',
				'aegis-italic',
				'aegis-truncate',
			],
			'layout'     => [
				'aegis-block',
				'aegis-inline-block',
				'aegis-flex',
				'aegis-inline-flex',
				'aegis-grid',
				'aegis-hidden',
				'aegis-flex-row',
				'aegis-flex-col',
				'aegis-flex-wrap',
				'aegis-flex-nowrap',
				'aegis-flex-1',
				'aegis-grow',
				'aegis-shrink-0',
				'aegis-justify-start',
				'aegis-justify-center',
				'aegis-justify-end',
				'aegis-justify-between',
				'aegis-items-start',
				'aegis-items-center',
				'aegis-items-end',
				'aegis-items-stretch',
				'aegis-w-full',
				'aegis-w-auto',
				'aegis-h-full',
				'aegis-h-auto',
				'aegis-relative',
				'aegis-absolute',
				'aegis-sticky',
				'aegis-overflow-hidden',
				'aegis-overflow-auto',
			],
			'effects'    => [
				'aegis-shadow-none',
				'aegis-shadow-xs',
				'aegis-shadow-sm',
				'aegis-shadow-md',
				'aegis-shadow-lg',
				'aegis-shadow-xl',
				'aegis-rounded',
				'aegis-rounded-none',
				'aegis-rounded-sm',
				'aegis-rounded-lg',
				'aegis-rounded-full',
				'aegis-border',
				'aegis-border-0',
				'aegis-opacity-0',
				'aegis-opacity-50',
				'aegis-opacity-100',
				'aegis-cursor-pointer',
				'aegis-transition',
				'aegis-transition-all',
			],
		];
	}
}
