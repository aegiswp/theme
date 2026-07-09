/**
 * Normalize POT file references after `wp i18n make-pot`.
 *
 * @package
 */

const fs = require( 'fs' );
const path = require( 'path' );

const potFile = path.join( path.resolve( __dirname, '..' ), 'languages', 'aegis.pot' );

if ( ! fs.existsSync( potFile ) ) {
	process.exit( 0 );
}

let content = fs.readFileSync( potFile, 'utf8' );
content = content.replaceAll(
	'#: build/Editor/video-editor.js:1',
	'#: src/Editor/video-editor.tsx:1'
);
fs.writeFileSync( potFile, content );
