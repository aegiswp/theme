# Code Quality

Aegis enforces code quality through automated linting, formatting, and coding standards. This page documents the tools, configuration, and usage for maintaining code consistency.

## Tools Overview

| Tool | Language | Purpose |
|------|----------|---------|
| ESLint | JavaScript | Linting and static analysis |
| stylelint | CSS | CSS linting and standards |
| PHPCS | PHP | PHP coding standards enforcement |
| Prettier | JS/CSS/JSON | Code formatting (via @wordpress/scripts) |
| EditorConfig | All | Consistent editor settings |

## ESLint (JavaScript)

ESLint enforces the WordPress JavaScript coding standards with Aegis-specific rules.

### Running ESLint

```bash
# Lint all JavaScript files
npm run lint:js

# Lint with auto-fix
npm run lint:js -- --fix
```

### Configuration

ESLint uses the `@wordpress/eslint-plugin` configuration as its base:

```json
{
    "extends": ["plugin:@wordpress/eslint-plugin/recommended"],
    "rules": {
        // Aegis-specific overrides
    }
}
```

### Key Rules

| Rule | Enforcement |
|------|-------------|
| No unused variables | Error |
| No console.log in production | Warning |
| WordPress i18n usage | Required for user-facing strings |
| React hooks rules | Enforced for block editor components |
| Import order | Alphabetical, grouped by type |
| No var declarations | Must use const/let |

### Auto-Fixing

Many ESLint issues can be fixed automatically:

```bash
npm run lint:js -- --fix
```

Issues that require manual intervention will remain as errors in the output.

## stylelint (CSS)

stylelint enforces the WordPress CSS coding standards.

### Running stylelint

```bash
# Lint all CSS files
npm run lint:css

# Lint with auto-fix
npm run lint:css -- --fix
```

### Configuration

stylelint uses the `@wordpress/stylelint-config` as its base:

```json
{
    "extends": ["@wordpress/stylelint-config"],
    "rules": {
        // Aegis-specific overrides
    }
}
```

### Key Rules

| Rule | Enforcement |
|------|-------------|
| Property order | Grouped by type (position, display, box model, typography) |
| Color format | Hex values must be lowercase |
| No duplicate properties | Error |
| Selector specificity | Max specificity enforced |
| Custom property naming | Must follow theme token conventions |
| No !important | Warning (avoid unless necessary) |
| Unit usage | Prefer rem/em for typography, px for borders |

## PHPCS (PHP)

PHPCS enforces the WordPress PHP coding standards using the WordPress Coding Standards ruleset.

### Running PHPCS

```bash
# Check all PHP files
composer run lint:php

# Or directly
./vendor/bin/phpcs

# Auto-fix with PHPCBF
composer run fix:php

# Or directly
./vendor/bin/phpcbf
```

### Configuration

PHPCS is configured via `phpcs.xml.dist`:

```xml
<?xml version="1.0"?>
<ruleset name="Aegis Theme">
    <description>Coding standards for Aegis theme</description>

    <rule ref="WordPress"/>
    <rule ref="WordPress-Extra"/>
    <rule ref="WordPress-Docs"/>

    <config name="text_domain" value="aegis"/>
    <config name="minimum_wp_version" value="7.0"/>
    <config name="prefixes" value="aegis,Aegis"/>

    <file>./inc</file>
    <file>./functions.php</file>

    <exclude-pattern>/vendor/*</exclude-pattern>
    <exclude-pattern>/node_modules/*</exclude-pattern>
    <exclude-pattern>/build/*</exclude-pattern>
</ruleset>
```

### Key Standards

| Standard | Enforcement |
|----------|-------------|
| WordPress naming conventions | Functions: snake_case, Classes: PascalCase |
| Function prefixing | All functions prefixed with `aegis_` |
| Hook documentation | Inline documentation for all hooks |
| Escaping output | All output must be escaped |
| Sanitizing input | All input must be sanitized |
| Nonce verification | Required for form processing |
| Text domain | Must use `aegis` for all translatable strings |

## Running All Linters

To run all linting tools in a single command:

```bash
npm run lint
```

This runs ESLint, stylelint, and PHPCS in sequence.

## Pre-Commit Hooks

Linting runs automatically before each commit via Git hooks (configured with husky or similar):

1. Staged JavaScript files are checked with ESLint.
2. Staged CSS files are checked with stylelint.
3. Staged PHP files are checked with PHPCS.
4. If any linter reports errors, the commit is blocked.

## EditorConfig

The `.editorconfig` file ensures consistent formatting across editors:

```ini
root = true

[*]
charset = utf-8
end_of_line = lf
indent_style = tab
indent_size = 4
insert_final_newline = true
trim_trailing_whitespace = true

[*.{json,yml,yaml}]
indent_style = space
indent_size = 2

[*.md]
trim_trailing_whitespace = false
```

## IDE Integration

Most editors can run these tools automatically on save:

### VS Code Settings

```json
{
    "editor.formatOnSave": true,
    "eslint.validate": ["javascript", "javascriptreact"],
    "stylelint.validate": ["css"],
    "phpcs.enable": true
}
```

### Recommended VS Code Extensions

- ESLint — JavaScript linting in the editor.
- stylelint — CSS linting in the editor.
- PHP Sniffer & Beautifier — PHPCS integration.
- EditorConfig for VS Code — Applies .editorconfig settings.

## Ignoring Rules

When you need to suppress a linting rule (use sparingly):

### ESLint

```javascript
// eslint-disable-next-line no-console
console.log( 'Debug output' );
```

### stylelint

```css
/* stylelint-disable-next-line declaration-no-important */
color: red !important;
```

### PHPCS

```php
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo $already_escaped_html;
```

Always include a comment explaining why the rule is being suppressed.

## Continuous Integration

Linting runs as part of the CI/CD pipeline on every pull request. A PR cannot be merged if linting fails. See [[contributing]] for the full pull request workflow.

## Next Steps

- [[testing]] — Run unit and integration tests.
- [[contributing]] — Contribution guidelines and PR process.
- [[architecture]] — Code architecture and naming conventions.
- [[building-assets]] — Build process that uses linted source.
