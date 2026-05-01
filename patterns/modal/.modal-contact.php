<?php
/**
 * Title: Contact Form Modal
 * Slug: contact
 * Categories: modal
 * Keywords: modal, contact, form, popup
 * Description: A contact form modal with button trigger.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:aegis/modal {"modalId":"contact-modal","modalType":"popup","triggerType":"button","triggerText":"<?php echo esc_attr__('Contact Us', 'aegis'); ?>","modalTitle":"<?php echo esc_attr__('Get in Touch', 'aegis'); ?>","animation":"fade","width":"500px"} -->
<!-- wp:heading {"level":3,"textAlign":"center"} -->
<h3 class="has-text-align-center"><?php echo esc_html__('Get in Touch', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__('Have a question? We\'d love to hear from you.', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<form class="contact-form" style="display:flex;flex-direction:column;gap:16px">
	<input type="text" placeholder="<?php echo esc_attr__('Your Name', 'aegis'); ?>" required style="padding:12px;border:1px solid;border-color:var(--wp--preset--color--neutral-200);border-radius:4px;background:var(--wp--preset--color--neutral-0);color:var(--wp--preset--color--neutral-950)">
	<input type="email" placeholder="<?php echo esc_attr__('Your Email', 'aegis'); ?>" required style="padding:12px;border:1px solid;border-color:var(--wp--preset--color--neutral-200);border-radius:4px;background:var(--wp--preset--color--neutral-0);color:var(--wp--preset--color--neutral-950)">
	<textarea placeholder="<?php echo esc_attr__('Your Message', 'aegis'); ?>" rows="4" required style="padding:12px;border:1px solid;border-color:var(--wp--preset--color--neutral-200);border-radius:4px;resize:vertical;background:var(--wp--preset--color--neutral-0);color:var(--wp--preset--color--neutral-950)"></textarea>
	<button type="submit" style="padding:12px 24px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:none;border-radius:4px;cursor:pointer"><?php echo esc_html__('Send Message', 'aegis'); ?></button>
</form>
<!-- /wp:html -->
<!-- /wp:aegis/modal -->