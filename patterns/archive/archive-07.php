<?php
/**
 * Title: 07. Archive Pattern
 * Slug: aegis/archive-07
 * Categories: archives
 * Description: Dual-column author archive layout combining profile, ad space, product feature, and a modern post list with negative margins, overlays, and pagination.
 * Keywords: archive, author, bio, ads, product, grid, blog, pagination
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/column, core/cover, core/group, core/heading, core/image, core/paragraph, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"07. Archive Pattern","categories":["archives"],"patternName":"aegis/archive-07"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);padding-top:0;padding-bottom:0">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%">
			<!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"gradient":"diagonal-contrast-to-transparent-right-bottom"} -->
			<div class="wp-block-group is-style-section-dark has-diagonal-contrast-to-transparent-right-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|small"}}},"backgroundColor":"contrast","layout":{"type":"default"}} -->
				<div class="wp-block-group has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:avatar {"size":100,"align":"center","style":{"border":{"radius":"100%","width":"2px"}},"borderColor":"base"} /-->

					<!-- wp:post-author-name {"textAlign":"center","style":{"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|base"}}}},"fontSize":"large"} /-->

					<!-- wp:post-author-biography {"textAlign":"center","fontSize":"small"} /-->

					<!-- wp:social-links {"iconColor":"tertiary","iconColorValue":"#f3f4f5","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#211F1D","size":"has-small-icon-size","align":"center","className":"is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
					<ul class="wp-block-social-links aligncenter has-small-icon-size has-icon-color has-icon-background-color is-style-default">
						<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"#","service":"bluesky"} /-->

						<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"contrast"} -->
			<div class="wp-block-group is-style-section-dark has-contrast-background-color has-background" style="padding-top:0;padding-bottom:0">
				<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontSize":"small"} -->
				<p class="has-text-align-left has-small-font-size" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);letter-spacing:3px;text-transform:uppercase"><?php esc_html_e('Ad Space', 'aegis'); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
				<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/thumb_1920x1200_dark.webp')); ?>" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|small"}}},"gradient":"diagonal-contrast-to-transparent-left-bottom"} -->
			<div class="wp-block-group is-style-section-dark has-diagonal-contrast-to-transparent-left-bottom-gradient-background has-background" style="padding-bottom:var(--wp--preset--spacing--small)"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
				<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/thumb_1920x1200_dark.webp')); ?>" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|small"}}},"backgroundColor":"contrast","layout":{"type":"default"}} -->
				<div class="wp-block-group has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
					<h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php esc_html_e('Product Name', 'aegis'); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
					<p class="has-text-align-center has-small-font-size"><?php esc_html_e('Short product description or offer.', 'aegis'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-outline-border","style":{"border":{"width":"2px"}},"borderColor":"base"} -->
						<div class="wp-block-button is-style-outline-border"><a class="wp-block-button__link has-border-color has-base-border-color wp-element-button" href="#" style="border-width:2px"><?php esc_html_e('Learn More', 'aegis'); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-bottom:0;flex-basis:66.66%">
			<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
			<div class="wp-block-query alignwide">
				<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"100rem"}} -->
				<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|small"},"padding":{"bottom":"0","right":"0","top":"0"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"tertiary"} -->
				<div class="wp-block-group has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--small);padding-top:0;padding-right:0;padding-bottom:0">
					<!-- wp:group {"backgroundColor":"contrast","layout":{"type":"default"}} -->
					<div class="wp-block-group has-contrast-background-color has-background"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":100,"gradient":"diagonal-transparent-to-tiny-contrast-right-bottom"} /-->

						<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
						<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
							<!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|quinary"}}}}},"textColor":"base","fontSize":"small"} /-->

							<!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|quinary"}}}}},"textColor":"base","fontSize":"small"} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"0","bottom":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)">
						<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"xx-large"} /-->

						<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<!-- /wp:post-template -->

				<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"primary","fontSize":"small","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
				<!-- wp:query-pagination-previous {"label":"Previous Page"} /-->

				<!-- wp:query-pagination-numbers /-->

				<!-- wp:query-pagination-next {"label":"Next Page"} /-->
				<!-- /wp:query-pagination -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
