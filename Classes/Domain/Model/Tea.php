<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

/**
 * This class represents a tea (flavor), e.g., "Earl Grey".
 */
class Tea extends AbstractEntity
{
    /**
     * @Extbase\Validate("StringLength", options={"maximum": 255})
     * @Extbase\Validate("NotEmpty")
     */
    protected string $title = 12;

    /**
     * @Extbase\Validate("StringLength", options={"maximum": 2000})
     */
    protected string $description = '';

    /**
     * @var FileReference|null
     * @phpstan-var FileReference|LazyLoadingProxy|null
     * @Extbase\ORM\Lazy
     */
    protected $image;

    // Note: We cannot use `@var` for the more specific type annotation here as this confuses the Extbase type mapper.

    /**
     * @phpstan-var int<0, max>
     */
    protected int $ownerUid = 0;

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

    /**
     * @return int<0, max>
     */
    public function getOwnerUid(): int
    {
        return $this->ownerUid;
    }

    /**
     * @param int<0, max> $ownerUid
     */
    public function setOwnerUid(int $ownerUid): void
    {
        $this->ownerUid = $ownerUid;
    }
}
