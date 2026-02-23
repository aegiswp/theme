/**
 * Aegis Admin Settings JavaScript
 *
 * Handles navigation and interactions for the admin settings page.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function( $ ) {
	'use strict';

	$( document ).ready( function() {
		initNavigation();
		initAjaxSave();
		initBulkActions();
		initSearch();
		initExportImport();
		initBlockToggleSuboptions();
	} );

	/**
	 * Initialize block toggle suboptions visibility.
	 */
	function initBlockToggleSuboptions() {
		// Handle main block toggle changes
		$( '.aegis-blocks-form .aegis-toggle-main input[type="checkbox"]' ).on( 'change', function() {
			const $checkbox = $( this );
			const name = $checkbox.attr( 'name' );
			// Extract block key from name like "aegis_blocks[modal]"
			const match = name.match( /aegis_blocks\[(\w+)\]/ );
			
			if ( match ) {
				const blockKey = match[1];
				const $suboptions = $( '.aegis-toggle-suboptions[data-parent="' + blockKey + '"]' );
				
				if ( $checkbox.is( ':checked' ) ) {
					$suboptions.slideDown( 200 );
				} else {
					$suboptions.slideUp( 200 );
				}
			}
		} );
	}

	/**
	 * Initialize sidebar navigation.
	 */
	function initNavigation() {
		const navItems = document.querySelectorAll( '.aegis-nav-item' );
		const sections = document.querySelectorAll( '.aegis-settings-section' );

		if ( ! navItems.length || ! sections.length ) {
			return;
		}

		navItems.forEach( function( item ) {
			item.addEventListener( 'click', function( e ) {
				e.preventDefault();

				const targetId = this.getAttribute( 'href' ).substring( 1 );
				const targetSection = document.getElementById( targetId );

				if ( ! targetSection ) {
					return;
				}

				// Update active nav item
				navItems.forEach( function( nav ) {
					nav.classList.remove( 'active' );
				} );
				this.classList.add( 'active' );

				// Update active section
				sections.forEach( function( section ) {
					section.classList.remove( 'active' );
				} );
				targetSection.classList.add( 'active' );

				// Update URL hash without scrolling
				history.pushState( null, null, '#' + targetId );
			} );
		} );

		// Handle initial hash
		const hash = window.location.hash.substring( 1 );
		if ( hash ) {
			const targetNav = document.querySelector( '.aegis-nav-item[href="#' + hash + '"]' );
			if ( targetNav ) {
				targetNav.click();
			}
		}
	}

	/**
	 * Initialize AJAX save functionality.
	 */
	function initAjaxSave() {
		// Handle Conditional Logic form
		$( '.aegis-settings-form:not(.aegis-integrations-form):not(.aegis-blocks-form)' ).on( 'submit', function( e ) {
			e.preventDefault();
			const $form = $( this );
			const $submitBtn = $form.find( 'input[type="submit"]' );

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const originalText = $submitBtn.val();
			$submitBtn.val( aegisAdmin.saving ).prop( 'disabled', true );

			// Collect settings from checkboxes
			const settings = {};
			$form.find( 'input[type="checkbox"]' ).each( function() {
				const name = $( this ).attr( 'name' );
				const match = name.match( /aegis_conditional_logic\[(\w+)\]\[(\w+)\]/ );

				if ( match ) {
					const group = match[1];
					const key = match[2];

					if ( ! settings[ group ] ) {
						settings[ group ] = {};
					}

					settings[ group ][ key ] = $( this ).is( ':checked' ) ? '1' : '0';
				}
			} );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_save_settings',
					nonce: aegisAdmin.nonce,
					settings: settings
				},
				success: function( response ) {
					if ( response.success ) {
						showNotice( aegisAdmin.saved, 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$submitBtn.val( originalText ).prop( 'disabled', false );
				}
			} );
		} );

		// Handle Blocks form
		$( '.aegis-blocks-form' ).on( 'submit', function( e ) {
			e.preventDefault();
			const $form = $( this );
			const $submitBtn = $form.find( 'input[type="submit"]' );

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const originalText = $submitBtn.val();
			$submitBtn.val( aegisAdmin.saving ).prop( 'disabled', true );

			// Collect blocks settings
			const settings = {};
			$form.find( 'input[type="checkbox"]' ).each( function() {
				const name = $( this ).attr( 'name' );
				const match = name.match( /aegis_blocks\[(\w+)\]/ );

				if ( match ) {
					settings[ match[1] ] = $( this ).is( ':checked' ) ? '1' : '0';
				}
			} );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_save_blocks',
					nonce: aegisAdmin.nonce,
					settings: settings
				},
				success: function( response ) {
					if ( response.success ) {
						showNotice( aegisAdmin.saved, 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$submitBtn.val( originalText ).prop( 'disabled', false );
				}
			} );
		} );

		// Handle Integrations form
		$( '.aegis-integrations-form' ).on( 'submit', function( e ) {
			e.preventDefault();
			const $form = $( this );
			const $submitBtn = $form.find( 'input[type="submit"]' );

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const originalText = $submitBtn.val();
			$submitBtn.val( aegisAdmin.saving ).prop( 'disabled', true );

			// Collect integrations settings
			const settings = {};
			$form.find( 'input[type="checkbox"]' ).each( function() {
				const name = $( this ).attr( 'name' );
				const match = name.match( /aegis_integrations\[(\w+)\]/ );

				if ( match ) {
					settings[ match[1] ] = $( this ).is( ':checked' ) ? '1' : '0';
				}
			} );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_save_integrations',
					nonce: aegisAdmin.nonce,
					settings: settings
				},
				success: function( response ) {
					if ( response.success ) {
						showNotice( aegisAdmin.saved, 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$submitBtn.val( originalText ).prop( 'disabled', false );
				}
			} );
		} );

		// Handle BunnyCDN API settings save
		$( document ).on( 'click', '.aegis-save-bunnycdn', function( e ) {
			e.preventDefault();
			const $btn = $( this );

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const originalText = $btn.text();
			$btn.text( aegisAdmin.saving ).prop( 'disabled', true );

			// Collect BunnyCDN settings
			const settings = {};
			$( '.aegis-bunnycdn-field' ).each( function() {
				const name = $( this ).attr( 'name' );
				const match = name.match( /aegis_bunnycdn\[(\w+)\]/ );

				if ( match ) {
					settings[ match[1] ] = $( this ).val();
				}
			} );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_save_bunnycdn',
					nonce: aegisAdmin.nonce,
					settings: settings
				},
				success: function( response ) {
					if ( response.success ) {
						showNotice( aegisAdmin.saved, 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$btn.text( originalText ).prop( 'disabled', false );
				}
			} );
		} );

		// Handle BunnyCDN test connection
		$( document ).on( 'click', '.aegis-test-bunnycdn', function( e ) {
			e.preventDefault();
			const $btn = $( this );
			const originalText = $btn.text();
			$btn.text( 'Testing...' ).prop( 'disabled', true );

			// For now, just show a message - actual API test would require server-side implementation
			setTimeout( function() {
				showNotice( 'Connection test feature coming soon.', 'info' );
				$btn.text( originalText ).prop( 'disabled', false );
			}, 1000 );
		} );

		// Handle Google Maps API settings save
		$( document ).on( 'click', '.aegis-save-google-maps', function( e ) {
			e.preventDefault();
			const $btn = $( this );

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const originalText = $btn.text();
			$btn.text( aegisAdmin.saving ).prop( 'disabled', true );

			// Collect Google Maps settings
			const settings = {};
			$( '.aegis-google-maps-field' ).each( function() {
				const name = $( this ).attr( 'name' );
				const match = name.match( /aegis_google_maps\[(\w+)\]/ );

				if ( match ) {
					settings[ match[1] ] = $( this ).val();
				}
			} );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_save_google_maps',
					nonce: aegisAdmin.nonce,
					settings: settings
				},
				success: function( response ) {
					if ( response.success ) {
						showNotice( aegisAdmin.saved, 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$btn.text( originalText ).prop( 'disabled', false );
				}
			} );
		} );

		// Handle Google Maps test connection
		$( document ).on( 'click', '.aegis-test-google-maps', function( e ) {
			e.preventDefault();
			const $btn = $( this );

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const originalText = $btn.text();
			$btn.text( 'Testing...' ).prop( 'disabled', true );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_test_google_maps',
					nonce: aegisAdmin.nonce
				},
				success: function( response ) {
					if ( response.success ) {
						showNotice( response.data.message, 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$btn.text( originalText ).prop( 'disabled', false );
				}
			} );
		} );
	}

	/**
	 * Initialize bulk enable/disable actions.
	 * If Pro is installed, toggles all features. Otherwise, only toggles free features.
	 */
	function initBulkActions() {
		$( document ).on( 'click', '.aegis-bulk-enable', function( e ) {
			e.preventDefault();
			const $section = $( this ).closest( '.aegis-settings-section' );
			const proInstalled = $( this ).data( 'pro-installed' ) === true || $( this ).data( 'pro-installed' ) === 'true';

			if ( proInstalled ) {
				// Pro installed: enable all features (free + pro)
				$section.find( '.aegis-toggle input[type="checkbox"]:not(:disabled)' ).prop( 'checked', true );
			} else {
				// No Pro: only enable free features (exclude pro features)
				$section.find( '.aegis-toggle-card:not(.aegis-pro-feature) .aegis-toggle input[type="checkbox"]' ).prop( 'checked', true );
			}
		} );

		$( document ).on( 'click', '.aegis-bulk-disable', function( e ) {
			e.preventDefault();
			const $section = $( this ).closest( '.aegis-settings-section' );
			const proInstalled = $( this ).data( 'pro-installed' ) === true || $( this ).data( 'pro-installed' ) === 'true';

			if ( proInstalled ) {
				// Pro installed: disable all features (free + pro)
				$section.find( '.aegis-toggle input[type="checkbox"]:not(:disabled)' ).prop( 'checked', false );
			} else {
				// No Pro: only disable free features (exclude pro features)
				$section.find( '.aegis-toggle-card:not(.aegis-pro-feature) .aegis-toggle input[type="checkbox"]' ).prop( 'checked', false );
			}
		} );
	}

	/**
	 * Initialize search/filter functionality.
	 */
	function initSearch() {
		$( '.aegis-search-input' ).on( 'input', function() {
			const query = $( this ).val().toLowerCase().trim();
			const $cards = $( '.aegis-toggle-card' );

			if ( ! query ) {
				$cards.show();
				$( '.aegis-settings-section' ).show();
				$( '.aegis-nav-item' ).removeClass( 'has-results no-results' );
				return;
			}

			$cards.each( function() {
				const $card = $( this );
				const title = $card.find( 'h3' ).text().toLowerCase();
				const desc = $card.find( 'p' ).text().toLowerCase();

				if ( title.includes( query ) || desc.includes( query ) ) {
					$card.show();
				} else {
					$card.hide();
				}
			} );

			// Show/hide sections based on visible cards
			$( '.aegis-settings-section' ).each( function() {
				const $section = $( this );
				const visibleCards = $section.find( '.aegis-toggle-card:visible' ).length;
				const sectionId = $section.attr( 'id' );
				const $navItem = $( '.aegis-nav-item[href="#' + sectionId + '"]' );

				if ( visibleCards > 0 ) {
					$section.show();
					$navItem.addClass( 'has-results' ).removeClass( 'no-results' );
				} else {
					$navItem.addClass( 'no-results' ).removeClass( 'has-results' );
				}
			} );
		} );
	}

	/**
	 * Initialize export/import functionality.
	 */
	function initExportImport() {
		// Export settings
		$( '.aegis-export-btn' ).on( 'click', function( e ) {
			e.preventDefault();

			if ( typeof aegisAdmin === 'undefined' ) {
				return;
			}

			const $btn = $( this );
			const originalText = $btn.text();
			$btn.text( aegisAdmin.exporting || 'Exporting...' ).prop( 'disabled', true );

			$.ajax( {
				url: aegisAdmin.ajaxUrl,
				type: 'POST',
				data: {
					action: 'aegis_export_settings',
					nonce: aegisAdmin.nonce
				},
				success: function( response ) {
					if ( response.success ) {
						// Create and download file
						const blob = new Blob( [ JSON.stringify( response.data, null, 2 ) ], { type: 'application/json' } );
						const url = URL.createObjectURL( blob );
						const a = document.createElement( 'a' );
						a.href = url;
						a.download = 'aegis-settings-' + new Date().toISOString().slice( 0, 10 ) + '.json';
						document.body.appendChild( a );
						a.click();
						document.body.removeChild( a );
						URL.revokeObjectURL( url );
						showNotice( aegisAdmin.exported || 'Settings exported successfully.', 'success' );
					} else {
						showNotice( response.data.message || aegisAdmin.error, 'error' );
					}
				},
				error: function() {
					showNotice( aegisAdmin.error, 'error' );
				},
				complete: function() {
					$btn.text( originalText ).prop( 'disabled', false );
				}
			} );
		} );

		// Import settings - trigger file input
		$( '.aegis-import-btn' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '#aegis-import-file' ).trigger( 'click' );
		} );

		// Handle file selection
		$( '#aegis-import-file' ).on( 'change', function( e ) {
			const file = e.target.files[0];
			if ( ! file ) {
				return;
			}

			if ( file.type !== 'application/json' ) {
				showNotice( aegisAdmin.invalidFile || 'Please select a valid JSON file.', 'error' );
				return;
			}

			const reader = new FileReader();
			reader.onload = function( event ) {
				try {
					const settings = JSON.parse( event.target.result );
					importSettings( settings );
				} catch ( err ) {
					showNotice( aegisAdmin.invalidFile || 'Invalid JSON file.', 'error' );
				}
			};
			reader.readAsText( file );

			// Reset file input
			$( this ).val( '' );
		} );
	}

	/**
	 * Import settings via AJAX.
	 */
	function importSettings( settings ) {
		if ( typeof aegisAdmin === 'undefined' ) {
			return;
		}

		$.ajax( {
			url: aegisAdmin.ajaxUrl,
			type: 'POST',
			data: {
				action: 'aegis_import_settings',
				nonce: aegisAdmin.nonce,
				settings: JSON.stringify( settings )
			},
			success: function( response ) {
				if ( response.success ) {
					showNotice( aegisAdmin.imported || 'Settings imported successfully. Reloading...', 'success' );
					setTimeout( function() {
						window.location.reload();
					}, 1500 );
				} else {
					showNotice( response.data.message || aegisAdmin.error, 'error' );
				}
			},
			error: function() {
				showNotice( aegisAdmin.error, 'error' );
			}
		} );
	}

	/**
	 * Show a notice message.
	 */
	function showNotice( message, type ) {
		// Remove existing notices
		$( '.aegis-notice' ).remove();

		const $notice = $( '<div class="aegis-notice aegis-notice-' + type + '">' + message + '</div>' );
		$( '.aegis-settings-header' ).after( $notice );

		// Auto-hide after 3 seconds
		setTimeout( function() {
			$notice.fadeOut( 300, function() {
				$( this ).remove();
			} );
		}, 3000 );
	}

} )( jQuery );
