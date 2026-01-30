<?php
/**
 * Title: Contact Page
 * Slug: contact
 * Categories: page
 * Keywords: contact, page, form, map, address
 * Description: A complete contact page with form, map, and contact details.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"contact","name":"Contact Page"},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter">Get in Touch</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-52-font-size">We'd Love to Hear From You</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
            <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter">
                Have a question, project idea, or just want to say hello? Drop us a message and we'll get back to you
                within 24 hours.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
            <div class="wp-block-column" style="flex-basis:60%">
                <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                    <!-- wp:heading {"level":3,"fontSize":"28"} -->
                    <h3 class="wp-block-heading has-28-font-size">Send Us a Message</h3>
                    <!-- /wp:heading -->

                    <!-- wp:html -->
                    <form action="#" method="POST" style="display:flex;flex-direction:column;gap:1.5rem;">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                            <div>
                                <label for="name"
                                    style="display:block;margin-bottom:0.5rem;font-weight:500;">Name</label>
                                <input type="text" id="name" name="name" required
                                    style="width:100%;padding:0.75rem;border:1px solid #e5e7eb;border-radius:6px;">
                            </div>
                            <div>
                                <label for="email"
                                    style="display:block;margin-bottom:0.5rem;font-weight:500;">Email</label>
                                <input type="email" id="email" name="email" required
                                    style="width:100%;padding:0.75rem;border:1px solid #e5e7eb;border-radius:6px;">
                            </div>
                        </div>
                        <div>
                            <label for="subject"
                                style="display:block;margin-bottom:0.5rem;font-weight:500;">Subject</label>
                            <input type="text" id="subject" name="subject" required
                                style="width:100%;padding:0.75rem;border:1px solid #e5e7eb;border-radius:6px;">
                        </div>
                        <div>
                            <label for="message"
                                style="display:block;margin-bottom:0.5rem;font-weight:500;">Message</label>
                            <textarea id="message" name="message" rows="6" required
                                style="width:100%;padding:0.75rem;border:1px solid #e5e7eb;border-radius:6px;resize:vertical;"></textarea>
                        </div>
                        <div class="wp-block-buttons">
                            <div class="wp-block-button has-custom-width wp-block-button__width-100">
                                <button type="submit" class="wp-block-button__link wp-element-button">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                    <!-- /wp:html -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"40%"} -->
            <div class="wp-block-column" style="flex-basis:40%">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4,"fontSize":"20"} -->
                        <h4 class="wp-block-heading has-20-font-size">Office Location</h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600"} -->
                        <p class="has-neutral-600-color has-text-color">Cra. 5 #8-36, <br>Distrito Capital, Bogotá<br>Colombia</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4,"fontSize":"20"} -->
                        <h4 class="wp-block-heading has-20-font-size">Contact Details</h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600"} -->
                        <p class="has-neutral-600-color has-text-color"><strong>Email:</strong> <a
                                href="mailto:info@youremail.com">info@youremail.com</a><br><strong>Phone:</strong> <a
                                href="tel:576010192834" data-type="tel" data-id="tel:576010192834">+57 (601)
                                019-2834</a><br><strong>Fax:</strong> <a href="tel:576010192834" data-type="tel"
                                data-id="tel:576010192834">+57 (601) 019-2834</a></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4,"fontSize":"20"} -->
                        <h4 class="wp-block-heading has-20-font-size">Business Hours</h4>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-600"} -->
                        <p class="has-neutral-600-color has-text-color"><strong>Monday - Friday:</strong> 9:00 AM - 6:00
                            PM<br><strong>Saturday:</strong> 10:00 AM - 4:00 PM<br><strong>Sunday:</strong> Closed</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:heading {"level":4,"fontSize":"20"} -->
                        <h4 class="wp-block-heading has-20-font-size">Follow Us</h4>
                        <!-- /wp:heading -->

                        <!-- wp:social-links {"iconColor":"neutral-600","iconColorValue":"#6b7280","size":"has-normal-icon-size","className":"is-style-logos-only"} -->
                        <ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
                            <!-- wp:social-link {"url":"#","service":"facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
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
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
            <h2 class="wp-block-heading has-text-align-center has-32-font-size">Frequently Asked Questions</h2>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}},"expandIcon":"chevron"} -->
                <details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                    <summary><strong>What is your typical response time?</strong></summary>
                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size">We aim to respond to all inquiries within 24 business hours. For urgent matters, please call our office directly.</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}},"expandIcon":"chevron"} -->
                <details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                    <summary><strong>Do you offer free consultations?</strong></summary>
                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size">Yes! We offer a complimentary 30-minute discovery call to discuss your project needs and determine if we're a good fit.</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->

                <!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}},"expandIcon":"chevron"} -->
                <details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                    <summary><strong>What industries do you work with?</strong></summary>
                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size">We work with clients across various
                        industries including technology, healthcare, finance, e-commerce, education, and non-profit
                        organizations.</p>
                    <!-- /wp:paragraph -->
                </details>
                <!-- /wp:details -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->