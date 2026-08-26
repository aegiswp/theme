( function ( wp ) {
	'use strict';

	if ( ! wp?.hooks || ! wp?.compose || ! wp?.element ) {
		return;
	}

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { createElement: el, useEffect } = wp.element;

	/**
	 * Self-closing Aegis buttons store label text in attributes.text only. The icon
	 * editor UI replaces link content with SVG; restore the visible label beside it.
	 */
	addFilter(
		'editor.BlockEdit',
		'aegis/button-text-label',
		createHigherOrderComponent( ( BlockEdit ) => {
			return function ButtonTextLabelEdit( props ) {
				const { name, attributes, clientId } = props;

				useEffect( () => {
					if ( name !== 'core/button' ) {
						return;
					}

					const text = attributes?.text;
					if ( ! text || typeof text !== 'string' || ! text.trim() ) {
						return;
					}

					const root = document.querySelector(
						'[data-block="' +
							clientId +
							'"] .wp-block-button__link, [data-block="' +
							clientId +
							'"] .wp-element-button'
					);

					if ( ! root ) {
						return;
					}

					const hasText = Array.from( root.childNodes ).some(
						( node ) =>
							node.nodeType === Node.TEXT_NODE &&
							node.textContent.trim().length > 0
					);

					if ( hasText ) {
						return;
					}

					const textNode = document.createTextNode( text );
					if ( attributes?.iconPosition === 'start' ) {
						root.appendChild( textNode );
					} else {
						root.insertBefore( textNode, root.firstChild );
					}
				}, [
					name,
					clientId,
					attributes?.text,
					attributes?.iconPosition,
					attributes?.iconSvgString,
					attributes?.iconName,
				] );

				return el( BlockEdit, props );
			};
		}, 'withAegisButtonTextLabel' )
	);
} )( window.wp );
