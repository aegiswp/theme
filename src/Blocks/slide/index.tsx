/**
 * Slide Block
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
} from '@wordpress/block-editor';

import metadata from './block.json';

function Edit() {
	const blockProps = useBlockProps( {
		className: 'aegis-slide splide__slide',
	} );

	return (
		<div { ...blockProps }>
			<InnerBlocks
				template={ [ [ 'core/image', {} ] ] }
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
