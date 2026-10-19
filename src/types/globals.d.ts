/**
 * Ambient type declarations for the theme's block sources.
 *
 * - Stylesheets are imported for their side effects and bundled by webpack.
 * - `@wordpress/block-editor` ships no complete type declarations.
 * - Splide is exposed on `window` by the slider's view script.
 *
 * @package
 */

declare module '*.scss';

declare module '@wordpress/block-editor';

interface Window {
	splide?: {
		Extensions?: Record< string, unknown >;
	};
}
