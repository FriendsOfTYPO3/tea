<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\ValueObject\PhpVersion;
use Ssch\TYPO3Rector\CodeQuality\General\ConvertImplicitVariablesToExplicitGlobalsRector;
use Ssch\TYPO3Rector\CodeQuality\General\ExtEmConfRector;
use Ssch\TYPO3Rector\Configuration\Typo3Option;
use Ssch\TYPO3Rector\Set\Typo3LevelSetList;
use Ssch\TYPO3Rector\Set\Typo3SetList;
use Ssch\Typo3RectorTestingFramework\Set\TYPO3TestingFrameworkSetList;

return RectorConfig::configure()
    ->withConfiguredRule(ExtEmConfRector::class, [
        ExtEmConfRector::ADDITIONAL_VALUES_TO_BE_REMOVED => [],
    ])
    ->withPaths([
        __DIR__ . '/Classes/',
        __DIR__ . '/Configuration/',
        __DIR__ . '/Tests/',
    ])
    ->withPhpSets(
        true
    )
    ->withSets([
        // Typo3LevelSetList::UP_TO_TYPO3_10,
        // Typo3LevelSetList::UP_TO_TYPO3_11,
        // Typo3LevelSetList::UP_TO_TYPO3_12,

        Typo3SetList::TYPO3_11,

        // Typo3SetList::CODE_QUALITY,
        // Typo3SetList::GENERAL,

        // TYPO3TestingFrameworkSetList::TYPO3_TESTING_FRAMEWORK_7,

        // LevelSetList::UP_TO_PHP_53,
        // LevelSetList::UP_TO_PHP_54,
        // LevelSetList::UP_TO_PHP_55,
        // LevelSetList::UP_TO_PHP_56,
        // LevelSetList::UP_TO_PHP_70,
        // LevelSetList::UP_TO_PHP_71,
        // LevelSetList::UP_TO_PHP_72,
        // LevelSetList::UP_TO_PHP_73,
        // LevelSetList::UP_TO_PHP_74,
        // LevelSetList::UP_TO_PHP_80,
        // LevelSetList::UP_TO_PHP_81,
        // LevelSetList::UP_TO_PHP_82,
        // LevelSetList::UP_TO_PHP_83,

        // https://github.com/sabbelasichon/typo3-rector/blob/main/src/Set/Typo3LevelSetList.php
        // https://github.com/sabbelasichon/typo3-rector/blob/main/src/Set/Typo3SetList.php

        // SetList::CODE_QUALITY,
        // SetList::CODING_STYLE,
        // SetList::DEAD_CODE,
        // SetList::TYPE_DECLARATION,
        // SetList::EARLY_RETURN,

        // PHPUnitSetList::PHPUNIT80_DMS,
        // PHPUnitSetList::PHPUNIT_40,
        // PHPUnitSetList::PHPUNIT_50,
        // PHPUnitSetList::PHPUNIT_60,
        // PHPUnitSetList::PHPUNIT_70,
        // PHPUnitSetList::PHPUNIT_80,
        // PHPUnitSetList::PHPUNIT_90,
        // PHPUnitSetList::PHPUNIT_100,
        // PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    ])
    // To have a better analysis from PHPStan, we teach it here some more things
    ->withPHPStanConfigs([
        Typo3Option::PHPSTAN_FOR_RECTOR_PATH,
    ])
    ->withPhpVersion(PhpVersion::PHP_74)
    ->withRules([
        ConvertImplicitVariablesToExplicitGlobalsRector::class,
    ])
    // If you use importNames(), you should consider excluding some TYPO3 files.
    ->withSkip([
        // @see https://github.com/sabbelasichon/typo3-rector/issues/2536
        __DIR__ . '/.github/*',
        __DIR__ . '/.Build/*',
    ]);
