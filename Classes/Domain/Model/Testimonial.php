<?php
namespace OliverKlee\Tea\Domain\Model;

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
 *  the Free Software Foundation; either version 3 of the License, or
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
	 * @var integer
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
	 * @return integer $numberOfConsumedCups
	 */
	public function getNumberOfConsumedCups() {
		return $this->numberOfConsumedCups;
	}

	/**
	 * @param integer $numberOfConsumedCups
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