<?php
namespace Tests;

use App\Io\CsvFileInput;
use App\Transformer;

class IntegrationTest extends \Codeception\Test\Unit
{
    private $output_file = __DIR__ . '/data/test_output.csv';

    protected function _before()
    {
        // doing this before the test, just so the output file can be expected manually after a failed test
        if (file_exists($this->output_file)) {
            unlink($this->output_file);
        }
    }

    protected function _after()
    {
    }

    // tests
    public function testTransformsInputToExpectedOutput()
    {
        $input_file = __DIR__ . '/data/input.csv';
        $expected_output = __DIR__ . '/data/output.csv';
        $output = $this->output_file;

        $transformer = $this->transformer();

        $transformer->transform(new CsvFileInput($input_file), $output);

        $this->assertFileExists($output);
        $this->assertEquals(file_get_contents($expected_output), file_get_contents($output));
    }

    private function transformer(): Transformer
    {
        return new Transformer();
    }
}
