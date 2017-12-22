<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Tea example',
    'description' => 'TYPO3 example extension for unit testing and best practices.',
    'category' => 'example',
    'author' => 'Oliver Klee',
    'author_email' => 'typo3-coding@oliverklee.de',
    'author_company' => 'oliverklee.de',
    'state' => 'stable',
    'version' => '2.0.x-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
            'phpunit' => '4.0.0-5.9.99',
        ],
    ],
];
