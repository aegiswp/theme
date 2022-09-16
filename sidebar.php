<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Return if full width or no sidebar.
if ( in_array( aeon_get_layout(), array( 'full-width', 'no-sidebar' ) ) ) {
	return;
}

// Sidebar.
$sidebar = apply_filters( 'aeon_get_sidebar', 'aeon-sidebar' ) ?>

<aside id="secondary" class="widget-area" <?php aeon_do_microdata( 'sidebar' ); ?>>
	<?php
	if ( is_active_sidebar( $sidebar ) ) {
		dynamic_sidebar( $sidebar );
	}
	?>
</aside><!-- #secondary -->
