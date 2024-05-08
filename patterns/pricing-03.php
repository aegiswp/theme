<?php
/**
 * Title: 03. Pricing Pattern
 * Slug: aegis/pricing-03
 * Categories: pricing
 * Description: Three-columns pricing columns, with headings, paragraphs, separators and call to action buttons
 * Keywords: call to action, pricing, plans
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/separator, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('03. Pricing Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","className":"wp-block-heading","fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-text-align-center has-gigantic-font-size"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php echo esc_html_x('[Description (133 characters): Provide a brief overview of the selling points of the plans.]', 'Replace with a description of the section', 'aegis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"verticalAlignment":"center"} -->
        <div class="wp-block-columns are-vertically-aligned-center">
            <!-- wp:column {"verticalAlignment":"center","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"borderColor":"foreground"} -->
            <div class="wp-block-column is-vertically-aligned-center has-border-color has-foreground-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"gigantic"} -->
                    <h4 class="wp-block-heading has-gigantic-font-size"><?php echo esc_html_x('[Plan]', 'Replace with a descriptive title', 'aegis'); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Description (26 characters): Briefly highlight key features or value.]', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"contrast","fontSize":"gigantic"} -->
                    <h5 class="wp-block-heading has-contrast-color has-text-color has-gigantic-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[$00.00]', 'Replace with plan pricing', 'aegis'); ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[or $00.00 monthly / yearly]', 'Replace with plan pricing discount', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"contrast","textColor":"base","width":100,"className":"is-style-aegis-button-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-aegis-button-shadow-outline">
                        <a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-text-align-center has-tiny-font-size"><?php echo esc_html_x('[Feature Highlight (33 characters):]', 'Replace with a descriptive call-to-action', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size"><?php echo esc_html_x('[Describe a specific feature or set of features.]', 'Replace with a set of features.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:group {"style":{"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
                <div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="border-radius:0px;padding-top:10px;padding-bottom:10px">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"base"} -->
                    <p class="has-text-align-center has-base-color has-text-color" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"borderColor":"foreground","layout":{"type":"default"}} -->
                <div class="wp-block-group has-border-color has-foreground-border-color" style="border-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":4,"fontSize":"gigantic"} -->
                        <h4 class="wp-block-heading has-gigantic-font-size"><?php echo esc_html_x('[Plan]', 'Replace with a descriptive title', 'aegis'); ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Description (26 characters): Briefly highlight key features or value.]', 'Replace with a description of the section', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
                    <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default" />
                    <!-- /wp:separator -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"contrast","fontSize":"gigantic"} -->
                        <h5 class="wp-block-heading has-contrast-color has-text-color has-gigantic-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[$00.00]', 'Replace with plan pricing', 'aegis'); ?></h5>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[or $00.00 monthly / yearly]', 'Replace with plan pricing discount', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"backgroundColor":"contrast","textColor":"base","width":100,"className":"is-style-aegis-button-shadow"} -->
                        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-aegis-button-shadow">
                            <a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->

                    <!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
                    <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default" />
                    <!-- /wp:separator -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                        <p class="has-text-align-center has-tiny-font-size"><?php echo esc_html_x('[Feature Highlight (33 characters):]', 'Replace with a descriptive call-to-action', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size"><?php echo esc_html_x('[Describe a specific feature or set of features.]', 'Replace with a set of features.', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"borderColor":"foreground"} -->
            <div class="wp-block-column is-vertically-aligned-center has-border-color has-foreground-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"gigantic"} -->
                    <h4 class="wp-block-heading has-gigantic-font-size"><?php echo esc_html_x('[Plan]', 'Replace with a descriptive title', 'aegis'); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Description (26 characters): Briefly highlight key features or value.]', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"contrast","fontSize":"gigantic"} -->
                    <h5 class="wp-block-heading has-contrast-color has-text-color has-gigantic-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html_x('[$00.00]', 'Replace with plan pricing', 'aegis'); ?></h5>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[or $00.00 monthly / yearly]', 'Replace with plan pricing discount', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"contrast","textColor":"base","width":100,"className":"is-style-aegis-button-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-aegis-button-shadow-outline">
                        <a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:separator {"backgroundColor":"tertiary","className":"is-style-default"} -->
                <hr class="wp-block-separator has-text-color has-tertiary-color has-alpha-channel-opacity has-tertiary-background-color has-background is-style-default" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"tiny"} -->
                    <p class="has-text-align-center has-tiny-font-size"><?php echo esc_html_x('[Feature Highlight (33 characters):]', 'Replace with a descriptive call-to-action', 'aegis'); ?></p>
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
