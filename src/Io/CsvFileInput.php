<?php

namespace App\Io;

class CsvFileInput extends FileInput
{
    public function __construct(string $filename, private string $separator = ',')
    {
        parent::__construct($filename);
    }

    public function readLine(): array|false
    {
        return fgetcsv($this->file, 0, $this->separator);
    }
}
