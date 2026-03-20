<?php
/**
 * Title: Workshop Instructor
 * Slug: workshop-instructor
 * Categories: event
 * Keywords: workshop, instructor, teacher, bio, profile, event
 * Description: An instructor profile section with image, bio, and credentials.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["event"],"patternName":"workshop-instructor","name":"Workshop Instructor"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"8px"}},"usePlaceholder":"default"} -->
            <figure class="wp-block-image has-custom-border" style="border-radius:8px"><img alt="Hana Mori" style="border-radius:8px;aspect-ratio:4/5;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"13"} -->
            <p class="is-style-sub-heading has-primary-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'Your Instructor', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"32"} -->
            <h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Hana Mori', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"textColor":"neutral-600","fontSize":"16"} -->
            <p class="has-neutral-600-color has-text-color has-16-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Hana Mori is a master ceramicist with over 20 years of experience, trained in both traditional Japanese pottery techniques and contemporary Western methods. Her work has been exhibited in galleries across Tokyo, New York, and Copenhagen.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
            <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'She founded the Clay Collective studio in 2015 and has since taught over 500 students, from complete beginners to professional potters looking to refine their craft.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->