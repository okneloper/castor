<?php

namespace App\Transformations;

/**
 * Uses a single column in the source data row and retrieves it by index
 */
abstract class IndexedTransformation implements Transformation
{
    public function __construct(protected $index)
    {
    }
}
