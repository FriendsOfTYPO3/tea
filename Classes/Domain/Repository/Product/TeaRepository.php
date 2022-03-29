<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Repository\Product;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Traits\StoragePageAgnosticTrait;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Tea>
 */
class TeaRepository extends Repository
{
    use StoragePageAgnosticTrait;

    /**
     * @var string[]
     */
    protected $defaultOrderings = ['title' => QueryInterface::ORDER_ASCENDING];
}
