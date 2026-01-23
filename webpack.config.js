const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const path = require('path');

module.exports = {
    ...defaultConfig,
    entry: {
        // Block entries
        'blocks/modal/index': path.resolve(__dirname, 'src/blocks/modal/index.tsx'),
        'blocks/modal/view': path.resolve(__dirname, 'src/blocks/modal/view.ts'),
    },
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: '[name].js',
    },
    plugins: [
        ...defaultConfig.plugins,
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 8882,
            proxy: 'http://localhost:8881', // Replace with your Local WP site URL
            files: [
                './**/*.php',
                './**/*.css',
                './**/*.js',
                '!./node_modules',
                '!./vendor'
            ],
            open: false // Prevents opening a new browser window automatically
        })
    ]
};
