<?php
defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'OliverKlee.' . $_EXTKEY,
    'Tea',
    'Tea'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Tea example');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tea_domain_model_teabeverage', 'EXT:tea/Resources/Private/Language/locallang_csh_tx_tea_domain_model_teabeverage.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tea_domain_model_teabeverage');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tea_domain_model_teatype', 'EXT:tea/Resources/Private/Language/locallang_csh_tx_tea_domain_model_teatype.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tea_domain_model_teatype');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tea_domain_model_addition', 'EXT:tea/Resources/Private/Language/locallang_csh_tx_tea_domain_model_addition.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tea_domain_model_addition');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tea_domain_model_testimonial', 'EXT:tea/Resources/Private/Language/locallang_csh_tx_tea_domain_model_testimonial.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tea_domain_model_testimonial');
