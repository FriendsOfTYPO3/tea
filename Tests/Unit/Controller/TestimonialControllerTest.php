<?php
declare(strict_types=1);

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
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\ProphecySubjectInterface;
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
     * @var ViewInterface|ObjectProphecy
     */
    protected $viewProphecy = null;

    /**
     * @var ViewInterface|ProphecySubjectInterface
     */
    protected $view = null;

    /**
     * @var TestimonialRepository|ObjectProphecy
     */
    protected $testimonialRepositoryProphecy = null;

    /**
     * @var TestimonialRepository|ProphecySubjectInterface
     */
    protected $testimonialRepository = null;

    protected function setUp()
    {
        $this->subject = new TestimonialController();

        $this->viewProphecy = $this->prophesize(ViewInterface::class);
        $this->view = $this->viewProphecy->reveal();
        $this->inject($this->subject, 'view', $this->view);

        $this->testimonialRepositoryProphecy = $this->prophesize(TestimonialRepository::class);
        $this->testimonialRepository = $this->testimonialRepositoryProphecy->reveal();
        $this->subject->injectTestimonialRepository($this->testimonialRepository);
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
        $this->testimonialRepositoryProphecy->findAll()->willReturn($allTestimonials);

        $this->viewProphecy->assign('testimonials', $allTestimonials)->shouldBeCalled();

        $this->subject->indexAction();
    }
}
