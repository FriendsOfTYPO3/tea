.. include:: /Includes.rst.txt

.. _testing-framework:

=================
Testing framework
=================

Extensions usually need to support two LTS versions of TYPO3 in parallel,
assuming that they should support all currently supported TYPO3 LTS versions.
To achieve this, there are two different approaches, which also affect the
choice of a testing framework for unit and functional tests.

.. contents:: Table of Contents:
   :backlinks: top
   :class: compact-list
   :depth: 2
   :local:

.. _testing-framework-approach-many-versions:

Approach 1: One branch for many TYPO3 LTS versions
==================================================

With this approach, there is one main branch that gets new features. It needs to
support two TYPO3 LTS versions in parallel.

The downside is that this slightly increases code complexity as
version-dependent code switches might be necessary. The upside is that there
is only one branch to maintain, which makes adding new features (and all other
code changes) a lot less of a hassle.

The `Nimut testing framework <https://github.com/Nimut/testing-framework>`__
can support multiple TYPO3 versions at a time, and
it provides version-independent abstractions for testing, making it the perfect
companion for this approach.

This is the approach that we have chosen for this extension as we do not want
to maintain two branches in parallel.

.. _testing-framework-approach-one-version:

Approach 2: One branch per TYPO3 LTS version
============================================

With this approach, there are two main branches that get new features in
parallel. Each branch supports exactly one TYPO3 LTS version.

The upside is that this slightly decreases code complexity as
version-dependent code switches are not necessary. The downside is that there
are two branches to maintain, which makes adding new features (and all other
code changes) more of a hassle.

For this approach, the
`TYPO3 testing framework <https://github.com/TYPO3/testing-framework>`__
- which supports only one TYPO3 LTS version at a time - will work just fine.
