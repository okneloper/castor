<?php

namespace App\Formats;

use App\Transformations\MetersToCmTransformation;
use App\Transformations\NoTransformation;
use App\Transformations\GenderTransformation;
use App\Transformations\IdTransformation;

class ExampleFormat implements Format
{
    /**
     * ExampleFormat constructor.
     */
    public function __construct()
    {
    }

    public function getMappers(): array
    {
        return [
            // destination column name => input column name
            'record_id' => new NoTransformation('Patient ID'),
            'gender' => new GenderTransformation('Gender'),
            'height_cm' =>  new MetersToCmTransformation('Length'),
//            new WeightMapper(),
//            new PregnantMapper(),
//            new PregnancyWeeksMapper(),
//            new DateDiagnosisMapper(),
        ];
    }
}
