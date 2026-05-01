<?php
/**
 * Title: Talk & Lecture Event
 * Slug: event-talk
 * Categories: page, events
 * Keywords: talk, lecture, keynote, speaker, presentation, event
 * Description: A focused full page layout for a single talk, lecture, or keynote presentation.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page","events"],"patternName":"event-talk"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"13"} -->
                        <p class="is-style-sub-heading has-primary-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'Public Lecture', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"13"} -->
                        <p class="has-neutral-400-color has-text-color has-13-font-size"><?php echo esc_html__( '/ Free & Open to All', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:heading {"level":1,"fontSize":"48"} -->
                    <h1 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'The Architecture of Attention: Designing for the Distracted Mind', 'aegis' ); ?></h1>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"18"} -->
                    <p class="has-neutral-600-color has-text-color has-18-font-size"><?php echo esc_html__( 'How cognitive science is reshaping the way we design digital interfaces, physical spaces, and educational experiences in an age of infinite distraction.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md","margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"11"} -->
                            <p class="is-style-sub-heading has-neutral-400-color has-text-color has-11-font-size"><?php echo esc_html__( 'Date', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"fontSize":"15"} -->
                            <p class="has-15-font-size"><?php echo esc_html__( 'May 22, 2026', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph {"textColor":"neutral-200"} -->
                        <p class="has-neutral-200-color has-text-color">|</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"11"} -->
                            <p class="is-style-sub-heading has-neutral-400-color has-text-color has-11-font-size"><?php echo esc_html__( 'Time', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"fontSize":"15"} -->
                            <p class="has-15-font-size"><?php echo esc_html__( '6:30 PM — 8:00 PM', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:paragraph {"textColor":"neutral-200"} -->
                        <p class="has-neutral-200-color has-text-color">|</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"11"} -->
                            <p class="is-style-sub-heading has-neutral-400-color has-text-color has-11-font-size"><?php echo esc_html__( 'Venue', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"fontSize":"15"} -->
                            <p class="has-15-font-size"><?php echo esc_html__( 'Auditorio León de Greiff', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                        <!-- wp:button -->
                        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Reserve Your Seat', 'aegis' ); ?></a></div>
                        <!-- /wp:button -->

                        <!-- wp:button {"className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Add to Calendar', 'aegis' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
                <!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"8px"}}} -->
                <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:4/5;object-fit:cover" alt="" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"width":"35%"} -->
            <div class="wp-block-column" style="flex-basis:35%">
                <!-- wp:heading {"fontSize":"28"} -->
                <h2 class="wp-block-heading has-28-font-size"><?php echo esc_html__( 'About the Speaker', 'aegis' ); ?></h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"65%"} -->
            <div class="wp-block-column" style="flex-basis:65%">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"120px","height":"120px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
                    <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:120px;height:120px" alt="" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"fontSize":"24"} -->
                        <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Dr. Helena Vásquez', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"primary-500","fontSize":"14"} -->
                        <p class="has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Cognitive Scientist & Design Researcher', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                        <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Dr. Vásquez leads the Attention & Design Lab at Universidad de los Andes. Her research bridges neuroscience and human-computer interaction, with publications in Nature, Science, and the ACM Digital Library. She has consulted for Google, Apple, and the World Health Organization on attention-aware design systems.', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}}} -->
                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--xxs)">
                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                            <!-- wp:social-link {"url":"#","service":"x"} /-->

                            <!-- wp:social-link {"url":"#","service":"chain"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"width":"35%"} -->
            <div class="wp-block-column" style="flex-basis:35%">
                <!-- wp:heading {"fontSize":"28"} -->
                <h2 class="wp-block-heading has-28-font-size"><?php echo esc_html__( 'What You\'ll Learn', 'aegis' ); ?></h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"65%"} -->
            <div class="wp-block-column" style="flex-basis:65%">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}},"padding":{"bottom":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--md)">
                        <!-- wp:heading {"level":4,"fontSize":"18"} -->
                        <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'The Neuroscience of Focus', 'aegis' ); ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                        <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Understanding the three attention networks and how digital environments exploit — or support — each one.', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}},"padding":{"bottom":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--md)">
                        <!-- wp:heading {"level":4,"fontSize":"18"} -->
                        <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Design Patterns That Respect Cognition', 'aegis' ); ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                        <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Practical frameworks for creating interfaces that reduce cognitive load and enhance sustained engagement.', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}},"padding":{"bottom":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-bottom:var(--wp--preset--spacing--md)">
                        <!-- wp:heading {"level":4,"fontSize":"18"} -->
                        <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Case Studies from the Field', 'aegis' ); ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                        <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Real-world examples from healthcare, education, and consumer technology where attention-aware design made measurable impact.', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":4,"fontSize":"18"} -->
                        <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'The Ethics of Attention', 'aegis' ); ?></h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                        <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Navigating the moral landscape of persuasive design and building technology that serves human flourishing.', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"28"} -->
        <h2 class="wp-block-heading has-text-align-center has-28-font-size"><?php echo esc_html__( 'Part of the Minds & Machines Lecture Series', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"15","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}}} -->
        <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-15-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'A semester-long series exploring the intersection of technology, cognition, and society.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group alignwide">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Apr 17', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'The Empathy Machine: VR and Moral Psychology', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"13"} -->
                <p class="has-neutral-400-color has-text-color has-13-font-size"><?php echo esc_html__( 'Past', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"backgroundColor":"neutral-50","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group has-neutral-50-background-color has-background" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"primary-500","fontSize":"14"} -->
                <p class="has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'May 22', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"is-style-heading","fontSize":"15"} -->
                <p class="is-style-heading has-15-font-size"><?php echo esc_html__( 'The Architecture of Attention', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"13"} -->
                <p class="is-style-sub-heading has-primary-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'This Event', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Jun 19', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'Algorithmic Bias and Social Justice', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"13"} -->
                <p class="has-neutral-400-color has-text-color has-13-font-size"><?php echo esc_html__( 'Upcoming', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Jul 17', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'Digital Sovereignty in the Global South', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"13"} -->
                <p class="has-neutral-400-color has-text-color has-13-font-size"><?php echo esc_html__( 'Upcoming', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
