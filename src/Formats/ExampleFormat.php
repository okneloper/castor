<?php

namespace App\Formats;

use App\Transformations\DateDmyToYmdTransformation;
use App\Transformations\GenderTransformation;
use App\Transformations\MetersToCmTransformation;
use App\Transformations\MonthsToWeeksTransformation;
use App\Transformations\NoTransformation;
use App\Transformations\YesToIntTransformation;

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
            'weight_kg' => new NoTransformation('Weight'),
            'pregnant' => new YesToIntTransformation('Pregnant'),
            'pregnancy_duration_weeks' => new MonthsToWeeksTransformation('Months Pregnant'),
            'date_diagnosis' => new DateDmyToYmdTransformation('Date of diagnosis'),
        ];
    }
}
