<?php
namespace OliverKlee\Tea\Domain\Model;

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
 * This model represents a good cup of tea.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaBeverage extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var float
     */
    protected $size = 0.0;

    /**
     * @var \OliverKlee\Tea\Domain\Model\TeaType
     * @lazy
     */
    protected $type = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Addition>
     * @lazy
     */
    protected $additions = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Testimonial>
     * @lazy
     */
    protected $testimonials = null;

    /**
     * The constructor.
     *
     * @return TeaBeverage
     */
    public function __construct()
    {
        $this->initializeStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties.
     *
     * @return void
     */
    protected function initializeStorageObjects()
    {
        $this->additions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->testimonials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return float $size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param float $size
     *
     * @return void
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return \OliverKlee\Tea\Domain\Model\TeaType $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \OliverKlee\Tea\Domain\Model\TeaType $type
     *
     * @return void
     */
    public function setType(\OliverKlee\Tea\Domain\Model\TeaType $type)
    {
        $this->type = $type;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Addition> $additions
     */
    public function getAdditions()
    {
        return $this->additions;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $additions
     *
     * @return void
     */
    public function setAdditions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $additions)
    {
        $this->additions = $additions;
    }

    /**
     * Adds an Addition.
     *
     * @param \OliverKlee\Tea\Domain\Model\Addition $addition
     *
     * @return void
     */
    public function addAddition(\OliverKlee\Tea\Domain\Model\Addition $addition)
    {
        $this->additions->attach($addition);
    }

    /**
     * Removes an Addition.
     *
     * @param \OliverKlee\Tea\Domain\Model\Addition $additionToRemove The Addition to be removed
     *
     * @return void
     */
    public function removeAddition(\OliverKlee\Tea\Domain\Model\Addition $additionToRemove)
    {
        $this->additions->detach($additionToRemove);
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Testimonial> $testimonials
     */
    public function getTestimonials()
    {
        return $this->testimonials;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $testimonials
     *
     * @return void
     */
    public function setTestimonials(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $testimonials)
    {
        $this->testimonials = $testimonials;
    }

    /**
     * Adds an Testimonial.
     *
     * @param \OliverKlee\Tea\Domain\Model\Testimonial $testimonial
     *
     * @return void
     */
    public function addTestimonial(\OliverKlee\Tea\Domain\Model\Testimonial $testimonial)
    {
        $this->testimonials->attach($testimonial);
    }

    /**
     * Removes an Testimonial.
     *
     * @param \OliverKlee\Tea\Domain\Model\Testimonial $testimonialToRemove The Testimonial to be removed
     *
     * @return void
     */
    public function removeTestimonial(\OliverKlee\Tea\Domain\Model\Testimonial $testimonialToRemove)
    {
        $this->testimonials->detach($testimonialToRemove);
    }
}
