<?php
/**
 * Title: Stats Progress Bars
 * Slug: progress-bars
 * Categories: stats
 * Keywords: stats, progress, bars, skills, metrics, percentages
 * Description: A stats section with labeled progress bars showing skill or completion percentages.
 * Viewport Width: 1280
 */

$skills = array(
	array(
		'label' => __( 'UX Design', 'aegis' ),
		'value' => 95,
	),
	array(
		'label' => __( 'Frontend Development', 'aegis' ),
		'value' => 90,
	),
	array(
		'label' => __( 'Brand Strategy', 'aegis' ),
		'value' => 85,
	),
	array(
		'label' => __( 'Content Marketing', 'aegis' ),
		'value' => 78,
	),
);
?>

<!-- wp:group {"metadata":{"categories":["stats"],"patternName":"progress-bars","name":"Stats Progress Bars"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|xl"}}}} -->
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
				<?php foreach ( $skills as $skill ) : ?>
					<?php
					$value     = (int) $skill['value'];
					$width     = $value . '%';
					$remainder = ( 100 - $value ) . '%';
					?>
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"className":"is-style-heading","fontSize":"15"} -->
						<p class="is-style-heading has-15-font-size"><?php echo esc_html( $skill['label'] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
						<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html( $width ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"},"border":{"radius":"99px"},"overflow":{"all":"hidden"}},"backgroundColor":"neutral-300","layout":{"type":"default"}} -->
					<div class="wp-block-group has-neutral-300-background-color has-background" style="border-radius:99px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
						<div class="wp-block-columns is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
							<!-- wp:column {"width":"<?php echo esc_attr( $width ); ?>","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"99px"}},"backgroundColor":"primary-500"} -->
							<div class="wp-block-column has-primary-500-background-color has-background" style="border-radius:99px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:<?php echo esc_attr( $width ); ?>">
								<!-- wp:spacer {"height":"12px"} -->
								<div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div>
								<!-- /wp:spacer -->
							</div>
							<!-- /wp:column -->

							<!-- wp:column {"width":"<?php echo esc_attr( $remainder ); ?>","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
							<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:<?php echo esc_attr( $remainder ); ?>">
								<!-- wp:spacer {"height":"12px"} -->
								<div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div>
								<!-- /wp:spacer -->
							</div>
							<!-- /wp:column -->
						</div>
						<!-- /wp:columns -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
