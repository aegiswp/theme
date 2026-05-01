<?php
/**
 * Title: Funnel Squeeze Page
 * Slug: funnel-squeeze
 * Categories: page
 * Keywords: funnel, squeeze, lead, email, optin, woocommerce
 * Description: A high-conversion squeeze page with headline, benefit bullets, and email capture form — uses minimal header/footer.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"funnel-squeeze","name":"Funnel Squeeze Page"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:pattern {"slug":"header-store-minimal"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"textColor":"primary-500","fontSize":"14"} -->
			<p class="aligncenter has-text-align-center has-primary-500-color has-text-color has-14-font-size aligncenter" style="letter-spacing:2px;text-transform:uppercase"><?php echo esc_html__( 'Free Download', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"36"} -->
			<h1 class="wp-block-heading has-text-align-center has-36-font-size" style="line-height:1.2"><?php echo esc_html__( 'Get the Ultimate Guide to Boosting Your Sales', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"16"} -->
			<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Discover the proven strategies that top sellers use to 10x their revenue. Enter your email below to get instant access.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:image {"align":"center","width":"480px","aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"12px"},"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}}} -->
			<figure class="wp-block-image aligncenter is-resized" style="border-radius:12px;margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--sm)"><img alt="" style="aspect-ratio:16/9;object-fit:cover;width:480px" width="480px" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--sm)">
				<!-- wp:paragraph {"fontSize":"16"} -->
				<p class="has-16-font-size"><?php echo esc_html__( '✓ 50+ actionable strategies you can implement today', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"16"} -->
				<p class="has-16-font-size"><?php echo esc_html__( '✓ Real case studies from successful store owners', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"16"} -->
				<p class="has-16-font-size"><?php echo esc_html__( '✓ Step-by-step templates and checklists', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"16"} -->
				<p class="has-16-font-size"><?php echo esc_html__( '✓ Bonus: Conversion optimization worksheet', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:html -->
			<form style="display:flex;flex-direction:column;gap:12px;width:100%;max-width:480px;margin:0 auto">
				<input type="text" placeholder="<?php echo esc_attr__( 'Your first name', 'aegis' ); ?>" style="padding:14px 18px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:8px;font-size:16px" required />
				<input type="email" placeholder="<?php echo esc_attr__( 'Your best email', 'aegis' ); ?>" style="padding:14px 18px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:8px;font-size:16px" required />
				<button type="submit" style="padding:16px 24px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:none;border-radius:8px;font-size:18px;font-weight:600;cursor:pointer"><?php echo esc_html__( 'Send Me the Free Guide →', 'aegis' ); ?></button>
			</form>
			<!-- /wp:html -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-400","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"fontSize":"12"} -->
			<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-12-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'We respect your privacy. Unsubscribe at any time.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"footer-store-minimal"} /-->

</div>
<!-- /wp:group -->
