<?php
namespace OliverKlee\Tea\Controller;

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

use OliverKlee\Tea\Domain\Repository\TestimonialRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * This controller takes care of displaying testimonials.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialController extends ActionController
{
    /**
     * @var \OliverKlee\Tea\Domain\Repository\TestimonialRepository
     */
    protected $testimonialRepository = null;

    /**
     * @param TestimonialRepository $repository
     *
     * @return void
     */
    public function injectTestimonialRepository(TestimonialRepository $repository)
    {
        $this->testimonialRepository = $repository;
    }

    /**
     * Lists all testimonials.
     *
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('testimonials', $this->testimonialRepository->findAll());
    }
}
