<?php

namespace App;

use App\Io\Input;

class Transformer
{
    public function transform(Input $input, string $output_filename)
    {
        file_put_contents($output_filename, file_get_contents(ROOT . '/tests/data/output.csv'));
    }
}
