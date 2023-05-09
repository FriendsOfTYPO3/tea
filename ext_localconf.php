<?php

declare(strict_types=1);

use TTN\Tea\Controller\TeaController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

// This makes the plugin available for front-end rendering.
ExtensionUtility::configurePlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Tea',
    // arbitrary, but unique plugin name (not visible in the BE)
    'TeaIndex',
    // all actions
    [
        TeaController::class => 'index',
    ],
    // non-cacheable actions
    [
        TeaController::class => '',
    ]
);
ExtensionUtility::configurePlugin(
    'Tea',
    'TeaShow',
    [
        TeaController::class => 'show',
    ],
    [
        TeaController::class => '',
    ]
);
