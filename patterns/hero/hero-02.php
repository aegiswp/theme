<?php
/**
 * Title: 02. Hero Pattern
 * Slug: aegis/hero-02
 * Categories: hero
 * Description: Block pattern featuring a full-screen cover block with a gradient background, headline, description, and a search block for enhanced interactivity, designed to prioritize accessibility and visual appeal.
 * Keywords: hero, cover, headline, search, description, gradient
 * Viewport Width: 1400
 * Block Types: core/cover, core/group, core/heading, core/paragraph, core/search
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/hero-02"},"align":"full","className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-section-dark" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"horizontal-large-foreground-to-small-primary","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|30","bottom":"0","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30);min-height:100vh">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim wp-block-cover__gradient-background has-background-gradient has-horizontal-large-foreground-to-small-primary-gradient-background"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
				<h1 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:400">
					<?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Enter a compelling headline for this section.', 'aegis' ) ); ?>
				</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">
					<?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?>
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"<?php echo esc_attr__('Optional placeholder...', 'aegis'); ?>","buttonText":"<?php echo esc_attr__('Search', 'aegis'); ?>","buttonPosition":"button-inside","backgroundColor":"primary","borderColor":"secondary"} /-->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->
