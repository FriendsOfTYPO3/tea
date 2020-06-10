module.exports = {
    root: true,
    env: {
        browser: true,
        node: true
    },
    parserOptions: {
        parser: 'babel-eslint'
    },
    extends: [
        '@nuxtjs',
        'eslint:recommended',
        'plugin:prettier/recommended',
        'prettier',
        'prettier/standard'
    ],
    plugins: [
        'prettier'
    ]
}
