.. include:: /Includes.rst.txt

======================
Running checks & tests
======================

Most code checks and tests can be run via Composer commands.

.. contents:: Table of Contents:
   :backlinks: top
   :class: compact-list
   :depth: 2
   :local:

Composer scripts
================

For most development-related tasks, this extension provides Composer scripts.
If you are working locally, you can run them using :bash:`composer <scriptname>`.
If you are working with ddev, you can run them with :bash:`ddev composer <scriptname>`.
You do not need to start or build the containers for this as this happens
automatically.

The code-quality-related Composer scripts make use of the PHIVE-installed tools.
This means that for non-ddev-based development, you need to run :bash:`phive install`
before you can use the Composer scripts.

Available Composer scripts
--------------------------

You can run :bash:`composer` (or :bash:`ddev composer`) to display a list of all available
Composer commands and scripts. For all custom Composer scripts there are descriptions
in the `script-description` section of the `composer.json`.

Running the unit and functional tests on CLI
============================================

To run the unit tests with ddev, use this command:

.. code-block:: bash

   ddev composer ci:tests:unit

To run the functional tests with ddev, use this command:

.. code-block:: bash

   ddev composer ci:tests:functional

If you are working locally without ddev, omit the :bash:`ddev` part.

Running the unit and functional tests in PHPStorm
=================================================

General setup
-------------

-  Open :guilabel:`File > Settings > PHP > Test Frameworks`.
-  (*) Use Composer autoloader.
-  Path to script: select `.Build/vendor/autoload.php` in your project folder.

In the Run configurations, edit the PHPUnit configuration and use these
settings so this configuration can serve as a template:

-  Directory: use the `Tests/Unit` directory in your project.
-  (*) Use alternative configuration file.
-  Use `.Build/vendor/typo3/testing-framework/Resources/Core/Build/UnitTests.xml`
   in your project folder.
-  Add the following environment variables:

   -  typo3DatabaseUsername
   -  typo3DatabasePassword
   -  typo3DatabaseHost
   -  typo3DatabaseName

Unit tests configuration
------------------------

In the Run configurations, copy the PHPUnit configuration and use these
settings:

-  Directory: use the `Tests/Unit` directory in your project

Functional tests configuration
------------------------------

In the Run configurations, copy the PHPUnit configuration and use these
settings:

-  Directory: use the `Tests/Functional` directory in your project.
-  (*) Use alternative configuration file.
-  Use
   `.Build/vendor/typo3/testing-framework/Resources/Core/Build/FunctionalTests.xml`.

Running the acceptance tests on CLI
===================================

1. Make sure you have Chrome installed on your machine.
2. `Download the latest version of ChromeDriver <https://chromedriver.chromium.org/downloads>`.
3. Unzip it.
4. Execute `chromedriver --url-base=wd/hub`.
5. In another terminal, run `.Build/vendor/bin/codecept run`.

Running the acceptance tests in PhpStorm
========================================

1. Make sure the "Codeception Framework" plugin is activated.
2. Right-click on `Tests/Acceptance/StarterCest.php`.
3. Run 'Acceptance (Codeception)'.
