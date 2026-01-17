<?php
/**
 * Title: Contact Form Image Overlay
 * Slug: form-image-overlay
 * Categories: contact
 * ID: 479
 */
?>

<!-- wp:group {"metadata":{"categories":["contact"],"patternName":"form-image-overlay","name":"Contact Form Image Overlay"},"align":"full","style":{"spacing":{"blockGap":"0","padding":{"bottom":"var:preset|spacing|xl"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"neutral-50","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background"
    style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"}}} -->
    <figure class="wp-block-image size-full"><img style="aspect-ratio:16/9;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"-300px"},"padding":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","orientation":"horizontal"}} -->
    <div class="wp-block-group alignfull" style="margin-top:-300px;padding-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"},"margin":{"top":"0","bottom":"0"}},"width":{"all":"100%"}},"backgroundColor":"neutral-0","layout":{"type":"default"},"shadowPreset":"xxl"} -->
        <div class="wp-block-group is-style-surface has-neutral-0-background-color has-background  has-shadow has-xxl-shadow"
            style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
            <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter">Get in touch</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|sm"}}}} -->
            <h2 class="wp-block-heading has-text-align-center"
                style="margin-top:var(--wp--preset--spacing--xxs);margin-bottom:var(--wp--preset--spacing--sm)">Contact
                Us</h2>
            <!-- /wp:heading -->

            <!-- wp:html -->
            <form action="#" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" required></textarea>
                <div class="wp-block-buttons is-layout-flex">
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a
                            class="wp-block-button__link wp-element-button" href="#">Send</a></div>
                </div>
            </form>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->