<?php
/**
 * Title: 01. Contact Pattern
 * Slug: aegis/contact-01
 * Categories: contact
 * Description: Block pattern featuring a contact section with a tagline, heading, description, contact details (address, telephone, email), and a placeholder for a contact form.
 * Keywords: contact, address, telephone, email, form, inquiry, invitation
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/spacer, core/buttons, core/button
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"01. Contact Pattern"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"gradient":"vertical-base-to-tertiary","layout":{"type":"default"}} -->
<div class="wp-block-group has-vertical-base-to-tertiary-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"22.22%"} -->
<div class="wp-block-column" style="flex-basis:22.22%"></div>
<!-- /wp:column -->

<!-- wp:column {"width":"77.77%","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"tertiary","layout":{"type":"default"}} -->
<div class="wp-block-column has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20);flex-basis:77.77%"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Get in touch', 'Contact section tagline', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Contact Us', 'Contact section heading', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html_x( 'Have questions or need assistance? We\'re here to help! Reach out through the form below or use our contact information for direct communication.', 'Contact section description', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Address:', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left">
    <?php echo esc_html_x('123 Street Name, City, ST 12345', 'Contact section example address', 'aegis'); ?>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Telephone:', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"foreground"} -->
<p class="has-text-align-left has-foreground-color has-text-color has-link-color">
                                <a href="tel:+15551234567"><?php echo esc_html_x('+1 (555) 123-4567', 'Contact section phone number', 'aegis'); ?></a>
                            </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-left has-medium-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Email:', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground"} -->
<p class="has-text-align-left has-foreground-color has-text-color has-link-color">
                                <a href="mailto:contact@example.com"><?php echo esc_html_x('contact@example.com', 'Contact section email address', 'aegis'); ?></a>
                            </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:shortcode -->
<?php echo esc_html_x('[INSERT YOUR CONTACT FORM HERE]', 'Contact form placeholder', 'aegis'); ?>
<!-- /wp:shortcode --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->