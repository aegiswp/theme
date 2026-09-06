/**
 * Toggle Block - Frontend View Script
 *
 * Switches between two labeled content views.
 *
 * @package
 * @since   1.1.0
 */

( function () {
	'use strict';

	const INIT_FLAG = 'data-aegis-toggle-init';
	const BUTTONS = ':scope > .aegis-toggle__control > .aegis-toggle__button';
	const PANELS =
		':scope > .aegis-toggle__panels > .aegis-toggle-content';
	const CONTROL = ':scope > .aegis-toggle__control';
	const INDICATOR =
		':scope > .aegis-toggle__control > .aegis-toggle__indicator';
	const TRACK = ':scope > .aegis-toggle__control > .aegis-toggle__track';

	function controlButtons(
		wrapper: HTMLElement
	): NodeListOf< HTMLButtonElement > {
		return wrapper.querySelectorAll< HTMLButtonElement >( BUTTONS );
	}

	function panelEls( wrapper: HTMLElement ): NodeListOf< HTMLElement > {
		return wrapper.querySelectorAll< HTMLElement >( PANELS );
	}

	function prefersReducedMotion(): boolean {
		return (
			typeof window.matchMedia === 'function' &&
			window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches
		);
	}

	function defersPanelSwap( wrapper: HTMLElement ): boolean {
		return (
			/aegis-toggle--animation-(fade|slide|flip|scale)/.test(
				wrapper.className
			) && ! prefersReducedMotion()
		);
	}

	function setActive( wrapper: HTMLElement, target: string ): void {
		if ( wrapper.getAttribute( 'data-active' ) === target ) {
			return;
		}

		const buttons = controlButtons( wrapper );
		const panels = panelEls( wrapper );

		buttons.forEach( ( button ) => {
			const isActive =
				button.getAttribute( 'data-toggle-target' ) === target;
			button.classList.toggle( 'is-active', isActive );
			button.setAttribute(
				'aria-selected',
				isActive ? 'true' : 'false'
			);
		} );

		if ( ! defersPanelSwap( wrapper ) ) {
			panels.forEach( ( panel ) => {
				const isActive = panel.getAttribute( 'data-slot' ) === target;
				panel.classList.toggle( 'is-active', isActive );
				panel.setAttribute(
					'aria-hidden',
					isActive ? 'false' : 'true'
				);
			} );
		}

		wrapper.setAttribute( 'data-active', target );
		updateIndicator( wrapper );

		wrapper.dispatchEvent(
			new CustomEvent( 'aegis:toggle:changed', {
				bubbles: true,
				detail: {
					target,
					toggleId: wrapper.getAttribute( 'data-toggle-id' ),
				},
			} )
		);
	}

	function updateIndicator( wrapper: HTMLElement ): void {
		const indicator = wrapper.querySelector< HTMLElement >( INDICATOR );
		const control = wrapper.querySelector< HTMLElement >( CONTROL );
		const active = wrapper.querySelector< HTMLElement >(
			BUTTONS + '.is-active'
		);

		if ( ! indicator || ! control || ! active ) {
			return;
		}

		const controlRect = control.getBoundingClientRect();
		const buttonRect = active.getBoundingClientRect();

		indicator.style.width = `${ buttonRect.width }px`;
		indicator.style.transform = `translateX(${
			buttonRect.left - controlRect.left
		}px)`;
	}

	function initToggle( wrapper: HTMLElement ): void {
		if ( wrapper.hasAttribute( INIT_FLAG ) ) {
			return;
		}

		const buttons = controlButtons( wrapper );
		const panels = panelEls( wrapper );

		if ( buttons.length < 2 ) {
			return;
		}

		wrapper.setAttribute( INIT_FLAG, '' );

		const toggleId = wrapper.getAttribute( 'data-toggle-id' ) || '';

		buttons.forEach( ( button ) => {
			const target = button.getAttribute( 'data-toggle-target' );
			if ( toggleId && ( target === 'a' || target === 'b' ) ) {
				button.setAttribute(
					'aria-controls',
					`${ toggleId }-${ target }`
				);
			}
		} );

		panels.forEach( ( panel ) => {
			const slot = panel.getAttribute( 'data-slot' );
			if ( toggleId && ( slot === 'a' || slot === 'b' ) ) {
				panel.id = `${ toggleId }-${ slot }`;
			}
		} );

		buttons.forEach( ( button ) => {
			button.addEventListener( 'click', () => {
				const target = button.getAttribute( 'data-toggle-target' );
				if ( target === 'a' || target === 'b' ) {
					setActive( wrapper, target );
				}
			} );

			button.addEventListener( 'keydown', ( event: KeyboardEvent ) => {
				if (
					event.key !== 'ArrowLeft' &&
					event.key !== 'ArrowRight'
				) {
					return;
				}

				event.preventDefault();
				const next = event.key === 'ArrowRight' ? 'b' : 'a';
				setActive( wrapper, next );
				const focus = wrapper.querySelector< HTMLButtonElement >(
					`${ BUTTONS }[data-toggle-target="${ next }"]`
				);
				focus?.focus();
			} );
		} );

		const track = wrapper.querySelector< HTMLElement >( TRACK );
		track?.addEventListener( 'click', () => {
			const current = wrapper.getAttribute( 'data-active' ) === 'b' ? 'b' : 'a';
			setActive( wrapper, current === 'a' ? 'b' : 'a' );
		} );

		updateIndicator( wrapper );
		window.addEventListener( 'resize', () => updateIndicator( wrapper ) );
	}

	function initAll(): void {
		document
			.querySelectorAll< HTMLElement >(
				'.aegis-toggle:not([' + INIT_FLAG + '])'
			)
			.forEach( initToggle );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAll );
	} else {
		initAll();
	}
} )();
