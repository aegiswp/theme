<?php
/**
 * Title: Stats Progress Bars
 * Slug: progress-bars
 * Categories: stats
 * Keywords: stats, progress, bars, skills, metrics, percentages
 * Description: A stats section with labeled progress bars showing skill or completion percentages.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["stats"],"patternName":"progress-bars","name":"Stats Progress Bars"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
			<p class="is-style-sub-heading"><?php echo esc_html__( 'Our Expertise', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"36"} -->
			<h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Skills That Deliver Results', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Years of experience across multiple disciplines allow us to approach every project with confidence and precision.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"className":"is-style-heading","fontSize":"15"} -->
						<p class="is-style-heading has-15-font-size"><?php echo esc_html__( 'UX Design', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
						<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '95%', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"8px"}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-neutral-200-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0">
						<!-- wp:group {"style":{"dimensions":{"minHeight":"8px"},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-500","layout":{"type":"constrained","contentSize":"95%"}} -->
						<div class="wp-block-group has-primary-500-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0"></div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"className":"is-style-heading","fontSize":"15"} -->
						<p class="is-style-heading has-15-font-size"><?php echo esc_html__( 'Frontend Development', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
						<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '90%', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"8px"}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-neutral-200-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0">
						<!-- wp:group {"style":{"dimensions":{"minHeight":"8px"},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-500","layout":{"type":"constrained","contentSize":"90%"}} -->
						<div class="wp-block-group has-primary-500-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0"></div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"className":"is-style-heading","fontSize":"15"} -->
						<p class="is-style-heading has-15-font-size"><?php echo esc_html__( 'Brand Strategy', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
						<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '85%', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"8px"}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-neutral-200-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0">
						<!-- wp:group {"style":{"dimensions":{"minHeight":"8px"},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-500","layout":{"type":"constrained","contentSize":"85%"}} -->
						<div class="wp-block-group has-primary-500-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0"></div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"className":"is-style-heading","fontSize":"15"} -->
						<p class="is-style-heading has-15-font-size"><?php echo esc_html__( 'Content Marketing', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
						<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '78%', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"8px"}},"backgroundColor":"neutral-200","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-neutral-200-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0">
						<!-- wp:group {"style":{"dimensions":{"minHeight":"8px"},"border":{"radius":"99px"},"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-500","layout":{"type":"constrained","contentSize":"78%"}} -->
						<div class="wp-block-group has-primary-500-background-color has-background" style="border-radius:99px;min-height:8px;padding-top:0;padding-bottom:0"></div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
