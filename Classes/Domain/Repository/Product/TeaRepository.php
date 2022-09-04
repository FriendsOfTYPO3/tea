<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Repository\Product;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Traits\StoragePageAgnosticTrait;
use TTN\Tea\Service\TeaInformationService;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
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
     */
    public function findAllEnriched(): array
    {
        /*
        $results = $this->createQuery()->execute()->toArray();
        if (is_null($results)) {
            return [];
        }
        foreach ($results as $tea) {
            /* @var Tea $tea */
          /*  $this->enrichTea($tea);
        }
        return $results;*/
        return [];
    }

    /**
     * Returns all objects of this repository.
     */
    public function enrichTea(Tea $tea)
    {
        $this->teaInformationService->updateDefaultTeaDescription($tea);
    }
}
