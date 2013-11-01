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
 * This model represents a good cup of tea.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaBeverage extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/**
	 * @var float
	 */
	protected $size = 0.0;

	/**
	 * @var \OliverKlee\Tea\Domain\Model\TeaType
	 * @lazy
	 */
	protected $type = NULL;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Addition>
	 * @lazy
	 */
	protected $additions = NULL;

	/**
	 * The constructor.
	 *
	 * @return TeaBeverage
	 */
	public function __construct() {
		$this->initializeStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initializeStorageObjects() {
		$this->additions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @return float $size
	 */
	public function getSize() {
		return $this->size;
	}

	/**
	 * @param float $size
	 *
	 * @return void
	 */
	public function setSize($size) {
		$this->size = $size;
	}

	/**
	 * @return \OliverKlee\Tea\Domain\Model\TeaType $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param \OliverKlee\Tea\Domain\Model\TeaType $type
	 *
	 * @return void
	 */
	public function setType(\OliverKlee\Tea\Domain\Model\TeaType $type) {
		$this->type = $type;
	}

	/**
	 * Adds an Addition.
	 *
	 * @param \OliverKlee\Tea\Domain\Model\Addition $addition
	 *
	 * @return void
	 */
	public function addAddition(\OliverKlee\Tea\Domain\Model\Addition $addition) {
		$this->additions->attach($addition);
	}

	/**
	 * Removes an Addition.
	 *
	 * @param \OliverKlee\Tea\Domain\Model\Addition $additionToRemove The Addition to be removed
	 *
	 * @return void
	 */
	public function removeAddition(\OliverKlee\Tea\Domain\Model\Addition $additionToRemove) {
		$this->additions->detach($additionToRemove);
	}

	/**
	 * Returns the additions.
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Addition> $additions
	 */
	public function getAdditions() {
		return $this->additions;
	}

	/**
	 * Sets the additions.
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OliverKlee\Tea\Domain\Model\Addition> $additions
	 *
	 * @return void
	 */
	public function setAdditions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $additions) {
		$this->additions = $additions;
	}
}
?>