<?php

namespace App\Formats;

/**
 * Format defines the input format and what actions should be taken to get it to the
 * expected output format.
 * @package App\Formats
 */
interface Format
{
    /**
     * Returns array of DataMappers that will be applied to the input data to get the resulting data
     */
    public function getMappers(): array;
}
