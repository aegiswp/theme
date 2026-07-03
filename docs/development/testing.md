# Testing

Aegis uses a multi-layered testing approach covering unit tests, performance audits, and accessibility validation. This ensures code quality, performance targets, and accessibility compliance are maintained across releases.

## Testing Tools

| Tool | Type | Purpose |
|------|------|---------|
| PHPUnit | Unit/Integration | PHP logic testing |
| WPAudit | Performance | WordPress-specific performance audit |
| pa11y-ci | Accessibility | Automated WCAG compliance checking |

## PHPUnit

PHPUnit is used for unit and integration testing of the theme PHP codebase.

### Running PHPUnit

```bash
# Run all tests
composer run test

# Or directly
./vendor/bin/phpunit

# Run a specific test file
./vendor/bin/phpunit tests/unit/Test_Example.php

# Run a specific test method
./vendor/bin/phpunit --filter test_method_name

# Run with coverage report
./vendor/bin/phpunit --coverage-html coverage/
```

### Running with wp-env

PHPUnit can run inside the Docker environment for integration tests that require WordPress:

```bash
npx wp-env run tests-cli --env-cwd=wp-content/themes/aegis phpunit
```

### Configuration

PHPUnit is configured via `phpunit.xml.dist`:

```xml
<?xml version="1.0"?>
<phpunit
    bootstrap="tests/bootstrap.php"
    backupGlobals="false"
    colors="true"
>
    <testsuites>
        <testsuite name="unit">
            <directory suffix="Test.php">./tests/unit</directory>
        </testsuite>
        <testsuite name="integration">
            <directory suffix="Test.php">./tests/integration</directory>
        </testsuite>
    </testsuites>
    <coverage>
        <include>
            <directory suffix=".php">./inc</directory>
        </include>
    </coverage>
</phpunit>
```

### Test Structure

```
tests/
├── bootstrap.php          # Test initialization
├── unit/                  # Unit tests (no WordPress dependency)
│   ├── Test_Assets.php
│   ├── Test_Blocks.php
│   └── Test_Helpers.php
└── integration/           # Integration tests (requires WordPress)
    ├── Test_Templates.php
    ├── Test_Patterns.php
    └── Test_Hooks.php
```

### Writing Tests

Unit tests extend the base PHPUnit TestCase:

```php
<?php

namespace Aegis\Tests\Unit;

use PHPUnit\Framework\TestCase;

class Test_Example extends TestCase {

    public function test_something_returns_expected_value(): void {
        $result = some_function();
        $this->assertEquals( 'expected', $result );
    }
}
```

Integration tests extend the WordPress test case:

```php
<?php

namespace Aegis\Tests\Integration;

use WP_UnitTestCase;

class Test_Templates extends WP_UnitTestCase {

    public function test_all_templates_exist(): void {
        $templates = wp_get_theme()->get_page_templates();
        $this->assertNotEmpty( $templates );
    }
}
```

## WPAudit

WPAudit performs WordPress-specific performance auditing, checking for common performance issues and best practices.

### Running WPAudit

```bash
npm run audit
```

### What WPAudit Checks

| Category | Checks |
|----------|--------|
| Assets | Unused scripts, render-blocking resources, bundle sizes |
| Database | Excessive queries, slow queries, autoloaded options |
| Caching | Cache headers, object cache usage |
| Images | Missing dimensions, unoptimized sizes, lazy loading |
| Theme | Theme check standards, required files, best practices |

### Interpreting Results

WPAudit outputs a report with:

- **Pass** — The check meets performance standards.
- **Warning** — The check could be improved but is not critical.
- **Fail** — The check does not meet standards and should be fixed.

## pa11y-ci (Accessibility)

pa11y-ci runs automated accessibility tests against rendered pages, checking for WCAG 2.1 Level AA violations.

### Running pa11y

```bash
npm run test:a11y
```

### Prerequisites

The local development environment must be running:

```bash
npm run env:start
npm run test:a11y
```

### Configuration

pa11y-ci is configured via `.pa11yci` or `pa11y-ci.json`:

```json
{
    "defaults": {
        "standard": "WCAG2AA",
        "timeout": 30000,
        "wait": 1000
    },
    "urls": [
        "http://localhost:8888/",
        "http://localhost:8888/sample-page/",
        "http://localhost:8888/blog/",
        "http://localhost:8888/category/uncategorized/",
        "http://localhost:8888/?s=test"
    ]
}
```

### What pa11y Checks

| Category | Examples |
|----------|----------|
| Color contrast | Text against backgrounds |
| ARIA usage | Correct roles, states, properties |
| Form labels | Inputs with associated labels |
| Headings | Logical heading hierarchy |
| Images | Alt text presence |
| Links | Distinguishable link text |
| Landmarks | Proper page regions |
| Keyboard | Focus order and visibility |

### Handling False Positives

If pa11y reports an issue that is a false positive:

1. Verify the issue is genuinely a false positive by manual testing.
2. Add the specific rule to the ignore list in the configuration.
3. Document why the rule is ignored.

## Running All Tests

To run the complete test suite:

```bash
npm run test
```

This typically runs:

1. PHPUnit tests.
2. JavaScript tests (if any).
3. Linting checks.

For a comprehensive check including accessibility:

```bash
npm run test:a11y
npm run audit
```

## Continuous Integration

Tests run automatically on every pull request:

| Check | Trigger | Must Pass |
|-------|---------|-----------|
| PHPUnit | Every PR | Yes |
| ESLint | Every PR | Yes |
| stylelint | Every PR | Yes |
| PHPCS | Every PR | Yes |
| pa11y-ci | Every PR | Yes |
| WPAudit | Nightly / Release | Advisory |

PRs cannot be merged if any required check fails.

## Test Coverage

To generate a code coverage report:

```bash
./vendor/bin/phpunit --coverage-html coverage/
```

Open `coverage/index.html` in a browser to view the report.

Coverage targets:

| Area | Target |
|------|--------|
| Service classes | 80%+ |
| Utility functions | 90%+ |
| Block registration | 70%+ |
| Overall | 75%+ |

## Next Steps

- [[code-quality]] — Linting and coding standards.
- [[contributing]] — How tests fit into the contribution workflow.
- [[accessibility]] — What accessibility features are being tested.
- [[performance]] — Performance targets validated by WPAudit.
