<?php
declare(strict_types=1);

namespace OliverKlee\Tea\Domain\Model\Product;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

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
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Lazy
     */
    protected $image = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return FileReference|null
     */
    public function getImage()
    {
        if ($this->image instanceof LazyLoadingProxy) {
            $this->image = $this->image->_loadRealInstance();
        }

        return $this->image;
    }

    public function setImage(FileReference $image): void
    {
        $this->image = $image;
    }
}
