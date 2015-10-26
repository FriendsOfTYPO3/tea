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
class TestimonialRepositoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var TestimonialRepository
	 */
	protected $subject = null;

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework = null;

	protected function setUp() {
		$this->testingFramework = new \Tx_Phpunit_Framework('tx_tea');

		/** @var ObjectManager $objectManager */
		$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
		// We are using the object manager instead of new so that the dependencies get injected.
		// In a unit test, we would inject the mocked dependencies instead.
		$this->subject = $objectManager->get(TestimonialRepository::class);
	}

	protected function tearDown() {
		$this->testingFramework->cleanUp();
	}

	/**
	 * @test
	 */
	public function findAllForNoRecordsReturnsEmptyContainer() {
		$container = $this->subject->findAll();

		self::assertSame(
			0,
			$container->count()
		);
	}

	/**
	 * @test
	 */
	public function findAllWithOneRecordFindsThisRecord() {
		$uid = $this->testingFramework->createRecord('tx_tea_domain_model_testimonial');

		$container = $this->subject->findAll();
		/** @var Testimonial $first */
		$first = $container->getFirst();

		self::assertSame(
			1,
			$container->count()
		);
		self::assertSame(
			$uid,
			$first->getUid()
		);
	}

	/**
	 * @test
	 */
	public function findByUidForExistingRecordReturnsModelWithData() {
		$text = 'A very good Early Grey!';
		$uid = $this->testingFramework->createRecord(
			'tx_tea_domain_model_testimonial', array('text' => $text)
		);

		/** @var Testimonial $model */
		$model = $this->subject->findByUid($uid);

		self::assertNotNull($model);
		self::assertSame(
			$text,
			$model->getText()
		);
	}
}
