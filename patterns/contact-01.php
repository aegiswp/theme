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

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. Contact Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('contact', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/contact-01"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"0","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"gradient":"diagonal-tertiary-to-foreground","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-diagonal-tertiary-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
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
                        <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
                    </p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
                    <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">
                        <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
                    </h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <p style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <?php echo esc_html_x('Provide a concise description, up to 230 characters, summarizing a friendly invitation for users to seek help or provide clarification.', 'Replace with a description of the section.', 'aegis'); ?>
                    </p>
                    <!-- /wp:paragraph -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns">
                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600">
                                <?php echo esc_html_x( 'Address:', 'aegis' ); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left"} -->
                            <p class="has-text-align-left">
                                <?php echo esc_html_x( 'Guide to nearby locations', 'aegis' ); ?>
                            </p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600">
                                <?php echo esc_html_x( 'Telephone:', 'aegis' ); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"foreground"} -->
                            <p class="has-text-align-left has-foreground-color has-text-color has-link-color">
                                <a href="#"><?php echo esc_html_x( '+000 (0) Phone Number', 'aegis' ); ?></a>
                            </p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600">
                                <?php echo esc_html_x( 'Email:', 'aegis' ); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground"} -->
                            <p class="has-text-align-left has-foreground-color has-text-color has-link-color">
                                <a href="#"><?php echo esc_html_x( 'email@address.com', 'aegis' ); ?></a>
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
                    <p class="has-text-align-center"><?php echo esc_html_x( '[FORM PLACEHOLDER]', 'aegis' ); ?></p>
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