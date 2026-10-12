/**
 * Slide Block
 *
 * @package
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import { SVG, Path } from '@wordpress/primitives';

import metadata from './block.json';
import './style.scss';

/**
 * Single content-card icon — distinct from Slider’s multi-panel + dots.
 * Inner bars keep it readable at List View size (avoids a hollow square).
 */
const icon = (
	<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
		<Path d="M17.5 5.5h-11c-1.1 0-2 .9-2 2v9c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-9c0-1.1-.9-2-2-2zm0 11h-11v-9h11v9zM8 9.25h8v1.5H8v-1.5zm0 3h8v1.5H8v-1.5zm0 3h5v1.5H8v-1.5z" />
	</SVG>
);

function Edit() {
	const blockProps = useBlockProps( {
		className: 'aegis-slide splide__slide',
	} );

	return (
		<div { ...blockProps }>
			<InnerBlocks
				template={ [
					[
						'core/group',
						{
							layout: { type: 'constrained' },
							style: {
								spacing: {
									padding: {
										top: '24px',
										bottom: '24px',
										left: '24px',
										right: '24px',
									},
								},
							},
						},
						[ [ 'core/paragraph', { align: 'center', placeholder: 'Slide content…' } ] ],
					],
				] }
				templateLock={ false }
			/>
		</div>
	);
}

/**
 * InnerBlocks only — frontend wrapper comes from render.php (`.splide__slide`).
 * Patterns and editor round-trips keep Slider → Slide nesting via block comments.
 */
function save() {
	return <InnerBlocks.Content />;
}

/**
 * Prior saves. Do not copy color supports — WP color processing expects
 * attribute schemas and throws (backgroundColor of undefined).
 */
const deprecated = [
	{
		attributes: {},
		supports: {
			html: false,
			className: true,
		},
		save: () => {
			const blockProps = useBlockProps.save( {
				className: 'aegis-slide splide__slide',
			} );
			return (
				<div { ...blockProps }>
					<InnerBlocks.Content />
				</div>
			);
		},
	},
	{
		attributes: {},
		supports: {
			html: false,
			className: true,
		},
		save: () => <InnerBlocks.Content />,
	},
];

registerBlockType( metadata.name, {
	icon,
	edit: Edit,
	save,
	deprecated,
} );
