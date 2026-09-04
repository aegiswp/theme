/**
 * Related Posts Block - Editor Component
 *
 * @package
 * @since   1.0.0
 */

import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	SelectControl,
	ToggleControl,
	TextControl,
	ButtonGroup,
	Button,
	Placeholder,
} from '@wordpress/components';
import ServerSideRender from '@wordpress/server-side-render';

interface RelatedPostsAttributes {
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
}

interface EditProps {
	attributes: RelatedPostsAttributes;
	setAttributes: ( attrs: Partial< RelatedPostsAttributes > ) => void;
}

const STYLE_VARIANTS = [
	{ label: __( 'Grid', 'aegis' ), value: 'grid' },
	{ label: __( 'List', 'aegis' ), value: 'list' },
	{ label: __( 'Cards', 'aegis' ), value: 'cards' },
	{ label: __( 'Minimal', 'aegis' ), value: 'minimal' },
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

export default function Edit( { attributes, setAttributes }: EditProps ) {
	const blockProps = useBlockProps();

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
						value={ attributes.columns }
						onChange={ ( value ) => {
							if ( undefined !== value ) {
								setAttributes( { columns: value } );
							}
						} }
						min={ 1 }
						max={ 4 }
					/>
					{ attributes.showExcerpt && (
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
					{ attributes.showFeaturedImage && (
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
					<ToggleControl
						label={ __( 'Show Featured Image', 'aegis' ) }
						checked={ attributes.showFeaturedImage }
						onChange={ ( value ) =>
							setAttributes( { showFeaturedImage: value } )
						}
					/>
					<ToggleControl
						label={ __( 'Show Date', 'aegis' ) }
						checked={ attributes.showDate }
						onChange={ ( value ) =>
							setAttributes( { showDate: value } )
						}
					/>
					<ToggleControl
						label={ __( 'Show Excerpt', 'aegis' ) }
						checked={ attributes.showExcerpt }
						onChange={ ( value ) =>
							setAttributes( { showExcerpt: value } )
						}
					/>
					<ToggleControl
						label={ __( 'Show Category', 'aegis' ) }
						checked={ attributes.showCategory }
						onChange={ ( value ) =>
							setAttributes( { showCategory: value } )
						}
					/>
				</PanelBody>

				<PanelBody
					title={ __( 'Style Variant', 'aegis' ) }
					initialOpen={ false }
				>
					<ButtonGroup className="aegis-related-posts-variants">
						{ STYLE_VARIANTS.map( ( variant ) => (
							<Button
								key={ variant.value }
								variant={
									attributes.styleVariant === variant.value
										? 'primary'
										: 'secondary'
								}
								onClick={ () =>
									setAttributes( {
										styleVariant: variant.value,
									} )
								}
							>
								{ variant.label }
							</Button>
						) ) }
					</ButtonGroup>
				</PanelBody>

				<PanelBody
					title={ __( 'Query', 'aegis' ) }
					initialOpen={ false }
				>
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
					<SelectControl
						label={ __( 'Order By', 'aegis' ) }
						value={ attributes.orderBy }
						options={ ORDER_BY_OPTIONS }
						onChange={ ( value ) =>
							setAttributes( { orderBy: value } )
						}
					/>
					{ 'rand' !== attributes.orderBy && (
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
				</PanelBody>
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
