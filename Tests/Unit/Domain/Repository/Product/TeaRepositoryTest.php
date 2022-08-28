<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Domain\Repository\Product;

use Prophecy\PhpUnit\ProphecyTrait;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Domain\Repository\Product\TeaRepository
 */
class TeaRepositoryTest extends UnitTestCase
{
    use ProphecyTrait;

    /**
     * @var TeaRepository
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = GeneralUtility::makeInstance(TeaRepository::class);
    }

    /**
     * @test
     */
    public function isRepository(): void
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }
}
