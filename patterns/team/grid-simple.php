<?php
/**
 * Title: Team Grid Simple
 * Slug: grid-simple
 * Categories: team
 * Keywords: team, grid, simple, members, staff
 * Description: A simple grid layout for team members.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["team"],"patternName":"team-grid-simple","name":"Team Grid Simple"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
        <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__('Our Team', 'aegis'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
        <h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__('Meet the Experts', 'aegis'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
        <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__('A talented group of professionals dedicated to delivering exceptional results.', 'aegis'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:image {"width":"280px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"12px"}}} -->
                <figure class="wp-block-image is-resized has-custom-border" style="border-radius:12px"><img alt="" style="border-radius:12px;aspect-ratio:1;object-fit:cover;width:280px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__('Emma Richardson', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__('Lead Designer', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:image {"width":"280px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"12px"}}} -->
                <figure class="wp-block-image is-resized has-custom-border" style="border-radius:12px"><img alt="" style="border-radius:12px;aspect-ratio:1;object-fit:cover;width:280px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__('Marcus Webb', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__('Senior Developer', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:image {"width":"280px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"12px"}}} -->
                <figure class="wp-block-image is-resized has-custom-border" style="border-radius:12px"><img alt="" style="border-radius:12px;aspect-ratio:1;object-fit:cover;width:280px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__('Olivia Santos', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__('Project Manager', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:image {"width":"280px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"12px"}}} -->
                <figure class="wp-block-image is-resized has-custom-border" style="border-radius:12px"><img alt="" style="border-radius:12px;aspect-ratio:1;object-fit:cover;width:280px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__('James Liu', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__('UX Researcher', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->