( function() {
	'use strict';

	const scrollBtn = document.querySelector( '.ae-scroll-up' );

	function trackScroll() {
		const scrolled = window.pageYOffset;
		const coords = '100';

		if ( scrolled > coords ) {
			scrollBtn.style.opacity = '1';
			scrollBtn.style.visibility = 'visible';
		}

		if ( scrolled < coords ) {
			scrollBtn.style.opacity = '0';
			scrollBtn.style.visibility = 'hidden';
		}
	};

	// Function to animate the scroll.
	function smoothScroll(anchor, duration) {
		// Calculate how far and how fast to scroll
		const startLocation = window.pageYOffset;
		const endLocation = document.body.offsetTop;
		const distance = endLocation - startLocation;
		const increments = distance/(duration/16);

		// Scroll the page by an increment, and check if it is time to stop.
		function animateScroll() {
			window.scrollBy(0, increments);
			stopAnimation();
		};

		// Stop animation when you reach the anchor OR the top of the page.
		const stopAnimation = function () {
			const travelled = window.pageYOffset;
			if ( travelled <= (endLocation || 0) ) {
				clearInterval(runAnimation);
				document.activeElement.blur();
			}
		};

		// Loop the animation function.
		const runAnimation = setInterval( animateScroll, 16 );
	};

	if ( scrollBtn ) {
		// Show the button when scrolling down.
		window.addEventListener( 'scroll', trackScroll );

		// Scroll back to top when clicked.
		scrollBtn.addEventListener( 'click', function( e ) {
			e.preventDefault();
			smoothScroll( document.body, scrollBtn.getAttribute( 'data-scroll-speed' ) || 400 );
		}, false );
	}

}() );
