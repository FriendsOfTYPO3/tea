<?php

declare(strict_types=1);

namespace TTN\Tea\Domain\Repository\Traits;

use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;

/**
 * This trait for repositories makes the repository ignore the storage page setting when fetching models.
 */
trait StoragePageAgnosticTrait
{
    private QuerySettingsInterface $querySettings;

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
