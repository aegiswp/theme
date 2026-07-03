/**
 * Project ESLint flat config.
 *
 * Extends the @wordpress/scripts default config and ignores compiled
 * webpack output that lives next to block sources (mirrors .gitignore).
 * CI lints a fresh clone where these artifacts do not exist; ignoring
 * them keeps local `npm run lint:js` consistent with CI.
 */

const defaultConfig = require( '@wordpress/scripts/config/eslint.config.cjs' );

module.exports = [
	{
		ignores: [
			'eslint.config.cjs',
			'scripts/**',
			'tools/**',
			'src/Blocks/*/index.js',
			'src/Blocks/*/view.js',
			'src/Blocks/*/style.js',
			'src/Blocks/editor/**',
			'src/Admin/build/**',
			'**/*.asset.php',
			'build/**',
			'dist/**',
			'vendor/**',
			'node_modules/**',
		],
	},
	...defaultConfig,
];
