<?php

namespace App\Transformations;

/**
 * Example transformation that calculates a sum of 2 values
 * @package App\Transformations
 */
class MultiplyTransformation implements Transformation
{
    public function __construct(private string $column1, private string $column2)
    {
    }

    public function map(array $input_row): string
    {
        return $input_row[$this->column1] * $input_row[$this->column2];
    }
}
