<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportCommand. Imports the CSV given in argument
 * @package App\Console\Commands
 */
class ImportCommand extends Command
{
    protected static $defaultName = 'import';

    protected function configure()
    {
        $this->addArgument('input_file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($input->getArgument('input_file'));

        return Command::SUCCESS;
    }
}
