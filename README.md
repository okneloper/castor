# CSV import script

Some simplifications were allowed, e.g. using built-in exceptions, just for the 
sake of time, only so much work can be done in 4h. 

## Installation
PHP 8 is required. 
```bash
composer intall
```

## Usage
```bash
php main.php import <file>
```
Example: 
```bash
php main.php import input.csv
```

## Running tests
```bash
./vendor/bin/codecept run
```
If the above fails (e.g. using wrong PHP version), then:
```bash
php ./vendor/codeception/codeception/codecept run
```
