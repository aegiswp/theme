/**
 * Toggle Block
 *
 * Content switcher (two labeled views). Not an accordion.
 *
 * @package
 * @since   1.1.0
 */

import type { CSSProperties, KeyboardEvent, SyntheticEvent } from 'react';
import { useEffect, useLayoutEffect, useRef, useState } from '@wordpress/element';
import { registerBlockType, createBlock } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
	RichText,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import { useDispatch, useSelect } from '@wordpress/data';
import {
	PanelBody,
	SelectControl,
	RangeControl,
} from '@wordpress/components';

import metadata from './block.json';
import './style.scss';

interface ToggleAttributes {
	switchStyle: string;
	alignment: string;
	primaryLabel: string;
	secondaryLabel: string;
	initialContent: string;
	animationDuration: number;
	allowNested?: boolean;
	instanceId?: string;
	heading?: string;
	headingTag?: string;
	isOpen?: boolean;
	iconPosition?: string;
	iconType?: string;
	allowMultiple?: boolean;
	faqSchema?: boolean;
}

interface EditProps {
	attributes: ToggleAttributes;
	setAttributes: ( attrs: Partial< ToggleAttributes > ) => void;
	clientId: string;
}

interface ToggleFeatures {
	pill: boolean;
	switch: boolean;
	buttons: boolean;
	position: boolean;
	labels: boolean;
	animations: boolean;
	nested: boolean;
}

declare global {
	interface Window {
		aegisToggleFeatures?: Partial< ToggleFeatures >;
	}
}

const ALLOWED_BLOCKS = [ 'aegis/toggle-content' ];

const TEMPLATE: [ string, Record< string, unknown > ][] = [
	[ 'aegis/toggle-content', { slot: 'a' } ],
	[ 'aegis/toggle-content', { slot: 'b' } ],
];

function toggleFeatures(): ToggleFeatures {
	const raw = window.aegisToggleFeatures;

	if ( ! raw ) {
		return {
			pill: true,
			switch: true,
			buttons: true,
			position: true,
			labels: true,
			animations: true,
			nested: true,
		};
	}

	return {
		pill: !! raw.pill,
		switch: !! raw.switch,
		buttons: !! raw.buttons,
		position: !! raw.position,
		labels: !! raw.labels,
		animations: !! raw.animations,
		nested: !! raw.nested,
	};
}

function enabledStyles( extras: ToggleFeatures ): string[] {
	const styles: string[] = [];

	if ( extras.pill ) {
		styles.push( 'pill' );
	}

	if ( extras.switch ) {
		styles.push( 'switch' );
	}

	if ( extras.buttons ) {
		styles.push( 'buttons' );
	}

	return styles.length ? styles : [ 'switch' ];
}

function resolveStyle( saved: string, extras: ToggleFeatures ): string {
	const styles = enabledStyles( extras );

	return styles.includes( saved ) ? saved : styles[ 0 ];
}

function updatePillIndicator( wrapper: HTMLElement | null ): void {
	if ( ! wrapper ) {
		return;
	}

	const indicator = wrapper.querySelector< HTMLElement >(
		':scope > .aegis-toggle__control > .aegis-toggle__indicator'
	);
	const control = wrapper.querySelector< HTMLElement >(
		':scope > .aegis-toggle__control'
	);
	const active = wrapper.querySelector< HTMLElement >(
		':scope > .aegis-toggle__control > .aegis-toggle__button.is-active'
	);

	if ( ! indicator || ! control || ! active ) {
		return;
	}

	const controlRect = control.getBoundingClientRect();
	const buttonRect = active.getBoundingClientRect();

	indicator.style.width = `${ buttonRect.width }px`;
	indicator.style.transform = `translateX(${
		buttonRect.left - controlRect.left
	}px)`;
}

function Edit( { attributes, setAttributes, clientId }: EditProps ) {
	const extras = toggleFeatures();
	const styles = enabledStyles( extras );
	const switchStyle = resolveStyle( attributes.switchStyle, extras );
	const alignment = extras.position ? attributes.alignment : 'center';
	const primaryLabel = extras.labels
		? attributes.primaryLabel
		: __( 'First', 'aegis' );
	const secondaryLabel = extras.labels
		? attributes.secondaryLabel
		: __( 'Second', 'aegis' );
	const [ activeSlot, setActiveSlot ] = useState(
		attributes.initialContent === 'b' ? 'b' : 'a'
	);
	const wrapperRef = useRef< HTMLDivElement | null >( null );
	const lastSelectedSlot = useRef< string | null >( null );

	const innerBlocks = useSelect(
		( select ) =>
			select( 'core/block-editor' ).getBlocks( clientId ),
		[ clientId ]
	);
	const selectedSlot = useSelect(
		( select ) => {
			const editor = select( 'core/block-editor' ) as {
				getSelectedBlockClientId?: () => string | null;
				getBlockParents?: ( id: string ) => string[];
				getBlock?: ( id: string ) =>
					| {
							name: string;
							attributes?: { slot?: string };
					  }
					| undefined;
			};

			const selected = editor.getSelectedBlockClientId?.() ?? null;

			if ( ! selected || selected === clientId ) {
				return null;
			}

			const chain = [
				...( editor.getBlockParents?.( selected ) ?? [] ),
				selected,
			];

			if ( ! chain.includes( clientId ) ) {
				return null;
			}

			for ( let i = chain.length - 1; i >= 1; i-- ) {
				const block = editor.getBlock?.( chain[ i ] );
				const parentId = chain[ i - 1 ];

				if (
					block?.name === 'aegis/toggle-content' &&
					parentId === clientId
				) {
					return block.attributes?.slot === 'b' ? 'b' : 'a';
				}
			}

			return null;
		},
		[ clientId ]
	);
	const instanceIdTaken = useSelect(
		( select ) => {
			if ( ! attributes.instanceId ) {
				return false;
			}

			const editor = select( 'core/block-editor' ) as {
				getBlocksByName?: ( name: string ) => string[];
				getBlock?: ( id: string ) =>
					| { attributes?: { instanceId?: string } }
					| undefined;
			};

			if (
				typeof editor.getBlocksByName !== 'function' ||
				typeof editor.getBlock !== 'function'
			) {
				return false;
			}

			return editor
				.getBlocksByName( 'aegis/toggle' )
				.some(
					( id ) =>
						id !== clientId &&
						editor.getBlock( id )?.attributes?.instanceId ===
							attributes.instanceId
				);
		},
		[ attributes.instanceId, clientId ]
	);
	const { replaceInnerBlocks } = useDispatch( 'core/block-editor' );

	useEffect( () => {
		if ( ! attributes.instanceId || instanceIdTaken ) {
			setAttributes( { instanceId: clientId } );
		}
	}, [
		attributes.instanceId,
		clientId,
		instanceIdTaken,
		setAttributes,
	] );

	useEffect( () => {
		if (
			selectedSlot &&
			selectedSlot !== lastSelectedSlot.current &&
			selectedSlot !== activeSlot
		) {
			setActiveSlot( selectedSlot );
		}

		lastSelectedSlot.current = selectedSlot;
	}, [ activeSlot, selectedSlot ] );

	const slotSignature = innerBlocks
		.map(
			( block ) =>
				`${ block.name }:${ block.attributes?.slot ?? '' }`
		)
		.join( '|' );

	useEffect( () => {
		const contents = innerBlocks.filter(
			( block ) => block.name === 'aegis/toggle-content'
		);
		const slots = contents.map( ( block ) => block.attributes?.slot );
		const unique = new Set(
			slots.filter( ( slot ) => slot === 'a' || slot === 'b' )
		);

		if ( contents.length === 2 && unique.size === 2 ) {
			return;
		}

		const next = contents.slice( 0, 2 ).map( ( block, index ) =>
			createBlock(
				'aegis/toggle-content',
				{
					...block.attributes,
					slot: index === 0 ? 'a' : 'b',
				},
				block.innerBlocks
			)
		);

		if ( ! next[ 0 ] ) {
			next[ 0 ] = createBlock( 'aegis/toggle-content', { slot: 'a' } );
		}

		if ( ! next[ 1 ] ) {
			next[ 1 ] = createBlock( 'aegis/toggle-content', { slot: 'b' } );
		}

		replaceInnerBlocks( clientId, next, false );
	}, [ clientId, innerBlocks, replaceInnerBlocks, slotSignature ] );

	useLayoutEffect( () => {
		if ( switchStyle !== 'pill' ) {
			return;
		}

		const wrapper = wrapperRef.current;

		if ( ! wrapper ) {
			return;
		}

		const run = () => updatePillIndicator( wrapper );
		run();
		let cancelled = false;
		const frame = requestAnimationFrame( () => {
			requestAnimationFrame( () => {
				if ( ! cancelled ) {
					run();
				}
			} );
		} );

		const control = wrapper.querySelector(
			':scope > .aegis-toggle__control'
		);
		const observer =
			typeof ResizeObserver !== 'undefined' && control
				? new ResizeObserver( run )
				: null;

		if ( control ) {
			observer?.observe( control );
		}

		window.addEventListener( 'resize', run );

		return () => {
			cancelled = true;
			cancelAnimationFrame( frame );
			observer?.disconnect();
			window.removeEventListener( 'resize', run );
		};
	}, [ activeSlot, switchStyle, primaryLabel, secondaryLabel ] );

	const durationMs = attributes.animationDuration ?? 300;
	const blockProps = useBlockProps( {
		ref: wrapperRef,
		className: [
			'aegis-toggle',
			`aegis-toggle--style-${ switchStyle }`,
			`aegis-toggle--align-${ alignment }`,
		].join( ' ' ),
		style: {
			'--toggle-animation-duration': `${ durationMs }ms`,
			'--aegis-toggle-duration': `${ durationMs }ms`,
		} as CSSProperties,
		'data-editor-slot': activeSlot,
		'data-active': activeSlot,
	} );

	const onTabKeyDown = (
		event: KeyboardEvent< HTMLDivElement >,
		slot: 'a' | 'b'
	) => {
		if ( event.key === 'Enter' || event.key === ' ' ) {
			event.preventDefault();
			setActiveSlot( slot );
		}

		if ( event.key === 'ArrowRight' ) {
			event.preventDefault();
			setActiveSlot( 'b' );
		}

		if ( event.key === 'ArrowLeft' ) {
			event.preventDefault();
			setActiveSlot( 'a' );
		}
	};

	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'aegis-toggle__panels' },
		{
			allowedBlocks: ALLOWED_BLOCKS,
			template: TEMPLATE,
			templateLock: false,
			renderAppender: false,
		}
	);

	const stopLabelEvent = ( event: SyntheticEvent ) => {
		event.stopPropagation();
	};

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Toggle Settings', 'aegis' ) }>
					{ styles.length > 1 && (
						<SelectControl
							label={ __( 'Switcher style', 'aegis' ) }
							value={ switchStyle }
							options={ styles.map( ( value ) => ( {
								label:
									value === 'pill'
										? __( 'Pill', 'aegis' )
										: value === 'buttons'
										? __( 'Buttons', 'aegis' )
										: __( 'Switch', 'aegis' ),
								value,
							} ) ) }
							onChange={ ( value ) =>
								setAttributes( { switchStyle: value } )
							}
						/>
					) }
					{ extras.position && (
						<SelectControl
							label={ __( 'Alignment', 'aegis' ) }
							value={ attributes.alignment }
							options={ [
								{
									label: __( 'Left', 'aegis' ),
									value: 'left',
								},
								{
									label: __( 'Center', 'aegis' ),
									value: 'center',
								},
								{
									label: __( 'Right', 'aegis' ),
									value: 'right',
								},
							] }
							onChange={ ( value ) =>
								setAttributes( { alignment: value } )
							}
						/>
					) }
					<SelectControl
						label={ __( 'Initial view', 'aegis' ) }
						value={ attributes.initialContent }
						options={ [
							{
								label: primaryLabel || __( 'First', 'aegis' ),
								value: 'a',
							},
							{
								label: secondaryLabel || __( 'Second', 'aegis' ),
								value: 'b',
							},
						] }
						onChange={ ( value ) => {
							setAttributes( { initialContent: value } );
							setActiveSlot( value === 'b' ? 'b' : 'a' );
						} }
					/>
					{ extras.animations && (
						<RangeControl
							label={ __( 'Animation Duration (ms)', 'aegis' ) }
							value={ attributes.animationDuration }
							onChange={ ( value ) =>
								setAttributes( {
									animationDuration: value ?? 300,
								} )
							}
							min={ 0 }
							max={ 1000 }
							step={ 50 }
						/>
					) }
				</PanelBody>
			</InspectorControls>

			<div
				className="aegis-toggle__control"
				role="tablist"
				aria-label={ __( 'Content switcher', 'aegis' ) }
			>
				<div
					className={
						'aegis-toggle__button' +
						( activeSlot === 'a' ? ' is-active' : '' )
					}
					data-toggle-target="a"
					role="tab"
					tabIndex={ 0 }
					aria-selected={ activeSlot === 'a' }
					onClick={ () => setActiveSlot( 'a' ) }
					onKeyDown={ ( event ) => onTabKeyDown( event, 'a' ) }
				>
					{ extras.labels ? (
						<span onMouseDown={ stopLabelEvent }>
							<RichText
								tagName="span"
								value={ attributes.primaryLabel }
								onChange={ ( value ) =>
									setAttributes( { primaryLabel: value } )
								}
								placeholder={ __( 'First', 'aegis' ) }
								allowedFormats={ [] }
							/>
						</span>
					) : (
						<span>
							{ primaryLabel || __( 'First', 'aegis' ) }
						</span>
					) }
				</div>
				{ switchStyle === 'switch' && (
					<span
						className="aegis-toggle__track"
						aria-hidden="true"
						onClick={ () =>
							setActiveSlot( activeSlot === 'a' ? 'b' : 'a' )
						}
					>
						<span className="aegis-toggle__thumb" />
					</span>
				) }
				{ switchStyle === 'pill' && (
					<span className="aegis-toggle__indicator" aria-hidden="true" />
				) }
				<div
					className={
						'aegis-toggle__button' +
						( activeSlot === 'b' ? ' is-active' : '' )
					}
					data-toggle-target="b"
					role="tab"
					tabIndex={ 0 }
					aria-selected={ activeSlot === 'b' }
					onClick={ () => setActiveSlot( 'b' ) }
					onKeyDown={ ( event ) => onTabKeyDown( event, 'b' ) }
				>
					{ extras.labels ? (
						<span onMouseDown={ stopLabelEvent }>
							<RichText
								tagName="span"
								value={ attributes.secondaryLabel }
								onChange={ ( value ) =>
									setAttributes( { secondaryLabel: value } )
								}
								placeholder={ __( 'Second', 'aegis' ) }
								allowedFormats={ [] }
							/>
						</span>
					) : (
						<span>
							{ secondaryLabel || __( 'Second', 'aegis' ) }
						</span>
					) }
				</div>
			</div>

			<div { ...innerBlocksProps } />
		</div>
	);
}

function save() {
	return <InnerBlocks.Content />;
}

registerBlockType( metadata.name, {
	edit: Edit,
	save,
	deprecated: [
		{
			attributes: {
				heading: { type: 'string', default: '' },
				headingTag: { type: 'string', default: 'h3' },
				isOpen: { type: 'boolean', default: false },
				iconPosition: { type: 'string', default: 'right' },
				iconType: { type: 'string', default: 'chevron' },
				allowMultiple: { type: 'boolean', default: true },
				animationDuration: { type: 'number', default: 300 },
				faqSchema: { type: 'boolean', default: false },
			},
			supports: metadata.supports,
			save,
			isEligible( attributes: ToggleAttributes, innerBlocks ) {
				const alreadySwitcher = ( innerBlocks || [] ).some(
					( block: { name: string } ) =>
						block.name === 'aegis/toggle-content'
				);

				if ( alreadySwitcher ) {
					return false;
				}

				return (
					Object.prototype.hasOwnProperty.call(
						attributes,
						'iconType'
					) ||
					Object.prototype.hasOwnProperty.call(
						attributes,
						'headingTag'
					)
				);
			},
			migrate( attributes: ToggleAttributes, innerBlocks ) {
				const first = innerBlocks[ 0 ];
				const primary = first
					? createBlock(
							'aegis/toggle-content',
							{ ...first.attributes, slot: 'a' },
							first.innerBlocks
					  )
					: createBlock( 'aegis/toggle-content', { slot: 'a' } );

				return [
					{
						switchStyle: 'switch',
						alignment: 'center',
						primaryLabel: attributes.heading || '',
						secondaryLabel: '',
						initialContent: 'a',
						animationDuration: attributes.animationDuration || 300,
					},
					[
						primary,
						createBlock( 'aegis/toggle-content', { slot: 'b' } ),
					],
				];
			},
		},
	],
} );
