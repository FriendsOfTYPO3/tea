<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Functional\Domain\Repository\Product;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \TTN\Tea\Domain\Repository\Product\TeaRepository
 * @covers \TTN\Tea\Domain\Model\Product\Tea
 */
class TeaRepositoryTest extends FunctionalTestCase
{
    /**
     * @var array<int, non-empty-string>
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/tea'];

    /**
     * @var TeaRepository
     */
    private $subject;

    /**
     * @var PersistenceManager
     */
    private $persistenceManager;

    protected function setUp(): void
    {
        parent::setUp();

        $this->persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);

        /** @var Typo3Version $versionInformation */
        $versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
        if ($versionInformation->getMajorVersion() >= 11) {
            $this->subject = $this->getContainer()->get(TeaRepository::class);
        } else {
            /** @var ObjectManager $objectManager */
            $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
            $this->subject = $objectManager->get(TeaRepository::class);
        }
    }

    /**
     * @test
     */
    public function findAllForNoRecordsReturnsEmptyContainer(): void
    {
        $container = $this->subject->findAll();

        self::assertCount(0, $container);
    }

    /**
     * @test
     */
    public function findAllWithRecordsFindsRecordsFromAllPages(): void
    {
        $this->importDataSet(__DIR__ . '/../Fixtures/Product/Tea.xml');

        $container = $this->subject->findAll();

        self::assertGreaterThanOrEqual(1, \count($container));
    }

    /**
     * @test
     */
    public function findAllSortsByTitleInAscendingOrder(): void
    {
        $this->importDataSet(__DIR__ . '/../Fixtures/Product/Tea.xml');

        $container = $this->subject->findAll();

        $container->rewind();
        self::assertSame(2, $container->current()->getUid());
    }

    /**
     * @test
     */
    public function findByUidForExistingRecordReturnsModelWithData(): void
    {
        $this->importDataSet(__DIR__ . '/../Fixtures/Product/Tea.xml');

        $uid = 1;
        /** @var Tea $model */
        $model = $this->subject->findByUid($uid);

        self::assertNotNull($model);
        self::assertSame('Earl Grey', $model->getTitle());
        self::assertSame('Fresh and hot.', $model->getDescription());
    }

    /**
     * @test
     */
    public function fillsImageRelation(): void
    {
        $this->importDataSet(__DIR__ . '/../Fixtures/Product/Tea.xml');

        $uid = 3;
        /** @var Tea $model */
        $model = $this->subject->findByUid($uid);

        $image = $model->getImage();
        self::assertInstanceOf(FileReference::class, $image);
        self::assertSame(1, $image->getUid());
    }

    /**
     * @test
     */
    public function addAndPersistAllCreatesNewRecord(): void
    {
        $title = 'Godesberger Burgtee';
        $model = new Tea();
        $model->setTitle($title);

        $this->subject->add($model);
        $this->persistenceManager->persistAll();

        $connection = $this->getConnectionPool()->getConnectionForTable('tx_tea_domain_model_product_tea');
        $databaseRow = $connection
            ->executeQuery(
                'SELECT * FROM tx_tea_domain_model_product_tea WHERE uid = :uid',
                ['uid' => $model->getUid()]
            )
            ->fetchAssociative();

        self::assertIsArray($databaseRow);
        self::assertSame($title, $databaseRow['title']);
    }
}
