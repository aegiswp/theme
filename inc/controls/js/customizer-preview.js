function aeon_css( control, style ) {
	jQuery( 'style#' + control ).remove();
	jQuery( 'head' ).append( '<style id="' + control + '">' + style + '</style>' );
}

function aeon_colors( control, selector, property, default_value, get_value ) {
	default_value = typeof default_value !== 'undefined' ? default_value : 'initial';
	get_value = typeof get_value !== 'undefined' ? get_value : '';

	wp.customize( 'aeon_settings[' + control + ']', function ( value ) {
		value.bind(function (to) {
			default_value = ( '' !== get_value ) ? wp.customize.value( 'aeon_settings[' + get_value + ']' )() : default_value;
			to = ( '' !== to ) ? to : default_value;
			jQuery( 'style#' + control ).remove();
			jQuery( 'head' ).append( '<style id="' + control + '">' + selector + '{' + property + ':' + to + '}</style>' );
		});
	});
}

function aeon_font_family( control, selector ) {
	wp.customize( 'aeon_settings[' + control + ']', function ( value ) {
		value.bind( function ( to ) {
			var link = '';
			var fontName = to.toString();
			fontName = fontName.split(",")[0];
			// Replace ' character with space, necessary to separate out font prop value.
			fontName = fontName.replace(/'/g, '');

			// Remove old style.
			jQuery( 'style#' + control ).remove();

			if ( 'Default' !== fontName &&
			'Arial' !== fontName &&
			'Helvetica' !== fontName &&
			'Times New Roman' !== fontName &&
			'Georgia' !== fontName ) {
				fontName = fontName.split(' ').join('+');
				
				// Remove old link.
				jQuery( 'link#' + control ).remove();
				link = '<link id="' + control + '" href="https://fonts.googleapis.com/css?family=' + fontName + '"  rel="stylesheet">';
			}

			// Concat and append new <style> and <link>.
			jQuery( 'head' ).append( '<style id="' + control + '">' + selector + '{font-family:' + to + '}</style>' + link );
		});
	});
}

function aeon_font_weight( control, font_control, selector ) {
	wp.customize( 'aeon_settings[' + control + ']', function( value ) {
		value.bind( function( to ) {
			var link = '';
			if ( to ) {
				var fontName = wp.customize._value[ 'aeon_settings[' + font_control + ']' ]._value;
				fontName = fontName.split(',');
				fontName = fontName[0].replace( /'/g, '' );

				// Remove old style.
				jQuery( 'style#' + control ).remove();

				if ( 'Default' !== fontName &&
				'Arial' !== fontName &&
				'Helvetica' !== fontName &&
				'Times New Roman' !== fontName &&
				'Georgia' !== fontName ) {
					// Remove old.
					jQuery( 'link#' + font_control ).remove();
					if( to === "inherit" ) {
						link = '<link id="' + font_control + '" href="https://fonts.googleapis.com/css?family=' + fontName + '"  rel="stylesheet">';
					} else {
						link = '<link id="' + font_control + '" href="https://fonts.googleapis.com/css?family=' + fontName + '%3A' + to + '"  rel="stylesheet">';
					}
				}

				// Concat and append new <style>.
				jQuery( 'head' ).append( '<style id="' + control + '">' + selector + '{font-weight:' + to + '}</style>' + link );
			} else {
				// Remove old.
				jQuery( 'style#' + control ).remove();
			}
		} );
	});
}

function aeon_typography( control, selector, property, unit ) {
	wp.customize( 'aeon_settings[' + control + ']', function( value ) {
		value.bind( function( to ) {
			// Remove <style> first!
			jQuery('style#' + control ).remove();

			if ( to || 0 === to ) {
				unit = 'undefined' !== typeof unit ? unit : '';

				// Remove old.
				jQuery( 'style#' + control ).remove();

				// Concat and append new <style>.
				jQuery('head').append('<style id="' + control + '">' + selector + '{' + property + ':' + to + '}</style>');

				if( 'unset' === to ){
					jQuery( 'style#' + control ).remove();
				}
			} else {
				// Remove old.
				jQuery( 'style#' + control ).remove();
			}
		} );
	} );
}

( function( $, api ) {
	/**
	 * Site title and description.
	 */
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	/**
	 * Logo width.
	 */
	api( 'aeon_settings[logo_width]', function( value ) {
		value.bind( function( to ) {
			if ( '' !== to['desktop'] || '' !== to['tablet'] || '' !== to['mobile'] ) {
				var unit = api.value( 'aeon_settings[logo_width_unit]' )();
				var style = '.site-branding img{max-width:' + to['desktop'] + unit + ';}@media( max-width: 1024px ){.site-branding img{max-width:' + to['tablet'] + unit + ';}}@media( max-width: 544px ){.site-branding img{max-width: ' + to['mobile'] + unit + ';}}';
				aeon_css( 'logo_width', style );
			}
		} );
	} );
	api( 'aeon_settings[logo_width_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[logo_width]' )();
			if ( '' !== size['desktop'] || '' !== size['tablet'] || '' !== size['mobile'] ) {
				var style = '.site-branding img{max-width:' + size['desktop'] + to + ';}@media( max-width: 1024px ){.site-branding img{max-width:' + size['tablet'] + to + ';}}@media( max-width: 544px ){.site-branding img{max-width: ' + size['mobile'] + to + ';}}';
				aeon_css( 'logo_width_unit', style );
			}
		} );
	} );

	/**
	 * Container width.
	 */
	api( 'aeon_settings[container_width]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[container_width_unit]' )();
			aeon_css( 'container_width', 'body .container{max-width:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[container_width_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[container_width]' )();
			aeon_css( 'container_width_unit', 'body .container{max-width:' + size + to + ';}' );
		} );
	} );

	/**
	 * Shop columns.
	 */
	api( 'aeon_settings[shop_columns]', function( value ) {
		value.bind( function( to ) {
			if ( '' !== to['desktop'] || '' !== to['tablet'] || '' !== to['mobile'] ) {
				var style = '.woocommerce .site-main ul.products li.product, .woocommerce-page .site-main ul.products li.product{width:calc( 100% / ' + to['desktop'] + ' - 30px);}@media( max-width: 1024px ){.woocommerce .site-main ul.products li.product, .woocommerce-page .site-main ul.products li.product{width:calc( 100% / ' + to['tablet'] + ' - 30px);}}@media( max-width: 544px ){.woocommerce .site-main ul.products li.product, .woocommerce-page .site-main ul.products li.product{width:calc( 100% / ' + to['mobile'] + ' - 30px);}}';
				aeon_css( 'shop_columns', style );
			}
		} );
	} );

	/**
	 * Remove header container.
	 */
	api( 'aeon_settings[remove_container]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header-inner' ).length ) {
				$( '.site-header-inner' ).toggleClass( 'container' );
			}
		} );
	} );

	/**
	 * Search full screen text.
	 */
	api( 'aeon_settings[search_fullscreen_heading]', function( value ) {
		value.bind( function( to ) {
			$( '.aeon-search-full-screen .search-text' ).html( to );

			if ( '' === to ) {
				$( '.aeon-search-full-screen .search-text' ).hide();
			} else {
				$( '.aeon-search-full-screen .search-text' ).show();
			}
		} );
	} );

	/**
	 * Search dropdown background.
	 */
	api( 'aeon_settings[search_dropdown_bg]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_dropdown_bg', '.aeon-search-icon.search-dropdown .aeon-search-wrapper{background-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search dropdown input background.
	 */
	api( 'aeon_settings[search_dropdown_input_bg]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_dropdown_input_bg', '.aeon-search-icon.search-dropdown input[type="search"]{background-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search dropdown input color.
	 */
	api( 'aeon_settings[search_dropdown_input_color]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_dropdown_input_color', '.aeon-search-icon.search-dropdown input[type="search"], .aeon-search-icon.search-dropdown input[type="search"]::placeholder{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search dropdown border color.
	 */
	api( 'aeon_settings[search_dropdown_input_border]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_dropdown_input_border', '.aeon-search-icon.search-dropdown input[type="search"]{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search dropdown border color hover.
	 */
	api( 'aeon_settings[search_dropdown_input_border_hover]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_dropdown_input_border_hover', '.aeon-search-icon.search-dropdown input[type="search"]:hover{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search dropdown border color focus.
	 */
	api( 'aeon_settings[search_dropdown_input_border_focus]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_dropdown_input_border_focus', '.aeon-search-icon.search-dropdown input[type="search"]:focus{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen background.
	 */
	api( 'aeon_settings[search_fullscreen_bg]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_bg', '.aeon-search-full-screen{background-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen title color.
	 */
	api( 'aeon_settings[search_fullscreen_title_color]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_title_color', '.aeon-search-full-screen .search-text{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen input background.
	 */
	api( 'aeon_settings[search_fullscreen_input_bg]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_input_bg', '.aeon-search-full-screen input[type="search"]{background-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen input color.
	 */
	api( 'aeon_settings[search_fullscreen_input_color]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_input_color', '.aeon-search-full-screen input[type="search"], .aeon-search-full-screen input[type="search"]::placeholder{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen border color.
	 */
	api( 'aeon_settings[search_fullscreen_input_border]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_input_border', '.aeon-search-full-screen input[type="search"]{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen border color hover.
	 */
	api( 'aeon_settings[search_fullscreen_input_border_hover]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_input_border_hover', '.aeon-search-full-screen input[type="search"]:hover{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen border color focus.
	 */
	api( 'aeon_settings[search_fullscreen_input_border_focus]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_input_border_focus', '.aeon-search-full-screen input[type="search"]:focus{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen close button color.
	 */
	api( 'aeon_settings[search_fullscreen_close_btn_color]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_close_btn_color', '.aeon-search-full-screen .aeon-search-close{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search full screen close button color hover.
	 */
	api( 'aeon_settings[search_fullscreen_close_btn_color_hover]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_fullscreen_close_btn_color_hover', '.aeon-search-full-screen .aeon-search-close:hover{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide input background.
	 */
	api( 'aeon_settings[search_slide_input_bg]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_input_bg', '.aeon-search-icon.search-slide input[type="search"]{background-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide input color.
	 */
	api( 'aeon_settings[search_slide_input_color]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_input_color', '.aeon-search-icon.search-slide input[type="search"], .aeon-search-icon.search-slide input[type="search"]::placeholder{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide border color.
	 */
	api( 'aeon_settings[search_slide_input_border]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_input_border', '.aeon-search-icon.search-slide input[type="search"]{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide border color hover.
	 */
	api( 'aeon_settings[search_slide_input_border_hover]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_input_border_hover', '.aeon-search-icon.search-slide input[type="search"]:hover{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide border color focus.
	 */
	api( 'aeon_settings[search_slide_input_border_focus]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_input_border_focus', '.aeon-search-icon.search-slide input[type="search"]:focus{border-color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide close button color.
	 */
	api( 'aeon_settings[search_slide_close_btn_color]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_close_btn_color', '.aeon-search-icon.search-slide .aeon-search-close{color:' + to + ';}' );
		} );
	} );

	/**
	 * Search slide close button color hover.
	 */
	api( 'aeon_settings[search_slide_close_btn_color_hover]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'search_slide_close_btn_color_hover', '.aeon-search-icon.search-slide .aeon-search-close:hover{color:' + to + ';}' );
		} );
	} );

	/**
	 * Add cart icon.
	 */
	api( 'aeon_settings[add_cart_icon]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header-inner' ).length ) {
				if ( true === to ) {
					$( '.aeon-cart-icon' ).removeClass( 'hide-cart' ).addClass( 'show-cart' );
					$( '.aeon-cart-mobile' ).removeClass( 'hide-cart' ).addClass( 'show-cart' );

					var style = '';
					style += '.aeon-cart-icon{position:relative;display:flex;}';
					style += 'a.aeon-cart-link{display:flex;align-items:center;padding:10px 15px;}';
					style += 'a.aeon-cart-link svg{top:0;font-size:15px;}';
					style += '.aeon-count{position:relative;width:18px;height:18px;line-height:18px;background-color:var(--ae-main);color:var(--ae-light);font-size:12px;margin-left:4px;font-weight:600;border-radius:50%;text-align:center;}';
					style += '.aeon-cart-total{display:inline-block;line-height:1;color:#57bf6d;margin-left:6px;}';
					style += '.aeon-cart-widget{display:block;background-color:var(--ae-light);box-shadow:0 2px 6px rgb(0 0 0 / 10%);float:left;position:absolute;top:100%;right:-99999px;opacity:0;z-index:99999;width:300px;text-align:left;padding:20px;transition:opacity 80ms linear;transition-delay:0s;pointer-events:none;height:0;overflow:hidden;}';
					style += '.aeon-cart-icon:hover .aeon-cart-widget{right:0;opacity:1;transition-delay:150ms;pointer-events:auto;height:auto;overflow:visible;}';
					style += '.aeon-cart-widget .widget,.aeon-cart-widget p{margin:0;}';
					style += '.aeon-cart-widget .woocommerce ul.cart_list{padding-bottom:20px;}';
					style += '.aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li{padding:1em 2.3em 1em 5em;border-bottom:1px solid var(--ae-main-border);}';
					style += '.aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li:last-child{border-bottom:0;}';
					style += '.aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li a.remove{top:0.5em;right:0;left:auto;}';
					style += '.aeon-cart-widget .woocommerce ul.cart_list li a.remove{font-size:16px;line-height:24px;}';
					style += '.aeon-cart-widget .woocommerce ul.cart_list li a{font-size:13px;font-weight:400;line-height:1.3;}';
					style += '.aeon-cart-widget .woocommerce ul.cart_list li img{position:absolute;left:0;width:4em;margin:0 0 0.5em 0;top:50%;transform:translateY(-50%);}';
					style += '.aeon-cart-widget p.woocommerce-mini-cart__total.total{padding:1em 1.5em;margin:0;text-align:center;}';
					style += '.aeon-cart-widget .woocommerce .woocommerce-mini-cart__buttons a{display:block;margin:0;text-align:center;}';
					style += '.aeon-cart-widget .woocommerce .woocommerce-mini-cart__buttons a:first-child{margin-bottom:6px;}';
					style += '.aeon-cart-mobile{display:none;}';
					style += '.aeon-cart-mobile .ae-icon{margin-right:5px;}';
					style += '.aeon-cart-mobile svg{top:0;}';
					style += 'body.rtl .aeon-search-icon .aeon-search-wrapper{right:auto;left:0;}';
					style += 'body.rtl .aeon-count{margin-left:0;margin-right:4px;}'
					style += 'body.rtl .aeon-cart-total{margin-left:0;margin-right:6px;}'
					style += 'body.rtl .aeon-cart-widget{float:right;right:auto;left:-99999px;text-align:right;}'
					style += 'body.rtl .aeon-cart-icon:hover .aeon-cart-widget{right:auto;left:0;}'
					style += 'body.rtl .aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li{padding:1em 5em 1em 2.3em;}'
					style += 'body.rtl .aeon-cart-widget .woocommerce.widget_shopping_cart .cart_list li a.remove{right:auto;left:0;}'
					style += 'body.rtl .aeon-cart-widget .woocommerce ul.cart_list li img{left:auto;right:0;}'
					style += 'body.rtl .aeon-cart-mobile .ae-icon{margin-right:0;margin-left:5px;}'
					style +=  '@media (max-width: 960px) {.aeon-cart-icon{display:none;}.aeon-cart-mobile{display:block;}}';
					aeon_css( 'cart_icon', style );
				} else {
					$( '.aeon-cart-icon' ).removeClass( 'show-cart' ).addClass( 'hide-cart' );
					$( '.aeon-cart-mobile' ).removeClass( 'show-cart' ).addClass( 'hide-cart' );

					$( 'style#cart_icon' ).remove();
				}
			}
		} );
	} );

	/**
	 * Display cart count.
	 */
	api( 'aeon_settings[cart_count]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header-inner' ).length ) {
				if ( true === to ) {
					$( '.aeon-count' ).removeClass( 'hide-cart-count' ).addClass( 'show-cart-count' );
				} else {
					$( '.aeon-count' ).removeClass( 'show-cart-count' ).addClass( 'hide-cart-count' );
				}
			}
		} );
	} );

	/**
	 * Display cart total.
	 */
	api( 'aeon_settings[cart_total]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header-inner' ).length ) {
				if ( true === to ) {
					$( '.aeon-cart-total' ).removeClass( 'hide-cart-total' ).addClass( 'show-cart-total' );
				} else {
					$( '.aeon-cart-total' ).removeClass( 'show-cart-total' ).addClass( 'hide-cart-total' );
				}
			}
		} );
	} );

	/**
	 * Header padding.
	 */
	api( 'aeon_settings[header_padding]', function( value ) {
		value.bind( function( to ) {
			var selector = '.site-header .site-header-inner';
			var style = '';
			style += selector + ' {';
			style += 'padding-top: ' + to['desktop']['top'] + to['desktop-unit'] + ';';
			style += 'padding-right: ' + to['desktop']['right'] + to['desktop-unit'] + ';';
			style += 'padding-bottom: ' + to['desktop']['bottom'] + to['desktop-unit'] + ';';
			style += 'padding-left: ' + to['desktop']['left'] + to['desktop-unit'] + ';';
			style += '}';

			style +=  '@media (max-width: 1024px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['tablet']['top'] + to['tablet-unit'] + ';';
			style += 'padding-right: ' + to['tablet']['right'] + to['tablet-unit'] + ';';
			style += 'padding-bottom: ' + to['tablet']['bottom'] + to['tablet-unit'] + ';';
			style += 'padding-left: ' + to['tablet']['left'] + to['tablet-unit'] + ';';
			style += '}';
			style += '}';

			style +=  '@media (max-width:544px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['mobile']['top'] + to['mobile-unit'] + ';';
			style += 'padding-right: ' + to['mobile']['right'] + to['mobile-unit'] + ';';
			style += 'padding-bottom: ' + to['mobile']['bottom'] + to['mobile-unit'] + ';';
			style += 'padding-left: ' + to['mobile']['left'] + to['mobile-unit'] + ';';
			style += '}';
			style += '}';
			aeon_css( 'header_padding', style );
		} );
	} );

	/**
	 * Sticky Header style.
	 */
	api( 'aeon_settings[sticky_style]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header' ).length ) {
				if ( 'hide-scroll' === to ) {
					$( '.site-header' ).addClass( 'ae-hide-scroll' );
				} else {
					$( '.site-header' ).removeClass( 'ae-hide-scroll' );
				}
			}
		} );
	} );

	/**
	 * Add Sticky Header logo.
	 */
	api( 'aeon_settings[sticky_logo]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header' ).length ) {
				if ( '' !== to ) {
					$( '.site-header' ).addClass( 'ae-has-sticky-logo' );
					var style = '.sticky-logo-link, .site-header.ae-has-sticky-logo.ae-is-sticky .custom-logo-link{display:none;}';
					style += '.site-header.ae-has-sticky-logo.ae-is-sticky .sticky-logo-link{display:inline-block;}';
					aeon_css( 'sticky_logo', style );
				} else {
					$( '.site-header' ).removeClass( 'ae-has-sticky-logo' );
					$( 'style#sticky_logo' ).remove();
				}
			}
		} );
	} );

	/**
	 * Sticky Header logo width.
	 */
	api( 'aeon_settings[sticky_logo_width]', function( value ) {
		value.bind( function( to ) {
			if ( '' !== to['desktop'] || '' !== to['tablet'] || '' !== to['mobile'] ) {
				var unit = api.value( 'aeon_settings[sticky_logo_width_unit]' )();
				var style = '.ae-is-sticky .site-branding img{max-width:' + to['desktop'] + unit + ';}@media( max-width: 1024px ){.ae-is-sticky .site-branding img{max-width:' + to['tablet'] + unit + ';}}@media( max-width: 544px ){.ae-is-sticky .site-branding img{max-width: ' + to['mobile'] + unit + ';}}';
				style += '.ae-has-sticky .site-branding img{transition: .3s;}';
				aeon_css( 'sticky_logo_width', style );
			}
		} );
	} );
	api( 'aeon_settings[sticky_logo_width_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[sticky_logo_width]' )();
			if ( '' !== size['desktop'] || '' !== size['tablet'] || '' !== size['mobile'] ) {
				var style = '.ae-is-sticky .site-branding img{max-width:' + size['desktop'] + to + ';}@media( max-width: 1024px ){.ae-is-sticky .site-branding img{max-width:' + size['tablet'] + to + ';}}@media( max-width: 544px ){.ae-is-sticky .site-branding img{max-width: ' + size['mobile'] + to + ';}}';
				style += '.ae-has-sticky .site-branding img{transition: .3s;}';
				aeon_css( 'sticky_logo_width_unit', style );
			}
		} );
	} );

	/**
	 * Add Sticky Header shadow.
	 */
	api( 'aeon_settings[add_sticky_shadow]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header' ).length ) {
				if ( true === to ) {
					$( '.site-header' ).addClass( 'ae-has-shadow' );
				} else {
					$( '.site-header' ).removeClass( 'ae-has-shadow' );
				}
			}
		} );
	} );

	/**
	 * Add Sticky Header breakpoint.
	 */
	api( 'aeon_settings[sticky_breakpoint]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.site-header' ).length ) {
				if ( to ) {
					$( '.site-header' ).attr( 'data-destroy-sticky', to );
				}

				if ( 'none' !== to ) {
					if ( window.innerWidth < to ) {
						$( 'style#header_sticky' ).remove();
						$( 'style#aeon-sticky-css' ).remove();
						$( 'script#aeon-sticky-js' ).remove();
					}
				}
			}
		} );
	} );

	/**
	 * Dropdown width.
	 */
	api( 'aeon_settings[dropdown_width]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[dropdown_width_unit]' )();
			aeon_css( 'dropdown_width', '.main-navigation ul ul{width:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[dropdown_width_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[dropdown_width]' )();
			aeon_css( 'dropdown_width_unit', '.main-navigation ul ul{width:' + size + to + ';}' );
		} );
	} );

	/**
	 * Dropdown border top height.
	 */
	api( 'aeon_settings[dropdown_border_top_height]', function( value ) {
		value.bind( function( to ) {
			aeon_css( 'dropdown_border_top_height', '.main-navigation ul ul{border-top-width:' + to + 'px;}' );
		} );
	} );

	/**
	 * Mobile label.
	 */
	api( 'aeon_settings[mobile_label]', function( value ) {
		value.bind( function( to ) {
			$( '#site-navigation button.menu-toggle .mobile-menu, #mobile-header button.menu-toggle .mobile-menu' ).text( to );

			if ( '' === to ) {
				$( '#site-navigation button.menu-toggle .mobile-menu-wrap, #mobile-header button.menu-toggle .mobile-menu-wrap' ).hide();
			} else {
				$( '#site-navigation button.menu-toggle .mobile-menu-wrap, #mobile-header button.menu-toggle .mobile-menu-wrap' ).show();
			}
		} );
	} );

	/**
	 * Mobile icon size.
	 */
	api( 'aeon_settings[mobile_icon_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[mobile_icon_size_unit]' )();
			aeon_css( 'mobile_icon_size', '#site-navigation button.menu-toggle .ae-icon, #mobile-header button.menu-toggle .ae-icon{font-size:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[mobile_icon_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[mobile_icon_size]' )();
			aeon_css( 'mobile_icon_size_unit', '#site-navigation button.menu-toggle .ae-icon, #mobile-header button.menu-toggle .ae-icon{font-size:' + size + to + ';}' );
		} );
	} );

	/**
	 * Mobile font size.
	 */
	api( 'aeon_settings[mobile_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[mobile_font_size_unit]' )();
			aeon_css( 'mobile_font_size', '#site-navigation button.menu-toggle, #mobile-header button.menu-toggle{font-size:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[mobile_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[mobile_font_size]' )();
			aeon_css( 'mobile_font_size_unit', '#site-navigation button.menu-toggle, #mobile-header button.menu-toggle{font-size:' + size + to + ';}' );
		} );
	} );

	/**
	 * Page Header padding.
	 */
	api( 'aeon_settings[page_header_padding]', function( value ) {
		value.bind( function( to ) {
			var selector = '.aeon-page-header';
			var style = '';
			style += selector + ' {';
			style += 'padding-top: ' + to['desktop']['top'] + to['desktop-unit'] + ';';
			style += 'padding-right: ' + to['desktop']['right'] + to['desktop-unit'] + ';';
			style += 'padding-bottom: ' + to['desktop']['bottom'] + to['desktop-unit'] + ';';
			style += 'padding-left: ' + to['desktop']['left'] + to['desktop-unit'] + ';';
			style += '}';

			style +=  '@media (max-width: 1024px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['tablet']['top'] + to['tablet-unit'] + ';';
			style += 'padding-right: ' + to['tablet']['right'] + to['tablet-unit'] + ';';
			style += 'padding-bottom: ' + to['tablet']['bottom'] + to['tablet-unit'] + ';';
			style += 'padding-left: ' + to['tablet']['left'] + to['tablet-unit'] + ';';
			style += '}';
			style += '}';

			style +=  '@media (max-width: 544px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['mobile']['top'] + to['mobile-unit'] + ';';
			style += 'padding-right: ' + to['mobile']['right'] + to['mobile-unit'] + ';';
			style += 'padding-bottom: ' + to['mobile']['bottom'] + to['mobile-unit'] + ';';
			style += 'padding-left: ' + to['mobile']['left'] + to['mobile-unit'] + ';';
			style += '}';
			style += '}';
			aeon_css( 'page_header_padding', style );
		} );
	} );

	/**
	 * Page Header breadcrumbs.
	 */
	api( 'aeon_settings[add_breadcrumbs]', function( value ) {
		value.bind( function( to ) {
			if ( $( '.aeon-page-header' ).length ) {
				if ( true === to ) {
					$( '.aeon-page-header' ).addClass( 'has-breadcrumb' );
					$( '.aeon-breadcrumbs' ).removeClass( 'hide-breadcrumbs' );
					$( '.aeon-breadcrumbs' ).addClass( 'show-breadcrumbs' );
				} else {
					$( '.aeon-page-header' ).removeClass( 'has-breadcrumb' );
					$( '.aeon-breadcrumbs' ).removeClass( 'show-breadcrumbs' );
					$( '.aeon-breadcrumbs' ).addClass( 'hide-breadcrumbs' );
				}
			}
		} );
	} );

	/**
	 * Page Header color.
	 */
	aeon_colors( 'page_header_background', '.aeon-page-header', 'background-color', '#f5f5f5' );
	aeon_colors( 'page_header_title_color', '.aeon-page-header h1', 'color', '' );

	/**
	 * Page Header breadcrumbs color.
	 */
	aeon_colors( 'page_header_breadcrumbs_text_color', '.aeon-page-header .aeon-breadcrumbs', 'color', '' );
	aeon_colors( 'page_header_breadcrumbs_separator_color', '.aeon-page-header .aeon-breadcrumbs .separator', 'color', '' );
	aeon_colors( 'page_header_breadcrumbs_links', '.aeon-page-header .aeon-breadcrumbs a', 'color', '' );
	aeon_colors( 'page_header_breadcrumbs_links_hover', '.aeon-page-header .aeon-breadcrumbs a:hover', 'color', '' );

	/**
	 * Global color.
	 */
	aeon_colors( 'global_color', ':root', '--ae-main', '#505762' );

	/**
	 * Global color hover.
	 */
	aeon_colors( 'global_color_hover', ':root', '--ae-main-hover', '#626a78' );

	/**
	 * Body background color.
	 */
	aeon_colors( 'background_color', 'body', 'background-color', '#fcfbf8' );

	/**
	 * Headings color.
	 */
	aeon_colors( 'headings_color', 'h1, h2, h3, h4, h5, h6', 'color', '#333333' );

	/**
	 * Text color.
	 */
	aeon_colors( 'text_color', 'body', 'color', '#777777' );

	/**
	 * Link color.
	 */
	aeon_colors( 'link_color', 'a, a:visited', 'color', '#333333' );

	/**
	 * Link color hover.
	 */
	aeon_colors( 'link_color_hover', 'a:hover', 'color', 'var(--ae-main)' );

	/**
	 * Link color active.
	 */
	aeon_colors( 'link_color_active', 'a:active', 'color', '' );

	/**
	 * Link color visited.
	 */
	aeon_colors( 'link_color_visited', 'a:visited', 'color', '' );

	/**
	 * Blog Post Title color.
	 */
	aeon_colors( 'post_title_color', '.entry-title a', 'color', '#333333' );

	/**
	 * Blog Post Title color hover.
	 */
	aeon_colors( 'post_title_color_hover', '.entry-title a:hover', 'color', 'var(--ae-main)' );

	/**
	 * Button background color.
	 */
	aeon_colors( 'button_background_color', 'button, input[type="button"], input[type="reset"], input[type="submit"]', 'background-color', 'var(--ae-main)' );

	/**
	 * Button background color hover.
	 */
	aeon_colors( 'button_background_color_hover', 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover', 'background-color', 'var(--ae-main-hover)' );

	/**
	 * Button color.
	 */
	aeon_colors( 'button_color', 'button, input[type="button"], input[type="reset"], input[type="submit"]', 'color', '#ffffff' );

	/**
	 * Button color hover.
	 */
	aeon_colors( 'button_color_hover', 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover', 'color', '#ffffff' );

	/**
	 * Header background.
	 */
	aeon_colors( 'header_background', '.site-header', 'background-color', '#fcfbf8' );

	/**
	 * Menu links background.
	 */
	aeon_colors( 'menu_links_bg', '#site-navigation.main-navigation .menu > li > a', 'background-color', '' );

	/**
	 * Menu links background hover.
	 */
	aeon_colors( 'menu_links_bg_hover', '#site-navigation.main-navigation .menu > li > a:hover', 'background-color', '' );

	/**
	 * Menu links color.
	 */
	aeon_colors( 'menu_links_color', '#site-navigation.main-navigation .menu > li > a, .aeon-search-icon > a, .aeon-cart-icon > a', 'color', '' );

	/**
	 * Menu links color hover.
	 */
	aeon_colors( 'menu_links_color_hover', '#site-navigation.main-navigation .menu > li > a:hover, .aeon-search-icon > a:hover, .aeon-cart-icon > a:hover', 'color', '' );

	/**
	 * Sticky background.
	 */
	aeon_colors( 'sticky_background', 'body .ae-is-sticky', 'background-color', '' );

	/**
	 * Sticky links color.
	 */
	aeon_colors( 'sticky_links_color', 'body .ae-is-sticky .main-navigation:not(.toggled) .menu > li > a, body .ae-is-sticky button.menu-toggle, body .ae-is-sticky .aeon-search-icon > a, body .ae-is-sticky .aeon-cart-icon > a', 'color', '' );

	/**
	 * Sticky links color hover.
	 */
	aeon_colors( 'sticky_links_color_hover', 'body .ae-is-sticky .main-navigation:not(.toggled) .menu > li > a:hover, body .ae-is-sticky button.menu-toggle:hover, body .ae-is-sticky .aeon-search-icon > a:hover, body .ae-is-sticky .aeon-cart-icon > a:hover', 'color', '' );

	/**
	 * Dropdown links background.
	 */
	aeon_colors( 'dropdown_links_bg', '.main-navigation .menu ul li a', 'background-color', '#fcfbf8' );
 
	/**
	 * Dropdown links background hover.
	 */
	aeon_colors( 'dropdown_links_bg_hover', '.main-navigation .menu ul li a:hover', 'background-color', '' );
 
	/**
	 * Dropdown links color.
	 */
	aeon_colors( 'dropdown_links_color', '.main-navigation .menu ul li a', 'color', '' );
 
	/**
	 * Dropdown links color hover.
	 */
	aeon_colors( 'dropdown_links_color_hover', '.main-navigation .menu ul li a:hover', 'color', '' );
 
	/**
	 * Dropdown border top color.
	 */
	aeon_colors( 'dropdown_border_top_color', '.main-navigation ul ul', 'border-top-color', '#222222' );
 
	/**
	 * Footer background.
	 */
	aeon_colors( 'footer_background', '.site-footer #footer-widgets', 'background-color', '#fcfbf8' );
 
	/**
	 * Footer titles.
	 */
	aeon_colors( 'footer_titles_color', '.site-footer #footer-widgets h2', 'color', '#333333' );
 
	/**
	 * Footer text.
	 */
	aeon_colors( 'footer_text_color', '.site-footer #footer-widgets', 'color', '#777777' );
 
	/**
	 * Footer links.
	 */
	aeon_colors( 'footer_links', '.site-footer #footer-widgets a:not(.wp-block-social-link-anchor, .wp-block-button__link)', 'color', '' );
 
	/**
	 * Footer links hover.
	 */
	aeon_colors( 'footer_links_hover', '.site-footer #footer-widgets a:not(.wp-block-social-link-anchor, .wp-block-button__link):hover', 'color', '' );

	/**
	 * Footer padding.
	 */
	api( 'aeon_settings[footer_padding]', function( value ) {
		value.bind( function( to ) {
			var selector = '.site-footer .footer-widgets';
			var style = '';
			style += selector + ' {';
			style += 'padding-top: ' + to['desktop']['top'] + to['desktop-unit'] + ';';
			style += 'padding-right: ' + to['desktop']['right'] + to['desktop-unit'] + ';';
			style += 'padding-bottom: ' + to['desktop']['bottom'] + to['desktop-unit'] + ';';
			style += 'padding-left: ' + to['desktop']['left'] + to['desktop-unit'] + ';';
			style += '}';

			style +=  '@media (max-width: 1024px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['tablet']['top'] + to['tablet-unit'] + ';';
			style += 'padding-right: ' + to['tablet']['right'] + to['tablet-unit'] + ';';
			style += 'padding-bottom: ' + to['tablet']['bottom'] + to['tablet-unit'] + ';';
			style += 'padding-left: ' + to['tablet']['left'] + to['tablet-unit'] + ';';
			style += '}';
			style += '}';

			style +=  '@media (max-width: 544px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['mobile']['top'] + to['mobile-unit'] + ';';
			style += 'padding-right: ' + to['mobile']['right'] + to['mobile-unit'] + ';';
			style += 'padding-bottom: ' + to['mobile']['bottom'] + to['mobile-unit'] + ';';
			style += 'padding-left: ' + to['mobile']['left'] + to['mobile-unit'] + ';';
			style += '}';
			style += '}';
			aeon_css( 'footer_padding', style );
		} );
	} );

	/**
	 * Copyright.
	 */
	api( 'aeon_settings[copyright]', function( value ) {
		value.bind( function( to ) {
			$( '.aeon-copyright' ).html( to );
		} );
	} );

	/**
	 * Copyright alignment.
	 */
	api( 'aeon_settings[copyright_align]', function( value ) {
        value.bind( function( to ) {
            if ( '' !== to.desktop || '' !== to.tablet || '' !== to.mobile ) {
                var style = '';
                style += '.site-footer .copyright-bar{text-align: ' + to['desktop'] + ';}';

                style +=  '@media (max-width: 1024px) {';
                style += '.site-footer .copyright-bar{text-align: ' + to['tablet'] + ';}';
                style += '} ';

                style +=  '@media (max-width: 544px) {';
                style += '.site-footer .copyright-bar{text-align: ' + to['mobile'] + ';}';
                style += '} ';

                aeon_css( 'copyright_align', style );
            }
        } );
    } );

	/**
	 * Copyright background.
	 */
	aeon_colors( 'copyright_background', '.site-footer .copyright-bar', 'background-color', '#fcfbf8' );
 
	/**
	 * Copyright text.
	 */
	aeon_colors( 'copyright_text_color', '.site-footer .copyright-bar', 'color', '#777777' );
 
	/**
	 * Copyright links.
	 */
	aeon_colors( 'copyright_links', '.site-footer .copyright-bar a', 'color', '' );
 
	/**
	 * Copyright links hover.
	 */
	aeon_colors( 'copyright_links_hover', '.site-footer .copyright-bar a:hover', 'color', '' );

	/**
	 * Copyright padding.
	 */
	api( 'aeon_settings[copyright_padding]', function( value ) {
		value.bind( function( to ) {
			var selector = '.site-footer .copyright-bar';
			var style = '';
			style += selector + ' {';
			style += 'padding-top: ' + to['desktop']['top'] + to['desktop-unit'] + ';';
			style += 'padding-right: ' + to['desktop']['right'] + to['desktop-unit'] + ';';
			style += 'padding-bottom: ' + to['desktop']['bottom'] + to['desktop-unit'] + ';';
			style += 'padding-left: ' + to['desktop']['left'] + to['desktop-unit'] + ';';
			style += '}';

			style +=  '@media (max-width: 1024px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['tablet']['top'] + to['tablet-unit'] + ';';
			style += 'padding-right: ' + to['tablet']['right'] + to['tablet-unit'] + ';';
			style += 'padding-bottom: ' + to['tablet']['bottom'] + to['tablet-unit'] + ';';
			style += 'padding-left: ' + to['tablet']['left'] + to['tablet-unit'] + ';';
			style += '}';
			style += '}';

			style +=  '@media (max-width:544px) {';
			style += selector + ' {';
			style += 'padding-top: ' + to['mobile']['top'] + to['mobile-unit'] + ';';
			style += 'padding-right: ' + to['mobile']['right'] + to['mobile-unit'] + ';';
			style += 'padding-bottom: ' + to['mobile']['bottom'] + to['mobile-unit'] + ';';
			style += 'padding-left: ' + to['mobile']['left'] + to['mobile-unit'] + ';';
			style += '}';
			style += '}';
			aeon_css( 'copyright_padding', style );
		} );
	} );
 
	/**
	 * Copyright font size.
	 */
	api( 'aeon_settings[copyright_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[copyright_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'copyright_font_size', '.site-footer .copyright-bar{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'copyright_font_size_tablet', '@media( max-width: 1024px ){.site-footer .copyright-bar{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'copyright_font_size_mobile', '@media( max-width: 544px ){.site-footer .copyright-bar{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[copyright_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[copyright_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'copyright_font_size_unit', '.site-footer .copyright-bar{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'copyright_font_size_unit_tablet', '@media( max-width: 1024px ){.site-footer .copyright-bar{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'copyright_font_size_unit_mobile', '@media( max-width: 544px ){.site-footer .copyright-bar{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );

	/**
	 * Body.
	 */
	aeon_font_family( 'font_body', 'body' );
	aeon_font_weight( 'body_font_weight', 'font_body', 'body' );
	api( 'aeon_settings[body_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[body_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'body_font_size', 'body, button, input, select, textarea{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'body_font_size_tablet', '@media( max-width: 1024px ){body, button, input, select, textarea{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'body_font_size_mobile', '@media( max-width: 544px ){body, button, input, select, textarea{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[body_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[body_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'body_font_size_unit', 'body, button, input, select, textarea{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'body_font_size_unit_tablet', '@media( max-width: 1024px ){body, button, input, select, textarea{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'body_font_size_unit_mobile', '@media( max-width: 544px ){body, button, input, select, textarea{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[body_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[body_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'body_line_height', 'body{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[body_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[body_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'body_line_height_unit', 'body{line-height:' + size + to + ';}' );
		} );
	} );
	aeon_typography( 'body_font_transform', 'body, button, input, select, textarea', 'text-transform' );

	/**
	 * Menu.
	 */
	aeon_font_family( 'font_menu', '.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link' );
	aeon_font_weight( 'menu_weight', 'font_menu', '.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link' );
	api( 'aeon_settings[menu_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[menu_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'menu_font_size', '.main-navigation .menu > li > a{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'menu_font_size_tablet', '@media( max-width: 1024px ){.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'menu_font_size_mobile', '@media( max-width: 544px ){.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[menu_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[menu_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'menu_font_size_unit', '.main-navigation .menu > li > a{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'menu_font_size_unit_tablet', '@media( max-width: 1024px ){.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'menu_font_size_unit_mobile', '@media( max-width: 544px ){.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );
	aeon_typography( 'menu_transform', '.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link', 'text-transform' );
	api( 'aeon_settings[menu_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[menu_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'menu_line_height', '.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[menu_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[menu_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'menu_line_height_unit', '.main-navigation .menu > li > a,.menu-toggle, .ae-canvas-link{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * Dropdown.
	 */
	aeon_font_family( 'font_dropdown', '.main-navigation .menu ul.sub-menu li a' );
	aeon_font_weight( 'dropdown_weight', 'font_dropdown', '.main-navigation .menu ul.sub-menu li a' );
	api( 'aeon_settings[dropdown_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[dropdown_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'dropdown_font_size', '.main-navigation .menu ul.sub-menu li a{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'dropdown_font_size_tablet', '@media( max-width: 1024px ){.main-navigation .menu ul.sub-menu li a{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'dropdown_font_size_mobile', '@media( max-width: 544px ){.main-navigation .menu ul.sub-menu li a{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[dropdown_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[dropdown_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'dropdown_font_size_unit', '.main-navigation .menu ul.sub-menu li a{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'dropdown_font_size_unit_tablet', '@media( max-width: 1024px ){.main-navigation .menu ul.sub-menu li a{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'dropdown_font_size_unit_mobile', '@media( max-width: 544px ){.main-navigation .menu ul.sub-menu li a{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );
	aeon_typography( 'dropdown_transform', '.main-navigation .menu ul.sub-menu li a', 'text-transform' );
	api( 'aeon_settings[dropdown_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[dropdown_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'dropdown_line_height', '.main-navigation .menu ul.sub-menu li a{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[dropdown_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[dropdown_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'dropdown_line_height_unit', '.main-navigation .menu ul.sub-menu li a{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * Headings.
	 */
	aeon_font_family( 'font_headings', 'h1, h2, h3, h4, h5, h6' );
	aeon_font_weight( 'headings_weight', 'font_headings', 'h1, h2, h3, h4, h5, h6' );
	api( 'aeon_settings[headings_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[headings_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'headings_font_size', 'h1, h2, h3, h4, h5, h6{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'headings_font_size_tablet', '@media( max-width: 1024px ){h1, h2, h3, h4, h5, h6{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'headings_font_size_mobile', '@media( max-width: 544px ){h1, h2, h3, h4, h5, h6{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[headings_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[headings_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'headings_font_size_unit', 'h1, h2, h3, h4, h5, h6{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'headings_font_size_unit_tablet', '@media( max-width: 1024px ){h1, h2, h3, h4, h5, h6{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'headings_font_size_unit_mobile', '@media( max-width: 544px ){h1, h2, h3, h4, h5, h6{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );
	aeon_typography( 'headings_transform', 'h1, h2, h3, h4, h5, h6', 'text-transform' );
	api( 'aeon_settings[headings_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[headings_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'headings_line_height', 'h1, h2, h3, h4, h5, h6{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[headings_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[headings_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'headings_line_height_unit', 'h1, h2, h3, h4, h5, h6{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * H1
	 */
	aeon_font_family( 'font_heading_1', 'h1' );
	aeon_font_weight( 'heading_1_weight', 'font_heading_1', 'h1' );
	api( 'aeon_settings[heading_1_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_1_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'heading_1_font_size', 'h1{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'heading_1_font_size_tablet', '@media( max-width: 1024px ){h1{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'heading_1_font_size_mobile', '@media( max-width: 544px ){h1{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[heading_1_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_1_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'heading_1_font_size_unit', 'h1{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'heading_1_font_size_unit_tablet', '@media( max-width: 1024px ){h1{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'heading_1_font_size_unit_mobile', '@media( max-width: 544px ){h1{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );
	aeon_typography( 'heading_1_transform', 'h1', 'text-transform' );
	api( 'aeon_settings[heading_1_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_1_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'heading_1_line_height', 'h1{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_1_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_1_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'heading_1_line_height_unit', 'h1{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * H2
	 */
	aeon_font_family( 'font_heading_2', 'h2' );
	aeon_font_weight( 'heading_2_weight', 'font_heading_2', 'h2' );
	api( 'aeon_settings[heading_2_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_2_font_size_unit]' )();
			if ( '' !== to['desktop'] ) {
				aeon_css( 'heading_2_font_size', 'h2{font-size:' + to['desktop'] + unit + ';}' );
			}
			if ( '' !== to['tablet'] ) {
				aeon_css( 'heading_2_font_size_tablet', '@media( max-width: 1024px ){h2{font-size:' + to['tablet'] + unit + ';}}' );
			}
			if ( '' !== to['mobile'] ) {
				aeon_css( 'heading_2_font_size_mobile', '@media( max-width: 544px ){h2{font-size:' + to['mobile'] + unit + ';}}' );
			}
		} );
	} );
	api( 'aeon_settings[heading_2_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_2_font_size]' )();
			if ( '' !== size['desktop'] ) {
				aeon_css( 'heading_2_font_size_unit', 'h2{font-size:' + size['desktop'] + to + ';}' );
			}
			if ( '' !== size['tablet'] ) {
				aeon_css( 'heading_2_font_size_unit_tablet', '@media( max-width: 1024px ){h2{font-size:' + size['tablet'] + to + ';}}' );
			}
			if ( '' !== size['mobile'] ) {
				aeon_css( 'heading_2_font_size_unit_mobile', '@media( max-width: 544px ){h2{font-size:' + size['mobile'] + to + ';}}' );
			}
		} );
	} );
	aeon_typography( 'heading_2_transform', 'h2', 'text-transform' );
	api( 'aeon_settings[heading_2_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_2_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'heading_2_line_height', 'h2{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_2_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_2_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'heading_2_line_height_unit', 'h2{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * H3
	 */
	aeon_font_family( 'font_heading_3', 'h3' );
	aeon_font_weight( 'heading_3_weight', 'font_heading_3', 'h3' );
	api( 'aeon_settings[heading_3_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_3_font_size_unit]' )();
			aeon_css( 'heading_3_font_size', 'h3{font-size:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_3_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_3_font_size]' )();
			aeon_css( 'heading_3_font_size_unit', 'h3{font-size:' + size + to + ';}' );
		} );
	} );
	aeon_typography( 'heading_3_transform', 'h3', 'text-transform' );
	api( 'aeon_settings[heading_3_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_3_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'heading_3_line_height', 'h3{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_3_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_3_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'heading_3_line_height_unit', 'h3{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * H4
	 */
	aeon_font_family( 'font_heading_4', 'h4' );
	aeon_font_weight( 'heading_4_weight', 'font_heading_4', 'h4' );
	api( 'aeon_settings[heading_4_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_4_font_size_unit]' )();
			aeon_css( 'heading_4_font_size', 'h4{font-size:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_4_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_4_font_size]' )();
			aeon_css( 'heading_4_font_size_unit', 'h4{font-size:' + size + to + ';}' );
		} );
	} );
	aeon_typography( 'heading_4_transform', 'h4', 'text-transform' );
	api( 'aeon_settings[heading_4_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_4_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'heading_4_line_height', 'h4{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_4_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_4_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'heading_4_line_height_unit', 'h4{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * H5
	 */
	aeon_font_family( 'font_heading_5', 'h5' );
	aeon_font_weight( 'heading_5_weight', 'font_heading_5', 'h5' );
	api( 'aeon_settings[heading_5_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_5_font_size_unit]' )();
			aeon_css( 'heading_5_font_size', 'h5{font-size:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_5_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_5_font_size]' )();
			aeon_css( 'heading_5_font_size_unit', 'h5{font-size:' + size + to + ';}' );
		} );
	} );
	aeon_typography( 'heading_5_transform', 'h5', 'text-transform' );
	api( 'aeon_settings[heading_5_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_5_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'heading_5_line_height', 'h5{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_5_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_5_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'heading_5_line_height_unit', 'h5{line-height:' + size + to + ';}' );
		} );
	} );

	/**
	 * H6
	 */
	aeon_font_family( 'font_heading_6', 'h6' );
	aeon_font_weight( 'heading_6_weight', 'font_heading_6', 'h6' );
	api( 'aeon_settings[heading_6_font_size]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_6_font_size_unit]' )();
			aeon_css( 'heading_6_font_size', 'h6{font-size:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_6_font_size_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_6_font_size]' )();
			aeon_css( 'heading_6_font_size_unit', 'h6{font-size:' + size + to + ';}' );
		} );
	} );
	aeon_typography( 'heading_6_transform', 'h6', 'text-transform' );
	api( 'aeon_settings[heading_6_line_height]', function( value ) {
		value.bind( function( to ) {
			var unit = api.value( 'aeon_settings[heading_6_line_height_unit]' )();
			if ( '-' === unit ) {
				unit = '';
			}
			aeon_css( 'heading_6_line_height', 'h6{line-height:' + to + unit + ';}' );
		} );
	} );
	api( 'aeon_settings[heading_6_line_height_unit]', function( value ) {
		value.bind( function( to ) {
			var size = api.value( 'aeon_settings[heading_6_line_height]' )();
			if ( '-' === to ) {
				to = '';
			}
			aeon_css( 'heading_6_line_height_unit', 'h6{line-height:' + size + to + ';}' );
		} );
	} );
}( jQuery, wp.customize ) );