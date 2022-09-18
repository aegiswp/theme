<?php
/**
 * Footer.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aeon_get_footer' ) ) {
	/**
	 * Build the footer.
	 *
	 * @since 1.0.0
	 */
	function aeon_get_footer() { ?>
		<footer id="colophon" class="site-footer" <?php aeon_do_microdata( 'footer' ); ?>>
			<div class="site-info">
				<?php
				/**
				 * aeon_footer_widgets hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked aeon_get_footer_widgets
				 * @hooked aeon_get_copyright
				 */
				do_action( 'aeon_footer_widgets' );
				?>
			</div>
		</footer>
		<?php
	}
	add_action( 'aeon_footer', 'aeon_get_footer' );
}

if ( ! function_exists( 'aeon_get_footer_widgets' ) ) {
	/**
	 * Build the footer widgets.
	 *
	 * @since 1.0.0
	 */
	function aeon_get_footer_widgets() {
		$widgets = aeon_get_option( 'footer_columns' );

		if ( ! empty( $widgets ) && 0 !== $widgets ) :

			$footer_1 = is_active_sidebar( 'aeon-footer-1' );
			$footer_2 = is_active_sidebar( 'aeon-footer-2' );
			$footer_3 = is_active_sidebar( 'aeon-footer-3' );
			$footer_4 = is_active_sidebar( 'aeon-footer-4' );
			$footer_5 = is_active_sidebar( 'aeon-footer-5' );
			$footer_6 = is_active_sidebar( 'aeon-footer-6' );

			// If no footer widgets exist, we do not need to continue.
			if ( ! $footer_1 && ! $footer_2 && ! $footer_3 && ! $footer_4 && ! $footer_5 && ! $footer_6 ) {
				return;
			}
			?>
			<div id="footer-widgets">
				<div class="container">
					<div class="footer-widgets footer-col-<?php echo esc_attr( $widgets ); ?>">
						<?php
						if ( $widgets >= 1 && $footer_1 ) {
							?>
							<div class="footer-1 footer-col">
								<?php dynamic_sidebar( 'aeon-footer-1' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 2 && $footer_2 ) {
							?>
							<div class="footer-2 footer-col">
								<?php dynamic_sidebar( 'aeon-footer-2' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 3 && $footer_3 ) {
							?>
							<div class="footer-3 footer-col">
								<?php dynamic_sidebar( 'aeon-footer-3' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 4 && $footer_4 ) {
							?>
							<div class="footer-4 footer-col">
								<?php dynamic_sidebar( 'aeon-footer-4' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 5 && $footer_5 ) {
							?>
							<div class="footer-5 footer-col">
								<?php dynamic_sidebar( 'aeon-footer-5' ); ?>
							</div>
							<?php
						}

						if ( $widgets >= 6 && $footer_6 ) {
							?>
							<div class="footer-6 footer-col">
								<?php dynamic_sidebar( 'aeon-footer-6' ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
		/**
		 * aeon_after_footer_widgets hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_after_footer_widgets' );
	}
	add_action( 'aeon_footer_widgets', 'aeon_get_footer_widgets' );
}

if ( ! function_exists( 'aeon_get_copyright' ) ) {
	/**
	 * Get the copyright to the footer
	 *
	 * @since 1.0.0
	 */
	function aeon_get_copyright() {
		?>
		<div class="copyright-bar">
			<div class="container">
				<?php
				/**
				 * aeon_copyright hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked aeon_add_copyright
				 */
				do_action( 'aeon_copyright' );
				?>
			</div>
		</div>
		<?php
	}
	add_action( 'aeon_footer_widgets', 'aeon_get_copyright' );
}

if ( ! function_exists( 'aeon_add_copyright' ) ) {
	/**
	 * Add the copyright to the footer.
	 *
	 * @since 1.0.0
	 */
	function aeon_add_copyright() {
		$content = aeon_get_option( 'copyright' );
		if ( $content || is_customize_preview() ) {
			echo '<div class="aeon-copyright">';
				$content = str_replace( '[copyright]', '&copy;', $content );
				$content = str_replace( '[current_year]', gmdate( 'Y' ), $content );
				$content = str_replace( '[site_title]', get_bloginfo( 'name' ), $content );
				$content = str_replace( '[theme]', '<a href="//wordpress.org/themes/aeon/" rel="nofollow noopener" target="_blank">Built with Aeon</a>', $content );
				echo do_shortcode( wpautop( $content ) );
			echo '</div>';
		}
	}
	add_action( 'aeon_copyright', 'aeon_add_copyright' );
}

if ( ! function_exists( 'aeon_scroll_up' ) ) {
	/**
	 * Build the back to top button.
	 *
	 * @since 1.0.0
	 */
	function aeon_scroll_up() {
		echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'aeon_scroll_up_output',
			sprintf(
				'<a href="#" class="ae-scroll-up" aria-label="%1$s" rel="nofollow">
					%2$s
				</a>',
				esc_attr__( 'Scroll Up', 'aeonwp' ),
				aeon_get_svg_icon( 'scroll-up' )
			)
		);
	}
	add_action( 'aeon_after_footer', 'aeon_scroll_up' );
}
