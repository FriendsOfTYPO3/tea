<?php
declare(strict_types = 1);
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

    /**
     * @param FileReference $image
     *
     * @return void
     */
    public function setImage(FileReference $image)
    {
        $this->image = $image;
    }
}
