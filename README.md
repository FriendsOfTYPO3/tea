# Tea example

[![Build Status](https://travis-ci.org/oliverklee/tea.svg?branch=master)](https://travis-ci.org/oliverklee/tea)
[![Latest Stable Version](https://poser.pugx.org/oliverklee/tea/v/stable.svg)](https://packagist.org/packages/oliverklee/tea)
[![Total Downloads](https://poser.pugx.org/oliverklee/tea/downloads.svg)](https://packagist.org/packages/oliverklee/tea)
[![Latest Unstable Version](https://poser.pugx.org/oliverklee/tea/v/unstable.svg)](https://packagist.org/packages/oliverklee/tea)
[![License](https://poser.pugx.org/oliverklee/tea/license.svg)](https://packagist.org/packages/oliverklee/tea)

This TYPO3 extension is an example for writing unit and functional tests for
extbase/fluid-based extensions for TYPO3 CMS using PHPUnit.

It also is an example for
[best practices for extbase/fluid](https://github.com/oliverklee/workshop-handouts/tree/master/extbase-best-practices).

For information on the different ways to execute the tests, please have a look
at the [handout to my workshops on test-driven development (TDD)](https://github.com/oliverklee/tdd-reader).


## Running the tests in PhpStorm

### General PHPUnit setup

```bash
composer require typo3/cms ^8.7
composer install
git checkout HEAD -- composer.json
```

File > Settings > Languages & Frameworks > PHP > Test Frameworks

- (*) Use Composer autoloader
- Path to script: select `vendor/autoload.php` in your project folder

In the Run configurations, edit the PHPUnit configuration and use these
settings so this configuration can serve as a template:

- Directory: use the `Tests/Unit` directory in your project
- [x] Use alternative configuration file
- use `.Build/vendor/nimut/testing-framework/res/Configuration/UnitTests.xml`
  in your project folder
- Add the following environment variables:
  - typo3DatabaseUsername
  - typo3DatabasePassword
  - typo3DatabaseHost
  - typo3DatabaseName

### Unit tests configuration

In the Run configurations, copy the PHPUnit configuration and use these settings:

- Directory: use the `Tests/Unit` directory in your project

### Functional tests configuration

In the Run configurations, copy the PHPUnit configuration and use these settings:

- Directory: use the `Tests/Functional` directory in your project
- [x] Use alternative configuration file
- use `.Build/vendor/nimut/testing-framework/res/Configuration/FunctionalTests.xml`

### Example PHPUnit configuration file with a test suite

The file [`Configuration/PHPUnit/ModelTests.xml`](Configuration/PHPUnit/ModelTests.xml)
contains an example of a PHPUnit configuration file that has a test suite
(based on the unit tests configuration file from the testing framework).

## Creating new extensions with automated tests

For creating new extensions, I recommend taking
[Helmut Hummel's extension skeleton](https://github.com/helhum/ext_scaffold)
as a starting point.


## About me (Oliver Klee)

I am the maintainer of the
[PHPUnit TYPO3 extension](http://typo3.org/extensions/repository/view/phpunit),
which is available in the TYPO3 extension repository (TER).

You can book me for
[workshops](https://www.oliverklee.de/workshops/workshops.html)
at your company.

I also frequently give workshops at the TYPO3 Developer Days.


## More Documentation

* [Handout to my workshops on test-driven development (TDD)](https://github.com/oliverklee/tdd-reader)
* [Handout for best practices with extbase and fluid](https://github.com/oliverklee/workshop-handouts/blob/master/extbase-best-practices/extbase-best-practices.pdf)


## Other example projects

* [Selenium demo](https://github.com/oliverklee/selenium-demo)
  for using Selenium with PHPUnit
* [Anagram finder](https://github.com/oliverklee/anagram-finder)
  is the finished result of a code kata for TDD
* [Coffee example](https://github.com/oliverklee/coffee)
  is my starting point for demonstrating TDD with TYPO3 CMS
* [TDD Seed](https://github.com/oliverklee/tdd-seed)
  for starting PHPUnit projects with Composer (without TYPO3 CMS)
