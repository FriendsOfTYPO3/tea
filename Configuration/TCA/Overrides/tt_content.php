<?php

defined('TYPO3') || die();

// This makes the plugin selectable in the BE.
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Tea',
    // arbitrary, but unique plugin name (not visible in the BE)
    'TeaIndex',
    // plugin title, as visible in the drop-down in the BE
    'LLL:EXT:tea/Resources/Private/Language/locallang.xlf:plugin.tea_index',
    // the icon visible in the drop-down in the BE
    'EXT:tea/Resources/Public/Icons/Extension.svg'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Tea',
    'TeaShow',
    'LLL:EXT:tea/Resources/Private/Language/locallang.xlf:plugin.tea_show',
    'EXT:tea/Resources/Public/Icons/Extension.svg'
);


// This removes the default controls from the plugin.
$controlsToRemove = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'] = [
    'tea_teaindex' => $controlsToRemove,
    'tea_teashow' => $controlsToRemove
];
