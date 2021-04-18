<?php

namespace App\Formats;

class FormatFactory
{
    public static function make($format_name)
    {
        switch ($format_name) {
            case 'example':
                return new ExampleFormat();
        }

        throw new \InvalidArgumentException("Unsupported format [$format_name]");
    }
}
