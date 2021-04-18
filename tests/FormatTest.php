<?php

namespace Tests;

use App\Formats\ExampleFormat;
use App\Formats\FormatFactory;
use App\Transformations\NoTransformation;

class FormatTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFactoryFailsOnUnknownFormat()
    {
        $this->expectException(\InvalidArgumentException::class);

        FormatFactory::make('unknown format');
    }

    public function testExampleFormat()
    {
        $format = new ExampleFormat();

        $map = $format->getMappers();

        $this->assertArrayHasKey('record_id', $map);
        $this->assertInstanceOf(NoTransformation::class, $map['record_id']);
    }
}
