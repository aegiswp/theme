( function ( wp ) {
	'use strict';

	if ( ! wp || ! wp.blocks ) {
		return;
	}

	const { __ } = wp.i18n || { __: ( text ) => text };

	function features() {
		const raw = window.aegisNewsletterFeatures;

		if ( ! raw ) {
			return { enabled: true };
		}

		return { enabled: !! raw.enabled };
	}

	function unregisterNewsletterVariation() {
		if ( wp.blocks.unregisterBlockVariation ) {
			wp.blocks.unregisterBlockVariation( 'core/search', 'newsletter' );
		}
	}

	function registerNewsletter() {
		if ( ! wp.blocks.registerBlockVariation ) {
			return;
		}

		wp.blocks.registerBlockVariation( 'core/search', {
			name: 'newsletter',
			title: __( 'Newsletter', 'aegis' ),
			description: __(
				'Search form styled as an email signup. Listen for the aegis-newsletter-submit event or replace it with a form plugin.',
				'aegis'
			),
			attributes: {
				className: 'is-style-newsletter',
				showLabel: false,
				buttonPosition: 'button-outside',
				buttonText: __( 'Subscribe', 'aegis' ),
				placeholder: __( 'Email address', 'aegis' ),
			},
			isActive: function ( blockAttributes ) {
				return blockAttributes?.className?.includes( 'is-style-newsletter' );
			},
		} );
	}

	function boot() {
		unregisterNewsletterVariation();

		if ( features().enabled ) {
			registerNewsletter();
			return;
		}

		if ( wp.blocks.unregisterBlockStyle ) {
			wp.blocks.unregisterBlockStyle( 'core/search', 'newsletter' );
		}
	}

	boot();

	if ( wp.domReady ) {
		wp.domReady( boot );
	}
} )( window.wp );
