<?php
/**
 * Title: Product Comparison
 * Slug: product-comparison
 * Categories: commerce
 * Keywords: comparison, compare, table, products, features
 * Description: A side-by-side product comparison table pattern for comparing product features.
 * Viewport Width: 1280
 * Block Types: core/group
 */
?>

<!-- wp:group {"metadata":{"categories":["commerce"],"patternName":"product-comparison","name":"Product Comparison"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"24"} -->
	<h2 class="wp-block-heading has-text-align-center has-24-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Compare Products', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"16"} -->
	<p class="aligncenter has-text-align-center has-16-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'See how our products stack up against each other.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:table {"align":"wide","style":{"typography":{"fontSize":"14px"}}} -->
	<figure class="wp-block-table alignwide" style="font-size:14px">
		<table class="has-fixed-layout">
			<thead>
				<tr>
					<th><?php echo esc_html__( 'Feature', 'aegis' ); ?></th>
					<th><?php echo esc_html__( 'Basic', 'aegis' ); ?></th>
					<th><?php echo esc_html__( 'Standard', 'aegis' ); ?></th>
					<th><?php echo esc_html__( 'Premium', 'aegis' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong><?php echo esc_html__( 'Material', 'aegis' ); ?></strong></td>
					<td><?php echo esc_html__( 'Standard', 'aegis' ); ?></td>
					<td><?php echo esc_html__( 'Premium', 'aegis' ); ?></td>
					<td><?php echo esc_html__( 'Luxury', 'aegis' ); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo esc_html__( 'Warranty', 'aegis' ); ?></strong></td>
					<td><?php echo esc_html__( '1 Year', 'aegis' ); ?></td>
					<td><?php echo esc_html__( '2 Years', 'aegis' ); ?></td>
					<td><?php echo esc_html__( 'Lifetime', 'aegis' ); ?></td>
				</tr>
				<tr>
					<td><strong><?php echo esc_html__( 'Free Shipping', 'aegis' ); ?></strong></td>
					<td>—</td>
					<td>✓</td>
					<td>✓</td>
				</tr>
				<tr>
					<td><strong><?php echo esc_html__( 'Priority Support', 'aegis' ); ?></strong></td>
					<td>—</td>
					<td>—</td>
					<td>✓</td>
				</tr>
				<tr>
					<td><strong><?php echo esc_html__( 'Gift Packaging', 'aegis' ); ?></strong></td>
					<td>—</td>
					<td>—</td>
					<td>✓</td>
				</tr>
			</tbody>
		</table>
	</figure>
	<!-- /wp:table -->
</div>
<!-- /wp:group -->