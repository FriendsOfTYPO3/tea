<?php
namespace OliverKlee\Tea\Tests;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Oliver Klee <typo3-coding@oliverklee.de>, oliverklee.de
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaBeverageTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \OliverKlee\Tea\Domain\Model\TeaBeverage
	 */
	protected $subject = NULL;

	public function setUp() {
		$this->subject = new \OliverKlee\Tea\Domain\Model\TeaBeverage();
	}

	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getSizeInitiallyReturnsZero() {
		$this->assertSame(
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

		$this->assertSame(
			1234.56,
			$this->subject->getSize()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getTypeInitiallyReturnsNull() {
		$this->assertNull(
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

		$this->assertSame(
			$type,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getAdditionsInitiallyReturnsEmptyStorage() {
		$this->assertEquals(
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

		$this->assertSame(
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

		$this->assertTrue(
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

		$this->assertFalse(
			$this->subject->getAdditions()->contains($newItem)
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getTestimonialsInitiallyReturnsEmptyStorage() {
		$this->assertEquals(
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

		$this->assertSame(
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

		$this->assertTrue(
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

		$this->assertFalse(
			$this->subject->getTestimonials()->contains($newItem)
		);
	}
}
