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
 * This model represents a testimonial for a TeaBeverage.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Testimonial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/**
	 * @var \DateTime
	 */
	protected $dateOfPosting = NULL;

	/**
	 * @var int
	 */
	protected $numberOfConsumedCups = 0;

	/**
	 * @var string
	 */
	protected $text = '';

	/**
	 * @return \DateTime $dateOfPosting
	 */
	public function getDateOfPosting() {
		return $this->dateOfPosting;
	}

	/**
	 * @param \DateTime $dateOfPosting
	 *
	 * @return void
	 */
	public function setDateOfPosting($dateOfPosting) {
		$this->dateOfPosting = $dateOfPosting;
	}

	/**
	 * @return int $numberOfConsumedCups
	 */
	public function getNumberOfConsumedCups() {
		return $this->numberOfConsumedCups;
	}

	/**
	 * @param int $numberOfConsumedCups
	 *
	 * @return void
	 */
	public function setNumberOfConsumedCups($numberOfConsumedCups) {
		$this->numberOfConsumedCups = $numberOfConsumedCups;
	}

	/**
	 * @return string $text
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @param string $text
	 *
	 * @return void
	 */
	public function setText($text) {
		$this->text = $text;
	}
}