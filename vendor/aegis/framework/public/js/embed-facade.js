( function () {
	'use strict';

	function getSafeEmbedSrc( rawSrc ) {
		if ( ! rawSrc ) {
			return null;
		}

		try {
			const parsedUrl = new URL( rawSrc, window.location.href );

			if ( parsedUrl.protocol !== 'https:' && parsedUrl.protocol !== 'http:' ) {
				return null;
			}

			return parsedUrl.href;
		} catch ( e ) {
			return null;
		}
	}

	function activateEmbed( button ) {
		const wrapper = button.closest( '.aegis-embed__wrapper' );

		if ( ! wrapper ) {
			return;
		}

		const src = getSafeEmbedSrc( button.getAttribute( 'data-embed-src' ) );

		if ( ! src ) {
			return;
		}

		const facade = wrapper.querySelector( '.aegis-embed__facade' );
		const player = wrapper.querySelector( '.aegis-embed__player' );

		if ( ! player ) {
			return;
		}

		const iframe = document.createElement( 'iframe' );
		iframe.src = src;
		iframe.title = button.getAttribute( 'aria-label' ) || 'Embedded content';
		iframe.loading = 'lazy';
		iframe.allowFullscreen = true;
		iframe.setAttribute(
			'allow',
			'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
		);
		iframe.setAttribute( 'referrerpolicy', 'strict-origin-when-cross-origin' );

		player.appendChild( iframe );
		player.hidden = false;

		if ( facade ) {
			facade.remove();
		}

		iframe.focus();
	}

	function initEmbeds() {
		document.querySelectorAll( '.aegis-embed__activate' ).forEach( function ( button ) {
			button.addEventListener( 'click', function () {
				activateEmbed( button );
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initEmbeds );
	} else {
		initEmbeds();
	}
} )();
