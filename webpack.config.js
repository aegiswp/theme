/**
 * Webpack configuration for the theme.
 *
 * Extends `@wordpress/scripts` defaults:
 * - Discovers block.json entries under `src/` (countdown, slider, slide, toggle,
 *   toggle-content, related-posts).
 * - Prefers `index.tsx` / `view.ts` when present so in-place `file:index.js`
 *   paths in block.json do not rebundle the compiled output.
 * - Emits compiled block assets in place under `src/Blocks/` so `file:` paths
 *   in block.json resolve next to the source `block.json`.
 *
 * `output.clean` is disabled because the output directory is the live `src/`
 * tree (PHP, SCSS, and TS sources must not be deleted on build).
 *
 * @package
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/
 */

const fs = require( 'fs' );
const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

/**
 * Use TypeScript sources when webpack would otherwise compile the JS output.
 *
 * @param {string} entryPath Webpack entry path.
 * @return {string} Entry path to compile.
 */
const preferTypeScriptEntry = ( entryPath ) => {
	if ( typeof entryPath !== 'string' ) {
		return entryPath;
	}

	const tsx = entryPath.replace( /\.js$/, '.tsx' );
	if ( fs.existsSync( tsx ) ) {
		return tsx;
	}

	const ts = entryPath.replace( /\.js$/, '.ts' );
	if ( fs.existsSync( ts ) ) {
		return ts;
	}

	return entryPath;
};

/**
 * Walk webpack entry objects/arrays and prefer TypeScript sources.
 *
 * @param {import('webpack').Entry} entry Webpack entry.
 * @return {import('webpack').Entry} Remapped entry.
 */
const remapEntries = ( entry ) => {
	if ( typeof entry === 'function' ) {
		return remapEntries( entry() );
	}

	if ( Array.isArray( entry ) ) {
		return entry.map( preferTypeScriptEntry );
	}

	if ( entry && typeof entry === 'object' ) {
		return Object.fromEntries(
			Object.entries( entry ).map( ( [ name, value ] ) => [
				name,
				remapEntries( value ),
			] )
		);
	}

	return preferTypeScriptEntry( entry );
};

/**
 * Keep wp-scripts defaults but emit into the live `src/` tree.
 *
 * @param {import('webpack').Configuration} config Default wp-scripts config.
 * @return {import('webpack').Configuration} Theme webpack config.
 */
const withThemeOutput = ( config ) => ( {
	...config,
	entry: remapEntries( config.entry ),
	output: {
		...config.output,
		path: path.resolve( __dirname, 'src' ),
		clean: false,
	},
} );

module.exports = Array.isArray( defaultConfig )
	? defaultConfig.map( withThemeOutput )
	: withThemeOutput( defaultConfig );
