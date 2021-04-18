<?php

namespace Tests;

use App\Io\CsvFileInput;

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
}
