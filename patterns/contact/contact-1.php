<?php
/**
 * 01. Contact Us Block Pattern
 */
return array(
	'title'	      => __( '01. Contact Us', 'aegis' ),
	'description' => __( 'Contact Us', 'aegis' ),
	'categories'  => array( 'aegis-contact' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"gradient":"diagonal-secondary-to-foreground","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-diagonal-secondary-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<div class="wp-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"7%","right":"7%"}}},"backgroundColor":"secondary","className":"left-bottom"} -->
		<div class="wp-block-group left-bottom has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:7%;padding-bottom:var(--wp--preset--spacing--50);padding-left:7%">
			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">
				<!-- wp:column {"width":"80%"} -->
				<div class="wp-block-column" style="flex-basis:80%">
					<!-- wp:heading {"level":1,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
					<h1 class="wp-block-heading alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">' . esc_html__('[Heading]', 'aegis') . '</h1>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p>' . esc_html__('Contact Paragraph (232 chars): [Craft a friendly invitation for users to seek help or clarification.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:columns -->
					<div class="wp-block-columns">
						<!-- wp:column -->
						<div class="wp-block-column">
							<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} -->
							<h3 class="wp-block-heading has-text-align-left has-large-font-size" style="font-style:normal;font-weight:600">' . esc_html__('Address:', 'aegis') . '</h3>
							<!-- /wp:heading -->

							<!-- wp:paragraph {"align":"left"} -->
							<p class="has-text-align-left">' . esc_html__('[Guide to nearby shops]', 'aegis') . '</p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column">
							<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} -->
							<h3 class="wp-block-heading has-text-align-left has-large-font-size" style="font-style:normal;font-weight:600">' . esc_html__('Telephone:', 'aegis') . '</h3>
							<!-- /wp:heading -->

							<!-- wp:paragraph {"align":"left"} -->
							<p class="has-text-align-left"><a href="#">' . esc_html__('+000 (0)[Phone Number]', 'aegis') . '</a></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column">
							<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} -->
							<h3 class="wp-block-heading has-text-align-left has-large-font-size" style="font-style:normal;font-weight:600">' . esc_html__('Email:', 'aegis') . '</h3>
							<!-- /wp:heading -->

							<!-- wp:paragraph {"align":"left"} -->
							<p class="has-text-align-left"><a href="#">' . esc_html__('[email@address.com]', 'aegis') . '</a></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->

					<!-- wp:spacer {"height":"30px"} -->
					<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"20%"} -->
				<div class="wp-block-column" style="flex-basis:20%"></div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">
				<!-- wp:column {"width":"100%"} -->
				<div class="wp-block-column" style="flex-basis:100%">
					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">' . esc_html__('[FORM GOES HERE]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
);