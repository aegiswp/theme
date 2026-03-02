<?php
/**
 * Title: Newsletter Modal
 * Slug: newsletter
 * Categories: modal
 * Keywords: modal, newsletter, popup, subscribe, email
 * Description: A newsletter subscription modal with exit intent trigger.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:aegis/modal {"modalId":"newsletter-modal","triggerType":"exit-intent","modalTitle":"<?php echo esc_attr__('Subscribe to Our Newsletter', 'aegis'); ?>","animation":"zoom","exitIntentSensitivity":20,"showOnce":true,"showOnceExpiry":7} -->
<!-- wp:heading {"level":3,"textAlign":"center"} -->
<h3 class="has-text-align-center"><?php echo esc_html__('Don\'t Miss Out!', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__('Subscribe to our newsletter and get exclusive updates, tips, and offers delivered straight to your inbox.', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:html -->
	<form class="newsletter-form" style="display:flex;gap:8px;max-width:400px;margin:0 auto;">
		<input type="email" placeholder="<?php echo esc_attr__('Enter your email', 'aegis'); ?>" required style="flex:1;padding:12px;border:1px solid;border-color:var(--wp--preset--color--neutral-200);border-radius:4px;background:var(--wp--preset--color--neutral-0);color:var(--wp--preset--color--neutral-950);">
		<button type="submit" style="padding:12px 24px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:none;border-radius:4px;cursor:pointer;"><?php echo esc_html__('Subscribe', 'aegis'); ?></button>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size"><?php echo esc_html__('We respect your privacy. Unsubscribe at any time.', 'aegis'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:aegis/modal -->