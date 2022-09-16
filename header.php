<?php
/**
 * The template for displaying the header.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php aeon_do_microdata( 'body' ); ?>>
	<?php
	/**
	 * wp_body_open.
	 */
	wp_body_open();

	/**
	 * aeon_before_header hook.
	 *
	 * @since 1.0.0
	 *
	 * @hooked aeon_do_skip_to_content_link - 1
	 */
	do_action( 'aeon_before_header' );

	/**
	 * aeon_header hook.
	 *
	 * @since 1.0.0
	 *
	 * @hooked aeon_get_header - 10
	 */
	do_action( 'aeon_header' );

	/**
	 * aeon_after_header hook.
	 *
	 * @since 1.0.0
	 *
	 * @hooked aeon_get_page_header - 10
	 */
	do_action( 'aeon_after_header' );
	?>

	<div id="page" class="site">
		<?php
		/**
		 * aeon_inside_site hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_inside_site' );
		?>
		<div id="content" class="site-content container">
			<?php
			/**
			 * aeon_inside_container hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_inside_container' );
			?>
