<?php
$tca = [
    'ctrl' => [
        'title' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_product_tea',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'default_sortby' => 'title',
        'dividers2tabs' => true,
        'iconfile' => 'EXT:tea/Resources/Public/Icons/Record.svg',
        'searchFields' => 'title, description',
    ],
    'interface' => [
        'showRecordFieldList' => 'title, description, image',
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, image'],
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_product_tea.title',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:tea/Resources/Private/Language/locallang_db.xlf:tx_tea_domain_model_product_tea.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'rows' => 8,
                'cols' => 40,
                'max' => 2000,
                'eval' => 'trim',
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

if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) < 8006000) {
    $tca['columns']['description']['defaultExtras'] = 'richtext[]';
}

return $tca;
