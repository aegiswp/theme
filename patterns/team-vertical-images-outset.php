<?php
/**
 * Title: Team with vertical covers and text
 * Slug: aegis/team-vertical-images-outset
 * Categories: team
 * Description: A block pattern featuring a team section with team member cover images, vertical text for sections, and content including a tagline, heading, description, and individual staff details.
 * Keywords: about, team, covers, full-width
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/image, core/paragraph, core/heading, core/cover
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('Team Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"top","width":"38%"} -->
        <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:38%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
                <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
                <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--30);margin-left:0;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html_x('[Description (333 characters): Detail the core principles, values, or characteristics of the organization, project or subject.]', 'Replace with a description of the section.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","width":"5%","className":"is-style-hide-mobile"} -->
        <div class="wp-block-column is-vertically-aligned-top is-style-hide-mobile" style="flex-basis:5%">
            <!-- wp:paragraph {"align":"right","style":{"typography":{"fontSize":"5.2rem","lineHeight":"1","writingMode":"vertical-rl","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"3px"}},"textColor":"tertiary"} -->
            <p class="has-text-align-right has-tertiary-color has-text-color" style="font-size:5.2rem;font-style:normal;font-weight:700;letter-spacing:3px;line-height:1;text-transform:uppercase;writing-mode:vertical-rl"><?php echo esc_html_x('[Section]', 'Replace with a descriptive section title.', 'aegis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"19%"} -->
        <div class="wp-block-column" style="flex-basis:19%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":65,"minHeightUnit":"vh","contentPosition":"center center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-dark-shadow"} -->
            <div class="wp-block-cover is-style-dark-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:65vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                    <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|30"},"blockGap":"0"},"border":{"bottom":{"color":"var:preset|color|secondary","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--secondary);border-bottom-width:1px;padding-top:0;padding-bottom:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
                <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x('[Name]', 'Replace with a staff name.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Position]', 'Replace with a job position.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"19%"} -->
        <div class="wp-block-column" style="flex-basis:19%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":65,"minHeightUnit":"vh","contentPosition":"center center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-dark-shadow"} -->
            <div class="wp-block-cover is-style-dark-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:65vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                    <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|30"},"blockGap":"0"},"border":{"bottom":{"color":"var:preset|color|secondary","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--secondary);border-bottom-width:1px;padding-top:0;padding-bottom:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
                <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x('[Name]', 'Replace with a staff name.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Position]', 'Replace with a job position.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"19%"} -->
        <div class="wp-block-column" style="flex-basis:19%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":65,"minHeightUnit":"vh","contentPosition":"center center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-dark-shadow"} -->
            <div class="wp-block-cover is-style-dark-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:65vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                    <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
                    <p class="has-text-align-center has-large-font-size"></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|30"},"blockGap":"0"},"border":{"bottom":{"color":"var:preset|color|secondary","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--secondary);border-bottom-width:1px;padding-top:0;padding-bottom:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
                <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html_x('[Name]', 'Replace with a staff name.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Position]', 'Replace with a job position.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->