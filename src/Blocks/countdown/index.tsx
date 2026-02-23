/**
 * Countdown Block
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { SVG, Path, Circle } from '@wordpress/primitives';

import Edit from './edit';
import save from './save';
import metadata from './block.json';

const icon = (
	<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<Circle cx="12" cy="13" r="9" fill="none" stroke="currentColor" strokeWidth="1.5" />
		<Path d="M12 7v6l4 2" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" />
		<Path d="M12 2v2M4.93 4.93l1.41 1.41M19.07 4.93l-1.41 1.41" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" />
	</SVG>
);

registerBlockType( metadata.name, {
	icon,
	edit: Edit,
	save,
} );
