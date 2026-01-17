<?php
/**
 * Title: Color Palette
 * Slug: color-palette
 * Categories: utility
 */

use Aegis\Utilities\Color;
use Aegis\Utilities\Str;

$global_settings = wp_get_global_settings();
$color_palette = $global_settings['color']['palette']['theme'] ?? [];
$color_slugs = wp_list_pluck($color_palette, 'slug');
$colors = [];
$system_colors = Color::SYSTEM_COLORS;

if (!function_exists('color_palette_grid')) {
	function color_palette_grid(string $name, array $shades): string
	{
		$count = count($shades);
		$columns = $count >= 6 ? 6 : 3;
		$rows = $count > 6 ? 2 : 1;
		$rows_mobile = $count > 6 ? 4 : 1;

		$html = <<<HTML
<!-- wp:group {"style":{"display":{"all":"grid"},"gridTemplateColumns":{"all":"repeat($columns,minmax(0,1fr))","mobile":"repeat(3,minmax(0,1fr))"},"gridTemplateRows":{"all":"repeat($rows,minmax(0,1fr))","mobile":"repeat($rows_mobile,minmax(0,1fr))"}},"layout":{"type":"flex","orientation":"grid"}} -->
<div class="wp-block-group">
HTML;

		$on_click = <<<JS
navigator.clipboard.writeText( '{hex}' );
const copied = this.getElementsByClassName('has-display-none')[0];
copied.classList.remove('has-display-none');
copied.classList.add('has-display-block' );
setTimeout(()=>{
	copied.classList.remove('has-display-block');
	copied.classList.add('has-display-none' );
}, 1000);
JS;

		foreach ($shades as $shade => $hex) {
			$color = $name . '-' . $shade;

			if (in_array($shade, Color::SYSTEM_COLORS, true)) {
				$color = $shade;
			}

			$on_click_value = Str::reduce_whitespace(Str::remove_line_breaks(str_replace('{hex}', $hex, $on_click)));

			$html .= <<<HTML
<!-- wp:group {"style":{"dimensions":{"minHeight":"80px"},"border":{"radius":"10px"},"position":{"all":"relative"},"overflow":{"all":"hidden"}},"gradient":"checkerboard","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"shadowPreset":"xl","onclick":"$on_click_value"} -->
<div class="wp-block-group has-checkerboard-gradient-background has-background has-shadow has-xl-shadow" style="border-radius:10px;min-height:80px">
	<!-- wp:group {"style":{"position":{"all":"absolute"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"zIndex":{"all":"0"}},"backgroundColor":"$color","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-$color-background-color has-background"></div>
	<!-- /wp:group -->
	<!-- wp:paragraph {"className":"screen-reader-text"} -->
	<p class="screen-reader-text">$color: $hex</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"className":"has-display-none","style":{"position":{"all":"relative"}},"zIndex":{"all":"1"}} -->
	<p class="has-display-none">Copied!</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
HTML;
		}

		$html .= <<<HTML
</div>
<!-- /wp:group -->
HTML;

		return $html;
	}
}

foreach ($color_palette as $color) {
	$exploded = explode('-', $color['slug']);
	$name = $exploded[0] ?? '';
	$shade = $exploded[1] ?? '';

	if (in_array($name, $system_colors, true)) {
		continue;
	}

	if (!isset($colors[$name])) {
		$colors[$name] = [];
	}

	$colors[$name][$shade] = $color['color'];
}

$width_50 = 'calc(50% - (var(--wp--style--block-gap) / 2))';
$system = [
	'current' => 'currentColor',
	'inherit' => 'inherit',
	'transparent' => 'transparent',
];

?>
<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group">

	<?php foreach ($colors as $color_name => $shades): ?>
		<?php $width = count($shades) < 6 ? $width_50 : '100%'; ?>

		<!-- wp:group {"style":{"width":{"mobile":"100%","desktop":"<?php echo esc_attr($width); ?>"}},"layout":{"type":"default"},"fontSize":"14"} -->
		<div class="wp-block-group has-14-font-size">
			<!-- wp:heading {"level":3,"textColor":"gray-400","fontSize":"16"} -->
			<h3 class="wp-block-heading has-gray-400-color has-text-color has-16-font-size">
				<?php echo esc_html(Str::title_case($color_name)); ?>
			</h3>
			<!-- /wp:heading -->

			<?php echo color_palette_grid($color_name, $shades); ?>
		</div>
		<!-- /wp:group -->
	<?php endforeach; ?>

	<!-- wp:group {"style":{"width":{"mobile":"100%","desktop":"<?php echo esc_attr($width_50); ?>"}},"layout":{"type":"default"},"fontSize":"14"} -->
	<div class="wp-block-group has-14-font-size">
		<!-- wp:heading {"level":3,"textColor":"gray-400","fontSize":"16"} -->
		<h3 class="wp-block-heading has-gray-400-color has-text-color has-16-font-size">
			<?php echo esc_html(Str::title_case('system')); ?>
		</h3>
		<!-- /wp:heading -->

		<?php echo color_palette_grid('system', $system); ?>
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->