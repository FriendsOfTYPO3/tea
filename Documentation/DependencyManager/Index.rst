.. include:: /Includes.rst.txt

==================
Dependency Manager
==================

To keep things simple, most development tools, for example PHP_CodeSniffer, are
installed by Composer as development requirements and in some cases where an
installation via Composer is not possible, we are using
`PHIVE <https://phar.io/>`__.

PHIVE packages each tool with all its dependencies as
a separate PHAR. This helps avoid dependency hell (which means that you cannot
install or upgrade some tool as the tool's dependencies conflict with the
dependencies on another library). It also allows running versions of tools
that require a PHP version that is higher than the lowest allowed PHP version
for this project. Currently, we use PHIVE for
`PHP Copy/Paste Detector <https://github.com/sebastianbergmann/phpcpd>`__,
that requires PHP >= 7.3, which conflicts with this project's PHP version
support (we also support PHP 7.2).
