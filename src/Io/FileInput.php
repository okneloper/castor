<?php

namespace App\Io;

/**
 * This is common for many file types (not just CSV), so putting it here in a base for all file input classes
 */
abstract class FileInput implements Input
{
    protected $file;

    public function __construct(string $filename)
    {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException("");
        }

        $this->file = fopen($filename, 'r');

        $this->skipBom();
    }

    protected function skipBom(): void
    {
        // skip UTF-8 BOM
        $bom_mark = chr(hexdec('EF')) . chr(hexdec('BB')) . chr(hexdec('BF'));
        $first_3 = fread($this->file, 3);
        if ($first_3 !== $bom_mark) {
            // if not BOM, go back to the start of file
            rewind($this->file);
        }
    }
}
