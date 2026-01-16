<?php
/**
 * Title: Accordion Wide
 * Slug: accordion-wide
 * Categories: faq
 * ID: 525
 */
?>

<!-- wp:group {"metadata":{"categories":["faq"],"patternName":"accordion-wide","name":"Accordion Wide"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|xs"},"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"
    style="margin-top:0;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--xs)">
    <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
    <div class="wp-block-group">
        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-500"} -->
        <p
            class="aligncenter has-text-align-center is-style-sub-heading has-primary-500-color has-text-color aligncenter">
            FAQs</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","style":{"u002du002dmax-width":"","spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}}} -->
        <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--lg)">
            Frequently Asked Questions</h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"padding":{"bottom":"0"},"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-top" style="padding-bottom:0">
        <!-- wp:column {"verticalAlignment":"top","style":{"position":{"all":"relative"}}} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>What version of PHP do I need?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
                <p class="has-16-font-size">The framework requires PHP 7.4 as a baseline. For optimal velocity and
                    ecosystem stability, we recommend deploying on PHP 8.3. While the core architecture natively
                    supports up to 8.5, version 8.3 currently offers the safest compatibility balance for third-party
                    extensions.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I replace this default Home screen?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
                <p class="has-16-font-size">This layout is the default Home template. To replace it with your own
                    content, simply create a new Page, publish it, and assign it as your "Homepage" under Settings →
                    Reading.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>Where is the classic Customizer?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","fontSize":"16"} -->
                <p class="has-16-font-size">The Customizer has been retired in favor of the Site Editor (Appearance →
                    Editor). This gives you total control over headers, footers, and page templates visually, without
                    relying on legacy options.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How to change the site logo?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Access the Header template part within the Site Editor.
                    Select the existing placeholder and replace it with a Site Logo, Image, or Inline SVG block. We
                    recommend utilizing raw SVG for infinite scalability and dynamic color adaptation across dark mode.
                </p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I edit the navigation menu?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Menus are now managed via the Navigation Block. Click on
                    the header area inside the Site Editor to add, remove, or reorder links directly on the canvas
                    without leaving the design view.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I change fonts and colors globally?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Open the Styles panel (the half-shaded circle icon) in the
                    top-right of the Editor. Changes made here propagate instantly across the entire site architecture,
                    updating all blocks simultaneously.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I add custom SVG images?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Use the Icon Block to manage curated sets or the Inline SVG
                    variation to paste raw XML code directly onto the canvas.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">To upload standard .svg files to the Media Library, you
                    must install a sanitizer plugin (like Safe SVG) to bypass WordPress security restrictions.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How can I add animations to blocks?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Motion parameters are integrated directly into the block's
                    settings panel. Within the Animation control group, you can define kinetic properties including the
                    triggering Event (such as "Enter"), the Effect style, Easing curve, and precise timing curves for
                    Duration and Delay without writing any code.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I create an FAQ accordion?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Deploy a pre-configured accordion instantly from the
                    Patterns library, or construct one manually using the native List Block variation. By relying on
                    standard core architecture rather than proprietary blocks, your content retains absolute portability
                    across any future environment.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","style":{"position":{"all":"relative"}}} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How can I display blog posts on the home page?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Inject dynamic content instantly by dragging a layout from
                    the Blog Patterns library onto your canvas. Control the data stream using the Query Loop block,
                    allowing you to filter categories and define display parameters with granular precision.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>What is the difference between Templates and Pages?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Pages hold your specific content (like "About Us").
                    Templates define the structure wrapping that content (like headers, sidebars, and footers). Editing
                    a Template affects all Pages that use it.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I edit the Header or Footer?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">These are Template Parts. You can edit them contextually
                    while viewing any template in the Editor, or manage them specifically under Appearance → Editor →
                    Patterns.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>Where do I find the pre-made layouts?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Open the Block Inserter (+) and switch to the Patterns tab.
                    Here you can browse categorized sections (Headers, Grids, Call to Actions) and drag them directly
                    onto your canvas.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>Where do I add custom CSS?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Open the Styles panel, click the three dots menu, and
                    select Additional CSS. This allows you to inject code that applies strictly to the framework’s root
                    without external plugins.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I set a different template for a specific page?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">Inside the page editor, look for the Template setting in
                    the right sidebar (Page tab). Click the template name to swap it (e.g., from "Default" to "Blank
                    Canvas") or create a new custom one.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How do I revert changes if I break a template?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">If a template is modified, a blue dot appears next to it in
                    the Site Editor. Click the three dots next to the template name and select Clear Customizations to
                    reset it to the theme’s native default.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>How can I save user dark mode preferences?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">The system defaults to the visitor's OS setting
                    (prefers-color-scheme) automatically. However, if the manual toggle is engaged, a local cookie is
                    initialized to persist the user's specific override across sessions.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->

            <!-- wp:details {"className":"is-style-surface is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
            <details class="wp-block-details is-style-surface is-style-default"
                style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
                <summary>Does this theme require any plugins?</summary>
                <!-- wp:paragraph {"placeholder":"Type / to add a hidden block","className":"is-style-default","fontSize":"16"} -->
                <p class="is-style-default has-16-font-size">No. We operate on a strict zero-dependency architecture.
                    Every layout, pattern, and utility is native to the framework, ensuring you never rely on external
                    software to achieve core functionality.</p>
                <!-- /wp:paragraph -->
            </details>
            <!-- /wp:details -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:paragraph {"align":"center","className":"","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"fontSize":"14"} -->
    <p class="aligncenter has-text-align-center has-14-font-size aligncenter"
        style="margin-top:var(--wp--preset--spacing--lg);text-decoration:none">Question not answered above? <a
            href="#">Contact us →</a></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->