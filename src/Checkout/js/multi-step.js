/**
 * Aegis Multi-Step Checkout
 *
 * Handles step navigation for the multi-step checkout template.
 * Steps: 1 = Shipping, 2 = Payment, 3 = Review
 *
 * @package Aegis
 * @since   1.0.0
 */
( function () {
	'use strict';

	const TOTAL_STEPS = 3;
	let currentStep = 1;

	const stepIndicators = document.querySelectorAll( '.aegis-checkout-step' );
	const stepContents = [];
	const prevBtn = document.querySelector( '.aegis-checkout-prev' );
	const nextBtn = document.querySelector( '.aegis-checkout-next' );

	for ( let i = 1; i <= TOTAL_STEPS; i++ ) {
		stepContents[ i ] = document.querySelector( '.aegis-checkout-step-' + i );
	}

	if ( ! stepContents[ 1 ] || ! prevBtn || ! nextBtn ) {
		return;
	}

	const nextLabels = [
		'',
		aegisCheckout.continueToPayment,
		aegisCheckout.reviewOrder,
		''
	];

	function showStep( step ) {
		currentStep = step;

		for ( let i = 1; i <= TOTAL_STEPS; i++ ) {
			if ( stepContents[ i ] ) {
				stepContents[ i ].style.display = i === step ? '' : 'none';
			}
		}

		stepIndicators.forEach( function ( el, index ) {
			el.classList.remove( 'is-active', 'is-completed' );
			if ( index + 1 === step ) {
				el.classList.add( 'is-active' );
			} else if ( index + 1 < step ) {
				el.classList.add( 'is-completed' );
			}
		} );

		prevBtn.style.display = step === 1 ? 'none' : '';
		nextBtn.style.display = step === TOTAL_STEPS ? 'none' : '';

		if ( step < TOTAL_STEPS ) {
			const link = nextBtn.querySelector( '.wp-block-button__link' );
			if ( link ) {
				link.textContent = nextLabels[ step ] || '';
			}
		}

		window.scrollTo( { top: 0, behavior: 'smooth' } );
	}

	function validateStep( step ) {
		if ( ! stepContents[ step ] ) {
			return true;
		}

		const required = stepContents[ step ].querySelectorAll(
			'input[required], select[required], textarea[required]'
		);
		let valid = true;

		required.forEach( function ( field ) {
			if ( ! field.value.trim() ) {
				field.classList.add( 'has-error' );
				valid = false;
			} else {
				field.classList.remove( 'has-error' );
			}
		} );

		return valid;
	}

	nextBtn.addEventListener( 'click', function ( e ) {
		e.preventDefault();
		if ( currentStep < TOTAL_STEPS && validateStep( currentStep ) ) {
			showStep( currentStep + 1 );
		}
	} );

	prevBtn.addEventListener( 'click', function ( e ) {
		e.preventDefault();
		if ( currentStep > 1 ) {
			showStep( currentStep - 1 );
		}
	} );

	stepIndicators.forEach( function ( el, index ) {
		el.style.cursor = 'pointer';
		el.addEventListener( 'click', function () {
			const target = index + 1;
			if ( target < currentStep ) {
				showStep( target );
			} else if ( target > currentStep && validateStep( currentStep ) ) {
				showStep( target );
			}
		} );
	} );

	showStep( 1 );
} )();
