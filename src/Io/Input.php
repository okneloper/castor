<?php

namespace App\Io;

/**
 * Input source
 * @package App\Io
 */
interface Input {
    /**
     * Read a line(row) of data
     */
    public function readLine(): array|false;
}
