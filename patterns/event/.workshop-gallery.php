<?php
/**
 * Title: Workshop Gallery
 * Slug: event-workshop-gallery
 * Categories: event
 * Keywords: workshop, gallery, photos, student, work, event
 * Description: A gallery section showcasing student work and workshop moments.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'From Previous Workshops', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:gallery {"columns":4,"linkTo":"none","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|sm","top":"var:preset|spacing|sm"}}}} -->
    <figure class="wp-block-gallery alignwide has-nested-images columns-4" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="<?php echo esc_attr__( 'Workshop moment', 'aegis' ); ?>" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="<?php echo esc_attr__( 'Student work', 'aegis' ); ?>" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="<?php echo esc_attr__( 'Ceramic piece', 'aegis' ); ?>" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="<?php echo esc_attr__( 'Studio view', 'aegis' ); ?>" /></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->
</div>
<!-- /wp:group -->
