/**
 * Related Posts Block - Editor Component
 *
 * @package
 * @since   1.0.0
 */

import type { CSSProperties, ReactNode } from 'react';
import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	SelectControl,
	TextControl,
	Placeholder,
} from '@wordpress/components';
import ServerSideRender from '@wordpress/server-side-render';

export type RelatedPostsAttributes = {
	postsPerPage: number;
	columns: number;
	showFeaturedImage: boolean;
	showDate: boolean;
	showExcerpt: boolean;
	showCategory: boolean;
	heading: string;
	headingTag: string;
	styleVariant: string;
	taxonomySource: string;
	orderBy: string;
	order: string;
	fallbackBehavior: string;
	excerptLength: number;
	imageAspectRatio: string;
};

interface EditProps {
	attributes: RelatedPostsAttributes;
	setAttributes: ( attrs: Partial< RelatedPostsAttributes > ) => void;
}

interface RelatedPostsFeatures {
	taxonomySource: boolean;
	orderBy: boolean;
	fallback: boolean;
	styleVariants: boolean;
	excerptLength: boolean;
	imageRatio: boolean;
}

declare global {
	interface Window {
		aegisRelatedPostsFeatures?: Partial< RelatedPostsFeatures >;
	}
}

const STYLE_VARIANTS = [
	{ label: __( 'Grid', 'aegis' ), value: 'grid' },
	{ label: __( 'List', 'aegis' ), value: 'list' },
	{ label: __( 'Cards', 'aegis' ), value: 'cards' },
	{ label: __( 'Minimal', 'aegis' ), value: 'minimal' },
] as const;

type StyleVariantValue = ( typeof STYLE_VARIANTS )[ number ][ 'value' ];

const DISPLAY_OPTIONS = [
	{
		label: __( 'Featured Image', 'aegis' ),
		attr: 'showFeaturedImage' as const,
	},
	{ label: __( 'Date', 'aegis' ), attr: 'showDate' as const },
	{ label: __( 'Excerpt', 'aegis' ), attr: 'showExcerpt' as const },
	{ label: __( 'Category', 'aegis' ), attr: 'showCategory' as const },
];

const HEADING_TAGS = [
	{ label: __( 'H2', 'aegis' ), value: 'h2' },
	{ label: __( 'H3', 'aegis' ), value: 'h3' },
	{ label: __( 'H4', 'aegis' ), value: 'h4' },
	{ label: __( 'H5', 'aegis' ), value: 'h5' },
	{ label: __( 'H6', 'aegis' ), value: 'h6' },
];

const RELATED_BY_OPTIONS = [
	{ label: __( 'Auto (all public taxonomies)', 'aegis' ), value: 'auto' },
	{ label: __( 'Category', 'aegis' ), value: 'category' },
	{ label: __( 'Tag', 'aegis' ), value: 'post_tag' },
	{ label: __( 'Author', 'aegis' ), value: 'author' },
];

const ORDER_BY_OPTIONS = [
	{ label: __( 'Date', 'aegis' ), value: 'date' },
	{ label: __( 'Title', 'aegis' ), value: 'title' },
	{ label: __( 'Random', 'aegis' ), value: 'rand' },
];

const ORDER_OPTIONS = [
	{ label: __( 'Newest to oldest', 'aegis' ), value: 'desc' },
	{ label: __( 'Oldest to newest', 'aegis' ), value: 'asc' },
];

const TITLE_ORDER_OPTIONS = [
	{ label: __( 'A to Z', 'aegis' ), value: 'asc' },
	{ label: __( 'Z to A', 'aegis' ), value: 'desc' },
];

const FALLBACK_OPTIONS = [
	{ label: __( 'Show latest posts', 'aegis' ), value: 'latest' },
	{ label: __( 'Hide block', 'aegis' ), value: 'hide' },
];

const ASPECT_RATIO_OPTIONS = [
	{ label: '16:9', value: '16/9' },
	{ label: '4:3', value: '4/3' },
	{ label: '1:1', value: '1/1' },
	{ label: '3:2', value: '3/2' },
];

function relatedPostsFeatures(): RelatedPostsFeatures {
	const raw = window.aegisRelatedPostsFeatures;

	if ( ! raw ) {
		return {
			taxonomySource: true,
			orderBy: true,
			fallback: true,
			styleVariants: true,
			excerptLength: true,
			imageRatio: true,
		};
	}

	return {
		taxonomySource: !! raw.taxonomySource,
		orderBy: !! raw.orderBy,
		fallback: !! raw.fallback,
		styleVariants: !! raw.styleVariants,
		excerptLength: !! raw.excerptLength,
		imageRatio: !! raw.imageRatio,
	};
}

function DisplayGlyph( {
	field,
}: {
	field: ( typeof DISPLAY_OPTIONS )[ number ][ 'attr' ];
} ) {
	const muted = 'rgba(30,30,30,0.28)';
	const fg = '#1e1e1e';

	if ( 'showFeaturedImage' === field ) {
		return (
			<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
				<rect
					x="18"
					y="8"
					width="60"
					height="32"
					rx="3"
					fill="#dcdcde"
					stroke="#c3c4c7"
					strokeWidth="1"
				/>
				<path d="M26 32 L40 20 L50 28 L58 22 L72 32 Z" fill={ muted } />
				<circle cx="34" cy="16" r="4" fill={ muted } />
			</svg>
		);
	}

	if ( 'showDate' === field ) {
		return (
			<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
				<rect
					x="30"
					y="10"
					width="36"
					height="28"
					rx="3"
					fill="#fff"
					stroke="#c3c4c7"
					strokeWidth="1.2"
				/>
				<rect x="30" y="10" width="36" height="8" rx="3" fill={ fg } />
				<rect x="30" y="15" width="36" height="3" fill={ fg } />
				<circle cx="38" cy="12" r="1.2" fill="#fff" />
				<circle cx="58" cy="12" r="1.2" fill="#fff" />
				<rect
					x="36"
					y="24"
					width="6"
					height="5"
					rx="1"
					fill={ muted }
				/>
				<rect
					x="45"
					y="24"
					width="6"
					height="5"
					rx="1"
					fill={ fg }
					opacity="0.55"
				/>
				<rect
					x="54"
					y="24"
					width="6"
					height="5"
					rx="1"
					fill={ muted }
				/>
				<rect
					x="36"
					y="31"
					width="6"
					height="5"
					rx="1"
					fill={ muted }
				/>
				<rect
					x="45"
					y="31"
					width="6"
					height="5"
					rx="1"
					fill={ muted }
				/>
			</svg>
		);
	}

	if ( 'showExcerpt' === field ) {
		return (
			<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
				<rect
					x="18"
					y="14"
					width="60"
					height="3.5"
					rx="1.5"
					fill={ fg }
					opacity="0.75"
				/>
				<rect
					x="18"
					y="22"
					width="52"
					height="3"
					rx="1.5"
					fill={ muted }
				/>
				<rect
					x="18"
					y="29.5"
					width="44"
					height="3"
					rx="1.5"
					fill={ muted }
				/>
			</svg>
		);
	}

	return (
		<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
			<rect
				x="28"
				y="18"
				width="40"
				height="12"
				rx="6"
				fill="#fff"
				stroke={ fg }
				strokeWidth="1.4"
			/>
			<rect
				x="36"
				y="22.5"
				width="24"
				height="3"
				rx="1.5"
				fill={ muted }
			/>
		</svg>
	);
}

function StyleVariantGlyph( { variant }: { variant: StyleVariantValue } ) {
	const muted = 'rgba(30,30,30,0.28)';
	const fg = '#1e1e1e';
	const card = '#fff';
	const stroke = '#c3c4c7';

	if ( 'grid' === variant ) {
		const cell = ( x: number, y: number ) => (
			<g key={ `${ x }-${ y }` }>
				<rect
					x={ x }
					y={ y }
					width="24"
					height="18"
					rx="2"
					fill={ card }
					stroke={ stroke }
					strokeWidth="1"
				/>
				<rect
					x={ x + 3 }
					y={ y + 3 }
					width="18"
					height="7"
					rx="1"
					fill="#dcdcde"
				/>
				<rect
					x={ x + 3 }
					y={ y + 12 }
					width="14"
					height="2"
					rx="1"
					fill={ fg }
					opacity="0.65"
				/>
			</g>
		);
		return (
			<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
				{ cell( 10, 5 ) }
				{ cell( 38, 5 ) }
				{ cell( 66, 5 ) }
				{ cell( 10, 26 ) }
				{ cell( 38, 26 ) }
				{ cell( 66, 26 ) }
			</svg>
		);
	}

	if ( 'list' === variant ) {
		const row = ( y: number ) => (
			<g key={ y }>
				<rect
					x="10"
					y={ y }
					width="20"
					height="14"
					rx="2"
					fill="#dcdcde"
					stroke={ stroke }
					strokeWidth="1"
				/>
				<rect
					x="36"
					y={ y + 2 }
					width="40"
					height="2.5"
					rx="1"
					fill={ fg }
					opacity="0.7"
				/>
				<rect
					x="36"
					y={ y + 7 }
					width="28"
					height="2"
					rx="1"
					fill={ muted }
				/>
			</g>
		);
		return (
			<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
				{ row( 6 ) }
				{ row( 24 ) }
			</svg>
		);
	}

	if ( 'cards' === variant ) {
		const cardCell = ( x: number ) => (
			<g key={ x }>
				<rect
					x={ x }
					y="8"
					width="34"
					height="32"
					rx="3"
					fill={ card }
					stroke={ stroke }
					strokeWidth="1.2"
				/>
				<rect
					x={ x }
					y="8"
					width="34"
					height="14"
					rx="3"
					fill="#dcdcde"
				/>
				<rect x={ x } y="19" width="34" height="3" fill="#dcdcde" />
				<rect
					x={ x + 4 }
					y="26"
					width="22"
					height="2.5"
					rx="1"
					fill={ fg }
					opacity="0.7"
				/>
				<rect
					x={ x + 4 }
					y="31"
					width="16"
					height="2"
					rx="1"
					fill={ muted }
				/>
			</g>
		);
		return (
			<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
				{ cardCell( 12 ) }
				{ cardCell( 50 ) }
			</svg>
		);
	}

	return (
		<svg viewBox="0 0 96 48" width="96" height="48" aria-hidden="true">
			<rect
				x="18"
				y="12"
				width="60"
				height="3"
				rx="1.5"
				fill={ fg }
				opacity="0.8"
			/>
			<rect x="28" y="20" width="40" height="2.5" rx="1" fill={ muted } />
			<rect
				x="22"
				y="28"
				width="52"
				height="3"
				rx="1.5"
				fill={ fg }
				opacity="0.75"
			/>
			<rect x="30" y="36" width="36" height="2.5" rx="1" fill={ muted } />
		</svg>
	);
}

function VisualPicker( {
	label,
	help,
	ariaLabel,
	children,
}: {
	label?: string;
	help?: string;
	ariaLabel: string;
	children: ReactNode;
} ) {
	return (
		<div className="aegis-related-posts-picker">
			{ label ? (
				<p className="aegis-related-posts-picker__label">{ label }</p>
			) : null }
			<div
				className="aegis-related-posts-picker__grid"
				role="listbox"
				aria-label={ ariaLabel }
			>
				{ children }
			</div>
			{ help ? (
				<p className="aegis-related-posts-picker__help">{ help }</p>
			) : null }
		</div>
	);
}

function PickerOption( {
	selected,
	label,
	onSelect,
	glyph,
}: {
	selected: boolean;
	label: string;
	onSelect: () => void;
	glyph: ReactNode;
} ) {
	return (
		<button
			type="button"
			role="option"
			aria-selected={ selected }
			className={
				'aegis-related-posts-picker__option' +
				( selected ? ' is-selected' : '' )
			}
			onClick={ onSelect }
		>
			<span className="aegis-related-posts-picker__glyph">{ glyph }</span>
			<span className="aegis-related-posts-picker__name">{ label }</span>
		</button>
	);
}

export default function Edit( { attributes, setAttributes }: EditProps ) {
	const extras = relatedPostsFeatures();
	const showQueryPanel =
		extras.taxonomySource || extras.orderBy || extras.fallback;
	const columns = Math.min( 4, Math.max( 1, attributes.columns || 3 ) );

	const blockProps = useBlockProps( {
		className: `is-style-${ attributes.styleVariant } columns-${ columns }`,
		style: {
			'--aegis-related-columns': String( columns ),
		} as CSSProperties,
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody
					title={ __( 'Content', 'aegis' ) }
					initialOpen={ true }
				>
					<TextControl
						label={ __( 'Heading', 'aegis' ) }
						value={ attributes.heading }
						onChange={ ( value ) =>
							setAttributes( { heading: value } )
						}
					/>
					<SelectControl
						label={ __( 'Heading Tag', 'aegis' ) }
						value={ attributes.headingTag }
						options={ HEADING_TAGS }
						onChange={ ( value ) =>
							setAttributes( { headingTag: value } )
						}
					/>
					<RangeControl
						label={ __( 'Number of Posts', 'aegis' ) }
						value={ attributes.postsPerPage }
						onChange={ ( value ) => {
							if ( undefined !== value ) {
								setAttributes( { postsPerPage: value } );
							}
						} }
						min={ 1 }
						max={ 12 }
					/>
					<RangeControl
						label={ __( 'Columns', 'aegis' ) }
						value={ columns }
						onChange={ ( value ) => {
							if ( undefined === value ) {
								return;
							}
							const next: Partial< RelatedPostsAttributes > = {
								columns: value,
							};
							// Keep enough posts to fill every column in the preview.
							if ( attributes.postsPerPage < value ) {
								next.postsPerPage = value;
							}
							setAttributes( next );
						} }
						min={ 1 }
						max={ 4 }
						help={ __(
							'Lays related posts out in a grid. Use this control instead of wrapping the block in Columns or Grid.',
							'aegis'
						) }
					/>
					{ extras.excerptLength && attributes.showExcerpt && (
						<RangeControl
							label={ __( 'Excerpt Length (words)', 'aegis' ) }
							value={ attributes.excerptLength }
							onChange={ ( value ) => {
								if ( undefined !== value ) {
									setAttributes( { excerptLength: value } );
								}
							} }
							min={ 5 }
							max={ 55 }
							step={ 5 }
						/>
					) }
					{ extras.imageRatio && attributes.showFeaturedImage && (
						<SelectControl
							label={ __( 'Image Aspect Ratio', 'aegis' ) }
							value={ attributes.imageAspectRatio }
							options={ ASPECT_RATIO_OPTIONS }
							onChange={ ( value ) =>
								setAttributes( { imageAspectRatio: value } )
							}
						/>
					) }
				</PanelBody>

				<PanelBody
					title={ __( 'Display', 'aegis' ) }
					initialOpen={ false }
				>
					<VisualPicker
						ariaLabel={ __( 'Display fields', 'aegis' ) }
						help={ __(
							'Choose which fields appear on each related post. Selected cards are shown.',
							'aegis'
						) }
					>
						{ DISPLAY_OPTIONS.map( ( option ) => (
							<PickerOption
								key={ option.attr }
								selected={ attributes[ option.attr ] }
								label={ option.label }
								glyph={ <DisplayGlyph field={ option.attr } /> }
								onSelect={ () =>
									setAttributes( {
										[ option.attr ]:
											! attributes[ option.attr ],
									} )
								}
							/>
						) ) }
					</VisualPicker>
				</PanelBody>

				{ extras.styleVariants && (
					<PanelBody
						title={ __( 'Style Variant', 'aegis' ) }
						initialOpen={ false }
					>
						<VisualPicker
							ariaLabel={ __( 'Style variant', 'aegis' ) }
							help={ __(
								'Grid and Cards favor multi-column layouts. List and Minimal stack as a single column.',
								'aegis'
							) }
						>
							{ STYLE_VARIANTS.map( ( variant ) => (
								<PickerOption
									key={ variant.value }
									selected={
										attributes.styleVariant ===
										variant.value
									}
									label={ variant.label }
									glyph={
										<StyleVariantGlyph
											variant={ variant.value }
										/>
									}
									onSelect={ () => {
										const next: Partial< RelatedPostsAttributes > =
											{
												styleVariant: variant.value,
											};
										// Grid/cards read as multi-column; list/minimal as a single stack.
										if (
											'grid' === variant.value ||
											'cards' === variant.value
										) {
											if ( columns < 2 ) {
												next.columns = 3;
												if (
													attributes.postsPerPage < 3
												) {
													next.postsPerPage = 3;
												}
											}
										} else if (
											'list' === variant.value ||
											'minimal' === variant.value
										) {
											next.columns = 1;
										}
										setAttributes( next );
									} }
								/>
							) ) }
						</VisualPicker>
					</PanelBody>
				) }

				{ showQueryPanel && (
					<PanelBody
						title={ __( 'Query', 'aegis' ) }
						initialOpen={ false }
					>
						{ extras.taxonomySource && (
							<SelectControl
								label={ __( 'Related By', 'aegis' ) }
								value={ attributes.taxonomySource }
								options={ RELATED_BY_OPTIONS }
								onChange={ ( value ) =>
									setAttributes( { taxonomySource: value } )
								}
								help={ __(
									'Match posts that share taxonomies with the current post, or the same author.',
									'aegis'
								) }
							/>
						) }
						{ extras.orderBy && (
							<SelectControl
								label={ __( 'Order By', 'aegis' ) }
								value={ attributes.orderBy }
								options={ ORDER_BY_OPTIONS }
								onChange={ ( value ) =>
									setAttributes( { orderBy: value } )
								}
							/>
						) }
						{ extras.orderBy && 'rand' !== attributes.orderBy && (
							<SelectControl
								label={ __( 'Order', 'aegis' ) }
								value={ attributes.order }
								options={
									'title' === attributes.orderBy
										? TITLE_ORDER_OPTIONS
										: ORDER_OPTIONS
								}
								onChange={ ( value ) =>
									setAttributes( { order: value } )
								}
							/>
						) }
						{ extras.fallback && (
							<SelectControl
								label={ __( 'Fallback Behavior', 'aegis' ) }
								value={ attributes.fallbackBehavior }
								options={ FALLBACK_OPTIONS }
								onChange={ ( value ) =>
									setAttributes( { fallbackBehavior: value } )
								}
								help={ __(
									'What to do when no related posts are found.',
									'aegis'
								) }
							/>
						) }
					</PanelBody>
				) }
			</InspectorControls>

			<ServerSideRender
				block="aegis/related-posts"
				attributes={ attributes }
				httpMethod="POST"
				skipBlockSupportAttributes
				EmptyResponsePlaceholder={ () => (
					<Placeholder
						icon="admin-links"
						label={ __( 'Related Posts', 'aegis' ) }
						instructions={ __(
							'No posts available to preview.',
							'aegis'
						) }
					/>
				) }
			/>
		</div>
	);
}
