<?php
declare(strict_types = 1);
namespace OliverKlee\Tea\Tests\Unit\Domain\Model\Product;

use Nimut\TestingFramework\TestCase\UnitTestCase;
use OliverKlee\Tea\Domain\Model\Product\Tea;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de
 */
class TeaTest extends UnitTestCase
{
    /**
     * @var Tea
     */
    private $subject = null;

    protected function setUp()
    {
        $this->subject = new Tea();
    }

    /**
     * @test
     */
    public function isAbstractEntity()
    {
        static::assertInstanceOf(AbstractEntity::class, $this->subject);
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        static::assertSame('', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $value = 'Club-Mate';
        $this->subject->setTitle($value);

        static::assertSame($value, $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        static::assertSame('', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription()
    {
        $value = 'Club-Mate';
        $this->subject->setDescription($value);

        static::assertSame($value, $this->subject->getDescription());
    }
}
