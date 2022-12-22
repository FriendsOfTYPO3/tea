<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Functional\Domain\Repository\Product;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Core\SystemEnvironmentBuilder;
use TYPO3\CMS\Core\Http\ServerRequest;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \TTN\Tea\Domain\Repository\Product\TeaRepository
 * @covers \TTN\Tea\Domain\Model\Product\Tea
 */
class TeaRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = ['typo3conf/ext/tea'];

    private TeaRepository $subject;

    private PersistenceManager $persistenceManager;

    protected function setUp(): void
    {
        parent::setUp();

        // This is needed to make the functional tests work with TYPO3 12.1. We might be able to remove this in the
        // once we've updated to TYPO3 12.1.3 or 12.2.
        $request = (new ServerRequest())->withAttribute('applicationType', SystemEnvironmentBuilder::REQUESTTYPE_CLI);
        $GLOBALS['TYPO3_REQUEST'] = $request;

        $this->persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);

        $this->subject = $this->getContainer()->get(TeaRepository::class);
    }

    /**
     * @test
     */
    public function findAllForNoRecordsReturnsEmptyContainer(): void
    {
        $result = $this->subject->findAll();

        self::assertCount(0, $result);
    }

    /**
     * @test
     */
    public function findAllWithRecordsFindsRecordsFromAllPages(): void
    {
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/Product/Tea.csv');

        $result = $this->subject->findAll();

        self::assertGreaterThanOrEqual(1, \count($result));
    }

    /**
     * @test
     */
    public function findAllSortsByTitleInAscendingOrder(): void
    {
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/Product/Tea.csv');

        $result = $this->subject->findAll();

        $result->rewind();
        self::assertSame(2, $result->current()->getUid());
    }

    /**
     * @test
     */
    public function findByUidForExistingRecordReturnsModelWithData(): void
    {
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/Product/Tea.csv');

        $uid = 1;
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
        $this->importCSVDataSet(__DIR__ . '/../Fixtures/Product/Tea.csv');

        $uid = 3;
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
