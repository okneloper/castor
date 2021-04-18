<?php

namespace App\Transformations;

/**
 * Maps input data to output data
 * @package App\Mapping
 */
interface Transformation
{
    /**
     * Maps a row to a desired end column value
     */
    public function map(array $input_row): string;
}
