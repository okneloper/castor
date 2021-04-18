<?php

namespace App\Transformations;

class IdTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        return $input_row[$this->index];
    }
}
