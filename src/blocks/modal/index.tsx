/**
 * Modal Block - Registration
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType, createBlock } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

import Edit from './edit';
import save from './save';
import metadata from './block.json';

import './editor.scss';

// Block icon
const icon = (
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
		<path d="M18 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H6V6h12v12z" />
		<path d="M8 8h8v2H8zm0 4h8v2H8z" />
	</svg>
);

// Block variations for different modal types
const variations = [
	{
		name: 'popup',
		title: __('Popup Modal', 'aegis'),
		description: __('A centered popup modal dialog.', 'aegis'),
		attributes: { modalType: 'popup' },
		isDefault: true,
	},
	{
		name: 'left-canvas',
		title: __('Left Sidebar Modal', 'aegis'),
		description: __('A modal that slides in from the left.', 'aegis'),
		attributes: { modalType: 'left-canvas' },
	},
	{
		name: 'right-canvas',
		title: __('Right Sidebar Modal', 'aegis'),
		description: __('A modal that slides in from the right.', 'aegis'),
		attributes: { modalType: 'right-canvas' },
	},
	{
		name: 'bottom-sheet',
		title: __('Bottom Sheet Modal', 'aegis'),
		description: __('A modal that slides up from the bottom.', 'aegis'),
		attributes: { modalType: 'bottom-sheet' },
	},
	{
		name: 'fullscreen',
		title: __('Fullscreen Modal', 'aegis'),
		description: __('A fullscreen modal overlay.', 'aegis'),
		attributes: { modalType: 'fullscreen' },
	},
];

// Block transforms
const transforms = {
	from: [
		{
			type: 'block',
			blocks: ['core/group'],
			transform: (attributes: any, innerBlocks: any) => {
				return createBlock('aegis/modal', {}, innerBlocks);
			},
		},
	],
};

registerBlockType(metadata.name, {
	...metadata,
	icon,
	edit: Edit,
	save,
	variations,
	transforms,
});
