<?php
/**
 * Title: Accordion Wide
 * Slug: accordion-wide
 * Categories: faq
 * Keywords: faq, accordion, wide, questions, answers
 * Description: A wide accordion FAQ section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["faq"],"patternName":"accordion-wide","name":"Accordion Wide"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
    <!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-top">
        <!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"position":{"all":"sticky"},"top":{"all":"100px"}}} -->
        <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:40%">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500"} -->
            <p class="is-style-sub-heading has-primary-500-color has-text-color"><?php echo esc_html__( 'FAQs', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}}} -->
            <h2 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Everything You Need to Know', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"16"} -->
            <p class="has-neutral-500-color has-text-color has-16-font-size"><?php echo esc_html__( 'Find answers to the most common questions about setting up and customizing your site with the Aegis framework.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"fontSize":"14"} -->
            <p class="has-14-font-size" style="margin-top:var(--wp--preset--spacing--md);text-decoration:none"><?php echo esc_html__( 'Still have questions?', 'aegis' ); ?> <a href="#"><?php echo esc_html__( 'Get in touch →', 'aegis' ); ?></a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:60%">
            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'What version of PHP do I need?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'The framework requires PHP 7.4 as a baseline. For optimal velocity and ecosystem stability, we recommend deploying on PHP 8.3. While the core architecture natively supports up to 8.5, version 8.3 currently offers the safest compatibility balance for third-party extensions.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'How do I replace this default Homepage?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'This layout is the default Home template. To replace it with your own content, simply create a new Page, publish it, and assign it as your "Homepage" under Settings → Reading. Once your new Homepage is set, you should delete the front-page.php template file from the theme to prevent it from overriding your chosen page.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'Where is the classic Customizer?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'The Customizer has been retired in favor of the Site Editor (Appearance → Editor). This gives you total control over headers, footers, and page templates visually, without relying on legacy options.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'How to change the site logo?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Access the Header template part within the Site Editor. Select the existing placeholder and replace it with a Site Logo, Image, or Inline SVG block. We recommend utilizing raw SVG for infinite scalability and dynamic color adaptation across dark mode.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'How do I edit the navigation menu?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Menus are now managed via the Navigation Block. Click on the header area inside the Site Editor to add, remove, or reorder links directly on the canvas without leaving the design view.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'How can I add animations to blocks?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Motion parameters are integrated directly into the block\'s settings panel. Within the Animation control group, you can define kinetic properties including the triggering Event (such as "Enter"), the Effect style, Easing curve, and precise timing curves for Duration and Delay without writing any code.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'How do I create an FAQ accordion?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Deploy a pre-configured accordion instantly from the Patterns library, or construct one manually using the native List Block variation. By relying on standard core architecture rather than proprietary blocks, your content retains absolute portability across any future environment.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'How can I display blog posts on the home page?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Inject dynamic content instantly by dragging a layout from the Blog Patterns library onto your canvas. Control the data stream using the Query Loop block, allowing you to filter categories and define display parameters with granular precision.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'What is the difference between Templates and Pages?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Pages hold your specific content (like "About Us"). Templates define the structure wrapping that content (like headers, sidebars, and footers). Editing a Template affects all Pages that use it.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"0","right":"0"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"},"top":{},"right":{},"left":{}}},"expandIcon":"arrow"} -->
            <details class="wp-block-details is-style-default" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
                <summary><?php echo esc_html__( 'Does this theme require any plugins?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","textColor":"neutral-600","fontSize":"16"} -->
                <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'No. We operate on a strict zero-dependency architecture. Every layout, pattern, and utility is native to the framework, ensuring you never rely on external software to achieve core functionality.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->