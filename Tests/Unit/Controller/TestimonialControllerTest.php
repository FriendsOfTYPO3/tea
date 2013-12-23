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

use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

use OliverKlee\Tea\Controller\TestimonialController;
use OliverKlee\Tea\Domain\Repository\TestimonialRepository;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialControllerTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var TestimonialController
	 */
	protected $subject = NULL;

	/**
	 * @var ViewInterface
	 */
	protected $view = NULL;

	/**
	 * @var TestimonialRepository
	 */
	protected $testimonialRepository = NULL;

	public function setUp() {
		$this->subject = new TestimonialController();

		$this->view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->subject->setView($this->view);

		$this->testimonialRepository = $this->getMock(
			'OliverKlee\\Tea\\Domain\\Repository\\TestimonialRepository', array(), array(), '', FALSE
		);
		$this->subject->injectTestimonialRepository($this->testimonialRepository);
	}

	public function tearDown() {
		unset($this->subject, $this->view, $this->testimonialRepository);
	}

	/**
	 * @test
	 */
	public function indexActionCanBeCalled() {
		$this->subject->indexAction();
	}

	/**
	 * @test
	 */
	public function indexActionPassesAllTestimonialsAsTestimonialsToView() {
		$allTestimonials = new ObjectStorage();
		$this->testimonialRepository->expects($this->any())->method('findAll')
			->will($this->returnValue($allTestimonials));

		$this->view->expects($this->once())->method('assign')->with('testimonials', $allTestimonials);

		$this->subject->indexAction();
	}
}