<?php
/**
 * Title: Pricing Comparison Table
 * Slug: comparison-table
 * Categories: pricing
 * Keywords: pricing, comparison, table, features, matrix, plans
 * Description: A feature comparison table across multiple pricing plans.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["pricing"],"patternName":"comparison-table","name":"Pricing Comparison Table"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Compare Plans', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Find the Right Fit', 'aegis' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:table {"hasFixedLayout":true,"className":"is-style-stripes","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
		<figure class="wp-block-table is-style-stripes" style="margin-top:var(--wp--preset--spacing--md)">
			<table class="has-fixed-layout">
				<thead>
					<tr>
						<th><?php echo esc_html__( 'Feature', 'aegis' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Starter', 'aegis' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Professional', 'aegis' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Enterprise', 'aegis' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo esc_html__( 'Projects', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '3', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '25', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Unlimited', 'aegis' ); ?></td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Team members', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '1', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '10', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Unlimited', 'aegis' ); ?></td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Storage', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '5 GB', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '100 GB', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center"><?php echo esc_html__( '1 TB', 'aegis' ); ?></td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Custom domains', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'API access', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Advanced analytics', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'Priority support', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'SSO / SAML', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
					</tr>
					<tr>
						<td><?php echo esc_html__( 'White-label', 'aegis' ); ?></td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2014;</td>
						<td class="has-text-align-center" data-align="center">&#x2714;</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td class="has-text-align-center" data-align="center"><strong><?php echo esc_html__( '$0/mo', 'aegis' ); ?></strong></td>
						<td class="has-text-align-center" data-align="center"><strong><?php echo esc_html__( '$49/mo', 'aegis' ); ?></strong></td>
						<td class="has-text-align-center" data-align="center"><strong><?php echo esc_html__( '$199/mo', 'aegis' ); ?></strong></td>
					</tr>
				</tfoot>
			</table>
		</figure>
		<!-- /wp:table -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
