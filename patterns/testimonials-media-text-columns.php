<?php
/**
 * Title: Testimonials with animated typing text, paragraphs, and media
 * Slug: aegis/testimonials-media-text-columns
 * Categories: testimonials
 * Description: Testimonians with animated heading, text, and media images
 * Keywords: testimonials
 * Viewport Width: 1500
 * Block Types:
 * Post Types:
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"4rem","top":"4rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:4rem;padding-bottom:4rem">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"lineHeight":"1.6","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
            <h5 class="wp-block-heading has-text-align-center has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.6"><?php echo esc_html__('Voices & Verdicts'); ?></h5>
            <!-- /wp:heading -->
            <!-- wp:aegis-companion/typing-text {"typingTexts":["<?php echo esc_html__('Invaded', 'aegis'); ?>","<?php echo esc_html__('Assimilated', 'aegis'); ?>","<?php echo esc_html__('Colonized', 'aegis'); ?>"],"typingDecoration":"underline","textAlign":"center","style":{"typography":{"lineHeight":"1.3"}},"fontSize":"large-plus"} -->
            <div style="line-height:1.3;text-align:center" class="wp-block-aegis-companion-typing-text has-large-plus-font-size">
                <div class="aegis-typing-wrapper"><span class="aegis-typing-prefix"><?php echo esc_html__('Perspectives from'); ?></span>
                    <span class="aegis-typing-data hidden" style="text-decoration:underline">
                        <span class="aegis-typing-item"><?php echo esc_html__('Invaded', 'aegis'); ?></span>
                        <span class="aegis-typing-item"><?php echo esc_html__('Assimilated', 'aegis'); ?></span>
                        <span class="aegis-typing-item"><?php echo esc_html__('Colonized', 'aegis'); ?></span>
                    </span><span class="aegis-typing-action" style="text-decoration:underline"></span>
                    <span class="aegis-typing-suffix"><?php echo esc_html__('Worlds', 'aegis'); ?></span>
                </div>
            </div>
            <!-- /wp:aegis-companion/typing-text -->
            <!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}},"animationStyle":""} -->
            <div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--60)">
                <!-- wp:column {"animationStyle":"aegisFadeInUp"} -->
                <div class="wp-block-column aegis-animation" style="--aegis-animation-name:aegisFadeInUp">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"5px"}},"backgroundColor":"midground","className":"is-style-hover-bg","layout":{"type":"constrained"},"animationStyle":""} -->
                    <div class="wp-block-group is-style-hover-bg has-midground-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
                        <!-- wp:paragraph {"fontSize":"tiny-plus"} -->
                        <p class="has-tiny-plus-font-size"><?php echo wp_kses_post(__('<strong>“Our planet was on the brink of ecological collapse</strong>, but Aegian technology revolutionized our sustainability efforts. Now, we have cleaner energy, better healthcare, and a restored natural ecosystem. The Aegians have become our allies in survival.<strong>”</strong>', 'aegis')); ?></p>
                        <!-- /wp:paragraph -->
                        <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"margin":{"bottom":"0px"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
                        <div class="wp-block-columns is-not-stacked-on-mobile" style="margin-bottom:0px">
                            <!-- wp:column {"width":"33.33%"} -->
                            <div class="wp-block-column" style="flex-basis:33.33%">
                                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"width":"3px"}},"borderColor":"primary","className":"is-style-rounded"} -->
                                <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/testimonial-yurenthia.jpg" alt="<?php echo esc_attr('Yurenthia', 'aegis'); ?>" class="has-border-color has-primary-border-color" style="border-width:3px;aspect-ratio:1;object-fit:cover" /></figure>
                                <!-- /wp:image -->
                            </div>
                            <!-- /wp:column -->
                            <!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"0"}}} -->
                            <div class="wp-block-column" style="flex-basis:66.66%">
                                <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.6"><?php echo esc_html__('Yurenthia', 'aegis'); ?></p>
                                <!-- /wp:paragraph -->
                                <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"Meta","fontSize":"tiny"} -->
                                <p class="has-meta-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__('from Planet Yuralis', 'aegis'); ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"animationStyle":"aegisFadeInUp"} -->
                <div class="wp-block-column aegis-animation" style="--aegis-animation-name:aegisFadeInUp">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"5px"}},"className":"is-style-hover-bg","layout":{"type":"constrained"},"animationStyle":"","animationSpeed":"xslow","animationDelay":""} -->
                    <div class="wp-block-group is-style-hover-bg" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
                        <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
                        <div class="wp-block-columns is-not-stacked-on-mobile">
                            <!-- wp:column {"width":"33.33%"} -->
                            <div class="wp-block-column" style="flex-basis:33.33%">
                                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"width":"3px"}},"borderColor":"primary","className":"is-style-rounded"} -->
                                <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/testimonial-zorlox.jpg" alt="<?php echo esc_attr('Zorlox', 'aegis'); ?>" class="has-border-color has-primary-border-color" style="border-width:3px;aspect-ratio:1;object-fit:cover" /></figure>
                                <!-- /wp:image -->
                            </div>
                            <!-- /wp:column -->
                            <!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"0"}}} -->
                            <div class="wp-block-column" style="flex-basis:66.66%">
                                <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":1.6}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.6"><?php echo esc_html__('Zorlox', 'aegis'); ?></p>
                                <!-- /wp:paragraph -->
                                <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"Meta","fontSize":"tiny"} -->
                                <p class="has-meta-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__('from Planet Xarnox', 'aegis'); ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                        <!-- wp:paragraph {"fontSize":"tiny-plus"} -->
                        <p class="has-tiny-plus-font-size"><?php echo wp_kses_post(__('<strong>“We were a fractured society</strong>, constantly clashing over dwindling resources. Aegian intervention unified us and introduced cutting-edge technology. We are now a society in harmony, making efficient use of our own resources. They have guided us into a new era of peace.<strong>”</strong>', 'aegis')); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"animationStyle":"aegisFadeInUp"} -->
                <div class="wp-block-column aegis-animation" style="--aegis-animation-name:aegisFadeInUp">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"5px"}},"className":"is-style-hover-bg","layout":{"type":"constrained"},"animationStyle":""} -->
                    <div class="wp-block-group is-style-hover-bg" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
                        <!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
                        <div class="wp-block-columns is-not-stacked-on-mobile">
                            <!-- wp:column {"width":"33.33%"} -->
                            <div class="wp-block-column" style="flex-basis:33.33%">
                                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"width":"3px"}},"borderColor":"primary","className":"is-style-rounded"} -->
                                <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/testimonial-zalthar.jpg" alt="<?php echo esc_attr('Zalthar', 'aegis'); ?>" class="has-border-color has-primary-border-color" style="border-width:3px;aspect-ratio:1;object-fit:cover" /></figure>
                                <!-- /wp:image -->
                            </div>
                            <!-- /wp:column -->
                            <!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"0"}}} -->
                            <div class="wp-block-column" style="flex-basis:66.66%">
                                <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":1.6}},"fontSize":"small"} -->
                                <p class="has-small-font-size" style="font-style:normal;font-weight:600;line-height:1.6"><?php echo esc_html__('Zalthar', 'aegis'); ?></p>
                                <!-- /wp:paragraph -->
                                <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"Meta","fontSize":"tiny"} -->
                                <p class="has-meta-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__('from Planet Zorion', 'aegis'); ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                        <!-- wp:paragraph {"fontSize":"tiny-plus"} -->
                        <p class="has-tiny-plus-font-size"><?php echo wp_kses_post(__('<strong>“Living on asteroids made us very vulnerable to dire cosmic threats.</strong> Aegian intervention fortified habitats and advanced security. We also joined their trade network, truly improving our economy and quality of life. They have become our cosmic shields.<strong>”</strong>', 'aegis')); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->