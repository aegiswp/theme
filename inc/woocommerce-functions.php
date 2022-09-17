<?php
/**
 * Custom functions that used for WooCommerce.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue scripts.
 */
function aeon_woocommerce_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'aeon-woocommerce', AEON_THEME_URI . 'assets/js/woocommerce' . $suffix . '.js', array(), AEON_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'aeon_woocommerce_scripts' );

if ( ! function_exists( 'aeon_woocommerce_shop_products_title' ) ) {
	/**
	 * Shop Page Product Titles.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_shop_products_title() {
		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
			echo '<h2 class="woocommerce-loop-product__title">' . esc_html( get_the_title() ) . '</h2>';
		echo '</a>';
	}
}

if ( ! function_exists( 'aeon_woocommerce_shop_products_category' ) ) {
	/**
	 * Add and/or Remove Categories from Shop Archive Page.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_shop_products_category() {
		if ( apply_filters( 'aeon_woocommerce_shop_parent_category', true ) ) { ?>
			<span class="aeon-product-category">
				<?php
				global $product;
				$product_categories = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), ';', '', '' ) : $product->get_categories( ';', '', '' );

				$product_categories = htmlspecialchars_decode( wp_strip_all_tags( $product_categories ) );
				if ( $product_categories ) {
					list( $parent_cat ) = explode( ';', $product_categories );
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo apply_filters( 'aeon_woocommerce_shop_product_categories', esc_html( $parent_cat ), get_the_ID() );
				}
				?>
			</span>
			<?php
		}
	}
}

if ( ! function_exists( 'aeon_woocommerce_shop_out_of_stock' ) ) {
	/**
	 * Add Out of Stock to the Shop page.
	 *
	 * @hooked woocommerce_shop_loop_item_title - 8
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_shop_out_of_stock() {
		$out_of_stock        = get_post_meta( get_the_ID(), '_stock_status', true );
		$out_of_stock_string = apply_filters( 'aeon_woocommerce_shop_out_of_stock_string', esc_html__( 'Out of stock', 'aeonwp' ) );
		if ( 'outofstock' === $out_of_stock ) {
			?>
			<span class="aeon-product-out-of-stock"><?php echo esc_html( $out_of_stock_string ); ?></span>
			<?php
		}
	}
}

if ( ! function_exists( 'aeon_woocommerce_shop_product_content' ) ) {
	/**
	 * Product content.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_shop_product_content() {

		do_action( 'aeon_woo_shop_before_products_wrap' );
		echo '<div class="aeon-products-wrap">';

			/**
			 * Product Category.
			 */
			do_action( 'aeon_woo_shop_category_before' );
			aeon_woocommerce_shop_products_category();
			do_action( 'aeon_woo_shop_category_after' );

			/**
			 * Product Title.
			 */
			do_action( 'aeon_woo_shop_title_before' );
			aeon_woocommerce_shop_products_title();
			do_action( 'aeon_woo_shop_title_after' );

			/**
			 * Product Price.
			 */
			do_action( 'aeon_woo_shop_price_before' );
			woocommerce_template_loop_price();
			do_action( 'aeon_woo_shop_price_after' );

			/**
			 * Product Rating.
			 */
			do_action( 'aeon_woo_shop_rating_before' );
			woocommerce_template_loop_rating();
			do_action( 'aeon_woo_shop_rating_after' );

			/**
			 * Product Add To Cart.
			 */
			do_action( 'aeon_woo_shop_add_to_cart_before' );
			woocommerce_template_loop_add_to_cart();
			do_action( 'aeon_woo_shop_add_to_cart_after' );

		echo '</div>';
		do_action( 'aeon_woo_shop_after_products_wrap' );

	}
}

if ( ! function_exists( 'aeon_woocommerce_woo_defaults' ) ) {
	/**
	 * Theme Defaults.
	 *
	 * @param array $defaults Array of options value.
	 * @return array
	 */
	function aeon_woocommerce_woo_defaults( $defaults ) {
		// Layout.
		$defaults['shop_layout'] = 'no-sidebar';
		$defaults['single_product_layout'] = 'no-sidebar';
		$defaults['cart_layout'] = 'no-sidebar';
		$defaults['checkout_layout'] = 'no-sidebar';
		$defaults['my_account_layout'] = 'no-sidebar';

		// Columns.
		$defaults['shop_columns'] = array(
			'desktop' => '4',
			'tablet'  => '2',
			'mobile'  => '1',
		);

		// Products per page.
		$defaults['shop_no_of_products'] = '12';

		return $defaults;
	}
	add_filter( 'aeon_option_defaults', 'aeon_woocommerce_woo_defaults' );
}

if ( ! function_exists( 'aeon_woocommerce_enqueue_styles' ) ) {
	/**
	 * Subcategory Count Markup.
	 *
	 * @param  array $styles  Css files.
	 *
	 * @return array
	 */
	function aeon_woocommerce_enqueue_styles( $styles ) {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$url = AEON_THEME_URI . 'assets/css/woocommerce/';

		$styles = array(
			'woocommerce-layout'      => array(
				'src'     => $url . 'woocommerce-layout' . $suffix . '.css',
				'deps'    => '',
				'version' => AEON_VERSION,
				'media'   => 'all',
				'has_rtl' => true,
			),
			'woocommerce-smallscreen' => array(
				'src'     => $url . 'woocommerce-smallscreen' . $suffix . '.css',
				'deps'    => 'woocommerce-layout',
				'version' => AEON_VERSION,
				'media'   => 'only screen and (max-width: ' . apply_filters( 'woocommerce_style_smallscreen_breakpoint', '768px' ) . ')', // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
				'has_rtl' => true,
			),
			'woocommerce-general'     => array(
				'src'     => $url . 'woocommerce' . $suffix . '.css',
				'deps'    => '',
				'version' => AEON_VERSION,
				'media'   => 'all',
				'has_rtl' => true,
			),
		);

		return $styles;
	}
	add_filter( 'woocommerce_enqueue_styles', 'aeon_woocommerce_enqueue_styles' );
}

if ( ! function_exists( 'aeon_woocommerce_add_cart_icon' ) ) {
	/**
	 * Add cart icon.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_add_cart_icon() {
		// Return is not enabled.
		if ( ! is_customize_preview()
		&& true !== aeon_get_option( 'add_cart_icon' ) ) {
			return;
		}

		// Wrapper classes.
		$classes = array( 'aeon-cart-icon' );

		// Class for customizer preview.
		if ( is_customize_preview() ) {
			if ( true === aeon_get_option( 'add_cart_icon' ) ) {
				$classes[] = 'show-cart';
			} else {
				$classes[] = 'hide-cart';
			}
		}
		?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php
			aeon_woocommerce_get_cart_link();
			if ( apply_filters( 'aeon_woocommerce_widget', true ) ) {
				aeon_woocommerce_get_cart_widget();
			}
			?>
		</div>
		<?php
	}
	add_action( 'aeon_after_navigation', 'aeon_woocommerce_add_cart_icon', 20 );
}

if ( ! function_exists( 'aeon_woocommerce_get_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * @since  1.0.0
	 */
	function aeon_woocommerce_get_cart_link() {
		$cart_link = wc_get_cart_url();

		if ( is_customize_preview() ) {
			$cart_link = '#';
		}

		// Link classes.
		$classes = array( 'aeon-cart-link' );

		// Add filter.
		$classes = apply_filters( 'aeon_woocommerce_cart_link_classes', $classes );
		?>
		<a href="<?php echo esc_url( $cart_link ); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'aeonwp' ); ?>">
			<?php
			echo aeon_get_svg_icon( 'cart-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function.
			aeon_woocommerce_get_cart_count();
			aeon_woocommerce_get_cart_total();
			?>
			<span class="screen-reader-text"><?php esc_html_e( 'Cart', 'aeonwp' ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'aeon_woocommerce_get_cart_widget' ) ) {
	/**
	 * Cart widget.
	 *
	 * @since  1.0.0
	 */
	function aeon_woocommerce_get_cart_widget() {
		if ( ! is_cart() && ! is_checkout() ) {
			// Classes.
			$classes = array(
				'aeon-cart-widget',
				'aeon-cart-header',
			);
	
			// Add filter.
			$classes = apply_filters( 'aeon_woocommerce_cart_widget_classes', $classes );
			?>
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'aeon_woocommerce_get_cart_count' ) ) {
	/**
	 * Get cart count
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_get_cart_count() {
		// Return is not enabled.
		if ( ! is_customize_preview()
		&& true !== aeon_get_option( 'cart_count' ) ) {
			return;
		}

		// Wrapper classes.
		$classes = array( 'aeon-count' );

		// Class for customizer preview.
		if ( is_customize_preview() ) {
			if ( true === aeon_get_option( 'cart_count' ) ) {
				$classes[] = 'show-cart-count';
			} else {
				$classes[] = 'hide-cart-count';
			}
		}
		?>
		<span class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php
			if ( null != WC()->cart ) {
				echo WC()->cart->get_cart_contents_count(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</span>
		<?php
	}
}

if ( ! function_exists( 'aeon_woocommerce_get_cart_total' ) ) {
	/**
	 * Get cart total.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_get_cart_total() {
		// Return is not enabled.
		if ( ! is_customize_preview()
		&& true !== aeon_get_option( 'cart_total' ) ) {
			return;
		}

		// Wrapper classes.
		$classes = array( 'aeon-cart-total' );

		// Class for customizer preview.
		if ( is_customize_preview() ) {
			if ( true === aeon_get_option( 'cart_total' ) ) {
				$classes[] = 'show-cart-total';
			} else {
				$classes[] = 'hide-cart-total';
			}
		}
		?>
		<span class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php
			if ( null != WC()->cart ) {
				echo WC()->cart->get_cart_subtotal(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</span>
		<?php
	}
}

if ( ! function_exists( 'aeon_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function aeon_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		aeon_woocommerce_get_cart_link();
		$fragments['a.aeon-cart-link'] = ob_get_clean();
		return $fragments;
	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'aeon_woocommerce_cart_link_fragment' );
}

if ( ! function_exists( 'aeon_woocommerce_setup_theme' ) ) {
	/**
	 * Setup theme.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_setup_theme() {
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
	add_action( 'after_setup_theme', 'aeon_woocommerce_setup_theme' );
}

if ( ! function_exists( 'aeon_woocommerce_widgets_init' ) ) {
	/**
	 * Sidebar.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_widgets_init() {
		register_sidebar(
			apply_filters(
				'aeon_woocommerce_sidebar_init',
				array(
					'name'          => esc_html__( 'WooCommerce Sidebar', 'aeonwp' ),
					'id'            => 'aeon-woo-sidebar',
					'description'   => esc_html__( 'This sidebar will be used on your products pages.', 'aeonwp' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			)
		);
	}
	add_action( 'widgets_init', 'aeon_woocommerce_widgets_init', 15 );
}

if ( ! function_exists( 'aeon_woocommerce_sidebar' ) ) {
	/**
	 * Assign woo sidebar for store page.
	 *
	 * @param array $sidebar Default argument array.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_sidebar( $sidebar ) {

		if ( is_shop()
			|| is_product_taxonomy()
			|| is_checkout()
			|| is_cart()
			|| is_account_page()
			|| is_product() ) {
			$sidebar = 'aeon-woo-sidebar';
		}

		return $sidebar;
	}
	add_filter( 'aeon_get_sidebar', 'aeon_woocommerce_sidebar' );
}

if ( ! function_exists( 'aeon_woocommerce_layouts' ) ) {
	/**
	 * Tweaks the layouts for WooCommerce archives and single product posts.
	 *
	 * @param array $layout Default argument array.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_layouts( $layout ) {
		if ( is_shop()
			|| is_product_taxonomy() ) {
			$layout = aeon_get_option( 'shop_layout' );
		} elseif ( is_cart() ) {
			$layout = aeon_get_option( 'cart_layout' );
		} elseif ( is_checkout() ) {
			$layout = aeon_get_option( 'checkout_layout' );
		} elseif ( is_account_page() ) {
			$layout = aeon_get_option( 'my_account_layout' );
		} elseif ( is_product() ) {
			$layout = aeon_get_option( 'single_product_layout' );
		}
		return $layout;
	}
	add_filter( 'aeon_sidebar_layout', 'aeon_woocommerce_layouts' );
}

if ( ! function_exists( 'aeon_woocommerce_shop_columns' ) ) {
	/**
	 * Update Shop columns.
	 *
	 * @param  int $col Shop Column.
	 * @return int
	 */
	function aeon_woocommerce_shop_columns( $col ) {
		$col = aeon_get_option( 'shop_columns' );
		return $col['desktop'];
	}
	add_filter( 'loop_shop_columns', 'aeon_woocommerce_shop_columns' );
}

if ( ! function_exists( 'aeon_woocommerce_shop_no_of_products' ) ) {
	/**
	 * Products per page.
	 *
	 * @return int
	 */
	function aeon_woocommerce_shop_no_of_products() {
		$taxonomy_page_display = get_option( 'woocommerce_category_archive_display', false );
		if ( is_product_taxonomy() && 'subcategories' === $taxonomy_page_display ) {
			if ( aeon_woocommerce_is_subcategory() ) {
				$products = aeon_get_option( 'shop_no_of_products' );
				return $products;
			}
			$products = wp_count_posts( 'product' )->publish;
		} else {
			$products = aeon_get_option( 'shop_no_of_products' );
		}
		return $products;
	}
	add_filter( 'loop_shop_per_page', 'aeon_woocommerce_shop_no_of_products' );
}

if ( ! function_exists( 'aeon_woocommerce_is_subcategory' ) ) {
	/**
	 * Check if the current page is a Product Subcategory page or not.
	 *
	 * @param integer $category_id Current page Category ID.
	 * @return boolean
	 */
	function aeon_woocommerce_is_subcategory( $category_id = null ) {
		if ( is_tax( 'product_cat' ) ) {
			if ( empty( $category_id ) ) {
				$category_id = get_queried_object_id();
			}
			$category = get_term( get_queried_object_id(), 'product_cat' );
			if ( empty( $category->parent ) ) {
				return false;
			}
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'aeon_woocommerce_product_content' ) ) {
	/**
	 * Product Content.
	 *
	 * @return void
	 */
	function aeon_woocommerce_product_content() {
		// Remove defaults filters.
		add_filter( 'woocommerce_show_page_title', '__return_false' );
		add_filter( 'woocommerce_product_description_heading', '__return_false' );
		add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

		// Remove defaults actions.
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

		// Add Out of Stock.
		add_action( 'woocommerce_before_shop_loop_item_title', 'aeon_woocommerce_shop_out_of_stock', 10 );

		// Add custom products content.
		add_action( 'woocommerce_after_shop_loop_item', 'aeon_woocommerce_shop_product_content' );
	}
	add_action( 'wp', 'aeon_woocommerce_product_content', 5 );
}

if ( ! function_exists( 'aeon_woocommerce_before_shop_loop' ) ) {
	/**
	 * Add toolbar wrapper.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_before_shop_loop() {
		?>
		<div class="aeon-woo-toolbar">
		<?php
	}
	add_action( 'woocommerce_before_shop_loop', 'aeon_woocommerce_before_shop_loop', 10 );
}

if ( ! function_exists( 'aeon_woocommerce_after_shop_loop' ) ) {
	/**
	 * Add toolbar wrapper.
	 *
	 * @since 1.0.0
	 */
	function aeon_woocommerce_after_shop_loop() {
		?>
		</div>
		<?php
	}
	add_action( 'woocommerce_before_shop_loop', 'aeon_woocommerce_after_shop_loop', 35 );
}

if ( ! function_exists( 'aeon_woocommerce_rating_markup' ) ) {
	/**
	 * Rating Markup.
	 *
	 * @since 1.0.0
	 * @param  string $html   Rating Markup.
	 * @param  float  $rating Rating being shown.
	 * @param  int    $count  Total number of ratings.
	 * @return string
	 */
	function aeon_woocommerce_rating_markup( $html, $rating, $count ) {

		if ( 0 == $rating ) {
			$html  = '<div class="star-rating">';
			$html .= wc_get_star_rating_html( $rating, $count );
			$html .= '</div>';
		}
		return $html;
	}
	add_filter( 'woocommerce_product_get_rating_html', 'aeon_woocommerce_rating_markup', 10, 3 );
}

if ( ! function_exists( 'aeon_stock_availability' ) ) {
	/**
	 * Add stock icon.
	 *
	 * @since 1.0.0
	 */
	function aeon_stock_availability( $availability, $product ) {
		// In stock.
		if ( $product->is_in_stock() && $product->get_stock_quantity() ) {
			$availability['availability'] = '<span class="stock-icon"></span><span class="stock-text">' . wc_format_stock_for_display( $product ) . '</span>';
		}
	  
		// Out of Stock.
		if ( ! $product->is_in_stock() ) {
			$availability['availability'] = '<span class="stock-icon"></span><span class="stock-text">' . __( 'Out of stock', 'aeonwp' ) . '</span>';
		}
	  
		return $availability;
	}
	add_action( 'woocommerce_get_availability', 'aeon_stock_availability', 10, 2 );
}

if ( ! function_exists( 'aeon_price_suffix' ) ) {
	/**
	 * Add amount saved.
	 *
	 * @since 1.0.0
	 */
	function aeon_price_suffix( $price, $product ){
		if ( is_product() && ( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) ) {
			$regular_price = get_post_meta( $product->get_id(), '_regular_price', true ); 
			$sale_price = get_post_meta( $product->get_id(), '_sale_price', true );
			
			if ( ! empty( $sale_price ) ) {
				$amount_saved = $regular_price - $sale_price;
				$currency_symbol = get_woocommerce_currency_symbol();
				$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
				$price = $price . '<span class="ae-amount-saved">-' . number_format( $percentage, 0, '', '' ) . '%</span>';       
			}
		}

		return $price;
	}
	add_filter( 'woocommerce_get_price_html', 'aeon_price_suffix', 99, 2 );
}
