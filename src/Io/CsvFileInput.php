<?php

namespace App\Io;

class CsvFileInput implements Input
{
    private $file;

    public function __construct(string $filename, private string $separator = ',')
    {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException("");
        }

        $this->file = fopen($filename, 'r');

        // skip UTF-8 BOM
        $bom_mark = chr(hexdec('EF')) . chr(hexdec('BB')) . chr(hexdec('BF'));
        $first_3 = fread($this->file, 3);
        if ($first_3 !== $bom_mark) {
            // if not BOM, go back to the start of file
            rewind($this->file);
        }
    }


    public function readLine(): array
    {
        return fgetcsv($this->file, 0, $this->separator);
    }
}
