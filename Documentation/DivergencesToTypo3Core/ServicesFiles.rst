.. include:: /Includes.rst.txt

.. _servicesFiles:

Services Files
==============

We choose to use :file:`Services.php` instead of :file:`Services.yaml`.
It still is completely fine to use YAML files over PHP files or even mix both.
Some things are way shorter to write with the YAML syntax.

We prefer the PHP file over YAML for the following reasons:

- Static Code Analysis

  Static code analysis tools, like PHPStan, can analyse the PHP source code base.
  They typically don't support other files like YAML.
  Those tools report issues for not found classes, e.g. due to typos.

- Auto completion

  Modern tooling like IDEs and Language Servers provide auto completion for PHP source files out of the box.
  That way programmers can discover APIs and write more robust code faster.

- Automatic code migration

  PHP Code can be auto migrated via tools like rector.
  E.g. renaming a class can be applied to PHP code, but no current tool for yaml exists.
