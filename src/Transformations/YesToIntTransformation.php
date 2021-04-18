<?php

namespace App\Transformations;

class YesToIntTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        return strtolower($input_row[$this->index]) === 'yes' ? '1' : '0';
    }
}
