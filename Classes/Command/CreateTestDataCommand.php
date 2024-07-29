<?php

declare(strict_types=1);

namespace TTN\Tea\Command;

/*
 * Command to create test data for the tea extension.
 */

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class CreateTestDataCommand extends Command
{
    /**
     * @var list<array{title: non-empty-string, description: non-empty-string, sys_language_uid: int<0, max>}>
     */
    protected array $teaData = [
        [
            'title' => 'Darjeeling',
            'description' => 'I love that tea!',
            'sys_language_uid' => 0,
        ],
         [
            'title' => 'Earl Grey',
            'description' => 'A nice tea!',
            'sys_language_uid' => 0,
        ],
    ];

    protected function configure(): void
    {
        $this
            ->setHelp('Create test data for the tea extension in an already existing page (sysfolder).')
            ->addArgument(
                'pageId',
                InputArgument::REQUIRED,
                'Existing sysfolder page id.'
            )
            ->addOption(
                'delete-data-before',
                'd',
                InputOption::VALUE_NONE,
                'Delete all tea data in the defined pid before creating new data.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var int $pageId */
        $pageId = $input->getArgument('pageId') ?? 0;
        /** @var bool $deleteDataBefore */
        $deleteDataBefore = $input->getOption('delete-data-before') ?? false;
        $table = 'tx_tea_domain_model_tea';
        $connectionForTable = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($table);

        if ($deleteDataBefore) {
            $query = $connectionForTable;
            $query->delete($table, ['pid' => $pageId], [Connection::PARAM_INT]);
            $output->writeln(sprintf('Existing data in page %s deleted.', $pageId));
        }

        $query = $connectionForTable;
        foreach ($this->teaData as $item) {
            $item = ['pid' => $pageId, ...$item];
            $query->insert(
                $table,
                $item
            );
        }
        $output->writeln(sprintf('Test data in page %s created.', $pageId));

        return Command::SUCCESS;
    }
}
