<?php

namespace App\Transformations;

class HeightTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        $meters = $input_row[$this->index];

    }
}
