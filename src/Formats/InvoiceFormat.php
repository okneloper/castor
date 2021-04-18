<?php

namespace App\Formats;

use App\Transformations\MultiplyTransformation;
use App\Transformations\NoTransformation;

class InvoiceFormat implements Format
{
    public function getMappers(): array
    {
        return [
            'Name' => new NoTransformation('name'),
            'Price' => new NoTransformation('price'),
            'Quantity' => new NoTransformation('quantity'),
            'Total' => new MultiplyTransformation('price', 'quantity'),
        ];
    }
}
