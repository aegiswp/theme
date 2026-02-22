const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const path = require('path');

// Remove the default CopyWebpackPlugin to prevent recursive blocks/blocks/ nesting.
// The default plugin copies block.json/render.php relative to the source directory,
// but since our output path IS the source directory, it creates nested copies.
const filteredPlugins = (defaultConfig.plugins || []).filter(
    (plugin) => plugin.constructor.name !== 'CopyPlugin'
);

const blockNames = ['countdown', 'map', 'modal', 'related-posts', 'slider', 'slide', 'toggle', 'toggle-content', 'video'];
const copyPatterns = blockNames.flatMap((name) => {
    const patterns = [
        {
            from: path.resolve(__dirname, `src/Blocks/${name}/block.json`),
            to: path.resolve(__dirname, `src/Blocks/${name}/block.json`),
            noErrorOnMissing: true,
        },
    ];

    // Only copy render.php for blocks that have one.
    const renderPath = path.resolve(__dirname, `src/Blocks/${name}/render.php`);
    patterns.push({
        from: renderPath,
        to: path.resolve(__dirname, `src/Blocks/${name}/render.php`),
        noErrorOnMissing: true,
    });

    return patterns;
});

// WordPress externals for proper dependency management
const wordpressExternals = {
    '@wordpress/blocks': 'wp.blocks',
    '@wordpress/element': 'wp.element',
    '@wordpress/components': 'wp.components',
    '@wordpress/data': 'wp.data',
    '@wordpress/i18n': 'wp.i18n',
    '@wordpress/hooks': 'wp.hooks',
    '@wordpress/api-fetch': 'wp.apiFetch',
    '@wordpress/url': 'wp.url',
    '@wordpress/escape-html': 'wp.escapeHtml',
    '@wordpress/primitives': 'wp.primitives',
    '@wordpress/rich-text': 'wp.richText',
    '@wordpress/compose': 'wp.compose',
    '@wordpress/keycodes': 'wp.keycodes',
    '@wordpress/deprecated': 'wp.deprecated',
    '@wordpress/dom': 'wp.dom',
    '@wordpress/is-shallow-equal': 'wp.isShallowEqual',
    '@wordpress/priority-queue': 'wp.priorityQueue',
    'react': 'React',
    'react-dom': 'ReactDOM',
    'moment': 'moment',
    'lodash': 'lodash',
};

// Blocks & Editor config — outputs to src/Blocks/
const blocksConfig = {
    ...defaultConfig,
    externals: {
        ...defaultConfig.externals,
        ...wordpressExternals,
    },
    plugins: [
        ...filteredPlugins,
        new CopyWebpackPlugin({ patterns: copyPatterns }),
    ],
    entry: {
        'countdown/index': path.resolve(__dirname, 'src/Blocks/countdown/index.tsx'),
        'countdown/view': path.resolve(__dirname, 'src/Blocks/countdown/view.ts'),
        'countdown/style': path.resolve(__dirname, 'src/Blocks/countdown/style.scss'),
        'map/index': path.resolve(__dirname, 'src/Blocks/map/index.tsx'),
        'map/view': path.resolve(__dirname, 'src/Blocks/map/view.ts'),
        'map/style': path.resolve(__dirname, 'src/Blocks/map/style.scss'),
        'modal/index': path.resolve(__dirname, 'src/Blocks/modal/index.tsx'),
        'modal/view': path.resolve(__dirname, 'src/Blocks/modal/view.ts'),
        'modal/style': path.resolve(__dirname, 'src/Blocks/modal/style.scss'),
        'related-posts/index': path.resolve(__dirname, 'src/Blocks/related-posts/index.tsx'),
        'related-posts/style': path.resolve(__dirname, 'src/Blocks/related-posts/style.scss'),
        'slider/index': path.resolve(__dirname, 'src/Blocks/slider/index.tsx'),
        'slider/view': path.resolve(__dirname, 'src/Blocks/slider/view.ts'),
        'slider/style': path.resolve(__dirname, 'src/Blocks/slider/style.scss'),
        'slide/index': path.resolve(__dirname, 'src/Blocks/slide/index.tsx'),
        'slide/style': path.resolve(__dirname, 'src/Blocks/slide/style.scss'),
        'toggle/index': path.resolve(__dirname, 'src/Blocks/toggle/index.tsx'),
        'toggle/view': path.resolve(__dirname, 'src/Blocks/toggle/view.ts'),
        'toggle/style': path.resolve(__dirname, 'src/Blocks/toggle/style.scss'),
        'toggle-content/index': path.resolve(__dirname, 'src/Blocks/toggle-content/index.tsx'),
        'toggle-content/style': path.resolve(__dirname, 'src/Blocks/toggle-content/style.scss'),
        'video/index': path.resolve(__dirname, 'src/Blocks/video/index.tsx'),
        'video/style': path.resolve(__dirname, 'src/Blocks/video/style.scss'),
        'editor/video-editor': path.resolve(__dirname, 'src/Editor/video-editor.tsx'),
        'editor/video-editor-style': path.resolve(__dirname, 'src/Editor/video-editor.scss'),
    },
    output: {
        path: path.resolve(__dirname, 'src/Blocks'),
        filename: '[name].js',
    },
    // Ensure WordPress dependency generation
    optimization: {
        ...defaultConfig.optimization,
        runtimeChunk: false,
        splitChunks: {
            chunks: 'all',
            cacheGroups: {
                default: false,
                vendors: false,
                wordpress: {
                    name: 'wordpress',
                    chunks: 'all',
                    test: /[\\/]node_modules[\\/](@wordpress|react|react-dom|moment|lodash)[\\/]/,
                    priority: 10,
                },
            },
        },
    },
};

// Admin config — outputs to src/Admin/build/
const adminConfig = {
    ...defaultConfig,
    externals: {
        ...defaultConfig.externals,
        ...wordpressExternals,
    },
    entry: {
        index: path.resolve(__dirname, 'src/Admin/index.js'),
    },
    output: {
        path: path.resolve(__dirname, 'src/Admin/build'),
        filename: '[name].js',
    },
    optimization: {
        ...defaultConfig.optimization,
        runtimeChunk: false,
        splitChunks: {
            chunks: 'all',
            cacheGroups: {
                default: false,
                vendors: false,
                wordpress: {
                    name: 'wordpress',
                    chunks: 'all',
                    test: /[\\/]node_modules[\\/](@wordpress|react|react-dom|moment|lodash)[\\/]/,
                    priority: 10,
                },
            },
        },
    },
};

module.exports = [blocksConfig, adminConfig];
