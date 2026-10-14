( function () {
	'use strict';

	const config =
		window.aegis && window.aegis.wcLightbox ? window.aegis.wcLightbox : {};

	const CLASS_OVERLAY = 'wp-lightbox-overlay aegis-wc-lightbox-overlay';

	function galleries() {
		return Array.from(
			document.querySelectorAll(
				'.woocommerce-product-gallery, .aegis-wc-lightbox-gallery .woocommerce-product-gallery'
			)
		);
	}

	function slideImages( gallery ) {
		const slides = Array.from(
			gallery.querySelectorAll( '.woocommerce-product-gallery__image' )
		).filter( ( slide ) => ! slide.closest( '.flex-control-nav' ) );

		const seen = new Set();
		const items = [];

		slides.forEach( ( slide ) => {
			const img = slide.querySelector( 'img' );
			if ( ! img ) {
				return;
			}

			const src =
				img.getAttribute( 'data-large_image' ) ||
				img.getAttribute( 'data-src' ) ||
				img.currentSrc ||
				img.src;

			if ( ! src || seen.has( src ) ) {
				return;
			}

			seen.add( src );
			items.push( {
				src: src,
				srcset: img.getAttribute( 'srcset' ) || '',
				alt: img.getAttribute( 'alt' ) || '',
				width: img.getAttribute( 'data-large_image_width' ) || '',
				height: img.getAttribute( 'data-large_image_height' ) || '',
			} );
		} );

		return items;
	}

	function indexFromTarget( gallery, target ) {
		const slide = target.closest( '.woocommerce-product-gallery__image' );
		if ( ! slide ) {
			return 0;
		}

		const img = slide.querySelector( 'img' );
		if ( ! img ) {
			return 0;
		}

		const src =
			img.getAttribute( 'data-large_image' ) ||
			img.getAttribute( 'data-src' ) ||
			img.currentSrc ||
			img.src;

		const items = slideImages( gallery );
		const index = items.findIndex( ( item ) => item.src === src );
		return index >= 0 ? index : 0;
	}

	function openLightbox( gallery, startIndex ) {
		const items = slideImages( gallery );
		if ( ! items.length ) {
			return;
		}

		let current = Math.max( 0, Math.min( startIndex, items.length - 1 ) );

		const overlay = document.createElement( 'div' );
		overlay.className = CLASS_OVERLAY + ' active';
		overlay.setAttribute( 'role', 'dialog' );
		overlay.setAttribute( 'aria-modal', 'true' );
		overlay.setAttribute(
			'aria-label',
			config.dialogLabel || 'Enlarged images'
		);
		overlay.tabIndex = -1;

		const scrim = document.createElement( 'div' );
		scrim.className = 'scrim';
		scrim.setAttribute( 'aria-hidden', 'true' );
		overlay.appendChild( scrim );

		const closeBtn = document.createElement( 'button' );
		closeBtn.type = 'button';
		closeBtn.className = 'wp-lightbox-close-button';
		closeBtn.setAttribute( 'aria-label', config.closeLabel || 'Close' );
		closeBtn.innerHTML =
			'<span class="wp-lightbox-close-icon">' +
			( config.closeIcon || '' ) +
			'</span>';
		overlay.appendChild( closeBtn );

		let prevBtn = null;
		let nextBtn = null;

		if ( items.length > 1 ) {
			prevBtn = document.createElement( 'button' );
			prevBtn.type = 'button';
			prevBtn.className =
				'wp-lightbox-navigation-button wp-lightbox-navigation-button-prev';
			prevBtn.setAttribute( 'aria-label', config.prevLabel || 'Previous' );
			prevBtn.innerHTML =
				'<span class="wp-lightbox-navigation-icon">' +
				( config.prevIcon || '' ) +
				'</span>';
			overlay.appendChild( prevBtn );

			nextBtn = document.createElement( 'button' );
			nextBtn.type = 'button';
			nextBtn.className =
				'wp-lightbox-navigation-button wp-lightbox-navigation-button-next';
			nextBtn.setAttribute( 'aria-label', config.nextLabel || 'Next' );
			nextBtn.innerHTML =
				'<span class="wp-lightbox-navigation-icon">' +
				( config.nextIcon || '' ) +
				'</span>';
			overlay.appendChild( nextBtn );
		}

		const container = document.createElement( 'div' );
		container.className = 'lightbox-image-container';
		container.style.setProperty( '--wp--lightbox-container-width', 'min(92vw, 1200px)' );
		container.style.setProperty( '--wp--lightbox-container-height', 'min(88vh, 900px)' );

		const figure = document.createElement( 'figure' );
		figure.className = 'wp-block-image';

		const img = document.createElement( 'img' );
		img.alt = '';
		img.style.setProperty( '--wp--lightbox-image-width', 'auto' );
		img.style.setProperty( '--wp--lightbox-image-height', 'auto' );
		img.style.maxWidth = 'min(92vw, 1200px)';
		img.style.maxHeight = 'min(88vh, 900px)';
		img.style.width = 'auto';
		img.style.height = 'auto';
		img.style.objectFit = 'contain';

		figure.appendChild( img );
		container.appendChild( figure );
		overlay.appendChild( container );

		const live = document.createElement( 'div' );
		live.className = 'screen-reader-text';
		live.setAttribute( 'aria-live', 'polite' );
		live.setAttribute( 'aria-atomic', 'true' );
		overlay.appendChild( live );

		function update() {
			const item = items[ current ];
			img.src = item.src;
			if ( item.srcset ) {
				img.srcset = item.srcset;
			} else {
				img.removeAttribute( 'srcset' );
			}
			img.alt = item.alt || '';
			live.textContent =
				'Image ' + ( current + 1 ) + ' of ' + items.length;
		}

		function navigate( delta ) {
			current = ( current + delta + items.length ) % items.length;
			update();
		}

		function close() {
			overlay.classList.remove( 'active' );
			overlay.classList.add( 'show-closing-animation' );
			document.removeEventListener( 'keydown', onKey );
			document.body.style.overflow = '';
			window.setTimeout( function () {
				overlay.remove();
			}, 200 );
		}

		function onKey( event ) {
			switch ( event.key ) {
				case 'Escape':
					event.preventDefault();
					close();
					break;
				case 'ArrowLeft':
					if ( items.length > 1 ) {
						event.preventDefault();
						navigate( -1 );
					}
					break;
				case 'ArrowRight':
					if ( items.length > 1 ) {
						event.preventDefault();
						navigate( 1 );
					}
					break;
			}
		}

		closeBtn.addEventListener( 'click', function ( event ) {
			event.stopPropagation();
			close();
		} );

		if ( prevBtn ) {
			prevBtn.addEventListener( 'click', function ( event ) {
				event.stopPropagation();
				navigate( -1 );
			} );
		}

		if ( nextBtn ) {
			nextBtn.addEventListener( 'click', function ( event ) {
				event.stopPropagation();
				navigate( 1 );
			} );
		}

		overlay.addEventListener( 'click', function ( event ) {
			if (
				event.target === overlay ||
				event.target === scrim ||
				event.target === container ||
				event.target === figure
			) {
				close();
			}
		} );

		document.addEventListener( 'keydown', onKey );
		document.body.style.overflow = 'hidden';
		document.body.appendChild( overlay );
		update();
		closeBtn.focus();
	}

	function onGalleryClick( event ) {
		const gallery = event.currentTarget;
		const trigger = event.target.closest(
			'.aegis-wc-lightbox-trigger, .aegis-wc-lightbox a, .woocommerce-product-gallery__image a'
		);

		if ( ! trigger || ! gallery.contains( trigger ) ) {
			return;
		}

		// Ignore thumbnail strip clicks that only switch the main slide.
		if ( trigger.closest( '.flex-control-nav' ) ) {
			return;
		}

		event.preventDefault();
		event.stopPropagation();

		openLightbox( gallery, indexFromTarget( gallery, trigger ) );
	}

	function bindGallery( gallery ) {
		if ( gallery.getAttribute( 'data-aegis-wc-lightbox' ) === '1' ) {
			return;
		}

		gallery.setAttribute( 'data-aegis-wc-lightbox', '1' );
		gallery.classList.add( 'aegis-wc-lightbox-gallery' );
		gallery.addEventListener( 'click', onGalleryClick );
	}

	function init() {
		galleries().forEach( bindGallery );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}

	document.addEventListener( 'wc-product-gallery-after-init', init );
} )();
