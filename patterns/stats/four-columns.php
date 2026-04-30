<?php
/**
 * Title: Stats Four Columns
 * Slug: four-columns
 * Categories: stats
 * Keywords: stats, four columns, numbers, counters
 * Description: A four-column statistics section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["stats"],"patternName":"four-columns","name":"Stats Four Columns"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"
    style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
    <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
    <h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Trusted by Thousands', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Numbers that reflect our commitment to quality and client satisfaction.', 'aegis' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}}} -->
    <div class="wp-block-columns alignwide"
        style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}}} -->
        <div class="wp-block-column">
            <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":30,"duration":"2","delay":"0","suffix":"k"}},"fontSize":"40"} -->
            <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-40-font-size aligncenter">
                <?php echo esc_html__( '30k', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Happy customers', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}}} -->
        <div class="wp-block-column">
            <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":100,"duration":"2","delay":"0","suffix":""}},"fontSize":"40"} -->
            <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-40-font-size aligncenter">
                <?php echo esc_html__( '100', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Projects completed', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}}} -->
        <div class="wp-block-column">
            <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":33,"duration":"2","delay":"0","suffix":""}},"fontSize":"40"} -->
            <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-40-font-size aligncenter">
                <?php echo esc_html__( '33', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Design awards', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"blockGap":"0px"}}} -->
        <div class="wp-block-column">
            <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":10,"duration":"2","delay":"0","suffix":"m"}},"fontSize":"40"} -->
            <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-40-font-size aligncenter">
                <?php echo esc_html__( '10m', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Cups of coffee', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->