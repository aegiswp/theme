<?php
/**
 * Title: Team Cards Social
 * Slug: cards-social
 * Categories: team
 * Keywords: team, cards, social, members, staff, profiles
 * Description: Team member cards with photos, roles, bios, and social links.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["team"],"patternName":"cards-social","name":"Team Cards Social"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'The People', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Built by a World-Class Team', 'aegis' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
			<!-- wp:image {"width":"100%","aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
			<figure class="wp-block-image size-full is-resized has-custom-border" style="border-radius:8px"><img alt="" style="border-radius:8px;aspect-ratio:4/3;object-fit:cover;width:100%" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"20"} -->
				<p class="is-style-heading has-20-font-size"><?php echo esc_html__( 'Laura Chen', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Chief Executive Officer', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
			<p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Former VP of Product at a Fortune 500 company. Passionate about building products that make complex things simple.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"left":"16px"},"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				<!-- wp:social-link {"url":"#","service":"x"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
			<!-- wp:image {"width":"100%","aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
			<figure class="wp-block-image size-full is-resized has-custom-border" style="border-radius:8px"><img alt="" style="border-radius:8px;aspect-ratio:4/3;object-fit:cover;width:100%" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"20"} -->
				<p class="is-style-heading has-20-font-size"><?php echo esc_html__( 'Daniel Park', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Chief Technology Officer', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
			<p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Architected systems serving millions of users. Believes that the best infrastructure is the kind you never have to think about.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"left":"16px"},"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				<!-- wp:social-link {"url":"#","service":"github"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
			<!-- wp:image {"width":"100%","aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
			<figure class="wp-block-image size-full is-resized has-custom-border" style="border-radius:8px"><img alt="" style="border-radius:8px;aspect-ratio:4/3;object-fit:cover;width:100%" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"20"} -->
				<p class="is-style-heading has-20-font-size"><?php echo esc_html__( 'Maya Torres', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Head of Design', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
			<p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Award-winning designer who led brand identity for multiple startups. Turns abstract ideas into interfaces people love using.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"left":"16px"},"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				<!-- wp:social-link {"url":"#","service":"dribbble"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
