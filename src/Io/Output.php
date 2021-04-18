<?php

namespace App\Io;

interface Output
{
    /**
     * @param array $row
     */
    public function outputRow(array $row): void;
}
