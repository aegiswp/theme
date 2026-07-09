/**
 * Prepare compiled JS assets for `wp i18n make-pot`.
 *
 * WP-CLI scans JavaScript but not TypeScript. Block sources under `src/Blocks`
 * compile to `build/Blocks`, and the video editor extension ships from the
 * companion plugin build output.
 *
 * @package
 */

const fs = require( 'fs' );
const path = require( 'path' );

const themeRoot = path.resolve( __dirname, '..' );
const editorBuildDir = path.join( themeRoot, 'build', 'Editor' );
const editorBuildFile = path.join( editorBuildDir, 'video-editor.js' );
const pluginEditorSource = path.resolve(
	themeRoot,
	'..',
	'..',
	'plugins',
	'aegis',
	'assets',
	'editor',
	'build',
	'video-editor.tsx.js'
);

if ( ! fs.existsSync( path.join( themeRoot, 'build', 'Blocks' ) ) ) {
	console.warn(
		'Warning: build/Blocks not found. Run `npm run build` before translate so block editor strings are included.'
	);
}

if ( fs.existsSync( pluginEditorSource ) ) {
	fs.mkdirSync( editorBuildDir, { recursive: true } );
	fs.copyFileSync( pluginEditorSource, editorBuildFile );
	console.log( 'Copied companion plugin video editor build for translation scan.' );
} else if ( ! fs.existsSync( editorBuildFile ) ) {
	console.warn(
		'Warning: video editor build not found. Video block extension strings may be missing from the POT file.'
	);
}
