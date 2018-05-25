<?php
declare(strict_types = 1);
namespace OliverKlee\Tea\Domain\Repository\Product;

use OliverKlee\Tea\Domain\Repository\Traits\StoragePageAgnosticTrait;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for Tea models.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de
 */
class TeaRepository extends Repository
{
    use StoragePageAgnosticTrait;
}
