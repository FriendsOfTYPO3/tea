<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Tea example',
    'description' => 'Example extension for unit testing and best practices',
    'version' => '2.0.x-dev',
    'category' => 'example',
    'constraints' => [
        'depends' => [
            'php' => '7.0.0-7.2.99',
            'typo3' => '7.6.0-8.7.99',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'author' => 'Oliver Klee',
    'author_email' => 'typo3-coding@oliverklee.de',
    'author_company' => 'oliverklee.de',
    'autoload' => [
        'psr-4' => [
            'OliverKlee\\Tea\\' => 'Classes/',
        ],
    ],
    'autoload-dev' => [
        'psr-4' => [
            'OliverKlee\\Tea\\Tests\\' => 'Tests/',
        ],
    ],
];
