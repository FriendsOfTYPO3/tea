<?php
// This makes the plugin available for front-end rendering.
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    // extension name, exactly matching the PHP namespaces (vendor and product)
    'OliverKlee.Tea',
    // arbitrary, but unique plugin name (not visible in the BE)
    'Tea',
    // all actions
    [
        'Tea' => 'index',
    ],
    // non-cacheable actions
    [
        'Tea' => '',
    ]
);
