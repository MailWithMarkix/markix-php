# Markix PHP Client

The Markix PHP package provides convenient access to the Markix API from
applications written in the PHP language.

## Requirements

PHP 8.1 and later.

## Composer

You can install the package via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require markix/markix-php
```

To use the package, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

## Dependencies

The package require the following extensions in order to work properly:

-   [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
-   [`json`](https://secure.php.net/manual/en/book.json.php)
-   [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Getting Started

Simple usage looks like:

```php
$markix = new \Markix\MarkixClient('test_xyz...');
$msg = $markix->messages->send([
    'from' => ['email' => 'john@example.com'],
    'to' => [['email' => 'joanna@example.com']],
    'subject' => 'Hello, World!',
    'text_body' => 'It works!'
]);
echo $message['id'];
```

## Documentation

Check out our [Developer Documentation](http://www.markix.com/docs) for detailed documentation on how to integrate Markix with your application.

## Support

New features and bug fixes are released on the latest major version of the Markix PHP package. If you are on an older major version, we recommend that you upgrade to the latest in order to use the new features and bug fixes including those for security vulnerabilities. Older major versions of the package will continue to be available for use, but will not be receiving any updates.
