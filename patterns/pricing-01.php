<?php
/**
 * Title: 01. Pricing Pattern
 * Slug: aegis/pricing-01
 * Categories: pricing
 * Description: Three-column pricing tables with headings, paragraphs, separators and call-to-action buttons
 * Keywords: call to action, pricing, plans
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/separator, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. Pricing Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|30","top":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"wrap"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-right:0;padding-left:0">
            <!-- wp:heading {"textAlign":"center","align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading alignwide has-text-align-center has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
            <p class="has-text-align-center" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><?php echo esc_html_x('[Description (133 characters): Provide a brief overview of the selling points of the plans.]', 'Replace with a description of the section', 'aegis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-columns">
            <!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground"} -->
            <div class="wp-block-column has-border-color has-foreground-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:heading {"level":4,"textColor":"contrast","fontSize":"huge"} -->
                    <h4 class="wp-block-heading has-contrast-color has-text-color has-huge-font-size"><?php echo esc_html_x('[Plan]', 'Replace with a descriptive title', 'aegis'); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('Description (26 characters): Briefly highlight key features or value.', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"dimensions":{"minHeight":""}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"contrast","fontSize":"gigantic"} -->
                    <h5 class="wp-block-heading has-contrast-color has-text-color has-gigantic-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[$00.00]', 'Replace with plan pricing', 'aegis'); ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[or $00.00 monthly / yearly]', 'Replace with plan pricing discount', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"tertiary"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" />
                <!-- /wp:separator -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:button {"backgroundColor":"background","textColor":"foreground","width":100,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-dense-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-dense-shadow-outline">
                        <a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"tertiary"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Feature Highlight (33 characters):]', 'Replace with a descriptive call-to-action', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Describe a specific feature or set of features.]', 'Replace with a set of features.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground","backgroundColor":"foreground","textColor":"background"} -->
            <div class="wp-block-column has-border-color has-foreground-border-color has-background-color has-foreground-background-color has-text-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:heading {"level":4,"textColor":"contrast","fontSize":"huge"} -->
                    <h4 class="wp-block-heading has-contrast-color has-text-color has-huge-font-size"><?php echo esc_html_x('[Plan]', 'Replace with a descriptive title', 'aegis'); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('Description (26 characters): Briefly highlight key features or value.', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"dimensions":{"minHeight":""}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"contrast","fontSize":"gigantic"} -->
                    <h5 class="wp-block-heading has-contrast-color has-text-color has-gigantic-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[$00.00]', 'Replace with plan pricing', 'aegis'); ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[or $00.00 monthly / yearly]', 'Replace with plan pricing discount', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"tertiary"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" />
                <!-- /wp:separator -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:button {"backgroundColor":"foreground","width":100,"className":"is-style-dense-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-dense-shadown-outline">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"tertiary"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Feature Highlight (33 characters):]', 'Replace with a descriptive call-to-action', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Describe a specific feature or set of features.]', 'Replace with a set of features.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground","backgroundColor":"tertiary"} -->
            <div class="wp-block-column has-border-color has-foreground-border-color has-tertiary-background-color has-background"
                style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:heading {"level":4,"textColor":"contrast","fontSize":"huge"} -->
                    <h4 class="wp-block-heading has-contrast-color has-text-color has-huge-font-size"><?php echo esc_html_x('[Plan]', 'Replace with a descriptive title', 'aegis'); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('Description (26 characters): Briefly highlight key features or value.', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"dimensions":{"minHeight":""}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"contrast","fontSize":"gigantic"} -->
                    <h5 class="wp-block-heading has-contrast-color has-text-color has-gigantic-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[$00.00]', 'Replace with plan pricing', 'aegis'); ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[or $00.00 monthly / yearly]', 'Replace with plan pricing discount', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"foreground"} -->
                <hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" />
                <!-- /wp:separator -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:button {"backgroundColor":"tertiary","textColor":"foreground","width":100,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-dense-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-dense-shadow-outline">
                        <a class="wp-block-button__link has-foreground-color has-tertiary-background-color has-text-color has-background has-link-color wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"foreground"} -->
                <hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Feature Highlight (33 characters):]', 'Replace with a descriptive call-to-action', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Describe a specific feature or set of features.]', 'Replace with a set of features.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
