<?php
/**
 * Title: Testimonial Quote Large
 * Slug: quote-large
 * Categories: testimonial
 * Keywords: testimonial, quote, large, review, feedback
 * Description: A large centered testimonial quote.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["testimonial"],"patternName":"testimonial-quote-large","name":"Testimonial Quote Large"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"primary-300","fontSize":"60"} -->
    <p class="aligncenter has-text-align-center is-style-heading has-primary-300-color has-text-color has-60-font-size aligncenter">"</p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.6"}},"fontSize":"28"} -->
    <p class="aligncenter has-text-align-center has-28-font-size aligncenter" style="line-height:1.6"><?php echo esc_html__('Working with this team transformed our digital presence completely. Their attention to detail and commitment to excellence exceeded every expectation we had.', 'aegis'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:image {"width":"64px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"50px"}},"usePlaceholder":"default"} -->
        <figure class="wp-block-image is-resized has-custom-border" style="border-radius:50px"><img alt="" style="border-radius:50px;aspect-ratio:1;object-fit:cover;width:64px" /></figure>
        <!-- /wp:image -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-heading","fontSize":"16"} -->
            <p class="is-style-heading has-16-font-size"><?php echo esc_html__('Alexandra Chen', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__('CEO, TechVentures Inc.', 'aegis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->