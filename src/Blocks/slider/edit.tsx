/**
 * Slider Block - Editor Component
 *
 * @package Aegis
 * @since   1.0.0
 */

import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	ToggleControl,
	RangeControl,
	TextControl,
} from '@wordpress/components';

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
}

interface EditProps {
	attributes: SliderAttributes;
	setAttributes: ( attrs: Partial<SliderAttributes> ) => void;
}

const ALLOWED_BLOCKS = [ 'aegis/slide' ];

const TEMPLATE: [ string, Record<string, unknown> ][] = [
	[ 'aegis/slide', {} ],
	[ 'aegis/slide', {} ],
	[ 'aegis/slide', {} ],
];

export default function Edit( { attributes, setAttributes }: EditProps ) {
	const blockProps = useBlockProps( {
		className: `aegis-slider-editor aegis-slider-type-${ attributes.type }`,
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Slider Settings', 'aegis' ) }>
					<SelectControl
						label={ __( 'Type', 'aegis' ) }
						value={ attributes.type }
						options={ [
							{ label: __( 'Slider', 'aegis' ), value: 'slider' },
							{ label: __( 'Marquee', 'aegis' ), value: 'marquee' },
						] }
						onChange={ ( value ) => setAttributes( { type: value } ) }
					/>
					<RangeControl
						label={ __( 'Slides Per Page', 'aegis' ) }
						value={ attributes.perPage }
						onChange={ ( value ) => setAttributes( { perPage: value } ) }
						min={ 1 }
						max={ 6 }
					/>
					<RangeControl
						label={ __( 'Slides Per Move', 'aegis' ) }
						value={ attributes.perMove }
						onChange={ ( value ) => setAttributes( { perMove: value } ) }
						min={ 1 }
						max={ attributes.perPage }
					/>
					<RangeControl
						label={ __( 'Transition Speed (ms)', 'aegis' ) }
						value={ attributes.speed }
						onChange={ ( value ) => setAttributes( { speed: value } ) }
						min={ 100 }
						max={ 2000 }
						step={ 100 }
					/>
					<SelectControl
						label={ __( 'Direction', 'aegis' ) }
						value={ attributes.direction }
						options={ [
							{ label: __( 'Left to Right', 'aegis' ), value: 'ltr' },
							{ label: __( 'Right to Left', 'aegis' ), value: 'rtl' },
							{ label: __( 'Top to Bottom', 'aegis' ), value: 'ttb' },
						] }
						onChange={ ( value ) => setAttributes( { direction: value } ) }
					/>
					{ attributes.direction === 'ttb' && (
						<TextControl
							label={ __( 'Height', 'aegis' ) }
							value={ attributes.height }
							onChange={ ( value ) => setAttributes( { height: value } ) }
							help={ __( 'Required for vertical sliders (e.g. 400px).', 'aegis' ) }
						/>
					) }
				</PanelBody>

				<PanelBody title={ __( 'Autoplay', 'aegis' ) } initialOpen={ false }>
					<ToggleControl
						label={ __( 'Enable Autoplay', 'aegis' ) }
						checked={ attributes.autoplay }
						onChange={ ( value ) => setAttributes( { autoplay: value } ) }
					/>
					{ attributes.autoplay && (
						<>
							<RangeControl
								label={ __( 'Interval (ms)', 'aegis' ) }
								value={ attributes.interval }
								onChange={ ( value ) => setAttributes( { interval: value } ) }
								min={ 1000 }
								max={ 15000 }
								step={ 500 }
							/>
							<ToggleControl
								label={ __( 'Pause on Hover', 'aegis' ) }
								checked={ attributes.pauseOnHover }
								onChange={ ( value ) => setAttributes( { pauseOnHover: value } ) }
							/>
						</>
					) }
				</PanelBody>

				<PanelBody title={ __( 'Navigation', 'aegis' ) } initialOpen={ false }>
					<ToggleControl
						label={ __( 'Show Arrows', 'aegis' ) }
						checked={ attributes.showArrows }
						onChange={ ( value ) => setAttributes( { showArrows: value } ) }
					/>
					<ToggleControl
						label={ __( 'Show Dots', 'aegis' ) }
						checked={ attributes.showDots }
						onChange={ ( value ) => setAttributes( { showDots: value } ) }
					/>
					<ToggleControl
						label={ __( 'Loop', 'aegis' ) }
						checked={ attributes.loop }
						onChange={ ( value ) => setAttributes( { loop: value } ) }
					/>
					<ToggleControl
						label={ __( 'Drag', 'aegis' ) }
						checked={ attributes.drag }
						onChange={ ( value ) => setAttributes( { drag: value } ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Responsive', 'aegis' ) } initialOpen={ false }>
					<ToggleControl
						label={ __( 'Enable Responsive Breakpoints', 'aegis' ) }
						checked={ attributes.breakpoints }
						onChange={ ( value ) => setAttributes( { breakpoints: value } ) }
						help={ __( 'Automatically reduces slides per page on smaller screens.', 'aegis' ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div className="aegis-slider-editor__preview">
				<div className="aegis-slider-editor__label">
					{ __( 'Slider', 'aegis' ) }
					<span className="aegis-slider-editor__badge">
						{ attributes.perPage } { __( 'per page', 'aegis' ) }
					</span>
				</div>
				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ TEMPLATE }
					orientation="horizontal"
				/>
			</div>
		</div>
	);
}
