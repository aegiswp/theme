/**
 * Modal Block - Frontend View Script
 *
 * Implements accessibility features: focus trap, keyboard navigation,
 * screen reader support. Manages modal instances and trigger types.
 *
 * @package Aegis
 * @since   1.0.0
 */

interface ModalInstance {
	wrapper: HTMLElement;
	dialog: HTMLElement;
	trigger: HTMLElement | null;
	closeButtons: NodeListOf<Element>;
	overlay: HTMLElement | null;
	config: ModalConfig;
	previousFocus: HTMLElement | null;
}

interface ModalConfig {
	modalId: string;
	modalType: string;
	triggerType: string;
	animation: string;
	closeEsc: boolean;
	closeOverlay: boolean;
	preventScroll: boolean;
	focusTrap: boolean;
	returnFocus: boolean;
	scrollTriggerPercent: number;
	scrollTriggerOnce: boolean;
	exitIntentSensitivity: number;
	exitIntentDelay: number;
	timedTriggerDelay: number;
	autoCloseDelay: number;
	showOnce: boolean;
	showOnceExpiry: number;
	deviceVisibility: string[];
}

( function () {
	'use strict';

	const modals: Map<string, ModalInstance> = new Map();

	/**
	 * Get focusable elements within a container.
	 */
	function getFocusableElements( container: HTMLElement ): HTMLElement[] {
		const selector =
			'a[href], button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])';
		return Array.from( container.querySelectorAll<HTMLElement>( selector ) );
	}

	/**
	 * Parse config from data attributes.
	 */
	function parseConfig( wrapper: HTMLElement ): ModalConfig {
		return {
			modalId: wrapper.getAttribute( 'data-modal-id' ) || '',
			modalType: wrapper.getAttribute( 'data-modal-type' ) || 'popup',
			triggerType: wrapper.getAttribute( 'data-trigger-type' ) || 'button',
			animation: wrapper.getAttribute( 'data-animation' ) || 'fade',
			closeEsc: wrapper.getAttribute( 'data-close-esc' ) !== 'false',
			closeOverlay: wrapper.getAttribute( 'data-close-overlay' ) !== 'false',
			preventScroll: wrapper.getAttribute( 'data-prevent-scroll' ) !== 'false',
			focusTrap: wrapper.getAttribute( 'data-focus-trap' ) !== 'false',
			returnFocus: wrapper.getAttribute( 'data-return-focus' ) !== 'false',
			scrollTriggerPercent: parseInt( wrapper.getAttribute( 'data-scroll-trigger-percent' ) || '50', 10 ),
			scrollTriggerOnce: wrapper.getAttribute( 'data-scroll-trigger-once' ) !== 'false',
			exitIntentSensitivity: parseInt( wrapper.getAttribute( 'data-exit-intent-sensitivity' ) || '20', 10 ),
			exitIntentDelay: parseInt( wrapper.getAttribute( 'data-exit-intent-delay' ) || '0', 10 ),
			timedTriggerDelay: parseInt( wrapper.getAttribute( 'data-timed-trigger-delay' ) || '5000', 10 ),
			autoCloseDelay: parseInt( wrapper.getAttribute( 'data-auto-close-delay' ) || '0', 10 ),
			showOnce: wrapper.getAttribute( 'data-show-once' ) === 'true',
			showOnceExpiry: parseInt( wrapper.getAttribute( 'data-show-once-expiry' ) || '7', 10 ),
			deviceVisibility: ( wrapper.getAttribute( 'data-device-visibility' ) || 'desktop,tablet,mobile' ).split( ',' ),
		};
	}

	/**
	 * Open a modal.
	 */
	function openModal( instance: ModalInstance ): void {
		const { dialog, config } = instance;

		instance.previousFocus = document.activeElement as HTMLElement;

		dialog.removeAttribute( 'hidden' );
		dialog.setAttribute( 'aria-hidden', 'false' );

		if ( config.preventScroll ) {
			document.body.style.overflow = 'hidden';
		}

		// Focus the dialog or first focusable element.
		requestAnimationFrame( () => {
			const focusable = getFocusableElements( dialog );
			if ( focusable.length > 0 ) {
				focusable[ 0 ].focus();
			} else {
				dialog.focus();
			}
		} );

		// Update trigger aria-expanded.
		if ( instance.trigger ) {
			instance.trigger.setAttribute( 'aria-expanded', 'true' );
		}

		// Dispatch opened event.
		instance.wrapper.dispatchEvent(
			new CustomEvent( 'aegis-modal-opened', { bubbles: true, detail: { modalId: config.modalId } } )
		);

		// Announce to screen readers.
		dialog.setAttribute( 'role', 'dialog' );
	}

	/**
	 * Close a modal.
	 */
	function closeModal( instance: ModalInstance ): void {
		const { dialog, config } = instance;

		dialog.setAttribute( 'hidden', '' );
		dialog.setAttribute( 'aria-hidden', 'true' );

		if ( config.preventScroll ) {
			document.body.style.overflow = '';
		}

		// Update trigger aria-expanded.
		if ( instance.trigger ) {
			instance.trigger.setAttribute( 'aria-expanded', 'false' );
		}

		// Return focus.
		if ( config.returnFocus && instance.previousFocus ) {
			instance.previousFocus.focus();
		}

		// Dispatch closed event.
		instance.wrapper.dispatchEvent(
			new CustomEvent( 'aegis-modal-closed', { bubbles: true, detail: { modalId: config.modalId } } )
		);
	}

	/**
	 * Handle keydown events for modal.
	 */
	function handleKeydown( event: KeyboardEvent, instance: ModalInstance ): void {
		const { dialog, config } = instance;

		if ( event.key === 'Escape' && config.closeEsc ) {
			event.preventDefault();
			closeModal( instance );
			return;
		}

		// Focus trap.
		if ( event.key === 'Tab' && config.focusTrap ) {
			const focusable = getFocusableElements( dialog );
			if ( focusable.length === 0 ) return;

			const first = focusable[ 0 ];
			const last = focusable[ focusable.length - 1 ];

			if ( event.shiftKey ) {
				if ( document.activeElement === first ) {
					event.preventDefault();
					last.focus();
				}
			} else {
				if ( document.activeElement === last ) {
					event.preventDefault();
					first.focus();
				}
			}
		}
	}

	/**
	 * Initialize a single modal instance.
	 */
	function initModal( wrapper: HTMLElement ): void {
		const config = parseConfig( wrapper );
		const dialog = wrapper.querySelector<HTMLElement>( '.aegis-modal' );
		const trigger = wrapper.querySelector<HTMLElement>( '.aegis-modal-trigger' );

		if ( ! dialog ) return;

		const instance: ModalInstance = {
			wrapper,
			dialog,
			trigger,
			closeButtons: wrapper.querySelectorAll( '[data-close-modal]' ),
			overlay: wrapper.querySelector( '.aegis-modal__overlay' ),
			config,
			previousFocus: null,
		};

		modals.set( config.modalId, instance );

		// Trigger click handler.
		if ( trigger ) {
			trigger.addEventListener( 'click', () => openModal( instance ) );
		}

		// Close button handlers.
		instance.closeButtons.forEach( ( btn ) => {
			btn.addEventListener( 'click', () => closeModal( instance ) );
		} );

		// Keyboard handler.
		dialog.addEventListener( 'keydown', ( e ) => handleKeydown( e, instance ) );

		// Custom event listeners.
		wrapper.addEventListener( 'aegis-modal-open', () => openModal( instance ) );
		wrapper.addEventListener( 'aegis-modal-close', () => closeModal( instance ) );

		// Initialize advanced triggers.
		initAdvancedTriggers( instance );
	}

	/**
	 * Initialize scroll, exit-intent, and timed triggers.
	 */
	function initAdvancedTriggers( instance: ModalInstance ): void {
		const { config } = instance;

		// Scroll trigger.
		if ( config.triggerType === 'scroll' ) {
			let triggered = false;
			window.addEventListener( 'scroll', () => {
				if ( triggered && config.scrollTriggerOnce ) return;

				const scrollPercent =
					( window.scrollY / ( document.documentElement.scrollHeight - window.innerHeight ) ) * 100;

				if ( scrollPercent >= config.scrollTriggerPercent ) {
					triggered = true;
					openModal( instance );
				}
			}, { passive: true } );
		}

		// Exit intent trigger.
		if ( config.triggerType === 'exit-intent' ) {
			let triggered = false;
			document.addEventListener( 'mouseout', ( e: MouseEvent ) => {
				if ( triggered ) return;
				if ( e.clientY <= config.exitIntentSensitivity && e.relatedTarget === null ) {
					triggered = true;
					if ( config.exitIntentDelay > 0 ) {
						setTimeout( () => openModal( instance ), config.exitIntentDelay );
					} else {
						openModal( instance );
					}
				}
			} );
		}

		// Timed trigger.
		if ( config.triggerType === 'timed' ) {
			setTimeout( () => openModal( instance ), config.timedTriggerDelay );
		}
	}

	/**
	 * Initialize all modals on the page.
	 */
	function initAllModals(): void {
		const wrappers = document.querySelectorAll<HTMLElement>( '.aegis-modal-wrapper' );
		wrappers.forEach( initModal );
	}

	// Initialize when DOM is ready.
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAllModals );
	} else {
		initAllModals();
	}
} )();
