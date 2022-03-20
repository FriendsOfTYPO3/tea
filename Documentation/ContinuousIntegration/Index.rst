.. include:: /Includes.rst.txt

======================
Continuous integration
======================

As an example, this extension provides several ways to perform the code quality
checks and tests in a CI pipeline. You can copy the
appropriate configuration depending on which Git hosting service and CI
platform you want to use.

.. contents:: Table of Contents:
   :backlinks: top
   :class: compact-list
   :depth: 2
   :local:

GitHub Actions
==============

This extension has two code-checking workflows for
`GitHub Actions <https://github.com/TYPO3-Documentation/tea/actions>`__:

- `one that uses the local tools <https://github.com/TYPO3-Documentation/tea/blob/main/.github/workflows/ci.yml>`__:
  This is the workflow you most probably would want to use:
  This workflow uses the development tools installed via Composer and PHIVE and
  calls them using the provided Composer scripts. Use this workflow if you want
  to run the code quality checks locally as well as in GitHub Actions.

- `one that completely relies on predefined actions <https://github.com/TYPO3-Documentation/tea/blob/main/.github/workflows/predefined.yml>`__:
  This workflow does not need the development tools to be installed locally.
  Use this workflow if you only want to run the code quality checks in GitHub
  Actions, but not locally.

GitLab CI
=========

This extension also provides
`configuration <https://github.com/TYPO3-Documentation/tea/blob/main/.gitlab/pipeline/.gitlab-ci.yml>`__
for `GitLab CI <https://gitlab.typo3.org/qa/example-extension/-/pipelines>`__.
