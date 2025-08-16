/* eslint-disable @typescript-eslint/no-require-imports */
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
    ...defaultConfig,
    plugins: [
        ...defaultConfig.plugins,
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 8882,
            proxy: 'https://aegis.wp.local', // Replace with your Local WP site URL
            files: ['./**/*.php', './**/*.css', './**/*.js', '!./node_modules', '!./vendor'],
            open: false, // Prevents opening a new browser window automatically
        }),
    ],
};
