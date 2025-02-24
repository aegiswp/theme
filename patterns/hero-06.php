<?php
/**
 * Title: 06. Hero Pattern
 * Slug: aegis/hero-06
 * Categories: hero
 * Description: Block pattern featuring a full-screen cover with a centered headline, description, and tagline. Includes highlighted sections for branding or product features with a clean, accessible layout.
 * Keywords: hero, cover, branding, headline, description, tagline
 * Viewport Width: 1400
 * Block Types: core/columns, core/cover, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('06. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/hero-06"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
		<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:0;padding-bottom:0">
					<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"tiny"} -->
					<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
					    <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
					</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","fontSize":"6.5rem"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
					<h2 class="wp-block-heading" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:6.5rem;text-transform:uppercase">
					    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
				    </h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
					<p class="has-text-align-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
					    <?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?>
					</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"0"}}}} -->
				<div class="wp-block-columns are-vertically-aligned-bottom" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0">
					<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"color":{"background":"#1c1c1f66"}}} -->
					<div class="wp-block-column is-vertically-aligned-bottom has-background" style="background-color:#1c1c1f66;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center","isDecorative":true} -->
						<figure class="wp-block-image aligncenter size-thumbnail is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" /></figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
						    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
					    </h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size">
						<?php echo esc_html_x('Provide a concise description, up to 65 characters, summarizing a service of product brand.', 'Replace with a description of the section.', 'aegis'); ?>
						</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"color":{"background":"#1c1c1fad"}}} -->
					<div class="wp-block-column is-vertically-aligned-bottom has-background" style="background-color:#1c1c1fad;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center","isDecorative":true} -->
						<figure class="wp-block-image aligncenter size-thumbnail is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" /></figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
						    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
						</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size">
						    <?php echo esc_html_x('Provide a concise description, up to 65 characters, summarizing a service of product brand.', 'Replace with a description of the section.', 'aegis'); ?>
						</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"color":{"background":"#1c1c1f66"}}} -->
					<div class="wp-block-column is-vertically-aligned-bottom has-background" style="background-color:#1c1c1f66;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center","isDecorative":true} -->
						<figure class="wp-block-image aligncenter size-thumbnail is-resized">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
						    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
						</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size">
						    <?php echo esc_html_x('Provide a concise description, up to 65 characters, summarizing a service of product brand.', 'Replace with a description of the section.', 'aegis'); ?>
						</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"color":{"background":"#1c1c1fad"}}} -->
					<div class="wp-block-column is-vertically-aligned-bottom has-background" style="background-color:#1c1c1fad;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center","isDecorative":true} -->
						<figure class="wp-block-image aligncenter size-thumbnail is-resized">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" />
						</figure>
						<!-- /wp:image -->

						<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
						    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
						</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size">
						    <?php echo esc_html_x('Provide a concise description, up to 65 characters, summarizing a service of product brand.', 'Replace with a description of the section.', 'aegis'); ?>
						</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->