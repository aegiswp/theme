<?php
/**
 * 03. Blog Archive Block Pattern
 */
return array(
	'title'	  => __( '03. Blog Archive', 'aegis' ),
	'description' => __( 'Blog Archive', 'aegis' ),
	'categories' => array( 'aegis-query' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"className":"blog-sidebar","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull blog-sidebar" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-right:0;padding-left:0">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"width":"33.33%","className":"hide-on-mobile"} -->
			<div class="wp-block-column hide-on-mobile" style="flex-basis:33.33%">
				<!-- wp:group {"align":"wide","layout":{"inherit":true,"type":"constrained"}} -->
				<div class="wp-block-group alignwide">
					<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40","top":"var:preset|spacing|40","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
					<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"is-resized is-style-rounded"} -->
						<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_120x120_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
						<!-- /wp:image -->

						<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
						<p class="has-text-align-center has-large-font-size" style="font-style:normal;font-weight:700">' . esc_html__('[Author Name]', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"5px"}}},"fontSize":"tiny"} -->
						<p class="has-text-align-center has-tiny-font-size"
							style="margin-top:5px;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">' . esc_html__('[Position]', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size">' . esc_html__('Author Intro (161 chars): [Introduce oneself and set the tone or purpose of the content.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#211F1D","openInNewTab":true,"className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
						<ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default">
							<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

							<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

							<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

							<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
						</ul>
						<!-- /wp:social-links -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}}},"backgroundColor":"septenary","className":"is-style-aegis-border"} -->
				<div class="wp-block-group is-style-aegis-border has-septenary-background-color has-background"
					style="padding-bottom:var(--wp--preset--spacing--40)">
					<!-- wp:image {"align":"center","sizeSlug":"full","linkDestination":"none"} -->
					<figure class="wp-block-image aligncenter size-full"></figure>
					<!-- /wp:image -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40"}}}} -->
					<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} -->
						<h3 class="wp-block-heading has-text-align-center has-large-font-size" style="font-style:normal;font-weight:700">' . esc_html__('[Product Name]', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size">' . esc_html__('Product Description (88 chars): [Detail key aspects or selling points of a product.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button">' . esc_html__('Call to Action', 'aegis') . '</a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%">
				<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"right":"0"}}}} -->
				<div class="wp-block-group alignfull" style="padding-right:0">
					<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"className":"is-style-default","layout":{"type":"default"}} -->
					<div class="wp-block-group is-style-default" style="padding-right:0;padding-left:0">
						<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"enhancedPagination":true} -->
						<div class="wp-block-query">
							<!-- wp:post-template {"layout":{"type":"default"}} -->
							<!-- wp:post-featured-image {"isLink":true,"style":{"color":{"duotone":"unset"}},"className":"is-style-default"} /-->

							<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
							<div class="wp-block-group" style="padding-top:0;padding-bottom:0">
								<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
								<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
									<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"10px","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"var(--wp--custom--typography--font-size--huge, clamp(2.25rem, 4vw, 2.75rem))"} /-->

									<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","bottom":"0","left":"0"},"margin":{"bottom":"0","top":"10px"}}},"layout":{"type":"flex"}} -->
									<div class="wp-block-group" style="margin-top:10px;margin-bottom:0;padding-right:0;padding-bottom:0;padding-left:0">
										<!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"5px","right":"15px","bottom":"5px","left":"15px"}}},"backgroundColor":"senary","fontSize":"tiny"} /-->
									</div>
									<!-- /wp:group -->

									<!-- wp:post-excerpt {"moreText":"Read More","className":"is-style-default"} /-->
								</div>
								<!-- /wp:group -->
							</div>
							<!-- /wp:group -->
							<!-- /wp:post-template -->

							<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"},"fontSize":"small"} -->
							<!-- wp:query-pagination-previous /-->

							<!-- wp:query-pagination-numbers /-->

							<!-- wp:query-pagination-next /-->
							<!-- /wp:query-pagination -->
						</div>
						<!-- /wp:query -->
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
</div>
<!-- /wp:group -->',
);