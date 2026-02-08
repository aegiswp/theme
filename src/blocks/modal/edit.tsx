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
	PanelRow,
	SelectControl,
	TextControl,
	ToggleControl,
	RangeControl,
	Button,
	ButtonGroup,
	ColorPicker,
	__experimentalUnitControl as UnitControl,
	Icon,
} from '@wordpress/components';
import { useEffect } from '@wordpress/element';

interface ModalAttributes {
	modalId: string;
	modalType: string;
	triggerType: string;
	triggerText: string;
	triggerIcon: string;
	triggerImageId: number;
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
	// Phase 2 attributes
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
	setAttributes: (attrs: Partial<ModalAttributes>) => void;
	clientId: string;
}

const MODAL_TYPES = [
	{ label: __('Popup (Center)', 'aegis'), value: 'popup' },
	{ label: __('Left Off-Canvas', 'aegis'), value: 'left-canvas' },
	{ label: __('Right Off-Canvas', 'aegis'), value: 'right-canvas' },
	{ label: __('Bottom Sheet', 'aegis'), value: 'bottom-sheet' },
	{ label: __('Fullscreen', 'aegis'), value: 'fullscreen' },
];

const TRIGGER_TYPES = [
	{ label: __('Button', 'aegis'), value: 'button' },
	{ label: __('Icon', 'aegis'), value: 'icon' },
	{ label: __('Text', 'aegis'), value: 'text' },
	{ label: __('Image', 'aegis'), value: 'image' },
	{ label: __('Scroll Position', 'aegis'), value: 'scroll' },
	{ label: __('Exit Intent', 'aegis'), value: 'exit-intent' },
	{ label: __('Timed Delay', 'aegis'), value: 'timed' },
];

const DEVICE_OPTIONS = [
	{ label: __('Desktop', 'aegis'), value: 'desktop' },
	{ label: __('Tablet', 'aegis'), value: 'tablet' },
	{ label: __('Mobile', 'aegis'), value: 'mobile' },
];

const ANIMATIONS = [
	{ label: __('Fade', 'aegis'), value: 'fade' },
	{ label: __('Scale', 'aegis'), value: 'scale' },
	{ label: __('Slide', 'aegis'), value: 'slide' },
	{ label: __('Flip', 'aegis'), value: 'flip' },
	{ label: __('Zoom', 'aegis'), value: 'zoom' },
];

const CLOSE_POSITIONS = [
	{ label: __('Inside Modal', 'aegis'), value: 'inside' },
	{ label: __('Outside Modal', 'aegis'), value: 'outside' },
];

export default function Edit({ attributes, setAttributes, clientId }: EditProps) {
	const {
		modalId,
		modalType,
		triggerType,
		triggerText,
		triggerImageUrl,
		triggerImageAlt,
		modalTitle,
		animation,
		animationDuration,
		closeOnEsc,
		closeOnOverlay,
		showCloseButton,
		closeButtonPosition,
		preventBodyScroll,
		focusTrap,
		returnFocus,
		width,
		maxWidth,
		height,
		maxHeight,
		overlayColor,
		overlayBlur,
		backgroundColor,
		borderRadius,
		padding,
	} = attributes;

	// Generate unique modal ID on mount
	useEffect(() => {
		if (!modalId) {
			setAttributes({ modalId: `aegis-modal-${clientId.slice(0, 8)}` });
		}
	}, [clientId, modalId, setAttributes]);

	const blockProps = useBlockProps({
		className: `aegis-modal-editor aegis-modal-type-${modalType}`,
	});

	return (
		<>
			<InspectorControls>
				{/* Modal Settings Panel */}
				<PanelBody title={__('Modal Settings', 'aegis')} initialOpen={true}>
					<SelectControl
						label={__('Modal Type', 'aegis')}
						value={modalType}
						options={MODAL_TYPES}
						onChange={(value) => setAttributes({ modalType: value })}
						help={__('Choose how the modal appears on screen.', 'aegis')}
					/>

					<TextControl
						label={__('Modal Title', 'aegis')}
						value={modalTitle}
						onChange={(value) => setAttributes({ modalTitle: value })}
						help={__('Used for accessibility (screen readers).', 'aegis')}
					/>

					<SelectControl
						label={__('Animation', 'aegis')}
						value={animation}
						options={ANIMATIONS}
						onChange={(value) => setAttributes({ animation: value })}
					/>

					<RangeControl
						label={__('Animation Duration (ms)', 'aegis')}
						value={animationDuration}
						onChange={(value) => setAttributes({ animationDuration: value })}
						min={0}
						max={1000}
						step={50}
					/>
				</PanelBody>

				{/* Trigger Settings Panel */}
				<PanelBody title={__('Trigger Settings', 'aegis')} initialOpen={false}>
					<SelectControl
						label={__('Trigger Type', 'aegis')}
						value={triggerType}
						options={TRIGGER_TYPES}
						onChange={(value) => setAttributes({ triggerType: value })}
					/>

					{(triggerType === 'button' || triggerType === 'text') && (
						<TextControl
							label={__('Trigger Text', 'aegis')}
							value={triggerText}
							onChange={(value) => setAttributes({ triggerText: value })}
						/>
					)}

					{triggerType === 'icon' && (
						<>
							<TextControl
								label={__('Icon (Dashicon name)', 'aegis')}
								value={attributes.triggerIcon}
								onChange={(value) => setAttributes({ triggerIcon: value })}
								help={__('Enter a Dashicon name like "menu", "search", "cart", etc.', 'aegis')}
							/>
							<TextControl
								label={__('Accessible Label', 'aegis')}
								value={triggerText}
								onChange={(value) => setAttributes({ triggerText: value })}
								help={__('Screen reader text for the icon button.', 'aegis')}
							/>
						</>
					)}

					{triggerType === 'image' && (
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) =>
									setAttributes({
										triggerImageId: media.id,
										triggerImageUrl: media.url,
										triggerImageAlt: media.alt || '',
									})
								}
								allowedTypes={['image']}
								value={attributes.triggerImageId}
								render={({ open }) => (
									<div>
										{triggerImageUrl ? (
											<div className="aegis-modal-trigger-image-preview">
												<img src={triggerImageUrl} alt={triggerImageAlt} />
												<ButtonGroup>
													<Button variant="secondary" onClick={open}>
														{__('Replace', 'aegis')}
													</Button>
													<Button
														variant="tertiary"
														isDestructive
														onClick={() =>
															setAttributes({
																triggerImageId: 0,
																triggerImageUrl: '',
																triggerImageAlt: '',
															})
														}
													>
														{__('Remove', 'aegis')}
													</Button>
												</ButtonGroup>
											</div>
										) : (
											<Button variant="secondary" onClick={open}>
												{__('Select Image', 'aegis')}
											</Button>
										)}
									</div>
								)}
							/>
						</MediaUploadCheck>
					)}

					{triggerType === 'image' && triggerImageUrl && (
						<TextControl
							label={__('Image Alt Text', 'aegis')}
							value={triggerImageAlt}
							onChange={(value) => setAttributes({ triggerImageAlt: value })}
							help={__('Describe the image for accessibility.', 'aegis')}
						/>
					)}
				</PanelBody>

				{/* Behavior Settings Panel */}
				<PanelBody title={__('Behavior', 'aegis')} initialOpen={false}>
					<ToggleControl
						label={__('Close on ESC key', 'aegis')}
						checked={closeOnEsc}
						onChange={(value) => setAttributes({ closeOnEsc: value })}
					/>

					<ToggleControl
						label={__('Close on overlay click', 'aegis')}
						checked={closeOnOverlay}
						onChange={(value) => setAttributes({ closeOnOverlay: value })}
					/>

					<ToggleControl
						label={__('Show close button', 'aegis')}
						checked={showCloseButton}
						onChange={(value) => setAttributes({ showCloseButton: value })}
					/>

					{showCloseButton && (
						<SelectControl
							label={__('Close button position', 'aegis')}
							value={closeButtonPosition}
							options={CLOSE_POSITIONS}
							onChange={(value) => setAttributes({ closeButtonPosition: value })}
						/>
					)}

					<ToggleControl
						label={__('Prevent body scroll', 'aegis')}
						checked={preventBodyScroll}
						onChange={(value) => setAttributes({ preventBodyScroll: value })}
						help={__('Prevents page scrolling when modal is open.', 'aegis')}
					/>
				</PanelBody>

				{/* Accessibility Panel */}
				<PanelBody title={__('Accessibility', 'aegis')} initialOpen={false}>
					<ToggleControl
						label={__('Focus trap', 'aegis')}
						checked={focusTrap}
						onChange={(value) => setAttributes({ focusTrap: value })}
						help={__('Keeps keyboard focus within the modal.', 'aegis')}
					/>

					<ToggleControl
						label={__('Return focus on close', 'aegis')}
						checked={returnFocus}
						onChange={(value) => setAttributes({ returnFocus: value })}
						help={__('Returns focus to trigger when modal closes.', 'aegis')}
					/>
				</PanelBody>

				{/* Size Settings Panel */}
				<PanelBody title={__('Size', 'aegis')} initialOpen={false}>
					<UnitControl
						label={__('Width', 'aegis')}
						value={width}
						onChange={(value) => setAttributes({ width: value || '500px' })}
					/>

					<UnitControl
						label={__('Max Width', 'aegis')}
						value={maxWidth}
						onChange={(value) => setAttributes({ maxWidth: value || '90vw' })}
					/>

					<UnitControl
						label={__('Height', 'aegis')}
						value={height}
						onChange={(value) => setAttributes({ height: value || 'auto' })}
					/>

					<UnitControl
						label={__('Max Height', 'aegis')}
						value={maxHeight}
						onChange={(value) => setAttributes({ maxHeight: value || '90vh' })}
					/>

					<UnitControl
						label={__('Padding', 'aegis')}
						value={padding}
						onChange={(value) => setAttributes({ padding: value || '24px' })}
					/>

					<UnitControl
						label={__('Border Radius', 'aegis')}
						value={borderRadius}
						onChange={(value) => setAttributes({ borderRadius: value || '8px' })}
					/>
				</PanelBody>

				{/* Style Settings Panel */}
				<PanelBody title={__('Overlay & Background', 'aegis')} initialOpen={false}>
					<PanelRow>
						<span>{__('Overlay Color', 'aegis')}</span>
					</PanelRow>
					<ColorPicker
						color={overlayColor}
						onChange={(value) => setAttributes({ overlayColor: value })}
						enableAlpha
					/>

					<RangeControl
						label={__('Overlay Blur (px)', 'aegis')}
						value={overlayBlur}
						onChange={(value) => setAttributes({ overlayBlur: value })}
						min={0}
						max={20}
					/>

					<PanelRow>
						<span>{__('Modal Background', 'aegis')}</span>
					</PanelRow>
					<ColorPicker
						color={backgroundColor}
						onChange={(value) => setAttributes({ backgroundColor: value })}
						enableAlpha
					/>
				</PanelBody>

				{/* Phase 2: Advanced Trigger Settings */}
				{triggerType === 'scroll' && (
					<PanelBody title={__('Scroll Trigger Settings', 'aegis')} initialOpen={true}>
						<RangeControl
							label={__('Scroll Position (%)', 'aegis')}
							value={attributes.scrollTriggerPercent}
							onChange={(value) => setAttributes({ scrollTriggerPercent: value })}
							min={0}
							max={100}
							help={__('Modal opens when user scrolls past this percentage of the page.', 'aegis')}
						/>
						<ToggleControl
							label={__('Trigger only once', 'aegis')}
							checked={attributes.scrollTriggerOnce}
							onChange={(value) => setAttributes({ scrollTriggerOnce: value })}
							help={__('If disabled, modal can re-open on subsequent scrolls.', 'aegis')}
						/>
					</PanelBody>
				)}

				{triggerType === 'exit-intent' && (
					<PanelBody title={__('Exit Intent Settings', 'aegis')} initialOpen={true}>
						<RangeControl
							label={__('Sensitivity (px)', 'aegis')}
							value={attributes.exitIntentSensitivity}
							onChange={(value) => setAttributes({ exitIntentSensitivity: value })}
							min={0}
							max={100}
							help={__('How far above the viewport the mouse must move to trigger.', 'aegis')}
						/>
						<RangeControl
							label={__('Delay (ms)', 'aegis')}
							value={attributes.exitIntentDelay}
							onChange={(value) => setAttributes({ exitIntentDelay: value })}
							min={0}
							max={5000}
							step={100}
							help={__('Delay before showing modal after exit intent detected.', 'aegis')}
						/>
					</PanelBody>
				)}

				{triggerType === 'timed' && (
					<PanelBody title={__('Timed Trigger Settings', 'aegis')} initialOpen={true}>
						<RangeControl
							label={__('Delay (ms)', 'aegis')}
							value={attributes.timedTriggerDelay}
							onChange={(value) => setAttributes({ timedTriggerDelay: value })}
							min={0}
							max={60000}
							step={500}
							help={__('Time to wait before automatically showing the modal.', 'aegis')}
						/>
					</PanelBody>
				)}

				{/* Auto-close Settings */}
				<PanelBody title={__('Auto-close', 'aegis')} initialOpen={false}>
					<RangeControl
						label={__('Auto-close delay (ms)', 'aegis')}
						value={attributes.autoCloseDelay}
						onChange={(value) => setAttributes({ autoCloseDelay: value })}
						min={0}
						max={60000}
						step={500}
						help={__('Automatically close modal after this time. Set to 0 to disable.', 'aegis')}
					/>
				</PanelBody>

				{/* Display Conditions */}
				<PanelBody title={__('Display Conditions', 'aegis')} initialOpen={false}>
					<ToggleControl
						label={__('Show only once', 'aegis')}
						checked={attributes.showOnce}
						onChange={(value) => setAttributes({ showOnce: value })}
						help={__('Uses localStorage to remember if user has seen this modal.', 'aegis')}
					/>

					{attributes.showOnce && (
						<RangeControl
							label={__('Remember for (days)', 'aegis')}
							value={attributes.showOnceExpiry}
							onChange={(value) => setAttributes({ showOnceExpiry: value })}
							min={1}
							max={365}
							help={__('How many days to remember the user has seen this modal.', 'aegis')}
						/>
					)}

					<PanelRow>
						<span>{__('Show on devices', 'aegis')}</span>
					</PanelRow>
					{DEVICE_OPTIONS.map((device) => (
						<ToggleControl
							key={device.value}
							label={device.label}
							checked={attributes.deviceVisibility.includes(device.value)}
							onChange={(checked) => {
								const newVisibility = checked
									? [...attributes.deviceVisibility, device.value]
									: attributes.deviceVisibility.filter((d) => d !== device.value);
								setAttributes({ deviceVisibility: newVisibility });
							}}
						/>
					))}
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				{/* Trigger Preview */}
				<div className="aegis-modal-trigger-preview">
					{triggerType === 'button' && (
						<button type="button" className="aegis-modal-trigger aegis-modal-trigger--button">
							{triggerText}
						</button>
					)}
					{triggerType === 'text' && (
						<span className="aegis-modal-trigger aegis-modal-trigger--text">{triggerText}</span>
					)}
					{triggerType === 'icon' && (
						<button type="button" className="aegis-modal-trigger aegis-modal-trigger--icon">
							<Icon icon={attributes.triggerIcon || 'menu'} />
						</button>
					)}
					{triggerType === 'image' && triggerImageUrl && (
						<button type="button" className="aegis-modal-trigger aegis-modal-trigger--image">
							<img src={triggerImageUrl} alt={triggerImageAlt} />
						</button>
					)}
					{triggerType === 'scroll' && (
						<div className="aegis-modal-trigger aegis-modal-trigger--auto">
							<Icon icon="arrow-down-alt" />
							<span>{__('Opens at', 'aegis')} {attributes.scrollTriggerPercent}% {__('scroll', 'aegis')}</span>
						</div>
					)}
					{triggerType === 'exit-intent' && (
						<div className="aegis-modal-trigger aegis-modal-trigger--auto">
							<Icon icon="migrate" />
							<span>{__('Opens on exit intent', 'aegis')}</span>
						</div>
					)}
					{triggerType === 'timed' && (
						<div className="aegis-modal-trigger aegis-modal-trigger--auto">
							<Icon icon="clock" />
							<span>{__('Opens after', 'aegis')} {attributes.timedTriggerDelay / 1000}s</span>
						</div>
					)}
				</div>

				{/* Modal Content Preview */}
				<div
					className={`aegis-modal-content-preview aegis-modal-content-preview--${modalType}`}
					style={{
						'--preview-bg': backgroundColor,
						'--preview-radius': borderRadius,
						'--preview-padding': padding,
					} as React.CSSProperties}
				>
					<div className="aegis-modal-content-preview__header">
						<span className="aegis-modal-content-preview__label">
							{__('Modal Content', 'aegis')}
						</span>
						{showCloseButton && (
							<span className="aegis-modal-content-preview__close">×</span>
						)}
					</div>
					<div className="aegis-modal-content-preview__body">
						<InnerBlocks
							template={[['core/paragraph', { placeholder: __('Add modal content...', 'aegis') }]]}
							templateLock={false}
						/>
					</div>
				</div>
			</div>
		</>
	);
}
