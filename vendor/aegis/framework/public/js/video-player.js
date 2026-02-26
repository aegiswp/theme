/**
 * Aegis Video Player
 *
 * Modern, accessible video player for WordPress core/video block.
 * Replaces MediaElement.js with a lightweight, customizable player.
 *
 * @package Aegis\Framework
 * @since   1.0.0
 */

( function() {
	'use strict';

	/**
	 * Video Player Class
	 */
	class AegisVideoPlayer {
		/**
		 * Constructor
		 *
		 * @param {HTMLVideoElement} video - The video element
		 * @param {Object} options - Player options
		 */
		constructor( video, options = {} ) {
			this.video = video;
			this.options = {
				keyboard: true,
				pip: true,
				theaterMode: true,
				playbackSpeed: true,
				sticky: true,
				speedOptions: [ 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2 ],
				...options,
			};

			this.isTheaterMode = false;
			this.isSticky = false;
			this.stickyDismissed = false;
			this.container = null;
			this.controls = null;

			this.init();
		}

		/**
		 * Initialize the player
		 */
		init() {
			// Wrap video in container
			this.createContainer();

			// Create custom controls
			this.createControls();

			// Bind events
			this.bindEvents();

			// Hide native controls
			this.video.controls = false;

			// Initialize sticky player
			if ( this.options.sticky ) {
				this.initSticky();
			}

			// Create screen reader live region
			this.createLiveRegion();

			// Add initialized class
			this.container.classList.add( 'aegis-video--initialized' );
		}

		/**
		 * Create player container
		 */
		createContainer() {
			const figure = this.video.closest( 'figure' ) || this.video.parentElement;

			// Check if already wrapped
			if ( figure.classList.contains( 'aegis-video-container' ) ) {
				this.container = figure;
				return;
			}

			// Add container class to figure
			figure.classList.add( 'aegis-video-container' );
			this.container = figure;
		}

		/**
		 * Create screen reader live region for announcements
		 */
		createLiveRegion() {
			this.liveRegion = document.createElement( 'div' );
			this.liveRegion.className = 'aegis-video-sr-only';
			this.liveRegion.setAttribute( 'role', 'status' );
			this.liveRegion.setAttribute( 'aria-live', 'polite' );
			this.liveRegion.setAttribute( 'aria-atomic', 'true' );
			this.container.appendChild( this.liveRegion );
		}

		/**
		 * Announce a message to screen readers
		 *
		 * @param {string} message - The message to announce
		 */
		announce( message ) {
			if ( ! this.liveRegion ) return;
			this.liveRegion.textContent = '';
			requestAnimationFrame( () => {
				this.liveRegion.textContent = message;
			} );
		}

		/**
		 * Create custom controls
		 */
		createControls() {
			const controls = document.createElement( 'div' );
			controls.className = 'aegis-video-controls';
			controls.setAttribute( 'role', 'toolbar' );
			controls.setAttribute( 'aria-label', 'Video controls' );

			controls.innerHTML = `
				<div class="aegis-video-controls__left">
					<button class="aegis-video-btn aegis-video-btn--play" type="button" aria-label="Play">
						<svg class="aegis-video-icon aegis-video-icon--play" viewBox="0 0 24 24" fill="currentColor">
							<path d="M8 5v14l11-7z"/>
						</svg>
						<svg class="aegis-video-icon aegis-video-icon--pause" viewBox="0 0 24 24" fill="currentColor">
							<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
						</svg>
					</button>
					<div class="aegis-video-time">
						<span class="aegis-video-time__current">0:00</span>
						<span class="aegis-video-time__separator">/</span>
						<span class="aegis-video-time__duration">0:00</span>
					</div>
				</div>
				<div class="aegis-video-controls__center">
					<div class="aegis-video-progress">
						<input type="range" class="aegis-video-progress__slider" min="0" max="100" value="0" aria-label="Seek">
						<div class="aegis-video-progress__bar">
							<div class="aegis-video-progress__buffered"></div>
							<div class="aegis-video-progress__played"></div>
						</div>
					</div>
				</div>
				<div class="aegis-video-controls__right">
					<div class="aegis-video-volume">
						<button class="aegis-video-btn aegis-video-btn--mute" type="button" aria-label="Mute">
							<svg class="aegis-video-icon aegis-video-icon--volume" viewBox="0 0 24 24" fill="currentColor">
								<path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
							</svg>
							<svg class="aegis-video-icon aegis-video-icon--muted" viewBox="0 0 24 24" fill="currentColor">
								<path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
							</svg>
						</button>
						<div class="aegis-video-volume__track" role="slider" aria-label="Volume" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" tabindex="0">
							<div class="aegis-video-volume__bar">
								<div class="aegis-video-volume__level" style="width:100%"></div>
							</div>
							<div class="aegis-video-volume__thumb" style="left:100%"></div>
						</div>
					</div>
					${this.options.playbackSpeed ? `
					<div class="aegis-video-speed">
						<button class="aegis-video-btn aegis-video-btn--speed" type="button" aria-label="Playback speed">
							<span class="aegis-video-speed__value">1x</span>
						</button>
						<div class="aegis-video-speed__menu" role="menu" hidden>
							${this.options.speedOptions.map( speed => `
								<button class="aegis-video-speed__option${speed === 1 ? ' aegis-video-speed__option--active' : ''}" 
									type="button" 
									role="menuitem" 
									data-speed="${speed}">${speed}x</button>
							` ).join( '' )}
						</div>
					</div>
					` : ''}
					${this.options.pip && document.pictureInPictureEnabled ? `
					<button class="aegis-video-btn aegis-video-btn--pip" type="button" aria-label="Picture in Picture">
						<svg class="aegis-video-icon" viewBox="0 0 24 24" fill="currentColor">
							<path d="M19 7h-8v6h8V7zm2-4H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h18v14z"/>
						</svg>
					</button>
					` : ''}
					${this.options.theaterMode ? `
					<button class="aegis-video-btn aegis-video-btn--theater" type="button" aria-label="Theater mode">
						<svg class="aegis-video-icon aegis-video-icon--expand" viewBox="0 0 24 24" fill="currentColor">
							<path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h18v14z"/>
						</svg>
						<svg class="aegis-video-icon aegis-video-icon--collapse" viewBox="0 0 24 24" fill="currentColor">
							<path d="M19 11h-8v6h8v-6zm4-8H1v18h22V3zm-2 16H3V5h18v14z"/>
						</svg>
					</button>
					` : ''}
					<button class="aegis-video-btn aegis-video-btn--fullscreen" type="button" aria-label="Fullscreen">
						<svg class="aegis-video-icon aegis-video-icon--enter" viewBox="0 0 24 24" fill="currentColor">
							<path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
						</svg>
						<svg class="aegis-video-icon aegis-video-icon--exit" viewBox="0 0 24 24" fill="currentColor">
							<path d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
						</svg>
					</button>
				</div>
			`;

			// Add big play button overlay
			const playOverlay = document.createElement( 'button' );
			playOverlay.className = 'aegis-video-play-overlay';
			playOverlay.setAttribute( 'type', 'button' );
			playOverlay.setAttribute( 'aria-label', 'Play video' );
			playOverlay.innerHTML = `
				<svg class="aegis-video-play-overlay__icon" viewBox="0 0 24 24" fill="currentColor">
					<path d="M8 5v14l11-7z"/>
				</svg>
			`;

			this.container.appendChild( playOverlay );
			this.container.appendChild( controls );
			this.controls = controls;
			this.playOverlay = playOverlay;
		}

		/**
		 * Bind event listeners
		 */
		bindEvents() {
			// Video events
			this.video.addEventListener( 'loadedmetadata', () => this.onLoadedMetadata() );
			this.video.addEventListener( 'timeupdate', () => this.onTimeUpdate() );
			this.video.addEventListener( 'progress', () => this.onProgress() );
			this.video.addEventListener( 'play', () => this.onPlay() );
			this.video.addEventListener( 'pause', () => this.onPause() );
			this.video.addEventListener( 'ended', () => this.onEnded() );
			this.video.addEventListener( 'volumechange', () => this.onVolumeChange() );

			// Play/pause buttons
			this.controls.querySelector( '.aegis-video-btn--play' ).addEventListener( 'click', () => this.togglePlay() );
			this.playOverlay.addEventListener( 'click', () => this.togglePlay() );

			// Progress slider
			const progressSlider = this.controls.querySelector( '.aegis-video-progress__slider' );
			progressSlider.addEventListener( 'input', ( e ) => this.onSeek( e ) );

			// Volume
			this.controls.querySelector( '.aegis-video-btn--mute' ).addEventListener( 'click', () => this.toggleMute() );
			this.bindVolumeTrack();

			// Fullscreen
			this.controls.querySelector( '.aegis-video-btn--fullscreen' ).addEventListener( 'click', () => this.toggleFullscreen() );
			document.addEventListener( 'fullscreenchange', () => this.onFullscreenChange() );

			// Picture in Picture
			const pipBtn = this.controls.querySelector( '.aegis-video-btn--pip' );
			if ( pipBtn ) {
				pipBtn.addEventListener( 'click', () => this.togglePiP() );
			}

			// Theater mode
			const theaterBtn = this.controls.querySelector( '.aegis-video-btn--theater' );
			if ( theaterBtn ) {
				theaterBtn.addEventListener( 'click', () => this.toggleTheaterMode() );
			}

			// Playback speed
			const speedBtn = this.controls.querySelector( '.aegis-video-btn--speed' );
			if ( speedBtn ) {
				speedBtn.addEventListener( 'click', () => this.toggleSpeedMenu() );
				this.controls.querySelectorAll( '.aegis-video-speed__option' ).forEach( option => {
					option.addEventListener( 'click', ( e ) => this.setPlaybackSpeed( e ) );
				} );
			}

			// Keyboard controls
			if ( this.options.keyboard ) {
				this.container.setAttribute( 'tabindex', '0' );
				this.container.addEventListener( 'keydown', ( e ) => this.onKeydown( e ) );
			}

			// Show/hide controls on hover
			this.container.addEventListener( 'mouseenter', () => this.showControls() );
			this.container.addEventListener( 'mouseleave', () => this.hideControls() );
			this.container.addEventListener( 'mousemove', () => this.showControls() );

			// Touch support
			this.container.addEventListener( 'touchstart', () => this.showControls() );
		}

		/**
		 * Toggle play/pause
		 */
		togglePlay() {
			if ( this.video.paused ) {
				this.video.play();
			} else {
				this.video.pause();
			}
		}

		/**
		 * On play event
		 */
		onPlay() {
			this.container.classList.add( 'aegis-video--playing' );
			this.container.classList.remove( 'aegis-video--paused' );
			this.playOverlay.hidden = true;
			this.announce( 'Playing' );
		}

		/**
		 * On pause event
		 */
		onPause() {
			this.container.classList.remove( 'aegis-video--playing' );
			this.container.classList.add( 'aegis-video--paused' );
			this.announce( 'Paused' );
		}

		/**
		 * On ended event
		 */
		onEnded() {
			this.container.classList.remove( 'aegis-video--playing' );
			this.container.classList.add( 'aegis-video--ended' );
			this.playOverlay.hidden = false;
			this.announce( 'Video ended' );
		}

		/**
		 * On loaded metadata
		 */
		onLoadedMetadata() {
			const duration = this.controls.querySelector( '.aegis-video-time__duration' );
			duration.textContent = this.formatTime( this.video.duration );
		}

		/**
		 * On time update
		 */
		onTimeUpdate() {
			const current = this.controls.querySelector( '.aegis-video-time__current' );
			const slider = this.controls.querySelector( '.aegis-video-progress__slider' );
			const played = this.controls.querySelector( '.aegis-video-progress__played' );

			const percent = ( this.video.currentTime / this.video.duration ) * 100;

			current.textContent = this.formatTime( this.video.currentTime );
			slider.value = percent;
			played.style.width = `${percent}%`;
		}

		/**
		 * On progress (buffering)
		 */
		onProgress() {
			const buffered = this.controls.querySelector( '.aegis-video-progress__buffered' );

			if ( this.video.buffered.length > 0 ) {
				const bufferedEnd = this.video.buffered.end( this.video.buffered.length - 1 );
				const percent = ( bufferedEnd / this.video.duration ) * 100;
				buffered.style.width = `${percent}%`;
			}
		}

		/**
		 * On seek
		 *
		 * @param {Event} e - Input event
		 */
		onSeek( e ) {
			const time = ( e.target.value / 100 ) * this.video.duration;
			this.video.currentTime = time;
		}

		/**
		 * Toggle mute
		 */
		toggleMute() {
			this.video.muted = ! this.video.muted;
		}

		/**
		 * Bind custom volume track events
		 */
		bindVolumeTrack() {
			const track = this.controls.querySelector( '.aegis-video-volume__track' );
			if ( ! track ) return;

			let isDragging = false;

			const setVolumeFromPosition = ( e ) => {
				const rect = track.getBoundingClientRect();
				const x = ( e.touches ? e.touches[0].clientX : e.clientX ) - rect.left;
				const percent = Math.max( 0, Math.min( 1, x / rect.width ) );
				this.video.volume = percent;
				this.video.muted = percent === 0;
			};

			track.addEventListener( 'mousedown', ( e ) => {
				isDragging = true;
				setVolumeFromPosition( e );
				e.preventDefault();
			} );

			document.addEventListener( 'mousemove', ( e ) => {
				if ( isDragging ) setVolumeFromPosition( e );
			} );

			document.addEventListener( 'mouseup', () => {
				isDragging = false;
			} );

			track.addEventListener( 'touchstart', ( e ) => {
				isDragging = true;
				setVolumeFromPosition( e );
			}, { passive: true } );

			track.addEventListener( 'touchmove', ( e ) => {
				if ( isDragging ) setVolumeFromPosition( e );
			}, { passive: true } );

			track.addEventListener( 'touchend', () => {
				isDragging = false;
			} );

			// Keyboard support for the volume track
			track.addEventListener( 'keydown', ( e ) => {
				if ( e.key === 'ArrowRight' || e.key === 'ArrowUp' ) {
					e.preventDefault();
					this.video.volume = Math.min( 1, this.video.volume + 0.05 );
				} else if ( e.key === 'ArrowLeft' || e.key === 'ArrowDown' ) {
					e.preventDefault();
					this.video.volume = Math.max( 0, this.video.volume - 0.05 );
				}
			} );
		}

		/**
		 * On volume change
		 */
		onVolumeChange() {
			const level = this.controls.querySelector( '.aegis-video-volume__level' );
			const thumb = this.controls.querySelector( '.aegis-video-volume__thumb' );
			const track = this.controls.querySelector( '.aegis-video-volume__track' );
			const vol = this.video.muted ? 0 : this.video.volume;
			const percent = vol * 100;

			if ( level ) level.style.width = `${percent}%`;
			if ( thumb ) thumb.style.left = `${percent}%`;
			if ( track ) track.setAttribute( 'aria-valuenow', Math.round( percent ) );

			this.container.classList.toggle( 'aegis-video--muted', this.video.muted || this.video.volume === 0 );

			if ( this.video.muted || this.video.volume === 0 ) {
				this.announce( 'Muted' );
			} else {
				this.announce( `Volume ${Math.round( percent )}%` );
			}
		}

		/**
		 * Initialize sticky player
		 */
		initSticky() {
			// Create close button for sticky mode
			const closeBtn = document.createElement( 'button' );
			closeBtn.className = 'aegis-video-sticky__close';
			closeBtn.setAttribute( 'type', 'button' );
			closeBtn.setAttribute( 'aria-label', 'Close sticky player' );
			closeBtn.innerHTML = `<svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>`;
			closeBtn.addEventListener( 'click', ( e ) => {
				e.stopPropagation();
				this.dismissSticky();
			} );
			this.container.appendChild( closeBtn );
			this.stickyCloseBtn = closeBtn;

			// Create sentinel element that stays in document flow for observation
			this.stickySentinel = document.createElement( 'div' );
			this.stickySentinel.className = 'aegis-video-sticky__sentinel';
			this.stickySentinel.setAttribute( 'aria-hidden', 'true' );
			this.container.parentNode.insertBefore( this.stickySentinel, this.container );

			// Use IntersectionObserver on the sentinel (stays in flow even when container is fixed)
			this.stickyObserver = new IntersectionObserver( ( entries ) => {
				entries.forEach( ( entry ) => {
					if ( this.stickyDismissed || document.fullscreenElement ) {
						return;
					}

					if ( ! entry.isIntersecting && ! this.video.paused ) {
						this.enableSticky();
					} else if ( entry.isIntersecting ) {
						this.disableSticky();
					}
				} );
			}, { threshold: 0 } );

			this.stickyObserver.observe( this.stickySentinel );

			// Re-enable sticky when video plays again after being dismissed
			this.video.addEventListener( 'play', () => {
				this.stickyDismissed = false;
			} );
		}

		/**
		 * Enable sticky mode
		 */
		enableSticky() {
			if ( this.isSticky ) return;
			this.isSticky = true;

			// Save original dimensions in sentinel to preserve layout
			const rect = this.container.getBoundingClientRect();
			this.stickySentinel.style.height = rect.height + 'px';

			this.container.classList.add( 'aegis-video--sticky' );
		}

		/**
		 * Disable sticky mode
		 */
		disableSticky() {
			if ( ! this.isSticky ) return;
			this.isSticky = false;

			this.container.classList.remove( 'aegis-video--sticky' );
			this.stickySentinel.style.height = '0';
		}

		/**
		 * Dismiss sticky player (user clicked close)
		 */
		dismissSticky() {
			this.stickyDismissed = true;
			this.disableSticky();
			this.video.pause();
		}

		/**
		 * Toggle fullscreen
		 */
		toggleFullscreen() {
			if ( document.fullscreenElement ) {
				document.exitFullscreen();
			} else {
				this.container.requestFullscreen();
			}
		}

		/**
		 * On fullscreen change
		 */
		onFullscreenChange() {
			const isFs = !! document.fullscreenElement;
			this.container.classList.toggle( 'aegis-video--fullscreen', isFs );
			this.announce( isFs ? 'Fullscreen' : 'Exited fullscreen' );
		}

		/**
		 * Toggle Picture in Picture
		 */
		async togglePiP() {
			try {
				if ( document.pictureInPictureElement ) {
					await document.exitPictureInPicture();
				} else {
					await this.video.requestPictureInPicture();
				}
			} catch ( error ) {
				console.error( 'PiP error:', error );
			}
		}

		/**
		 * Toggle theater mode
		 */
		toggleTheaterMode() {
			this.isTheaterMode = ! this.isTheaterMode;
			this.container.classList.toggle( 'aegis-video--theater', this.isTheaterMode );

			// Dispatch custom event
			this.container.dispatchEvent( new CustomEvent( 'aegis:theater', {
				detail: { active: this.isTheaterMode },
			} ) );

			this.announce( this.isTheaterMode ? 'Theater mode' : 'Exited theater mode' );
		}

		/**
		 * Toggle speed menu
		 */
		toggleSpeedMenu() {
			const menu = this.controls.querySelector( '.aegis-video-speed__menu' );
			menu.hidden = ! menu.hidden;
		}

		/**
		 * Set playback speed
		 *
		 * @param {Event} e - Click event
		 */
		setPlaybackSpeed( e ) {
			const speed = parseFloat( e.target.dataset.speed );
			this.video.playbackRate = speed;

			// Update UI
			this.controls.querySelector( '.aegis-video-speed__value' ).textContent = `${speed}x`;
			this.controls.querySelectorAll( '.aegis-video-speed__option' ).forEach( option => {
				option.classList.toggle( 'aegis-video-speed__option--active', parseFloat( option.dataset.speed ) === speed );
			} );

			// Hide menu
			this.controls.querySelector( '.aegis-video-speed__menu' ).hidden = true;

			this.announce( `Speed ${speed}x` );
		}

		/**
		 * Keyboard controls
		 *
		 * @param {KeyboardEvent} e - Keyboard event
		 */
		onKeydown( e ) {
			switch ( e.key ) {
				case ' ':
				case 'k':
					e.preventDefault();
					this.togglePlay();
					break;
				case 'ArrowLeft':
					e.preventDefault();
					this.video.currentTime = Math.max( 0, this.video.currentTime - 5 );
					break;
				case 'ArrowRight':
					e.preventDefault();
					this.video.currentTime = Math.min( this.video.duration, this.video.currentTime + 5 );
					break;
				case 'ArrowUp':
					e.preventDefault();
					this.video.volume = Math.min( 1, this.video.volume + 0.1 );
					break;
				case 'ArrowDown':
					e.preventDefault();
					this.video.volume = Math.max( 0, this.video.volume - 0.1 );
					break;
				case 'm':
					e.preventDefault();
					this.toggleMute();
					break;
				case 'f':
					e.preventDefault();
					this.toggleFullscreen();
					break;
				case 't':
					e.preventDefault();
					if ( this.options.theaterMode ) {
						this.toggleTheaterMode();
					}
					break;
				case 'p':
					e.preventDefault();
					if ( this.options.pip ) {
						this.togglePiP();
					}
					break;
				case 'Home':
					e.preventDefault();
					this.video.currentTime = 0;
					break;
				case 'End':
					e.preventDefault();
					this.video.currentTime = this.video.duration;
					break;
				case '0':
				case '1':
				case '2':
				case '3':
				case '4':
				case '5':
				case '6':
				case '7':
				case '8':
				case '9':
					e.preventDefault();
					this.video.currentTime = ( parseInt( e.key ) / 10 ) * this.video.duration;
					break;
			}
		}

		/**
		 * Show controls
		 */
		showControls() {
			this.container.classList.add( 'aegis-video--controls-visible' );

			clearTimeout( this.hideTimeout );

			if ( ! this.video.paused ) {
				this.hideTimeout = setTimeout( () => this.hideControls(), 3000 );
			}
		}

		/**
		 * Hide controls
		 */
		hideControls() {
			if ( ! this.video.paused ) {
				this.container.classList.remove( 'aegis-video--controls-visible' );
			}
		}

		/**
		 * Format time in MM:SS or HH:MM:SS
		 *
		 * @param {number} seconds - Time in seconds
		 * @return {string} Formatted time
		 */
		formatTime( seconds ) {
			if ( isNaN( seconds ) || ! isFinite( seconds ) ) {
				return '0:00';
			}

			const h = Math.floor( seconds / 3600 );
			const m = Math.floor( ( seconds % 3600 ) / 60 );
			const s = Math.floor( seconds % 60 );

			if ( h > 0 ) {
				return `${h}:${m.toString().padStart( 2, '0' )}:${s.toString().padStart( 2, '0' )}`;
			}

			return `${m}:${s.toString().padStart( 2, '0' )}`;
		}
	}

	/**
	 * Initialize all video players
	 *
	 * Videos with a poster attribute use a facade pattern for performance:
	 * the video preload is set to 'none' and full initialization is deferred
	 * until the user interacts with the player.
	 */
	function initVideoPlayers() {
		const videos = document.querySelectorAll( '.wp-block-video video' );

		videos.forEach( video => {
			// Skip if already initialized or has facade
			if ( video.closest( '.aegis-video--initialized' ) || video.closest( '.aegis-video--facade' ) ) {
				return;
			}

			// Facade: defer full init for videos with a poster
			if ( video.poster && video.getAttribute( 'preload' ) !== 'auto' ) {
				initFacade( video );
			} else {
				new AegisVideoPlayer( video );
			}
		} );
	}

	/**
	 * Initialize facade/placeholder for a video
	 *
	 * Shows poster + play button without loading video data.
	 * Full player initializes on first interaction.
	 *
	 * @param {HTMLVideoElement} video - The video element
	 */
	function initFacade( video ) {
		// Prevent browser from downloading video data
		video.preload = 'none';

		const figure = video.closest( 'figure' ) || video.parentElement;
		figure.classList.add( 'aegis-video-container', 'aegis-video--facade' );

		// Create facade play overlay
		const playOverlay = document.createElement( 'button' );
		playOverlay.className = 'aegis-video-play-overlay';
		playOverlay.setAttribute( 'type', 'button' );
		playOverlay.setAttribute( 'aria-label', 'Play video' );
		playOverlay.innerHTML = `
			<svg class="aegis-video-play-overlay__icon" viewBox="0 0 24 24" fill="currentColor">
				<path d="M8 5v14l11-7z"/>
			</svg>
		`;

		figure.appendChild( playOverlay );

		// On click, remove facade and initialize full player
		const activate = () => {
			playOverlay.remove();
			figure.classList.remove( 'aegis-video--facade' );
			video.preload = 'auto';

			const player = new AegisVideoPlayer( video );
			video.play().catch( () => {} );
		};

		playOverlay.addEventListener( 'click', activate );
	}

	// Initialize on DOM ready
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initVideoPlayers );
	} else {
		initVideoPlayers();
	}

	// Re-initialize on AJAX/dynamic content
	if ( typeof MutationObserver !== 'undefined' ) {
		const observer = new MutationObserver( ( mutations ) => {
			mutations.forEach( ( mutation ) => {
				if ( mutation.addedNodes.length ) {
					initVideoPlayers();
				}
			} );
		} );

		observer.observe( document.body, {
			childList: true,
			subtree: true,
		} );
	}

	// Expose to global scope
	window.AegisVideoPlayer = AegisVideoPlayer;
} )();
