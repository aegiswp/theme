<?php
/**
 * Title: 02. FAQ Pattern
 * Slug: aegis/faq-02
 * Categories: faq
 * Description: A two-column layout with headings and paragraphs on the left and heading, paragraph, and call-to-action button on the right
 * Keywords: faq, questions, answers, support, call to action
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/buttons, core/button, core/details
 * Inserter: true
 * 
 * @package aegis
 * @since Aegis 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. FAQ Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center","width":"56.66%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:56.66%">
            <!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"extra-large"} -->
            <h4 class="wp-block-heading has-extra-large-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Heading (45 characters): Present a welcoming tone for users queries.]', 'Replace with a frequently asked question', 'aegis'); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><?php echo wp_kses_post( _x( '<strong>#.</strong> [Question (57 characters): Frame a frequently asked question about a feature or service.]', 'Replace with a frequently asked question', 'aegis' ) ); ?></summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x(' [Answer (150 characters): [Provide a clear response to a common query.]', 'Replace with a informative answer', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><?php echo wp_kses_post( _x( '<strong>#.</strong> [Question (57 characters): Frame a frequently asked question about a feature or service.]', 'Replace with a frequently asked question', 'aegis' ) ); ?></summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x(' [Answer (150 characters): [Provide a clear response to a common query.]', 'Replace with a informative answer', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><?php echo wp_kses_post( _x( '<strong>#.</strong> [Question (57 characters): Frame a frequently asked question about a feature or service.]', 'Replace with a frequently asked question', 'aegis' ) ); ?></summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x(' [Answer (150 characters): [Provide a clear response to a common query.]', 'Replace with a informative answer', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><?php echo wp_kses_post( _x( '<strong>#.</strong> [Question (57 characters): Frame a frequently asked question about a feature or service.]', 'Replace with a frequently asked question', 'aegis' ) ); ?></summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x(' [Answer (150 characters): [Provide a clear response to a common query.]', 'Replace with a informative answer', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"43.33%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43.33%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
            <div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading"><?php echo esc_html_x('[Heading (25 characters): Encourage users to seek more information.]', 'Replace with a descriptive section title.', 'aegis'); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html_x('[Description (50 characters): Reassure timely feedback or support.]', 'Call to action section text', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-aegis-button-shadow"} -->
                    <div class="wp-block-button is-style-aegis-button-shadow">
                        <a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a>
                    </div>
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
<!-- /wp:group -->