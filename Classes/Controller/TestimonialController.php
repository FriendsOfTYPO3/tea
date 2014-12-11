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

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use OliverKlee\Tea\Domain\Repository\TestimonialRepository;

/**
 * This controller takes care of displaying testimonials.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialController extends ActionController {
	/**
	 * @var \OliverKlee\Tea\Domain\Repository\TestimonialRepository
	 */
	protected $testimonialRepository = NULL;

	/**
	 * Injects the TestimonialRepository.
	 *
	 * @param \OliverKlee\Tea\Domain\Repository\TestimonialRepository $repository
	 *
	 * @return void
	 */
	public function injectTestimonialRepository(TestimonialRepository $repository) {
		$this->testimonialRepository = $repository;
	}

	/**
	 * Lists all testimonials.
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('testimonials', $this->testimonialRepository->findAll());
	}

	/**
	 * Injects the view.
	 *
	 * Note: This function is intended for unit-testing purposes only.
	 *
	 * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view
	 *
	 * @return void
	 */
	public function setView(ViewInterface $view) {
		$this->view = $view;
	}
}