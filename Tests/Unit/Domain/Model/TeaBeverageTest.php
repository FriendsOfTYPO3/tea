<?php
namespace OliverKlee\Tea\Tests;

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

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaBeverageTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \OliverKlee\Tea\Domain\Model\TeaBeverage
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \OliverKlee\Tea\Domain\Model\TeaBeverage();
	}

	/**
	 * @test
	 * @return void
	 */
	public function getSizeInitiallyReturnsZero() {
		self::assertSame(
			0.0,
			$this->subject->getSize()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setSizeSetsSize() {
		$this->subject->setSize(1234.56);

		self::assertSame(
			1234.56,
			$this->subject->getSize()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getTypeInitiallyReturnsNull() {
		self::assertNull(
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setTypeSetsType() {
		$type = new \OliverKlee\Tea\Domain\Model\TeaType();
		$this->subject->setType($type);

		self::assertSame(
			$type,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getAdditionsInitiallyReturnsEmptyStorage() {
		self::assertEquals(
			new \TYPO3\CMS\Extbase\Persistence\ObjectStorage(),
			$this->subject->getAdditions()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setAdditionsSetsAdditions() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->subject->setAdditions($items);

		self::assertSame(
			$items,
			$this->subject->getAdditions()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function addAdditionAddsAddition() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->subject->setAdditions($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Addition();
		$this->subject->addAddition($newItem);

		self::assertTrue(
			$this->subject->getAdditions()->contains($newItem)
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function removeAdditionRemovesAddition() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->subject->setAdditions($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Addition();
		$this->subject->addAddition($newItem);
		$this->subject->removeAddition($newItem);

		self::assertFalse(
			$this->subject->getAdditions()->contains($newItem)
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getTestimonialsInitiallyReturnsEmptyStorage() {
		self::assertEquals(
			new \TYPO3\CMS\Extbase\Persistence\ObjectStorage(),
			$this->subject->getTestimonials()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setTestimonialsSetsTestimonials() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->subject->setTestimonials($items);

		self::assertSame(
			$items,
			$this->subject->getTestimonials()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function addTestimonialAddsTestimonial() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->subject->setTestimonials($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Testimonial();
		$this->subject->addTestimonial($newItem);

		self::assertTrue(
			$this->subject->getTestimonials()->contains($newItem)
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function removeTestimonialRemovesTestimonial() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->subject->setTestimonials($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Testimonial();
		$this->subject->addTestimonial($newItem);
		$this->subject->removeTestimonial($newItem);

		self::assertFalse(
			$this->subject->getTestimonials()->contains($newItem)
		);
	}
}
