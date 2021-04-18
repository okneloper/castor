<?php

namespace App\Transformations;

class MetersToCmTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        $meters = $input_row[$this->index];

        return (int)floor($meters * 100);
    }
}
