const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const BrowserSyncPlugin = require( 'browser-sync-webpack-plugin' );

module.exports = ( env ) => {
	const isProduction = env === 'production';

	return {
		...defaultConfig,

		entry: {
			editor: './src/index.tsx',
			animation: './src/public/animation.tsx',
			counter: './src/public/counter.tsx',
			details: './src/public/details.tsx',
			packery: './src/public/packery.tsx',
			scroll: './src/public/scroll.tsx',
		},

		devtool: isProduction ? false : 'source-map',

		plugins: [
			...defaultConfig.plugins,

			new BrowserSyncPlugin( {
				host: 'localhost',
				port: 10034,
				proxy: 'https://aegiswp.local/',
				reload: !isProduction,
			} ),
		],
	};
};