# Aegis Utilities

This package provides a collection of utility classes designed to streamline development in a WordPress environment. These utilities offer helper methods for common tasks such as array and string manipulation, path resolution, and interacting with WordPress-specific features like block patterns and `theme.json` data.

## Installation

```bash
composer require aegis/utilities
```

## Features

The library is organized into the following utility classes:

- **`Arr`**: Provides helper methods for array manipulation, such as checking if an array contains any of a given set of values and recursively converting array keys to camel case.

- **`Block`**: A utility class for handling WordPress block-related operations, including searching for blocks of a specific type and generating HTML from block data.

- **`Color`**: Provides helpers for color palettes, shade scales, and system color keywords.

- **`Data`**, **`DataAwareInterface`**, **`DataTrait`**: A set of classes for creating a unified data object for WordPress plugins and themes, allowing easy access to metadata like name, version, and author.

- **`Debug`**: A simple utility for logging data to the browser console, which is only active when a WordPress debug constant is enabled.

- **`I18n`**: Handles internationalization by loading the text domain for a plugin or theme.

- **`JSON`**: Provides methods for processing and flattening nested setting arrays, similar to how WordPress core handles `theme.json` data.

- **`Path`**: A utility for resolving file and URL paths within a WordPress project structure.

- **`Pattern`**: A powerful utility for parsing and registering block patterns from PHP files with header comments.

- **`Str`**: Offers a wide range of string manipulation methods, including searching, replacement, case conversion, and sanitization.

## Usage

### PHP

Requiring Composer's autoloader will make the utilities available in your project:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

Example:

```php
use Aegis\Utilities\Str;

$kebab = 'hello-world';
$camel = Str::to_camel_case( $kebab ); // 'helloWorld'
```
