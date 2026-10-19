/**
 * Lazy-load icon packs for the button/tab picker store.
 *
 * Boot data only lists set slugs (empty maps) so the editor HTML stays light.
 * Full SVGs are fetched via REST ?set= after mount — never embed the catalog
 * in the page (that stalled Site Editor on Playground/WASM).
 */
( function ( wp, data ) {
	'use strict';

	if ( ! wp?.data || ! wp?.apiFetch ) {
		return;
	}

	const { select, dispatch, subscribe } = wp.data;
	const apiFetch = wp.apiFetch;

	const SLUG =
		( typeof window !== 'undefined' &&
			window.fieldify &&
			window.fieldify.slug ) ||
		'aegis';
	const STORE = SLUG + '/icons';
	const REST_BASE =
		( data && data.restBase ) ||
		'/' + SLUG + '/v1/icons';
	const BOOT = ( data && typeof data === 'object' ? data : {} ) || {};
	const BOOT_ICONS = BOOT.icons && typeof BOOT.icons === 'object' ? BOOT.icons : null;

	const loading = Object.create( null );
	const loaded = Object.create( null );
	let lastKey = '';
	let stubsSeeded = false;

	function normalizeSet( set ) {
		if ( ! set || typeof set !== 'string' ) {
			return 'wordpress';
		}
		const slug = set.trim().toLowerCase();
		return slug || 'wordpress';
	}

	function getStore() {
		try {
			return select( STORE );
		} catch ( e ) {
			return null;
		}
	}

	function getStoreIcons() {
		const store = getStore();
		if ( ! store || typeof store.getIcons !== 'function' ) {
			return null;
		}
		const icons = store.getIcons();
		if ( icons && icons.icons && typeof icons.icons === 'object' && ! icons.wordpress ) {
			return icons.icons;
		}
		return icons && typeof icons === 'object' ? icons : null;
	}

	function withAliases( icons ) {
		const next = { ...( icons || {} ) };
		if ( next.WordPress && ! next.wordpress ) {
			next.wordpress = next.WordPress;
		}
		delete next.WordPress;
		return next;
	}

	function setHasIcons( iconsMap, set ) {
		if ( ! iconsMap || typeof iconsMap !== 'object' ) {
			return false;
		}
		const bucket = iconsMap[ set ];
		return !!( bucket && typeof bucket === 'object' && Object.keys( bucket ).length > 0 );
	}

	function setIcons( icons ) {
		const storeDispatch = dispatch( STORE );
		if ( ! storeDispatch || typeof storeDispatch.setIcons !== 'function' ) {
			return false;
		}
		storeDispatch.setIcons( withAliases( icons ) );
		return true;
	}

	function mergeIcons( incoming ) {
		const current = getStoreIcons() || {};
		const next = { ...current };
		Object.keys( incoming || {} ).forEach( ( set ) => {
			const bucket = incoming[ set ];
			if ( ! bucket || typeof bucket !== 'object' ) {
				if ( ! Object.prototype.hasOwnProperty.call( next, set ) ) {
					next[ set ] = {};
				}
				return;
			}
			if ( Object.keys( bucket ).length === 0 && setHasIcons( next, set ) ) {
				return;
			}
			next[ set ] = bucket;
		} );
		return setIcons( next );
	}

	function seedStubs() {
		if ( stubsSeeded || ! BOOT_ICONS || ! getStore() ) {
			return false;
		}
		if ( ! mergeIcons( BOOT_ICONS ) ) {
			return false;
		}
		stubsSeeded = true;
		return true;
	}

	function loadSet( set, force ) {
		set = normalizeSet( set );
		if ( ! force && ( loading[ set ] || loaded[ set ] ) ) {
			return;
		}
		if ( ! force && setHasIcons( getStoreIcons(), set ) ) {
			loaded[ set ] = true;
			return;
		}

		loading[ set ] = true;

		apiFetch( { path: REST_BASE + '?set=' + encodeURIComponent( set ) } )
			.then( ( response ) => {
				loading[ set ] = false;
				if ( ! response || typeof response !== 'object' || Array.isArray( response ) ) {
					return;
				}
				if ( Object.keys( response ).length === 0 ) {
					return;
				}
				loaded[ set ] = true;
				mergeIcons( { [ set ]: response } );
			} )
			.catch( () => {
				loading[ set ] = false;
			} );
	}

	function hasStore( name ) {
		try {
			return !! select( name );
		} catch ( e ) {
			return false;
		}
	}

	function syncSelectedBlock() {
		try {
			if ( ! getStore() || ! hasStore( 'core/block-editor' ) ) {
				return;
			}

			seedStubs();

			const block = select( 'core/block-editor' ).getSelectedBlock();
			if ( ! block ) {
				return;
			}

			if ( block.name !== 'core/button' && block.name !== 'aegis/tab' ) {
				return;
			}

			const rawSet = block.attributes?.iconSet;
			const set = normalizeSet( rawSet );

			if ( rawSet && typeof rawSet === 'string' && rawSet !== set ) {
				dispatch( 'core/block-editor' ).updateBlockAttributes( block.clientId, {
					iconSet: set,
				} );
			}

			const needs = ! setHasIcons( getStoreIcons(), set );
			const key = block.clientId + ':' + set;

			if ( key !== lastKey || needs ) {
				lastKey = key;
				if ( needs ) {
					loadSet( set, false );
				}
			}
		} catch ( e ) {
			// Never break Site Editor boot (pages list has no block selection yet).
		}
	}

	subscribe( syncSelectedBlock );
} )( window.wp, window.aegisButtonIcons );