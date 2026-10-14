document.addEventListener( 'DOMContentLoaded', () => {
	const reduced = window.matchMedia( '(prefers-reduced-motion)' );

	if ( reduced && reduced.matches ) {
		return;
	}

	const counters = [ ...document.querySelectorAll( '.is-style-counter' ) ].filter(
		( el ) => el.hasAttribute( 'data-end' )
	);

	if ( ! counters.length ) {
		return;
	}

	const rootMargin =
		window?.aegis?.animationOffset ?? '0px 0px 50px 0px';

	function animate( el ) {
		const start = parseFloat( el.getAttribute( 'data-start' ) || '0' );
		const end = parseFloat( el.getAttribute( 'data-end' ) || '0' );
		const delay = parseFloat( el.getAttribute( 'data-delay' ) || '0' ) || 0;
		const duration = parseFloat( el.getAttribute( 'data-duration' ) || '0' ) || 1;

		el.textContent = String( start );

		if ( start === end ) {
			return;
		}

		const step = ( end - start ) / Math.abs( end - start );
		const intervalMs = Math.max(
			16,
			Math.ceil( ( 1000 * duration ) / Math.abs( end - start ) )
		);

		window.setTimeout( () => {
			let current = start;
			const timer = window.setInterval( () => {
				current += step;
				if ( ( step > 0 && current >= end ) || ( step < 0 && current <= end ) ) {
					current = end;
					window.clearInterval( timer );
				}
				el.textContent = String( current );
			}, intervalMs );
		}, 1000 * delay );
	}

	function startCounter( el ) {
		if ( el.getAttribute( 'data-animated' ) === 'true' ) {
			return;
		}
		el.setAttribute( 'data-animated', 'true' );
		animate( el );
	}

	const observer = new IntersectionObserver(
		( entries ) => {
			entries.forEach( ( entry ) => {
				if ( ! entry.target || ! entry.isIntersecting ) {
					return;
				}
				startCounter( entry.target );
				observer.unobserve( entry.target );
			} );
		},
		{ rootMargin }
	);

	counters.forEach( ( el ) => {
		if ( el.getAttribute( 'data-intersection' ) === 'false' ) {
			startCounter( el );
			return;
		}
		observer.observe( el );
	} );
} );
