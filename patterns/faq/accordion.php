<?php
/**
 * Title: Accordion
 * Slug: accordion
 * Categories: faq
 * Keywords: faq, accordion, questions, answers
 * Description: An accordion FAQ section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"name":"Accordion"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
    <div class="wp-block-group">
        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-500"} -->
        <p class="aligncenter has-text-align-center is-style-sub-heading has-primary-500-color has-text-color aligncenter">FAQs</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","style":{"u002du002dmax-width":"","spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}}} -->
        <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--lg)">Frequently Asked Questions</h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"categories":["faq"],"patternName":"accordion"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>What version of PHP do I need?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
            <p class="has-16-font-size">The framework requires PHP 7.4 as a baseline. For optimal velocity and ecosystem
                stability, we recommend deploying on PHP 8.3. While the core architecture natively supports up to 8.5,
                version 8.3 currently offers the safest compatibility balance for third-party extensions.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default"
            style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How do I replace this default Home screen?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
            <p class="has-16-font-size">This layout is the default Home template. To replace it with your own content,
                simply create a new Page, publish it, and assign it as your "Homepage" under Settings → Reading.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>Where is the classic Customizer?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
            <p class="has-16-font-size">The Customizer has been retired in favor of the Site Editor (Appearance →
                Editor).
                This gives you total control over headers, footers, and page templates visually, without relying on
                legacy
                options.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How to change the site logo?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">Access the Header template part within the Site Editor. Select
                the
                existing placeholder and replace it with a Site Logo, Image, or Inline SVG block. We recommend utilizing
                raw
                SVG for infinite scalability and dynamic color adaptation across dark mode.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How do I edit the navigation menu?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">Menus are now managed via the Navigation Block. Click on the
                header
                area inside the Site Editor to add, remove, or reorder links directly on the canvas without leaving the
                design view.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How do I change fonts and colors globally?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">Open the Styles panel (the half-shaded circle icon) in the
                top-right of the Editor. Changes made here propagate instantly across the entire site architecture,
                updating
                all blocks simultaneously.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How do I add custom SVG images?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">Use the Icon Block to manage curated sets or the Inline SVG
                variation to paste raw XML code directly onto the canvas.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">To upload standard .svg files to the Media Library, you must
                install a sanitizer plugin (like Safe SVG) to bypass WordPress security restrictions.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How can I add animations to blocks?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">Motion parameters are integrated directly into the block's
                settings
                panel. Within the Animation control group, you can define kinetic properties including the triggering
                Event
                (such as "Enter"), the Effect style, Easing curve, and precise timing curves for Duration and Delay
                without
                writing any code.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->

        <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
        <details class="wp-block-details is-style-surface is-style-default" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
            <summary>How do I create an FAQ accordion?</summary>
            <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
            <p class="is-style-default has-16-font-size">Deploy a pre-configured accordion instantly from the Patterns
                library, or construct one manually using the native List Block variation. By relying on standard core
                architecture rather than proprietary blocks, your content retains absolute portability across any future
                environment.</p>
            <!-- /wp:paragraph -->
        </details>
        <!-- /wp:details -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->