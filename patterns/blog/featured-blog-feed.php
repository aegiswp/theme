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

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"featured-blog-feed","name":"Blog Feed"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignfull is-style-surface has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xs);animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"580px"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
	<div class="wp-block-group has-animation" style="margin-bottom:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
		<div class="wp-block-group alignwide has-animation" style="animation-iteration-count:"><!-- wp:paragraph {"align":"left","className":"is-style-sub-heading","style":{"typography":{"lineHeight":"0"}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
			<p class="alignleft has-text-align-left is-style-sub-heading alignleft has-animation" style="line-height:0;animation-iteration-count:"><?php echo esc_html__( 'Blog', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
			<h2 class="wp-block-heading has-text-align-center has-animation" style="animation-iteration-count:"><?php echo esc_html__( 'Blog Feed', 'aegis' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
		<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter has-animation" style="animation-iteration-count:"><?php echo esc_html__( 'This layout is perfect for building a professional news hub or blog, keeping your readers engaged with your most recent content at a glance.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"},"margin":{"bottom":"var:preset|spacing|xl"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
	<div class="wp-block-columns alignwide has-animation" style="margin-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:column {"width":"42%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
		<div class="wp-block-column has-animation" style="flex-basis:42%;animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
			<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
				<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:group {"style":{"position":{"type":"relative"}},"layout":{"type":"default"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
					<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4"} /--></div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","padding":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
					<div class="wp-block-group has-animation" style="padding-top:var(--wp--preset--spacing--sm);animation-iteration-count:"><!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"24"} /-->

						<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":28,"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"lineHeight":"1.7"}},"textColor":"neutral-500","hideReadMore":true} /-->

						<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
						<div class="wp-block-group has-animation" style="margin-top:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:avatar {"size":32,"style":{"border":{"radius":"50px"}}} /-->

							<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
							<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-author-name {"style":{"spacing":{"padding":{"bottom":"0"},"margin":{"bottom":"0"}}}} /-->

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

		<!-- wp:column {"width":"58%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
		<div class="wp-block-column has-animation" style="flex-basis:58%;animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
			<div class="wp-block-group has-animation" style="margin-bottom:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"600","fontStyle":"normal"}},"fontSize":"20","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
				<h4 class="wp-block-heading has-20-font-size has-animation" style="font-style:normal;font-weight:600;animation-iteration-count:"><?php echo esc_html__( 'Latest Posts', 'aegis' ); ?></h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"elements":{"link":{":hover":{"color":{"text":"var:preset|color|primary"}}}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
				<p style="animation-iteration-count:" class="undefined has-animation"><a href="#"><?php echo esc_html__( 'View Archive →', 'aegis' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
			<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"default"}} -->
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
				<div class="wp-block-group has-white-background-color has-background has-animation" style="border-radius:12px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs);animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
					<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"width":"52px","height":"52px","style":{"border":{"radius":"50%"}}} /-->

						<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
						<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
							<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.03em","fontWeight":"600","textDecoration":"none","fontStyle":"normal"}},"textColor":"primary","fontSize":"10"} /-->

								<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-300","fontSize":"10","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
								<p class="has-neutral-300-color has-text-color has-10-font-size has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:">|</p>
								<!-- /wp:paragraph -->

								<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-400","fontSize":"10"} /-->
							</div>
							<!-- /wp:group -->

							<!-- wp:post-title {"level":6,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"fontSize":"16"} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs","right":"var:preset|spacing|xxs"}},"dimensions":{"minHeight":""}},"layout":{"type":"default"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
					<div class="wp-block-group has-animation" style="padding-top:var(--wp--preset--spacing--xxs);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs);animation-iteration-count:"><!-- wp:image {"className":"is-style-icon","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"},"width":"0px","style":"none"},"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs","right":"var:preset|spacing|xxs"}}},"iconSet":"wordpress","iconName":"arrow-right","iconSize":"15px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-6980ec785d092\u0022 data-icon=\u0022wordpress-arrow-right\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-6980ec785d092\u0022\u003eArrow Right Icon\u003c/title\u003e\u003cpath d=\u0022m14.5 6.5-1 1 3.7 3.7H4v1.6h13.2l-3.7 3.7 1 1 5.6-5.5z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
						<figure class="wp-block-image has-custom-border is-style-icon" style="border-style:none;border-width:0px;border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;padding-top:var(--wp--preset--spacing--xxs);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs);--wp--custom--icon--padding:var(--wp--preset--spacing--xxs) var(--wp--preset--spacing--xxs) var(--wp--preset--spacing--xxs) var(--wp--preset--spacing--xxs);--wp--custom--icon--border-width:0px;--wp--custom--icon--border-style:none;--wp--custom--icon--border-color:;--wp--custom--icon--size:15px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-6980ec785d092&quot; data-icon=&quot;wordpress-arrow-right&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-6980ec785d092&quot;&gt;Arrow Right Icon</title&gt;<path d=&quot;m14.5 6.5-1 1 3.7 3.7H4v1.6h13.2l-3.7 3.7 1 1 5.6-5.5z&quot;&gt;</path&gt;</svg&gt;')"><img alt="" style="border-style:none;border-width:0px;border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%" /></figure>
						<!-- /wp:image -->
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