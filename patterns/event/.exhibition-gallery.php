<?php
/**
 * Title: Exhibition Gallery
 * Slug: event-exhibition-gallery
 * Categories: event
 * Keywords: exhibition, gallery, art, images, showcase, event
 * Description: A gallery grid section showcasing exhibition artwork with captions.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Featured Works', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:gallery {"columns":3,"linkTo":"none","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md","top":"var:preset|spacing|md"}}}} -->
    <figure class="wp-block-gallery alignwide has-nested-images columns-3" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:4/5;object-fit:cover" alt="<?php echo esc_attr__( 'Sculpture installation', 'aegis' ); ?>" /><figcaption class="wp-element-caption"><?php echo esc_html__( 'Resonance I — Yuki Tanaka', 'aegis' ); ?></figcaption></figure>
        <!-- /wp:image -->

        <!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:4/5;object-fit:cover" alt="<?php echo esc_attr__( 'Sound installation', 'aegis' ); ?>" /><figcaption class="wp-element-caption"><?php echo esc_html__( 'Hollow Frequencies — Amira Bey', 'aegis' ); ?></figcaption></figure>
        <!-- /wp:image -->

        <!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"8px"}}} -->
        <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:4/5;object-fit:cover" alt="<?php echo esc_attr__( 'Mixed media piece', 'aegis' ); ?>" /><figcaption class="wp-element-caption"><?php echo esc_html__( 'Tectonic Whisper — Carlos Mena', 'aegis' ); ?></figcaption></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->
</div>
<!-- /wp:group -->
