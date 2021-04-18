<?php

namespace App\Io;

/**
 * Input source
 * @package App\Io
 */
interface Input {
    public function readLine(): array;
}
