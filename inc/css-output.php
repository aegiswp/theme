<?php
/**
 * Output all of our dynamic CSS.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aeon_base_css' ) ) {
	/**
	 * Add the CSS in the <head> section using the Theme Customizer.
	 *
	 * @since 1.0.0
	 */
	function aeon_base_css() {
		$settings = wp_parse_args(
			get_option( 'aeon_settings', array() ),
			aeon_get_defaults()
		);
		$defaults = aeon_get_defaults();

		$css = new Aeon_CSS();

		if ( true === $settings['show_site_title'] || true === $settings['show_tagline'] ) {
			$css->set_selector( '.site-header-info' );
			if ( is_RTL() ) {
				$css->add_property( 'margin-right', '1em' );
			} else {
				$css->add_property( 'margin-left', '1em' );
			}

			$css->set_selector( '.site-header-info a.site-title' );
			$css->add_property( 'font-size', '25px' );
			$css->add_property( 'line-height', '1.2em' );
			$css->add_property( 'word-wrap', 'break-word' );

			$css->set_selector( '.site-header-info p' );
			$css->add_property( 'margin', '0' );

			$css->start_media_query( aeon_get_media_query( 'mobile' ) );
			$css->set_selector( '.site-header-info' );
			$css->add_property( 'display', 'none' );
			$css->stop_media_query();
		}

		$css->set_selector( ':root' );
		$css->add_property( '--ae-main', $settings['global_color'], $defaults['global_color'] );

		$css->set_selector( ':root' );
		$css->add_property( '--ae-main-hover', $settings['global_color_hover'], $defaults['global_color_hover'] );

		$css->set_selector( 'body' );
		$css->add_property( 'background-color', $settings['background_color'], $defaults['background_color'] );
		$css->add_property( 'color', $settings['text_color'], $defaults['text_color'] );

		$css->set_selector( 'h1, h2, h3, h4, h5, h6' );
		$css->add_property( 'color', $settings['headings_color'], $defaults['headings_color'] );

		$css->set_selector( 'a' );
		$css->add_property( 'color', $settings['link_color'], $defaults['link_color'] );

		$css->set_selector( 'a:hover' );
		$css->add_property( 'color', $settings['link_color_hover'], $defaults['link_color_hover'] );

		$css->set_selector( 'a:active' );
		$css->add_property( 'color', $settings['link_color_active'], $defaults['link_color_active'] );

		$css->set_selector( 'a:visited' );
		$css->add_property( 'color', $settings['link_color_visited'], $defaults['link_color_visited'] );

		$css->set_selector( '.entry-title a' );
		$css->add_property( 'color', $settings['post_title_color'], $defaults['post_title_color'] );

		$css->set_selector( '.entry-title a:hover' );
		$css->add_property( 'color', $settings['post_title_color_hover'], $defaults['post_title_color_hover'] );

		$css->set_selector( 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-button__link' );
		$css->add_property( 'background-color', $settings['button_background_color'], $defaults['button_background_color'] );

		$css->set_selector( 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .wp-block-button__link:hover' );
		$css->add_property( 'background-color', $settings['button_background_color_hover'], $defaults['button_background_color_hover'] );

		$css->set_selector( 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-button__link' );
		$css->add_property( 'color', $settings['button_color'], $defaults['button_color'] );

		$css->set_selector( 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .wp-block-button__link:hover' );
		$css->add_property( 'color', $settings['button_color_hover'], $defaults['button_color_hover'] );

		$css->set_selector( '.site-header' );
		$css->add_property( 'background-color', $settings['header_background'], $defaults['header_background'] );

		$css->set_selector( '#site-navigation.main-navigation .menu > li > a' );
		$css->add_property( 'background-color', $settings['menu_links_bg'], $defaults['menu_links_bg'] );

		$css->set_selector( '#site-navigation.main-navigation .menu > li > a:hover' );
		$css->add_property( 'background-color', $settings['menu_links_bg_hover'], $defaults['menu_links_bg_hover'] );

		$css->set_selector( '#site-navigation.main-navigation .menu > li > a, .aeon-search-icon > a, .aeon-cart-icon > a' );
		$css->add_property( 'color', $settings['menu_links_color'], $defaults['menu_links_color'] );

		$css->set_selector( '#site-navigation.main-navigation .menu > li > a:hover, .aeon-search-icon > a:hover, .aeon-cart-icon > a:hover' );
		$css->add_property( 'color', $settings['menu_links_color_hover'], $defaults['menu_links_color_hover'] );

		$css->set_selector( 'body .ae-is-sticky' );
		$css->add_property( 'background-color', $settings['sticky_background'], $defaults['sticky_background'] );

		$css->set_selector( 'body .ae-is-sticky .main-navigation:not(.toggled) .menu > li > a, body .ae-is-sticky button.menu-toggle, body .ae-is-sticky .aeon-search-icon > a, body .ae-is-sticky .aeon-cart-icon > a' );
		$css->add_property( 'color', $settings['sticky_links_color'], $defaults['sticky_links_color'] );

		$css->set_selector( 'body .ae-is-sticky .main-navigation:not(.toggled) .menu > li > a:hover, body .ae-is-sticky button.menu-toggle:hover, body .ae-is-sticky .aeon-search-icon > a:hover, body .ae-is-sticky .aeon-cart-icon > a:hover' );
		$css->add_property( 'color', $settings['sticky_links_color_hover'], $defaults['sticky_links_color_hover'] );

		$css->set_selector( '.main-navigation .menu ul li a' );
		$css->add_property( 'background-color', $settings['dropdown_links_bg'], $defaults['dropdown_links_bg'] );

		$css->set_selector( '.main-navigation .menu ul li a:hover' );
		$css->add_property( 'background-color', $settings['dropdown_links_bg_hover'], $defaults['dropdown_links_bg_hover'] );

		$css->set_selector( '.main-navigation .menu ul li a' );
		$css->add_property( 'color', $settings['dropdown_links_color'], $defaults['dropdown_links_color'] );

		$css->set_selector( '.main-navigation .menu ul li a:hover' );
		$css->add_property( 'color', $settings['dropdown_links_color_hover'], $defaults['dropdown_links_color_hover'] );

		$css->set_selector( '.main-navigation ul ul' );
		$css->add_property( 'border-top-color', $settings['dropdown_border_top_color'], $defaults['dropdown_border_top_color'] );

		/**
		 * Header Breakpoint.
		 */
		$css->start_media_query( '(max-width: ' . $settings['header_breakpoint'] . 'px)' );
		$css->set_selector( 'button.menu-toggle' );
		$css->add_property( 'display', 'flex' );

		$css->set_selector( '.main-navigation ul.menu' );
		$css->add_property( 'display', 'none' );
		$css->stop_media_query();

		if ( ! empty( $settings['container_width'] ) ) {
			$css->set_selector( '.container' );
			$css->add_property( 'max-width', absint( $settings['container_width'] ), $defaults['container_width'], $settings['container_width_unit'] );
		}

		if ( ! empty( $settings['logo_width']['desktop'] ) ) {
			$css->set_selector( '.site-branding img' );
			$css->add_property( 'max-width', absint( $settings['logo_width']['desktop'] ), $defaults['logo_width']['desktop'], $settings['logo_width_unit'] );
		}

		if ( ! empty( $settings['logo_width']['tablet'] ) ) {
			$css->start_media_query( aeon_get_media_query( 'tablet' ) );
			$css->set_selector( '.site-branding img' );
			$css->add_property( 'max-width', absint( $settings['logo_width']['tablet'] ), $defaults['logo_width']['tablet'], $settings['logo_width_unit'] );
			$css->stop_media_query();
		}

		if ( ! empty( $settings['logo_width']['mobile'] ) ) {
			$css->start_media_query( aeon_get_media_query( 'mobile' ) );
			$css->set_selector( '.site-branding img' );
			$css->add_property( 'max-width', absint( $settings['logo_width']['mobile'] ), $defaults['logo_width']['mobile'], $settings['logo_width_unit'] );
			$css->stop_media_query();
		}
		
		if ( ! empty( $settings['dropdown_width'] ) ) {
			$css->set_selector( '.main-navigation ul ul' );
			$css->add_property( 'width', floatval( $settings['dropdown_width'] ), $defaults['dropdown_width'], $settings['dropdown_width_unit'] );
		}
		
		if ( ! empty( $settings['dropdown_border_top_height'] ) ) {
			$css->set_selector( '.main-navigation ul ul' );
			$css->add_property( 'border-top-width', absint( $settings['dropdown_border_top_height'] ), $defaults['dropdown_border_top_height'], 'px' );
		}
		
		$css->set_selector( '.site-header .site-header-inner' );
		if ( is_numeric( $settings['header_padding']['desktop']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['header_padding']['desktop']['top'] ), $defaults['header_padding']['desktop']['top'], 'px' );
		}
		if ( is_numeric( $settings['header_padding']['desktop']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['header_padding']['desktop']['bottom'] ), $defaults['header_padding']['desktop']['bottom'], 'px' );
		}
		if ( is_numeric( $settings['header_padding']['desktop']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['header_padding']['desktop']['right'] ), $defaults['header_padding']['desktop']['left'], 'px' );
		}
		if ( is_numeric( $settings['header_padding']['desktop']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['header_padding']['desktop']['left'] ), $defaults['header_padding']['desktop']['right'], 'px' );
		}

		$css->set_selector( '#site-navigation button.menu-toggle .ae-icon' );
		$css->add_property( 'font-size', floatval( $settings['mobile_icon_size'] ), $defaults['mobile_icon_size'], $settings['mobile_icon_size_unit'] );

		$css->set_selector( '#site-navigation button.menu-toggle' );
		$css->add_property( 'font-size', floatval( $settings['mobile_font_size'] ), $defaults['mobile_font_size'], $settings['mobile_font_size_unit'] );

		$css->set_selector( '.aeon-page-header' );
		$css->add_property( 'background-color', $settings['page_header_background'], $defaults['page_header_background'] );

		$css->set_selector( '.aeon-page-header h1, .aeon-author-header, .aeon-author-header a' );
		$css->add_property( 'color', $settings['page_header_title_color'], $defaults['page_header_title_color'] );

		if ( true === aeon_get_option( 'transparent_header' ) ) {
			$css->set_selector( '.site-header' );
			$css->add_property( 'position', 'absolute' );
			$css->add_property( 'width', '100%' );
			$css->add_property( 'background-color', 'transparent' );

			$css->set_selector( '.ae-is-sticky' );
			$css->add_property( 'background-color', '#ffffff' );

			$css->set_selector( '.aeon-page-header' );
			$css->add_property( 'padding-top', '150px;' );
		}
		
		$css->set_selector( '.aeon-page-header' );
		if ( is_numeric( $settings['page_header_padding']['desktop']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['page_header_padding']['desktop']['top'] ), $defaults['page_header_padding']['desktop']['top'], 'px' );
		}
		if ( is_numeric( $settings['page_header_padding']['desktop']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['page_header_padding']['desktop']['bottom'] ), $defaults['page_header_padding']['desktop']['bottom'], 'px' );
		}
		if ( is_numeric( $settings['page_header_padding']['desktop']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['page_header_padding']['desktop']['right'] ), $defaults['page_header_padding']['desktop']['left'], 'px' );
		}
		if ( is_numeric( $settings['page_header_padding']['desktop']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['page_header_padding']['desktop']['left'] ), $defaults['page_header_padding']['desktop']['right'], 'px' );
		}

		$css->set_selector( '.aeon-page-header .aeon-breadcrumbs' );
		$css->add_property( 'color', $settings['page_header_breadcrumbs_text_color'], $defaults['page_header_breadcrumbs_text_color'] );

		$css->set_selector( '.aeon-page-header .aeon-breadcrumbs .separator' );
		$css->add_property( 'color', $settings['page_header_breadcrumbs_separator_color'], $defaults['page_header_breadcrumbs_separator_color'] );

		$css->set_selector( '.aeon-page-header .aeon-breadcrumbs a' );
		$css->add_property( 'color', $settings['page_header_breadcrumbs_links'], $defaults['page_header_breadcrumbs_links'] );

		$css->set_selector( '.aeon-page-header .aeon-breadcrumbs a:hover' );
		$css->add_property( 'color', $settings['page_header_breadcrumbs_links_hover'], $defaults['page_header_breadcrumbs_links_hover'] );
		
		if ( class_exists( 'WooCommerce' ) ) {
			if ( ! empty( $settings['shop_columns']['tablet'] ) && '2' !== $settings['shop_columns']['tablet'] ) {
				$css->start_media_query( aeon_get_media_query( 'tablet' ) );
				$css->set_selector( '.woocommerce .site-main ul.products li.product, .woocommerce-page .site-main ul.products li.product' );
				$css->add_property( 'width', 'calc( 100% / ' . absint( $settings['shop_columns']['tablet'] ) . ' - 30px)', $defaults['shop_columns']['tablet'] );
				$css->stop_media_query();
			}
	
			if ( ! empty( $settings['shop_columns']['mobile'] ) && '1' !== $settings['shop_columns']['mobile'] ) {
				$css->start_media_query( aeon_get_media_query( 'mobile' ) );
				$css->set_selector( '.woocommerce .site-main ul.products li.product, .woocommerce-page .site-main ul.products li.product' );
				$css->add_property( 'width', 'calc( 100% / ' . absint( $settings['shop_columns']['mobile'] ) . ' - 30px)', $defaults['shop_columns']['mobile'] );
				$css->stop_media_query();
			}
		}

		$css->set_selector( '.site-footer #footer-widgets' );
		$css->add_property( 'background-color', $settings['footer_background'], $defaults['footer_background'] );
		$css->add_property( 'color', $settings['footer_text_color'], $defaults['footer_text_color'] );

		$css->set_selector( '.site-footer #footer-widgets h2' );
		$css->add_property( 'color', $settings['footer_titles_color'], $defaults['footer_titles_color'] );

		$css->set_selector( '.site-footer #footer-widgets a:not(.wp-block-social-link-anchor, .wp-block-button__link)' );
		$css->add_property( 'color', $settings['footer_links'], $defaults['footer_links'] );

		$css->set_selector( '.site-footer #footer-widgets a:not(.wp-block-social-link-anchor, .wp-block-button__link):hover' );
		$css->add_property( 'color', $settings['footer_links_hover'], $defaults['footer_links_hover'] );

		$css->set_selector( '.site-footer .footer-widgets' );
		if ( is_numeric( $settings['footer_padding']['desktop']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['footer_padding']['desktop']['top'] ), $defaults['footer_padding']['desktop']['top'], 'px' );
		}
		if ( is_numeric( $settings['footer_padding']['desktop']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['footer_padding']['desktop']['bottom'] ), $defaults['footer_padding']['desktop']['bottom'], 'px' );
		}
		if ( is_numeric( $settings['footer_padding']['desktop']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['footer_padding']['desktop']['right'] ), $defaults['footer_padding']['desktop']['left'], 'px' );
		}
		if ( is_numeric( $settings['footer_padding']['desktop']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['footer_padding']['desktop']['left'] ), $defaults['footer_padding']['desktop']['right'], 'px' );
		}

		$css->set_selector( '.site-footer .copyright-bar' );
		$css->add_property( 'background-color', $settings['copyright_background'], $defaults['copyright_background'] );
		$css->add_property( 'color', $settings['copyright_text_color'], $defaults['copyright_text_color'] );
		if ( ! empty( $settings['copyright_align']['desktop'] ) ) {
			$css->add_property( 'text-align', esc_attr( $settings['copyright_align']['desktop'] ), $defaults['copyright_align']['desktop'] );
		}
		if ( ! empty( $settings['copyright_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['copyright_font_size']['desktop'] ), $defaults['copyright_font_size']['desktop'], $settings['copyright_font_size_unit'] );
		}
		if ( is_numeric( $settings['copyright_padding']['desktop']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['copyright_padding']['desktop']['top'] ), $defaults['copyright_padding']['desktop']['top'], 'px' );
		}
		if ( is_numeric( $settings['copyright_padding']['desktop']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['copyright_padding']['desktop']['bottom'] ), $defaults['copyright_padding']['desktop']['bottom'], 'px' );
		}
		if ( is_numeric( $settings['copyright_padding']['desktop']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['copyright_padding']['desktop']['right'] ), $defaults['copyright_padding']['desktop']['left'], 'px' );
		}
		if ( is_numeric( $settings['copyright_padding']['desktop']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['copyright_padding']['desktop']['left'] ), $defaults['copyright_padding']['desktop']['right'], 'px' );
		}

		$css->set_selector( '.site-footer .copyright-bar a' );
		$css->add_property( 'color', $settings['copyright_links'], $defaults['copyright_links'] );

		$css->set_selector( '.site-footer .copyright-bar a:hover' );
		$css->add_property( 'color', $settings['copyright_links_hover'], $defaults['copyright_links_hover'] );

		/**
		 * Tablet.
		 */
		$css->start_media_query( aeon_get_media_query( 'tablet' ) );
		$css->set_selector( '.site-header .site-header-inner' );
		if ( ! empty( $settings['header_padding']['tablet']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['header_padding']['tablet']['top'] ), $defaults['header_padding']['tablet']['top'], 'px' );
		}
		if ( ! empty( $settings['header_padding']['tablet']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['header_padding']['tablet']['bottom'] ), $defaults['header_padding']['tablet']['bottom'], 'px' );
		}
		if ( ! empty( $settings['header_padding']['tablet']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['header_padding']['tablet']['right'] ), $defaults['header_padding']['tablet']['left'], 'px' );
		}
		if ( ! empty( $settings['header_padding']['tablet']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['header_padding']['tablet']['left'] ), $defaults['header_padding']['tablet']['right'], 'px' );
		}
		
		$css->set_selector( '.aeon-page-header' );
		if ( ! empty( $settings['page_header_padding']['tablet']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['page_header_padding']['tablet']['top'] ), $defaults['page_header_padding']['tablet']['top'], 'px' );
		}
		if ( ! empty( $settings['page_header_padding']['tablet']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['page_header_padding']['tablet']['bottom'] ), $defaults['page_header_padding']['tablet']['bottom'], 'px' );
		}
		if ( ! empty( $settings['page_header_padding']['tablet']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['page_header_padding']['tablet']['right'] ), $defaults['page_header_padding']['tablet']['left'], 'px' );
		}
		if ( ! empty( $settings['page_header_padding']['tablet']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['page_header_padding']['tablet']['left'] ), $defaults['page_header_padding']['tablet']['right'], 'px' );
		}

		$css->set_selector( '.site-footer .footer-widgets' );
		if ( ! empty( $settings['footer_padding']['tablet']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['footer_padding']['tablet']['top'] ), $defaults['footer_padding']['tablet']['top'], 'px' );
		}
		if ( ! empty( $settings['footer_padding']['tablet']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['footer_padding']['tablet']['bottom'] ), $defaults['footer_padding']['tablet']['bottom'], 'px' );
		}
		if ( ! empty( $settings['footer_padding']['tablet']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['footer_padding']['tablet']['right'] ), $defaults['footer_padding']['tablet']['left'], 'px' );
		}
		if ( ! empty( $settings['footer_padding']['tablet']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['footer_padding']['tablet']['left'] ), $defaults['footer_padding']['tablet']['right'], 'px' );
		}

		if ( ! empty( $settings['copyright_font_size']['tablet'] ) ) {
			$css->set_selector( '.site-footer .copyright-bar' );
			$css->add_property( 'font-size', floatval( $settings['copyright_font_size']['tablet'] ), $defaults['copyright_font_size']['tablet'], $settings['copyright_font_size_unit'] );
		}

		$css->set_selector( '.site-footer .copyright-bar' );
		if ( ! empty( $settings['copyright_align']['tablet'] ) ) {
			$css->add_property( 'text-align', esc_attr( $settings['copyright_align']['tablet'] ), $defaults['copyright_align']['tablet'] );
		}

		if ( ! empty( $settings['copyright_padding']['tablet']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['copyright_padding']['tablet']['top'] ), $defaults['copyright_padding']['tablet']['top'], 'px' );
		}
		if ( ! empty( $settings['copyright_padding']['tablet']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['copyright_padding']['tablet']['bottom'] ), $defaults['copyright_padding']['tablet']['bottom'], 'px' );
		}
		if ( ! empty( $settings['copyright_padding']['tablet']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['copyright_padding']['tablet']['right'] ), $defaults['copyright_padding']['tablet']['left'], 'px' );
		}
		if ( ! empty( $settings['copyright_padding']['tablet']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['copyright_padding']['tablet']['left'] ), $defaults['copyright_padding']['tablet']['right'], 'px' );
		}
		$css->stop_media_query();

		/**
		 * Mobile.
		 */
		$css->start_media_query( aeon_get_media_query( 'mobile' ) );
		$css->set_selector( '.site-header .site-header-inner' );
		if ( ! empty( $settings['header_padding']['mobile']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['header_padding']['mobile']['top'] ), $defaults['header_padding']['mobile']['top'], 'px' );
		}
		if ( ! empty( $settings['header_padding']['mobile']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['header_padding']['mobile']['bottom'] ), $defaults['header_padding']['mobile']['bottom'], 'px' );
		}
		if ( ! empty( $settings['header_padding']['mobile']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['header_padding']['mobile']['right'] ), $defaults['header_padding']['mobile']['left'], 'px' );
		}
		if ( ! empty( $settings['header_padding']['mobile']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['header_padding']['mobile']['left'] ), $defaults['header_padding']['mobile']['right'], 'px' );
		}
		
		$css->set_selector( '.aeon-page-header' );
		if ( ! empty( $settings['page_header_padding']['mobile']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['page_header_padding']['mobile']['top'] ), $defaults['page_header_padding']['mobile']['top'], 'px' );
		}
		if ( ! empty( $settings['page_header_padding']['mobile']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['page_header_padding']['mobile']['bottom'] ), $defaults['page_header_padding']['mobile']['bottom'], 'px' );
		}
		if ( ! empty( $settings['page_header_padding']['mobile']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['page_header_padding']['mobile']['right'] ), $defaults['page_header_padding']['mobile']['left'], 'px' );
		}
		if ( ! empty( $settings['page_header_padding']['mobile']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['page_header_padding']['mobile']['left'] ), $defaults['page_header_padding']['mobile']['right'], 'px' );
		}

		$css->set_selector( '.site-footer .footer-widgets' );
		if ( ! empty( $settings['footer_padding']['mobile']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['footer_padding']['mobile']['top'] ), $defaults['footer_padding']['mobile']['top'], 'px' );
		}
		if ( ! empty( $settings['footer_padding']['mobile']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['footer_padding']['mobile']['bottom'] ), $defaults['footer_padding']['mobile']['bottom'], 'px' );
		}
		if ( ! empty( $settings['footer_padding']['mobile']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['footer_padding']['mobile']['right'] ), $defaults['footer_padding']['mobile']['left'], 'px' );
		}
		if ( ! empty( $settings['footer_padding']['mobile']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['footer_padding']['mobile']['left'] ), $defaults['footer_padding']['mobile']['right'], 'px' );
		}

		if ( ! empty( $settings['copyright_font_size']['mobile'] ) ) {
			$css->set_selector( '.site-footer .copyright-bar' );
			$css->add_property( 'font-size', floatval( $settings['copyright_font_size']['mobile'] ), $defaults['copyright_font_size']['mobile'], $settings['copyright_font_size_unit'] );
		}

		$css->set_selector( '.site-footer .copyright-bar' );
		if ( ! empty( $settings['copyright_align']['mobile'] ) ) {
			$css->add_property( 'text-align', esc_attr( $settings['copyright_align']['mobile'] ), $defaults['copyright_align']['mobile'] );
		}

		if ( ! empty( $settings['copyright_padding']['mobile']['top'] ) ) {
			$css->add_property( 'padding-top', absint( $settings['copyright_padding']['mobile']['top'] ), $defaults['copyright_padding']['mobile']['top'], 'px' );
		}
		if ( ! empty( $settings['copyright_padding']['mobile']['bottom'] ) ) {
			$css->add_property( 'padding-bottom', absint( $settings['copyright_padding']['mobile']['bottom'] ), $defaults['copyright_padding']['mobile']['bottom'], 'px' );
		}
		if ( ! empty( $settings['copyright_padding']['mobile']['right'] ) ) {
			$css->add_property( 'padding-left', absint( $settings['copyright_padding']['mobile']['right'] ), $defaults['copyright_padding']['mobile']['left'], 'px' );
		}
		if ( ! empty( $settings['copyright_padding']['mobile']['left'] ) ) {
			$css->add_property( 'padding-right', absint( $settings['copyright_padding']['mobile']['left'] ), $defaults['copyright_padding']['mobile']['right'], 'px' );
		}
		$css->stop_media_query();

		// If sticky style.
		if ( 'hide-scroll' === $settings['sticky_style'] ) {
			$css->set_selector( '.ae-has-sticky.ae-sticky-scroll-down' );
			$css->add_property( 'transform', 'translate3d(0, -100%, 0)' );
		}

		// If sticky logo.
		if ( $settings['sticky_logo'] ) {
			$css->set_selector( '.sticky-logo-link, .site-header.ae-has-sticky-logo.ae-is-sticky .custom-logo-link' );
			$css->add_property( 'display', 'none' );

			$css->set_selector( '.site-header.ae-has-sticky-logo.ae-is-sticky .sticky-logo-link' );
			$css->add_property( 'display', 'inline-block' );
		}

		// If sticky logo size.
		if ( ! empty( $settings['sticky_logo_width']['desktop'] ) || ! empty( $settings['sticky_logo_width']['tablet'] ) || ! empty( $settings['sticky_logo_width']['mobile'] ) ) {
			$css->set_selector( '.ae-has-sticky .site-branding img' );
			$css->add_property( 'transition', '.3s' );
		}

		if ( ! empty( $settings['sticky_logo_width']['desktop'] ) ) {
			$css->set_selector( '.ae-is-sticky .site-branding img' );
			$css->add_property( 'max-width', absint( $settings['sticky_logo_width']['desktop'] ), $defaults['sticky_logo_width']['desktop'], $settings['sticky_logo_width_unit'] );
		}

		if ( ! empty( $settings['sticky_logo_width']['tablet'] ) ) {
			$css->start_media_query( aeon_get_media_query( 'tablet' ) );
			$css->set_selector( '.ae-is-sticky .site-branding img' );
			$css->add_property( 'max-width', absint( $settings['sticky_logo_width']['tablet'] ), $defaults['sticky_logo_width']['tablet'], $settings['sticky_logo_width_unit'] );
			$css->stop_media_query();
		}

		if ( ! empty( $settings['sticky_logo_width']['mobile'] ) ) {
			$css->start_media_query( aeon_get_media_query( 'mobile' ) );
			$css->set_selector( '.ae-is-sticky .site-branding img' );
			$css->add_property( 'max-width', absint( $settings['sticky_logo_width']['mobile'] ), $defaults['sticky_logo_width']['mobile'], $settings['sticky_logo_width_unit'] );
			$css->stop_media_query();
		}

		// If search icon.
		if ( 'none' !== aeon_get_option( 'search_style' ) ) {
			$css->set_selector( '.aeon-search-icon' );
			$css->add_property( 'position', 'relative' );
			$css->add_property( 'display', 'flex' );

			$css->set_selector( '.aeon-search-icon a' );
			$css->add_property( 'font-size', '15px' );
			$css->add_property( 'padding', '10px 15px' );

			if ( 'dropdown' === aeon_get_option( 'search_style' ) ) {
				$css->set_selector( '.aeon-search-icon .aeon-search-wrapper' );
				$css->add_property( 'visibility', 'hidden' );
				$css->add_property( 'opacity', '0' );
				$css->add_property( 'position', 'absolute' );
				$css->add_property( 'top', '100%' );
				$css->add_property( 'right', '0' );
				$css->add_property( 'padding', '15px' );
				$css->add_property( 'width', '260px' );
				$css->add_property( 'background-color', 'var(--ae-light)' );
				$css->add_property( 'box-shadow', '0 2px 6px rgba(0, 0, 0, .1)' );
				$css->add_property( 'transition', 'all .2s' );
				$css->add_property( 'z-index', '9' );

				$css->set_selector( 'body.aeon-search-active .aeon-search-wrapper' );
				$css->add_property( 'visibility', 'visible' );
				$css->add_property( 'opacity', '1' );

				// RTL
				$css->set_selector( 'body.rtl .aeon-search-icon .aeon-search-wrapper' );
				$css->add_property( 'right', 'auto' );
				$css->add_property( 'left', '0' );

				$css->set_selector( '.aeon-search-icon.search-dropdown .aeon-search-wrapper' );
				$css->add_property( 'background-color', $settings['search_dropdown_bg'], $defaults['search_dropdown_bg'] );

				$css->set_selector( '.aeon-search-icon.search-dropdown input[type="search"]' );
				$css->add_property( 'padding-right', '.8em' );
				$css->add_property( 'background-color', $settings['search_dropdown_input_bg'], $defaults['search_dropdown_input_bg'] );
				if ( ! empty( $settings['search_dropdown_input_border'] ) ) {
					$css->add_property( 'border-color', $settings['search_dropdown_input_border'], $defaults['search_dropdown_input_border'] );
				}

				$css->set_selector( '.aeon-search-icon.search-dropdown input[type="search"], .aeon-search-icon.search-dropdown input[type="search"]::placeholder' );
				$css->add_property( 'color', $settings['search_dropdown_input_color'], $defaults['search_dropdown_input_color'] );

				$css->set_selector( '.aeon-search-icon.search-dropdown input[type="search"]:hover' );
				$css->add_property( 'border-color', $settings['search_dropdown_input_border_hover'], $defaults['search_dropdown_input_border_hover'] );

				$css->set_selector( '.aeon-search-icon.search-dropdown input[type="search"]:focus' );
				$css->add_property( 'border-color', $settings['search_dropdown_input_border_focus'], $defaults['search_dropdown_input_border_focus'] );
			}

			if ( 'full-screen' === aeon_get_option( 'search_style' ) ) {
				$css->set_selector( '.aeon-search-full-screen' );
				$css->add_property( 'opacity', '0' );
				$css->add_property( 'visibility', 'hidden' );
				$css->add_property( 'position', 'fixed' );
				$css->add_property( 'background-color', '#333' );
				$css->add_property( 'top', '0' );
				$css->add_property( 'bottom', '0' );
				$css->add_property( 'left', '0' );
				$css->add_property( 'right', '0' );
				$css->add_property( 'z-index', '9999' );
				$css->add_property( 'transition', 'opacity .2s' );

				$css->set_selector( 'body.aeon-search-active .aeon-search-full-screen' );
				$css->add_property( 'visibility', 'visible' );
				$css->add_property( 'opacity', '1' );

				$css->set_selector( '.aeon-search-full-screen .aeon-search-close' );
				$css->add_property( 'position', 'absolute' );
				$css->add_property( 'top', '1.5em' );
				$css->add_property( 'right', '1em' );
				$css->add_property( 'font-size', '2em' );
				$css->add_property( 'color', '#fff' );
				$css->add_property( 'line-height', '1' );
				$css->add_property( 'cursor', 'pointer' );
				$css->add_property( 'z-index', '9' );

				$css->set_selector( '.aeon-search-full-screen .aeon-search-wrapper' );
				$css->add_property( 'position', 'absolute' );
				$css->add_property( 'width', '100%' );
				$css->add_property( 'left', '50%' );
				$css->add_property( 'top', '50%' );
				$css->add_property( 'transform', 'translate(-50%, -50%)' );

				$css->set_selector( '.aeon-search-full-screen .search-container' );
				$css->add_property( 'max-width', '900px' );
				$css->add_property( 'margin', '0 auto' );

				$css->set_selector( '.aeon-search-full-screen .search-text' );
				$css->add_property( 'color', '#e2e2e2' );
				$css->add_property( 'text-align', 'center' );

				$css->set_selector( '.aeon-search-full-screen form' );
				$css->add_property( 'margin-top', '20px' );

				$css->set_selector( '.aeon-search-full-screen input[type="search"]' );
				$css->add_property( 'font-size', '2.6em' );
				$css->add_property( 'background-color', 'transparent' );
				$css->add_property( 'color', '#fff' );
				$css->add_property( 'border-radius', '0' );
				$css->add_property( 'border', '0' );
				$css->add_property( 'border-bottom', '2px solid rgba(255, 255, 255, 0.5)' );
				$css->add_property( 'height', 'auto' );
				$css->add_property( 'outline', 'none' );
				$css->add_property( 'vertical-align', 'middle' );
				$css->add_property( 'padding', '18px 0' );
				$css->add_property( 'text-align', 'center' );

				$css->set_selector( '.aeon-search-full-screen input[type="search"]:focus' );
				$css->add_property( 'border-color', 'var(--ae-main)' );

				// RTL
				$css->set_selector( 'body.rtl .aeon-search-full-screen .aeon-search-close' );
				$css->add_property( 'right', 'auto' );
				$css->add_property( 'left', '1em' );

				$css->start_media_query( '(max-width: ' . $settings['header_breakpoint'] . 'px)' );
				$css->set_selector( '.aeon-search-full-screen' );
				$css->add_property( 'display', 'none' );
				$css->stop_media_query();

				$css->set_selector( '.aeon-search-full-screen' );
				$css->add_property( 'background-color', $settings['search_fullscreen_bg'], $defaults['search_fullscreen_bg'] );

				$css->set_selector( '.aeon-search-full-screen .search-text' );
				$css->add_property( 'color', $settings['search_fullscreen_title_color'], $defaults['search_fullscreen_title_color'] );

				$css->set_selector( '.aeon-search-full-screen input[type="search"]' );
				$css->add_property( 'background-color', $settings['search_fullscreen_input_bg'], $defaults['search_fullscreen_input_bg'] );
				if ( ! empty( $settings['search_fullscreen_input_border'] ) ) {
					$css->add_property( 'border-color', $settings['search_fullscreen_input_border'], $defaults['search_fullscreen_input_border'] );
				}

				$css->set_selector( '.aeon-search-full-screen input[type="search"], .aeon-search-full-screen input[type="search"]::placeholder' );
				$css->add_property( 'color', $settings['search_fullscreen_input_color'], $defaults['search_fullscreen_input_color'] );

				$css->set_selector( '.aeon-search-full-screen input[type="search"]:hover' );
				$css->add_property( 'border-color', $settings['search_fullscreen_input_border_hover'], $defaults['search_fullscreen_input_border_hover'] );

				$css->set_selector( '.aeon-search-full-screen input[type="search"]:focus' );
				$css->add_property( 'border-color', $settings['search_fullscreen_input_border_focus'], $defaults['search_fullscreen_input_border_focus'] );

				$css->set_selector( '.aeon-search-full-screen .aeon-search-close' );
				$css->add_property( 'color', $settings['search_fullscreen_close_btn_color'], $defaults['search_fullscreen_close_btn_color'] );

				$css->set_selector( '.aeon-search-full-screen .aeon-search-close:hover' );
				$css->add_property( 'color', $settings['search_fullscreen_close_btn_color_hover'], $defaults['search_fullscreen_close_btn_color_hover'] );
			}

			if ( 'slide' === aeon_get_option( 'search_style' ) ) {
				$css->set_selector( '.aeon-search-icon .aeon-search-wrapper' );
				$css->add_property( 'visibility', 'hidden' );
				$css->add_property( 'opacity', '0' );
				$css->add_property( 'position', 'absolute' );
				$css->add_property( 'right', '0' );
				$css->add_property( 'top', '50%' );
				$css->add_property( 'transform', 'translateY(-50%)' );
				$css->add_property( 'z-index', '999' );

				$css->set_selector( 'body.aeon-search-active .aeon-search-wrapper' );
				$css->add_property( 'visibility', 'visible' );
				$css->add_property( 'opacity', '1' );

				$css->set_selector( '.aeon-search-icon .search-field' );
				$css->add_property( 'min-width', '250px' );
				$css->add_property( 'height', 'auto' );

				$css->set_selector( '.aeon-search-icon .aeon-search-close' );
				$css->add_property( 'position', 'absolute' );
				$css->add_property( 'top', '0' );
				$css->add_property( 'bottom', '0' );
				$css->add_property( 'right', '0' );
				$css->add_property( 'display', 'flex' );
				$css->add_property( 'font-size', '1em' );
				$css->add_property( 'line-height', '1' );
				$css->add_property( 'padding', '10px 15px' );
				$css->add_property( 'cursor', 'pointer' );
				$css->add_property( 'z-index', '999' );

				$css->set_selector( '.aeon-search-icon .aeon-search-close svg' );
				$css->add_property( 'top', '0' );

				$css->set_selector( '.aeon-search-icon.search-slide input[type="search"]' );
				$css->add_property( 'background-color', $settings['search_slide_input_bg'], $defaults['search_slide_input_bg'] );
				if ( ! empty( $settings['search_slide_input_border'] ) ) {
					$css->add_property( 'border-color', $settings['search_slide_input_border'], $defaults['search_slide_input_border'] );
				}

				$css->set_selector( '.aeon-search-icon.search-slide input[type="search"], .aeon-search-icon.search-slide input[type="search"]::placeholder' );
				$css->add_property( 'color', $settings['search_slide_input_color'], $defaults['search_slide_input_color'] );

				$css->set_selector( '.aeon-search-icon.search-slide input[type="search"]:hover' );
				$css->add_property( 'border-color', $settings['search_slide_input_border_hover'], $defaults['search_slide_input_border_hover'] );

				$css->set_selector( '.aeon-search-icon.search-slide input[type="search"]:focus' );
				$css->add_property( 'border-color', $settings['search_slide_input_border_focus'], $defaults['search_slide_input_border_focus'] );

				$css->set_selector( '.aeon-search-icon.search-slide .aeon-search-close' );
				$css->add_property( 'color', $settings['search_slide_close_btn_color'], $defaults['search_slide_close_btn_color'] );

				$css->set_selector( '.aeon-search-icon.search-slide .aeon-search-close:hover' );
				$css->add_property( 'color', $settings['search_slide_close_btn_color_hover'], $defaults['search_slide_close_btn_color_hover'] );
			}

			$css->set_selector( '.aeon-search-mobile' );
			$css->add_property( 'display', 'none' );
			$css->add_property( 'padding', '15px 20px' );

			$css->start_media_query( '(max-width: ' . $settings['header_breakpoint'] . 'px)' );
			$css->set_selector( '.aeon-search-icon' );
			$css->add_property( 'display', 'none' );

			$css->set_selector( '.aeon-search-mobile' );
			$css->add_property( 'display', 'block' );
			$css->stop_media_query();
		}

		// If Cart icon.
		if ( class_exists( 'WooCommerce' ) && true === aeon_get_option( 'add_cart_icon' ) ) {
			$css->set_selector( '.aeon-cart-icon' );
			$css->add_property( 'position', 'relative' );
			$css->add_property( 'display', 'flex' );

			$css->set_selector( 'a.aeon-cart-link' );
			$css->add_property( 'display', 'flex' );
			$css->add_property( 'align-items', 'center' );
			$css->add_property( 'padding', '10px 15px' );

			$css->set_selector( 'a.aeon-cart-link svg' );
			$css->add_property( 'top', '0' );
			$css->add_property( 'font-size', '15px' );

			$css->set_selector( '.aeon-count' );
			$css->add_property( 'position', 'relative' );
			$css->add_property( 'width', '18px' );
			$css->add_property( 'height', '18px' );
			$css->add_property( 'line-height', '18px' );
			$css->add_property( 'background-color', 'var(--ae-main)' );
			$css->add_property( 'color', 'var(--ae-light)' );
			$css->add_property( 'font-size', '12px' );
			$css->add_property( 'margin-left', '4px' );
			$css->add_property( 'font-weight', '600' );
			$css->add_property( 'border-radius', '50%' );
			$css->add_property( 'text-align', 'center' );

			$css->set_selector( '.aeon-cart-total' );
			$css->add_property( 'line-height', '1' );
			$css->add_property( 'color', '#57bf6d' );
			$css->add_property( 'margin-left', '6px' );

			$css->set_selector( '.aeon-cart-header' );
			$css->add_property( 'display', 'block' );
			$css->add_property( 'background-color', 'var(--ae-light)' );
			$css->add_property( 'box-shadow', '0 2px 6px rgb(0 0 0 / 10%)' );
			$css->add_property( 'float', 'left' );
			$css->add_property( 'position', 'absolute' );
			$css->add_property( 'top', '100%' );
			$css->add_property( 'right', '-99999px' );
			$css->add_property( 'opacity', '0' );
			$css->add_property( 'z-index', '99999' );
			$css->add_property( 'width', '300px' );
			$css->add_property( 'text-align', 'left' );
			$css->add_property( 'padding', '20px' );
			$css->add_property( 'transition', 'opacity 80ms linear' );
			$css->add_property( 'transition-delay', '0s' );
			$css->add_property( 'pointer-events', 'none' );
			$css->add_property( 'height', '0' );
			$css->add_property( 'overflow', 'hidden' );

			$css->set_selector( '.aeon-cart-icon:hover .aeon-cart-header' );
			$css->add_property( 'right', '0' );
			$css->add_property( 'opacity', '1' );
			$css->add_property( 'transition-delay', '150ms' );
			$css->add_property( 'pointer-events', 'auto' );
			$css->add_property( 'height', 'auto' );
			$css->add_property( 'overflow', 'visible' );

			$css->set_selector( '.aeon-cart-widget .widget,.aeon-cart-widget p' );
			$css->add_property( 'margin', '0' );

			$css->set_selector( '.aeon-cart-widget .woocommerce ul.cart_list' );
			$css->add_property( 'padding-bottom', '20px' );

			$css->set_selector( '.aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li' );
			$css->add_property( 'padding', '1em 2.3em 1em 5em' );
			$css->add_property( 'border-bottom', '1px solid var(--ae-main-border)' );

			$css->set_selector( '.aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li:last-child' );
			$css->add_property( 'border-bottom', '0' );

			$css->set_selector( '.aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li a.remove' );
			$css->add_property( 'top', '0.5em' );
			$css->add_property( 'right', '0' );
			$css->add_property( 'left', 'auto' );

			$css->set_selector( '.aeon-cart-widget .woocommerce ul.cart_list li a.remove' );
			$css->add_property( 'font-size', '16px' );
			$css->add_property( 'line-height', '20px' );

			$css->set_selector( '.aeon-cart-widget .woocommerce ul.cart_list li a' );
			$css->add_property( 'font-size', '13px' );
			$css->add_property( 'font-weight', '400' );
			$css->add_property( 'line-height', '1.3' );

			$css->set_selector( '.aeon-cart-widget .woocommerce ul.cart_list li img' );
			$css->add_property( 'position', 'absolute' );
			$css->add_property( 'left', '0' );
			$css->add_property( 'width', '4em' );
			$css->add_property( 'margin', '0 0 0.5em 0' );
			$css->add_property( 'top', '50%' );
			$css->add_property( 'transform', 'translateY(-50%)' );

			$css->set_selector( '.aeon-cart-widget p.woocommerce-mini-cart__total.total' );
			$css->add_property( 'padding', '1em 1.5em' );
			$css->add_property( 'margin', '0' );
			$css->add_property( 'text-align', 'center' );

			$css->set_selector( '.aeon-cart-widget .woocommerce .woocommerce-mini-cart__buttons a' );
			$css->add_property( 'display', 'block' );
			$css->add_property( 'margin', '0' );
			$css->add_property( 'text-align', 'center' );

			$css->set_selector( '.aeon-cart-widget .woocommerce .woocommerce-mini-cart__buttons a:first-child' );
			$css->add_property( 'margin-bottom', '6px' );

			$css->set_selector( '.aeon-cart-mobile' );
			$css->add_property( 'display', 'none' );

			$css->set_selector( '.aeon-cart-mobile .ae-icon' );
			$css->add_property( 'margin-right', '5px' );

			$css->set_selector( '.aeon-cart-mobile svg' );
			$css->add_property( 'top', '0' );

			// RTL.
			$css->set_selector( 'body.rtl .aeon-count' );
			$css->add_property( 'margin-left', '0' );
			$css->add_property( 'margin-right', '4px' );

			$css->set_selector( 'body.rtl .aeon-cart-total' );
			$css->add_property( 'margin-left', '0' );
			$css->add_property( 'margin-right', '6px' );

			$css->set_selector( 'body.rtl .aeon-cart-widget' );
			$css->add_property( 'float', 'right' );
			$css->add_property( 'right', 'auto' );
			$css->add_property( 'left', '-99999px' );
			$css->add_property( 'text-align', 'right' );

			$css->set_selector( 'body.rtl .aeon-cart-icon:hover .aeon-cart-widget' );
			$css->add_property( 'right', 'auto' );
			$css->add_property( 'left', '0' );

			$css->set_selector( 'body.rtl .aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li' );
			$css->add_property( 'padding', '1em 5em 1em 2.3em' );

			$css->set_selector( 'body.rtl .aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li a.remove' );
			$css->add_property( 'right', 'auto' );
			$css->add_property( 'left', '0' );

			$css->set_selector( 'body.rtl .aeon-cart-widget .woocommerce ul.cart_list li img' );
			$css->add_property( 'left', 'auto' );
			$css->add_property( 'right', '0' );

			$css->set_selector( 'body.rtl .aeon-cart-mobile .ae-icon' );
			$css->add_property( 'margin-right', '0' );
			$css->add_property( 'margin-left', '5px' );

			$css->start_media_query( '(max-width: ' . $settings['header_breakpoint'] . 'px)' );
			$css->set_selector( '.aeon-cart-icon' );
			$css->add_property( 'display', 'none' );

			$css->set_selector( '.aeon-cart-mobile' );
			$css->add_property( 'display', 'block' );
			$css->stop_media_query();
		}

		do_action( 'aeon_base_css', $css );

		return apply_filters( 'aeon_base_css_output', $css->css_output() );
	}
}

if ( ! function_exists( 'aeon_font_css' ) ) {
	/**
	 * Generate the CSS in the <head> section using the Theme Customizer.
	 */
	function aeon_font_css() {

		$settings = wp_parse_args(
			get_option( 'aeon_settings', array() ),
			aeon_get_default_fonts()
		);

		$defaults = aeon_get_default_fonts( false );

		$css = new Aeon_CSS();
		
		$css->set_selector( 'body, button, input, select, textarea' );
		if ( 'Default' !== $settings['font_body'] ) {
			$css->add_property( 'font-family', $settings['font_body'], $defaults['font_body'] );
		}
		$css->add_property( 'font-weight', $settings['body_font_weight'], $defaults['body_font_weight'] );
		$css->add_property( 'text-transform', $settings['body_font_transform'], $defaults['body_font_transform'] );
		if ( ! empty( $settings['body_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['body_font_size']['desktop'] ), $defaults['body_font_size']['desktop'], $settings['body_font_size_unit'] );
		}
		$body_lh = $settings['body_line_height_unit'];
		if ( '-' === $body_lh ) {
			$body_lh = '';
		}
		$css->add_property( 'line-height', floatval( $settings['body_line_height'] ), $defaults['body_line_height'], $body_lh );

		$css->set_selector( '.main-navigation .menu > li > a, .menu-toggle, .ae-canvas-link' );
		if ( 'Default' !== $settings['font_menu'] ) {
			$css->add_property( 'font-family', $settings['font_menu'], $defaults['font_menu'] );
		}
		$css->add_property( 'font-weight', $settings['menu_weight'], $defaults['menu_weight'] );
		$css->add_property( 'text-transform', $settings['menu_transform'], $defaults['menu_transform'] );
		if ( ! empty( $settings['menu_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['menu_font_size']['desktop'] ), $defaults['menu_font_size']['desktop'], $settings['menu_font_size_unit'] );
		}
		$menu_lh = $settings['menu_line_height_unit'];
		if ( '-' === $menu_lh ) {
			$menu_lh = '';
		}
		$css->add_property( 'line-height', floatval( $settings['menu_line_height'] ), $defaults['menu_line_height'], $menu_lh );

		$css->set_selector( '.main-navigation .menu ul.sub-menu li a' );
		if ( 'Default' !== $settings['font_dropdown'] ) {
			$css->add_property( 'font-family', $settings['font_dropdown'], $defaults['font_dropdown'] );
		}
		$css->add_property( 'font-weight', $settings['dropdown_weight'], $defaults['dropdown_weight'] );
		$css->add_property( 'text-transform', $settings['dropdown_transform'], $defaults['dropdown_transform'] );
		if ( ! empty( $settings['dropdown_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['dropdown_font_size']['desktop'] ), $defaults['dropdown_font_size']['desktop'], $settings['dropdown_font_size_unit'] );
		}
		$dropdown_lh = $settings['dropdown_line_height_unit'];
		if ( '-' === $menu_lh ) {
			$menu_lh = '';
		}
		if ( ! empty( $settings['dropdown_line_height'] ) ) {
			$css->add_property( 'line-height', floatval( $settings['dropdown_line_height'] ), $defaults['dropdown_line_height'], $dropdown_lh );
		}
		
		$css->set_selector( 'h1, h2, h3, h4, h5, h6' );
		if ( 'Default' !== $settings['font_headings'] ) {
			$css->add_property( 'font-family', $settings['font_headings'], $defaults['font_headings'] );
		}
		$css->add_property( 'font-weight', $settings['headings_weight'], $defaults['headings_weight'] );
		$css->add_property( 'text-transform', $settings['headings_transform'], $defaults['headings_transform'] );
		if ( ! empty( $settings['headings_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['headings_font_size']['desktop'] ), $defaults['headings_font_size']['desktop'], $settings['headings_font_size_unit'] );
		}
		if ( ! empty( $settings['headings_line_height'] ) ) {
			$css->add_property( 'line-height', floatval( $settings['headings_line_height'] ), $defaults['headings_line_height'], $settings['headings_line_height_unit'] );
		}
		
		$css->set_selector( 'h1' );
		if ( 'Default' !== $settings['font_heading_1'] ) {
			$css->add_property( 'font-family', $settings['font_heading_1'], $defaults['font_heading_1'] );
		}
		$css->add_property( 'font-weight', $settings['heading_1_weight'], $defaults['heading_1_weight'] );
		$css->add_property( 'text-transform', $settings['heading_1_transform'], $defaults['heading_1_transform'] );
		if ( ! empty( $settings['heading_1_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['heading_1_font_size']['desktop'] ), $defaults['heading_1_font_size']['desktop'], $settings['heading_1_font_size_unit'] );
		}
		$heading_1_lh = $settings['heading_1_line_height_unit'];
		if ( '-' === $heading_1_lh ) {
			$heading_1_lh = '';
		}
		$css->add_property( 'line-height', floatval( $settings['heading_1_line_height'] ), $defaults['heading_1_line_height'], $heading_1_lh );

		$css->set_selector( 'h2' );
		if ( 'Default' !== $settings['font_heading_2'] ) {
			$css->add_property( 'font-family', $settings['font_heading_2'], $defaults['font_heading_2'] );
		}
		$css->add_property( 'font-weight', $settings['heading_2_weight'], $defaults['heading_2_weight'] );
		$css->add_property( 'text-transform', $settings['heading_2_transform'], $defaults['heading_2_transform'] );
		if ( ! empty( $settings['heading_2_font_size']['desktop'] ) ) {
			$css->add_property( 'font-size', floatval( $settings['heading_2_font_size']['desktop'] ), $defaults['heading_2_font_size']['desktop'], $settings['heading_2_font_size_unit'] );
		}
		$heading_2_lh = $settings['heading_2_line_height_unit'];
		if ( '-' === $heading_2_lh ) {
			$heading_2_lh = '';
		}
		$css->add_property( 'line-height', floatval( $settings['heading_2_line_height'] ), $defaults['heading_2_line_height'], $heading_2_lh );

		$css->set_selector( 'h3' );
		if ( 'Default' !== $settings['font_heading_3'] ) {
			$css->add_property( 'font-family', $settings['font_heading_3'], $defaults['font_heading_3'] );
		}
		$css->add_property( 'font-weight', $settings['heading_3_weight'], $defaults['heading_3_weight'] );
		$css->add_property( 'text-transform', $settings['heading_3_transform'], $defaults['heading_3_transform'] );
		$css->add_property( 'font-size', floatval( $settings['heading_3_font_size'] ), $defaults['heading_3_font_size'], $settings['heading_3_font_size_unit'] );
		$heading_3_lh = $settings['heading_3_line_height_unit'];
		if ( '-' === $heading_3_lh ) {
			$heading_3_lh = '';
		}
		$css->add_property( 'line-height', floatval( $settings['heading_3_line_height'] ), $defaults['heading_3_line_height'], $heading_3_lh );

		$css->set_selector( 'h4' );
		if ( 'Default' !== $settings['font_heading_4'] ) {
			$css->add_property( 'font-family', $settings['font_heading_4'], $defaults['font_heading_4'] );
		}
		$css->add_property( 'font-weight', $settings['heading_4_weight'], $defaults['heading_4_weight'] );
		$css->add_property( 'text-transform', $settings['heading_4_transform'], $defaults['heading_4_transform'] );
		$css->add_property( 'font-size', floatval( $settings['heading_4_font_size'] ), $defaults['heading_4_font_size'], $settings['heading_4_font_size_unit'] );
		if ( ! empty( $settings['heading_4_line_height'] ) ) {
			$heading_4_lh = $settings['heading_4_line_height_unit'];
			if ( '-' === $heading_4_lh ) {
				$heading_4_lh = '';
			}
			$css->add_property( 'line-height', floatval( $settings['heading_4_line_height'] ), $defaults['heading_4_line_height'], $heading_4_lh );
		}

		$css->set_selector( 'h5' );
		if ( 'Default' !== $settings['font_heading_5'] ) {
			$css->add_property( 'font-family', $settings['font_heading_5'], $defaults['font_heading_5'] );
		}
		$css->add_property( 'font-weight', $settings['heading_5_weight'], $defaults['heading_5_weight'] );
		$css->add_property( 'text-transform', $settings['heading_5_transform'], $defaults['heading_5_transform'] );
		$css->add_property( 'font-size', floatval( $settings['heading_5_font_size'] ), $defaults['heading_5_font_size'], $settings['heading_5_font_size_unit'] );
		if ( ! empty( $settings['heading_5_line_height'] ) ) {
			$heading_5_lh = $settings['heading_5_line_height_unit'];
			if ( '-' === $heading_5_lh ) {
				$heading_5_lh = '';
			}
			$css->add_property( 'line-height', floatval( $settings['heading_5_line_height'] ), $defaults['heading_5_line_height'], $heading_5_lh );
		}

		$css->set_selector( 'h6' );
		if ( 'Default' !== $settings['font_heading_6'] ) {
			$css->add_property( 'font-family', $settings['font_heading_6'], $defaults['font_heading_6'] );
		}
		$css->add_property( 'font-weight', $settings['heading_6_weight'], $defaults['heading_6_weight'] );
		$css->add_property( 'text-transform', $settings['heading_6_transform'], $defaults['heading_6_transform'] );
		$css->add_property( 'font-size', floatval( $settings['heading_6_font_size'] ), $defaults['heading_6_font_size'], $settings['heading_6_font_size_unit'] );
		if ( ! empty( $settings['heading_6_line_height'] ) ) {
			$heading_6_lh = $settings['heading_6_line_height_unit'];
			if ( '-' === $heading_6_lh ) {
				$heading_6_lh = '';
			}
			$css->add_property( 'line-height', floatval( $settings['heading_6_line_height'] ), $defaults['heading_6_line_height'], $heading_6_lh );
		}

		$css->start_media_query( aeon_get_media_query( 'tablet' ) );
		if ( ! empty( $settings['body_font_size']['tablet'] ) ) {
			$css->set_selector( 'body, button, input, select, textarea' );
			$css->add_property( 'font-size', floatval( $settings['body_font_size']['tablet'] ), $defaults['body_font_size']['tablet'], $settings['body_font_size_unit'] );
		}

		if ( ! empty( $settings['menu_font_size']['tablet'] ) ) {
			$css->set_selector( '.main-navigation .menu > li > a, .menu-toggle, .ae-canvas-link' );
			$css->add_property( 'font-size', floatval( $settings['menu_font_size']['tablet'] ), $defaults['menu_font_size']['tablet'], $settings['menu_font_size_unit'] );
		}

		if ( ! empty( $settings['dropdown_font_size']['tablet'] ) ) {
			$css->set_selector( '.main-navigation .menu ul.sub-menu li a' );
			$css->add_property( 'font-size', floatval( $settings['dropdown_font_size']['tablet'] ), $defaults['dropdown_font_size']['tablet'], $settings['dropdown_font_size_unit'] );
		}

		if ( ! empty( $settings['headings_font_size']['tablet'] ) ) {
			$css->set_selector( 'h1, h2, h3, h4, h5, h6' );
			$css->add_property( 'font-size', floatval( $settings['headings_font_size']['tablet'] ), $defaults['headings_font_size']['tablet'], $settings['headings_font_size_unit'] );
		}

		if ( ! empty( $settings['heading_1_font_size']['tablet'] ) ) {
			$css->set_selector( 'h1' );
			$css->add_property( 'font-size', floatval( $settings['heading_1_font_size']['tablet'] ), $defaults['heading_1_font_size']['tablet'], $settings['heading_1_font_size_unit'] );
		}

		if ( ! empty( $settings['heading_2_font_size']['tablet'] ) ) {
			$css->set_selector( 'h2' );
			$css->add_property( 'font-size', floatval( $settings['heading_2_font_size']['tablet'] ), $defaults['heading_2_font_size']['tablet'], $settings['heading_2_font_size_unit'] );
		}
		$css->stop_media_query();

		$css->start_media_query( aeon_get_media_query( 'mobile' ) );
		if ( ! empty( $settings['body_font_size']['mobile'] ) ) {
			$css->set_selector( 'body, button, input, select, textarea' );
			$css->add_property( 'font-size', floatval( $settings['body_font_size']['mobile'] ), $defaults['body_font_size']['mobile'], $settings['body_font_size_unit'] );
		}

		if ( ! empty( $settings['menu_font_size']['mobile'] ) ) {
			$css->set_selector( '.main-navigation .menu > li > a, .menu-toggle, .ae-canvas-link' );
			$css->add_property( 'font-size', floatval( $settings['menu_font_size']['mobile'] ), $defaults['menu_font_size']['mobile'], $settings['menu_font_size_unit'] );
		}

		if ( ! empty( $settings['dropdown_font_size']['mobile'] ) ) {
			$css->set_selector( '.main-navigation .menu ul.sub-menu li a' );
			$css->add_property( 'font-size', floatval( $settings['dropdown_font_size']['mobile'] ), $defaults['dropdown_font_size']['mobile'], $settings['dropdown_font_size_unit'] );
		}

		if ( ! empty( $settings['headings_font_size']['mobile'] ) ) {
			$css->set_selector( 'h1, h2, h3, h4, h5, h6' );
			$css->add_property( 'font-size', floatval( $settings['headings_font_size']['mobile'] ), $defaults['headings_font_size']['mobile'], $settings['headings_font_size_unit'] );
		}

		if ( ! empty( $settings['heading_1_font_size']['mobile'] ) ) {
			$css->set_selector( 'h1' );
			$css->add_property( 'font-size', floatval( $settings['heading_1_font_size']['mobile'] ), $defaults['heading_1_font_size']['mobile'], $settings['heading_1_font_size_unit'] );
		}

		if ( ! empty( $settings['heading_2_font_size']['mobile'] ) ) {
			$css->set_selector( 'h2' );
			$css->add_property( 'font-size', floatval( $settings['heading_2_font_size']['mobile'] ), $defaults['heading_2_font_size']['mobile'], $settings['heading_2_font_size_unit'] );
		}
		$css->stop_media_query();

		do_action( 'aeon_typography_css', $css );

		return apply_filters( 'aeon_typography_css_output', $css->css_output() );
	}
}

/**
 * Get all of our dynamic CSS.
 */
function aeon_get_dynamic_css() {
	$css = aeon_base_css() . aeon_font_css();
	return apply_filters( 'aeon_dynamic_css', $css );
}

/**
 * Enqueue our dynamic CSS.
 */
function aeon_enqueue_dynamic_css() {
	if ( apply_filters( 'aeon_css_external_file', false ) ) {
		$css = '';
	} elseif ( ! get_option( 'aeon_dynamic_css_output', false )
	|| is_customize_preview()
	|| apply_filters( 'aeon_dynamic_css_skip_cache', false ) ) {
		$css = aeon_get_dynamic_css();
	} else {
		$css = get_option( 'aeon_dynamic_css_output' ) . '/* End cached CSS */';
	}
	wp_add_inline_style( 'aeon-style', wp_strip_all_tags( $css ) );
}
add_action( 'wp_enqueue_scripts', 'aeon_enqueue_dynamic_css', 50 );

/**
 * Sets our dynamic CSS cache if it does not exist.
 */
function aeon_set_dynamic_css_cache() {
	if ( apply_filters( 'aeon_dynamic_css_skip_cache', false ) ) {
		return;
	}

	$cached_css = get_option( 'aeon_dynamic_css_output', false );
	$cached_version = get_option( 'aeon_dynamic_css_cached_version', '' );

	if ( ! $cached_css || AEON_VERSION !== $cached_version ) {
		$css = aeon_get_dynamic_css();

		update_option( 'aeon_dynamic_css_output', wp_strip_all_tags( $css ) );
		update_option( 'aeon_dynamic_css_cached_version', esc_html( AEON_VERSION ) );
	}
}
add_action( 'init', 'aeon_set_dynamic_css_cache' );

/**
 * Update our CSS cache when done saving Customizer options.
 */
function aeon_update_dynamic_css_cache() {
	if ( apply_filters( 'aeon_dynamic_css_skip_cache', false ) ) {
		return;
	}

	$css = aeon_get_dynamic_css();
	update_option( 'aeon_dynamic_css_output', wp_strip_all_tags( $css ) );
}
add_action( 'customize_save_after', 'aeon_update_dynamic_css_cache' );
