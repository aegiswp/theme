<?php
/**
 * 01. FAQ Block Pattern
 */
return array(
	'title'	      => __( '01. FAQ', 'aegis' ),
	'description' => __( 'Block Pattern with Headings, Paragraps, Icon, and Accordion', 'aegis' ),
	'categories'  => array( 'aegis-faq' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","className":"about gradient","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('01. FAQ Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull about gradient has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"56.66%","style":{"spacing":{"padding":{"left":"0","right":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--50);padding-left:0;flex-basis:56.66%">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"extra-large"} -->
			<h4 class="wp-block-heading has-extra-large-font-size" style="font-style:normal;font-weight:500">' . esc_html__('[Heading (45 characters): Present a welcoming tone for users queries.]', 'aegis') . '</h4>
			<!-- /wp:heading -->

			<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
			<div class="wp-block-group alignfull faq" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;padding-bottom:0px;padding-left:0px">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"},"top":[],"right":[],"left":[]}},"className":"trigger is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group trigger is-style-default" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
					<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"medium"} -->
					<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:400">
						<strong>' . esc_html__('01.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"large"} -->
					<p class="has-large-font-size"><span class="dashicons dashicons-plus-alt2"></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
				<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
			<div class="wp-block-group alignfull faq" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;padding-bottom:0px;padding-left:0px">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"},"top":[],"right":[],"left":[]}},"className":"trigger is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group trigger is-style-default" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
					<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"medium"} -->
					<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:400">
						<strong>' . esc_html__('02.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"large"} -->
					<p class="has-large-font-size"><span class="dashicons dashicons-plus-alt2"></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
				<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
			<div class="wp-block-group alignfull faq" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;padding-bottom:0px;padding-left:0px">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"},"top":[],"right":[],"left":[]}},"className":"trigger is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group trigger is-style-default" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
					<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"medium"} -->
					<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:400">
						<strong>' . esc_html__('03.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"large"} -->
					<p class="has-large-font-size"><span class="dashicons dashicons-plus-alt2"></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
				<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
			<div class="wp-block-group alignfull faq" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;padding-bottom:0px;padding-left:0px">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"},"top":[],"right":[],"left":[]}},"className":"trigger is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group trigger is-style-default" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
					<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"medium"} -->
					<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:400">
						<strong>' . esc_html__('03.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"large"} -->
					<p class="has-large-font-size"><span class="dashicons dashicons-plus-alt2"></span></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
				<div class="wp-block-group content has-secondary-background-color has-background"
					style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"43.33%","backgroundColor":"foreground"} -->
		<div class="wp-block-column is-vertically-aligned-center has-foreground-background-color has-background" style="flex-basis:43.33%">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"textColor":"background","className":"is-style-default","layout":{"type":"default"}} -->
			<div class="wp-block-group is-style-default has-background-color has-text-color" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","right":"15px","bottom":"15px","left":"15px"},"blockGap":"0"},"border":{"radius":"100px"}},"backgroundColor":"foreground","className":"icon","layout":{"type":"constrained"}} -->
				<div class="wp-block-group icon has-foreground-background-color has-background" style="border-radius:100px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
					<!-- wp:image {"width":"40px","height":"undefinedpx","sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":["#f6f5f2","#f6f5f2"]}}} -->
					<figure class="wp-block-image size-large is-resized"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/questions.svg" alt="' . esc_html__('Describe the icon context', 'aegis') . '" style="width:40px;height:undefinedpx" /></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">' . esc_html__('[Heading (25 characters): Encourage users to seek more information.]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__('[Paragraph (50 characters): Reassure timely feedback or support.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-aegis-button-shadow"} -->
					<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);