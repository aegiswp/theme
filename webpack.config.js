const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const path = require('path');

// Remove the default CopyWebpackPlugin to prevent recursive blocks/blocks/ nesting.
// The default plugin copies block.json/render.php relative to the source directory,
// but since our output path IS the source directory, it creates nested copies.
const filteredPlugins = (defaultConfig.plugins || []).filter(
    (plugin) => plugin.constructor.name !== 'CopyPlugin'
);

const blockNames = ['modal', 'slider', 'slide', 'toggle', 'toggle-content', 'video'];
const copyPatterns = blockNames.flatMap((name) => {
    const patterns = [
        {
            from: path.resolve(__dirname, `src/blocks/${name}/block.json`),
            to: path.resolve(__dirname, `src/blocks/${name}/block.json`),
            noErrorOnMissing: true,
        },
    ];

    // Only copy render.php for blocks that have one.
    const renderPath = path.resolve(__dirname, `src/blocks/${name}/render.php`);
    patterns.push({
        from: renderPath,
        to: path.resolve(__dirname, `src/blocks/${name}/render.php`),
        noErrorOnMissing: true,
    });

    return patterns;
});

module.exports = {
    ...defaultConfig,
    plugins: [
        ...filteredPlugins,
        new CopyWebpackPlugin({ patterns: copyPatterns }),
    ],
    entry: {
        'modal/index': path.resolve(__dirname, 'src/blocks/modal/index.tsx'),
        'modal/view': path.resolve(__dirname, 'src/blocks/modal/view.ts'),
        'modal/style': path.resolve(__dirname, 'src/blocks/modal/style.scss'),
        'slider/index': path.resolve(__dirname, 'src/blocks/slider/index.tsx'),
        'slider/view': path.resolve(__dirname, 'src/blocks/slider/view.ts'),
        'slider/style': path.resolve(__dirname, 'src/blocks/slider/style.scss'),
        'slide/index': path.resolve(__dirname, 'src/blocks/slide/index.tsx'),
        'slide/style': path.resolve(__dirname, 'src/blocks/slide/style.scss'),
        'toggle/index': path.resolve(__dirname, 'src/blocks/toggle/index.tsx'),
        'toggle/view': path.resolve(__dirname, 'src/blocks/toggle/view.ts'),
        'toggle/style': path.resolve(__dirname, 'src/blocks/toggle/style.scss'),
        'toggle-content/index': path.resolve(__dirname, 'src/blocks/toggle-content/index.tsx'),
        'toggle-content/style': path.resolve(__dirname, 'src/blocks/toggle-content/style.scss'),
        'video/index': path.resolve(__dirname, 'src/blocks/video/index.tsx'),
        'video/style': path.resolve(__dirname, 'src/blocks/video/style.scss'),
        'editor/video-editor': path.resolve(__dirname, 'src/editor/video-editor.tsx'),
        'editor/video-editor-style': path.resolve(__dirname, 'src/editor/video-editor.scss'),
    },
    output: {
        path: path.resolve(__dirname, 'src/blocks'),
        filename: '[name].js',
    },
};
