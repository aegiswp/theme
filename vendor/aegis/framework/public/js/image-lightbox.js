/**
 * Aegis Image Lightbox Enhancements
 *
 * Layers gallery navigation, zoom, captions, thumbnail strip, and swipe
 * gestures on top of the WordPress 6.4+ native image lightbox.
 *
 * Reads data attributes injected by Image.php::enhance_lightbox():
 * - data-lightbox-group    Gallery grouping ID
 * - data-lightbox-caption  Caption text
 * - data-lightbox-zoom     Enable pinch/scroll zoom
 * - data-lightbox-thumbnails  Enable thumbnail strip
 * - data-lightbox-swipe    Enable touch swipe navigation
 *
 * @package Aegis\Framework
 * @since   1.0.0
 */

( function() {
	'use strict';

	/** SVG arrow icons for navigation. */
	const ICON_PREV = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>';
	const ICON_NEXT = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg>';

	/**
	 * Lightbox Enhancement Controller
	 *
	 * Observes the DOM for the WordPress native lightbox overlay and
	 * enhances it with additional features based on data attributes.
	 */
	class AegisLightbox {

		constructor() {
			/** @type {HTMLElement|null} Current overlay element. */
			this.overlay = null;

			/** @type {Array<HTMLElement>} Grouped image figures. */
			this.group = [];

			/** @type {number} Current index within the group. */
			this.currentIndex = 0;

			/** @type {string} Current group ID. */
			this.groupId = '';

			/** @type {Object} Zoom state. */
			this.zoom = {
				active: false,
				scale: 1,
				translateX: 0,
				translateY: 0,
				startX: 0,
				startY: 0,
				isDragging: false,
				pinchStartDist: 0,
				pinchStartScale: 1,
			};

			/** @type {Object} Swipe tracking state. */
			this.swipe = {
				startX: 0,
				startY: 0,
				deltaX: 0,
				active: false,
			};

			/** @type {HTMLElement|null} Navigation prev button. */
			this.prevBtn = null;

			/** @type {HTMLElement|null} Navigation next button. */
			this.nextBtn = null;

			/** @type {HTMLElement|null} Caption element. */
			this.captionEl = null;

			/** @type {HTMLElement|null} Counter element. */
			this.counterEl = null;

			/** @type {HTMLElement|null} Thumbnail strip container. */
			this.thumbsEl = null;

			/** @type {HTMLElement|null} Live region for screen readers. */
			this.liveRegion = null;

			this.init();
		}

		/**
		 * Initialize the lightbox observer.
		 *
		 * Watches for the WP native lightbox overlay to appear/disappear
		 * in the DOM and hooks into it when detected.
		 */
		init() {
			const observer = new MutationObserver( ( mutations ) => {
				for ( const mutation of mutations ) {
					for ( const node of mutation.addedNodes ) {
						if ( node.nodeType === 1 && node.classList?.contains( 'wp-lightbox-overlay' ) ) {
							this.onOverlayOpen( node );
						}
					}
					for ( const node of mutation.removedNodes ) {
						if ( node.nodeType === 1 && node.classList?.contains( 'wp-lightbox-overlay' ) ) {
							this.onOverlayClose();
						}
					}
				}
			} );

			observer.observe( document.body, { childList: true, subtree: true } );

			// Also handle overlays that use visibility/class toggling instead of DOM insertion.
			document.addEventListener( 'click', ( e ) => {
				const figure = e.target.closest( 'figure.wp-block-image[data-lightbox-group]' );
				if ( figure ) {
					this.pendingFigure = figure;
					requestAnimationFrame( () => this.checkForOverlay() );
				}
			} );
		}

		/**
		 * Check for an overlay that was toggled visible (not inserted).
		 */
		checkForOverlay() {
			const overlay = document.querySelector( '.wp-lightbox-overlay' );
			if ( overlay && overlay !== this.overlay ) {
				this.onOverlayOpen( overlay );
			}
		}

		/**
		 * Called when the native lightbox overlay opens.
		 *
		 * @param {HTMLElement} overlay The overlay element.
		 */
		onOverlayOpen( overlay ) {
			this.overlay = overlay;
			this.cleanup();

			// Determine which figure triggered the lightbox.
			const activeFigure = this.pendingFigure || this.findActiveFigure( overlay );
			this.pendingFigure = null;

			if ( ! activeFigure ) {
				return;
			}

			// Build the group of images sharing the same lightbox-group.
			this.groupId = activeFigure.getAttribute( 'data-lightbox-group' ) || '';
			this.buildGroup();
			this.currentIndex = this.findIndexForFigure( activeFigure );

			// Create the live region for accessibility announcements.
			this.createLiveRegion();

			// Inject enhancements.
			if ( this.group.length > 1 ) {
				this.createNavigation();
				this.createCounter();
			}

			if ( activeFigure.hasAttribute( 'data-lightbox-caption' ) ) {
				this.createCaption();
			}

			if ( activeFigure.hasAttribute( 'data-lightbox-thumbnails' ) && this.group.length >= 4 ) {
				this.createThumbnails();
			}

			if ( activeFigure.hasAttribute( 'data-lightbox-zoom' ) ) {
				this.initZoom();
			}

			if ( activeFigure.hasAttribute( 'data-lightbox-swipe' ) && this.group.length > 1 ) {
				this.initSwipe();
			}

			// Bind keyboard events.
			this.boundKeydown = this.onKeydown.bind( this );
			document.addEventListener( 'keydown', this.boundKeydown );

			this.updateUI();
		}

		/**
		 * Called when the native lightbox overlay closes.
		 */
		onOverlayClose() {
			this.cleanup();
			this.overlay = null;
			this.group = [];
			this.currentIndex = 0;
			this.groupId = '';
		}

		/**
		 * Remove all injected enhancement elements and event listeners.
		 */
		cleanup() {
			if ( this.boundKeydown ) {
				document.removeEventListener( 'keydown', this.boundKeydown );
				this.boundKeydown = null;
			}

			[ this.prevBtn, this.nextBtn, this.captionEl, this.counterEl, this.thumbsEl, this.liveRegion ].forEach( ( el ) => {
				el?.remove();
			} );

			this.prevBtn = null;
			this.nextBtn = null;
			this.captionEl = null;
			this.counterEl = null;
			this.thumbsEl = null;
			this.liveRegion = null;

			this.resetZoom();
		}

		// -------------------------------------------------------------------
		// Group management
		// -------------------------------------------------------------------

		/**
		 * Build the array of grouped figures from the page.
		 */
		buildGroup() {
			if ( ! this.groupId ) {
				this.group = [];
				return;
			}

			this.group = Array.from(
				document.querySelectorAll( `figure.wp-block-image[data-lightbox-group="${ CSS.escape( this.groupId ) }"]` )
			);
		}

		/**
		 * Find the index of a figure within the current group.
		 *
		 * @param {HTMLElement} figure The figure element.
		 * @return {number}
		 */
		findIndexForFigure( figure ) {
			const idx = this.group.indexOf( figure );
			return idx >= 0 ? idx : 0;
		}

		/**
		 * Attempt to find the figure that triggered the overlay.
		 *
		 * @param {HTMLElement} overlay The overlay element.
		 * @return {HTMLElement|null}
		 */
		findActiveFigure( overlay ) {
			// The WP lightbox clones the image into the overlay. Match by src.
			const overlayImg = overlay.querySelector( 'img' );
			if ( ! overlayImg ) {
				return null;
			}

			const src = overlayImg.getAttribute( 'src' );
			const figures = document.querySelectorAll( 'figure.wp-block-image[data-lightbox-group]' );

			for ( const fig of figures ) {
				const img = fig.querySelector( 'img' );
				if ( img && img.getAttribute( 'src' ) === src ) {
					return fig;
				}
			}

			return null;
		}

		// -------------------------------------------------------------------
		// Navigation
		// -------------------------------------------------------------------

		/**
		 * Create prev/next navigation buttons.
		 */
		createNavigation() {
			this.prevBtn = this.createButton( 'aegis-lightbox-nav aegis-lightbox-prev', ICON_PREV, 'Previous image' );
			this.nextBtn = this.createButton( 'aegis-lightbox-nav aegis-lightbox-next', ICON_NEXT, 'Next image' );

			this.prevBtn.addEventListener( 'click', ( e ) => {
				e.stopPropagation();
				this.navigate( -1 );
			} );

			this.nextBtn.addEventListener( 'click', ( e ) => {
				e.stopPropagation();
				this.navigate( 1 );
			} );

			this.overlay.appendChild( this.prevBtn );
			this.overlay.appendChild( this.nextBtn );
		}

		/**
		 * Navigate to the previous or next image in the group.
		 *
		 * @param {number} direction -1 for prev, 1 for next.
		 */
		navigate( direction ) {
			if ( this.group.length <= 1 ) {
				return;
			}

			this.resetZoom();

			const newIndex = ( this.currentIndex + direction + this.group.length ) % this.group.length;
			this.currentIndex = newIndex;

			const figure = this.group[ newIndex ];
			const img = figure.querySelector( 'img' );

			if ( ! img ) {
				return;
			}

			// Replace the image in the overlay.
			const overlayImg = this.overlay.querySelector( '.wp-block-image img' );
			if ( overlayImg ) {
				overlayImg.src = img.src;
				overlayImg.srcset = img.srcset || '';
				overlayImg.sizes = img.sizes || '';
				overlayImg.alt = img.alt || '';
			}

			// Preload adjacent images.
			this.preloadAdjacent();

			this.updateUI();
		}

		/**
		 * Preload the next and previous images for smoother navigation.
		 */
		preloadAdjacent() {
			const indices = [
				( this.currentIndex + 1 ) % this.group.length,
				( this.currentIndex - 1 + this.group.length ) % this.group.length,
			];

			for ( const idx of indices ) {
				const fig = this.group[ idx ];
				if ( fig ) {
					const img = fig.querySelector( 'img' );
					if ( img?.src ) {
						const preload = new Image();
						preload.src = img.src;
					}
				}
			}
		}

		// -------------------------------------------------------------------
		// Caption
		// -------------------------------------------------------------------

		/**
		 * Create the caption bar element.
		 */
		createCaption() {
			this.captionEl = document.createElement( 'div' );
			this.captionEl.className = 'aegis-lightbox-caption';
			this.captionEl.setAttribute( 'aria-live', 'polite' );
			this.overlay.appendChild( this.captionEl );
		}

		/**
		 * Update the caption text for the current image.
		 */
		updateCaption() {
			if ( ! this.captionEl ) {
				return;
			}

			const figure = this.group[ this.currentIndex ];
			const caption = figure?.getAttribute( 'data-lightbox-caption' ) || '';
			this.captionEl.textContent = caption;
			this.captionEl.style.display = caption ? '' : 'none';
		}

		// -------------------------------------------------------------------
		// Counter
		// -------------------------------------------------------------------

		/**
		 * Create the image counter element (e.g. "2 / 5").
		 */
		createCounter() {
			this.counterEl = document.createElement( 'div' );
			this.counterEl.className = 'aegis-lightbox-counter';
			this.counterEl.setAttribute( 'aria-hidden', 'true' );
			this.overlay.appendChild( this.counterEl );
		}

		/**
		 * Update the counter display.
		 */
		updateCounter() {
			if ( ! this.counterEl ) {
				return;
			}

			this.counterEl.textContent = `${ this.currentIndex + 1 } / ${ this.group.length }`;
		}

		// -------------------------------------------------------------------
		// Thumbnails
		// -------------------------------------------------------------------

		/**
		 * Create the thumbnail strip at the bottom of the overlay.
		 */
		createThumbnails() {
			this.thumbsEl = document.createElement( 'div' );
			this.thumbsEl.className = 'aegis-lightbox-thumbnails';
			this.thumbsEl.setAttribute( 'role', 'listbox' );
			this.thumbsEl.setAttribute( 'aria-label', 'Image thumbnails' );

			this.group.forEach( ( figure, index ) => {
				const img = figure.querySelector( 'img' );
				if ( ! img ) {
					return;
				}

				const thumb = document.createElement( 'button' );
				thumb.className = 'aegis-lightbox-thumb';
				thumb.setAttribute( 'role', 'option' );
				thumb.setAttribute( 'aria-label', `View image ${ index + 1 }` );
				thumb.type = 'button';

				const thumbImg = document.createElement( 'img' );
				thumbImg.src = img.src;
				thumbImg.alt = '';
				thumbImg.loading = 'lazy';
				thumbImg.draggable = false;

				thumb.appendChild( thumbImg );
				thumb.addEventListener( 'click', ( e ) => {
					e.stopPropagation();
					this.currentIndex = index;
					this.resetZoom();
					this.navigateToIndex( index );
				} );

				this.thumbsEl.appendChild( thumb );
			} );

			this.overlay.appendChild( this.thumbsEl );
		}

		/**
		 * Navigate directly to a specific index.
		 *
		 * @param {number} index Target index.
		 */
		navigateToIndex( index ) {
			this.currentIndex = index;

			const figure = this.group[ index ];
			const img = figure?.querySelector( 'img' );
			if ( ! img ) {
				return;
			}

			const overlayImg = this.overlay.querySelector( '.wp-block-image img' );
			if ( overlayImg ) {
				overlayImg.src = img.src;
				overlayImg.srcset = img.srcset || '';
				overlayImg.sizes = img.sizes || '';
				overlayImg.alt = img.alt || '';
			}

			this.preloadAdjacent();
			this.updateUI();
		}

		/**
		 * Update thumbnail active states.
		 */
		updateThumbnails() {
			if ( ! this.thumbsEl ) {
				return;
			}

			const thumbs = this.thumbsEl.querySelectorAll( '.aegis-lightbox-thumb' );
			thumbs.forEach( ( thumb, index ) => {
				thumb.classList.toggle( 'is-active', index === this.currentIndex );
				thumb.setAttribute( 'aria-selected', index === this.currentIndex ? 'true' : 'false' );
			} );

			// Scroll active thumbnail into view.
			const active = thumbs[ this.currentIndex ];
			if ( active ) {
				active.scrollIntoView( { behavior: 'smooth', block: 'nearest', inline: 'center' } );
			}
		}

		// -------------------------------------------------------------------
		// Zoom
		// -------------------------------------------------------------------

		/**
		 * Initialize zoom functionality on the overlay image.
		 */
		initZoom() {
			const imgContainer = this.overlay.querySelector( '.wp-block-image' );
			if ( ! imgContainer ) {
				return;
			}

			// Double-click to toggle zoom.
			imgContainer.addEventListener( 'dblclick', ( e ) => {
				e.preventDefault();
				e.stopPropagation();
				this.toggleZoom( e );
			} );

			// Mouse wheel zoom.
			imgContainer.addEventListener( 'wheel', ( e ) => {
				if ( ! this.zoom.active && e.deltaY > 0 ) {
					return; // Only allow zoom-in via wheel when not zoomed.
				}
				e.preventDefault();
				e.stopPropagation();
				const delta = e.deltaY > 0 ? -0.25 : 0.25;
				this.setZoomScale( this.zoom.scale + delta, e.clientX, e.clientY );
			}, { passive: false } );

			// Mouse drag for panning.
			imgContainer.addEventListener( 'mousedown', ( e ) => {
				if ( ! this.zoom.active ) {
					return;
				}
				e.preventDefault();
				this.zoom.isDragging = true;
				this.zoom.startX = e.clientX - this.zoom.translateX;
				this.zoom.startY = e.clientY - this.zoom.translateY;
				imgContainer.classList.add( 'is-dragging' );
			} );

			document.addEventListener( 'mousemove', ( e ) => {
				if ( ! this.zoom.isDragging ) {
					return;
				}
				this.zoom.translateX = e.clientX - this.zoom.startX;
				this.zoom.translateY = e.clientY - this.zoom.startY;
				this.applyZoomTransform();
			} );

			document.addEventListener( 'mouseup', () => {
				if ( this.zoom.isDragging ) {
					this.zoom.isDragging = false;
					imgContainer.classList.remove( 'is-dragging' );
				}
			} );

			// Touch pinch-to-zoom.
			imgContainer.addEventListener( 'touchstart', ( e ) => {
				if ( e.touches.length === 2 ) {
					e.preventDefault();
					this.zoom.pinchStartDist = this.getTouchDistance( e.touches );
					this.zoom.pinchStartScale = this.zoom.scale;
				} else if ( e.touches.length === 1 && this.zoom.active ) {
					this.zoom.isDragging = true;
					this.zoom.startX = e.touches[ 0 ].clientX - this.zoom.translateX;
					this.zoom.startY = e.touches[ 0 ].clientY - this.zoom.translateY;
				}
			}, { passive: false } );

			imgContainer.addEventListener( 'touchmove', ( e ) => {
				if ( e.touches.length === 2 ) {
					e.preventDefault();
					const dist = this.getTouchDistance( e.touches );
					const scale = this.zoom.pinchStartScale * ( dist / this.zoom.pinchStartDist );
					this.setZoomScale( scale );
				} else if ( e.touches.length === 1 && this.zoom.isDragging && this.zoom.active ) {
					e.preventDefault();
					this.zoom.translateX = e.touches[ 0 ].clientX - this.zoom.startX;
					this.zoom.translateY = e.touches[ 0 ].clientY - this.zoom.startY;
					this.applyZoomTransform();
				}
			}, { passive: false } );

			imgContainer.addEventListener( 'touchend', () => {
				this.zoom.isDragging = false;
				if ( this.zoom.scale <= 1 ) {
					this.resetZoom();
				}
			} );
		}

		/**
		 * Toggle zoom between 1x and 2x.
		 *
		 * @param {MouseEvent} e The triggering event for zoom origin.
		 */
		toggleZoom( e ) {
			if ( this.zoom.active ) {
				this.resetZoom();
			} else {
				this.setZoomScale( 2, e?.clientX, e?.clientY );
			}
		}

		/**
		 * Set the zoom scale and optionally center on a point.
		 *
		 * @param {number} scale   Target scale (clamped 1–5).
		 * @param {number} [originX] Zoom origin X.
		 * @param {number} [originY] Zoom origin Y.
		 */
		setZoomScale( scale, originX, originY ) {
			const newScale = Math.max( 1, Math.min( 5, scale ) );

			if ( newScale <= 1 ) {
				this.resetZoom();
				return;
			}

			const imgContainer = this.overlay?.querySelector( '.wp-block-image' );
			if ( ! imgContainer ) {
				return;
			}

			// Calculate translation to zoom toward the pointer.
			if ( originX !== undefined && originY !== undefined && ! this.zoom.active ) {
				const rect = imgContainer.getBoundingClientRect();
				const cx = rect.left + rect.width / 2;
				const cy = rect.top + rect.height / 2;
				this.zoom.translateX = ( cx - originX ) * ( newScale - 1 );
				this.zoom.translateY = ( cy - originY ) * ( newScale - 1 );
			}

			this.zoom.scale = newScale;
			this.zoom.active = true;
			imgContainer.classList.add( 'is-zoomed' );
			this.applyZoomTransform();
		}

		/**
		 * Apply the current zoom transform to the overlay image.
		 */
		applyZoomTransform() {
			const img = this.overlay?.querySelector( '.wp-block-image img' );
			if ( ! img ) {
				return;
			}

			img.style.transform = `translate(${ this.zoom.translateX }px, ${ this.zoom.translateY }px) scale(${ this.zoom.scale })`;
			img.style.transition = this.zoom.isDragging ? 'none' : 'transform 0.2s ease';
		}

		/**
		 * Reset zoom to default state.
		 */
		resetZoom() {
			const imgContainer = this.overlay?.querySelector( '.wp-block-image' );
			const img = imgContainer?.querySelector( 'img' );

			if ( img ) {
				img.style.transform = '';
				img.style.transition = '';
			}

			if ( imgContainer ) {
				imgContainer.classList.remove( 'is-zoomed', 'is-dragging' );
			}

			this.zoom.active = false;
			this.zoom.scale = 1;
			this.zoom.translateX = 0;
			this.zoom.translateY = 0;
			this.zoom.isDragging = false;
		}

		/**
		 * Get the distance between two touch points.
		 *
		 * @param {TouchList} touches The touch list.
		 * @return {number}
		 */
		getTouchDistance( touches ) {
			const dx = touches[ 0 ].clientX - touches[ 1 ].clientX;
			const dy = touches[ 0 ].clientY - touches[ 1 ].clientY;
			return Math.sqrt( dx * dx + dy * dy );
		}

		// -------------------------------------------------------------------
		// Swipe gestures
		// -------------------------------------------------------------------

		/**
		 * Initialize touch swipe navigation.
		 */
		initSwipe() {
			const imgContainer = this.overlay.querySelector( '.wp-block-image' );
			if ( ! imgContainer ) {
				return;
			}

			imgContainer.addEventListener( 'touchstart', ( e ) => {
				// Don't interfere with pinch-to-zoom.
				if ( e.touches.length !== 1 || this.zoom.active ) {
					return;
				}

				this.swipe.startX = e.touches[ 0 ].clientX;
				this.swipe.startY = e.touches[ 0 ].clientY;
				this.swipe.deltaX = 0;
				this.swipe.active = true;
			}, { passive: true } );

			imgContainer.addEventListener( 'touchmove', ( e ) => {
				if ( ! this.swipe.active || e.touches.length !== 1 || this.zoom.active ) {
					return;
				}

				this.swipe.deltaX = e.touches[ 0 ].clientX - this.swipe.startX;
				const deltaY = Math.abs( e.touches[ 0 ].clientY - this.swipe.startY );

				// Only count horizontal swipes.
				if ( Math.abs( this.swipe.deltaX ) > deltaY ) {
					e.preventDefault();
				}
			}, { passive: false } );

			imgContainer.addEventListener( 'touchend', () => {
				if ( ! this.swipe.active ) {
					return;
				}

				this.swipe.active = false;
				const threshold = 50;

				if ( this.swipe.deltaX > threshold ) {
					this.navigate( -1 ); // Swipe right = previous.
				} else if ( this.swipe.deltaX < -threshold ) {
					this.navigate( 1 ); // Swipe left = next.
				}

				this.swipe.deltaX = 0;
			}, { passive: true } );
		}

		// -------------------------------------------------------------------
		// Keyboard
		// -------------------------------------------------------------------

		/**
		 * Handle keyboard events in the lightbox.
		 *
		 * @param {KeyboardEvent} e The keyboard event.
		 */
		onKeydown( e ) {
			if ( ! this.overlay ) {
				return;
			}

			switch ( e.key ) {
				case 'ArrowLeft':
					if ( this.group.length > 1 && ! this.zoom.active ) {
						e.preventDefault();
						this.navigate( -1 );
					}
					break;

				case 'ArrowRight':
					if ( this.group.length > 1 && ! this.zoom.active ) {
						e.preventDefault();
						this.navigate( 1 );
					}
					break;

				case 'Home':
					if ( this.group.length > 1 ) {
						e.preventDefault();
						this.currentIndex = 0;
						this.navigateToIndex( 0 );
					}
					break;

				case 'End':
					if ( this.group.length > 1 ) {
						e.preventDefault();
						this.currentIndex = this.group.length - 1;
						this.navigateToIndex( this.group.length - 1 );
					}
					break;

				case '+':
				case '=':
					if ( this.group[ this.currentIndex ]?.hasAttribute( 'data-lightbox-zoom' ) ) {
						e.preventDefault();
						this.setZoomScale( this.zoom.scale + 0.5 );
					}
					break;

				case '-':
					if ( this.zoom.active ) {
						e.preventDefault();
						this.setZoomScale( this.zoom.scale - 0.5 );
					}
					break;

				case '0':
					if ( this.zoom.active ) {
						e.preventDefault();
						this.resetZoom();
					}
					break;
			}
		}

		// -------------------------------------------------------------------
		// UI helpers
		// -------------------------------------------------------------------

		/**
		 * Update all UI elements to reflect the current state.
		 */
		updateUI() {
			this.updateCaption();
			this.updateCounter();
			this.updateThumbnails();
			this.announce();
		}

		/**
		 * Create a button element.
		 *
		 * @param {string} className CSS class names.
		 * @param {string} innerHTML Inner HTML (icon SVG).
		 * @param {string} label     Accessible label.
		 * @return {HTMLButtonElement}
		 */
		createButton( className, innerHTML, label ) {
			const btn = document.createElement( 'button' );
			btn.className = className;
			btn.innerHTML = innerHTML;
			btn.type = 'button';
			btn.setAttribute( 'aria-label', label );
			return btn;
		}

		/**
		 * Create the ARIA live region for screen reader announcements.
		 */
		createLiveRegion() {
			this.liveRegion = document.createElement( 'div' );
			this.liveRegion.setAttribute( 'role', 'status' );
			this.liveRegion.setAttribute( 'aria-live', 'polite' );
			this.liveRegion.setAttribute( 'aria-atomic', 'true' );
			this.liveRegion.className = 'screen-reader-text';
			this.liveRegion.style.cssText = 'position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);white-space:nowrap;';
			this.overlay.appendChild( this.liveRegion );
		}

		/**
		 * Announce the current image to screen readers.
		 */
		announce() {
			if ( ! this.liveRegion || this.group.length <= 1 ) {
				return;
			}

			const figure = this.group[ this.currentIndex ];
			const caption = figure?.getAttribute( 'data-lightbox-caption' ) || '';
			const text = `Image ${ this.currentIndex + 1 } of ${ this.group.length }${ caption ? ': ' + caption : '' }`;

			this.liveRegion.textContent = '';
			requestAnimationFrame( () => {
				this.liveRegion.textContent = text;
			} );
		}
	}

	// Initialize when DOM is ready.
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', () => new AegisLightbox() );
	} else {
		new AegisLightbox();
	}
} )();
