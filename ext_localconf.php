<?php
defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'OliverKlee.' . $_EXTKEY,
	'Tea',
	// all actions
	array(
		'Testimonial' => 'index',
	),
	// non-cacheable actions
	array(
		'Testimonial' => 'index',
	)
);
