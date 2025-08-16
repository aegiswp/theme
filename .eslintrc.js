module.exports = {
    extends: [
        'plugin:@wordpress/eslint-plugin/recommended',
        'plugin:react/recommended',
        'plugin:@typescript-eslint/recommended',
    ],
    parser: '@typescript-eslint/parser',
    plugins: ['@typescript-eslint'],
    root: true,
    env: {
        browser: true,
        es6: true,
    },
    settings: {
        react: {
            version: 'detect',
        },
    },
    rules: {
        '@typescript-eslint/explicit-function-return-type': 'off',
        '@typescript-eslint/explicit-module-boundary-types': 'off',
        'react/react-in-jsx-scope': 'off',
    },
};
