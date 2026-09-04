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
	'#: build/I18nScan/Library.php',
	'#: vendor/aegis/framework/src/Icons/Library.php'
);
content = content.replaceAll(
	'#: build/I18nScan/icon-block-editor.js',
	'#: vendor/aegis/framework/public/js/icon-block-editor.js'
);
content = content.replaceAll(
	'#: build/I18nScan/marquee-editor.js',
	'#: vendor/aegis/framework/public/js/marquee-editor.js'
);
fs.writeFileSync( potFile, content );
