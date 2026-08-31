# Testing

Aegis uses a multi-layered testing approach covering unit tests, performance audits, and accessibility validation. This ensures code quality, performance targets, and accessibility compliance are maintained across releases.

## Testing Tools

| Tool | Type | Purpose |
|------|------|---------|
| PHPUnit | Unit/Integration | PHP logic testing |
| WPAudit | Performance | WordPress-specific performance audit |
| pa11y-ci | Accessibility | Automated WCAG compliance checking |

## PHPUnit

PHPUnit coverage is the **WPAudit** suite in `tools/wpaudit/`. CI runs the same command. There is no separate `tests/Unit` tree in this theme.

### Running PHPUnit

```bash
# Same as CI
composer test:wpaudit

# Or from the package directory
composer install --working-dir=tools/wpaudit
composer test --working-dir=tools/wpaudit
composer test:coverage --working-dir=tools/wpaudit
```

### Configuration

PHPUnit is configured in `tools/wpaudit/phpunit.xml` (PHPUnit 10.5, bootstrap `vendor/autoload.php`).

### Test Structure

```
tools/wpaudit/
├── phpunit.xml
├── src/                   # Analyzers, models, configuration
└── tests/Unit/            # PHPUnit tests (WPAudit\Tests\)
```

### Writing Tests

Add cases under `tools/wpaudit/tests/Unit/` in the `WPAudit\Tests\` namespace. See existing analyzer and model tests in that tree.

## WPAudit

WPAudit is the PHPUnit package in `tools/wpaudit/`. It analyzes theme files for performance, SEO, and accessibility findings. Run it with `composer test:wpaudit`. Rule IDs and configuration are documented in `tools/wpaudit/README.md`.

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

## WordPress 7.1 Compatibility Checklist

Run this matrix before raising `Tested up to` to 7.1. Do **not** remove Aegis breakpoints; they complement Core responsive style states (see [[enhanced-core-blocks#core-responsive-states-and-aegis-breakpoints]]).

| Check | How |
|-------|-----|
| Core responsive style states | Edit Group/Columns/Image/Heading/Button with viewport styles; confirm front-end CSS |
| Aegis Display / visibility | Toggle hide-on-mobile, display/order/width; confirm Landscape/Tablet buttons still work |
| Iframed editor | Post Editor + Site Editor: Global Styles, overlays, icons, Aegis inspector panels |
| React 19 experiment | Enable Gutenberg `gutenberg-react-19`; open theme blocks and companion plugin admin/editor UIs; watch console |
| Regression baseline | Spot-check the same flows on WordPress 7.0 |

Static scan (theme + Aegis plugin sources): no `__next40pxDefaultSize` or `useResizeCanvas` usage found. Vendored map libraries in Aegis Pro may still reference legacy React APIs — retest those screens under the React 19 experiment and update upstream packages when available.

## Next Steps

- [[code-quality]] — Linting and coding standards.
- [[contributing]] — How tests fit into the contribution workflow.
- [[accessibility]] — What accessibility features are being tested.
- [[performance]] — Performance targets validated by WPAudit.
