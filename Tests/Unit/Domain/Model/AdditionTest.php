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
class AdditionTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{
    /**
     * @var bool
     */
    protected $backupGlobals = false;

    /**
     * @var \OliverKlee\Tea\Domain\Model\Addition
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \OliverKlee\Tea\Domain\Model\Addition();
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame('', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $title = 'foo bar';

        $this->subject->setTitle($title);

        self::assertSame($title, $this->subject->getTitle());
    }
}
