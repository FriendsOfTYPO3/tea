<?php

declare(strict_types=1);

namespace TTN\Tea\Tests\Functional\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use TTN\Tea\Command\CreateTestDataCommand;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * @covers \TTN\Tea\Command\CreateTestDataCommand
 */
class CreateTestDataCommandTest extends FunctionalTestCase
{
    private const COMMAND_NAME = 'tea:createtestdata';

    protected array $testExtensionsToLoad = ['ttn/tea'];

    private CreateTestDataCommand $subject;

    private CommandTester $commandTester;

    protected function setUp(): void
    {
        parent::setUp();
        $this->importCSVDataSet(__DIR__ . '/Fixtures/Database/Pages.csv');
        $this->subject = new CreateTestDataCommand(self::COMMAND_NAME);
        $application = new Application();
        $application->add($this->subject);

        $command = $application->find('tea:createtestdata');
        $this->commandTester = new CommandTester($command);
    }

    /**
     * @test
     */
    public function isConsoleCommand(): void
    {
        self::assertInstanceOf(Command::class, $this->subject);
    }

    /**
     * @test
     */
    public function hasDescription(): void
    {
        $expected = 'Create test data for the tea extension in an already existing page (sysfolder).';
        self::assertSame($expected, $this->subject->getHelp());
    }

    /**
     * @test
     */
    public function hasHelpText(): void
    {
        $expected = 'Create test data for the tea extension in an already existing page (sysfolder).';
        self::assertSame($expected, $this->subject->getHelp());
    }

    /**
     * @test
     */
    public function runReturnsSuccessStatus(): void
    {
        $result = $this->commandTester->execute(
            [
                'pageUid' => '1',
            ],
        );

        self::assertSame(Command::SUCCESS, $result);
    }

    /**
     * @test
     */
    public function testDataGetsCreated(): void
    {
        $this->commandTester->execute([
            'pageUid' => '1',
        ]);

        self::assertCSVDataSet(__DIR__ . '/Fixtures/Database/Teas.csv');
    }

    /**
     * @test
     */
    public function testDataGetsDeletedBeforeNewDataCreated(): void
    {
        $this->importCSVDataSet(__DIR__ . '/Fixtures/Database/Teas.csv');
        $this->commandTester->execute(
            [
                'pageUid' => '1',
                '--delete-data-before' => true,
            ]
        );

        self::assertCSVDataSet(__DIR__ . '/Fixtures/Database/TeasAfterDelete.csv');
    }

}
