/**
 * Slider Block - Editor Component
 *
 * @package
 * @since   1.0.0
 */

import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
	InnerBlocks,
	store as blockEditorStore,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	ToggleControl,
	RangeControl,
	TextControl,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';

interface SliderAttributes {
	type: string;
	perPage: number;
	perMove: number;
	autoplay: boolean;
	pauseOnHover: boolean;
	loop: boolean;
	drag: boolean;
	showArrows: boolean;
	showDots: boolean;
	speed: number;
	interval: number;
	direction: string;
	height: string;
	breakpoints: boolean;
	keyboard: boolean;
}

interface EditProps {
	attributes: SliderAttributes;
	setAttributes: ( attrs: Partial< SliderAttributes > ) => void;
	clientId: string;
}

interface SliderFeatures {
	slide: boolean;
	fade: boolean;
	navigation: boolean;
	pagination: boolean;
	loop: boolean;
	keyboard: boolean;
	responsive: boolean;
	autoplay: boolean;
}

declare global {
	interface Window {
		aegisSliderFeatures?: Partial< SliderFeatures >;
	}
}

const ALLOWED_BLOCKS = [ 'aegis/slide' ];

const TEMPLATE: [ string, Record< string, unknown > ][] = [
	[ 'aegis/slide', {} ],
	[ 'aegis/slide', {} ],
	[ 'aegis/slide', {} ],
];

function sliderFeatures(): SliderFeatures {
	const raw = window.aegisSliderFeatures;

	if ( ! raw ) {
		return {
			slide: true,
			fade: true,
			navigation: true,
			pagination: true,
			loop: true,
			keyboard: true,
			responsive: true,
			autoplay: true,
		};
	}

	return {
		slide: !! raw.slide,
		fade: !! raw.fade,
		navigation: !! raw.navigation,
		pagination: !! raw.pagination,
		loop: !! raw.loop,
		keyboard: !! raw.keyboard,
		responsive: !! raw.responsive,
		autoplay: !! raw.autoplay,
	};
}

export default function Edit( { attributes, setAttributes, clientId }: EditProps ) {
	const extras = sliderFeatures();
	const previewPerPage =
		attributes.type === 'fade' ? 1 : Math.max( 1, attributes.perPage || 1 );
	const slideCount = useSelect(
		( select ) => select( blockEditorStore ).getBlockCount( clientId ),
		[ clientId ]
	);
	const showArrows = extras.navigation && attributes.showArrows;
	const showDots = extras.pagination && attributes.showDots;
	const blockProps = useBlockProps( {
		className: `aegis-slider-editor aegis-slider-type-${ attributes.type }`,
		style: {
			'--aegis-slider-per-page': String( previewPerPage ),
		} as Record< string, string >,
	} );
	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'aegis-slider-editor__list' },
		{
			allowedBlocks: ALLOWED_BLOCKS,
			template: TEMPLATE,
			orientation: 'horizontal',
			renderAppender: InnerBlocks.ButtonBlockAppender,
		}
	);

	const typeOptions = [
		{ label: __( 'Slider', 'aegis' ), value: 'slider' },
		{
			label: __( 'Marquee', 'aegis' ),
			value: 'marquee',
		},
		extras.fade
			? { label: __( 'Fade', 'aegis' ), value: 'fade' }
			: null,
	].filter( Boolean ) as { label: string; value: string }[];

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Slider Settings', 'aegis' ) }>
					<SelectControl
						label={ __( 'Type', 'aegis' ) }
						value={ attributes.type }
						options={ typeOptions }
						onChange={ ( value ) =>
							setAttributes(
								value === 'fade'
									? { type: value, perPage: 1 }
									: { type: value }
							)
						}
					/>
					<RangeControl
						label={ __( 'Slides Per Page', 'aegis' ) }
						value={ attributes.perPage }
						onChange={ ( value ) =>
							setAttributes( { perPage: value } )
						}
						min={ 1 }
						max={ attributes.type === 'fade' ? 1 : 6 }
					/>
					<RangeControl
						label={ __( 'Slides Per Move', 'aegis' ) }
						value={ attributes.perMove }
						onChange={ ( value ) =>
							setAttributes( { perMove: value } )
						}
						min={ 1 }
						max={ attributes.perPage }
					/>
					<RangeControl
						label={ __( 'Transition Speed (ms)', 'aegis' ) }
						value={ attributes.speed }
						onChange={ ( value ) =>
							setAttributes( { speed: value } )
						}
						min={ 100 }
						max={ 2000 }
						step={ 100 }
					/>
					<SelectControl
						label={ __( 'Direction', 'aegis' ) }
						value={ attributes.direction }
						options={ [
							{
								label: __( 'Left to Right', 'aegis' ),
								value: 'ltr',
							},
							{
								label: __( 'Right to Left', 'aegis' ),
								value: 'rtl',
							},
							{
								label: __( 'Top to Bottom', 'aegis' ),
								value: 'ttb',
							},
						] }
						onChange={ ( value ) =>
							setAttributes( { direction: value } )
						}
					/>
					{ attributes.direction === 'ttb' && (
						<TextControl
							label={ __( 'Height', 'aegis' ) }
							value={ attributes.height }
							onChange={ ( value ) =>
								setAttributes( { height: value } )
							}
							help={ __(
								'Required for vertical sliders (e.g. 400px).',
								'aegis'
							) }
						/>
					) }
				</PanelBody>

				{ extras.autoplay && (
					<PanelBody
						title={ __( 'Autoplay', 'aegis' ) }
						initialOpen={ false }
					>
						<ToggleControl
							label={ __( 'Enable Autoplay', 'aegis' ) }
							checked={ attributes.autoplay }
							onChange={ ( value ) =>
								setAttributes( { autoplay: value } )
							}
						/>
						{ attributes.autoplay && (
							<>
								<RangeControl
									label={ __( 'Interval (ms)', 'aegis' ) }
									value={ attributes.interval }
									onChange={ ( value ) =>
										setAttributes( { interval: value } )
									}
									min={ 1000 }
									max={ 15000 }
									step={ 500 }
								/>
								<ToggleControl
									label={ __( 'Pause on Hover', 'aegis' ) }
									checked={ attributes.pauseOnHover }
									onChange={ ( value ) =>
										setAttributes( { pauseOnHover: value } )
									}
								/>
							</>
						) }
					</PanelBody>
				) }

				<PanelBody
					title={ __( 'Navigation', 'aegis' ) }
					initialOpen={ false }
				>
					{ extras.navigation && (
						<ToggleControl
							label={ __( 'Show Arrows', 'aegis' ) }
							checked={ attributes.showArrows }
							onChange={ ( value ) =>
								setAttributes( { showArrows: value } )
							}
						/>
					) }
					{ extras.pagination && (
						<ToggleControl
							label={ __( 'Show Dots', 'aegis' ) }
							checked={ attributes.showDots }
							onChange={ ( value ) =>
								setAttributes( { showDots: value } )
							}
						/>
					) }
					{ extras.loop && (
						<ToggleControl
							label={ __( 'Loop', 'aegis' ) }
							checked={ attributes.loop }
							onChange={ ( value ) =>
								setAttributes( { loop: value } )
							}
						/>
					) }
					<ToggleControl
						label={ __( 'Drag', 'aegis' ) }
						checked={ attributes.drag }
						onChange={ ( value ) =>
							setAttributes( { drag: value } )
						}
					/>
					{ extras.keyboard && (
						<ToggleControl
							label={ __( 'Keyboard Navigation', 'aegis' ) }
							checked={ attributes.keyboard }
							onChange={ ( value ) =>
								setAttributes( { keyboard: value } )
							}
							help={ __(
								'Arrow keys move slides when the slider is focused.',
								'aegis'
							) }
						/>
					) }
				</PanelBody>

				{ extras.responsive && (
					<PanelBody
						title={ __( 'Responsive', 'aegis' ) }
						initialOpen={ false }
					>
						<ToggleControl
							label={ __(
								'Enable Responsive Breakpoints',
								'aegis'
							) }
							checked={ attributes.breakpoints }
							onChange={ ( value ) =>
								setAttributes( { breakpoints: value } )
							}
							help={ __(
								'Automatically reduces slides per page on smaller screens.',
								'aegis'
							) }
						/>
					</PanelBody>
				) }
			</InspectorControls>

			<div className="aegis-slider-editor__preview">
				<div className="aegis-slider-editor__label">
					{ __( 'Slider', 'aegis' ) }
					<span className="aegis-slider-editor__badge">
						{ previewPerPage } { __( 'per page', 'aegis' ) }
					</span>
				</div>
				<div className="aegis-slider-editor__viewport">
					{ showArrows && (
						<span
							className="aegis-slider-editor__arrow is-prev"
							aria-hidden="true"
						/>
					) }
					<div { ...innerBlocksProps } />
					{ showArrows && (
						<span
							className="aegis-slider-editor__arrow is-next"
							aria-hidden="true"
						/>
					) }
				</div>
				{ showDots && slideCount > 0 && (
					<div
						className="aegis-slider-editor__dots"
						aria-hidden="true"
					>
						{ Array.from( { length: slideCount } ).map(
							( _, index ) => (
								<span
									key={ index }
									className={
										index === 0
											? 'is-active'
											: undefined
									}
								/>
							)
						) }
					</div>
				) }
			</div>
		</div>
	);
}
