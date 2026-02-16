<?php
/**
 * Title: Contact Form Map
 * Slug: form-map
 * Categories: contact
 * Keywords: contact, form, map, location
 * Description: A contact form with embedded map.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["contact"],"patternName":"form-map","name":"Contact Form Map"},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"},"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":"has-text-align-left has-48-font-size"} -->
            <h2 class="wp-block-heading has-text-align-left has-48-font-size"><?php echo esc_html__( 'Contact Us', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:html -->
            <form action="#" method="POST">
                <label for="name"><?php echo esc_html__( 'Name', 'aegis' ); ?></label>
                <input type="text" id="name" name="name" required>
                <label for="email"><?php echo esc_html__( 'Email', 'aegis' ); ?></label>
                <input type="email" id="email" name="email" required>
                <label for="message"><?php echo esc_html__( 'Message', 'aegis' ); ?></label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <div class="wp-block-buttons is-layout-flex">
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Send', 'aegis' ); ?></a></div>
                </div>
            </form>
            <!-- /wp:html -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:aegis/map {"height":"500px","provider":"openstreetmap"} /--></div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->