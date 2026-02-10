/**
 * Video Block Editor Extension
 *
 * Extends the core/video block with a video type selector
 * Video, YouTube, Vimeo, Audio, Bunny.net
 *
 * @package Aegis
 * @since   1.0.0
 */

import './video-editor.scss';

import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import {
	Placeholder,
	TextControl,
	Button,
} from '@wordpress/components';
import { useState } from '@wordpress/element';

// Declare global aegisVideo object from wp_localize_script
declare const aegisVideo: { isPro?: boolean } | undefined;

// Video type icons - matching Presto Player exactly
const VideoIcon = () => (
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M23 7L16 12L23 17V7Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
		<path d="M14 5H3C1.89543 5 1 5.89543 1 7V17C1 18.1046 1.89543 19 3 19H14C15.1046 19 16 18.1046 16 17V7C16 5.89543 15.1046 5 14 5Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
	</svg>
);

const YouTubeIcon = () => (
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M22.54 6.42C22.4212 5.94541 22.1793 5.51057 21.8387 5.15941C21.498 4.80824 21.0708 4.55318 20.6 4.42C18.88 4 12 4 12 4C12 4 5.12 4 3.4 4.46C2.92925 4.59318 2.50198 4.84824 2.16135 5.19941C1.82072 5.55057 1.57879 5.98541 1.46 6.46C1.14521 8.20556 0.991235 9.97631 0.999999 11.75C0.988779 13.537 1.14277 15.3213 1.46 17.08C1.59096 17.5398 1.83831 17.9581 2.17814 18.2945C2.51798 18.6308 2.93882 18.8738 3.4 19C5.12 19.46 12 19.46 12 19.46C12 19.46 18.88 19.46 20.6 19C21.0708 18.8668 21.498 18.6118 21.8387 18.2606C22.1793 17.9094 22.4212 17.4746 22.54 17C22.8524 15.2676 23.0063 13.5103 23 11.75C23.0112 9.96295 22.8572 8.1787 22.54 6.42Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
		<path d="M9.75 15.02L15.5 11.75L9.75 8.48V15.02Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
	</svg>
);

const VimeoIcon = () => (
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<g clipPath="url(#clip0_vimeo)">
			<path d="M22.875 10.063C20.433 15.28 14.538 22.382 10.812 22.382C7.14 22.382 6.609 14.551 4.604 9.339C3.617 6.774 2.98 7.363 1.13 8.658L0.0019989 7.203C2.7 4.831 5.4 2.076 7.059 1.923C8.927 1.744 10.077 3.021 10.507 5.755C11.075 9.348 11.869 14.925 13.255 14.925C14.335 14.925 16.996 10.501 17.133 8.919C17.376 6.603 15.43 6.533 13.741 7.256C16.414 -1.498 27.534 0.113998 22.875 10.063Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
		</g>
		<defs>
			<clipPath id="clip0_vimeo">
				<rect width="24" height="24" fill="white"/>
			</clipPath>
		</defs>
	</svg>
);

const AudioIcon = () => (
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M9 18V5L21 3V16" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
		<path d="M6 21C7.65685 21 9 19.6569 9 18C9 16.3431 7.65685 15 6 15C4.34315 15 3 16.3431 3 18C3 19.6569 4.34315 21 6 21Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
		<path d="M18 19C19.6569 19 21 17.6569 21 16C21 14.3431 19.6569 13 18 13C16.3431 13 15 14.3431 15 16C15 17.6569 16.3431 19 18 19Z" stroke="#007CBA" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
	</svg>
);

const BunnyIcon = () => (
	<svg width="29" height="32" viewBox="0 0 29 32" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M15.734 5.13223L23.1293 9.14822L16.2959 0C15.7536 0.727851 15.4155 1.58737 15.3167 2.48967C15.2179 3.39196 15.362 4.30427 15.734 5.13223Z" fill="#007CBA"/>
		<path d="M12.3923 20.0273C12.8394 20.0273 13.2682 20.2049 13.5843 20.5211C13.9004 20.8372 14.078 21.266 14.078 21.7131C14.078 22.1601 13.9004 22.5889 13.5843 22.905C13.2682 23.2212 12.8394 23.3988 12.3923 23.3988C11.9452 23.3988 11.5165 23.2212 11.2003 22.905C10.8842 22.5889 10.7066 22.1601 10.7066 21.7131C10.7066 21.266 10.8842 20.8372 11.2003 20.5211C11.5165 20.2049 11.9452 20.0273 12.3923 20.0273Z" fill="#007CBA"/>
		<path d="M7.24523 1.34112L27.9541 12.5798C28.1234 12.6622 28.2662 12.7905 28.366 12.9502C28.4658 13.1098 28.5188 13.2943 28.5188 13.4826C28.5188 13.6709 28.4658 13.8554 28.366 14.015C28.2662 14.1747 28.1234 14.303 27.9541 14.3854C26.3879 15.3278 24.6726 15.9967 22.8818 16.3633L18.5736 25.2046C18.5736 25.2046 17.2102 28.3065 13.4564 27.1152C15.0298 25.5418 16.9328 24.1181 16.9328 21.6983C16.9328 19.1865 14.8966 17.1505 12.385 17.1505C9.87326 17.1505 7.83728 19.1865 7.83728 21.6983C7.83728 24.86 10.9539 26.1935 12.6848 28.3889C13.0629 28.9242 13.2448 29.5735 13.1997 30.2273C13.1547 30.8811 12.8855 31.4993 12.4375 31.9777C10.287 29.85 6.12878 26.261 4.42049 23.9084C3.48655 22.7223 2.97267 21.2597 2.95944 19.7501C3.04152 18.1438 3.61631 16.6017 4.60566 15.3336C5.595 14.0655 6.95089 13.1328 8.48898 12.6624C9.43233 12.3876 10.4142 12.2686 11.3959 12.3102C12.7648 12.4139 14.0944 12.8153 15.292 13.4865C17.1278 14.5654 18.0193 14.2807 19.2854 13.2169C20.0347 12.6025 20.8512 10.6019 19.5851 10.1374C19.1712 10.0024 18.7481 9.89728 18.319 9.8229C15.9664 9.36574 11.8531 8.93113 10.3395 8.06951C7.93444 6.74335 6.31616 4.0084 7.24523 1.34112Z" fill="#007CBA"/>
		<path d="M16.8955 21.7204C17.8545 16.6781 12.737 11.868 8.81099 12.5871L9.07341 12.5272C8.86348 12.5721 8.66135 12.6248 8.46639 12.6847C6.92835 13.1551 5.5725 14.0878 4.5832 15.356C3.5939 16.6241 3.01914 18.1662 2.93707 19.7724C2.96099 21.2865 3.48823 22.7495 4.43564 23.9307C6.14371 26.2833 10.302 29.8723 12.4525 32C12.9004 31.5217 13.1696 30.9034 13.2147 30.2496C13.2597 29.5958 13.0778 28.9465 12.6997 28.4112C10.9313 26.2235 7.81448 24.8823 7.81448 21.728C7.81448 19.2162 9.85089 17.1802 12.3625 17.1802C14.8742 17.1802 16.9102 19.2162 16.9102 21.728L16.8955 21.7204Z" fill="#007CBA"/>
		<path d="M7.24522 1.34112L22.9791 9.91247L23.4287 10.1597C23.8035 10.4518 24.178 11.0363 23.6911 12.1152C22.9418 13.7261 19.9449 15.2846 16.4908 14.0631C17.5697 14.3778 18.3038 14.0182 19.2481 13.2241C19.9972 12.6097 20.8139 10.6093 19.5476 10.1445C19.1336 10.0095 18.7105 9.90444 18.2815 9.83006C15.9289 9.3729 11.8155 8.93851 10.302 8.07688C7.93443 6.74313 6.31593 4.0084 7.24522 1.34112Z" fill="#007CBA"/>
		<path d="M7.24515 1.34112C8.87102 7.33497 18.7685 7.82965 23.7283 10.3321L7.24515 1.34112Z" fill="#007CBA"/>
		<path d="M12.6623 28.4112C10.9316 26.2234 7.81458 24.8823 7.81458 21.7279C7.82347 19.4402 9.53045 17.5152 11.8006 17.2324C8.18499 17.2448 5.25703 20.1728 5.24467 23.7884C5.24402 24.2313 5.28912 24.6733 5.37956 25.107C6.81068 26.7253 8.87854 28.6359 10.6243 30.2542C11.3062 30.8911 11.9355 31.4903 12.4526 32C12.8827 31.5015 13.1448 30.8802 13.2016 30.2243C13.2426 29.5751 13.0514 28.9325 12.6623 28.4112Z" fill="#007CBA"/>
		<path d="M16.873 22.26C16.8966 22.081 16.9092 21.9008 16.9105 21.7204C17.8545 16.6782 12.737 11.868 8.81105 12.5871C9.64941 12.3846 10.5118 12.2989 11.3736 12.3325C16.5208 12.5422 17.9593 18.0416 16.873 22.26Z" fill="#007CBA"/>
		<path d="M1.69332 11.1189C2.14306 11.1209 2.57371 11.3009 2.89105 11.6196C3.2084 11.9383 3.38659 12.3697 3.38664 12.8194V14.5127H1.69332C1.47095 14.5127 1.25076 14.4689 1.04531 14.3838C0.839872 14.2987 0.653201 14.174 0.495962 14.0168C0.338723 13.8595 0.213994 13.6729 0.128896 13.4674C0.043799 13.262 0 13.0418 0 12.8194C-4.22733e-08 12.3696 0.178163 11.9382 0.495512 11.6194C0.812861 11.3007 1.24355 11.1209 1.69332 11.1189Z" fill="#007CBA"/>
	</svg>
);

// Check if Aegis Pro is active
const isPro = typeof aegisVideo !== 'undefined' && aegisVideo?.isPro === true;

// Video type options
const VIDEO_TYPES = [
	{ type: 'video', label: __( 'Video', 'aegis' ), icon: VideoIcon, premium: false },
	{ type: 'youtube', label: __( 'YouTube', 'aegis' ), icon: YouTubeIcon, premium: false },
	{ type: 'vimeo', label: __( 'Vimeo', 'aegis' ), icon: VimeoIcon, premium: false },
	{ type: 'audio', label: __( 'Audio', 'aegis' ), icon: AudioIcon, premium: false },
	{ type: 'bunny', label: __( 'Bunny.net', 'aegis' ), icon: BunnyIcon, premium: true },
];

// Add custom attributes to core/video block
function addVideoTypeAttribute( settings: any, name: string ) {
	if ( name !== 'core/video' ) {
		return settings;
	}

	return {
		...settings,
		attributes: {
			...settings.attributes,
			aegisVideoType: {
				type: 'string',
				default: '',
			},
			aegisYoutubeUrl: {
				type: 'string',
				default: '',
			},
			aegisVimeoUrl: {
				type: 'string',
				default: '',
			},
			aegisBunnyVideoId: {
				type: 'string',
				default: '',
			},
			aegisBunnyLibraryId: {
				type: 'string',
				default: '',
			},
		},
	};
}

addFilter(
	'blocks.registerBlockType',
	'aegis/video-type-attribute',
	addVideoTypeAttribute
);

// Replace the block edit component with custom type selector
const withVideoTypeSelector = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props: any ) => {
		if ( props.name !== 'core/video' ) {
			return <BlockEdit { ...props } />;
		}

		const { attributes, setAttributes } = props;
		const {
			aegisVideoType,
			aegisYoutubeUrl = '',
			aegisVimeoUrl = '',
			aegisBunnyVideoId = '',
			aegisBunnyLibraryId = '',
			src,
		} = attributes;

		const blockProps = useBlockProps();
		const [ urlInput, setUrlInput ] = useState( '' );

		// If video type not selected and no src, show type selector
		if ( ! aegisVideoType && ! src ) {
			return (
				<div { ...blockProps }>
					<div className="aegis-video-type-selector">
						<div className="aegis-video-type-selector__header">
							<svg className="aegis-video-type-selector__logo" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M18.7 3H5.3C4 3 3 4 3 5.3v13.4C3 20 4 21 5.3 21h13.4c1.3 0 2.3-1 2.3-2.3V5.3C21 4 20 3 18.7 3zm.8 15.4c0 .4-.4.8-.8.8H5.3c-.4 0-.8-.4-.8-.8V5.3c0-.4.4-.8.8-.8h13.4c.4 0 .8.4.8.8v13.4zM10 15l5-3-5-3v6z" />
							</svg>
							<span className="aegis-video-type-selector__title">{ __( 'Video', 'aegis' ) }</span>
						</div>
						<p className="aegis-video-type-selector__description">
							{ __( 'Choose a video type to get started.', 'aegis' ) }
						</p>
						<div className="aegis-video-type-selector__options">
							{ VIDEO_TYPES.map( ( { type, label, icon: Icon, premium } ) => {
								const hasAccess = ! premium || isPro;
								return (
									<button
										key={ type }
										type="button"
										className={ `aegis-video-type-option${ premium && ! isPro ? ' aegis-video-type-option--pro' : '' }` }
										onClick={ () => {
											if ( hasAccess ) {
												setAttributes( { aegisVideoType: type } );
											}
										} }
									>
										{ premium && ! isPro && (
											<span className="aegis-video-type-option__pro-badge">Pro</span>
										) }
										<span className="aegis-video-type-option__icon">
											<Icon />
										</span>
										<span className="aegis-video-type-option__label">
											{ label }
										</span>
								</button>
								);
							} ) }
						</div>
						<div className="aegis-video-type-selector__divider">
							<span>{ __( 'or', 'aegis' ) }</span>
						</div>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media: any ) => {
									setAttributes( {
										aegisVideoType: 'video',
										src: media.url,
										id: media.id,
									} );
								} }
								allowedTypes={ [ 'video' ] }
								render={ ( { open } ) => (
									<Button
										variant="primary"
										onClick={ open }
										className="aegis-video-type-selector__upload"
									>
										{ __( 'Select media', 'aegis' ) }
									</Button>
								) }
							/>
						</MediaUploadCheck>
					</div>
				</div>
			);
		}

		// If type selected but no URL/src yet, show URL input
		if ( aegisVideoType === 'youtube' && ! aegisYoutubeUrl ) {
			return (
				<div { ...blockProps }>
					<Placeholder
						icon={ <YouTubeIcon /> }
						label={ __( 'YouTube Video', 'aegis' ) }
						instructions={ __( 'Enter a YouTube video URL.', 'aegis' ) }
						className="aegis-video-placeholder aegis-video-placeholder--youtube"
					>
						<div className="aegis-video-url-input">
							<TextControl
								value={ urlInput }
								onChange={ setUrlInput }
								placeholder="https://www.youtube.com/watch?v=..."
								className="aegis-video-url-field"
							/>
							<Button
								variant="primary"
								onClick={ () => {
									setAttributes( { aegisYoutubeUrl: urlInput } );
								} }
								disabled={ ! urlInput }
							>
								{ __( 'Embed', 'aegis' ) }
							</Button>
							<Button
								variant="tertiary"
								onClick={ () => setAttributes( { aegisVideoType: '' } ) }
							>
								{ __( 'Back', 'aegis' ) }
							</Button>
						</div>
					</Placeholder>
				</div>
			);
		}

		if ( aegisVideoType === 'vimeo' && ! aegisVimeoUrl ) {
			return (
				<div { ...blockProps }>
					<Placeholder
						icon={ <VimeoIcon /> }
						label={ __( 'Vimeo Video', 'aegis' ) }
						instructions={ __( 'Enter a Vimeo video URL.', 'aegis' ) }
						className="aegis-video-placeholder aegis-video-placeholder--vimeo"
					>
						<div className="aegis-video-url-input">
							<TextControl
								value={ urlInput }
								onChange={ setUrlInput }
								placeholder="https://vimeo.com/..."
								className="aegis-video-url-field"
							/>
							<Button
								variant="primary"
								onClick={ () => {
									setAttributes( { aegisVimeoUrl: urlInput } );
								} }
								disabled={ ! urlInput }
							>
								{ __( 'Embed', 'aegis' ) }
							</Button>
							<Button
								variant="tertiary"
								onClick={ () => setAttributes( { aegisVideoType: '' } ) }
							>
								{ __( 'Back', 'aegis' ) }
							</Button>
						</div>
					</Placeholder>
				</div>
			);
		}

		if ( aegisVideoType === 'bunny' && ( ! aegisBunnyLibraryId || ! aegisBunnyVideoId ) ) {
			return (
				<div { ...blockProps }>
					<Placeholder
						icon={ <BunnyIcon /> }
						label={ __( 'Bunny.net Stream', 'aegis' ) }
						instructions={ __( 'Enter your Bunny.net Stream details.', 'aegis' ) }
						className="aegis-video-placeholder aegis-video-placeholder--bunny"
					>
						<div className="aegis-video-bunny-input">
							<TextControl
								label={ __( 'Library ID', 'aegis' ) }
								value={ aegisBunnyLibraryId }
								onChange={ ( value: string ) => setAttributes( { aegisBunnyLibraryId: value } ) }
								placeholder="12345"
							/>
							<TextControl
								label={ __( 'Video ID', 'aegis' ) }
								value={ aegisBunnyVideoId }
								onChange={ ( value: string ) => setAttributes( { aegisBunnyVideoId: value } ) }
								placeholder="abc123-def456-..."
							/>
							<div className="aegis-video-bunny-actions">
								<Button
									variant="primary"
									disabled={ ! aegisBunnyLibraryId || ! aegisBunnyVideoId }
								>
									{ __( 'Embed', 'aegis' ) }
								</Button>
								<Button
									variant="tertiary"
									onClick={ () => setAttributes( { aegisVideoType: '', aegisBunnyLibraryId: '', aegisBunnyVideoId: '' } ) }
								>
									{ __( 'Back', 'aegis' ) }
								</Button>
							</div>
						</div>
					</Placeholder>
				</div>
			);
		}

		// For video/audio type, show the default block edit (media upload)
		if ( aegisVideoType === 'video' && ! src ) {
			return <BlockEdit { ...props } />;
		}

		if ( aegisVideoType === 'audio' && ! src ) {
			return <BlockEdit { ...props } />;
		}

		// Show preview for embedded videos
		if ( aegisVideoType === 'youtube' && aegisYoutubeUrl ) {
			const youtubeId = extractYoutubeId( aegisYoutubeUrl );
			if ( youtubeId ) {
				return (
					<div { ...blockProps }>
						<figure className="wp-block-video aegis-video-preview">
							<div className="aegis-video-embed aegis-video-embed--youtube">
								<iframe
									src={ `https://www.youtube.com/embed/${ youtubeId }` }
									frameBorder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowFullScreen
								/>
							</div>
						</figure>
					</div>
				);
			}
		}

		if ( aegisVideoType === 'vimeo' && aegisVimeoUrl ) {
			const vimeoId = extractVimeoId( aegisVimeoUrl );
			if ( vimeoId ) {
				return (
					<div { ...blockProps }>
						<figure className="wp-block-video aegis-video-preview">
							<div className="aegis-video-embed aegis-video-embed--vimeo">
								<iframe
									src={ `https://player.vimeo.com/video/${ vimeoId }` }
									frameBorder="0"
									allow="autoplay; fullscreen; picture-in-picture"
									allowFullScreen
								/>
							</div>
						</figure>
					</div>
				);
			}
		}

		if ( aegisVideoType === 'bunny' && aegisBunnyLibraryId && aegisBunnyVideoId ) {
			return (
				<div { ...blockProps }>
					<figure className="wp-block-video aegis-video-preview">
						<div className="aegis-video-embed aegis-video-embed--bunny">
							<iframe
								src={ `https://iframe.mediadelivery.net/embed/${ aegisBunnyLibraryId }/${ aegisBunnyVideoId }` }
								frameBorder="0"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
								allowFullScreen
							/>
						</div>
					</figure>
				</div>
			);
		}

		// Default: show the original block edit
		return <BlockEdit { ...props } />;
	};
}, 'withVideoTypeSelector' );

addFilter(
	'editor.BlockEdit',
	'aegis/video-type-selector',
	withVideoTypeSelector
);

// Helper functions
function extractYoutubeId( url: string ): string | null {
	const match = url.match( /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/ );
	return match ? match[ 1 ] : null;
}

function extractVimeoId( url: string ): string | null {
	const match = url.match( /vimeo\.com\/(?:video\/)?(\d+)/ );
	return match ? match[ 1 ] : null;
}

// Add custom class to video block wrapper
function addVideoTypeClass( props: any, blockType: any, attributes: any ) {
	if ( blockType.name !== 'core/video' ) {
		return props;
	}

	const { aegisVideoType = 'video' } = attributes;

	return {
		...props,
		className: `${ props.className || '' } aegis-video-type-${ aegisVideoType }`.trim(),
	};
}

addFilter(
	'blocks.getSaveContent.extraProps',
	'aegis/video-type-class',
	addVideoTypeClass
);
