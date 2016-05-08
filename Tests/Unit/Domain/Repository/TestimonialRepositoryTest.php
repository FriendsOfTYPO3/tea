<?php
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

use OliverKlee\Tea\Domain\Repository\TestimonialRepository;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class TestimonialRepositoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var TestimonialRepository
     */
    protected $subject;

    /**
     * @var ObjectManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $objectManager = null;

    protected function setUp()
    {
        $this->objectManager = $this->getMock(ObjectManagerInterface::class);
        $this->subject = new TestimonialRepository($this->objectManager);
    }

    /**
     * @test
     */
    public function isRepository()
    {
        self::assertInstanceOf(Repository::class, $this->subject);
    }
}
