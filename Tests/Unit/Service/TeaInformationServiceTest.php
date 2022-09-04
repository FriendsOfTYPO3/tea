<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Unit\Service;

use TTN\Tea\Domain\Model\Product\Tea;
use TTN\Tea\Service\TeaInformationService;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * @covers \TTN\Tea\Service\TeaInformationService
 */
class TeaInformationServiceTest extends UnitTestCase
{
    /**
     * @var TeaInformationService
     */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new TeaInformationService();
    }

    /**
     * @test
     */
    public function getUpdateDefaultTeaDescriptionKeepsTitleUnchanged(): void
    {
        $value = 'Club-Mate';
        $tea = new Tea();
        $tea->setTitle($value);
        $this->subject->updateDefaultTeaDescription($tea);
        self::assertSame($value, $tea->getTitle());
    }

    /**
     * @test
     */
    public function getUpdateDefaultTeaDescriptionKeepsDescriptionUnchanged(): void
    {
        $value = 'Club-Mate';
        $tea = new Tea();
        $tea->setDescription($value);
        $this->subject->updateDefaultTeaDescription($tea);
        self::assertSame($value, $tea->getDescription());
    }

    /**
     * @test
     */
    public function getUpdateDefaultTeaDescriptionOfUnknownTeaIsEmpty(): void
    {
        $value = 'Apple tree';
        $tea = new Tea();
        $tea->setTitle($value);
        $tea->setDefaultDescription('Default description of an apple tree');
        $this->subject->updateDefaultTeaDescription($tea);
        self::assertSame('', $tea->getDefaultDescription());
    }

    /**
     * @test
     */
    public function getUpdateDefaultTeaDescriptionReturnsExpectedValue(): void
    {
        $value = 'Oolong tea';
        $expected = '<p>Oolong is a traditional semi-oxidized Chinese tea. </p>';
        $tea = new Tea();
        $tea->setTitle($value);
        $this->subject->updateDefaultTeaDescription($tea);
        self::assertSame($expected, $tea->getDefaultDescription());
    }

    /**
     * @test
     */
    public function getUpdateDefaultTeaDescriptionIgnoresTitleCase(): void
    {
        $value1 = 'Oolong tea';
        $value2 = 'oolong tea';
        $tea1 = new Tea();
        $tea1->setTitle($value1);
        $tea2 = new Tea();
        $tea2->setTitle($value2);
        $this->subject->updateDefaultTeaDescription($tea1);
        $this->subject->updateDefaultTeaDescription($tea2);
        self::assertSame($tea1->getDefaultDescription(), $tea2->getDefaultDescription());
    }
}
