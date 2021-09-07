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
    public function initializeObject(): void
    {
        /** @var QuerySettingsInterface $querySettings */
        $querySettings = $this->objectManager->get(QuerySettingsInterface::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }
}
