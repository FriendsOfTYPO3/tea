<?php
declare(strict_types=1);

namespace OliverKlee\Tea\Tests\Unit\Domain\Repository;

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

use OliverKlee\Tea\Domain\Repository\TeaBeverageRepository;
use Prophecy\Prophecy\ProphecySubjectInterface;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TeaBeverageRepositoryTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{
    /**
     * @var bool
     */
    protected $backupGlobals = false;

    /**
     * @var TeaBeverageRepository
     */
    protected $subject;

    /**
     * @var ObjectManagerInterface|ProphecySubjectInterface
     */
    protected $objectManager = null;

    protected function setUp()
    {
        $objectManagerProphecy = $this->prophesize(ObjectManagerInterface::class);
        $this->objectManager = $objectManagerProphecy->reveal();
        $this->subject = new TeaBeverageRepository($this->objectManager);
    }

    /**
     * @test
     */
    public function isRepository()
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }
}
