<?php
/**
 * Title: Size Guide
 * Slug: size-guide
 * Categories: commerce
 * Keywords: size, guide, chart, measurements, apparel
 * Description: An expandable size guide table pattern for apparel and clothing stores.
 * Viewport Width: 1280
 * Block Types: core/group
 */
?>

<!-- wp:group {"metadata":{"categories":["commerce"],"patternName":"size-guide","name":"Size Guide"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"800px"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:details {"expandIcon":"chevron"} -->
	<details class="wp-block-details">
		<summary><?php echo esc_html__( 'Size Guide', 'aegis' ); ?></summary><!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"textColor":"neutral-600","fontSize":"14"} -->
			<p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-bottom:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'All measurements are in inches. For the best fit, measure yourself and compare to the chart below.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:table {"style":{"typography":{"fontSize":"14px"}}} -->
			<figure style="font-size:14px" class="wp-block-table">
				<table class="has-fixed-layout">
					<thead>
						<tr>
							<th><?php echo esc_html__( 'Size', 'aegis' ); ?></th>
							<th><?php echo esc_html__( 'Chest', 'aegis' ); ?></th>
							<th><?php echo esc_html__( 'Waist', 'aegis' ); ?></th>
							<th><?php echo esc_html__( 'Hips', 'aegis' ); ?></th>
							<th><?php echo esc_html__( 'Length', 'aegis' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo esc_html__( 'XS', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '32–34', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '24–26', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '34–36', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '25', 'aegis' ); ?></td>
						</tr>
						<tr>
							<td><?php echo esc_html__( 'S', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '34–36', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '26–28', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '36–38', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '26', 'aegis' ); ?></td>
						</tr>
						<tr>
							<td><?php echo esc_html__( 'M', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '36–38', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '28–30', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '38–40', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '27', 'aegis' ); ?></td>
						</tr>
						<tr>
							<td><?php echo esc_html__( 'L', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '38–40', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '30–32', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '40–42', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '28', 'aegis' ); ?></td>
						</tr>
						<tr>
							<td><?php echo esc_html__( 'XL', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '40–42', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '32–34', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '42–44', 'aegis' ); ?></td>
							<td><?php echo esc_html__( '29', 'aegis' ); ?></td>
						</tr>
					</tbody>
				</table>
			</figure>
			<!-- /wp:table -->

			<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"14"} -->
			<h4 class="wp-block-heading has-14-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'How to Measure', 'aegis' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"typography":{"fontSize":"13px"}},"textColor":"neutral-600"} -->
			<ul style="font-size:13px" class="wp-block-list has-neutral-600-color has-text-color"><!-- wp:list-item -->
				<li><strong><?php echo esc_html__( 'Chest:', 'aegis' ); ?></strong> <?php echo esc_html__( 'Measure around the fullest part of your chest.', 'aegis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><strong><?php echo esc_html__( 'Waist:', 'aegis' ); ?></strong> <?php echo esc_html__( 'Measure around your natural waistline.', 'aegis' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><strong><?php echo esc_html__( 'Hips:', 'aegis' ); ?></strong> <?php echo esc_html__( 'Measure around the widest part of your hips.', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->
	</details>
	<!-- /wp:details -->
</div>
<!-- /wp:group -->