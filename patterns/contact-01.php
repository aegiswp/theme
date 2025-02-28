<?php
/**
 * Title: 01. Contact Pattern
 * Slug: aegis/contact-01
 * Categories: contact
 * Description: Block pattern featuring a contact section with a tagline, heading, description, contact details (address, telephone, email), and a placeholder for a contact form.
 * Keywords: contact, address, telephone, email, form, inquiry, invitation
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/spacer, core/buttons, core/button
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. Contact Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('contact', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/contact-01"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"0","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"foreground","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-foreground-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","className":"left-bottom","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
    <div class="wp-block-group alignwide left-bottom" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"7%","right":"7%"}}},"backgroundColor":"tertiary"} -->
        <div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:7%;padding-bottom:var(--wp--preset--spacing--30);padding-left:7%">
            <!-- wp:columns {"align":"wide"} -->
            <div class="wp-block-columns alignwide">
                <!-- wp:column {"width":"80%"} -->
                <div class="wp-block-column" style="flex-basis:80%">
                    <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"medium"} -->
                    <p class="has-text-align-left has-medium-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                        <?php echo esc_html_x( 'Get In Touch', 'Contact section tagline (15-25 characters recommended)', 'aegis' ); ?>
                    </p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
                    <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">
                        <?php echo esc_html_x( 'Contact Us', 'Contact section heading (15-30 characters recommended)', 'aegis' ); ?>
                    </h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <p style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <?php echo esc_html_x('Have questions or need assistance? We\'re here to help! Reach out through the form below or use our contact information for direct communication.', 'Contact section description (120-200 characters recommended)', 'aegis'); ?>
                    </p>
                    <!-- /wp:paragraph -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns">
                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600">
                                <?php echo esc_html_x( 'Address:', 'Contact information label for physical location', 'aegis' ); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left"} -->
                            <p class="has-text-align-left">
                                <?php echo esc_html_x( '123 Street Name, City, ST 12345', 'Example address format - customize to your region', 'aegis' ); ?>
                            </p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600">
                                <?php echo esc_html_x( 'Telephone:', 'Contact information label for phone number', 'aegis' ); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"foreground"} -->
                            <p class="has-text-align-left has-foreground-color has-text-color has-link-color">
                                <a href="tel:+15551234567"><?php echo esc_html_x( '+1 (555) 123-4567', 'Example phone number format - customize to your region', 'aegis' ); ?></a>
                            </p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600">
                                <?php echo esc_html_x( 'Email:', 'Contact information label for email address', 'aegis' ); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground"} -->
                            <p class="has-text-align-left has-foreground-color has-text-color has-link-color">
                                <a href="mailto:contact@example.com"><?php echo esc_html_x( 'contact@example.com', 'Example email address format', 'aegis' ); ?></a>
                            </p>
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
                    <p class="has-text-align-center"><?php echo esc_html_x( 'Insert your contact form here. Use a form plugin like Contact Form 7, WPForms, or Gravity Forms.', 'Placeholder text for contact form location', 'aegis' ); ?></p>
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
<!-- /wp:group -->