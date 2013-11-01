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
	protected $fixture = NULL;

	public function setUp() {
		$this->fixture = new \OliverKlee\Tea\Domain\Model\TeaBeverage();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getSizeInitiallyReturnsZero() {
		$this->assertSame(
			0.0,
			$this->fixture->getSize()
		);
	}

	/**
	 * @test
	 */
	public function setSizeSetsSize() {
		$this->fixture->setSize(1234.56);

		$this->assertSame(
			1234.56,
			$this->fixture->getSize()
		);
	}

	/**
	 * @test
	 */
	public function getTypeInitiallyReturnsNull() {
		$this->assertNull(
			$this->fixture->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeSetsType() {
		$type = new \OliverKlee\Tea\Domain\Model\TeaType();
		$this->fixture->setType($type);

		$this->assertSame(
			$type,
			$this->fixture->getType()
		);
	}

	/**
	 * @test
	 */
	public function getAdditionsInitiallyReturnsEmptyStorage() {
		$this->assertEquals(
			new \TYPO3\CMS\Extbase\Persistence\ObjectStorage(),
			$this->fixture->getAdditions()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionsSetsAdditions() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->fixture->setAdditions($items);

		$this->assertSame(
			$items,
			$this->fixture->getAdditions()
		);
	}

	/**
	 * @test
	 */
	public function addAdditionAddsAddition() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->fixture->setAdditions($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Addition();
		$this->fixture->addAddition($newItem);

		$this->assertTrue(
			$this->fixture->getAdditions()->contains($newItem)
		);
	}

	/**
	 * @test
	 */
	public function removeAdditionRemovesAddition() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->fixture->setAdditions($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Addition();
		$this->fixture->addAddition($newItem);
		$this->fixture->removeAddition($newItem);

		$this->assertFalse(
			$this->fixture->getAdditions()->contains($newItem)
		);
	}

	/**
	 * @test
	 */
	public function getTestimonialsInitiallyReturnsEmptyStorage() {
		$this->assertEquals(
			new \TYPO3\CMS\Extbase\Persistence\ObjectStorage(),
			$this->fixture->getTestimonials()
		);
	}

	/**
	 * @test
	 */
	public function setTestimonialsSetsTestimonials() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->fixture->setTestimonials($items);

		$this->assertSame(
			$items,
			$this->fixture->getTestimonials()
		);
	}

	/**
	 * @test
	 */
	public function addTestimonialAddsTestimonial() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->fixture->setTestimonials($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Testimonial();
		$this->fixture->addTestimonial($newItem);

		$this->assertTrue(
			$this->fixture->getTestimonials()->contains($newItem)
		);
	}

	/**
	 * @test
	 */
	public function removeTestimonialRemovesTestimonial() {
		$items = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->fixture->setTestimonials($items);

		$newItem = new \OliverKlee\Tea\Domain\Model\Testimonial();
		$this->fixture->addTestimonial($newItem);
		$this->fixture->removeTestimonial($newItem);

		$this->assertFalse(
			$this->fixture->getTestimonials()->contains($newItem)
		);
	}
}
?>