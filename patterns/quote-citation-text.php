
<?php
/**
 * Title: Quote with citation
 * Slug: aegis/quote-citation-text
 * Categories: quotes
 * Description: Animated quote with a citation block pattern
 * Keywords: animation, citation, text, quotes
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
            <!-- wp:aegis-companion/typing-text {"typingTexts":["<?php echo esc_html__( 'We Rise', 'aegis' ); ?>","<?php echo esc_html__( 'We Soar', 'aegis' ); ?>","<?php echo esc_html__( 'We Elevate', 'aegis' ); ?>"],"typingDecoration":"underline","textAlign":"center","style":{"typography":{"lineHeight":"1.2"}},"fontSize":"huge-plus","animationDelay":"small"} -->
            <div style="line-height:1.2;text-align:center" class="wp-block-aegis-companion-typing-text has-huge-plus-font-size">
                <div class="aegis-typing-wrapper">
                    <span class="aegis-typing-prefix"><?php echo esc_html__( 'For Aegis', 'aegis' ); ?></span>
                    <span class="aegis-typing-data hidden" style="text-decoration:underline">
                        <span class="aegis-typing-item"><?php echo esc_html__( 'We Rise', 'aegis' ); ?></span>
                        <span class="aegis-typing-item"><?php echo esc_html__( 'We Soar', 'aegis' ); ?></span>
                        <span class="aegis-typing-item"><?php echo esc_html__( 'We Elevate', 'aegis' ); ?></span>
                    </span>
                    <span class="aegis-typing-action" style="text-decoration:underline"></span>
                    <span class="aegis-typing-suffix"><?php echo esc_html__( 'To Conquer And Illuminate!', 'aegis' ); ?></span>
                </div>
            </div>
            <!-- /wp:aegis-companion/typing-text -->
            <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size"><?php echo esc_html__( 'Quote by Aeonis', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->