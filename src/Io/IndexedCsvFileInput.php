<?php

namespace App\Io;

class IndexedCsvFileInput extends CsvFileInput
{
    public function __construct(string $filename)
    {
        parent::__construct($filename);

        // discard the header line
        $this->readLine();
    }
}
