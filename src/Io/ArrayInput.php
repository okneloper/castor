<?php

namespace App\Io;

class ArrayInput implements Input
{
    private $index = 0;

    public function __construct(private array $array)
    {
    }

    public function readLine(): array|false
    {
        return $this->array[$this->index++] ?? false;
    }
}
