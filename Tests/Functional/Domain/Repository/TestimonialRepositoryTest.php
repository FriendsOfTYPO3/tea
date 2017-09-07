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

use OliverKlee\Tea\Domain\Model\Testimonial;
use OliverKlee\Tea\Domain\Repository\TestimonialRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialRepositoryTest extends \Nimut\TestingFramework\TestCase\FunctionalTestCase
{
    /**
     * @var string[]
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/tea'];

    /**
     * @var TestimonialRepository
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();

        /** @var ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        // We are using the object manager instead of new so that the dependencies get injected.
        // In a unit test, we would inject the mocked dependencies instead.
        $this->subject = $objectManager->get(TestimonialRepository::class);
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
        $this->importDataSet(__DIR__ . '/Fixtures/Testimonials.xml');
        $uid = 1;

        $container = $this->subject->findAll();
        /** @var Testimonial $first */
        $first = $container->getFirst();

        self::assertCount(1, $container);
        self::assertSame($uid, $first->getUid());
    }

    /**
     * @test
     */
    public function findByUidForExistingRecordReturnsModelWithData()
    {
        $this->importDataSet(__DIR__ . '/Fixtures/Testimonials.xml');
        $uid = 1;

        /** @var Testimonial $model */
        $model = $this->subject->findByUid($uid);

        self::assertNotNull($model);
        $text = 'A very good Early Grey!';
        self::assertSame($text, $model->getText());
    }
}
