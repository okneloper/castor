# CSV import script

NB: Some simplifications were admitted, just for the
sake of time, only so much work can be done in 4h. 
E.g. 
* using built-in exceptions
* not testing some edge cases (e.g. empty input data, invalid date format) - the emphasis
  was on the OO architecture and making it actually do what is expected
* using PHP's built-in CSV functions, which caused some
issues with matching the line endings in the original CSVs and the output. This might 
also cause the Integration test (`\Tests\IntegrationTest`) to fail depending on the target machine it will be run
on. I ran mine on Windows in git-bash and it passed. 
  
The 4h mark was tagged `4h` in git. I forgot the actual console application, as 
development was done using the tests. So at the 4h mark the `Transformer` does it's
job, but can only be verified using the test. 
I fixed this right after the 4h mark, hopefully not an issue since all the logic was
implemented, the application only puts the input and output together.  

So 4h to get to the `4h` mark, then approximately an hour to finalize the app 
and additional examples and 1h to write the readme. Coding to a running clock 
has affected the code quality, work was done in a hurry, so there might be some 
missing typehints, comments 
here and there, some things have not been refactored to their final state (e.g. method 
names or some leftover from renaming what I initially called `Mappings` to 
`Transformations`), no inspections has been run, non-atomic commits etc., 
so normally this should take a little more time.

Some details of implementation can be found below. 

## Installation
PHP 8 is required. 
```bash
composer install
```

## Usage
Usage example for the CSVs supplied: 
```bash
php main.php import tests/data/input.csv --format=example --separator=';'
```

## Running tests
```bash
./vendor/bin/codecept run
```
If the above fails (e.g. using wrong PHP version), then:
```bash
php ./vendor/codeception/codeception/codecept run
```

## Details of implementation

The main job is done by `App\Transformer` class, which reads the data rows on by one
from defined `Input`, transforms using the defined `Format` and writes to the 
given `Output`. All are interfaces and various implementation can be injected
easily. There are a few basic imeplentations and new ones can be added by implementing 
the interfaces. 

### \App\Io\Input
Various implementation are defined for reading CSV from files 
* \App\Io\IndexedCsvFileInput reads into an indexed array in the form of
```
Array (
  0 => 1
  1 => Johnson
  ...
)
```
Might be useful if the titles of columns change, but the order doesn't
* \App\Io\NamedCsvFileInput - reads the data into an array using CSV headers: 
```
Array (
  'Patient ID' => 1
  'Name' => Johnson
  ...
)
```
Useful when the column titles are known and constant. Easiest to work with, when 
printing out etc. This is the one used by the application
* \App\Io\ArrayInput - An example implementation for using a php array as input. Useful
in testing to quickly define a dataset without storing files etc.

### \App\Io\Output
Same for output - `\App\Io\CsvFileOutput` and `\App\Io\ArrayOutput` for testing 
are defined. 

### \App\Formats\Format
The format holds the details about the transformations required for the input file
to get transformed into the required format.

The format used by the app (based on the provided CSVs) is `\App\Formats\ExampleFormat`.

Order of columns in the resulting CSV can changed by reordering their definitions 
in the code of `Format` class. 

New `Format`s can be implemented and added to `\App\Formats\FormatFactory`, then 
can used by passing the `--format` option to the app.

The format simply defines the list of resulting columns and how to get them - the 
`\App\Transformations\Transformation`s.

A `Transformation` receives the full data row and returns a value for the column. The
full row is used, so that multiple input columns can be used to calculate the result
(example `\App\Formats\InvoiceFormat` and `\Tests\CombinedTransformationsTest`).

A bunch of transformations has been implemented to get the app produce desieed
result.
