<?php
/**
 * Title: Newsletter Split
 * Slug: split
 * Categories: newsletter
 * Keywords: newsletter, email, subscribe, signup, split, two column
 * Description: A split layout with content on one side and newsletter signup on the other.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["newsletter"],"patternName":"split","name":"Newsletter Split"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
			<p class="is-style-sub-heading"><?php echo esc_html__( 'Newsletter', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"36"} -->
			<h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Insights That Move the Needle', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Every week, we distill the latest trends, strategies, and lessons into a five-minute read. Trusted by founders, designers, and product leaders at companies you admire.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"textColor":"neutral-600","fontSize":"15"} -->
			<ul class="wp-block-list has-neutral-600-color has-text-color has-15-font-size">
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Actionable strategies you can apply today', 'aegis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Early access to new features and tools', 'aegis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Curated resources from across the industry', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Subscribe for Free', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Enter your email to receive weekly updates. No spam, ever.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex"}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
					<!-- wp:button {"backgroundColor":"neutral-800","width":100,"className":"is-style-fill","fontSize":"15"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-neutral-800-background-color has-background" href="#"><?php echo esc_html__( 'Get Started', 'aegis' ); ?></a></div>
<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"12","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
				<p class="has-neutral-400-color has-text-color has-12-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'By subscribing, you agree to our Privacy Policy. Unsubscribe at any time.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
