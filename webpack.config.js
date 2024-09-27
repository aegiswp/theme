const { merge } = require('webpack-merge');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const path = require('path');

module.exports = (env) => {
    const isProduction = env && env.production;

    return merge(defaultConfig, {
        mode: isProduction ? 'production' : 'development',

        entry: {
            editor: './src/index.tsx',
            animation: './src/public/animation.tsx',
            counter: './src/public/counter.tsx',
            details: './src/public/details.tsx',
            packery: './src/public/packery.tsx',
            scroll: './src/public/scroll.tsx',
        },

        output: {
            path: path.resolve(__dirname, 'build'),
            filename: '[name].js',
        },

        devtool: isProduction ? false : 'source-map',

        plugins: [
            new BrowserSyncPlugin({
                host: 'localhost',
                port: 10019,
                proxy: 'https://aegis.local/',
                reload: !isProduction,
            }),
        ],
    });
};
