<?php
namespace Tests;

use App\Formats\InvoiceFormat;
use App\Io\ArrayInput;
use App\Io\ArrayOutput;
use App\Transformations\MultiplyTransformation;
use App\Transformer;

class CombinedTransformationsTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMultiplierTransformation()
    {
        $input_data = [
            [
                'name' => 'Bandage',
                'price' => 2,
                'quantity' => 50,
            ],
        ];

        $expected_output = [
            [
                'Name' => 'Bandage',
                'Price' => 2,
                'Quantity' => 50,
                // new column combined of 2 input columns
                'Total' => 100,
            ],
        ];

        $format = new InvoiceFormat();

        $output = new ArrayOutput();
        $transformer = new Transformer($format);
        $transformer->transform(new ArrayInput($input_data), $output);

        $actual = $output->getOutput();

        // $actual[0] is the column headers, $actual[1] is the first row of data
        $this->assertEquals($expected_output[0], $actual[1]);
    }
}
