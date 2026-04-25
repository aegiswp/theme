# Aegis Theme Development Instructions

This document provides comprehensive instructions for setting up, developing, building, testing, and deploying the Aegis WordPress theme.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Project Setup](#project-setup)
- [Development Environment](#development-environment)
- [Building Assets](#building-assets)
- [Code Quality](#code-quality)
- [Testing](#testing)
- [Contributing](#contributing)
- [Deployment](#deployment)
- [Troubleshooting](#troubleshooting)

## Prerequisites

Before starting development, ensure you have the following installed:

- **WordPress**: 6.6+ (tested up to 6.9)
- **PHP**: 8.1+ with Composer
- **Node.js**: 20+ (see `.nvmrc` for exact version)
- **npm**: 9+
- **Git**: For version control
- **Docker**: For wp-env (recommended for local development)

### Optional Tools

- **Docker Desktop**: For wp-env local WordPress environment
- **Local by Flywheel** or **DevKinsta**: Alternative local WordPress stacks

## Project Setup

### 1. Clone the Repository

```bash
git clone https://github.com/aegiswp/theme.git
cd theme
```

### 2. Install Dependencies

#### Node.js Dependencies
```bash
npm install
```

#### PHP Dependencies
```bash
composer install
```

> **Note**: Run `composer update` only when you intend to change dependency versions. Use `composer install` for existing projects.

### 3. Build Initial Assets

```bash
npm run build
```

This compiles all JavaScript, CSS, and block assets.

## Development Environment

### Using wp-env (Recommended)

wp-env provides a local WordPress environment using Docker.

#### Start the Environment
```bash
npm run env:start
```

#### Install WordPress
```bash
npm run env:install
```

This sets up WordPress with:
- URL: http://localhost:8888
- Admin username: `admin`
- Admin password: `password`

#### Access the Site
- Frontend: http://localhost:8888
- Admin: http://localhost:8888/wp-admin

#### Development Workflow
```bash
# Start asset watcher for development
npm run dev

# In another terminal, start wp-env if not already running
npm run env:start
```

#### wp-env Commands
```bash
npm run env:start      # Start containers
npm run env:stop       # Stop containers
npm run env:restart    # Restart containers
npm run env:clean      # Clean all data (destructive)
npm run env:cli -- <command>  # Run WP-CLI commands
```

### Alternative Local Stacks

If you prefer other local development tools:

1. Place/symlink the theme in `wp-content/themes/aegis`
2. Run `composer install` and `npm install && npm run build`
3. Activate the Aegis theme in WordPress admin

## Building Assets

### Production Build
```bash
npm run build
```

### Development Build
```bash
npm run build:dev  # Unminified output with readable source maps (--mode=development)
```

### Watch Mode
```bash
npm run dev
# or
npm run start
```

This watches for changes in `src/` and rebuilds automatically.

## Code Quality

### Linting

#### JavaScript
```bash
npm run lint:js
```

#### CSS
```bash
npm run lint:css
```

#### Package.json
```bash
npm run lint:pkg-json
```

#### Run All Linters
```bash
npm run lint
```

### PHP Code Standards

#### Check Standards
```bash
composer run standards:check
# or
composer run analyze
# or
composer run lint
```

#### Auto-fix Standards
```bash
composer run standards:fix
```

#### Check Specific File
```bash
composer run standards:check -- path/to/file.php
```

## Testing

### PHP Unit Tests
```bash
composer run test
# or
composer run test:php
# or
npm run test:php
```

### WPAudit Tests
```bash
composer run test:wpaudit
```

This runs the Aegis internal audit suite.

## Contributing

### Branch Strategy

- `main` - Production-ready code
- `dev` - Development integration branch
- `feature/*` - New features
- `bugfix/*` - Bug fixes
- `hotfix/*` - Critical production fixes

### Development Workflow

1. Create a feature branch from `dev`
2. Make changes
3. Run tests and linting
4. Submit pull request to `dev`
5. After review, merge to `main` for releases

### Code Standards

- Follow WordPress Coding Standards (WPCS)
- Use ESLint and stylelint configurations
- Write tests for new features
- Update documentation as needed

### Pull Request Guidelines

- Provide clear description of changes
- Reference related issues
- Ensure all tests pass
- Update CHANGELOG.md for user-facing changes

## Deployment

### Release Process

1. Update version in:
   - `style.css` (Version)
   - `package.json` (version)
   - `composer.json` (version)

2. Update CHANGELOG.md

3. Create release branch from `main`

4. Build production assets:
   ```bash
   npm run build
   ```

5. Generate translations:
   ```bash
   npm run translate
   ```

6. Test thoroughly

7. Tag release and merge to `main`

### Server Deployment

The theme requires the `vendor/` directory for PHP dependencies.

#### Option 1: Composer on Server
```bash
composer install --no-dev
```

#### Option 2: Pre-built Package
Build a release package with `vendor/` included, then deploy the zip file.

### Production Considerations

- Ensure PHP 8.1+ on server
- WordPress 6.6+ recommended
- For full functionality, may need Gutenberg plugin
- Test with target WordPress version

## Troubleshooting

### Common Issues

#### Composer SSL/Certificate Errors
Fix your system's CA bundle or PHP configuration. See [Composer documentation](https://getcomposer.org/local-issuer).

#### wp-env Port Conflicts
Set custom port in `.wp-env.json` or use `WP_ENV_PORT` environment variable.

#### Build Failures
- Clear node_modules: `rm -rf node_modules && npm install`
- Clear build cache: `npm run clean`

#### Theme Activation Issues
- Ensure all dependencies are installed
- Check PHP version compatibility
- Verify WordPress version

### Getting Help

- Check existing issues on GitHub
- Review documentation in README.md
- Contact maintainers via GitHub discussions

### Performance Tips

- Use `npm run build` for production assets
- Enable caching in development environment
- Monitor PHP error logs
- Use browser dev tools for frontend debugging

---

For more detailed information, see:
- [README.md](README.md) - Theme overview and features
- [CONTRIBUTING.md](CONTRIBUTING.md) - Detailed contributing guidelines
- [CHANGELOG.md](CHANGELOG.md) - Version history
