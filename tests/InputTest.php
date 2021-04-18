<?php

namespace Tests;

use App\Io\CsvFileInput;
use App\Io\NamedCsvFileInput;

class InputTest extends \Codeception\Test\Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFileInput()
    {
        $input = new CsvFileInput(__DIR__ . '/data/input.csv', ';');

        $headers = $input->readLine();

        $this->assertEquals([
            'Patient ID', 'Name', 'Gender', 'Length', 'Weight', 'Pregnant', 'Months Pregnant', 'Date of diagnosis',
        ], $headers);
    }

    public function testCsvWithHeader()
    {
        $input = new NamedCsvFileInput(__DIR__ . '/data/input.csv', ';');

        $this->assertEquals([
            'Patient ID', 'Name', 'Gender', 'Length', 'Weight', 'Pregnant', 'Months Pregnant', 'Date of diagnosis',
        ], $input->getHeader());
    }
}
