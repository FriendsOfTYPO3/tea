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

use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use OliverKlee\Tea\Controller\TestimonialController;
use OliverKlee\Tea\Domain\Repository\TestimonialRepository;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var TestimonialController
	 */
	protected $subject = NULL;

	/**
	 * @var ViewInterface|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $view = NULL;

	/**
	 * @var TestimonialRepository|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $testimonialRepository = NULL;

	protected function setUp() {
		$this->subject = new TestimonialController();

		$this->view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->subject->setView($this->view);

		$this->testimonialRepository = $this->getMock(
			'OliverKlee\\Tea\\Domain\\Repository\\TestimonialRepository', array(), array(), '', FALSE
		);
		$this->subject->injectTestimonialRepository($this->testimonialRepository);
	}

	protected function tearDown() {
		unset($this->subject, $this->view, $this->testimonialRepository);
	}

	/**
	 * @test
	 * @return void
	 */
	public function indexActionCanBeCalled() {
		$this->subject->indexAction();
	}

	/**
	 * @test
	 * @return void
	 */
	public function indexActionPassesAllTestimonialsAsTestimonialsToView() {
		$allTestimonials = new ObjectStorage();
		$this->testimonialRepository->expects($this->any())->method('findAll')
			->will($this->returnValue($allTestimonials));

		$this->view->expects($this->once())->method('assign')->with('testimonials', $allTestimonials);

		$this->subject->indexAction();
	}
}
