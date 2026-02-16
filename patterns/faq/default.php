<?php
/**
 * Title: FAQs
 * Slug: default
 * Categories: faq
 * Keywords: faq, questions, answers, help
 * Description: A frequently asked questions section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["faq"],"patternName":"default","name":"Default"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
    <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
    <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'FAQs', 'aegis' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}}} -->
    <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'Frequently Asked Questions', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"padding":{"bottom":"0"},"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-top" style="padding-bottom:0">
        <!-- wp:column {"verticalAlignment":"top","style":{"position":{"all":"relative"}}} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'What version of PHP do I need?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
                <p class="has-16-font-size"><?php echo esc_html__( 'The framework requires PHP 7.4 as a baseline. For optimal velocity and ecosystem stability, we recommend deploying on PHP 8.3. While the core architecture natively supports up to 8.5, version 8.3 currently offers the safest compatibility balance for third-party extensions.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How do I replace this default Homepage?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
                <p class="has-16-font-size"><?php echo esc_html__( 'This layout is the default Home template. To replace it with your own content, simply create a new Page, publish it, and assign it as your "Homepage" under Settings → Reading. Once your new Homepage is set, you should delete the front-page.php template file from the theme to prevent it from overriding your chosen page.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'Where is the classic Customizer?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
                <p class="has-16-font-size"><?php echo esc_html__( 'The Customizer has been retired in favor of the Site Editor (Appearance → Editor). This gives you total control over headers, footers, and page templates visually, without relying on legacy options.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How to change the site logo?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Access the Header template part within the Site Editor. Select the existing placeholder and replace it with a Site Logo, Image, or Inline SVG block. We recommend utilizing raw SVG for infinite scalability and dynamic color adaptation across dark mode.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How do I edit the navigation menu?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Menus are now managed via the Navigation Block. Click on the header area inside the Site Editor to add, remove, or reorder links directly on the canvas without leaving the design view.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How can I add animations to blocks?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Motion parameters are integrated directly into the block\'s settings panel. Within the Animation control group, you can define kinetic properties including the triggering Event (such as "Enter"), the Effect style, Easing curve, and precise timing curves for Duration and Delay without writing any code.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How do I create an FAQ accordion?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Deploy a pre-configured accordion instantly from the Patterns library, or construct one manually using the native List Block variation. By relying on standard core architecture rather than proprietary blocks, your content retains absolute portability across any future environment.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","style":{"position":{"all":"relative"}}} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How can I display blog posts on the home page?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Inject dynamic content instantly by dragging a layout from the Blog Patterns library onto your canvas. Control the data stream using the Query Loop block, allowing you to filter categories and define display parameters with granular precision.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'What is the difference between Templates and Pages?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Pages hold your specific content (like "About Us"). Templates define the structure wrapping that content (like headers, sidebars, and footers). Editing a Template affects all Pages that use it.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How do I edit the Header or Footer?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'These are Template Parts. You can edit them contextually while viewing any template in the Editor, or manage them specifically under Appearance → Editor → Patterns.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'Where do I find the pre-made layouts?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Open the Block Inserter (+) and switch to the Patterns tab. Here you can browse categorized sections (Headers, Grids, Call to Actions) and drag them directly onto your canvas.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'Where do I add custom CSS?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Open the Styles panel, click the three dots menu, and select Additional CSS. This allows you to inject code that applies strictly to the framework\'s root without external plugins.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How do I set a different template for a specific page?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'Inside the page editor, look for the Template setting in the right sidebar (Page tab). Click the template name to swap it (e.g., from "Default" to "Blank Canvas") or create a new custom one.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How do I revert changes if I break a template?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'If a template is modified, a blue dot appears next to it in the Site Editor. Click the three dots next to the template name and select Clear Customizations to reset it to the theme\'s native default.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'How can I save user dark mode preferences?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'The system defaults to the visitor\'s OS setting (prefers-color-scheme) automatically. However, if the manual toggle is engaged, a local cookie is initialized to persist the user\'s specific override across sessions.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary><?php echo esc_html__( 'Does this theme require any plugins?', 'aegis' ); ?></summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size"><?php echo esc_html__( 'No. We operate on a strict zero-dependency architecture. Every layout, pattern, and utility is native to the framework, ensuring you never rely on external software to achieve core functionality.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->