<?php

namespace App\Console\Commands;

use App\Formats\FormatFactory;
use App\Io\CsvFileInput;
use App\Io\CsvFileOutput;
use App\Io\NamedCsvFileInput;
use App\Transformer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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

        $this->addOption('format', null, InputOption::VALUE_REQUIRED);

        $this->addOption('separator', null, InputOption::VALUE_REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $format_name = $input->getOption('format') ?: 'example';
        $separator = $input->getOption('separator') ?: ',';

        // input file format with defined transformers
        $format = FormatFactory::make($format_name);

        // input
        $input_csv = new NamedCsvFileInput($input->getArgument('input_file'), $separator);
        // output
        $output_filename = './output.csv';
        $output_csv = new CsvFileOutput($output_filename);

        // do the job
        $transformer = new Transformer($format);
        $transformer->transform($input_csv, $output_csv);

        // done
        $output->writeln("Output written in $output_filename");
        return Command::SUCCESS;
    }
}
