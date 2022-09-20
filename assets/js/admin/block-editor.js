/**
 * File block-editor.js.
 */
( function() {
	'use strict';

	const containerWidthElements = 'body .wp-block, html body.gutenberg-editor-page .editor-post-title__block, html body.gutenberg-editor-page .editor-default-block-appender, html body.gutenberg-editor-page .editor-block-list__block, .edit-post-visual-editor .editor-block-list__block[data-align=wide]';
	const layoutMeta = document.querySelector( 'select[name="aeon-layout-meta"]' );
	if ( layoutMeta ) {
		layoutMeta.addEventListener( 'change', function() {
			const thisValue = this.value;
			let contentWidth = '';
			const containerWidth = aeBlockEditor.containerWidth;
			const rightSidebarWidth = aeBlockEditor.rightSidebarWidth;
			const leftSidebarWidth = aeBlockEditor.leftSidebarWidth;

			if ( 'full-width' === thisValue ) {
				contentWidth = 'max-width: 100%';
			} else if ( 'right-sidebar' === thisValue ) {
				contentWidth = 'max-width: ' + containerWidth * ( ( 100 - rightSidebarWidth ) / 100 ) + 'px';
			} else if ( 'left-sidebar' === thisValue ) {
				contentWidth = 'max-width: ' + containerWidth * ( ( 100 - leftSidebarWidth ) / 100 ) + 'px';
			} else {
				contentWidth = 'max-width: ' + containerWidth + 'px';
			}

			const styleScript = document.getElementById( 'content-width' );
			if ( styleScript ) {
				styleScript.remove();
			}

			const style = document.createElement( 'style' );
			style.type = 'text/css';
			style.id = 'content-width';

			style.innerHTML = containerWidthElements + '{' + contentWidth + '}';
			document.head.appendChild( style );
		} );
	}
}() );
