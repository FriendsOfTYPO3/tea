<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Repository\Product;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Traits\StoragePageAgnosticTrait;
use TTN\Tea\Service\TeaInformationService;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Tea>
 */
class TeaRepository extends Repository
{
    use StoragePageAgnosticTrait;

    protected $defaultOrderings = ['title' => QueryInterface::ORDER_ASCENDING];

    /**
     * @var TeaInformationService
     */
    protected $teaInformationService;

    public function injectTeaInformationService(TeaInformationService $teaInformationService): void
    {
        $this->teaInformationService = $teaInformationService;
    }

    /**
     * Returns all objects of this repository enriched with default descriptions.
     * @return QueryResultInterface|array
     */
    public function findAllEnriched()
    {
        $results = $this->createQuery()->execute();
        foreach ($results as $tea) {
            /* @var Tea $tea */
            $this->enrichTea($tea);
        }
        return $results;
    }

    /**
     * Returns all objects of this repository.
     */
    public function enrichTea(Tea $tea)
    {
        $this->teaInformationService->updateDefaultTeaDescription($tea);
    }
}
