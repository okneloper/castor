<?php

namespace App\Io;

class ArrayOutput implements Output
{
    private $output = [];

    public function outputRow(array $row): void
    {
        $this->output[] = $row;
    }

    public function getOutput(): array
    {
        return $this->output;
    }
}
