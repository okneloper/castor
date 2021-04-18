<?php
namespace Tests;

use App\Transformations\MetersToCmTransformation;
use App\Transformations\NoTransformation;

class BasicTransformationsTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testNoTransformation(): void
    {
        $transformation = new NoTransformation(0);

        $result = $transformation->map(['string']);

        $this->assertEquals('string', $result);
    }

    public function testMetersToCmTransformation(): void
    {
        $transformation = new MetersToCmTransformation(0);

        $result = $transformation->map([1.69]);

        $this->assertEquals(169, $result);
    }
}
