/**
 * Modal Block
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { SVG, Path } from '@wordpress/primitives';

import Edit from './edit';
import save from './save';
import metadata from './block.json';

const icon = (
	<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<Path d="M18 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H6V6h12v12zM8 8h8v2H8V8zm0 4h8v2H8v-2z" />
	</SVG>
);

registerBlockType( metadata.name, {
	icon,
	edit: Edit,
	save,
	variations: [
		{
			name: 'popup',
			title: __( 'Popup', 'aegis' ),
			description: __( 'A centered popup modal.', 'aegis' ),
			attributes: { modalType: 'popup' },
			isDefault: true,
		},
		{
			name: 'off-canvas',
			title: __( 'Off-Canvas', 'aegis' ),
			description: __( 'A side panel that slides in.', 'aegis' ),
			attributes: { modalType: 'off-canvas' },
		},
		{
			name: 'bottom-sheet',
			title: __( 'Bottom Sheet', 'aegis' ),
			description: __( 'A panel that slides up from the bottom.', 'aegis' ),
			attributes: { modalType: 'bottom-sheet' },
		},
		{
			name: 'fullscreen',
			title: __( 'Fullscreen', 'aegis' ),
			description: __( 'A fullscreen overlay.', 'aegis' ),
			attributes: { modalType: 'fullscreen' },
		},
	],
	transforms: {
		from: [
			{
				type: 'block',
				blocks: [ 'core/group' ],
				transform: ( attributes, innerBlocks ) => {
					const { createBlock } = require( '@wordpress/blocks' );
					return createBlock( 'aegis/modal', {}, innerBlocks );
				},
			},
		],
	},
} );
