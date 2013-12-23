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
 * This model represents an addition for tea like sugar or milk.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Addition extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {
	/**
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param \string $title
	 *
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
}