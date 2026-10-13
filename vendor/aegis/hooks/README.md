# Aegis Hooks

A simple yet powerful library to handle WordPress hooks automatically using method annotations.

Based on Hook Annotations by Viktor Szépe - [https://github.com/szepeviktor/SentencePress](https://github.com/szepeviktor/SentencePress)

## Installation

```bash
composer require aegis/hooks
```

## Usage

This library is designed to reduce the boilerplate code required when working with WordPress actions and filters. Instead of manually calling `add_action` or `add_filter`, you can simply annotate your class methods.

### 1. The `Hookable` Interface and `HookAnnotations` Trait

To make a class's methods hookable, you should implement the `Hookable` interface and use the `HookAnnotations` trait.

```php
use Aegis\Hooks\Hookable;
use Aegis\Hooks\HookAnnotations;

class MyPlugin implements Hookable {
    use HookAnnotations;

    public function __construct() {
        // Call this method to register all annotated hooks.
        $this->hook_annotations();
    }

    /**
     * Enqueue scripts.
     *
     * @hook wp_enqueue_scripts 12
     */
    public function enqueue_scripts() {
        wp_enqueue_script( 'my-script', 'path/to/my-script.js', [], null, true );
    }

    /**
     * Modify the content.
     *
     * @hook the_content
     */
    public function modify_content( $content ) {
        return $content . '<p>Appended by my plugin!</p>';
    }
}

// Initialize your class
new MyPlugin();
```

### 2. Standalone Usage with the `Hook` Class

If you prefer not to modify your class structure, you can use the static `Hook::annotations()` method directly.

```php
use Aegis\Hooks\Hook;

class MyOtherPlugin {
    /**
     * Add a custom body class.
     *
     * @hook body_class
     */
    public static function add_body_class( $classes ) {
        $classes[] = 'my-custom-class';
        return $classes;
    }
}

// Register hooks for the class
Hook::annotations( MyOtherPlugin::class );

// Or for an object instance
$instance = new MyOtherPlugin();
Hook::annotations( $instance );
```

### Annotation Syntax

The annotation format is simple:

`@hook <tag> [priority]`

-   `@hook`: The required keyword.
-   `<tag>`: The name of the WordPress action or filter (e.g., `init`, `the_title`).
-   `[priority]`: (Optional) The hook priority. Defaults to `10`.

The number of arguments for the hook callback is determined automatically.

## Contributing

Contributions are welcome! Please submit a pull request or create an issue on the [GitHub repository](https://github.com/aegiswp/hooks).
