<?php
/**
 * Title: Blog Feed
 * Slug: featured-blog-feed
 * Categories: blog
 * Keywords: blog, featured, articles
 * Description: Blog section with featured article, latest articles list, and newsletter signup.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"featured-blog-feed","name":"Blog Feed"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xs)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"580px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group alignwide"><!-- wp:paragraph {"align":"left","className":"is-style-sub-heading","style":{"typography":{"lineHeight":"0"}}} -->
			<p class="alignleft has-text-align-left is-style-sub-heading alignleft" style="line-height:0"><?php echo esc_html__( 'Blog', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Blog Feed', 'aegis' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15"} -->
		<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( 'This layout is perfect for building a professional news hub or blog, keeping your readers engaged with your most recent content at a glance.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"},"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--xl)"><!-- wp:column {"width":"42%"} -->
		<div class="wp-block-column" style="flex-basis:42%"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
			<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group"><!-- wp:group {"style":{"position":{"type":"relative"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4"} /--></div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","padding":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--sm)"><!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"24"} /-->

						<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":28,"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"lineHeight":"1.7"}},"textColor":"neutral-500","hideReadMore":true} /-->

						<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)"><!-- wp:avatar {"size":32,"style":{"border":{"radius":"50px"}}} /-->

							<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
							<div class="wp-block-group"><!-- wp:post-author-name {"style":{"spacing":{"padding":{"bottom":"0"},"margin":{"bottom":"0"}}}} /-->

								<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-400","fontSize":"12"} /-->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"58%"} -->
		<div class="wp-block-column" style="flex-basis:58%"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--md)"><!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"600","fontStyle":"normal"}},"fontSize":"20"} -->
				<h4 class="wp-block-heading has-20-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Latest Posts', 'aegis' ); ?></h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"elements":{"link":{":hover":{"color":{"text":"var:preset|color|primary"}}}}}} -->
				<p class="undefined"><a href="#"><?php echo esc_html__( 'View Archive →', 'aegis' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
			<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"default"}} -->
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
				<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"width":"52px","height":"52px","style":{"border":{"radius":"50%"}}} /-->

						<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
						<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
							<div class="wp-block-group"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.03em","fontWeight":"600","textDecoration":"none","fontStyle":"normal"}},"textColor":"primary","fontSize":"10"} /-->

								<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-300","fontSize":"10"} -->
								<p class="has-neutral-300-color has-text-color has-10-font-size" style="margin-top:0;margin-bottom:0">|</p>
								<!-- /wp:paragraph -->

								<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-400","fontSize":"10"} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:post-title {"level":6,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"16"} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs","right":"var:preset|spacing|xxs"}},"dimensions":{"minHeight":""}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><!-- wp:icon {"icon":"core/arrow-right","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03a84530\" data-icon=\"wordpress-arrow-right\" style=\"min-width:15px;height:15px\" fill=\"currentColor\"><title id=\"icon-6a2cc03a84530\">Arrow Right Icon</title><path d=\"m14.5 6.5-1 1 3.7 3.7H4v1.6h13.2l-3.7 3.7 1 1 5.6-5.5z\"></path></svg>","style":{"dimensions":{"width":"15px"}}} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->