<?php
/**
 * 02. FAQ Block Pattern
 */
return array(
	'title'	      => __( '02. FAQ', 'aegis' ),
	'description' => __( 'FAQ', 'aegis' ),
	'categories'  => array( 'aegis-faq' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center","width":"56.66%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:56.66%">
            <!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"extra-large"} -->
            <h4 class="wp-block-heading has-extra-large-font-size" style="font-style:normal;font-weight:400">' . esc_html__('Heading Format (45 chars): [Present a ', 'aegis') . ' <strong>' . esc_html__('welcoming tone', 'aegis') . '</strong> ' . esc_html__('for users queries.]', 'aegis') . '</h4>
            <!-- /wp:heading -->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary>' . esc_html__('01. FAQ Question Format (57 chars): [Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">' . esc_html__('FAQ Answer Format (150 chars): [Provide a clear response to a common user query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary>' . esc_html__('02. FAQ Question Format (57 chars): [Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">' . esc_html__('FAQ Answer Format (150 chars): [Provide a clear response to a common user query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary>' . esc_html__('03. FAQ Question Format (57 chars): [Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">' . esc_html__('FAQ Answer Format (150 chars): [Provide a clear response to a common user query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size"
                    style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary>' . esc_html__('04. FAQ Question Format (57 chars): [Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">' . esc_html__('FAQ Answer Format (150 chars): [Provide a clear response to a common user query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} -->
                <details class="wp-block-details has-medium-font-size"
                    style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <summary>' . esc_html__('05. FAQ Question Format (57 chars): [Frame a frequently asked question about a feature or service.]', 'aegis') . '</summary>
                    <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"secondary","fontSize":"small"} -->
                    <p class="has-secondary-background-color has-background has-small-font-size" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">' . esc_html__('FAQ Answer Format (150 chars): [Provide a clear response to a common user query.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"43.33%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43.33%">
            <!-- wp:spacer {"className":"hide-on-mobile"} -->
            <div style="height:100px" aria-hidden="true" class="wp-block-spacer hide-on-mobile"></div>
            <!-- /wp:spacer -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
            <div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading">' . esc_html__('Heading Format (25 chars): [Encourage users to seek more information.]', 'aegis') . '</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>' . esc_html__('Response Assurance Format (50 chars): [Reassure users of timely feedback or support.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-aegis-button-shadow"} -->
                    <div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
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