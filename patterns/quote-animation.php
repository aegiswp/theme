<?php
/**
 * Title: Quote Animation
 * Slug: aegis/quote-animation
 * Categories: pages
 * Description: Animated quote block pattern
 * Keywords: quote, heading
 * Viewport Width: 1500
 * Block Types: core/pages
 * Post Types:
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
        <!-- wp:column {"width":"","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"right":"8rem","left":"8rem"}}}} -->
        <div class="wp-block-column" style="padding-right:8rem;padding-left:8rem">
            <!-- wp:aegis-companion/typing-text {"typingTexts":["<?php echo esc_html__('We Rise'); ?>","<?php echo esc_html__('We Soar'); ?>","<?php echo esc_html__('We Elevate'); ?>"],"typingDecoration":"underline","textAlign":"center","style":{"typography":{"lineHeight":"1.2"}},"fontSize":"huge-plus","animationDelay":"small"} -->
            <div style="line-height:1.2;text-align:center" class="wp-block-aegis-companion-typing-text has-huge-plus-font-size">
                <div class="aegis-typing-wrapper">
                    <span class="aegis-typing-prefix"><?php echo esc_html__('For Aegis'); ?></span>
                    <span class="aegis-typing-data hidden" style="text-decoration:underline">
                        <span class="aegis-typing-item"><?php echo esc_html__('We Rise'); ?></span>
                        <span class="aegis-typing-item"><?php echo esc_html__('We Soar'); ?></span>
                        <span class="aegis-typing-item"><?php echo esc_html__('We Elevate'); ?></span>
                    </span>
                    <span class="aegis-typing-action" style="text-decoration:underline"></span>
                    <span class="aegis-typing-suffix"><?php echo esc_html__('To Conquer And Illuminate!'); ?></span>
                </div>
            </div>
            <!-- /wp:aegis-companion/typing-text -->
            <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size"><?php echo esc_html__('Quote by Aeonis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->