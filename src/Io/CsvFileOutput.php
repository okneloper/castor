<?php

namespace App\Io;

class CsvFileOutput implements Output
{
    protected $file;

    public function __construct($filename)
    {
        $this->file = fopen($filename, 'w');
    }

    public function outputRow(array $row): void
    {
        // separator is hardcoded here for the sake of speed and based on the fact that the output CSV isn't expected
        // to change often (if at all)
        fputcsv($this->file, $row, ';');
    }
}
