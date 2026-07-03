# Architecture

This page documents the technical architecture of the Aegis theme, including the PHP class structure, autoloading strategy, bootstrap flow, and service organization.

## Overview

Aegis uses a modern PHP architecture with:

- **PSR-4 autoloading** via Composer.
- **Namespace:** `Aegis\`
- **Service-based architecture** with lazy instantiation.
- **WordPress hooks** for lifecycle management.
- **Dependency injection** through constructor parameters.

## Namespace Structure

All PHP classes reside under the `Aegis\` namespace, mapped to the `inc/` directory:

```
inc/
├── Aegis.php                    # Main bootstrap class
├── Assets/
│   ├── AssetLoader.php          # Conditional asset enqueueing
│   ├── FontLoader.php           # Font registration and loading
│   └── ScriptLoader.php         # JavaScript loading strategy
├── Blocks/
│   ├── BlockRegistrar.php       # Block registration
│   ├── BlockStyles.php          # Block style registration
│   └── BlockVariations.php      # Block variation registration
├── Patterns/
│   └── PatternRegistrar.php     # Pattern registration
├── Templates/
│   └── TemplateLoader.php       # Template resolution
├── Features/
│   ├── Analytics.php            # Analytics framework
│   ├── ConditionalLogic.php     # Block visibility conditions
│   ├── DarkMode.php             # Dark mode handling
│   └── HookPatterns.php         # Dynamic content injection
├── Integrations/
│   ├── WooCommerce.php          # WooCommerce compatibility
│   └── PluginCompat.php         # Third-party plugin styles
├── Support/
│   ├── ThemeSupport.php         # add_theme_support declarations
│   └── EditorSupport.php        # Editor-specific features
└── Utilities/
    └── Helpers.php              # Utility functions
```

## PSR-4 Autoloading

The Composer autoloader maps the `Aegis\` namespace to the `inc/` directory:

```json
{
    "autoload": {
        "psr-4": {
            "Aegis\\": "inc/"
        }
    }
}
```

This means:

| Class | File Path |
|-------|-----------|
| `Aegis\Aegis` | `inc/Aegis.php` |
| `Aegis\Assets\AssetLoader` | `inc/Assets/AssetLoader.php` |
| `Aegis\Blocks\BlockRegistrar` | `inc/Blocks/BlockRegistrar.php` |
| `Aegis\Features\Analytics` | `inc/Features/Analytics.php` |

## Bootstrap Flow

The theme initializes through the following sequence:

### 1. functions.php

The `functions.php` file is minimal — it loads the Composer autoloader and boots the main class:

```php
<?php
/**
 * Aegis Theme Functions
 */

// Load Composer autoloader.
require_once get_template_directory() . '/vendor/autoload.php';

// Boot the theme.
Aegis\Aegis::instance()->boot();
```

### 2. Aegis Main Class

The `Aegis` class follows the singleton pattern and orchestrates service initialization:

```php
<?php

namespace Aegis;

class Aegis {
    private static ?self $instance = null;

    public static function instance(): self {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function boot(): void {
        $this->register_services();
    }

    private function register_services(): void {
        // Register each service
    }
}
```

### 3. Service Registration

Services are registered in a defined order:

1. **Theme Support** — Declares theme features (`add_theme_support()`).
2. **Asset Loader** — Registers and conditionally enqueues styles and scripts.
3. **Block Registrar** — Registers custom blocks.
4. **Block Styles** — Registers additional block styles.
5. **Block Variations** — Registers block variations.
6. **Pattern Registrar** — Registers block patterns.
7. **Features** — Initializes optional features (analytics, conditions, dark mode).
8. **Integrations** — Loads plugin compatibility layers (only when plugins are active).

### 4. Hook Attachment

Each service attaches to appropriate WordPress hooks:

| Hook | Timing | Services |
|------|--------|----------|
| `after_setup_theme` | Early | ThemeSupport, EditorSupport |
| `init` | Standard | BlockRegistrar, BlockStyles, BlockVariations |
| `wp_enqueue_scripts` | Frontend | AssetLoader, FontLoader |
| `enqueue_block_editor_assets` | Editor | ScriptLoader |
| `plugins_loaded` | After plugins | Integrations |

## Service Classes

Each service class follows a consistent pattern:

```php
<?php

namespace Aegis\Assets;

class AssetLoader {
    public function __construct() {
        // Store configuration
    }

    public function register(): void {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    public function enqueue_styles(): void {
        // Conditional style loading logic
    }

    public function enqueue_scripts(): void {
        // Conditional script loading logic
    }
}
```

### Service Responsibilities

| Service | Responsibility |
|---------|----------------|
| `AssetLoader` | Detects blocks on page, enqueues only needed CSS/JS |
| `FontLoader` | Registers font faces, handles conditional font loading |
| `BlockRegistrar` | Registers all custom blocks from `block.json` metadata |
| `BlockStyles` | Registers additional styles for core and custom blocks |
| `BlockVariations` | Registers block variations via JavaScript |
| `PatternRegistrar` | Auto-registers patterns from the `patterns/` directory |
| `Analytics` | Outputs analytics scripts based on configuration |
| `ConditionalLogic` | Evaluates conditions and filters block output |
| `DarkMode` | Handles dark mode class and preference detection |
| `WooCommerce` | Loads WooCommerce compatibility when plugin is active |

## Conditional Asset Loading (Detail)

The `AssetLoader` service implements the zero-base loading strategy:

1. During `wp_enqueue_scripts`, it parses the current post/template content.
2. It extracts all block names present in the content.
3. For each detected block, it enqueues the registered style handle.
4. Scripts follow the same logic.

```php
public function enqueue_styles(): void {
    $blocks = $this->get_rendered_blocks();

    foreach ( $blocks as $block_name ) {
        if ( wp_style_is( "aegis-{$block_name}", 'registered' ) ) {
            wp_enqueue_style( "aegis-{$block_name}" );
        }
    }
}
```

## Integration Loading

Plugin integrations load conditionally:

```php
private function load_integrations(): void {
    if ( class_exists( 'WooCommerce' ) ) {
        ( new Integrations\WooCommerce() )->register();
    }

    if ( defined( 'RANK_MATH_VERSION' ) ) {
        ( new Integrations\RankMath() )->register();
    }
}
```

This ensures no integration code runs unless the target plugin is active.

## File Organization Principles

| Principle | Implementation |
|-----------|----------------|
| Single Responsibility | Each class does one thing |
| Dependency Injection | Services receive dependencies via constructor |
| Lazy Loading | Services initialize only when their hooks fire |
| Convention over Configuration | Patterns auto-register from directory, blocks from block.json |
| Separation of Concerns | PHP handles logic, JSON handles configuration, HTML handles templates |

## Theme.json as Configuration

`theme.json` serves as the central design configuration:

- Colors, typography, spacing, shadows, and gradients defined once.
- WordPress generates CSS custom properties from these definitions.
- PHP code references tokens, not hardcoded values.
- Style variations override specific portions of the configuration.

## Block Architecture

Custom blocks follow the WordPress block metadata standard:

```
blocks/countdown/
├── block.json       # Metadata, attributes, supports
├── index.js         # Registration entry point
├── edit.js          # Editor component (React)
├── save.js          # Serialized output (or null for dynamic)
├── render.php       # Server-side render (dynamic blocks)
├── view.js          # Frontend interactivity (optional)
└── style.css        # Frontend styles
```

The `block.json` file declares everything WordPress needs:

```json
{
    "$schema": "https://schemas.wp.org/trunk/block.json",
    "apiVersion": 3,
    "name": "aegis/countdown",
    "title": "Countdown",
    "category": "widgets",
    "textdomain": "aegis",
    "editorScript": "file:./index.js",
    "style": "file:./style.css",
    "viewScript": "file:./view.js",
    "render": "file:./render.php"
}
```

## Next Steps

- [[file-structure]] — Complete file tree and directory purposes.
- [[hooks-and-filters]] — All hooks provided by the theme.
- [[building-assets]] — The build process and output.
- [[development-setup]] — Setting up the development environment.
