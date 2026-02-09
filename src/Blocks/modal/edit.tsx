/**
 * Modal Block - Editor Component
 *
 * @package Aegis
 * @since   1.0.0
 */

import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	SelectControl,
	ToggleControl,
	RangeControl,
	ColorPicker,
	Button,
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';

interface ModalAttributes {
	modalId: string;
	modalType: string;
	triggerType: string;
	triggerText: string;
	triggerIcon: string;
	triggerImageUrl: string;
	triggerImageAlt: string;
	modalTitle: string;
	animation: string;
	animationDuration: number;
	closeOnEsc: boolean;
	closeOnOverlay: boolean;
	showCloseButton: boolean;
	closeButtonPosition: string;
	preventBodyScroll: boolean;
	focusTrap: boolean;
	returnFocus: boolean;
	width: string;
	maxWidth: string;
	height: string;
	maxHeight: string;
	overlayColor: string;
	overlayBlur: number;
	backgroundColor: string;
	borderRadius: string;
	padding: string;
	scrollTriggerPercent: number;
	scrollTriggerOnce: boolean;
	exitIntentSensitivity: number;
	exitIntentDelay: number;
	timedTriggerDelay: number;
	autoCloseDelay: number;
	showOnce: boolean;
	showOnceExpiry: number;
	deviceVisibility: string[];
}

interface EditProps {
	attributes: ModalAttributes;
	setAttributes: ( attrs: Partial<ModalAttributes> ) => void;
	clientId: string;
}

export default function Edit( { attributes, setAttributes, clientId }: EditProps ) {
	const blockProps = useBlockProps( {
		className: `aegis-modal-editor aegis-modal-type-${ attributes.modalType }`,
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				{ /* Modal Settings */ }
				<PanelBody title={ __( 'Modal Settings', 'aegis' ) }>
					<SelectControl
						label={ __( 'Modal Type', 'aegis' ) }
						value={ attributes.modalType }
						options={ [
							{ label: __( 'Popup', 'aegis' ), value: 'popup' },
							{ label: __( 'Off-Canvas', 'aegis' ), value: 'off-canvas' },
							{ label: __( 'Bottom Sheet', 'aegis' ), value: 'bottom-sheet' },
							{ label: __( 'Fullscreen', 'aegis' ), value: 'fullscreen' },
						] }
						onChange={ ( value ) => setAttributes( { modalType: value } ) }
					/>
					<TextControl
						label={ __( 'Modal Title', 'aegis' ) }
						value={ attributes.modalTitle }
						onChange={ ( value ) => setAttributes( { modalTitle: value } ) }
						help={ __( 'Used for accessibility. Can be visually hidden.', 'aegis' ) }
					/>
					<TextControl
						label={ __( 'Modal ID', 'aegis' ) }
						value={ attributes.modalId }
						onChange={ ( value ) => setAttributes( { modalId: value } ) }
						help={ __( 'Unique identifier. Auto-generated if empty.', 'aegis' ) }
					/>
				</PanelBody>

				{ /* Trigger Settings */ }
				<PanelBody title={ __( 'Trigger Settings', 'aegis' ) } initialOpen={ false }>
					<SelectControl
						label={ __( 'Trigger Type', 'aegis' ) }
						value={ attributes.triggerType }
						options={ [
							{ label: __( 'Button', 'aegis' ), value: 'button' },
							{ label: __( 'Text', 'aegis' ), value: 'text' },
							{ label: __( 'Icon', 'aegis' ), value: 'icon' },
							{ label: __( 'Image', 'aegis' ), value: 'image' },
							{ label: __( 'Scroll Position', 'aegis' ), value: 'scroll' },
							{ label: __( 'Exit Intent', 'aegis' ), value: 'exit-intent' },
							{ label: __( 'Timed Delay', 'aegis' ), value: 'timed' },
						] }
						onChange={ ( value ) => setAttributes( { triggerType: value } ) }
					/>
					<TextControl
						label={ __( 'Trigger Text', 'aegis' ) }
						value={ attributes.triggerText }
						onChange={ ( value ) => setAttributes( { triggerText: value } ) }
					/>
					{ attributes.triggerType === 'image' && (
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media ) =>
									setAttributes( {
										triggerImageUrl: media.url,
										triggerImageAlt: media.alt,
									} )
								}
								allowedTypes={ [ 'image' ] }
								render={ ( { open } ) => (
									<Button onClick={ open } variant="secondary">
										{ attributes.triggerImageUrl
											? __( 'Replace Image', 'aegis' )
											: __( 'Select Image', 'aegis' ) }
									</Button>
								) }
							/>
						</MediaUploadCheck>
					) }
				</PanelBody>

				{ /* Behavior */ }
				<PanelBody title={ __( 'Behavior', 'aegis' ) } initialOpen={ false }>
					<SelectControl
						label={ __( 'Animation', 'aegis' ) }
						value={ attributes.animation }
						options={ [
							{ label: __( 'Fade', 'aegis' ), value: 'fade' },
							{ label: __( 'Slide Up', 'aegis' ), value: 'slide-up' },
							{ label: __( 'Slide Down', 'aegis' ), value: 'slide-down' },
							{ label: __( 'Slide Left', 'aegis' ), value: 'slide-left' },
							{ label: __( 'Slide Right', 'aegis' ), value: 'slide-right' },
							{ label: __( 'Zoom', 'aegis' ), value: 'zoom' },
							{ label: __( 'None', 'aegis' ), value: 'none' },
						] }
						onChange={ ( value ) => setAttributes( { animation: value } ) }
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
						label={ __( 'Close on Escape', 'aegis' ) }
						checked={ attributes.closeOnEsc }
						onChange={ ( value ) => setAttributes( { closeOnEsc: value } ) }
					/>
					<ToggleControl
						label={ __( 'Close on Overlay Click', 'aegis' ) }
						checked={ attributes.closeOnOverlay }
						onChange={ ( value ) => setAttributes( { closeOnOverlay: value } ) }
					/>
					<ToggleControl
						label={ __( 'Show Close Button', 'aegis' ) }
						checked={ attributes.showCloseButton }
						onChange={ ( value ) => setAttributes( { showCloseButton: value } ) }
					/>
					{ attributes.showCloseButton && (
						<SelectControl
							label={ __( 'Close Button Position', 'aegis' ) }
							value={ attributes.closeButtonPosition }
							options={ [
								{ label: __( 'Inside', 'aegis' ), value: 'inside' },
								{ label: __( 'Outside', 'aegis' ), value: 'outside' },
							] }
							onChange={ ( value ) => setAttributes( { closeButtonPosition: value } ) }
						/>
					) }
				</PanelBody>

				{ /* Accessibility */ }
				<PanelBody title={ __( 'Accessibility', 'aegis' ) } initialOpen={ false }>
					<ToggleControl
						label={ __( 'Prevent Body Scroll', 'aegis' ) }
						checked={ attributes.preventBodyScroll }
						onChange={ ( value ) => setAttributes( { preventBodyScroll: value } ) }
					/>
					<ToggleControl
						label={ __( 'Focus Trap', 'aegis' ) }
						checked={ attributes.focusTrap }
						onChange={ ( value ) => setAttributes( { focusTrap: value } ) }
						help={ __( 'Keep focus within the modal when open.', 'aegis' ) }
					/>
					<ToggleControl
						label={ __( 'Return Focus', 'aegis' ) }
						checked={ attributes.returnFocus }
						onChange={ ( value ) => setAttributes( { returnFocus: value } ) }
						help={ __( 'Return focus to trigger when modal closes.', 'aegis' ) }
					/>
				</PanelBody>

				{ /* Size & Styling */ }
				<PanelBody title={ __( 'Size & Styling', 'aegis' ) } initialOpen={ false }>
					<UnitControl
						label={ __( 'Width', 'aegis' ) }
						value={ attributes.width }
						onChange={ ( value ) => setAttributes( { width: value || '500px' } ) }
					/>
					<UnitControl
						label={ __( 'Max Width', 'aegis' ) }
						value={ attributes.maxWidth }
						onChange={ ( value ) => setAttributes( { maxWidth: value || '90vw' } ) }
					/>
					<UnitControl
						label={ __( 'Height', 'aegis' ) }
						value={ attributes.height }
						onChange={ ( value ) => setAttributes( { height: value || 'auto' } ) }
					/>
					<UnitControl
						label={ __( 'Max Height', 'aegis' ) }
						value={ attributes.maxHeight }
						onChange={ ( value ) => setAttributes( { maxHeight: value || '90vh' } ) }
					/>
					<UnitControl
						label={ __( 'Border Radius', 'aegis' ) }
						value={ attributes.borderRadius }
						onChange={ ( value ) => setAttributes( { borderRadius: value || '8px' } ) }
					/>
					<UnitControl
						label={ __( 'Padding', 'aegis' ) }
						value={ attributes.padding }
						onChange={ ( value ) => setAttributes( { padding: value || '24px' } ) }
					/>
					<RangeControl
						label={ __( 'Overlay Blur (px)', 'aegis' ) }
						value={ attributes.overlayBlur }
						onChange={ ( value ) => setAttributes( { overlayBlur: value } ) }
						min={ 0 }
						max={ 20 }
					/>
				</PanelBody>
			</InspectorControls>

			{ /* Editor Preview */ }
			<div className="aegis-modal-editor__trigger-preview">
				<span className={ `aegis-modal-trigger aegis-modal-trigger--${ attributes.triggerType }` }>
					{ attributes.triggerType === 'image' && attributes.triggerImageUrl ? (
						<img src={ attributes.triggerImageUrl } alt={ attributes.triggerImageAlt } />
					) : (
						<span>{ attributes.triggerText || __( 'Open Modal', 'aegis' ) }</span>
					) }
				</span>
			</div>

			<div className="aegis-modal-editor__content-preview">
				<div className="aegis-modal-editor__content-label">
					{ __( 'Modal Content', 'aegis' ) }
					{ attributes.modalType !== 'popup' && (
						<span className="aegis-modal-editor__type-badge">
							{ attributes.modalType }
						</span>
					) }
				</div>
				<InnerBlocks />
			</div>
		</div>
	);
}
