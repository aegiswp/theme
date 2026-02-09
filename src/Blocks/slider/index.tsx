/**
 * Slider Block
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
		<Path d="M2 6h4v12H2V6zm16 0h4v12h-4V6zM7 4h10c.55 0 1 .45 1 1v14c0 .55-.45 1-1 1H7c-.55 0-1-.45-1-1V5c0-.55.45-1 1-1zm1 2v12h8V6H8z" />
	</SVG>
);

registerBlockType( metadata.name, {
	icon,
	edit: Edit,
	save,
} );
