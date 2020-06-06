# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added
- Run the functional tests via GitHub Actions (#55)
- Cache Composer dependencies in build (#31)
- Add a status badge for GitHub actions (#32)
- Composer script for PHP code sniffer fixing (#21)
- Run the functional tests in parallel
- Add PHP-CS-Fixer
- Add support for PHP 7.3 and 7.4
- Add support for TYPO3 9.5 and 10.x (#27)
- Add PHP_CodeSniffer to the Travis CI build
- Auto-release to the TER
- Composer script for PHP linting

### Changed
- Disable running with lower dependencies on GitHub actions (#54)
- Move the project to the TYPO3 Documentation Team (#47)
- Run unit tests with GitHub actions (#37)
- Switch from PSR-2 to PSR-12 (#3, #35)
- Move TypoScript linting to GitHub actions (#14)
- Move PHP code sniffing to GitHub actions (#13)
- Move PHP linting to GitHub actions (#12)
- Use `.typoscript` as file extension for TS files (#19)
- Convert the PHP namespaces to "TTN" (#8)
- Update the contact email in the CoC document (#6)
- Switch to the `TTN` PHP vendor namespace (#1, #5)
- Sort the Composer dependencies
- Upgrade PHPUnit to 7.5.14
- Change from GPL V3+ to GPL V2+
- Streamline `ext_emconf.php`

### Deprecated

### Removed
- Drop obsolete `dividers2tabs` from the TCA (#44)
- Drop obsolete parts from the README (#34)
- Drop unneeded Travis CI configuration settings
- Drop `ext_icon.svg`
- Stop building with the lowest Composer dependencies
- Drop support for TYPO3 < 9.5
- Drop support for PHP < 7.2
- Drop support for TYPO3 7.6 and require TYPO3 >= 8.7
- Drop the TYPO3 package repository from `composer.json`
- Drop the dependency of `roave/security-advisories`

### Fixed
- Avoid unwanted higher PHP versions (#50)
- Stop caching `vendor/` on Travis CI (#51)
- Use the PHP version from the matrix in the CI (#48)
- Re-add the static TypoScript registration (#41)
- Keep the global namespace clean in `ext_localconf.php` (#40)
- Update the badge URLs in the `README` (#29, #22)
- Fix code inspection warnings
- Use the new annotations for lazy loading
- Update and pin the dev dependencies
- Drop an obsolete "replace" entry from `composer.json`
- Explicitly require MySQL on Travis CI
- Add `.php_cs.cache` to the `.gitignore`

## 2.0.0
- Complete rewrite. Usable with TYPO3 7.6 and 8.7.
