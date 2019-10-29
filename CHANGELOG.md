# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added
- Run the functional tests in parallel (#58)
- Add PHP-CS-Fixer (#53)
- Add support for PHP 7.3 (#51)
- Add support for TYPO3 9.6 (#48)
- Add PHP_CodeSniffer to the Travis CI build (#44,#46)
- Auto-release to the TER (#34)
- Composer script for PHP linting

### Changed
- Upgrade PHPUnit to 7.5.14 (#52)
- Change from GPL V3+ to GPL V2+ (#40)
- Streamline ext_emconf.php (#37)

### Deprecated

### Removed
- Drop ext_icon.svg (#56)
- Stop building with the lowest Composer dependencies (#55)
- Drop support for TYPO3 < 9.5 (#50)
- Drop support for PHP < 7.2 (#49)
- Drop support for TYPO3 7.6 and require TYPO3 >= 8.7 (#47)
- Drop the TYPO3 package repository from composer.json (#43)
- Drop the dependency of roave/security-advisories (#41)

### Fixed
- Fix code inspection warnings (#55)
- Use the new annotations for lazy loading (#54)
- Update and pin the dev dependencies (#45)
- Drop an obsolete "replace" entry from composer.json (#42)
- Explicitly require MySQL on Travis CI (#38)
- Add .php_cs.cache to the .gitignore (#33)

## 2.0.0
Complete rewrite. Usable with TYPO3 7.6 and 8.7.
