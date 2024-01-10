<?php
/**
 * 02. FAQ Block Pattern
 */
return array(
	'title'	      => __( '02. FAQ', 'aegis' ),
	'description' => __('Block Pattern with Headings, Paragraps, and Accordion', 'aegis' ),
	'categories'  => array( 'aegis-faq' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"' . esc_html__('02. FAQ Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center","width":"56.66%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:56.66%">
            <!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"extra-large"} -->
            <h4 class="wp-block-heading has-extra-large-font-size" style="font-style:normal;font-weight:400">' . esc_html__('[Heading (45 characters): Present a welcoming tone for users queries.]', 'aegis') . '</h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><strong>' . esc_html__('01.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><strong>' . esc_html__('02.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><strong>' . esc_html__('03.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">' . esc_html__('[Answer (150 characters): [Provide a clear response to a common query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary><strong>' . esc_html__('04.', 'aegis') . '</strong> ' . esc_html__('[Question (57 characters): Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">[Answer (150 characters): [Provide a clear response to a common query.]</p>
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
                <h3 class="wp-block-heading">' . esc_html__('[Heading (25 characters): Encourage users to seek more information.]', 'aegis') . '</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>' . esc_html__('[Paragraph (50 characters): Reassure timely feedback or support.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
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