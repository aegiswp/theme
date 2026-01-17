<?php
/**
 * Title: Contact Form Map
 * Slug: form-map
 * Categories: contact
 * ID: 489
 */
?>

<!-- wp:group {"metadata":{"categories":["contact"],"patternName":"form-map","name":"Contact Form Map"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xl","left":"var:preset|spacing|xl"},"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"
        style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
            <h2 class="wp-block-heading">Contact Us</h2>
            <!-- /wp:heading -->

            <!-- wp:html -->
            <form action="#" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <div class="wp-block-buttons is-layout-flex">
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a
                            class="wp-block-button__link wp-element-button" href="#">Send</a></div>
                </div>
            </form>
            <!-- /wp:html -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:html -->
            <iframe width="600" height="500"
                src="https://www.openstreetmap.org/export/embed.html?bbox=-74.06400114297868%2C4.648583297488079%2C-74.06149059534074%2C4.650419911229698&amp;layer=mapnik&amp;marker=4.64950160495738%2C-74.0627458691597"
                style="border: 1px solid black"></iframe>
            <!-- /wp:html -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->