<?php
namespace OliverKlee\Tea\Tests\Functional\Utility;

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

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

/**
 * Test case.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class FileUtilityTest extends \Nimut\TestingFramework\TestCase\FunctionalTestCase
{
    /**
     * @var string[]
     */
    protected $testExtensionsToLoad = ['typo3conf/ext/tea'];

    /**
     * @var \OliverKlee\Tea\Utility\FileUtility
     */
    protected $subject = null;

    /**
     * @var vfsStreamDirectory
     */
    protected $root = null;

    /** @var string */
    protected $rootDirectoryName = 'home';

    /**
     * @var string
     */
    protected $targetFilePath = '';

    protected function setUp()
    {
        parent::setUp();

        $this->root = vfsStream::setup('home');
        $this->targetFilePath = vfsStream::url('home/target.txt');

        $this->subject = new \OliverKlee\Tea\Utility\FileUtility();
    }

    /**
     * @test
     */
    public function concatenateWithEmptyTargetFileNameThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->subject->concatenate('', ['foo.txt']);
    }

    /**
     * @test
     */
    public function concatenateWithNoSourceFilesCreatesEmptyTargetFile()
    {
        $this->subject->concatenate($this->targetFilePath, []);

        self::assertSame('', file_get_contents($this->targetFilePath));
    }

    /**
     * @test
     */
    public function concatenateWithOneEmptySourceFileCreatesEmptyTargetFile()
    {
        // This is one way to create a file with contents, using PHP's file functions.
        $sourceFileName = vfsStream::url('home/source.txt');
        // Just calling vfsStream::url does not create the file yet. We need to write into it to create it.
        file_put_contents($sourceFileName, '');

        $this->subject->concatenate($this->targetFilePath, [$sourceFileName]);

        self::assertSame('', file_get_contents($this->targetFilePath));
    }

    /**
     * @test
     */
    public function concatenateWithOneFileCopiesContentsFromSourceFileToTargetFile()
    {
        // This is vfsStream's way of creating a file with contents.
        $contents = 'Hello world!';
        $sourceFileName = vfsStream::url('home/source.txt');
        vfsStream::newFile('source.txt')->at($this->root)->setContent($contents);

        $this->subject->concatenate($this->targetFilePath, [$sourceFileName]);

        self::assertSame($contents, file_get_contents($this->targetFilePath));
    }

    /**
     * @test
     */
    public function concatenateWithTwoFileCopiesContentsFromBothFilesInOrderToTargetFile()
    {
        $contents1 = 'Hello ';
        $sourceFileName1 = vfsStream::url('home/source1.txt');
        file_put_contents($sourceFileName1, $contents1);
        $contents2 = 'world!';
        $sourceFileName2 = vfsStream::url('home/source2.txt');
        file_put_contents($sourceFileName2, $contents2);

        $this->subject->concatenate(
            $this->targetFilePath,
            [$sourceFileName1, $sourceFileName2]
        );

        self::assertSame(
            $contents1 . $contents2,
            file_get_contents($this->targetFilePath)
        );
    }
}
