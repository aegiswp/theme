/**
 * Slider Block - Frontend View Script
 *
 * Initializes Splide.js instances for all slider blocks on the page.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare const Splide: any;
declare const splide: { Extensions: Record<string, any> };

interface SliderConfig {
	type: string;
	perPage: number;
	perMove: number;
	autoplay: boolean;
	pauseOnHover: boolean;
	loop: boolean;
	drag: boolean | string;
	showArrows: boolean;
	showDots: boolean;
	speed: number;
	interval: number;
	direction: string;
	height: string;
	breakpoints: boolean;
	gap: string;
	lightbox: boolean;
}

( function () {
	'use strict';

	function parseConfig( el: HTMLElement ): SliderConfig {
		return {
			type: el.getAttribute( 'data-type' ) || 'slider',
			perPage: parseInt( el.getAttribute( 'data-per-page' ) || '3', 10 ),
			perMove: parseInt( el.getAttribute( 'data-per-move' ) || '1', 10 ),
			autoplay: el.getAttribute( 'data-autoplay' ) === 'true',
			pauseOnHover: el.getAttribute( 'data-pause-on-hover' ) !== 'false',
			loop: el.getAttribute( 'data-loop' ) === 'true',
			drag: el.getAttribute( 'data-drag' ) === 'true',
			showArrows: el.getAttribute( 'data-show-arrows' ) !== 'false',
			showDots: el.getAttribute( 'data-show-dots' ) !== 'false',
			speed: parseInt( el.getAttribute( 'data-speed' ) || '400', 10 ),
			interval: parseInt( el.getAttribute( 'data-interval' ) || '5000', 10 ),
			direction: el.getAttribute( 'data-direction' ) || 'ltr',
			height: el.getAttribute( 'data-height' ) || '',
			breakpoints: el.getAttribute( 'data-breakpoints' ) !== 'false',
			gap: el.getAttribute( 'data-gap' ) || '0',
			lightbox: el.getAttribute( 'data-lightbox' ) === 'true',
		};
	}

	function initSlider( el: HTMLElement ): void {
		// Performance: skip already-initialized sliders.
		if ( el.hasAttribute( 'data-aegis-slider-init' ) ) {
			return;
		}

		// Guard: ensure Splide is available.
		if ( typeof Splide === 'undefined' ) {
			return;
		}

		const config = parseConfig( el );
		const isMarquee = config.type === 'marquee';

		let options: Record<string, any>;

		if ( isMarquee ) {
			options = {
				type: 'loop',
				perPage: config.perPage,
				pauseOnHover: config.pauseOnHover,
				arrows: false,
				pagination: false,
				gap: config.gap === '0' ? 0 : config.gap,
				autoScroll: {
					speed: config.speed / 1000,
					autoStart: config.autoplay,
				},
				breakpoints: config.breakpoints
					? {
						782: { perPage: Math.max( 1, Math.floor( config.perPage / 1.5 ) ) },
						512: { perPage: Math.max( 1, Math.floor( config.perPage / 2 ) ) },
					}
					: {},
				direction: config.direction,
				height: config.height || undefined,
			};
		} else {
			options = {
				type: config.loop ? 'loop' : 'slide',
				perPage: config.perPage,
				perMove: config.perMove,
				autoplay: config.autoplay,
				pauseOnHover: config.pauseOnHover,
				rewind: true,
				snap: true,
				drag: config.drag,
				gap: config.gap === '0' ? 0 : config.gap,
				pagination: config.showDots,
				focus: 0,
				arrows: config.showArrows,
				speed: config.speed,
				interval: config.interval,
				easing: 'linear',
				breakpoints: config.breakpoints
					? {
						782: {
							perPage: config.perPage > 1 ? 2 : 1,
							perMove: config.perMove > 1 ? 2 : 1,
						},
						512: { perPage: 1, perMove: 1 },
					}
					: {},
				arrowPath: 'M13.4 1 9.5 4.2 24.1 20 9.5 35.8l3.8 3.2 17.1-19-17-19z',
				direction: config.direction,
				height: config.height || undefined,
			};
		}

		const instance = new Splide( el, options );
		const extensions = isMarquee && window?.splide?.Extensions ? window.splide.Extensions : {};

		// Accessibility: announce slide changes to screen readers.
		const liveRegion = el.querySelector( '.splide__sr' ) as HTMLElement | null;
		if ( liveRegion ) {
			instance.on( 'moved', ( index: number ) => {
				const total = instance.Components.Slides.getLength( true );
				liveRegion.textContent = `Slide ${ index + 1 } of ${ total }`;
			} );
		}

		instance.mount( extensions );
		el.setAttribute( 'data-aegis-slider-init', 'true' );

		// Lightbox mode: open images in the Aegis lightbox overlay on click.
		if ( config.lightbox ) {
			initSliderLightbox( el, instance );
		}
	}

	/**
	 * Initialize lightbox behavior for a slider instance.
	 *
	 * Collects all slide images, injects data-lightbox-group attributes so
	 * the AegisLightbox (image-lightbox.js) can handle gallery navigation,
	 * and opens the lightbox on slide image click.
	 *
	 * @param el       The slider root element.
	 * @param instance The Splide instance.
	 */
	function initSliderLightbox( el: HTMLElement, instance: any ): void {
		const sliderId = el.id || `slider-${ Math.random().toString( 36 ).slice( 2, 9 ) }`;

		// Tag each slide's images with lightbox data attributes for AegisLightbox.
		const slides = el.querySelectorAll<HTMLElement>( '.splide__slide' );
		slides.forEach( ( slide ) => {
			const imgs = slide.querySelectorAll<HTMLElement>( 'figure.wp-block-image, img' );
			imgs.forEach( ( img ) => {
				// Wrap bare <img> in a virtual figure context for the lightbox.
				const figure = img.closest( 'figure' ) || img;
				figure.setAttribute( 'data-lightbox-group', sliderId );
				figure.setAttribute( 'data-lightbox-zoom', 'true' );
				figure.setAttribute( 'data-lightbox-swipe', 'true' );

				// Extract caption if available.
				const figcaption = figure.querySelector( 'figcaption' );
				if ( figcaption && figcaption.textContent?.trim() ) {
					figure.setAttribute( 'data-lightbox-caption', figcaption.textContent.trim() );
				}
			} );
		} );

		// On slide click, simulate a click on the image to trigger the WP lightbox
		// or the AegisLightbox overlay if the image has lightbox behavior.
		el.addEventListener( 'click', ( e: Event ) => {
			const target = e.target as HTMLElement;
			const slide = target.closest( '.splide__slide' );
			if ( ! slide ) {
				return;
			}

			// Don't interfere with arrow/pagination clicks.
			if ( target.closest( '.splide__arrow' ) || target.closest( '.splide__pagination' ) ) {
				return;
			}

			const img = slide.querySelector( 'img' ) as HTMLImageElement | null;
			if ( ! img ) {
				return;
			}

			// Build and open a lightweight lightbox overlay.
			openSliderLightbox( el, instance, img, sliderId );
		} );
	}

	/**
	 * Open the Aegis lightbox overlay for a slider image.
	 *
	 * Creates a fullscreen overlay reusing the same CSS classes as the
	 * image-lightbox.css styles, with navigation synced to the Splide instance.
	 *
	 * @param el       The slider root element.
	 * @param instance The Splide instance.
	 * @param img      The clicked image element.
	 * @param groupId  The lightbox group identifier.
	 */
	function openSliderLightbox( el: HTMLElement, instance: any, img: HTMLImageElement, groupId: string ): void {
		// Collect all slide images.
		const allImages: { src: string; srcset: string; sizes: string; alt: string; caption: string }[] = [];
		el.querySelectorAll( '.splide__slide' ).forEach( ( slide ) => {
			const slideImg = slide.querySelector( 'img' ) as HTMLImageElement | null;
			if ( slideImg ) {
				const figure = slideImg.closest( 'figure' );
				const caption = figure?.getAttribute( 'data-lightbox-caption' ) || '';
				allImages.push( {
					src: slideImg.src,
					srcset: slideImg.srcset || '',
					sizes: slideImg.sizes || '',
					alt: slideImg.alt || '',
					caption,
				} );
			}
		} );

		if ( allImages.length === 0 ) {
			return;
		}

		// Find the index of the clicked image.
		let currentIndex = allImages.findIndex( ( item ) => item.src === img.src );
		if ( currentIndex < 0 ) {
			currentIndex = instance.index || 0;
		}

		// Create overlay.
		const overlay = document.createElement( 'div' );
		overlay.className = 'wp-lightbox-overlay aegis-slider-lightbox active';
		overlay.setAttribute( 'role', 'dialog' );
		overlay.setAttribute( 'aria-modal', 'true' );
		overlay.setAttribute( 'aria-label', 'Image lightbox' );

		// Image container.
		const imgContainer = document.createElement( 'div' );
		imgContainer.className = 'wp-block-image';

		const overlayImg = document.createElement( 'img' );
		overlayImg.src = allImages[ currentIndex ].src;
		overlayImg.srcset = allImages[ currentIndex ].srcset;
		overlayImg.sizes = allImages[ currentIndex ].sizes;
		overlayImg.alt = allImages[ currentIndex ].alt;
		imgContainer.appendChild( overlayImg );
		overlay.appendChild( imgContainer );

		// Close button.
		const closeBtn = document.createElement( 'button' );
		closeBtn.className = 'close-button';
		closeBtn.type = 'button';
		closeBtn.setAttribute( 'aria-label', 'Close lightbox' );
		closeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
		overlay.appendChild( closeBtn );

		// Navigation arrows (if more than 1 image).
		let prevBtn: HTMLButtonElement | null = null;
		let nextBtn: HTMLButtonElement | null = null;

		if ( allImages.length > 1 ) {
			prevBtn = document.createElement( 'button' );
			prevBtn.className = 'aegis-lightbox-nav aegis-lightbox-prev';
			prevBtn.type = 'button';
			prevBtn.setAttribute( 'aria-label', 'Previous image' );
			prevBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>';
			overlay.appendChild( prevBtn );

			nextBtn = document.createElement( 'button' );
			nextBtn.className = 'aegis-lightbox-nav aegis-lightbox-next';
			nextBtn.type = 'button';
			nextBtn.setAttribute( 'aria-label', 'Next image' );
			nextBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg>';
			overlay.appendChild( nextBtn );
		}

		// Counter.
		const counter = document.createElement( 'div' );
		counter.className = 'aegis-lightbox-counter';
		counter.setAttribute( 'aria-hidden', 'true' );
		overlay.appendChild( counter );

		// Caption.
		const captionEl = document.createElement( 'div' );
		captionEl.className = 'aegis-lightbox-caption';
		captionEl.setAttribute( 'aria-live', 'polite' );
		overlay.appendChild( captionEl );

		// Live region for screen readers.
		const liveRegion = document.createElement( 'div' );
		liveRegion.setAttribute( 'role', 'status' );
		liveRegion.setAttribute( 'aria-live', 'polite' );
		liveRegion.setAttribute( 'aria-atomic', 'true' );
		liveRegion.style.cssText = 'position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);white-space:nowrap;';
		overlay.appendChild( liveRegion );

		function updateUI(): void {
			const item = allImages[ currentIndex ];
			overlayImg.src = item.src;
			overlayImg.srcset = item.srcset;
			overlayImg.sizes = item.sizes;
			overlayImg.alt = item.alt;
			counter.textContent = `${ currentIndex + 1 } / ${ allImages.length }`;
			captionEl.textContent = item.caption;
			captionEl.style.display = item.caption ? '' : 'none';
			liveRegion.textContent = '';
			requestAnimationFrame( () => {
				liveRegion.textContent = `Image ${ currentIndex + 1 } of ${ allImages.length }${ item.caption ? ': ' + item.caption : '' }`;
			} );

			// Sync the Splide slider position.
			if ( instance && typeof instance.go === 'function' ) {
				instance.go( currentIndex );
			}
		}

		function navigate( direction: number ): void {
			currentIndex = ( currentIndex + direction + allImages.length ) % allImages.length;
			updateUI();
		}

		function closeOverlay(): void {
			overlay.remove();
			document.removeEventListener( 'keydown', onKeydown );
			document.body.style.overflow = '';
		}

		function onKeydown( e: KeyboardEvent ): void {
			switch ( e.key ) {
				case 'Escape':
					e.preventDefault();
					closeOverlay();
					break;
				case 'ArrowLeft':
					e.preventDefault();
					navigate( -1 );
					break;
				case 'ArrowRight':
					e.preventDefault();
					navigate( 1 );
					break;
			}
		}

		// Event listeners.
		closeBtn.addEventListener( 'click', ( e ) => {
			e.stopPropagation();
			closeOverlay();
		} );

		overlay.addEventListener( 'click', ( e ) => {
			if ( e.target === overlay || e.target === imgContainer ) {
				closeOverlay();
			}
		} );

		if ( prevBtn ) {
			prevBtn.addEventListener( 'click', ( e ) => {
				e.stopPropagation();
				navigate( -1 );
			} );
		}

		if ( nextBtn ) {
			nextBtn.addEventListener( 'click', ( e ) => {
				e.stopPropagation();
				navigate( 1 );
			} );
		}

		document.addEventListener( 'keydown', onKeydown );
		document.body.style.overflow = 'hidden';
		document.body.appendChild( overlay );

		updateUI();
		closeBtn.focus();
	}

	function initAllSliders(): void {
		const sliders = document.querySelectorAll<HTMLElement>( '.wp-block-aegis-slider' );
		sliders.forEach( initSlider );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAllSliders );
	} else {
		initAllSliders();
	}
} )();
