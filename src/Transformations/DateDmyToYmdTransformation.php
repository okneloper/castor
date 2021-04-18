<?php

namespace App\Transformations;

class DateDmyToYmdTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        $parts = explode('-', $input_row[$this->index]);
        $parts = array_reverse($parts);

        return implode('-', $parts);
    }
}
