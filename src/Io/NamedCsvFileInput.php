<?php

namespace App\Io;

class NamedCsvFileInput extends CsvFileInput
{
    protected array $header;

    public function __construct(string $filename, string $separator = ',')
    {
        parent::__construct($filename, $separator);

        $this->header = parent::readLine();
    }

    public function getHeader(): array
    {
        return $this->header;
    }

    public function readLine(): array|false
    {
        $row = parent::readLine();

        // return false if there are no more lines
        if (!$row) {
            return $row;
        }

        return array_combine($this->header, $row);
    }
}
