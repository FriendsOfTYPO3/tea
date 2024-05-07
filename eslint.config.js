import js from "@eslint/js";

export default [
  js.configs.recommended,
  {
    languageOptions: {
      ecmaVersion: 2022,
      globals: {
        document: false,
        TYPO3: "readonly"
      },
    },
    ignores: [
      "node_modules"
    ]
  }
]
