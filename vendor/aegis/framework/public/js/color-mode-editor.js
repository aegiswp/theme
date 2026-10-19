/**
 * Editor color-mode toggle.
 *
 * Adds a light/dark switch to the editor top bar (beside Styles/Settings) that
 * previews the canvas in the other color mode. It reuses the framework's
 * `.is-style-dark` / `.is-style-light` token remaps (DarkMode::styles()), so the
 * canvas looks exactly like the front end in that mode. The choice is saved per
 * user in editor preferences; with no saved choice the site's default mode is used.
 *
 * The top-bar icon is a PluginSidebar (the public way to pin an icon there).
 * Opening it flips the mode and immediately restores the previously open
 * sidebar, so a single click toggles. The sidebar also holds Light/Dark buttons
 * as a fallback.
 */
( function ( wp ) {
	'use strict';

	if ( ! wp || ! wp.plugins || ! wp.editor || ! wp.editor.PluginSidebar || ! wp.data ) {
		return;
	}

	const { registerPlugin } = wp.plugins;
	const { PluginSidebar, PluginPreviewMenuItem } = wp.editor;
	const { createElement: el, Fragment, useEffect } = wp.element;
	const { useSelect, subscribe, select, dispatch } = wp.data;
	const { Button, PanelBody } = wp.components;
	const { SVG, Path } = wp.primitives;
	const { __ } = wp.i18n;

	const PLUGIN = 'aegis-color-mode';
	const AREA = PLUGIN + '/toggle';
	const SCOPE = 'core';
	const PREF_SCOPE = 'aegis';
	const PREF_KEY = 'editorColorMode';
	const DEFAULT_MODE = window.aegis?.colorMode?.defaultMode === 'dark' ? 'dark' : 'light';
	const MODES = [ 'light', 'dark' ];

	// Same moon and sun (WordPress "shadow") icons as the theme's front-end dark mode toggle.
	const moonIcon = el(
		SVG,
		{ xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24' },
		el( Path, { d: 'M17.8 13.5c-2 .5-4.2 0-5.8-1.5s-2.1-3.8-1.5-5.8c.2-.6.4-1.1.7-1.7-.7.1-1.3.3-1.9.5-.9.4-1.8.9-2.6 1.7-2.9 2.9-2.9 7.7 0 10.6 2.9 2.9 7.7 2.9 10.6 0 .8-.8 1.3-1.6 1.7-2.6.2-.6.4-1.3.5-1.9-.5.3-1.1.6-1.7.7zm-1.5 2.7c-2.3 2.3-6.1 2.3-8.5 0-2.3-2.3-2.3-6.1 0-8.5.3-.3.7-.6 1-.8-.2 2.2.5 4.5 2.2 6.1s3.9 2.4 6.1 2.1c-.2.4-.5.8-.8 1.1z' } )
	);
	const sunIcon = el(
		SVG,
		{ xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24' },
		el( Path, { d: 'M12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5zM12.8 3h-1.5v3h1.5V3zm-1.6 18h1.5v-3h-1.5v3zm6.8-9.8v1.5h3v-1.5h-3zm-12 0H3v1.5h3v-1.5zm9.7 5.6 2.1 2.1 1.1-1.1-2.1-2.1-1.1 1.1zM8.3 7.2 6.2 5.1 5.1 6.2l2.1 2.1 1.1-1.1zM5.1 17.8l1.1 1.1 2.1-2.1-1.1-1.1-2.1 2.1zM18.9 6.2l-1.1-1.1-2.1 2.1 1.1 1.1 2.1-2.1z' } )
	);

	function getMode() {
		const saved = select( 'core/preferences' )?.get( PREF_SCOPE, PREF_KEY );
		return MODES.includes( saved ) ? saved : DEFAULT_MODE;
	}

	function setMode( mode ) {
		dispatch( 'core/preferences' )?.set( PREF_SCOPE, PREF_KEY, mode );
		applyMode( mode );
	}

	function toggleMode() {
		setMode( getMode() === 'dark' ? 'light' : 'dark' );
	}

	/**
	 * Canvas bodies: the iframed canvas, or the inline wrapper when not iframed.
	 */
	function getCanvasTargets() {
		const targets = [];

		document.querySelectorAll( 'iframe[name="editor-canvas"]' ).forEach( ( frame ) => {
			try {
				if ( frame.contentDocument?.body ) {
					targets.push( frame.contentDocument.body );
				}
			} catch ( e ) {
				// Cross-origin frames are not editor canvases.
			}
		} );

		document.querySelectorAll( '.editor-styles-wrapper' ).forEach( ( node ) => targets.push( node ) );

		return targets;
	}

	function applyMode( mode = getMode() ) {
		const wanted = mode !== DEFAULT_MODE ? 'is-style-' + mode : '';

		getCanvasTargets().forEach( ( target ) => {
			// Only touch the class list when it differs, so the class observer does not loop.
			const hasDark = target.classList.contains( 'is-style-dark' );
			const hasLight = target.classList.contains( 'is-style-light' );
			const current = hasDark ? 'is-style-dark' : hasLight ? 'is-style-light' : '';

			if ( current === wanted && ! ( hasDark && hasLight ) ) {
				return;
			}

			target.classList.remove( 'is-style-light', 'is-style-dark' );

			// The canvas already renders the default mode; only the other one needs a class.
			if ( wanted ) {
				target.classList.add( wanted );
			}
		} );
	}

	// Re-apply when the canvas iframe is created, replaced, or reloaded, and when
	// its document is (re)built: the canvas body can be swapped after load.
	let scheduled = false;
	const observedDocs = new WeakSet();
	const observer = new window.MutationObserver( scheduleApply );

	function watchFrame( frame ) {
		const doc = frame.contentDocument;

		if ( doc && doc.documentElement && ! observedDocs.has( doc ) ) {
			observedDocs.add( doc );
			observer.observe( doc.documentElement, { childList: true, subtree: true, attributes: true, attributeFilter: [ 'class' ] } );
		}
	}

	function scheduleApply() {
		if ( scheduled ) {
			return;
		}
		scheduled = true;
		window.requestAnimationFrame( () => {
			scheduled = false;
			document.querySelectorAll( 'iframe[name="editor-canvas"]' ).forEach( ( frame ) => {
				if ( ! frame.dataset.aegisColorMode ) {
					frame.dataset.aegisColorMode = '1';
					frame.addEventListener( 'load', () => {
						watchFrame( frame );
						applyMode();
					} );
				}
				watchFrame( frame );
			} );
			applyMode();
		} );
	}

	observer.observe( document.body, { childList: true, subtree: true } );

	// One-click toggle: opening our sidebar flips the mode and restores the previous sidebar.
	let previousArea = null;
	let ready = false;
	subscribe( () => {
		const active = select( 'core/interface' )?.getActiveComplementaryArea( SCOPE );

		// Ignore whatever state the editor loads with.
		if ( ! ready ) {
			ready = true;
			if ( active === AREA ) {
				dispatch( 'core/interface' ).disableComplementaryArea( SCOPE );
				return;
			}
			previousArea = active || null;
			return;
		}

		if ( active !== AREA ) {
			previousArea = active || null;
			return;
		}

		toggleMode();

		if ( previousArea ) {
			dispatch( 'core/interface' ).enableComplementaryArea( SCOPE, previousArea );
		} else {
			dispatch( 'core/interface' ).disableComplementaryArea( SCOPE );
		}
	}, 'core/interface' );

	function ColorModeToggle() {
		const mode = useSelect( ( registrySelect ) => {
			const saved = registrySelect( 'core/preferences' )?.get( PREF_SCOPE, PREF_KEY );
			return MODES.includes( saved ) ? saved : DEFAULT_MODE;
		}, [] );
		const isDark = mode === 'dark';
		const label = isDark ? __( 'Switch to light mode', 'aegis' ) : __( 'Switch to dark mode', 'aegis' );

		useEffect( () => {
			applyMode( mode );
		}, [ mode ] );

		return el(
			Fragment,
			null,
			el(
				PluginSidebar,
				{ name: 'toggle', title: label, icon: isDark ? sunIcon : moonIcon },
				el(
					PanelBody,
					null,
					el( 'p', null, __( 'Preview the canvas in light or dark mode. This only affects the editor, not your site.', 'aegis' ) ),
					MODES.map( ( value ) =>
						el(
							Button,
							{
								key: value,
								variant: mode === value ? 'primary' : 'secondary',
								onClick: () => setMode( value ),
								style: { marginInlineEnd: '8px' },
							},
							'dark' === value ? __( 'Dark', 'aegis' ) : __( 'Light', 'aegis' )
						)
					)
				)
			),
			PluginPreviewMenuItem
				? el(
						PluginPreviewMenuItem,
						{ icon: isDark ? sunIcon : moonIcon, onClick: toggleMode },
						isDark ? __( 'Preview in light mode', 'aegis' ) : __( 'Preview in dark mode', 'aegis' )
				  )
				: null
		);
	}

	registerPlugin( PLUGIN, { render: ColorModeToggle } );
} )( window.wp );
