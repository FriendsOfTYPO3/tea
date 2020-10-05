<?php
defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tea', 'Configuration/TypoScript', 'Tea');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tea',  'Configuration/TypoScript/Frontend/', 'Tea frontend (optional)'
);
