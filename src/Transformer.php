<?php

namespace App;

use App\Formats\Format;
use App\Io\Input;
use App\Io\Output;
use App\Transformations\Transformation;

class Transformer
{
    public function __construct(private Format $format)
    {
    }

    public function transform(Input $input, Output $output)
    {
        $map = $this->format->getMappers();

        $result = [];

        $header_written = false;
        while ($row = $input->readLine()) {
            $new_row = array_map(function (Transformation $mapper) use ($row) {
                return $mapper->map($row);
            }, $map);

            if (!$header_written) {
                $output->outputRow(array_keys($new_row));
                $header_written = true;
            }

            $output->outputRow($new_row);
        }

        // file_put_contents($output_filename, file_get_contents(ROOT . '/tests/data/output.csv'));
    }
}
