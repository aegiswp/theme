/**
 * Slider Block
 *
 * @package
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { SVG, Path } from '@wordpress/primitives';

import Edit from './edit';
import type { SliderAttributes } from './edit';
import save from './save';
import type { BlockConfiguration } from '@wordpress/blocks';
import metadata from './block.json';
import './style.scss';

/** Multi-panel + dots icon (matches vendor wordpress/slider.svg). */
const icon = (
	<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<Path d="M12 18a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-4.6 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm9.2 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM2.8 4H1.6v1.5h1.2c.3 0 .5.2.5.5v7c0 .3-.2.5-.5.5H1.6V15h1.2c1.1 0 2-.9 2-2V6c0-1.1-.8-2-2-2zm12.8 0H8.4c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h7.2c1.1 0 2-.9 2-2V6c0-1.1-.8-2-2-2zm.5 9c0 .3-.2.5-.5.5H8.4c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h7.2c.3 0 .5.2.5.5v7zm6.3.5h-1.2c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h1.2V4h-1.2c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h1.2v-1.5z" />
	</SVG>
);

registerBlockType< SliderAttributes >(
	metadata as BlockConfiguration< SliderAttributes >,
	{
		icon,
		edit: Edit,
		save,
	}
);
