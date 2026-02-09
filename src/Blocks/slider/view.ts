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
