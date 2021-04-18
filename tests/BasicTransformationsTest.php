<?php
namespace Tests;

use App\Transformations\DateDmyToYmdTransformation;
use App\Transformations\MetersToCmTransformation;
use App\Transformations\MonthsToWeeksTransformation;
use App\Transformations\NoTransformation;
use App\Transformations\YesToIntTransformation;

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

    public function testYesToIntTransformation()
    {
        $data = ['Yes', 'yes', 'No', 'no'];

        $transformation = new YesToIntTransformation(0);
        $this->assertEquals('1', $transformation->map($data));

        $transformation = new YesToIntTransformation(1);
        $this->assertEquals('1', $transformation->map($data));

        $transformation = new YesToIntTransformation(2);
        $this->assertEquals('0', $transformation->map($data));

        $transformation = new YesToIntTransformation(3);
        $this->assertEquals('0', $transformation->map($data));
    }

    public function testMonthsToWeeksTransformation()
    {
        $transformation = new MonthsToWeeksTransformation(0);

        $result = $transformation->map([8]);

        $this->assertEquals(32, $result);
    }

    public function testDateTransformation()
    {
        $transformation = new DateDmyToYmdTransformation(0);

        $result = $transformation->map(['21-07-2016']);

        $this->assertEquals('2016-07-21', $result);
    }
}
