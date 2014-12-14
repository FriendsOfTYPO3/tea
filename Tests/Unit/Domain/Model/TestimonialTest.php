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
class TestimonialTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \OliverKlee\Tea\Domain\Model\Testimonial
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \OliverKlee\Tea\Domain\Model\Testimonial();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getDateOfPostingInitiallyReturnsNull() {
		$this->assertNull(
			$this->subject->getDateOfPosting()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setDateOfPostingSetsDateOfPosting() {
		$date = new \DateTime();
		$this->subject->setDateOfPosting($date);

		$this->assertSame(
			$date,
			$this->subject->getDateOfPosting()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getNumberOfConsumedCupsInitiallyReturnsZero() {
		$this->assertSame(
			0,
			$this->subject->getNumberOfConsumedCups()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setNumberOfConsumedCupsSetsNumberOfConsumedCups() {
		$this->subject->setNumberOfConsumedCups(123456);

		$this->assertSame(
			123456,
			$this->subject->getNumberOfConsumedCups()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function getTextInitiallyReturnsEmptyString() {
		$this->assertSame(
			'',
			$this->subject->getText()
		);
	}

	/**
	 * @test
	 * @return void
	 */
	public function setTextSetsText() {
		$this->subject->setText('foo bar');

		$this->assertSame(
			'foo bar',
			$this->subject->getText()
		);
	}
}
