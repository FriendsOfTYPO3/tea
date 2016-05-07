<?php
defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'OliverKlee.' . $_EXTKEY,
    'Tea',
    // all actions
    [
        'Testimonial' => 'index',
    ],
    // non-cacheable actions
    [
        'Testimonial' => 'index',
    ]
);
