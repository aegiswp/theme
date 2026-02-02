const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
    ...defaultConfig,
    entry: {
        'modal/index': path.resolve(__dirname, 'src/blocks/modal/index.tsx'),
        'modal/view': path.resolve(__dirname, 'src/blocks/modal/view.ts'),
        'modal/style': path.resolve(__dirname, 'src/blocks/modal/style.scss'),
        'slider/index': path.resolve(__dirname, 'src/blocks/slider/index.tsx'),
        'slider/view': path.resolve(__dirname, 'src/blocks/slider/view.ts'),
        'slider/style': path.resolve(__dirname, 'src/blocks/slider/style.scss'),
        'slide/index': path.resolve(__dirname, 'src/blocks/slide/index.tsx'),
        'slide/style': path.resolve(__dirname, 'src/blocks/slide/style.scss'),
    },
    output: {
        path: path.resolve(__dirname, 'src/blocks'),
        filename: '[name].js',
    },
};
