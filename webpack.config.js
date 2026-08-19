/**
 * Webpack configuration for the theme.
 *
 * Extends `@wordpress/scripts` defaults:
 * - Discovers block.json entries under `src/` (countdown, slider, slide, toggle,
 *   toggle-content, related-posts).
 * - Emits compiled block assets in place under `src/Blocks/` so `file:` paths
 *   in block.json resolve next to the source `block.json`.
 *
 * `output.clean` is disabled because the output directory is the live `src/`
 * tree (PHP, SCSS, and TS sources must not be deleted on build).
 *
 * @package
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/
 */

const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

/**
 * Keep wp-scripts defaults but emit into the live `src/` tree.
 *
 * @param {import('webpack').Configuration} config Default wp-scripts config.
 * @return {import('webpack').Configuration} Theme webpack config.
 */
const withThemeOutput = ( config ) => ( {
	...config,
	output: {
		...config.output,
		path: path.resolve( __dirname, 'src' ),
		clean: false,
	},
} );

module.exports = Array.isArray( defaultConfig )
	? defaultConfig.map( withThemeOutput )
	: withThemeOutput( defaultConfig );
