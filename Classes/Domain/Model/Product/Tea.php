<?php
declare(strict_types = 1);
namespace OliverKlee\Tea\Domain\Model\Product;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This class represents a tea (flavor), e.g., "Earl Grey".
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de
 */
class Tea extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $description = '';

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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}
