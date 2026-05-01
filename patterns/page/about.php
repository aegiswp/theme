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

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"page-about","name":"About Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Our Story', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-52-font-size"><?php echo esc_html__( 'Building Digital Experiences That Matter', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"18"} -->
            <p class="aligncenter has-text-align-center has-18-font-size aligncenter">
                <?php echo esc_html__( 'We are a team of designers, developers, and strategists passionate about creating meaningful digital solutions that drive real results for businesses worldwide.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
                <figure class="wp-block-image"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
                <p class="is-style-sub-heading"><?php echo esc_html__( 'Who We Are', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"fontSize":"36"} -->
                <h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'A Decade of Digital Excellence', 'aegis' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html__( 'Founded in 2014, we started with a simple mission: to bridge the gap between beautiful design and powerful functionality. What began as a small studio has grown into a full-service digital agency serving clients across six continents.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html__( 'Our approach combines strategic thinking with creative execution. We don\u2019t just build websites\u2014we craft digital ecosystems that help businesses thrive in an increasingly connected world.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column"><!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":250,"duration":"2","delay":"0","suffix":"+"}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">250+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'Projects Delivered', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column"><!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":50,"duration":"2","delay":"0","suffix":"+"}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">50+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'Team Members', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column"><!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":15,"duration":"2","delay":"0","suffix":""}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">15</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'Industry Awards', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-column"><!-- wp:paragraph {"align":"center","className":"is-style-counter is-style-heading","style":{"counter":{"start":"0","end":98,"duration":"2","delay":"0","suffix":"%"}},"textColor":"white","fontSize":"48"} -->
                <p class="aligncenter has-text-align-center is-style-counter is-style-heading has-white-color has-text-color has-48-font-size aligncenter">98%</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
                <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'Client Satisfaction', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Our Values', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
            <h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'What Drives Us Forward', 'aegis' ); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:heading {"level":3,"fontSize":"24"} -->
                <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Innovation First', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'We embrace emerging technologies and creative approaches to solve complex challenges in unexpected ways.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:heading {"level":3,"fontSize":"24"} -->
                <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Quality Obsessed', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'Every pixel, every line of code, every interaction is crafted with meticulous attention to detail and purpose.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:heading {"level":3,"fontSize":"24"} -->
                <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Client Partnership', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'We build lasting relationships through transparency, communication, and a genuine investment in your success.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Leadership', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
            <h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Meet Our Team', 'aegis' ); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"align":"wide"} -->
        <div class="wp-block-columns alignwide"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}},"height":{"all":""},"width":{"all":""},"maxWidth":{"all":"175px"}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%"><img alt="" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__( 'Sarah Mitchell', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Chief Executive Officer', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}},"width":{"all":""},"maxWidth":{"all":"175px"}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%"><img alt="" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__( 'David Chen', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Creative Director', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}},"maxWidth":{"all":"175px"}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%"><img alt="" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__( 'Maria Rodriguez', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Head of Technology', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group"><!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}},"maxWidth":{"all":"175px"}}} -->
                    <figure class="wp-block-image size-large is-resized has-custom-border" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%"><img alt="" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;aspect-ratio:1;object-fit:cover;width:200px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"20"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-20-font-size aligncenter"><?php echo esc_html__( 'James Wilson', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Operations Director', 'aegis' ); ?></p>
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
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Ready to Start Your Project?', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Let\u2019s discuss how we can help bring your vision to life. Our team is ready to collaborate on your next big idea.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons"><!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get in Touch', 'aegis' ); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-ghost"} -->
            <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Our Work', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->