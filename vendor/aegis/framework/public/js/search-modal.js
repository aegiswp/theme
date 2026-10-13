(() => {
	const OPEN_SELECTOR = '.search-toggle button, .search-toggle a';
	const CLOSE_SELECTOR = '.search-close button, .search-close a';

	const getModals = () => document.querySelectorAll( '.search-modal' );
	const getToggles = () => document.querySelectorAll( '.search-toggle' );
	const getCloses = () => document.querySelectorAll( '.search-close' );

	const setHidden = ( element, hidden ) => {
		element.classList.toggle( 'has-display-none', hidden );
	};

	const open = () => {
		getModals().forEach( ( modal ) => {
			setHidden( modal, false );
			modal.setAttribute( 'aria-hidden', 'false' );
		} );
		getToggles().forEach( ( toggle ) => {
			setHidden( toggle, true );
			if ( toggle.firstElementChild ) {
				setHidden( toggle.firstElementChild, true );
			}
		} );
		getCloses().forEach( ( close ) => {
			setHidden( close, false );
			if ( close.parentElement ) {
				setHidden( close.parentElement, false );
			}
		} );
		document.body.classList.add( 'search-modal-open' );

		const input = document.querySelector(
			'.search-modal input[type="search"], .search-modal input'
		);
		if ( input ) {
			input.focus();
		}
	};

	const close = () => {
		getModals().forEach( ( modal ) => {
			setHidden( modal, true );
			modal.setAttribute( 'aria-hidden', 'true' );
		} );
		getToggles().forEach( ( toggle ) => {
			setHidden( toggle, false );
			if ( toggle.firstElementChild ) {
				setHidden( toggle.firstElementChild, false );
			}
		} );
		getCloses().forEach( ( closeBtn ) => {
			setHidden( closeBtn, true );
			if ( closeBtn.parentElement ) {
				setHidden( closeBtn.parentElement, true );
			}
		} );
		document.body.classList.remove( 'search-modal-open' );

		const opener = document.querySelector( OPEN_SELECTOR );
		if ( opener ) {
			opener.focus();
		}
	};

	const bindButton = ( button, handler ) => {
		button.removeAttribute( 'onclick' );
		if ( button.tagName === 'BUTTON' ) {
			button.setAttribute( 'type', 'button' );
		}
		button.addEventListener( 'click', ( event ) => {
			event.preventDefault();
			handler();
		} );
	};

	const init = () => {
		const modals = getModals();
		if ( ! modals.length ) {
			return;
		}

		modals.forEach( ( modal ) => {
			if ( ! modal.getAttribute( 'role' ) ) {
				modal.setAttribute( 'role', 'dialog' );
			}
			if ( ! modal.hasAttribute( 'aria-modal' ) ) {
				modal.setAttribute( 'aria-modal', 'true' );
			}
			if (
				! modal.hasAttribute( 'aria-label' ) &&
				! modal.hasAttribute( 'aria-labelledby' )
			) {
				const label =
					window.wp &&
					window.wp.i18n &&
					typeof window.wp.i18n.__ === 'function'
						? window.wp.i18n.__( 'Search', 'aegis' )
						: 'Search';
				modal.setAttribute( 'aria-label', label );
			}
			if ( ! modal.hasAttribute( 'aria-hidden' ) ) {
				modal.setAttribute(
					'aria-hidden',
					modal.classList.contains( 'has-display-none' ) ? 'true' : 'false'
				);
			}

			modal.addEventListener( 'click', ( event ) => {
				if ( modal.classList.contains( 'has-display-none' ) ) {
					return;
				}
				if ( event.target.closest( '.wp-block-search, form' ) ) {
					return;
				}
				close();
			} );

			modal.addEventListener( 'keydown', ( event ) => {
				if ( event.key !== 'Tab' || modal.classList.contains( 'has-display-none' ) ) {
					return;
				}
				const focusable = modal.querySelectorAll(
					'input,button,a[href],textarea,select,[tabindex]:not([tabindex="-1"])'
				);
				if ( ! focusable.length ) {
					return;
				}
				const first = focusable[ 0 ];
				const last = focusable[ focusable.length - 1 ];
				if ( event.shiftKey && document.activeElement === first ) {
					event.preventDefault();
					last.focus();
				} else if ( ! event.shiftKey && document.activeElement === last ) {
					event.preventDefault();
					first.focus();
				}
			} );
		} );

		document.querySelectorAll( OPEN_SELECTOR ).forEach( ( button ) => {
			bindButton( button, open );
		} );

		document.querySelectorAll( CLOSE_SELECTOR ).forEach( ( button ) => {
			bindButton( button, close );
		} );

		document.addEventListener( 'keydown', ( event ) => {
			if ( event.key !== 'Escape' ) {
				return;
			}
			for ( const modal of modals ) {
				if ( ! modal.classList.contains( 'has-display-none' ) ) {
					close();
					break;
				}
			}
		} );
	};

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();
