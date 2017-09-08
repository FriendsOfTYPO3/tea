<?php
declare(strict_types=1);

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
class Testimonial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \DateTime
     */
    protected $dateOfPosting = null;

    /**
     * @var int
     */
    protected $numberOfConsumedCups = 0;

    /**
     * @var string
     */
    protected $text = '';

    /**
     * @return \DateTime|null
     */
    public function getDateOfPosting()
    {
        return $this->dateOfPosting;
    }

    /**
     * @param \DateTime $dateOfPosting
     *
     * @return void
     */
    public function setDateOfPosting(\DateTime $dateOfPosting)
    {
        $this->dateOfPosting = $dateOfPosting;
    }

    /**
     * @return int $numberOfConsumedCups
     */
    public function getNumberOfConsumedCups(): int
    {
        return $this->numberOfConsumedCups;
    }

    /**
     * @param int $numberOfConsumedCups
     *
     * @return void
     */
    public function setNumberOfConsumedCups(int $numberOfConsumedCups)
    {
        $this->numberOfConsumedCups = $numberOfConsumedCups;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return void
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }
}
