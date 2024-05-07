<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Domain\Repository;

use TTN\Tea\Domain\Repository\TeaRepository;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Domain\Repository\TeaRepository
 */
final class TeaRepositoryTest extends UnitTestCase
{
    private TeaRepository $subject;

    protected function setUp(): void
    {
        parent::setUp();

        if (\interface_exists(ObjectManagerInterface::class)) {
            $objectManagerStub = $this->createStub(ObjectManagerInterface::class);
            // @phpstan-ignore-next-line This line is 11LTS-specific, but we're running PHPStan on TYPO3 12.
            $this->subject = new TeaRepository($objectManagerStub);
        } else {
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
