/**
 * Toggle Content Block
 *
 * @package
 * @since   1.1.0
 */

import { registerBlockType, store as blocksStore } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';

import type { BlockConfiguration } from '@wordpress/blocks';
import metadata from './block.json';
import './style.scss';

interface EditProps {
	attributes: { slot?: string };
	context: {
		'aegis/toggleAllowNested'?: boolean;
	};
}

function nestedExtraEnabled(): boolean {
	const extras = window.aegisToggleFeatures;

	if ( ! extras ) {
		return true;
	}

	return !! extras.nested;
}

function Edit( { attributes, context }: EditProps ) {
	const slot = attributes.slot === 'b' ? 'b' : 'a';
	const allowNested =
		nestedExtraEnabled() && !! context[ 'aegis/toggleAllowNested' ];
	const blockProps = useBlockProps( {
		className: 'aegis-toggle-content',
		'data-slot': slot,
	} );

	const allowedBlocks = useSelect(
		( select ) => {
			if ( allowNested ) {
				return undefined;
			}

			return select( blocksStore )
				.getBlockTypes()
				.map( ( block: { name: string } ) => block.name )
				.filter( ( name: string ) => name !== 'aegis/toggle' );
		},
		[ allowNested ]
	);

	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		allowedBlocks,
		templateLock: false,
		template: [
			[
				'core/paragraph',
				{
					placeholder:
						slot === 'b'
							? __( 'Second view…', 'aegis' )
							: __( 'First view…', 'aegis' ),
				},
			],
		],
	} );

	return <div { ...innerBlocksProps } />;
}

function save() {
	return <InnerBlocks.Content />;
}

registerBlockType( metadata as BlockConfiguration, {
	edit: Edit,
	save,
} );
