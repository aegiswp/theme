# Aegis DOM

A DOM manipulation library for PHP, designed for the Aegis Framework.

## Installation

```bash
composer require aegis/dom
```

## Usage

First, require Composer's autoloader:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

Then, you can use the library's classes.

### DOM Class

The `DOM` class provides utilities for creating, parsing, and manipulating `DOMDocument` objects.

**Example: Modifying HTML**

```php
use Aegis\Dom\DOM;

$html = '<h1>Hello, World!</h1>';

// Create a DOMDocument from an HTML string
$dom = DOM::create( $html );

// Get the h1 element
$h1 = DOM::get_element( 'h1', $dom );

if ( $h1 ) {
    // Add a class to the h1 element
    DOM::add_classes( $h1, ['heading', 'main-title'] );

    // Add inline styles
    DOM::add_styles( $h1, ['color' => 'blue', 'font-size' => '24px'] );
}

// To get the modified HTML, you need to save it from the document element
echo $dom->saveHTML();
```

### CSS Class

The `CSS` class provides helpers for working with CSS rules.

**Example: Converting CSS arrays to strings**

```php
use Aegis\Dom\CSS;

$styles = [
    'color'      => 'red',
    'font-size'  => '16px',
    'background' => '#eee',
];

$css_string = CSS::array_to_string( $styles );

// Output: color:red;font-size:16px;background:#eee;
echo $css_string;
```

**Example: Converting CSS strings to arrays**

```php
use Aegis\Dom\CSS;

$css_string = 'color:blue; font-weight:bold;';

$styles_array = CSS::string_to_array( $css_string );

// Output:
// [
//   'color' => 'blue',
//   'font-weight' => 'bold',
// ]
print_r( $styles_array );
```

### JS Class

The `JS` class helps format inline JavaScript.

**Example: Formatting inline JS**

```php
use Aegis\Dom\JS;

$inline_js = '  alert( "Hello World" );  ';

$formatted_js = JS::format_inline_js( $inline_js );

// Output: alert( 'Hello World' )
echo $formatted_js;
```

## Contributing

Contributions are welcome! Please submit a pull request or create an issue on the [GitHub repository](https://github.com/aegiswp/aegis).
