<?php
/**
 * Header.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aeon_get_header' ) ) {
	/**
	 * Build the header.
	 *
	 * @since 1.0.0
	 */
	function aeon_get_header() {
		?>
		<header <?php echo implode( ' ', aeon_header_attribute() ); ?> <?php aeon_do_microdata( 'header' ); ?>>
			<?php
			/**
			 * aeon_before_header_inner hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_before_header_inner' );
			?>
			<div class="<?php echo esc_attr( implode( ' ', aeon_header_inner_classes() ) ); ?>">
				<?php
				/**
				 * aeon_before_header_content hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked aeon_add_logo - 5
				 */
				do_action( 'aeon_before_header_content' );

				/**
				 * aeon_after_header_content hook.
				 *
				 * @since 1.0.0
				 *
				 * @hooked aeon_add_navigation - 5
				 */
				do_action( 'aeon_after_header_content' );
				?>
			</div>
			<?php
			/**
			 * aeon_after_header_inner hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_after_header_inner' );
			?>
		</header><!-- #masthead -->
		<?php
	}
	add_action( 'aeon_header', 'aeon_get_header' );
}

if ( ! function_exists( 'aeon_header_attribute' ) ) {
	/**
	 * Get any necessary microdata.
	 *
	 * @return string Our final attributes to add to the element.
	 *
	 * @since 1.0.0
	 */
	function aeon_header_attribute() {
		$att = array();

		$att[] = 'id="masthead"';
		$att[] = 'class="' . esc_attr( implode( ' ', aeon_header_classes() ) ) .'"';

		if ( aeon_get_option( 'add_sticky' )
		&& 'none' !== aeon_get_option( 'sticky_breakpoint' ) ) {
			$att[] = 'data-destroy-sticky="' . aeon_get_option( 'sticky_breakpoint' ) . '"';
		}

		return apply_filters( "aeon_header_attribute", $att );
	}
}

if ( ! function_exists( 'aeon_header_classes' ) ) {
	/**
	 * Header classes.
	 *
	 * @since 1.0.0
	 */
	function aeon_header_classes() {
		$classes = array();
		$sticky_classes = array();

		$classes[] = 'site-header';

		// If sticky
		if ( aeon_get_option( 'add_sticky' ) ) {
			$sticky_classes[] = 'ae-has-sticky';

			// Sticky style
			if ( 'hide-scroll' === aeon_get_option( 'sticky_style' ) ) {
				$sticky_classes[] = 'ae-hide-scroll';
			}

			// If sticky logo
			if ( aeon_get_option( 'sticky_logo' ) ) {
				$sticky_classes[] = 'ae-has-sticky-logo';
			}

			// If sticky shadow
			if ( aeon_get_option( 'add_sticky_shadow' ) ) {
				$sticky_classes[] = 'ae-has-shadow';
			}
		}

		if ( apply_filters( 'aeon_sticky_classes', true ) ) {
			$classes = array_merge( $classes, $sticky_classes );
		}

		return apply_filters( 'aeon_header_classes', $classes );
	}
}

if ( ! function_exists( 'aeon_header_inner_classes' ) ) {
	/**
	 * Header inner classes.
	 *
	 * @since 1.0.0
	 */
	function aeon_header_inner_classes() {
		$classes = array();

		$classes[] = 'site-header-inner';

		// Add class for megamenu width
		$classes[] = 'ae-container';

		// If container
		if ( ! aeon_get_option( 'remove_container' ) ) {
			$classes[] = 'container';
		}

		return apply_filters( 'aeon_header_inner_classes', $classes );
	}
}

if ( ! function_exists( 'aeon_add_logo' ) ) {
	/**
	 * Build the logo
	 *
	 * @since 1.0.0
	 */
	function aeon_add_logo() {
		/**
		 * aeon_before_logo hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_before_logo' );
		?>

		<div class="site-branding">
			<?php
			if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
				the_custom_logo();
				aeon_sticky_logo();
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title site-logo-text" <?php aeon_do_microdata( 'headline' ); ?>><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				<?php
			}

			echo aeon_site_info();
			?>
		</div>

		<?php
		/**
		 * aeon_after_logo hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_after_logo' );
	}
	add_action( 'aeon_before_header_content', 'aeon_add_logo', 5 );
}

if ( ! function_exists( 'aeon_site_info' ) ) {
	/**
	 * Get site info.
	 */
	function aeon_site_info() {
		$settings = wp_parse_args(
			get_option( 'aeon_settings', array() ),
			aeon_get_defaults()
		);

		// Get the title and tagline.
		$title = get_bloginfo( 'title' );
		$tagline = get_bloginfo( 'description' );

		$show_title = ( true === $settings['show_site_title'] || empty( $title ) ) ? true : false;
		$show_tagline = ( true === $settings['show_tagline'] || empty( $tagline ) ) ? true : false;

		if ( true === $show_title || true === $show_tagline ) {
			?>
			<div class="site-header-info">
				<?php
				if ( true === $show_title ) {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title site-logo-text" <?php aeon_do_microdata( 'headline' ); ?>><?php echo esc_html( $title ); ?></a>
					<?php
				}
				if ( true === $show_tagline ) {
					?>
					<p class="site-description" <?php aeon_do_microdata( 'description' ); ?>><?php echo esc_html( $tagline ); ?></p>
					<?php
				}
				?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'aeon_replace_logo_attr' ) ) {
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function aeon_replace_logo_attr( $attr, $attachment, $size ) {
		if ( ! isset( $attachment ) ) {
			return $attr;
		}

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$add_retina_logo = aeon_get_option( 'add_retina_logo' );
		$is_logo_attachment = ( $custom_logo_id == $attachment->ID ) ? true : false;

		// If retina logo.
		if ( apply_filters( 'aeon_is_retina_logo_attachment', $is_logo_attachment, $attachment ) ) {
			if ( true == $add_retina_logo ) {
				$retina_logo = aeon_get_option( 'retina_logo' );
				$attr['srcset'] = '';

				if ( apply_filters( 'aeon_retina_logo', true ) && $retina_logo ) {
					$cutom_logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
					$attr['srcset'] = $cutom_logo[0] . ' 1x, ' . $retina_logo . ' 2x';
				}
			}
		}

		return apply_filters( 'aeon_replace_logo_attr', $attr );
	}
	add_filter( 'wp_get_attachment_image_attributes', 'aeon_replace_logo_attr', 10, 3 );
}

if ( ! function_exists( 'aeon_get_sticky_logo' ) ) {
	/**
	 * Get the sticky logo
	 *
	 * @since 1.0.0
	 */
	function aeon_get_sticky_logo() {
		$sticky_logo = aeon_get_option( 'sticky_logo' );
		$logo_id = attachment_url_to_postid( $sticky_logo );
		$retina_logo = aeon_get_option( 'sticky_retina_logo' );

		if ( ! $sticky_logo ) {
			return;
		}

		$attr = array(
			'class' => 'sticky-logo',
			'loading' => false,
		);

		// If retina logo.
		if ( $retina_logo ) {
			$original_logo = wp_get_attachment_image_src( $logo_id, 'full' );
			$attr['srcset'] = $original_logo[0] . ' 1x, ' . $retina_logo . ' 2x';
		}

		/*
		* If the logo alt attribute is empty, get the site title and explicitly pass it
		* to the attributes used by wp_get_attachment_image().
		*/
		$image_alt = get_post_meta( $sticky_logo, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		/**
		 * Filters the list of custom logo image attributes.
		 *
		 * @param array $logo_attr   Custom logo image attributes.
		 * @param int   $sticky_logo Custom logo attachment ID.
		 */
		$attr = apply_filters( 'aeon_sticky_logo_attributes', $attr, $sticky_logo );

		/*
		* If the alt attribute is not empty, there is no need to explicitly pass it
		* because wp_get_attachment_image() already adds the alt attribute.
		*/
		$image = wp_get_attachment_image( $logo_id, 'full', false, $attr );

		$html = sprintf(
			'<a href="%1$s" class="sticky-logo-link" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			$image
		);

		return apply_filters( 'aeon_sticky_logo', $html );
	}
}

if ( ! function_exists( 'aeon_sticky_logo' ) ) {
	/**
	 * The sticky logo.
	 *
	 * @since 1.0.0
	 */
	function aeon_sticky_logo() {
		echo aeon_get_sticky_logo();
	}
}

if ( ! function_exists( 'aeon_add_search_icon' ) ) {
	/**
	 * Add search icon.
	 *
	 * @since 1.0.0
	 */
	function aeon_add_search_icon() {
		// Return if none.
		if ( 'none' === aeon_get_option( 'search_style' ) ) {
			return;
		}

		// Wrapper classes.
		$classes = array( 'aeon-search-icon' );

		// Search style.
		$classes[] = 'search-' . aeon_get_option( 'search_style' );
		?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php
			if ( 'slide' === aeon_get_option( 'search_style' ) ) {
				?>
				<div class="aeon-search-wrapper">
					<?php
					get_search_form(
						array(
							'input_value' => get_search_query(),
							'show_input_submit' => false,
							'search_source' => aeon_get_option( 'search_source' ),
						)
					);
					?>
					<span class="aeon-search-close">
						<?php echo aeon_get_svg_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
					</span>
				</div>
				<?php
			}
			?>
			<a href="#" class="aeon-search-icon-link" aria-label="<?php esc_attr_e( 'Search Website', 'aeonwp' ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Search Website', 'aeonwp' ); ?></span>
				<?php echo aeon_get_svg_icon( 'search-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
			</a>
			<?php
			if ( 'dropdown' === aeon_get_option( 'search_style' ) ) {
				?>
				<div class="aeon-search-wrapper">
					<?php
					get_search_form(
						array(
							'input_value' => get_search_query(),
							'show_input_submit' => false,
							'search_source' => aeon_get_option( 'search_source' ),
						)
					);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	add_action( 'aeon_after_navigation', 'aeon_add_search_icon', 10 );
}

if ( ! function_exists( 'aeon_search_full_screen' ) ) {
	/**
	 * Search full screen.
	 *
	 * @since 1.0.0
	 */
	function aeon_search_full_screen() {
		// Return if not full screen.
		if ( 'full-screen' !== aeon_get_option( 'search_style' ) ) {
			return;
		}

		$classes = array( 'search-text' );

		$text = aeon_get_option( 'search_fullscreen_heading' );
		$text = ( $text ) ? $text : esc_html__( 'Start typing and press enter to search', 'aeonwp' );

		// Class for customizer preview.
		if ( is_customize_preview() ) {
			if ( ! empty( $text ) ) {
				$classes[] = 'show-fs-search-text';
			} else {
				$classes[] = 'hide-fs-search-text';
			}
		}
		?>
		<div class="aeon-search-full-screen">
			<span class="aeon-search-close">
				<?php echo aeon_get_svg_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
			</span>
			<div class="aeon-search-wrapper">
				<div class="search-container">
					<?php
					if ( ! empty( $text ) ) {
						?>
						<h3 class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"><?php echo esc_html( $text ); ?></h3>
						<?php
					}

					get_search_form(
						array(
							'input_value' => get_search_query(),
							'show_input_submit' => false,
							'search_source' => aeon_get_option( 'search_source' ),
						)
					);
					?>
				</div>
			</div>
		</div>
		<?php
	}
	add_action( 'wp_footer', 'aeon_search_full_screen' );
}

/**
 * Add skip to content link before the header.
 *
 * @since 1.0.0
 */
function aeon_do_skip_to_content_link() {
	printf(
		'<a class="screen-reader-text skip-link" href="#content" title="%1$s">%2$s</a>',
		esc_attr__( 'Skip to content', 'aeonwp' ),
		esc_html__( 'Skip to content', 'aeonwp' )
	);
}
add_action( 'aeon_before_header', 'aeon_do_skip_to_content_link', 2 );
