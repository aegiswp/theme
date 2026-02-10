/**
 * Toggle Block - Frontend View Script
 *
 * Handles toggle expand/collapse with animation and accessibility.
 * Implements WAI-ARIA Accordion Pattern for keyboard navigation.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function () {
	'use strict';

	const INIT_FLAG = 'data-aegis-toggle-init';

	/**
	 * Check if the user prefers reduced motion (V1).
	 */
	function prefersReducedMotion(): boolean {
		return window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	}

	/**
	 * Clean up inline animation styles from a content element.
	 */
	function clearAnimationStyles( content: HTMLElement ): void {
		content.style.height = '';
		content.style.overflow = '';
		content.style.transition = '';
	}

	/**
	 * Initialize a single toggle block (V5: double-init guard).
	 */
	function initToggle( wrapper: HTMLElement ): void {
		if ( wrapper.hasAttribute( INIT_FLAG ) ) {
			return;
		}
		wrapper.setAttribute( INIT_FLAG, '' );

		const triggerEl = wrapper.querySelector<HTMLButtonElement>( '.aegis-toggle__trigger' );
		const contentEl = wrapper.querySelector<HTMLElement>( '.aegis-toggle__content' );

		if ( ! triggerEl || ! contentEl ) return;

		// Non-null references for use in inner closures (TypeScript narrowing).
		const trigger: HTMLButtonElement = triggerEl;
		const content: HTMLElement = contentEl;

		const allowMultiple = wrapper.getAttribute( 'data-allow-multiple' ) !== 'false';
		const rawDuration = parseInt( wrapper.getAttribute( 'data-animation-duration' ) || '300', 10 );
		const duration = ( Number.isFinite( rawDuration ) && rawDuration >= 0 ) ? rawDuration : 300;

		// Animation lock to prevent rapid-click issues (V6).
		let isAnimating = false;

		trigger.addEventListener( 'click', () => {
			if ( isAnimating ) return;

			const isExpanded = trigger.getAttribute( 'aria-expanded' ) === 'true';

			if ( ! isExpanded ) {
				// Close siblings if not allowing multiple.
				if ( ! allowMultiple ) {
					const parent = wrapper.parentElement;
					if ( parent ) {
						const siblings = parent.querySelectorAll<HTMLElement>( '.aegis-toggle--open' );
						siblings.forEach( ( sibling ) => {
							if ( sibling !== wrapper ) {
								closeSibling( sibling );
							}
						} );
					}
				}
				openToggle();
			} else {
				closeToggle();
			}
		} );

		// Arrow key navigation between accordion triggers (V4).
		trigger.addEventListener( 'keydown', ( event: KeyboardEvent ) => {
			if ( event.key !== 'ArrowUp' && event.key !== 'ArrowDown' &&
				event.key !== 'Home' && event.key !== 'End' ) {
				return;
			}

			const accordionParent = wrapper.parentElement;
			if ( ! accordionParent ) return;

			const triggers = Array.from(
				accordionParent.querySelectorAll<HTMLButtonElement>( ':scope > .aegis-toggle .aegis-toggle__trigger' )
			);

			if ( triggers.length < 2 ) return;

			const currentIndex = triggers.indexOf( trigger );
			if ( currentIndex === -1 ) return;

			event.preventDefault();

			let targetIndex: number;

			switch ( event.key ) {
				case 'ArrowDown':
					targetIndex = ( currentIndex + 1 ) % triggers.length;
					break;
				case 'ArrowUp':
					targetIndex = ( currentIndex - 1 + triggers.length ) % triggers.length;
					break;
				case 'Home':
					targetIndex = 0;
					break;
				case 'End':
					targetIndex = triggers.length - 1;
					break;
				default:
					return;
			}

			triggers[ targetIndex ].focus();
		} );

		/**
		 * Open this toggle with animation (V1: skip animation for reduced motion).
		 */
		function openToggle(): void {
			trigger.setAttribute( 'aria-expanded', 'true' );
			content.removeAttribute( 'hidden' );
			wrapper.classList.add( 'aegis-toggle--open' );

			// Instant toggle for reduced motion or zero duration (V1).
			if ( prefersReducedMotion() || duration === 0 ) {
				clearAnimationStyles( content );
				return;
			}

			isAnimating = true;

			// Set initial collapsed state.
			content.style.overflow = 'hidden';
			content.style.height = '0';

			// Double-rAF to ensure browser commits initial state before animating (V2).
			requestAnimationFrame( () => {
				requestAnimationFrame( () => {
					content.style.transition = `height ${ duration }ms ease`;
					content.style.height = content.scrollHeight + 'px';
				} );
			} );

			const onEnd = () => {
				clearAnimationStyles( content );
				isAnimating = false;
				content.removeEventListener( 'transitionend', onEnd );
				clearTimeout( fallbackTimer );
			};

			content.addEventListener( 'transitionend', onEnd );

			// Fallback timeout in case transitionend doesn't fire (V3).
			const fallbackTimer = setTimeout( onEnd, duration + 50 );
		}

		/**
		 * Close this toggle with animation.
		 */
		function closeToggle(): void {
			trigger.setAttribute( 'aria-expanded', 'false' );
			wrapper.classList.remove( 'aegis-toggle--open' );

			// Instant toggle for reduced motion or zero duration (V1).
			if ( prefersReducedMotion() || duration === 0 ) {
				content.setAttribute( 'hidden', '' );
				clearAnimationStyles( content );
				return;
			}

			isAnimating = true;

			// Set current height explicitly before animating to 0.
			content.style.overflow = 'hidden';
			content.style.height = content.scrollHeight + 'px';

			// Double-rAF for committed initial state (V2).
			requestAnimationFrame( () => {
				requestAnimationFrame( () => {
					content.style.transition = `height ${ duration }ms ease`;
					content.style.height = '0';
				} );
			} );

			const onEnd = () => {
				content.setAttribute( 'hidden', '' );
				clearAnimationStyles( content );
				isAnimating = false;
				content.removeEventListener( 'transitionend', onEnd );
				clearTimeout( fallbackTimer );
			};

			content.addEventListener( 'transitionend', onEnd );

			// Fallback timeout (V3).
			const fallbackTimer = setTimeout( onEnd, duration + 50 );
		}

		/**
		 * Close a sibling toggle instantly (no animation lock needed).
		 */
		function closeSibling( sibling: HTMLElement ): void {
			const sibTrigger = sibling.querySelector<HTMLButtonElement>( '.aegis-toggle__trigger' );
			const sibContent = sibling.querySelector<HTMLElement>( '.aegis-toggle__content' );

			if ( ! sibTrigger || ! sibContent ) return;

			sibTrigger.setAttribute( 'aria-expanded', 'false' );
			sibling.classList.remove( 'aegis-toggle--open' );
			sibContent.setAttribute( 'hidden', '' );
			clearAnimationStyles( sibContent );
		}
	}

	/**
	 * Initialize all toggle blocks on the page.
	 */
	function initAllToggles(): void {
		const toggles = document.querySelectorAll<HTMLElement>( '.aegis-toggle:not([' + INIT_FLAG + '])' );
		toggles.forEach( initToggle );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAllToggles );
	} else {
		initAllToggles();
	}
} )();
