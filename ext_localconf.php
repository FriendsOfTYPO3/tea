<?php

defined('TYPO3_MODE') or die('Access denied.');

(static function () {
    // This makes the plugin available for front-end rendering.
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        // extension name, exactly matching the PHP namespaces (vendor and product)
        'TTN.Tea',
        // arbitrary, but unique plugin name (not visible in the BE)
        'Tea',
        // all actions
        [
            'Tea' => 'index, show',
        ],
        // non-cacheable actions
        [
            'Tea' => '',
        ]
    );
})();
