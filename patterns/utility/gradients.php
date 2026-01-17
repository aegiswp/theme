<?php
/**
 * Title: Gradients
 * Slug: gradients
 * Categories: utility
 */

use Aegis\Utilities\Str;

$global_settings = wp_get_global_settings();
$gradients = $global_settings['color']['gradients']['theme'] ?? [];
$defaults = $global_settings['color']['gradients']['default'] ?? [];
$rows_desktop = count($gradients) > 12 ? 3 : 2;
$rows_mobile = count($gradients) > 12 ? 6 : 4;

$on_click = <<<JS
navigator.clipboard.writeText( '{gradient}' );
const copied = this.getElementsByClassName('has-display-none')[0];
copied.classList.remove('has-display-none');
copied.classList.add('has-display-block' );
setTimeout(()=>{
	copied.classList.remove('has-display-block');
	copied.classList.add('has-display-none' );
}, 1000);
JS;

$item = <<<HTML
<!-- wp:group {"style":{"dimensions":{"minHeight":"80px"},"border":{"radius":"10px"},"position":{"all":"relative"},"overflow":{"all":"hidden"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"gradient":"checkerboard","shadowPreset":"xl","onclick":"{on_click_value}"} -->
<div class="wp-block-group has-checkerboard-gradient-background has-background has-shadow has-xl-shadow" style="border-radius:10px;min-height:80px;">
	<!-- wp:group {"style":{"position":{"all":"absolute"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"zIndex":{"all":"0"}},"gradient":"{slug}","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-{slug}-gradient-background has-background"></div>
	<!-- /wp:group -->
	<!-- wp:paragraph {"className":"screen-reader-text"} -->
	<p class="screen-reader-text">{slug}: {value}</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"className":"has-display-none","style":{"position":{"all":"relative"}},"zIndex":{"all":"1"}} -->
	<p class="has-display-none">Copied!</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
HTML;

?>
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">

	<!-- wp:group {"layout":{"type":"default"},"fontSize":"14"} -->
	<div class="wp-block-group has-14-font-size">
		<!-- wp:heading {"level":3,"textColor":"gray-400","fontSize":"16"} -->
		<h3 class="wp-block-heading has-gray-400-color has-text-color has-16-font-size">
			<?php echo esc_html(Str::title_case('theme')); ?>
		</h3>
		<!-- /wp:heading -->

		<!-- wp:group {"style":{"display":{"all":"grid"},"gridTemplateColumns":{"all":"repeat(6,minmax(0,1fr))","mobile":"repeat(3,minmax(0,1fr))"},"gridTemplateRows":{"all":"repeat(<?php echo esc_attr($rows_desktop); ?>,minmax(0,1fr))","mobile":"repeat(<?php echo esc_attr($rows_mobile); ?>,minmax(0,1fr))"}},"layout":{"type":"flex","orientation":"grid"}} -->
		<div class="wp-block-group">

			<?php foreach ($gradients as $gradient):
				$slug = $gradient['slug'] ?? '';
				$value = $gradient['gradient'] ?? '';
				$on_click_value = Str::reduce_whitespace(Str::remove_line_breaks(str_replace('{gradient}', $value, $on_click)));
				echo str_replace(['{slug}', '{value}', '{on_click_value}'], [$slug, $value, $on_click_value], $item);
			endforeach; ?>

		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"default"},"fontSize":"14"} -->
	<div class="wp-block-group has-14-font-size">
		<!-- wp:heading {"level":3,"textColor":"gray-400","fontSize":"16"} -->
		<h3 class="wp-block-heading has-gray-400-color has-text-color has-16-font-size">
			<?php echo esc_html(Str::title_case('default')); ?>
		</h3>
		<!-- /wp:heading -->

		<!-- wp:group {"style":{"display":{"all":"grid"},"gridTemplateColumns":{"all":"repeat(6,minmax(0,1fr))","mobile":"repeat(3,minmax(0,1fr))"},"gridTemplateRows":{"all":"repeat(2,minmax(0,1fr))","mobile":"repeat(4,minmax(0,1fr))"}},"layout":{"type":"flex","orientation":"grid"}} -->
		<div class="wp-block-group">

			<?php foreach ($defaults as $gradient):
				$slug = $gradient['slug'] ?? '';
				$value = $gradient['gradient'] ?? '';
				$on_click_value = Str::reduce_whitespace(Str::remove_line_breaks(str_replace('{gradient}', $value, $on_click)));
				echo str_replace(['{slug}', '{value}', '{on_click_value}'], [$slug, $value, $on_click_value], $item);
			endforeach; ?>

		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->