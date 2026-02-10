/**
 * Video Block
 *
 * Extends the core/video block with custom player controls.
 *
 * @package Aegis
 * @since   1.0.0
 */

import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	ToggleControl,
	SelectControl,
	TextControl,
	Button,
} from '@wordpress/components';

import metadata from './block.json';

interface VideoAttributes {
	src: string;
	poster: string;
	caption: string;
	autoplay: boolean;
	loop: boolean;
	muted: boolean;
	controls: boolean;
	preload: string;
	playsInline: boolean;
}

interface EditProps {
	attributes: VideoAttributes;
	setAttributes: ( attrs: Partial<VideoAttributes> ) => void;
}

function Edit( { attributes, setAttributes }: EditProps ) {
	const blockProps = useBlockProps( {
		className: 'aegis-video-editor',
	} );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Video Settings', 'aegis' ) }>
					<ToggleControl
						label={ __( 'Autoplay', 'aegis' ) }
						checked={ attributes.autoplay }
						onChange={ ( value ) => setAttributes( { autoplay: value } ) }
						help={ __( 'Autoplay requires the video to be muted.', 'aegis' ) }
					/>
					<ToggleControl
						label={ __( 'Loop', 'aegis' ) }
						checked={ attributes.loop }
						onChange={ ( value ) => setAttributes( { loop: value } ) }
					/>
					<ToggleControl
						label={ __( 'Muted', 'aegis' ) }
						checked={ attributes.muted }
						onChange={ ( value ) => setAttributes( { muted: value } ) }
					/>
					<ToggleControl
						label={ __( 'Show Controls', 'aegis' ) }
						checked={ attributes.controls }
						onChange={ ( value ) => setAttributes( { controls: value } ) }
					/>
					<ToggleControl
						label={ __( 'Plays Inline', 'aegis' ) }
						checked={ attributes.playsInline }
						onChange={ ( value ) => setAttributes( { playsInline: value } ) }
					/>
					<SelectControl
						label={ __( 'Preload', 'aegis' ) }
						value={ attributes.preload }
						options={ [
							{ label: __( 'Auto', 'aegis' ), value: 'auto' },
							{ label: __( 'Metadata', 'aegis' ), value: 'metadata' },
							{ label: __( 'None', 'aegis' ), value: 'none' },
						] }
						onChange={ ( value ) => setAttributes( { preload: value } ) }
					/>
					<TextControl
						label={ __( 'Caption', 'aegis' ) }
						value={ attributes.caption }
						onChange={ ( value ) => setAttributes( { caption: value } ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Poster Image', 'aegis' ) } initialOpen={ false }>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( media ) => setAttributes( { poster: media.url } ) }
							allowedTypes={ [ 'image' ] }
							render={ ( { open } ) => (
								<>
									{ attributes.poster && (
										<img
											src={ attributes.poster }
											alt={ __( 'Poster preview', 'aegis' ) }
											style={ { maxWidth: '100%', marginBottom: '8px' } }
										/>
									) }
									<Button onClick={ open } variant="secondary">
										{ attributes.poster
											? __( 'Replace Poster', 'aegis' )
											: __( 'Select Poster', 'aegis' ) }
									</Button>
									{ attributes.poster && (
										<Button
											onClick={ () => setAttributes( { poster: '' } ) }
											variant="link"
											isDestructive
										>
											{ __( 'Remove', 'aegis' ) }
										</Button>
									) }
								</>
							) }
						/>
					</MediaUploadCheck>
				</PanelBody>
			</InspectorControls>

			{ attributes.src ? (
				<figure className="wp-block-aegis-video">
					<video
						src={ attributes.src }
						poster={ attributes.poster || undefined }
						controls
						style={ { width: '100%' } }
					/>
					{ attributes.caption && (
						<figcaption>{ attributes.caption }</figcaption>
					) }
				</figure>
			) : (
				<MediaUploadCheck>
					<MediaUpload
						onSelect={ ( media ) =>
							setAttributes( {
								src: media.url,
								caption: media.caption || '',
							} )
						}
						allowedTypes={ [ 'video' ] }
						render={ ( { open } ) => (
							<Button
								onClick={ open }
								variant="primary"
								className="aegis-video-editor__upload"
							>
								{ __( 'Select Video', 'aegis' ) }
							</Button>
						) }
					/>
				</MediaUploadCheck>
			) }
		</div>
	);
}

function save() {
	return null;
}

registerBlockType( metadata.name, {
	edit: Edit,
	save,
} );
