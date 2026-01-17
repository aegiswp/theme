<?php
/**
 * Title: Patterns
 * Slug: patterns
 * Categories: utility
 * Inserter: false
 */

declare(strict_types=1);

use Aegis\Utilities\Str;

$all_categories = glob(get_stylesheet_directory() . '/patterns/*', GLOB_ONLYDIR);
$categories = [];
$excluded = ['page', 'template'];

foreach ($all_categories as $category) {
	$slug = basename($category);

	if (!in_array($slug, $excluded, true)) {
		$categories[] = $category;
	}
}

?>

<!-- wp:group {"align":"full","style":{"border":{"top":{"width":"1px"}},"position":{"all":"sticky","mobile":"relative","desktop":"sticky"},"top":{"all":"0px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"zIndex":{"all":"1"},"filter":{"blur":"16","backdrop":true},"display":"","order":"","width":"","maxWidth":""},"className":"is-style-default","layout":{"type":"constrained"},"fontSize":"14","shadowPreset":"md"} -->
<div class="wp-block-group alignfull is-style-default has-14-font-size  has-shadow has-md-shadow"
	style="border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500;backdrop-filter:blur(16px)">
	<!-- wp:spacer {"height":"","style":{"position":{"all":"absolute"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"filter":{"opacity":"50"}},"align":"full","backgroundColor":"neutral-0"} -->
	<div style="height:;filter:opacity(50%)" aria-hidden="true"
		class="wp-block-spacer alignfull has-neutral-0-background-color has-background"></div>
	<!-- /wp:spacer -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"0"}},"typography":{"textDecoration":"none"},"position":{"all":"relative"},"zIndex":{"all":"1"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);text-decoration:none">

		<?php foreach ($categories as $category):

			$title = Str::title_case(basename($category));

			if (in_array(basename($category), ['cta', 'faq'], true)) {
				$title = strtoupper($title);
			}

			?>

			<!-- wp:paragraph -->
			<p>
				<a href="#<?php echo esc_html(basename($category)); ?>">
					<?php echo esc_html($title); ?>
				</a>
			</p>
			<!-- /wp:paragraph -->

		<?php endforeach; ?>

		<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0"}},"display":{"mobile":"none"}},"className":"margin-left-auto"} -->
		<p class="margin-left-auto" style="margin-right:0">
			<a href="#">Top</a>
		</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<?php foreach ($categories as $category): ?>

	<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|md","padding":{"top":"0","bottom":"var:preset|spacing|xxl"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-neutral-100-background-color has-background"
		style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:var(--wp--preset--spacing--xxl)">
		<!-- wp:heading {"textAlign":"wide","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"20"} -->
		<h2 class="wp-block-heading alignwide has-text-align-wide has-20-font-size"
			style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:var(--wp--preset--spacing--xl)">
			<?php
			$title = Str::title_case(basename($category));

			if (in_array(basename($category), ['cta', 'faq'], true)) {
				$title = strtoupper($title);
			}

			?>
			<?php echo esc_html($title); ?>
		</h2>
		<!-- /wp:heading -->

		<?php
		$patterns = glob($category . '/*.php');

		foreach ($patterns as $pattern): ?>

			<?php
			$excluded_patterns = ['color-palette', 'gradients', 'patterns'];
			$slug = basename($pattern, '.php');

			if (in_array($slug, $excluded_patterns, true)) {
				continue;
			}
			?>

			<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"backgroundColor":"neutral-0","className":"is-style-surface","layout":{"type":"default"},"shadowPreset":"md"} -->
			<div class="wp-block-group alignwide is-style-surface has-neutral-0-background-color has-background  has-shadow has-md-shadow"
				style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">

				<?php

				ob_start();

				include $pattern;

				$output = ob_get_clean();

				echo $output;

				?>

			</div>
			<!-- /wp:group -->

		<?php endforeach; ?>

	</div>
	<!-- /wp:group -->

<?php endforeach; ?>