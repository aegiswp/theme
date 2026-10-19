(() => {
	/* WooCommerce hides the closed mini-cart drawer with aria-hidden only, so its buttons stay in the tab order. Mirror aria-hidden with inert. */
	const SELECTOR = '.wc-block-mini-cart__drawer';

	const sync = ( drawer ) => {
		drawer.inert = 'true' === drawer.getAttribute( 'aria-hidden' );
	};

	const watch = ( drawer ) => {
		if ( drawer.dataset.aegisInert ) {
			return;
		}
		drawer.dataset.aegisInert = 'true';
		sync( drawer );
		new MutationObserver( () => sync( drawer ) ).observe( drawer, { attributes: true, attributeFilter: [ 'aria-hidden' ] } );
	};

	const run = () => document.querySelectorAll( SELECTOR ).forEach( watch );

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', run );
	} else {
		run();
	}
})();
