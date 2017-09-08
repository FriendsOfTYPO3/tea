<?php
declare(strict_types=1);

namespace OliverKlee\Tea\Tests\Unit\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{
    /**
     * @var bool
     */
    protected $backupGlobals = false;

    /**
     * @var \OliverKlee\Tea\Domain\Model\Testimonial
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \OliverKlee\Tea\Domain\Model\Testimonial();
    }

    /**
     * @test
     */
    public function getDateOfPostingInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getDateOfPosting());
    }

    /**
     * @test
     */
    public function setDateOfPostingSetsDateOfPosting()
    {
        $date = new \DateTime();
        $this->subject->setDateOfPosting($date);

        self::assertSame(
            $date,
            $this->subject->getDateOfPosting()
        );
    }

    /**
     * @test
     */
    public function getNumberOfConsumedCupsInitiallyReturnsZero()
    {
        self::assertSame(0, $this->subject->getNumberOfConsumedCups());
    }

    /**
     * @test
     */
    public function setNumberOfConsumedCupsSetsNumberOfConsumedCups()
    {
        $number = 123456;

        $this->subject->setNumberOfConsumedCups($number);

        self::assertSame($number, $this->subject->getNumberOfConsumedCups());
    }

    /**
     * @test
     */
    public function getTextInitiallyReturnsEmptyString()
    {
        self::assertSame('', $this->subject->getText());
    }

    /**
     * @test
     */
    public function setTextSetsText()
    {
        $text = 'foo bar';

        $this->subject->setText($text);

        self::assertSame($text, $this->subject->getText());
    }
}
