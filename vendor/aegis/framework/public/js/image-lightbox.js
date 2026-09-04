( function () {
	'use strict';

	const config = window.aegis && window.aegis.lightbox ? window.aegis.lightbox : {};

	if ( ! config.galleryNav && ! config.zoom && ! config.thumbnails && ! config.swipe ) {
		return;
	}

	function boot( overlay ) {
		const thumbsEl = document.createElement( 'div' );
		thumbsEl.className = 'aegis-lightbox-thumbs';
		thumbsEl.hidden = true;
		thumbsEl.setAttribute( 'role', 'tablist' );

		overlay.appendChild( thumbsEl );

		const zoom = {
			scale: 1,
			x: 0,
			y: 0,
			pointers: new Map(),
			startDist: 0,
			startScale: 1,
			dragged: false,
		};

		let wasActive = overlay.classList.contains( 'active' );
		let srcTick = 0;

		function figures() {
			return Array.from( document.querySelectorAll( 'figure.wp-lightbox-container.aegis-lightbox' ) ).filter(
				( item ) => ! item.closest( '.wp-lightbox-overlay' )
			);
		}

		function activeTrigger() {
			return document.querySelector( 'figure.wp-lightbox-container.aegis-lightbox img.hide, figure.wp-lightbox-container.aegis-lightbox img.show' );
		}

		function activeFigure() {
			const img = activeTrigger();

			if ( ! img || img.closest( '.wp-lightbox-overlay' ) ) {
				return null;
			}

			return img.closest( 'figure.wp-lightbox-container' );
		}

		function groupFigures( figure ) {
			if ( ! figure ) {
				return [];
			}

			const group = figure.getAttribute( 'data-aegis-lightbox-group' );

			if ( ! group ) {
				return [ figure ];
			}

			return figures().filter( ( item ) => item.getAttribute( 'data-aegis-lightbox-group' ) === group );
		}

		function applyZoom() {
			const zoomed = zoom.scale > 1;
			overlay.style.setProperty( '--aegis-lb-scale', String( zoom.scale ) );
			overlay.style.setProperty( '--aegis-lb-x', zoom.x + 'px' );
			overlay.style.setProperty( '--aegis-lb-y', zoom.y + 'px' );
			overlay.classList.toggle( 'aegis-is-zoomed', zoomed );
		}

		function resetZoom() {
			zoom.scale = 1;
			zoom.x = 0;
			zoom.y = 0;
			zoom.pointers.clear();
			zoom.startDist = 0;
			overlay.classList.remove( 'aegis-is-zoomed', 'aegis-is-panning' );
			overlay.style.removeProperty( '--aegis-lb-scale' );
			overlay.style.removeProperty( '--aegis-lb-x' );
			overlay.style.removeProperty( '--aegis-lb-y' );
		}

		function updateThumbs( figure ) {
			if ( ! config.thumbnails ) {
				thumbsEl.hidden = true;
				thumbsEl.replaceChildren();
				overlay.classList.remove( 'has-aegis-thumbnails' );
				return;
			}

			const group = groupFigures( figure );

			if ( group.length < 4 ) {
				thumbsEl.hidden = true;
				thumbsEl.replaceChildren();
				overlay.classList.remove( 'has-aegis-thumbnails' );
				return;
			}

			thumbsEl.replaceChildren();
			group.forEach( ( item ) => {
				const srcImg = item.querySelector( 'img' );
				if ( ! srcImg ) {
					return;
				}
				const button = document.createElement( 'button' );
				button.type = 'button';
				button.setAttribute( 'role', 'tab' );
				button.setAttribute( 'aria-selected', item === figure ? 'true' : 'false' );
				const label = srcImg.alt || '';
				if ( label ) {
					button.setAttribute( 'aria-label', label );
				}
				if ( item === figure ) {
					button.classList.add( 'is-active' );
				}
				const thumb = document.createElement( 'img' );
				thumb.src = srcImg.currentSrc || srcImg.src;
				thumb.alt = '';
				button.appendChild( thumb );
				button.addEventListener( 'click', ( event ) => {
					event.stopPropagation();
					const trigger = item.querySelector( '.lightbox-trigger' );
					if ( trigger ) {
						trigger.click();
					}
				} );
				thumbsEl.appendChild( button );
			} );
			thumbsEl.hidden = false;
			overlay.classList.add( 'has-aegis-thumbnails' );
		}

		function updateNavVisibility( figure ) {
			const grouped = groupFigures( figure ).length > 1;
			const hideArrows = grouped && ! config.galleryNav;
			overlay.classList.toggle( 'aegis-lightbox-hide-nav', hideArrows );
		}

		function sync( resetScale ) {
			const figure = activeFigure();
			if ( resetScale ) {
				resetZoom();
			}
			updateThumbs( figure );
			updateNavVisibility( figure );
		}

		function pointerDistance( a, b ) {
			const dx = a.clientX - b.clientX;
			const dy = a.clientY - b.clientY;
			return Math.hypot( dx, dy );
		}

		overlay.addEventListener(
			'click',
			( event ) => {
				if ( event.target.closest( '.aegis-lightbox-thumbs' ) ) {
					event.stopPropagation();
					return;
				}
				if ( zoom.dragged || ( zoom.scale > 1 && event.target.closest( '.lightbox-image-container' ) ) ) {
					event.stopImmediatePropagation();
				}
			},
			true
		);

		if ( ! config.galleryNav ) {
			overlay.addEventListener(
				'keydown',
				( event ) => {
					if ( event.key === 'ArrowLeft' || event.key === 'ArrowRight' ) {
						event.stopImmediatePropagation();
					}
				},
				true
			);
		}

		if ( config.zoom ) {
			overlay.addEventListener(
				'touchend',
				( event ) => {
					if ( zoom.scale > 1 ) {
						event.stopImmediatePropagation();
					}
				},
				true
			);

			overlay.addEventListener(
				'wheel',
				( event ) => {
					if ( ! overlay.classList.contains( 'active' ) ) {
						return;
					}
					if ( ! event.target.closest( '.lightbox-image-container' ) ) {
						return;
					}
					event.preventDefault();
					event.stopPropagation();
					const next = zoom.scale + ( event.deltaY < 0 ? 0.15 : -0.15 );
					zoom.scale = Math.min( 4, Math.max( 1, next ) );
					if ( zoom.scale === 1 ) {
						zoom.x = 0;
						zoom.y = 0;
					}
					applyZoom();
				},
				{ passive: false }
			);

			overlay.addEventListener( 'dblclick', ( event ) => {
				if ( ! event.target.closest( '.lightbox-image-container img' ) ) {
					return;
				}
				event.preventDefault();
				event.stopPropagation();
				if ( zoom.scale > 1 ) {
					resetZoom();
				} else {
					zoom.scale = 2;
					applyZoom();
				}
			} );

			overlay.addEventListener( 'pointerdown', ( event ) => {
				if ( ! overlay.classList.contains( 'active' ) ) {
					return;
				}
				if ( ! event.target.closest( '.lightbox-image-container' ) ) {
					return;
				}
				zoom.dragged = false;
				zoom.pointers.set( event.pointerId, event );
				if ( zoom.pointers.size === 2 ) {
					const pts = Array.from( zoom.pointers.values() );
					zoom.startDist = pointerDistance( pts[ 0 ], pts[ 1 ] );
					zoom.startScale = zoom.scale;
				} else if ( zoom.scale > 1 ) {
					overlay.classList.add( 'aegis-is-panning' );
					event.currentTarget.setPointerCapture( event.pointerId );
				}
			} );

			overlay.addEventListener( 'pointermove', ( event ) => {
				if ( ! zoom.pointers.has( event.pointerId ) ) {
					return;
				}
				const prev = zoom.pointers.get( event.pointerId );
				zoom.pointers.set( event.pointerId, event );
				if ( zoom.pointers.size === 2 && zoom.startDist ) {
					event.preventDefault();
					zoom.dragged = true;
					const pts = Array.from( zoom.pointers.values() );
					const dist = pointerDistance( pts[ 0 ], pts[ 1 ] );
					zoom.scale = Math.min( 4, Math.max( 1, ( dist / zoom.startDist ) * zoom.startScale ) );
					applyZoom();
					return;
				}
				if ( zoom.scale > 1 ) {
					event.preventDefault();
					const dx = event.clientX - prev.clientX;
					const dy = event.clientY - prev.clientY;
					if ( Math.abs( dx ) > 1 || Math.abs( dy ) > 1 ) {
						zoom.dragged = true;
					}
					zoom.x += dx;
					zoom.y += dy;
					applyZoom();
				}
			} );

			const endPointer = ( event ) => {
				zoom.pointers.delete( event.pointerId );
				overlay.classList.remove( 'aegis-is-panning' );
				if ( zoom.pointers.size < 2 ) {
					zoom.startDist = 0;
				}
			};

			overlay.addEventListener( 'pointerup', endPointer );
			overlay.addEventListener( 'pointercancel', endPointer );
		}

		const classObserver = new MutationObserver( () => {
			const active = overlay.classList.contains( 'active' );
			if ( active && ! wasActive ) {
				sync( true );
			} else if ( ! active && wasActive ) {
				resetZoom();
				thumbsEl.hidden = true;
				overlay.classList.remove( 'has-aegis-thumbnails', 'aegis-lightbox-hide-nav' );
			}
			wasActive = active;
		} );

		classObserver.observe( overlay, { attributes: true, attributeFilter: [ 'class' ] } );

		const srcObserver = new MutationObserver( () => {
			if ( ! overlay.classList.contains( 'active' ) ) {
				return;
			}
			const token = ++srcTick;
			requestAnimationFrame( () => {
				if ( token !== srcTick ) {
					return;
				}
				sync( true );
			} );
		} );

		srcObserver.observe( overlay, {
			subtree: true,
			attributes: true,
			attributeFilter: [ 'src', 'srcset' ],
		} );
	}

	function start() {
		const found = document.querySelector( '.wp-lightbox-overlay' );
		if ( found ) {
			boot( found );
			return;
		}

		let frames = 0;
		const wait = new MutationObserver( () => {
			const overlay = document.querySelector( '.wp-lightbox-overlay' );
			if ( overlay ) {
				wait.disconnect();
				boot( overlay );
			}
		} );

		wait.observe( document.documentElement, { childList: true, subtree: true } );

		function giveUp() {
			frames += 1;
			if ( document.querySelector( '.wp-lightbox-overlay' ) ) {
				return;
			}
			if ( frames > 12 ) {
				wait.disconnect();
				return;
			}
			requestAnimationFrame( giveUp );
		}

		requestAnimationFrame( giveUp );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', start );
	} else {
		start();
	}
} )();
