<?php
declare(strict_types=1);

namespace OliverKlee\Tea\Domain\Repository\Traits;

use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;

/**
 * This trait for repositories makes the repository ignore the storage page setting when fetching models.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de
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
