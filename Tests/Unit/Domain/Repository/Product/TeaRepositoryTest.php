<?php
declare(strict_types=1);

namespace OliverKlee\Tea\Tests\Unit\Domain\Repository\Product;

use Nimut\TestingFramework\TestCase\UnitTestCase;
use OliverKlee\Tea\Domain\Repository\Product\TeaRepository;
use Prophecy\Prophecy\ProphecySubjectInterface;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de
 */
class TeaRepositoryTest extends UnitTestCase
{
    /**
     * @var TeaRepository
     */
    private $subject = null;

    /**
     * @var ObjectManagerInterface|ProphecySubjectInterface
     */
    protected $objectManager = null;

    protected function setUp(): void
    {
        $this->objectManager = $this->prophesize(ObjectManagerInterface::class)->reveal();
        $this->subject = new TeaRepository($this->objectManager);
    }

    /**
     * @test
     */
    public function isRepository(): void
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }
}
