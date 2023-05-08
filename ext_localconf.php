<?php

declare(strict_types=1);

use TTN\Tea\Controller\TeaController;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
$versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
// Only include page.tsconfig if TYPO3 version is below 12 so that it is not imported twice.
if ($versionInformation->getMajorVersion() < 12) {
    ExtensionManagementUtility::addPageTSConfig(
        '@import "EXT:tea/Configuration/page.tsconfig"'
    );
}
