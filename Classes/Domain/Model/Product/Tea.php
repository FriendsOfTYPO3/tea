<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Model\Product;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

/**
 * This class represents a tea (flavor), e.g., "Earl Grey".
 */
class Tea extends AbstractEntity
{
    protected string $title = '';

    protected string $description = '';

    /**
     * @phpstan-var \TYPO3\CMS\Extbase\Domain\Model\FileReference|LazyLoadingProxy|null
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference|null
     * @Lazy
     */
    protected $image;

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

    public function getImage(): ?FileReference
    {
        if ($this->image instanceof LazyLoadingProxy) {
            /** @var FileReference $image */
            $image = $this->image->_loadRealInstance();
            $this->image = $image;
        }

        return $this->image;
    }

    public function setImage(FileReference $image): void
    {
        $this->image = $image;
    }
}
