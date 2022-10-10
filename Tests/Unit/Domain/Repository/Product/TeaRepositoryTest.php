<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Domain\Repository\Product;

use Prophecy\PhpUnit\ProphecyTrait;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Domain\Repository\Product\TeaRepository
 */
class TeaRepositoryTest extends UnitTestCase
{
    use ProphecyTrait;

    private TeaRepository $subject;

    protected function setUp(): void
    {
        parent::setUp();

        if (\interface_exists(ObjectManagerInterface::class)) {
            $objectManager = $this->prophesize(ObjectManagerInterface::class)->reveal();
            $this->subject = new TeaRepository($objectManager);
        } else {
            // @phpstan-ignore-next-line This line is valid in TYPO3 12LTS, but PHPStan uses 11LTS.
            $this->subject = new TeaRepository();
        }
    }

    /**
     * @test
     */
    public function isRepository(): void
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }
}
