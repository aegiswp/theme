<?php
/**
 * Navigation
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aeon_add_navigation' ) ) {
	/**
	 * Build the navigation.
	 *
	 * @since 1.0.0
	 */
	function aeon_add_navigation() {
		/**
		 * aeon_before_navigation hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_before_navigation' ); ?>

		<nav id="site-navigation" class="main-navigation" <?php aeon_do_microdata( 'navigation' ); ?>>
			<?php
			/**
			 * aeon_before_main_menu hook.
			 *
			 * @since 1.0.0
			 *
			 * @hooked aeon_add_menu_toggle - 10
			 */
			do_action( 'aeon_before_main_menu' );

			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'container' => 'div',
					'container_class' => 'main-nav',
					'container_id' => 'primary-menu',
					'menu_class' => '',
					'fallback_cb' => 'aeon_menu_fallback',
					'items_wrap' => '<ul id="%1$s" class="%2$s menu">%3$s</ul>',
				)
			);
			
			/**
			 * aeon_after_main_menu hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_after_main_menu' );
			?>
		</nav><!-- #site-navigation -->

		<?php
		/**
		 * aeon_after_navigation hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_after_navigation' );
	}
	add_action( 'aeon_after_header_content', 'aeon_add_navigation', 5 );
}

if ( ! function_exists( 'aeon_add_menu_toggle' ) ) {
	/**
	 * Build the navigation.
	 *
	 * @since 1.0.0
	 */
	function aeon_add_menu_toggle() {
		$label = aeon_get_option( 'mobile_label' );
		$label = ( $label ) ? $label : esc_html__( 'Menu', 'aeonwp' );
		?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<span class="screen-reader-text"><?php echo esc_html( $label ); ?></span>
			<?php
			echo aeon_get_svg_icon( 'menu-bars' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function.
			aeon_menu_toggle_label();
			?>
		</button>
		<?php
	}
	add_action( 'aeon_before_main_menu', 'aeon_add_menu_toggle', 10 );
}

if ( ! function_exists( 'aeon_menu_toggle_label' ) ) {
	/**
	 * Mobile menu label.
	 *
	 * @since 1.1.0
	 */
	function aeon_menu_toggle_label() {
		$label = aeon_get_option( 'mobile_label' );
		$text = ( $label ) ? $label : esc_html__( 'Menu', 'aeonwp' );

		// Return is empty.
		if ( ! is_customize_preview()
		&& empty( $label ) ) {
			return;
		}

		// Wrapper classes.
		$classes = array( 'mobile-menu-wrap' );

		// Class for customizer preview.
		if ( is_customize_preview() ) {
			if ( ! empty( $label ) ) {
				$classes[] = 'show-mobile-label';
			} else {
				$classes[] = 'hide-mobile-label';
			}
		}
		?>
		<span class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<span class="mobile-menu"><?php echo esc_html( $text ); ?></span>
		</span>
		<?php
	}
}

if ( ! function_exists( 'aeon_menu_fallback' ) ) {
	/**
	 * Menu fallback.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Existing menu args.
	 */
	function aeon_menu_fallback( $args ) {
		?>
		<div class="main-nav">
			<ul id="primary-menu" class="nav-menu menu">
				<?php
				$args = array(
					'sort_column' => 'menu_order',
					'title_li' => '',
					'walker' => new Aeon_Walker_Page(),
				);

				wp_list_pages( $args );
				?>
			</ul>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aeon_nav_menu_items' ) ) {
	/**
	 * Add mobile cart and search.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Existing menu args.
	 */
	function aeon_nav_menu_items( $items, $args ) {
		// Add cart link for mobile if cart icon enabled.
		if ( class_exists( 'WooCommerce' ) && apply_filters( 'aeon_cart_link_mobile', true ) ) {
			if ( is_customize_preview()
			|| true === aeon_get_option( 'add_cart_icon' ) ) {
				// Wrapper classes.
				$cart = array( 'aeon-cart-mobile' );
		
				// Class for customizer preview.
				if ( is_customize_preview() ) {
					if ( true === aeon_get_option( 'add_cart_icon' ) ) {
						$cart[] = 'show-cart';
					} else {
						$cart[] = 'hide-cart';
					}
				}
		
				$cart_link = wc_get_cart_url();
		
				// Class for customizer preview.
				if ( is_customize_preview() ) {
					$cart_link = '#';
				}
		
				if ( 'main-menu' === $args->theme_location ) {
					$items .= '<li class="' . esc_attr( implode( ' ', $cart ) ) . '"><a href="' . esc_url( $cart_link ) . '">' . aeon_get_svg_icon( 'cart-icon' ) . esc_html__( 'Your Cart', 'aeonwp' ) . '</a></li>';
				}
			}
		}

		// Add search form for mobile if search icon.
		if ( 'none' !== aeon_get_option( 'search_style' ) && apply_filters( 'aeon_search_mobile', true ) ) {
			if ( 'main-menu' === $args->theme_location ) {
				$items .= '<li class="aeon-search-mobile">';
				$items .= get_search_form(
					array(
						'echo' => false,
						'input_placeholder' => esc_attr_x( 'Research For&hellip;', 'placeholder', 'aeonwp' ),
						'input_value' => get_search_query(),
						'search_source' => aeon_get_option( 'search_source' ),
					)
				);
				$items .= '</li>';
			}
		}

		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'aeon_nav_menu_items', 10, 2 );
}

if ( ! class_exists( 'Aeon_Walker_Page' ) && class_exists( 'Walker_Page' ) ) {
	/**
	 * Add arrow on sub menu.
	 *
	 * @since 1.0.0
	 */
	class Aeon_Walker_Page extends Walker_Page {
		/**
		 * Outputs the beginning of the current element in the tree.
		 *
		 * @see Walker::start_el()
		 * @param string  $output       Used to append additional content. Passed by reference.
		 * @param WP_Post $page         Page data object.
		 * @param int     $depth        Optional. Depth of page. Used for padding. Default 0.
		 * @param array   $args         Optional. Array of arguments. Default empty array.
		 * @param int     $current_page Optional. Page ID. Default 0.
		 */
		function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
			$css_class   = array( 'page_item', 'page-item-' . $page->ID );
			$arrow = '';

			if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
				$css_class[] = 'menu-item-has-children';
				$icon = aeon_get_svg_icon( 'arrow-down' );
				$arrow = '<span role="presentation" class="dropdown-menu-toggle">' . $icon . '</span>';
			}

			if ( ! empty( $current_page ) ) {
				$_current_page = get_post( $current_page );
				if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
					$css_class[] = 'current-menu-ancestor';
				}
				if ( $page->ID == $current_page ) {
					$css_class[] = 'current-menu-item';
				} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
					$css_class[] = 'current-menu-parent';
				}
			} elseif ( get_option( 'page_for_posts' ) == $page->ID ) {
				$css_class[] = 'current-menu-parent';
			}

			$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound

			$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
			$args['link_after']  = empty( $args['link_after'] ) ? '' : $args['link_after'];

			$output .= sprintf(
				'<li class="%s"><a href="%s">%s%s%s%s</a>',
				$css_classes,
				get_permalink( $page->ID ),
				$args['link_before'],
				apply_filters( 'the_title', $page->post_title, $page->ID ), // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
				$args['link_after'],
				$arrow
			);
		}
	}
}

if ( ! function_exists( 'aeon_dropdown_icon' ) ) {
	/**
	 * Add dropdown icon if menu item has children.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $title The menu item title.
	 * @param WP_Post  $item All of our menu item data.
	 * @param stdClass $args All of our menu item args.
	 * @param int      $depth Depth of menu item.
	 * @return string The menu item.
	 */
	function aeon_dropdown_icon( $title, $item, $args, $depth ) {
		$role = 'presentation';
		$tabindex = '';

		if ( isset( $args->container_class ) && 'main-nav' === $args->container_class ) {
			foreach ( $item->classes as $value ) {
				if ( 'menu-item-has-children' === $value ) {
					$icon = aeon_get_svg_icon( 'arrow-down' );

					if ( 'main-menu' === $args->theme_location ) {
						if ( 0 !== $depth ) {
							if ( is_rtl() ) {
								$icon = aeon_get_svg_icon( 'arrow-left' );
							} else {
								$icon = aeon_get_svg_icon( 'arrow-right' );
							}
						}
					}

					$title = $title . '<span role="' . $role . '" class="dropdown-menu-toggle"' . $tabindex . '>' . $icon . '</span>';
				}
			}
		}

		return $title;
	}
	add_filter( 'nav_menu_item_title', 'aeon_dropdown_icon', 10, 4 );
}
