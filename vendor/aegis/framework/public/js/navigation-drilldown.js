(() => {
	/* Slide-through submenus for the Navigation block's overlay (mobile) menu. */
	const data = ( window.aegis && window.aegis.navDrilldown ) || {};
	const BACK = data.back || 'Back';
	const OPEN = data.open || 'Show %s submenu';

	const CONTAINER = '.wp-block-navigation__responsive-container';
	const CONTENT = '.wp-block-navigation__responsive-container-content';
	const SUBMENU = '.wp-block-navigation__submenu-container';
	const ROW = ':scope > .wp-block-navigation-item__content';
	const FOCUSABLE = 'a[href], button:not([disabled]), input:not([disabled]), select, textarea, [tabindex]:not([tabindex="-1"])';

	const CHEVRON_RIGHT = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M10.6 6 9.4 7l4.6 5-4.6 5 1.2 1 5.4-6z" fill="currentColor"></path></svg>';
	const CHEVRON_LEFT = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M14.6 7 13.4 6 8 12l5.4 6 1.2-1-4.6-5z" fill="currentColor"></path></svg>';

	const isOpen = ( container ) => container.classList.contains( 'is-menu-open' );
	const submenuOf = ( li ) => Array.from( li.children ).find( ( el ) => el.matches( SUBMENU ) );
	const visible = ( el ) => el.getClientRects().length > 0;

	const labelOf = ( li ) => {
		const label = li.querySelector( ':scope > .wp-block-navigation-item__content .wp-block-navigation-item__label' ) || li.querySelector( ROW );
		return label ? label.textContent.trim() : '';
	};

	const buildHeader = ( li, label ) => {
		const header = document.createElement( 'li' );
		header.className = 'aegis-drilldown__header';

		const back = document.createElement( 'button' );
		back.type = 'button';
		back.className = 'aegis-drilldown__back';
		back.innerHTML = CHEVRON_LEFT;
		const backText = document.createElement( 'span' );
		backText.textContent = BACK;
		back.appendChild( backText );
		header.appendChild( back );

		const link = li.querySelector( ':scope > a.wp-block-navigation-item__content' );
		const href = link ? link.getAttribute( 'href' ) : '';
		const title = document.createElement( href && '#' !== href ? 'a' : 'span' );
		title.className = 'aegis-drilldown__title';
		title.textContent = label;
		if ( 'A' === title.tagName ) {
			title.href = href;
		}
		header.appendChild( title );

		return header;
	};

	const buildNext = ( label ) => {
		const next = document.createElement( 'button' );
		next.type = 'button';
		next.className = 'aegis-drilldown__next';
		next.setAttribute( 'aria-expanded', 'false' );
		next.setAttribute( 'aria-label', OPEN.replace( '%s', label ) );
		next.innerHTML = CHEVRON_RIGHT;
		return next;
	};

	const animate = ( el, name ) => {
		if ( ! el ) {
			return;
		}
		delete el.dataset.aegisSlide;
		void el.offsetWidth;
		el.dataset.aegisSlide = name;
		el.addEventListener( 'animationend', () => delete el.dataset.aegisSlide, { once: true } );
	};

	const setCurrent = ( container, li ) => {
		const content = container.querySelector( CONTENT ) || container;
		container.querySelectorAll( '[data-aegis-drilled], [data-aegis-path]' ).forEach( ( el ) => {
			delete el.dataset.aegisDrilled;
			delete el.dataset.aegisPath;
		} );
		container.querySelectorAll( '.aegis-drilldown__next' ).forEach( ( btn ) => btn.setAttribute( 'aria-expanded', 'false' ) );
		if ( li ) {
			container.dataset.aegisDrilledIn = 'true';
		} else {
			delete container.dataset.aegisDrilledIn;
		}

		if ( ! li ) {
			return;
		}

		li.dataset.aegisDrilled = 'true';
		let el = li.parentElement;
		while ( el && el !== container ) {
			el.dataset.aegisPath = 'true';
			if ( el.matches( 'li.has-child' ) ) {
				el.dataset.aegisDrilled = 'true';
			}
			if ( el === content ) {
				break;
			}
			el = el.parentElement;
		}
		container.querySelectorAll( 'li[data-aegis-drilled] > .aegis-drilldown__next' ).forEach( ( btn ) => btn.setAttribute( 'aria-expanded', 'true' ) );
	};

	const current = ( container ) => {
		const drilled = container.querySelectorAll( 'li[data-aegis-drilled]' );
		return drilled.length ? drilled[ drilled.length - 1 ] : null;
	};

	const drill = ( container, li ) => {
		setCurrent( container, li );
		container.scrollTop = 0;
		animate( submenuOf( li ), 'in' );
		const back = submenuOf( li ).querySelector( ':scope > .aegis-drilldown__header .aegis-drilldown__back' );
		if ( back ) {
			back.focus( { preventScroll: true } );
		}
	};

	const goBack = ( container ) => {
		const li = current( container );
		if ( ! li ) {
			return;
		}
		const parent = li.parentElement ? li.parentElement.closest( 'li.has-child' ) : null;
		const target = parent && container.contains( parent ) ? parent : null;
		setCurrent( container, target );
		container.scrollTop = 0;
		animate( target ? submenuOf( target ) : container.querySelector( CONTENT ), 'back' );
		const focus = li.querySelector( ':scope > .aegis-drilldown__next' ) || li.querySelector( ROW );
		if ( focus ) {
			focus.focus( { preventScroll: true } );
		}
	};

	const init = ( container ) => {
		if ( container.dataset.aegisDrilldown ) {
			return;
		}
		container.dataset.aegisDrilldown = 'true';

		const parents = Array.from( container.querySelectorAll( 'li.has-child' ) ).filter( submenuOf );
		if ( ! parents.length ) {
			return;
		}
		container.dataset.aegisDrilldownActive = 'true';

		parents.forEach( ( li ) => {
			const label = labelOf( li );
			const submenu = submenuOf( li );
			submenu.insertBefore( buildHeader( li, label ), submenu.firstChild );
			/* Keep core's toggle directly before the submenu: its CSS uses sibling selectors. */
			const toggle = li.querySelector( ':scope > .wp-block-navigation-submenu__toggle, :scope > .wp-block-navigation__submenu-icon' );
			li.insertBefore( buildNext( label ), toggle || submenu );
		} );

		container.addEventListener( 'click', ( event ) => {
			if ( ! isOpen( container ) ) {
				return;
			}
			const back = event.target.closest( '.aegis-drilldown__back' );
			if ( back && container.contains( back ) ) {
				event.preventDefault();
				event.stopPropagation();
				goBack( container );
				return;
			}
			const trigger = event.target.closest( '.aegis-drilldown__next, li.has-child > .wp-block-navigation-item__content, li.has-child > .wp-block-navigation-submenu__toggle' );
			if ( ! trigger || ! container.contains( trigger ) ) {
				return;
			}
			const li = trigger.parentElement;
			if ( ! submenuOf( li ) ) {
				return;
			}
			event.preventDefault();
			event.stopPropagation();
			drill( container, li );
		}, true );

		container.addEventListener( 'keydown', ( event ) => {
			if ( ! isOpen( container ) || ! container.dataset.aegisDrilledIn ) {
				return;
			}
			if ( 'Escape' === event.key ) {
				event.preventDefault();
				event.stopPropagation();
				goBack( container );
				return;
			}
			if ( 'Tab' !== event.key ) {
				return;
			}
			const items = Array.from( container.querySelectorAll( FOCUSABLE ) ).filter( visible );
			if ( ! items.length ) {
				return;
			}
			const first = items[ 0 ];
			const last = items[ items.length - 1 ];
			const active = document.activeElement;
			if ( event.shiftKey && ( active === first || ! items.includes( active ) ) ) {
				event.preventDefault();
				event.stopPropagation();
				last.focus();
			} else if ( ! event.shiftKey && ( active === last || ! items.includes( active ) ) ) {
				event.preventDefault();
				event.stopPropagation();
				first.focus();
			}
		}, true );

		/* Start from the top level each time the menu opens. State lives in data attributes because the Interactivity API rewrites these elements' class lists. */
		new MutationObserver( () => {
			if ( ! isOpen( container ) && container.dataset.aegisDrilledIn ) {
				setCurrent( container, null );
			}
		} ).observe( container, { attributes: true, attributeFilter: [ 'class' ] } );
	};

	const run = () => document.querySelectorAll( CONTAINER ).forEach( init );

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', run );
	} else {
		run();
	}
})();
