# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added
- Run the functional tests in parallel
- Add PHP-CS-Fixer
- Add support for PHP 7.3
- Add support for TYPO3 9.6
- Add PHP_CodeSniffer to the Travis CI build
- Auto-release to the TER
- Composer script for PHP linting

### Changed
- Use .typoscript as file extension for TS files
- Convert the PHP namespaces to "TTN" (#8)
- Update the contact email in the CoC document (#6)
- Switch to the `TTN` PHP vendor namespace (#1, #5)
- Sort the Composer dependencies
- Upgrade PHPUnit to 7.5.14
- Change from GPL V3+ to GPL V2+
- Streamline ext_emconf.php

### Deprecated

### Removed
- Drop unneeded Travis CI configuration settings
- Drop `ext_icon.svg`
- Stop building with the lowest Composer dependencies
- Drop support for TYPO3 < 9.5
- Drop support for PHP < 7.2
- Drop support for TYPO3 7.6 and require TYPO3 >= 8.7
- Drop the TYPO3 package repository from `composer.json`
- Drop the dependency of `roave/security-advisories`

### Fixed
- Fix code inspection warnings
- Use the new annotations for lazy loading
- Update and pin the dev dependencies
- Drop an obsolete "replace" entry from `composer.json`
- Explicitly require MySQL on Travis CI
- Add `.php_cs.cache` to the `.gitignore`

## 2.0.0
- Complete rewrite. Usable with TYPO3 7.6 and 8.7.
