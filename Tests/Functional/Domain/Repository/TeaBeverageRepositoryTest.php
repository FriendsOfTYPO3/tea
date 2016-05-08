<?php
namespace OliverKlee\Tea\Tests\Functional\Domain\Repository;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use OliverKlee\Tea\Domain\Model\TeaBeverage;
use OliverKlee\Tea\Domain\Repository\TeaBeverageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaBeverageRepositoryTest extends \Tx_Phpunit_Database_TestCase
{
    /**
     * @var TeaBeverageRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $subject = null;

    protected function setUp()
    {
        if (!$this->createDatabase()) {
            self::markTestSkipped('Test database could not be created.');
        }
        $this->importExtensions(['tea']);

        /** @var ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        // We are using the object manager instead of new so that the dependencies get injected.
        // In a unit test, we would inject the mocked dependencies instead.
        $this->subject = $objectManager->get(TeaBeverageRepository::class);
    }

    protected function tearDown()
    {
        $this->dropDatabase();
        $this->switchToTypo3Database();
    }

    /**
     * @test
     */
    public function findAllForNoRecordsReturnsEmptyContainer()
    {
        $container = $this->subject->findAll();

        self::assertCount(0, $container);
    }

    /**
     * @test
     */
    public function findAllWithOneRecordFindsThisRecord()
    {
        $this->importDataSet(__DIR__ . '/Fixtures/TeaBeverages.xml');

        $container = $this->subject->findAll();
        /** @var TeaBeverage $first */
        $first = $container->getFirst();

        self::assertCount(1, $container);
        self::assertSame(1, $first->getUid());
    }

    /**
     * @test
     */
    public function findByUidForExistingRecordReturnsModelWithData()
    {
        $this->importDataSet(__DIR__ . '/Fixtures/TeaBeverages.xml');

        /** @var TeaBeverage $model */
        $model = $this->subject->findByUid(1);

        self::assertNotNull($model);
        self::assertEquals(
            3.141,
            $model->getSize(),
            '',
            0.001
        );
    }
}
