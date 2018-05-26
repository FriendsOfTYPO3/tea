<?php
defined('TYPO3_MODE') or die();

// This makes the plugin selectable in the BE.
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    // extension name, exactly matching the PHP namespaces (vendor and product)
    'OliverKlee.Tea',
    // arbitrary, but unique plugin name (not visible in the BE)
    'Tea',
    // plugin title, as visible in the drop-down in the BE
    'LLL:EXT:tea/Resources/Private/Language/locallang.xlf:plugin.tea',
    // the icon visible in the drop-down in the BE
    'EXT:tea/Resources/Public/Icons/Extension.svg'
);

// This removes the default controls from the plugin.
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['tea_tea'] = 'recursive,select_key,pages';
// These two commands add the flexform configuration for the plugin.
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tea_tea'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'tea_tea',
    'FILE:EXT:tea/Configuration/FlexForms/Plugin.xml'
);
