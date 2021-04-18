<?php

namespace App\Transformations;

/**
 * Maps a single input column directly to an output column without any transformations
 */
class NoTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        return $input_row[$this->index];
    }
}
