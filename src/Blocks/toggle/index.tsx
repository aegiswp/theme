/**
 * Toggle Block
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
	RichText,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	ToggleControl,
	RangeControl,
} from '@wordpress/components';
import { SVG, Path } from '@wordpress/primitives';

import metadata from './block.json';

interface ToggleAttributes {
	heading: string;
	headingTag: string;
	isOpen: boolean;
	iconPosition: string;
	iconType: string;
	allowMultiple: boolean;
	animationDuration: number;
}

interface EditProps {
	attributes: ToggleAttributes;
	setAttributes: ( attrs: Partial<ToggleAttributes> ) => void;
}

const ALLOWED_BLOCKS = [ 'aegis/toggle-content' ];

const TEMPLATE: [ string, Record<string, unknown> ][] = [
	[ 'aegis/toggle-content', {} ],
];

function Edit( { attributes, setAttributes }: EditProps ) {
	const blockProps = useBlockProps( {
		className: `aegis-toggle aegis-toggle--icon-${ attributes.iconPosition }`,
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Toggle Settings', 'aegis' ) }>
					<SelectControl
						label={ __( 'Heading Tag', 'aegis' ) }
						value={ attributes.headingTag }
						options={ [
							{ label: __( 'H2', 'aegis' ), value: 'h2' },
							{ label: __( 'H3', 'aegis' ), value: 'h3' },
							{ label: __( 'H4', 'aegis' ), value: 'h4' },
							{ label: __( 'H5', 'aegis' ), value: 'h5' },
							{ label: __( 'H6', 'aegis' ), value: 'h6' },
							{ label: __( 'Paragraph', 'aegis' ), value: 'p' },
						] }
						onChange={ ( value ) => setAttributes( { headingTag: value } ) }
					/>
					<ToggleControl
						label={ __( 'Open by Default', 'aegis' ) }
						checked={ attributes.isOpen }
						onChange={ ( value ) => setAttributes( { isOpen: value } ) }
					/>
					<SelectControl
						label={ __( 'Icon Position', 'aegis' ) }
						value={ attributes.iconPosition }
						options={ [
							{ label: __( 'Left', 'aegis' ), value: 'left' },
							{ label: __( 'Right', 'aegis' ), value: 'right' },
						] }
						onChange={ ( value ) => setAttributes( { iconPosition: value } ) }
					/>
					<SelectControl
						label={ __( 'Icon Type', 'aegis' ) }
						value={ attributes.iconType }
						options={ [
							{ label: __( 'Chevron', 'aegis' ), value: 'chevron' },
							{ label: __( 'Plus/Minus', 'aegis' ), value: 'plus' },
							{ label: __( 'Arrow', 'aegis' ), value: 'arrow' },
						] }
						onChange={ ( value ) => setAttributes( { iconType: value } ) }
					/>
					<RangeControl
						label={ __( 'Animation Duration (ms)', 'aegis' ) }
						value={ attributes.animationDuration }
						onChange={ ( value ) => setAttributes( { animationDuration: value } ) }
						min={ 0 }
						max={ 1000 }
						step={ 50 }
					/>
					<ToggleControl
						label={ __( 'Allow Multiple Open', 'aegis' ) }
						checked={ attributes.allowMultiple }
						onChange={ ( value ) => setAttributes( { allowMultiple: value } ) }
						help={ __( 'Allow multiple toggles to be open at the same time.', 'aegis' ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div className="aegis-toggle__header">
				<RichText
					tagName={ attributes.headingTag as keyof HTMLElementTagNameMap }
					className="aegis-toggle__heading"
					value={ attributes.heading }
					onChange={ ( value ) => setAttributes( { heading: value } ) }
					placeholder={ __( 'Toggle heading…', 'aegis' ) }
				/>
				<span className="aegis-toggle__icon" aria-hidden="true">
					{ attributes.iconType === 'chevron' && (
						<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
							<Path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" />
						</SVG>
					) }
					{ attributes.iconType === 'plus' && (
						<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
							<Path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
						</SVG>
					) }
					{ attributes.iconType === 'arrow' && (
						<SVG xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
							<Path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z" />
						</SVG>
					) }
				</span>
			</div>
			<div className="aegis-toggle__body">
				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ TEMPLATE }
				/>
			</div>
		</div>
	);
}

function save() {
	return <InnerBlocks.Content />;
}

registerBlockType( metadata.name, {
	edit: Edit,
	save,
} );
