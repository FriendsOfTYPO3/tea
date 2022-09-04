<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Domain\Repository\Product;

use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use TTN\Tea\Domain\Repository\Product\TeaRepository;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Domain\Repository\Product\TeaRepository
 */
class TeaRepositoryTest extends UnitTestCase
{
    use ProphecyTrait;

    /**
     * @var ObjectProphecy<TeaRepository>
     */
    private ObjectProphecy $teaRepositoryProphecy;

    private TeaRepository $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->teaRepositoryProphecy = $this->prophesize(TeaRepository::class);
        $this->subject = $this->teaRepositoryProphecy->reveal();
    }

    /**
     * @test
     */
    public function isRepository(): void
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }
}
