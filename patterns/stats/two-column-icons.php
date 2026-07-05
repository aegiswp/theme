<?php
/**
 * Title: Stats Two Column Icons
 * Slug: two-column-icons
 * Categories: stats
 * Keywords: stats, two column, icons, numbers, metrics, counters
 * Description: A two-column stats section with icons and descriptions.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["stats"],"patternName":"two-column-icons","name":"Stats Two Column Icons"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"fontSize":"36"} -->
				<h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Numbers That Speak for Themselves', 'aegis' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600"} -->
				<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'We measure our success by the impact we create for our clients. Here are a few highlights from the past year.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-columns">
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":98,"duration":"2","delay":"0","suffix":"%"}},"textColor":"primary-500","fontSize":"40"} -->
					<p class="is-style-counter is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '98%', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
					<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Customer satisfaction rate across all support channels.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":4,"duration":"2","delay":"0","suffix":"M+"}},"textColor":"primary-500","fontSize":"40"} -->
					<p class="is-style-counter is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '4M+', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
					<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Requests processed every day without downtime.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-columns">
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":150,"duration":"2","delay":"0","suffix":"+"}},"textColor":"primary-500","fontSize":"40"} -->
					<p class="is-style-counter is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '150+', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
					<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Enterprise clients across 30 countries trust our platform.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
				<div class="wp-block-column">
					<!-- wp:paragraph {"className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":12,"duration":"2","delay":"0","suffix":"ms"}},"textColor":"primary-500","fontSize":"40"} -->
					<p class="is-style-counter is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '12ms', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
					<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Average API response time, globally distributed.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
