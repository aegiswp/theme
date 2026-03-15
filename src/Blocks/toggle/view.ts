/**
 * Toggle Block - Frontend View Script
 *
 * Implements accessible accordion/toggle functionality with keyboard navigation
 * and ARIA attributes for screen readers.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function () {
	'use strict';

	const INIT_FLAG = 'data-aegis-toggle-init';

	interface ToggleConfig {
		allowMultiple: boolean;
		animationDuration: number;
	}

	function parseConfig( el: HTMLElement ): ToggleConfig {
		return {
			allowMultiple: el.getAttribute( 'data-allow-multiple' ) !== 'false',
			animationDuration: parseInt( el.getAttribute( 'data-animation-duration' ) || '300', 10 ),
		};
	}

	function initToggle( wrapper: HTMLElement ): void {
		if ( wrapper.hasAttribute( INIT_FLAG ) ) {
			return;
		}
		wrapper.setAttribute( INIT_FLAG, '' );

		const config = parseConfig( wrapper );
		const trigger = wrapper.querySelector<HTMLButtonElement>( '.aegis-toggle__trigger' );
		const content = wrapper.querySelector<HTMLElement>( '.aegis-toggle__content' );

		if ( ! trigger || ! content ) {
			return;
		}

		// Initial state is set by render.php via aria-expanded and hidden attributes.
		// Store references to avoid null checks in nested function.
		const triggerEl = trigger;
		const contentEl = content;

		function toggle( open?: boolean ): void {
			const shouldOpen = open !== undefined ? open : triggerEl.getAttribute( 'aria-expanded' ) === 'false';

			if ( shouldOpen ) {
				// Opening
				contentEl.removeAttribute( 'hidden' );
				const body = contentEl.querySelector<HTMLElement>( '.aegis-toggle__body' );
				const height = body ? body.scrollHeight : contentEl.scrollHeight;
				contentEl.style.height = '0';

				requestAnimationFrame( () => {
					contentEl.style.transition = `height ${ config.animationDuration }ms ease-in-out`;
					contentEl.style.height = height + 'px';
				} );

				setTimeout( () => {
					contentEl.style.height = '';
					contentEl.style.transition = '';
				}, config.animationDuration );

				triggerEl.setAttribute( 'aria-expanded', 'true' );
				wrapper.classList.add( 'aegis-toggle--open' );

				// Dispatch event
				wrapper.dispatchEvent(
					new CustomEvent( 'aegis:toggle:opened', {
						bubbles: true,
						detail: { toggleId: triggerEl.id },
					} )
				);
			} else {
				// Closing
				const body = contentEl.querySelector<HTMLElement>( '.aegis-toggle__body' );
				const height = body ? body.scrollHeight : contentEl.scrollHeight;
				contentEl.style.height = height + 'px';

				requestAnimationFrame( () => {
					contentEl.style.transition = `height ${ config.animationDuration }ms ease-in-out`;
					contentEl.style.height = '0';
				} );

				setTimeout( () => {
					contentEl.setAttribute( 'hidden', '' );
					contentEl.style.height = '';
					contentEl.style.transition = '';
				}, config.animationDuration );

				triggerEl.setAttribute( 'aria-expanded', 'false' );
				wrapper.classList.remove( 'aegis-toggle--open' );

				// Dispatch event
				wrapper.dispatchEvent(
					new CustomEvent( 'aegis:toggle:closed', {
						bubbles: true,
						detail: { toggleId: triggerEl.id },
					} )
				);
			}
		}

		// Click handler
		trigger.addEventListener( 'click', () => {
			// If allowMultiple is false, close other toggles in the same container
			if ( ! config.allowMultiple ) {
				const parent = wrapper.parentElement;
				if ( parent ) {
					const siblings = parent.querySelectorAll<HTMLElement>( '.aegis-toggle' );
					siblings.forEach( ( sibling ) => {
						if ( sibling !== wrapper && sibling.classList.contains( 'aegis-toggle--open' ) ) {
							const siblingTrigger = sibling.querySelector<HTMLButtonElement>( '.aegis-toggle__trigger' );
							if ( siblingTrigger ) {
								siblingTrigger.click();
							}
						}
					} );
				}
			}

			toggle();
		} );

		// Keyboard navigation (Enter and Space are handled by button default behavior)
		trigger.addEventListener( 'keydown', ( e: KeyboardEvent ) => {
			if ( e.key === 'Enter' || e.key === ' ' ) {
				e.preventDefault();
				trigger.click();
			}
		} );

		// Custom event listeners for programmatic control
		wrapper.addEventListener( 'aegis-toggle-open', () => toggle( true ) );
		wrapper.addEventListener( 'aegis-toggle-close', () => toggle( false ) );
		wrapper.addEventListener( 'aegis-toggle-toggle', () => toggle() );
	}

	function initAll(): void {
		const toggles = document.querySelectorAll<HTMLElement>(
			'.aegis-toggle:not([' + INIT_FLAG + '])'
		);
		toggles.forEach( initToggle );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAll );
	} else {
		initAll();
	}
} )();
