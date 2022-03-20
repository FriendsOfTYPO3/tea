.. include:: /Includes.rst.txt

.. _linters:

=======================
Linters
=======================

This chapter describes how to use linters in CI.

.. contents:: Table of Contents:
   :backlinks: top
   :class: compact-list
   :depth: 2
   :local:

.. _linters_github:

Running lints in GitHub
=======================

For GitHub, we prepared two ways of running lints. First one relies on executing
composer scripts, and second is using exported, prepared GitHub Actions in your
workflow.

Composer scripts
----------------

You can run your lints using composer scripts. An example workflow is defined in
:file:`ci-composer-scripts.yml`.

Ready to use GitHub Actions
---------------------------

You can use prepared GitHub Actions. All of ready to use GitHub Actions are in
`TYPO3 Continuous Integration organisation <https://github.com/TYPO3-Continuous-Integration>`_
An example workflow is defined in :file:`ci.yml`.

.. _linters_gitlab:

Running lints in GitLab
=======================

In GitLab CI you should use composer scripts.

Composer scripts
----------------

You can run your lints using composer scripts. An example workflow is defined in
:file:`.gitlab-ci.yml`.
