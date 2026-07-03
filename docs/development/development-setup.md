# Development Setup

This page explains how to set up a local development environment for contributing to or customizing the Aegis theme.

## Prerequisites

Ensure the following tools are installed on your machine:

| Tool | Minimum Version | Purpose |
|------|-----------------|---------|
| Node.js | 20 or later | JavaScript build tools |
| npm | 9 or later | Package management |
| PHP | 8.1 or later | Theme runtime and testing |
| Composer | 2 or later | PHP dependency management |
| Git | Any recent version | Version control |
| Docker | Latest | WordPress local environment (wp-env) |

### Checking Installed Versions

```bash
node --version      # Should output v20.x or later
npm --version       # Should output 9.x or later
php --version       # Should output 8.1.x or later
composer --version  # Should output 2.x
git --version       # Any recent version
docker --version    # Latest stable
```

## Clone the Repository

```bash
git clone https://github.com/aegiswp/theme.git aegis
cd aegis
```

## Install Dependencies

### PHP Dependencies

```bash
composer install
```

This installs all PHP packages into the `vendor/` directory, including:

- PSR-4 autoloader configuration.
- Development tools (PHPUnit, PHPCS).
- Any required libraries.

### Node.js Dependencies

```bash
npm install
```

This installs all JavaScript packages into the `node_modules/` directory, including:

- `@wordpress/scripts` — Build toolchain.
- ESLint and stylelint — Code quality tools.
- Testing utilities.

### Node Version Management

The repository includes an `.nvmrc` file. If you use nvm:

```bash
nvm use
```

This switches to the correct Node.js version automatically.

## Local WordPress Environment

Aegis uses `wp-env` (powered by Docker) for local development. This provides a complete WordPress installation with zero manual configuration.

### Starting the Environment

```bash
npm run env:start
```

Or directly:

```bash
npx wp-env start
```

This starts:

- WordPress on **http://localhost:8888**
- WordPress admin at **http://localhost:8888/wp-admin/**
- MySQL database on port 3306 (internal to Docker)

### Default Credentials

| Field | Value |
|-------|-------|
| Admin URL | http://localhost:8888/wp-admin/ |
| Username | `admin` |
| Password | `password` |

### Stopping the Environment

```bash
npm run env:stop
```

Or:

```bash
npx wp-env stop
```

### Resetting the Environment

To start fresh with a clean WordPress installation:

```bash
npx wp-env clean all
```

### Environment Configuration

The `.wp-env.json` file configures the local environment:

```json
{
    "core": null,
    "phpVersion": "8.1",
    "plugins": [],
    "themes": ["."],
    "port": 8888,
    "config": {
        "WP_DEBUG": true,
        "WP_DEBUG_LOG": true,
        "SCRIPT_DEBUG": true
    }
}
```

## Building Assets

After installing dependencies, build the theme assets:

```bash
npm run build
```

For development with file watching:

```bash
npm run dev
```

See [[building-assets]] for detailed build documentation.

## Directory Structure

After setup, your workspace should look like:

```
aegis/
├── .wp-env.json          # wp-env configuration
├── composer.json         # PHP dependencies
├── package.json          # Node.js dependencies
├── node_modules/         # Installed Node packages
├── vendor/               # Installed PHP packages
├── assets/               # Source files
│   ├── css/              # Source stylesheets
│   └── js/              # Source JavaScript
├── build/                # Compiled output
├── blocks/               # Custom block source
├── inc/                  # PHP includes
├── parts/                # Template parts
├── patterns/             # Block patterns
├── styles/               # Style variations
├── templates/            # Page templates
└── theme.json            # Theme configuration
```

## Development Workflow

A typical development session:

1. **Start the environment:** `npm run env:start`
2. **Start the watcher:** `npm run dev`
3. **Open the site:** http://localhost:8888
4. **Make changes** to source files.
5. **View changes** in the browser (auto-refreshed by the watcher).
6. **Run tests** before committing: `npm run test`
7. **Commit changes** using conventional commit messages.

## IDE Configuration

### VS Code

Recommended extensions:

- PHP Intelephense — PHP language support.
- ESLint — JavaScript linting.
- Stylelint — CSS linting.
- WordPress Snippets — WordPress function completion.
- EditorConfig — Consistent formatting.

### PhpStorm

- Configure the PHP interpreter to use 8.1+.
- Set the WordPress source as an include path for autocompletion.
- Configure PHPCS with the WordPress coding standards.

## Companion Plugins (Optional)

To develop with the full Aegis ecosystem:

```bash
# Clone the free plugin
cd ../../../plugins/
git clone https://github.com/aegiswp/plugin.git aegis

# Clone Pro (requires access)
git clone https://github.com/aegiswp/pro.git aegis-pro
```

Then add them to `.wp-env.json`:

```json
{
    "plugins": [
        "../../../plugins/aegis",
        "../../../plugins/aegis-pro"
    ]
}
```

## Troubleshooting

### Docker Not Running

Ensure Docker Desktop is running before starting wp-env.

### Port 8888 Already in Use

Stop any other service using port 8888, or change the port in `.wp-env.json`.

### Permission Issues

On Linux/macOS, you may need to run Docker commands with appropriate permissions.

### Node.js Version Mismatch

Use `nvm use` to switch to the correct version specified in `.nvmrc`.

## Next Steps

- [[building-assets]] — Learn about the build process.
- [[code-quality]] — Set up linting and formatting.
- [[testing]] — Run the test suite.
- [[contributing]] — Contribution guidelines.
