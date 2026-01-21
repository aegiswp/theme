/**
 * Responsive Breakpoints Editor Extension
 *
 * Provides dark theme styling for button groups in the block editor sidebar
 * and adds Landscape/Tablet breakpoint buttons to the responsive controls.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function() {
	'use strict';

	/**
	 * SVG icons for breakpoints
	 */
	const ICONS = {
		landscape: '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 7H5c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm.5 8c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5V9c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v6z" fill="currentColor"/></svg>',
		tablet: '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17 4H7c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v12zm-5-1.5h1v-1h-1v1z" fill="currentColor"/></svg>',
	};

	/**
	 * Add CSS styles for dark theme button groups
	 */
	const addStyles = function() {
		const styleId = 'aegis-responsive-breakpoints-styles';
		
		if ( document.getElementById( styleId ) ) {
			return;
		}

		const css = `
			/* Dark theme button group styles - replaces blue with #1e1e1e */
			.components-button-group > .components-button,
			.components-button-group > .components-button.is-small,
			.components-button-group > button {
				background: transparent !important;
				border: 1px solid #949494 !important;
				color: #1e1e1e !important;
				box-shadow: none !important;
			}
			.components-button-group > .components-button:hover,
			.components-button-group > .components-button.is-small:hover,
			.components-button-group > button:hover {
				background: #f0f0f0 !important;
				border-color: #757575 !important;
				color: #1e1e1e !important;
			}
			.components-button-group > .components-button.is-pressed,
			.components-button-group > .components-button.is-small.is-pressed,
			.components-button-group > .components-button.is-primary,
			.components-button-group > button.is-pressed {
				background: #1e1e1e !important;
				border-color: #1e1e1e !important;
				color: #fff !important;
			}
			.components-button-group > .components-button.is-pressed:hover,
			.components-button-group > .components-button.is-small.is-pressed:hover,
			.components-button-group > .components-button.is-primary:hover,
			.components-button-group > button.is-pressed:hover {
				background: #000 !important;
				border-color: #000 !important;
				color: #fff !important;
			}
			.components-button-group > .components-button:focus:not(:disabled),
			.components-button-group > button:focus:not(:disabled) {
				box-shadow: inset 0 0 0 1px #1e1e1e !important;
				outline: none !important;
			}
			/* Ensure SVG icons inherit color */
			.components-button-group > .components-button svg,
			.components-button-group > button svg {
				fill: currentColor;
			}
			/* Aegis breakpoint buttons */
			.aegis-breakpoint-btn {
				min-width: 36px !important;
				padding: 6px !important;
			}
			.aegis-breakpoint-btn svg {
				width: 24px !important;
				height: 24px !important;
			}
			/* When an Aegis button is active, force other buttons to look inactive */
			.components-button-group.aegis-breakpoint-active > .components-button:not(.aegis-active),
			.components-button-group.aegis-breakpoint-active > button:not(.aegis-active) {
				background: transparent !important;
				border-color: #949494 !important;
				color: #1e1e1e !important;
			}
			.components-button-group.aegis-breakpoint-active > .aegis-active {
				background: #1e1e1e !important;
				border-color: #1e1e1e !important;
				color: #fff !important;
			}
		`;

		const style = document.createElement( 'style' );
		style.id = styleId;
		style.textContent = css;
		document.head.appendChild( style );
	};

	/**
	 * Check if a button group is a responsive breakpoint group
	 */
	const isResponsiveGroup = function( group ) {
		const children = group.children;
		if ( children.length < 3 || children.length > 5 ) {
			return false;
		}

		// Check if first button contains "All" text or has specific aria-label
		const firstBtn = children[0];
		if ( ! firstBtn ) {
			return false;
		}

		const ariaLabel = firstBtn.getAttribute( 'aria-label' ) || '';
		const textContent = firstBtn.textContent || '';
		
		// Check for "All" in aria-label or text
		if ( ariaLabel.toLowerCase().includes( 'all' ) || textContent.toLowerCase() === 'all' ) {
			return true;
		}

		// Check if buttons have device-related SVG icons (monitor, phone icons)
		let svgCount = 0;
		for ( let i = 0; i < children.length; i++ ) {
			if ( children[i].querySelector( 'svg' ) ) {
				svgCount++;
			}
		}

		return svgCount >= 2;
	};

	/**
	 * Create a breakpoint button
	 */
	const createBreakpointButton = function( breakpoint, title, templateBtn ) {
		const button = document.createElement( 'button' );
		button.type = 'button';
		
		// Copy classes from template, remove is-pressed
		let className = templateBtn.className || '';
		className = className.replace( /is-pressed/g, '' ).trim();
		button.className = className + ' aegis-breakpoint-btn';
		
		button.setAttribute( 'aria-label', title );
		button.setAttribute( 'data-aegis-breakpoint', breakpoint );
		button.title = title;
		button.innerHTML = ICONS[breakpoint];

		// Handle click
		button.addEventListener( 'click', function( e ) {
			e.preventDefault();
			e.stopPropagation();
			
			const parent = button.parentNode;
			if ( parent ) {
				// Add class to parent to enable CSS override
				parent.classList.add( 'aegis-breakpoint-active' );
				
				// Remove aegis-active from all buttons
				const allButtons = parent.querySelectorAll( 'button, .components-button' );
				allButtons.forEach( function( btn ) {
					btn.classList.remove( 'aegis-active' );
				} );
			}

			// Add aegis-active to this button only
			button.classList.add( 'aegis-active' );

			// Dispatch custom event
			button.dispatchEvent( new CustomEvent( 'aegis-breakpoint-change', {
				detail: { breakpoint: breakpoint },
				bubbles: true,
			} ) );
		} );

		return button;
	};

	/**
	 * Extend a responsive button group with Landscape/Tablet buttons
	 */
	const extendButtonGroup = function( group ) {
		// Already extended?
		if ( group.querySelector( '[data-aegis-breakpoint="landscape"]' ) ) {
			return;
		}

		const children = group.children;
		if ( children.length < 3 ) {
			return;
		}

		// Find the desktop button (usually the last one)
		const desktopBtn = children[children.length - 1];
		const mobileBtn = children[1]; // Second button is usually mobile

		if ( ! desktopBtn || ! mobileBtn ) {
			return;
		}

		// Create landscape and tablet buttons
		const landscapeBtn = createBreakpointButton( 'landscape', 'Landscape (480-767px)', mobileBtn );
		const tabletBtn = createBreakpointButton( 'tablet', 'Tablet (768-1023px)', mobileBtn );

		// Insert before desktop button
		group.insertBefore( landscapeBtn, desktopBtn );
		group.insertBefore( tabletBtn, desktopBtn );

		// Add click listeners to original buttons to clear aegis active state
		for ( let i = 0; i < children.length; i++ ) {
			const btn = children[i];
			// Skip our injected buttons
			if ( btn.hasAttribute( 'data-aegis-breakpoint' ) ) {
				continue;
			}
			// Add listener if not already added
			if ( ! btn.hasAttribute( 'data-aegis-listener' ) ) {
				btn.setAttribute( 'data-aegis-listener', 'true' );
				btn.addEventListener( 'click', function() {
					// Remove aegis-breakpoint-active from parent (restores normal styling)
					group.classList.remove( 'aegis-breakpoint-active' );
					// Remove aegis-active from all buttons
					const allBtns = group.querySelectorAll( 'button, .components-button' );
					allBtns.forEach( function( b ) {
						b.classList.remove( 'aegis-active' );
					} );
				} );
			}
		}
	};

	/**
	 * Scan and extend all responsive button groups
	 */
	const scanAndExtend = function() {
		const buttonGroups = document.querySelectorAll( '.components-button-group' );
		
		buttonGroups.forEach( function( group ) {
			if ( isResponsiveGroup( group ) ) {
				extendButtonGroup( group );
			}
		} );
	};

	/**
	 * Initialize
	 */
	const init = function() {
		addStyles();

		// Initial scan after delay
		setTimeout( scanAndExtend, 1000 );

		// Set up MutationObserver to handle dynamic content
		const observer = new MutationObserver( function( mutations ) {
			let shouldScan = false;
			
			for ( let i = 0; i < mutations.length; i++ ) {
				if ( mutations[i].addedNodes.length > 0 ) {
					shouldScan = true;
					break;
				}
			}
			
			if ( shouldScan ) {
				// Debounce the scan
				clearTimeout( window.aegisResponsiveScanTimeout );
				window.aegisResponsiveScanTimeout = setTimeout( scanAndExtend, 100 );
			}
		} );

		observer.observe( document.body, {
			childList: true,
			subtree: true,
		} );

		// Also scan periodically for the first 30 seconds
		let scanCount = 0;
		const periodicScan = setInterval( function() {
			scanAndExtend();
			scanCount++;
			if ( scanCount >= 60 ) {
				clearInterval( periodicScan );
			}
		}, 500 );
	};

	// Start when DOM is ready
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}

} )();
