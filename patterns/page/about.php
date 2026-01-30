<?php
/**
 * Title: About Page
 * Slug: about
 * Categories: page
 * Keywords: about, page, company, story, mission
 * Description: A complete about page layout with hero, story, team, and values.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"about","name":"About Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter">Our Story</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-52-font-size">Building Digital Experiences That Matter</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
            <p
                class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter">
                We are a team of designers, developers, and strategists passionate about creating meaningful digital
                solutions that drive real results for businesses worldwide.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center">
            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
                <figure class="wp-block-image"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
                <p class="is-style-sub-heading">Who We Are</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"fontSize":"36"} -->
                <h2 class="wp-block-heading has-36-font-size">A Decade of Digital Excellence</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600"} -->
                <p class="has-neutral-600-color has-text-color">Founded in 2014, we started with a simple mission: to
                    bridge the gap between beautiful design and powerful functionality. What began as a small studio has
                    grown into a full-service digital agency serving clients across six continents.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600"} -->
                <p class="has-neutral-600-color has-text-color">Our approach combines strategic thinking with creative
                    execution. We don't just build websites—we craft digital ecosystems that help businesses thrive in
                    an increasingly connected world.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":250,"duration":"2","delay":"0","suffix":"+"}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">250+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter">Projects Delivered</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":50,"duration":"2","delay":"0","suffix":"+"}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">50+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter">Team Members</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":15,"duration":"2","delay":"0","suffix":""}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">15</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter">Industry Awards</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":98,"duration":"2","delay":"0","suffix":"%"}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">98%</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter">Client Satisfaction</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
            <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter">Our Values</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
            <h2 class="wp-block-heading has-text-align-center has-40-font-size">What Drives Us Forward</h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface"
                style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":3,"fontSize":"24"} -->
                <h3 class="wp-block-heading has-24-font-size">Innovation First</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size">We embrace emerging technologies and
                    creative approaches to solve complex challenges in unexpected ways.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":3,"fontSize":"24"} -->
                <h3 class="wp-block-heading has-24-font-size">Quality Obsessed</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size">Every pixel, every line of code, every
                    interaction is crafted with meticulous attention to detail and purpose.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":3,"fontSize":"24"} -->
                <h3 class="wp-block-heading has-24-font-size">Client Partnership</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size">We build lasting relationships through
                    transparency, communication, and a genuine investment in your success.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
            <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter">Leadership</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
            <h2 class="wp-block-heading has-text-align-center has-40-font-size">Meet Our Team</h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"align":"wide"} -->
        <div class="wp-block-columns alignwide"><!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%">
                        <img style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter">Sarah Mitchell</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter">Chief Executive Officer</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%">
                        <img style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter">David Chen</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter">Creative Director</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%">
                        <img style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter">Maria Rodriguez</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter">Head of Technology</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%">
                        <img style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter">James Wilson</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter">Operations Director</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-36-font-size">Ready to Start Your Project?</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
        <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter">Let's discuss how
            we can help bring your vision to life. Our team is ready to collaborate on your next big idea.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons"><!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get in Touch</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-ghost"} -->
            <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button">View Our Work</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->