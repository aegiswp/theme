/**
 * Toggle Content Block
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import metadata from './block.json';

function Edit() {
	const blockProps = useBlockProps( {
		className: 'aegis-toggle-content',
	} );

	return (
		<div { ...blockProps }>
			<InnerBlocks
				template={ [ [ 'core/paragraph', { placeholder: __( 'Toggle content…', 'aegis' ) } ] ] }
			/>
		</div>
	);
}

function save() {
	return <InnerBlocks.Content />;
}

registerBlockType( metadata.name, {
	edit: Edit,
	save,
} );
