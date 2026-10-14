/**
 * Slider Block - Frontend View Script
 *
 * Initializes Splide.js instances for all slider blocks on the page.
 *
 * @package
 * @since   1.0.0
 */

declare const Splide: any;

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
	keyboard: boolean;
	gap: string;
	lightbox: boolean;
	lazyLoad: boolean;
	lazyPreload: number;
	proLazyThreshold: number;
	proFade: boolean;
	proWheel: boolean;
}

( function () {
	'use strict';

	function parseProConfig( el: HTMLElement ): Record< string, any > | null {
		const raw = el.getAttribute( 'data-slider-pro' );

		if ( ! raw ) {
			return null;
		}

		try {
			return JSON.parse( raw );
		} catch {
			return null;
		}
	}

	function parseProLazyConfig( el: HTMLElement ): {
		enabled: boolean;
		threshold: number;
	} {
		const config = parseProConfig( el );

		if ( ! config ) {
			return { enabled: false, threshold: 1 };
		}

		return {
			enabled: Boolean( config?.lazyLoad?.enabled ),
			threshold: parseInt(
				String( config?.lazyLoad?.threshold ?? 1 ),
				10
			),
		};
	}

	function parseConfig( el: HTMLElement ): SliderConfig {
		const pro = parseProConfig( el );
		const proLazy = parseProLazyConfig( el );
		const lazyLoad =
			el.getAttribute( 'data-lazy-load' ) === 'true' || proLazy.enabled;
		const proFade = Boolean(
			pro?.effects?.enabled && pro?.effects?.effect === 'fade'
		);
		const type = el.getAttribute( 'data-type' ) || 'slider';

		return {
			type: proFade ? 'fade' : type,
			perPage: parseInt( el.getAttribute( 'data-per-page' ) || '1', 10 ),
			perMove: parseInt( el.getAttribute( 'data-per-move' ) || '1', 10 ),
			autoplay: el.getAttribute( 'data-autoplay' ) === 'true',
			pauseOnHover: el.getAttribute( 'data-pause-on-hover' ) !== 'false',
			loop: el.getAttribute( 'data-loop' ) === 'true',
			drag: el.getAttribute( 'data-drag' ) === 'true',
			showArrows: el.getAttribute( 'data-show-arrows' ) !== 'false',
			showDots: el.getAttribute( 'data-show-dots' ) !== 'false',
			speed: parseInt( el.getAttribute( 'data-speed' ) || '400', 10 ),
			interval: parseInt(
				el.getAttribute( 'data-interval' ) || '5000',
				10
			),
			direction: el.getAttribute( 'data-direction' ) || 'ltr',
			height: el.getAttribute( 'data-height' ) || '',
			breakpoints: el.getAttribute( 'data-breakpoints' ) !== 'false',
			keyboard: el.getAttribute( 'data-keyboard' ) !== 'false',
			gap: el.getAttribute( 'data-gap' ) || '0',
			lightbox: el.getAttribute( 'data-lightbox' ) === 'true',
			lazyLoad,
			lazyPreload: parseInt(
				el.getAttribute( 'data-lazy-preload' ) || '1',
				10
			),
			proLazyThreshold: proLazy.threshold,
			proFade,
			proWheel: Boolean( pro?.mousewheel?.enabled ) && ! Boolean( pro?.mousewheel?.invert ),
		};
	}

	function initSlider( el: HTMLElement ): void {
		if ( el.hasAttribute( 'data-aegis-slider-init' ) ) {
			return;
		}

		if ( typeof Splide === 'undefined' ) {
			return;
		}

		const config = parseConfig( el );
		const isMarquee = config.type === 'marquee';
		const isFade = config.type === 'fade' || config.proFade;
		const prefersReducedMotion = window.matchMedia(
			'(prefers-reduced-motion: reduce)'
		).matches;
		const allowAutoplay = config.autoplay && ! prefersReducedMotion;

		let options: Record< string, any >;

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
					autoStart: allowAutoplay,
				},
				keyboard: config.keyboard ? 'focused' : false,
				breakpoints: config.breakpoints
					? {
							782: {
								perPage: Math.max(
									1,
									Math.floor( config.perPage / 1.5 )
								),
							},
							512: {
								perPage: Math.max(
									1,
									Math.floor( config.perPage / 2 )
								),
							},
					  }
					: {},
				direction: config.direction,
				height: config.height || undefined,
			};
		} else {
			options = {
				type: isFade ? 'fade' : config.loop ? 'loop' : 'slide',
				perPage: isFade ? 1 : config.perPage,
				perMove: config.perMove,
				autoplay: allowAutoplay,
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
				keyboard: config.keyboard ? 'focused' : false,
				wheel: config.proWheel,
				breakpoints: config.breakpoints
					? {
							782: {
								perPage: isFade
									? 1
									: config.perPage > 1
									? 2
									: 1,
								perMove: config.perMove > 1 ? 2 : 1,
							},
							512: { perPage: 1, perMove: 1 },
					  }
					: {},
				arrowPath:
					'M13.4 1 9.5 4.2 24.1 20 9.5 35.8l3.8 3.2 17.1-19-17-19z',
				direction: config.direction,
				height: config.height || undefined,
			};
		}

		if ( config.lazyLoad ) {
			const preloadPages = Math.max(
				1,
				config.proLazyThreshold || config.lazyPreload || 1
			);
			options.lazyLoad = 'nearby';
			options.preloadPages = preloadPages;
		}

		const instance = new Splide( el, options );
		const extensions =
			isMarquee && window?.splide?.Extensions
				? window.splide.Extensions
				: {};

		// Accessibility: announce slide changes to screen readers.
		const liveRegion = el.querySelector(
			'.splide__sr'
		) as HTMLElement | null;
		if ( liveRegion ) {
			const slideLabelTemplate =
				el.getAttribute( 'data-i18n-slide' ) || 'Slide %1$d of %2$d';
			instance.on( 'moved', ( index: number ) => {
				const total = instance.Components.Slides.getLength( true );
				liveRegion.textContent = slideLabelTemplate
					.replace( '%1$d', String( index + 1 ) )
					.replace( '%2$d', String( total ) );
			} );
		}

		instance.mount( extensions );
		el.setAttribute( 'data-aegis-slider-init', 'true' );

		// Lightbox mode: open images in the Aegis lightbox overlay on click.
		if ( config.lightbox ) {
			initSliderLightbox( el, instance );
		}
	}

	const PLACEHOLDER_GIF =
		'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

	const LIGHTBOX_ICON_CLOSE =
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';

	const LIGHTBOX_ICON_PREV =
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>';

	const LIGHTBOX_ICON_NEXT =
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 6 15 12 9 18"/></svg>';

	/**
	 * Whether an image has a real source suitable for the lightbox.
	 *
	 * Empty src attributes resolve to the page URL; 1×1 GIFs are WP placeholders.
	 *
	 * @param img Image element.
	 */
	function isLightboxableImage( img: HTMLImageElement ): boolean {
		const attrSrc = ( img.getAttribute( 'src' ) || '' ).trim();

		if ( ! attrSrc || attrSrc === '#' ) {
			return false;
		}

		if ( attrSrc === PLACEHOLDER_GIF || attrSrc.startsWith( 'data:image/svg' ) ) {
			return false;
		}

		try {
			const resolved = new URL( img.currentSrc || img.src, location.href )
				.href;
			if ( resolved === location.href || resolved === `${ location.origin }/` ) {
				return false;
			}
		} catch {
			return false;
		}

		return true;
	}

	/**
	 * Original (non-clone) slides only — loop mode duplicates slides in the DOM.
	 *
	 * @param el Slider root.
	 */
	function getOriginalSlides( el: HTMLElement ): HTMLElement[] {
		return Array.from(
			el.querySelectorAll< HTMLElement >(
				'.splide__slide:not(.splide__slide--clone)'
			)
		);
	}

	/**
	 * Collect lightboxable images from original slides (one per slide).
	 *
	 * @param el Slider root.
	 */
	function collectSliderLightboxImages( el: HTMLElement ): {
		src: string;
		srcset: string;
		sizes: string;
		alt: string;
		caption: string;
	}[] {
		const images: {
			src: string;
			srcset: string;
			sizes: string;
			alt: string;
			caption: string;
		}[] = [];

		getOriginalSlides( el ).forEach( ( slide ) => {
			const slideImg = slide.querySelector(
				'img'
			) as HTMLImageElement | null;

			if ( ! slideImg || ! isLightboxableImage( slideImg ) ) {
				return;
			}

			const figure = slideImg.closest( 'figure' );
			const caption =
				figure?.getAttribute( 'data-lightbox-caption' ) || '';

			images.push( {
				src: slideImg.currentSrc || slideImg.src,
				srcset: slideImg.srcset || '',
				sizes: slideImg.sizes || '',
				alt: slideImg.alt || '',
				caption,
			} );
		} );

		return images;
	}

	/**
	 * Initialize lightbox behavior for a slider instance.
	 *
	 * @param el       The slider root element.
	 * @param instance The Splide instance.
	 */
	function initSliderLightbox( el: HTMLElement, instance: any ): void {
		const sliderId =
			el.id || `slider-${ Math.random().toString( 36 ).slice( 2, 9 ) }`;

		getOriginalSlides( el ).forEach( ( slide ) => {
			const imgs = slide.querySelectorAll< HTMLImageElement >( 'img' );
			imgs.forEach( ( img ) => {
				if ( ! isLightboxableImage( img ) ) {
					return;
				}

				const figure = img.closest( 'figure' ) || img;
				figure.setAttribute( 'data-lightbox-group', sliderId );
				figure.setAttribute( 'data-lightbox-zoom', 'true' );
				figure.setAttribute( 'data-lightbox-swipe', 'true' );

				const figcaption = figure.querySelector( 'figcaption' );
				if ( figcaption && figcaption.textContent?.trim() ) {
					figure.setAttribute(
						'data-lightbox-caption',
						figcaption.textContent.trim()
					);
				}
			} );
		} );

		el.addEventListener( 'click', ( e: Event ) => {
			const target = e.target as HTMLElement;

			if (
				target.closest( '.splide__arrow' ) ||
				target.closest( '.splide__pagination' )
			) {
				return;
			}

			// Only open when the click is on a real slide image (not quote text, etc.).
			const clickedImg = target.closest(
				'.splide__slide:not(.splide__slide--clone) img, .splide__slide--clone img'
			) as HTMLImageElement | null;

			if ( ! clickedImg || ! isLightboxableImage( clickedImg ) ) {
				return;
			}

			e.preventDefault();
			openSliderLightbox( el, instance, clickedImg );
		} );
	}

	/**
	 * Open the slider lightbox overlay for an image.
	 *
	 * @param el       The slider root element.
	 * @param instance The Splide instance.
	 * @param img      The clicked image element.
	 */
	function openSliderLightbox(
		el: HTMLElement,
		instance: any,
		img: HTMLImageElement
	): void {
		document
			.querySelectorAll( '.wp-lightbox-overlay.aegis-slider-lightbox' )
			.forEach( ( node ) => node.remove() );

		const allImages = collectSliderLightboxImages( el );

		if ( allImages.length === 0 ) {
			return;
		}

		const clickedSrc = img.currentSrc || img.src;
		let currentIndex = allImages.findIndex(
			( item ) => item.src === clickedSrc
		);
		if ( currentIndex < 0 ) {
			currentIndex = Math.min(
				Math.max( 0, instance?.index ?? 0 ),
				allImages.length - 1
			);
		}

		const overlay = document.createElement( 'div' );
		overlay.className = 'wp-lightbox-overlay aegis-slider-lightbox active';
		overlay.setAttribute( 'role', 'dialog' );
		overlay.setAttribute( 'aria-modal', 'true' );
		overlay.setAttribute( 'aria-label', 'Image lightbox' );

		const imgContainer = document.createElement( 'div' );
		imgContainer.className = 'wp-block-image';

		const overlayImg = document.createElement( 'img' );
		overlayImg.src = allImages[ currentIndex ].src;
		overlayImg.srcset = allImages[ currentIndex ].srcset;
		overlayImg.sizes = allImages[ currentIndex ].sizes;
		overlayImg.alt = allImages[ currentIndex ].alt;
		imgContainer.appendChild( overlayImg );
		overlay.appendChild( imgContainer );

		const closeBtn = document.createElement( 'button' );
		closeBtn.className = 'close-button';
		closeBtn.type = 'button';
		closeBtn.setAttribute( 'aria-label', 'Close lightbox' );
		closeBtn.innerHTML = LIGHTBOX_ICON_CLOSE;
		overlay.appendChild( closeBtn );

		let prevBtn: HTMLButtonElement | null = null;
		let nextBtn: HTMLButtonElement | null = null;

		if ( allImages.length > 1 ) {
			prevBtn = document.createElement( 'button' );
			prevBtn.className = 'aegis-lightbox-nav aegis-lightbox-prev';
			prevBtn.type = 'button';
			prevBtn.setAttribute( 'aria-label', 'Previous image' );
			prevBtn.innerHTML = LIGHTBOX_ICON_PREV;
			overlay.appendChild( prevBtn );

			nextBtn = document.createElement( 'button' );
			nextBtn.className = 'aegis-lightbox-nav aegis-lightbox-next';
			nextBtn.type = 'button';
			nextBtn.setAttribute( 'aria-label', 'Next image' );
			nextBtn.innerHTML = LIGHTBOX_ICON_NEXT;
			overlay.appendChild( nextBtn );
		}

		const counter = document.createElement( 'div' );
		counter.className = 'aegis-lightbox-counter';
		counter.setAttribute( 'aria-hidden', 'true' );
		overlay.appendChild( counter );

		const captionEl = document.createElement( 'div' );
		captionEl.className = 'aegis-lightbox-caption';
		captionEl.setAttribute( 'aria-live', 'polite' );
		overlay.appendChild( captionEl );

		const liveRegion = document.createElement( 'div' );
		liveRegion.setAttribute( 'role', 'status' );
		liveRegion.setAttribute( 'aria-live', 'polite' );
		liveRegion.setAttribute( 'aria-atomic', 'true' );
		liveRegion.style.cssText =
			'position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);white-space:nowrap;';
		overlay.appendChild( liveRegion );

		const autoplay = instance?.Components?.Autoplay;

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
				liveRegion.textContent = `Image ${ currentIndex + 1 } of ${
					allImages.length
				}${ item.caption ? ': ' + item.caption : '' }`;
			} );

			if ( instance && typeof instance.go === 'function' ) {
				instance.go( currentIndex );
			}
		}

		function navigate( direction: number ): void {
			currentIndex =
				( currentIndex + direction + allImages.length ) %
				allImages.length;
			updateUI();
		}

		function closeOverlay(): void {
			overlay.remove();
			document.removeEventListener( 'keydown', onKeydown );
			document.body.style.overflow = '';
			autoplay?.play?.();
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
		autoplay?.pause?.();
		document.body.appendChild( overlay );

		updateUI();
		closeBtn.focus();
	}

	function whenSplideReady( callback: () => void ): void {
		if ( typeof Splide !== 'undefined' ) {
			callback();
			return;
		}

		const started = Date.now();
		const timer = window.setInterval( () => {
			if ( typeof Splide !== 'undefined' ) {
				window.clearInterval( timer );
				callback();
				return;
			}

			if ( Date.now() - started > 8000 ) {
				window.clearInterval( timer );
			}
		}, 50 );
	}

	function initAllSliders(): void {
		const sliders = document.querySelectorAll< HTMLElement >(
			'.wp-block-aegis-slider'
		);
		sliders.forEach( initSlider );
	}

	whenSplideReady( () => {
		if ( document.readyState === 'loading' ) {
			document.addEventListener( 'DOMContentLoaded', initAllSliders );
		} else {
			initAllSliders();
		}
	} );
} )();
