<?php
/**
 * Title: Skip to Content
 * Slug: skip-to-content
 * Categories: utility
 * Description: Accessibility link that allows keyboard users to skip navigation and jump directly to main content.
 * Keywords: accessibility, a11y, skip, navigation, keyboard
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );
?>
<!-- wp:html -->
<a href="#main" class="skip-link screen-reader-text skip-to-content"><?php echo esc_html__( 'Skip to content', 'aegis' ); ?></a>
<!-- /wp:html -->
