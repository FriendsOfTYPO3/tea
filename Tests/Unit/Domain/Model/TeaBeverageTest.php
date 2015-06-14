<?php
namespace OliverKlee\Tea\Tests\Unit\Domain\Model;

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

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
	 */
	public function getSizeInitiallyReturnsZero() {
		self::assertSame(
			0.0,
			$this->subject->getSize()
		);
	}

	/**
	 * @test
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
	 */
	public function getTypeInitiallyReturnsNull() {
		self::assertNull(
			$this->subject->getType()
		);
	}

	/**
	 * @test
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
	 */
	public function getAdditionsInitiallyReturnsEmptyStorage() {
		self::assertEquals(
			new ObjectStorage(),
			$this->subject->getAdditions()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionsSetsAdditions() {
		$items = new ObjectStorage();
		$this->subject->setAdditions($items);

		self::assertSame(
			$items,
			$this->subject->getAdditions()
		);
	}

	/**
	 * @test
	 */
	public function addAdditionAddsAddition() {
		$items = new ObjectStorage();
		$this->subject->setAdditions($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Addition();
		$this->subject->addAddition($newItem);

		self::assertTrue(
			$this->subject->getAdditions()->contains($newItem)
		);
	}

	/**
	 * @test
	 */
	public function removeAdditionRemovesAddition() {
		$items = new ObjectStorage();
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
	 */
	public function getTestimonialsInitiallyReturnsEmptyStorage() {
		self::assertEquals(
			new ObjectStorage(),
			$this->subject->getTestimonials()
		);
	}

	/**
	 * @test
	 */
	public function setTestimonialsSetsTestimonials() {
		$items = new ObjectStorage();
		$this->subject->setTestimonials($items);

		self::assertSame(
			$items,
			$this->subject->getTestimonials()
		);
	}

	/**
	 * @test
	 */
	public function addTestimonialAddsTestimonial() {
		$items = new ObjectStorage();
		$this->subject->setTestimonials($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Testimonial();
		$this->subject->addTestimonial($newItem);

		self::assertTrue(
			$this->subject->getTestimonials()->contains($newItem)
		);
	}

	/**
	 * @test
	 */
	public function removeTestimonialRemovesTestimonial() {
		$items = new ObjectStorage();
		$this->subject->setTestimonials($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Testimonial();
		$this->subject->addTestimonial($newItem);
		$this->subject->removeTestimonial($newItem);

		self::assertFalse(
			$this->subject->getTestimonials()->contains($newItem)
		);
	}
}
