# Laravel settings wrapper

This package allows you to manage settings in a database.

The settings are handled by groups and types of data (string, boolean, integer, double, array)

## Installation

### Laravel

This package can be used in Laravel 5.4 or higher.

You can install via composer:
```
composer require grooveland/helpers
```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in config/app.php file:
```
'providers' => [
    // ...
    \Grooveland\Helpers\HelperServiceProvider::class,
];
```

## Usage

this is a list of the default Helpers

### Array
```
/**
 * Transform an stdClass, object with toArray method
 * or simple var into array, the parameter is passed by reference
 *
 * @param &$data
 * @return void
 */
to_array(&$data)

```
### Objects
```
/**
 * Check if $value is a instance of Eloquent Collection
 *
 * @param any $value
 * @return bool
 */
is_collection($value)

/**
 * Transform an array, object with Object method
 * or simple var into stdClass, the parameter is passed by reference
 *
 * @param $data
 * @return void
 */
to_obj(&$data)
```

### Numbers
```
/**
 * Format number 
 *
 * @param $number
 * @param string $thousandSeparator
 * @param string $decimalPoint
 * @param int $decimals
 * @return string
 */
format_number($number, string $thousandSeparator = '.', string $decimalPoint = ',', int $decimals = 2)
```

### Strings
```
/**
 * Truncate a string by a max of chars, optionally can add HTML  entities, preserve tags and add ellipsis
 *
 * @param string $string
 * @param int $max
 * @param int $start
 * @param bool $addHtmlEntities
 * @param bool $cleanTags
 * @param bool $ellipsis
 * @return string
 */
str_truncate(string $string, int $max, int $start = 0, bool $addHtmlEntities = false, bool $cleanTags = true, bool $ellipsis = true) : string

/**
 * Replace the first coincidence in a string
 *
 * @param string $from
 * @param string $to
 * @param string $content
 * @return string
 */
function str_replace_first(string $from, string $to, string $content)
```


## Contributing
Comming soon.

### Security
If you discover any security-related issues, please email develop@thegrooveland.com instead of using the issue tracker.

## Credits
- [Alejandro de tovar](https://github.com/venespana)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.