<?php
/**
 * Title: 01. Contact Pattern
 * Slug: aegis/contact-1
 * Categories: contact
 * Description: Multicolumn block pattern with heading, paragraph, contact information, and form placeholder
 * Keywords: address, contact, email, form, information, telephone
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/spacer
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"gradient":"diagonal-secondary-to-foreground","layout":{"type":"default"},"metadata":{"name":"<?php echo esc_html_x('01. Contact Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull has-diagonal-secondary-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"left-bottom"} -->
    <div class="wp-block-group alignwide left-bottom" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"7%","right":"7%"}}},"backgroundColor":"secondary"} -->
        <div class="wp-block-group has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:7%;padding-bottom:var(--wp--preset--spacing--50);padding-left:7%">
            <!-- wp:columns {"align":"wide"} -->
            <div class="wp-block-columns alignwide">
                <!-- wp:column {"width":"80%"} -->
                <div class="wp-block-column" style="flex-basis:80%">
                    <!-- wp:heading {"level":1,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
                    <h1 class="wp-block-heading alignwide" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h1>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (232 characters): Craft a friendly invitation for users to seek help or provide clarification.]', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:columns -->
                    <div class="wp-block-columns">
                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_e('Address:', 'aegis'); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left"} -->
                            <p class="has-text-align-left"><?php echo esc_html_e('[Guide to nearby locations]', 'aegis'); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_e('Telephone:', 'aegis'); ?></h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"foreground"} -->
                            <p class="has-text-align-left has-foreground-color has-text-color has-link-color"><a href="#"><?php echo esc_html_e('+000 (0)[Phone Number]', 'aegis'); ?></a></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:column -->

                        <!-- wp:column -->
                        <div class="wp-block-column">
                            <!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_e('Email:', 'aegis'); ?>
                            </h3>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"foreground"} -->
                            <p class="has-text-align-left has-foreground-color has-text-color has-link-color"><a href="#"><?php echo esc_html_e('[email@address.com]', 'aegis'); ?></a></p>
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
                    <p class="has-text-align-center"><?php echo esc_html_x('[FORM PLACEHOLDER]', 'Replace with a form', 'aegis'); ?></p>
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