<?php

defined('TYPO3') or die('Access denied.');

(static function (): void {
    // This makes the plugin available for front-end rendering.
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        // extension name, matching the PHP namespaces (but without the vendor)
        'Tea',
        // arbitrary, but unique plugin name (not visible in the BE)
        'TeaIndex',
        // all actions
        [
            \TTN\Tea\Controller\TeaController::class => 'index',
        ],
        // non-cacheable actions
        [
            \TTN\Tea\Controller\TeaController::class => '',
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Tea',
        'TeaShow',
        [
            \TTN\Tea\Controller\TeaController::class => 'show',
        ],
        [
            \TTN\Tea\Controller\TeaController::class => '',
        ]
    );
})();
