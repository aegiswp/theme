/**
 * Remove webpack/build artifacts (cross-platform).
 *
 * Usage: node tools/clean-build.js
 * For a full reset including node_modules, use: make clean
 */

const fs = require( 'fs' );
const path = require( 'path' );

const root = path.resolve( __dirname, '..' );

const rm = ( target ) => {
	const full = path.join( root, target );
	try {
		fs.rmSync( full, { recursive: true, force: true } );
	} catch ( error ) {
		// Ignore missing paths.
	}
};

[
	'build',
	'dist',
	'aegis',
	'src/Admin/build',
	'src/Blocks/editor',
	'.eslintcache',
	'.stylelintcache',
].forEach( rm );

const blocksDir = path.join( root, 'src', 'Blocks' );

if ( fs.existsSync( blocksDir ) ) {
	const artifacts = [
		'index.js',
		'view.js',
		'style.js',
		'index.css',
		'style.css',
		'style-style.css',
	];

	for ( const entry of fs.readdirSync( blocksDir, { withFileTypes: true } ) ) {
		if ( ! entry.isDirectory() ) {
			continue;
		}

		const blockDir = path.join( blocksDir, entry.name );

		for ( const file of fs.readdirSync( blockDir ) ) {
			if (
				artifacts.includes( file ) ||
				file.endsWith( '.asset.php' ) ||
				file.endsWith( '-rtl.css' ) ||
				file.endsWith( '.map' )
			) {
				fs.rmSync( path.join( blockDir, file ), { force: true } );
			}
		}
	}
}

console.log( 'Build artifacts cleaned.' );
