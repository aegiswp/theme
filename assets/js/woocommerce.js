/**
 * File woocommerce.js.
 */
 jQuery( function( $ ) {
	$( function() {
		'use strict';
        aeonQuantityButtons();
	} );

	$( document ).ajaxComplete( function() {
		'use strict';
        aeonQuantityButtons();
	} );

	function aeonQuantityButtons() {
		// Grab all the quantity boxes that need dynamic buttons adding.
		var quantityBoxes = $( '.cart div.quantity:not(.buttons-added), .cart td.quantity:not(.buttons-added)' ).find( '.qty' );

		// Test the elements have length and greater than 0.
		// Try, catch here to provide basic error checking on hooked data.
		try {
			// Nothing found... stop here.
			if ( quantityBoxes.length === 0 ) {
				return false;
			}
		} catch ( e ) {
			return false;
		}

		// Allow the each loop callback to be completely overwritten.
		var quantityBoxesCallback;

		// Use the default callback handler.
        quantityBoxesCallback = function( key, value ) {
            var box = $( value );

            // Check allowed types.
            if ( [ 'date', 'hidden' ].indexOf( box.prop( 'type' ) ) !== -1 ) {
                return;
            }

            // Add plus and minus icons.
            box.parent().addClass( 'buttons-added' ).prepend( '<a href="javascript:void(0)" class="minus">-</a>' );
            box.after( '<a href="javascript:void(0)" class="plus">+</a>' );

            // Enforce min value on the input.
            var min = parseFloat( $( this ).attr( 'min' ) );

            if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
                $( this ).val( min );
            }

            // Add event handlers to plus and minus.
            $( document ).on( 'click', '.plus:not(.qv-plus), .minus:not(.qv-minus)', function() {
                // Get values.
                var currentQuantity = parseFloat( box.val() ),
                    maxQuantity = parseFloat( box.attr( 'max' ) ),
                    minQuantity = parseFloat( box.attr( 'min' ) ),
                    step = box.attr( 'step' );

                // Fallback default values.
                if ( ! currentQuantity || '' === currentQuantity || 'NaN' === currentQuantity ) {
                    currentQuantity = 0;
                }

                if ( '' === maxQuantity || 'NaN' === maxQuantity ) {
                    maxQuantity = '';
                }

                if ( '' === minQuantity || 'NaN' === minQuantity ) {
                    minQuantity = 0;
                }

                if ( 'any' === step || '' === step || undefined === step || 'NaN' === parseFloat( step ) ) {
                    step = 1;
                }

                if ( $( this ).is( '.plus' ) ) {
                    if ( maxQuantity && ( maxQuantity === currentQuantity || currentQuantity > maxQuantity ) ) {
                        box.val( maxQuantity );
                    } else {
                        box.val( currentQuantity + parseFloat( step ) );
                    }
                } else if ( minQuantity && ( minQuantity === currentQuantity || currentQuantity < minQuantity ) ) {
                    box.val( minQuantity );
                } else if ( currentQuantity > 0 ) {
                    box.val( currentQuantity - parseFloat( step ) );
                }

                // Trigger change event.
                box.trigger( 'change' );
            } );
        };

		$.each( quantityBoxes, quantityBoxesCallback );
	}
} );
