<?php
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
class TeaTypeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \OliverKlee\Tea\Domain\Model\TeaType
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \OliverKlee\Tea\Domain\Model\TeaType();
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function getCaffeinatedInitiallyReturnsFalse()
    {
        self::assertSame(
            false,
            $this->subject->getCaffeinated()
        );
    }

    /**
     * @test
     */
    public function setCaffeinatedSetsCaffeinated()
    {
        $this->subject->setCaffeinated(true);
        self::assertSame(
            true,
            $this->subject->getCaffeinated()
        );
    }
}
