.. include:: ../../Includes.txt

.. _linters_github:

=======================
Running lints in GitHub
=======================

For GitHub, we prepared two ways of running lints. First one relies on executing
composer scripts, and second is using exported, prepared GitHub Actions in your
workflow.

Composer scripts
================
You can run your lints using composer scripts. An example workflow is defined in
`ci-composer-scripts.yml`.

Ready to use GitHub Actions
===========================
You can use prepared GitHub Actions. All of ready to use GitHub Actions are in
`TYPO3 Continuous Integration organisation <https://github.com/TYPO3-Continuous-Integration>`_
Example workflow is defined in `ci.yml`.
