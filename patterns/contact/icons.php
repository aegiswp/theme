<?php
/**
 * Title: Contact Icons
 * Slug: icons
 * Categories: contact
 * Keywords: contact, icons, info, details
 * Description: Contact information with icons.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["contact"],"patternName":"icons","name":"Contact Icons"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide"><!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"className":"is-style-surface"} -->
			<div class="wp-block-column is-style-surface"><!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/mail","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" xml:space=\"preserve\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03ac2178\" data-icon=\"wordpress-mail\" style=\"min-width:25px;height:25px\" fill=\"currentColor\"><title id=\"icon-6a2cc03ac2178\">Mail Icon</title><path d=\"M19 5H5c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zM4.5 7c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v1.3l-7.6 4.4-7.4-4.3V7zm15 8.6V17c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-6.9l5.9 3.4 1.5.9 1.5-.9 6.1-3.5v5.6z\"></path></svg>","style":{"dimensions":{"width":"25px"}}} /-->
<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"18"} -->
					<h4 class="wp-block-heading has-18-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Email', 'aegis' ); ?></h4>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Submit detailed briefs, or partnership proposals directly to our primary inbox for immediate triage.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"}}}},"textColor":"primary-500"} -->
				<p class="has-primary-500-color has-text-color has-link-color"><a href="mailto:info@youremail.com">info@youremail.com</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-surface"} -->
			<div class="wp-block-column is-style-surface"><!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group"><!-- wp:icon {"icon":"core/mobile","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03ac4888\" data-icon=\"wordpress-mobile\" style=\"min-width:25px;height:25px\" fill=\"currentColor\"><title id=\"icon-6a2cc03ac4888\">Mobile Icon</title><path d=\"M15 4H9c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h6c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H9c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h6c.3 0 .5.2.5.5v12zm-4.5-.5h2V16h-2v1.5z\"></path></svg>","style":{"dimensions":{"width":"25px"}}} /-->
<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"18"} -->
					<h4 class="wp-block-heading has-18-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Phone', 'aegis' ); ?></h4>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Speak immediately with a lead engineer for urgent deployment assistance or high-level sales consultation.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"}}}},"textColor":"primary-500"} -->
				<p class="has-primary-500-color has-text-color has-link-color"><a href="tel:576010192834" data-type="tel" data-id="tel:576010192834">+57 (601) 019-2834</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-surface"} -->
			<div class="wp-block-column is-style-surface"><!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group"><!-- wp:icon {"icon":"core/map-marker","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03acae18\" data-icon=\"wordpress-map-marker\" style=\"min-width:25px;height:25px\" fill=\"currentColor\"><title id=\"icon-6a2cc03acae18\">Map Marker Icon</title><path d=\"M12 9c-.8 0-1.5.7-1.5 1.5S11.2 12 12 12s1.5-.7 1.5-1.5S12.8 9 12 9zm0-5c-3.6 0-6.5 2.8-6.5 6.2 0 .8.3 1.8.9 3.1.5 1.1 1.2 2.3 2 3.6.7 1 3 3.8 3.2 3.9l.4.5.4-.5c.2-.2 2.6-2.9 3.2-3.9.8-1.2 1.5-2.5 2-3.6.6-1.3.9-2.3.9-3.1C18.5 6.8 15.6 4 12 4zm4.3 8.7c-.5 1-1.1 2.2-1.9 3.4-.5.7-1.7 2.2-2.4 3-.7-.8-1.9-2.3-2.4-3-.8-1.2-1.4-2.3-1.9-3.3-.6-1.4-.7-2.2-.7-2.5 0-2.6 2.2-4.7 5-4.7s5 2.1 5 4.7c0 .2-.1 1-.7 2.4z\"></path></svg>","style":{"dimensions":{"width":"25px"}}} /-->
<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"18"} -->
					<h4 class="wp-block-heading has-18-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Address', 'aegis' ); ?></h4>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html__( 'Visit our physical laboratory for in-person workshops, strategic planning sessions, and team immersions.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"}}}},"textColor":"primary-500"} -->
				<p class="has-primary-500-color has-text-color has-link-color"><a href="#map" data-type="internal" data-id="#map">Bogotá, Colombia</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->