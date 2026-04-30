# WPAudit

A standalone PHP package for auditing WordPress themes against best practices in performance, SEO, accessibility, security, and scalability.

## Requirements

- PHP >= 7.4
- Composer

## Installation

```bash
composer install
```

## Usage

### Configuration

Create a `.wpauditrc.json` in your project root. See `config/.wpauditrc.example.json` for a full example, or use the JSON schema at `config/.wpauditrc.schema.json` for IDE autocompletion.

```json
{
  "version": "1.0",
  "categories": {
    "performance": { "enabled": true },
    "seo": { "enabled": true },
    "accessibility": { "enabled": true },
    "security": { "enabled": true },
    "scalability": { "enabled": true }
  },
  "thresholds": {
    "complexity": 10,
    "functionLength": 50,
    "minContrastRatio": 4.5
  }
}
```

### Programmatic API

```php
use WPAudit\ConfigurationManager;
use WPAudit\Models\ThemeMetadata;
use WPAudit\Models\FileRegistry;
use WPAudit\Models\AuditContext;
use WPAudit\Analyzers\PerformanceAnalyzer;
use WPAudit\Analyzers\SEOAnalyzer;
use WPAudit\Analyzers\AccessibilityAnalyzer;

// Load configuration.
$config_manager = new ConfigurationManager();
$config = $config_manager->load( '/path/to/theme' );

// Build context.
$theme    = ThemeMetadata::from_directory( '/path/to/theme' );
$registry = new FileRegistry();
$context  = new AuditContext( $config, $theme, $registry );

// Run analyzers.
$analyzers = [
    new PerformanceAnalyzer(),
    new SEOAnalyzer(),
    new AccessibilityAnalyzer(),
];

foreach ( $registry->get_all() as $file ) {
    foreach ( $analyzers as $analyzer ) {
        if ( $analyzer->can_analyze( $file ) ) {
            $findings = $analyzer->analyze( $file, $context );
        }
    }
}
```

## Rule Catalog

### Performance (`perf-*`)

| Rule | Description | Severity |
|------|-------------|----------|
| `perf-001` | Missing lazy loading on images | High |
| `perf-002` | Scripts without defer/async attributes | Medium |
| `perf-003` | Inline critical CSS missing | Medium |
| `perf-004` | Unoptimized database queries (missing caching) | High |
| `perf-005` | Large uncompressed assets (>100KB) | Medium |
| `perf-006` | Missing resource hints (preload, prefetch) | Low |

### SEO (`seo-*`)

| Rule | Description | Severity |
|------|-------------|----------|
| `seo-001` | Improper heading hierarchy (skipped levels) | Medium |
| `seo-002` | Missing or duplicate title tag | High |
| `seo-003` | Missing meta description | High |
| `seo-004` | Missing Open Graph meta tags | Medium |
| `seo-005` | Invalid or missing Schema.org markup | Low |
| `seo-006` | Missing canonical URL tag | Medium |
| `seo-007` | Images without alt attributes (SEO impact) | Medium |

### Accessibility (`a11y-*`)

| Rule | Description | Severity |
|------|-------------|----------|
| `a11y-001` | Insufficient color contrast (< 4.5:1) | High |
| `a11y-002` | Missing ARIA labels on interactive elements | High |
| `a11y-003` | Form inputs without associated labels | High |
| `a11y-004` | Missing alt text on images | High |
| `a11y-005` | Focus indicators missing or insufficient | Medium |
| `a11y-006` | Keyboard navigation not supported | High |
| `a11y-007` | Missing skip links | Medium |
| `a11y-008` | Media without captions/transcripts | High |

## Configuration Options

| Key | Type | Default | Description |
|-----|------|---------|-------------|
| `version` | string | `"1.0"` | Configuration version |
| `categories.<name>.enabled` | bool | `true` | Enable/disable a category |
| `categories.<name>.rules.<id>.enabled` | bool | `true` | Enable/disable a rule |
| `categories.<name>.rules.<id>.severity` | string | — | Override rule severity |
| `thresholds.complexity` | int | `10` | Max cyclomatic complexity |
| `thresholds.functionLength` | int | `50` | Max function length (lines) |
| `thresholds.minContrastRatio` | number | `4.5` | Min WCAG AA contrast ratio |
| `exclusions.files` | string[] | `["vendor/*", "node_modules/*"]` | File glob patterns to skip |
| `exclusions.directories` | string[] | `["tests/"]` | Directories to skip |
| `exclusions.rules` | string[] | `[]` | Rule IDs to disable globally |
| `autofix.enabled` | bool | `false` | Enable automatic fixing |
| `autofix.confidence` | string | `"safe"` | Min confidence: safe, moderate, risky |
| `autofix.backup` | bool | `true` | Create backups before fixing |
| `output.format` | string | `"console"` | Output: json, html, markdown, console |
| `output.destination` | string | `"./audit-report.html"` | Output file path |
| `output.verbose` | bool | `false` | Verbose output |

## Testing

```bash
composer test
```

## Development

```bash
composer test           # Run unit tests
composer test:coverage  # Run tests with HTML coverage report
composer lint           # Check code style (requires phpcs)
composer analyze        # Static analysis (requires phpstan)
```

## Architecture

```
src/
├── Analyzers/          # IAnalyzer implementations
│   ├── AccessibilityAnalyzer.php
│   ├── PerformanceAnalyzer.php
│   └── SEOAnalyzer.php
├── Enums/              # Value enumerations
│   ├── FileType.php
│   ├── FixConfidence.php
│   └── Severity.php
├── Interfaces/         # Contracts
│   └── IAnalyzer.php
├── Models/             # Data models
│   ├── AuditContext.php
│   ├── AuditMetadata.php
│   ├── AuditResult.php
│   ├── Configuration.php
│   ├── FileRegistry.php
│   ├── Finding.php
│   ├── Fix.php
│   ├── Location.php
│   ├── ThemeFile.php
│   └── ThemeMetadata.php
├── Traits/             # Shared behavior
│   └── GeneratesFindingId.php
├── Utils/              # Utility classes
│   └── ArrayUtils.php
└── ConfigurationManager.php
```

## License

GPL-2.0-or-later
