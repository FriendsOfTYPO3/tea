<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Repository\Traits;

use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;

/**
 * This trait for repositories makes the repository ignore the storage page setting when fetching models.
 *
 * @property ObjectManagerInterface $objectManager
 */
trait StoragePageAgnosticTrait
{
    /**
     * @var QuerySettingsInterface
     */
    private $querySettings;

    public function injectQuerySettings(QuerySettingsInterface $querySettings): void
    {
        $this->querySettings = $querySettings;
    }

    public function initializeObject(): void
    {
        $querySettings = clone $this->querySettings;

        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }
}
