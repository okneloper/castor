<?php

namespace App\Transformations;

class MonthsToWeeksTransformation extends IndexedTransformation
{
    public function map(array $input_row): string
    {
        $months = $input_row[$this->index];

        if (!is_numeric($months)) {
            return '';
        }

        return (int)$months * 4;
    }
}
