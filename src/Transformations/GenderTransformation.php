<?php

namespace App\Transformations;

class GenderTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        switch ($input_row[$this->index]) {
            case 'Male':
                return 1;
                // I always put a break, just in case the return above is changes to a non-return statement
                break;

            case 'Female':
                return 2;
                break;
        }

        return 'n/a';
    }
}
