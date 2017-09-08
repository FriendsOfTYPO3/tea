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
 * This model represents a tea type like "Earl Grey", "Gunpowder" or "Chamomile".
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * @var bool
     */
    protected $caffeinated = false;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function getCaffeinated(): bool
    {
        return $this->caffeinated;
    }

    /**
     * @param bool $caffeinated
     *
     * @return void
     */
    public function setCaffeinated(bool $caffeinated)
    {
        $this->caffeinated = $caffeinated;
    }

    /**
     * @return bool
     */
    public function isCaffeinated(): bool
    {
        return $this->getCaffeinated();
    }
}
