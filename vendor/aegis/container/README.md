# Aegis Container

A simple, lightweight, and PSR-11 compliant dependency injection container with auto-wiring capabilities, designed for modern WordPress plugins and themes.

## Features

- **PSR-11 Compliant**: Interoperable with other frameworks and libraries that adhere to container-interop standards.
- **Auto-Wiring**: Automatically resolves and injects class dependencies, so you do not have to manually configure them.
- **Conditional Loading**: Includes a `Conditional` interface to allow services to be loaded only when specific conditions are met.
- **Modular Registration**: Use the `Registerable` interface to create self-contained service providers that handle their own setup logic.
- **Singleton Management**: The `ContainerFactory` ensures that container instances are treated as singletons, preventing duplicate instantiations.

## Installation

Install the package via Composer:

```bash
composer require aegis/container
```

## Usage

### Creating a Container

It is recommended to use the `ContainerFactory` to create or retrieve a singleton instance of the container. This ensures you always work with the same container instance throughout your application.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Aegis\Container\ContainerFactory;

// Get a singleton instance of the container
$container = ContainerFactory::create( 'my-app-container' );
```

### Basic Dependency Resolution

The container can automatically instantiate classes and resolve their dependencies.

```php
// Given these classes:
class Mailer {
    public function send() { /* ... */ }
}

class UserManager {
    private $mailer;

    public function __construct( Mailer $mailer ) {
        $this->mailer = $mailer;
    }

    public function register() {
        // ...
        $this->mailer->send();
    }
}

// The container will automatically inject the Mailer instance into UserManager
$userManager = $container->make( UserManager::class );
$userManager->register();
```

### Using Service Providers

For better organization, you can create service providers that implement the `Registerable` interface. This allows you to encapsulate service registration logic.

**1. Create a Service Provider:**

```php
use Aegis\Container\Container;
use Aegis\Container\Interfaces\Registerable;

class MyServiceProvider implements Registerable {
    public function register( Container $container ): void {
        // You can bind interfaces to concrete implementations or perform other setup
        $container->make( UserManager::class );
    }
}
```

**2. Register the Service Provider:**

```php
$serviceProviders = [
    MyServiceProvider::class,
    // ... other providers
];

foreach ( $serviceProviders as $serviceProvider ) {
    $instance = $container->make( $serviceProvider );

    if ( $instance instanceof Registerable ) {
        $instance->register( $container );
    }
}
```

### Conditional Loading

If a service should only be loaded when a certain condition is met (e.g., on a specific admin page), you can implement the `Conditional` interface.

```php
use Aegis\Container\Interfaces\Conditional;

class AdminOnlyService implements Conditional {
    public static function condition(): bool {
        // Only load this service in the WordPress admin area
        return is_admin();
    }

    public function __construct() {
        // ...
    }
}

// The container will check `condition()` before instantiating.
// If it returns false, `make()` will return null.
$adminService = $container->make( AdminOnlyService::class );

if ( $adminService ) {
    // Service was loaded
}
```
