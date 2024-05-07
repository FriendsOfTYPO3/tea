import js from "@eslint/js";
import eslintConfigPrettier from "eslint-config-prettier";

export default [
  js.configs.recommended,
  eslintConfigPrettier,
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
