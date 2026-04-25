/**
 * Webpack configuration for the theme
 *
 * Uses `@wordpress/scripts` defaults. `entry` is empty because custom block
 * sources that ship with this repository are built by the same toolchain when
 * entries are added under `src/Blocks` (see package `build` / `start` scripts).
 *
 * Extend `entry` here when you introduce theme-only scripts or styles that need
 * compilation outside the framework package.
 *
 * @package Aegis
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/
 */
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {},
};
