<?php
/**
 * Title: Skip to Content
 * Slug: aegis/skip-to-content
 * Categories: utility
 * Description: Accessibility link that allows keyboard users to skip navigation and jump directly to main content.
 * Keywords: accessibility, a11y, skip, navigation, keyboard
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);
?>
<!-- wp:html -->
<a href="#main-content" class="skip-to-content" style="position: absolute; left: -9999px; z-index: 999; padding: 1em; background: var(--wp--preset--color--primary-500); color: var(--wp--preset--color--neutral-0); text-decoration: none; border-radius: var(--wp--custom--border--radius)">
	<?php echo esc_html__( 'Skip to main content', 'aegis' ); ?>
</a>
<style>
.skip-to-content:focus {
	left: 1rem;
	top: 1rem;
}
</style>
<!-- /wp:html -->
