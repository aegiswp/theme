/**
 * Prepare vendored PHP/JS for `wp i18n make-pot`.
 *
 * WP-CLI scans JavaScript but not TypeScript. Theme block sources under
 * `src/Blocks` compile in place.
 *
 * `vendor/` is excluded from make-pot, so Icon library PHP/JS, Marquee
 * editor JS, Newsletter PHP/JS, Accordion PHP, SVG editor JS/PHP,
 * Visibility editor JS, and Query Loop PHP/JS are copied into
 * `build/I18nScan` for the scan. finish-translate.js rewrites POT
 * references back to the real vendor paths.
 * Bundled `public/js/editor.js` is not copied (minified leftover inspector
 * strings are unreachable; live SVG inspector strings come from `svg-editor.js`).
 *
 * Companion plugin strings (Map, Modal, Blocks admin, video editor) live in
 * `wp-content/plugins/aegis/languages/aegis.pot`. Do not copy them here.
 *
 * @package
 */

const fs = require( 'fs' );
const path = require( 'path' );

const themeRoot = path.resolve( __dirname, '..' );
const i18nScanDir = path.join( themeRoot, 'build', 'I18nScan' );
const editorBuildFile = path.join( themeRoot, 'build', 'Editor', 'video-editor.js' );

const scanCopies = [
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'src',
			'Icons',
			'Library.php'
		),
		to: path.join( i18nScanDir, 'Library.php' ),
		label: 'Icon library PHP',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'public',
			'js',
			'icon-block-editor.js'
		),
		to: path.join( i18nScanDir, 'icon-block-editor.js' ),
		label: 'Icon block editor script',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'public',
			'js',
			'marquee-editor.js'
		),
		to: path.join( i18nScanDir, 'marquee-editor.js' ),
		label: 'Marquee editor script',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'public',
			'js',
			'newsletter-editor.js'
		),
		to: path.join( i18nScanDir, 'newsletter-editor.js' ),
		label: 'Newsletter editor script',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'public',
			'js',
			'svg-editor.js'
		),
		to: path.join( i18nScanDir, 'svg-editor.js' ),
		label: 'SVG editor script',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'src',
			'BlockVariations',
			'Svg.php'
		),
		to: path.join( i18nScanDir, 'Svg.php' ),
		label: 'SVG variation PHP',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'src',
			'BlockVariations',
			'Newsletter.php'
		),
		to: path.join( i18nScanDir, 'Newsletter.php' ),
		label: 'Newsletter variation PHP',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'src',
			'BlockVariations',
			'AccordionList.php'
		),
		to: path.join( i18nScanDir, 'AccordionList.php' ),
		label: 'Accordion variation PHP',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'public',
			'js',
			'visibility-toggles.js'
		),
		to: path.join( i18nScanDir, 'visibility-toggles.js' ),
		label: 'Visibility editor script',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'public',
			'js',
			'query-enhancements-editor.js'
		),
		to: path.join( i18nScanDir, 'query-enhancements-editor.js' ),
		label: 'Query Loop editor script',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'src',
			'BlockSettings',
			'QueryEnhancements.php'
		),
		to: path.join( i18nScanDir, 'QueryEnhancements.php' ),
		label: 'Query Loop enhancements PHP',
	},
	{
		from: path.join(
			themeRoot,
			'vendor',
			'aegis',
			'framework',
			'src',
			'BlockSettings',
			'QueryNoResults.php'
		),
		to: path.join( i18nScanDir, 'QueryNoResults.php' ),
		label: 'Query Loop no-results PHP',
	},
];

if ( ! fs.existsSync( path.join( themeRoot, 'src', 'Blocks' ) ) ) {
	console.warn(
		'Warning: src/Blocks not found. Run `npm run build` before translate so block editor strings are included.'
	);
}

if ( fs.existsSync( editorBuildFile ) ) {
	fs.unlinkSync( editorBuildFile );
	console.log( 'Removed leftover plugin video editor copy from the theme translation scan.' );
}

if ( fs.existsSync( i18nScanDir ) ) {
	fs.rmSync( i18nScanDir, { recursive: true, force: true } );
}

fs.mkdirSync( i18nScanDir, { recursive: true } );

for ( const item of scanCopies ) {
	if ( fs.existsSync( item.from ) ) {
		fs.copyFileSync( item.from, item.to );
		console.log( `Copied ${ item.label } for translation scan.` );
	} else {
		console.warn( `Warning: ${ item.label } not found at ${ item.from }.` );
	}
}
