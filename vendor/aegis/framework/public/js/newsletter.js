( function () {
	'use strict';

	function init() {
		const forms = document.querySelectorAll(
			'form.is-style-newsletter, .wp-block-search.is-style-newsletter'
		);

		if ( ! forms.length ) {
			return;
		}

		forms.forEach( function ( form ) {
			if ( ! ( form instanceof HTMLFormElement ) ) {
				return;
			}

			form.addEventListener( 'submit', function ( event ) {
				event.preventDefault();

				const input = form.querySelector(
					'input[name="newsletter"], .wp-block-search__input'
				);

				if ( ! ( input instanceof HTMLInputElement ) ) {
					return;
				}

				if ( typeof input.reportValidity === 'function' && ! input.reportValidity() ) {
					return;
				}

				const email = input.value.trim();

				if ( ! email ) {
					return;
				}

				form.dispatchEvent(
					new CustomEvent( 'aegis-newsletter-submit', {
						bubbles: true,
						detail: { email: email },
					} )
				);

				if ( form.getAttribute( 'data-aegis-newsletter-success' ) !== 'true' ) {
					return;
				}

				form.classList.add( 'aegis-newsletter--success' );

				const status = form.querySelector( '.aegis-newsletter__success' );

				if ( status instanceof HTMLElement ) {
					status.hidden = false;
					status.textContent =
						form.getAttribute( 'data-aegis-newsletter-success-text' ) || '';
				}

				input.disabled = true;

				const button = form.querySelector( '.wp-block-search__button' );

				if ( button instanceof HTMLButtonElement ) {
					button.disabled = true;
				}
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
