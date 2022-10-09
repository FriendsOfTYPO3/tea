<?php

defined('TYPO3') || die();

$typo3Version = new \TYPO3\CMS\Core\Information\Typo3Version();

if ($typo3Version->getMajorVersion() < 12) {
    $replaceTCA = [
        'ctrl' => [
            'cruser_id' => 'cruser_id',
        ],
        'columns' => [
            'title' => [
                'config' => [
                    'eval' => 'trim,required',
                ],
            ],
            'image' => [
                'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_product_tea.image',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    [
                        'maxitems' => 1,
                        'appearance' => [
                            'collapseAll' => true,
                            'useSortable' => false,
                            'enabledControls' => [
                                'hide' => false,
                            ],
                        ],
                    ]
                ),
            ],
        ],
    ];

    $GLOBALS['TCA']['tx_tea_domain_model_product_tea'] = array_replace_recursive(
        $GLOBALS['TCA']['tx_tea_domain_model_product_tea'],
        $replaceTCA
    );
    unset($GLOBALS['TCA']['tx_tea_domain_model_product_tea']['columns']['title']['required']);
}
