<?php
namespace OliverKlee\Tea\Tests\Unit\Controller;

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

use OliverKlee\Tea\Controller\TestimonialController;
use OliverKlee\Tea\Domain\Repository\TestimonialRepository;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var bool
     */
    protected $backupGlobals = false;

    /**
     * @var TestimonialController
     */
    protected $subject = null;

    /**
     * @var ViewInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $view = null;

    /**
     * @var TestimonialRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $testimonialRepository = null;

    protected function setUp()
    {
        $this->subject = new TestimonialController();

        $this->view = $this->getMock(ViewInterface::class);
        $this->inject($this->subject, 'view', $this->view);

        $this->testimonialRepository = $this->getMock(TestimonialRepository::class, [], [], '', false);
        $this->inject($this->subject, 'testimonialRepository', $this->testimonialRepository);
    }

    /**
     * @test
     */
    public function indexActionCanBeCalled()
    {
        $this->subject->indexAction();
    }

    /**
     * @test
     */
    public function indexActionPassesAllTestimonialsAsTestimonialsToView()
    {
        $allTestimonials = new ObjectStorage();
        $this->testimonialRepository->expects(self::any())->method('findAll')
            ->will(self::returnValue($allTestimonials));

        $this->view->expects(self::once())->method('assign')->with('testimonials', $allTestimonials);

        $this->subject->indexAction();
    }
}
