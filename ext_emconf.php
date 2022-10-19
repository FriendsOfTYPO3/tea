<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Tea example',
    'description' => 'Example extension for unit testing and best practices',
    'version' => '3.0.0',
    'category' => 'example',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-8.1.99',
            'typo3' => '11.5.4-12.4.99',
            'extbase' => '11.5.4-12.4.99',
            'fluid' => '11.5.4-12.4.99',
            'frontend' => '11.5.4-12.4.99',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'author' => 'Oliver Klee',
    'author_email' => 'typo3-coding@oliverklee.de',
    'author_company' => 'TYPO3 Trainer Network',
    'autoload' => [
        'psr-4' => [
            'TTN\\Tea\\' => 'Classes/',
        ],
    ],
    'autoload-dev' => [
        'psr-4' => [
            'TTN\\Tea\\Tests\\' => 'Tests/',
        ],
    ],
];
