# Contributing to Aegis

Thank you for your interest in contributing to the Aegis theme. This document provides guidelines for contributing to the Aegis WordPress theme project.

## Development Setup

1. Clone the repository:
```bash
git clone https://github.com/aegiswp/theme.git
cd theme
```

2. Install Node.js dependencies:
```bash
npm install
```

3. Install PHP dependencies:
```bash
composer install
```

4. Start the development environment:
```bash
npm run env:start
npm run env:install
```

5. Build theme assets:
```bash
npm run build
```

6. Start the file watcher for development:
```bash
npm run dev
```

## Development Workflow

### Branch Strategy

- `main` - Production-ready code
- `develop` - Development branch for integration  
- `feature/*` - Feature branches
- `bugfix/*` - Bug fix branches
- `hotfix/*` - Critical fixes for production

### Making Changes

1. Create a new branch from `develop`:
```bash
git checkout develop
git pull origin develop
git checkout -b feature/your-feature-name
```

2. Make your changes following the coding standards

3. Run tests and code quality checks:
```bash
npm run lint:css
composer run lint
composer run standards:check
```

4. Build assets if you modified any block source files:
```bash
npm run build
```

5. Commit your changes with descriptive messages:
```bash
git commit -m "feat: add new custom block for countdown timer"
```

6. Push your branch and create a pull request

## Coding Standards

### PHP

- Follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- Use PHP 7.4+ features where appropriate
- All code must pass PHPCS checks: `composer run lint`
- Document all public methods with PHPDoc blocks
- Use strict types: `declare( strict_types=1 );`
- Use proper namespacing: `namespace Aegis\Namespace;`

### JavaScript/TypeScript

- Follow modern JavaScript/TypeScript best practices
- Use ES6+ features where appropriate
- All blocks should be written in TypeScript (.tsx files)
- Use proper imports and exports
- Document complex functions with JSDoc comments

### CSS

- Follow [WordPress CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/)
- Use CSS custom properties (CSS variables) for theming
- Organize styles with proper specificity hierarchy
- Use logical properties for RTL support
- Test with reduced motion and high contrast modes

### Block Development

When creating custom blocks:

1. Follow the Aegis block structure:
   ```
   src/Blocks/block-name/
   ├── index.tsx
   ├── edit.tsx
   ├── save.tsx
   ├── view.ts
   ├── style.scss
   └── block.json
   ```

2. Use the Aegis Framework patterns and utilities
3. Include proper block.json metadata
4. Add block patterns for common use cases
5. Ensure accessibility compliance
6. Test both frontend and editor experiences

### Testing

- Test in multiple browsers (Chrome, Firefox, Safari, Edge)
- Test with WordPress latest version and Gutenberg plugin
- Test accessibility with screen readers and keyboard navigation
- Test responsive design on mobile devices
- Test with various plugins (WooCommerce, ACF, etc.)
- Validate HTML and CSS

### Commit Messages

Follow [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` - New feature (blocks, patterns, functionality)
- `fix:` - Bug fix
- `docs:` - Documentation changes
- `style:` - Code style changes (formatting, etc.)
- `refactor:` - Code refactoring
- `test:` - Test additions or changes
- `chore:` - Maintenance tasks (dependencies, build)

Examples:
```
feat: add countdown custom block with animation options
fix: resolve navigation overlay z-index issue
docs: update README with new blocks documentation
style: format CSS files according to standards
```

## Pull Request Process

1. **Ensure Quality Checks Pass**
   - All linting checks pass
   - Assets are built if needed
   - Code follows all standards

2. **Update Documentation**
   - Update README.md if adding new features
   - Add block patterns to patterns/ directory
   - Update inline code documentation

3. **Clear PR Description**
   - What changes were made and why
   - How to test the changes
   - Any breaking changes or compatibility notes
   - Screenshots for UI changes

4. **Link Related Issues**
   - Reference any GitHub issues being addressed
   - Use keywords: "Fixes #123" or "Closes #123"

5. **Request Review**
   - Request review from maintainers
   - Address feedback promptly

## Code Review Guidelines

### For Reviewers

- Check coding standards compliance
- Verify functionality works as expected
- Test accessibility and responsive design
- Ensure documentation is updated
- Check for potential security issues
- Verify compatibility with WordPress versions

### For Contributors

- Be responsive to review feedback
- Explain complex design decisions
- Provide testing instructions
- Update code based on suggestions
- Ask questions if feedback is unclear

## Types of Contributions

### Design & UI
- Block patterns and templates
- Style variations
- Color palettes and typography
- Icon designs

### Development
- Custom blocks
- Block variations
- Core block enhancements
- Performance optimizations

### Documentation
- README improvements
- Code comments
- User guides
- Developer documentation

### Bug Reports
- Detailed issue reports
- Steps to reproduce
- Environment details
- Screenshots when applicable

### Internationalization
- Translation updates
- RTL language support
- Localization improvements

#### Contributing Translations

1. **Generate Translation Files**:
```bash
npm run translate
```

2. **Translation Process**:
   - Use the generated `languages/aegis.pot` file as your template
   - Copy `aegis.pot` to create your language file (e.g., `aegis-fr_FR.po`)
   - Translate using tools like Poedit or translation software
   - Validate your translation file format

3. **Translation Guidelines**:
   - Maintain consistent terminology with WordPress standards
   - Preserve placeholders like `%s`, `%d`, and HTML tags
   - Test translations in different contexts (admin, frontend, block editor)
   - Ensure RTL language compatibility

4. **Submitting Translations**:
   - Create a pull request with your `.po` and compiled `.mo` files
   - Include the language code and region in your PR description
   - Test your translations before submission

## Feature Requests

Before starting major feature work:

1. Check existing issues and pull requests
2. Open an issue for discussion
3. Get feedback from maintainers
4. Create a proposal if needed
5. Wait for approval before implementation

## Release Process

### Version Control

Aegis uses [Semantic Versioning](https://semver.org/):
- **Major** (X.0.0): Breaking changes, incompatible API changes
- **Minor** (0.X.0): New features, backwards compatible
- **Patch** (0.0.X): Bug fixes, security patches

### Creating a Release

1. **Ensure all checks pass** on the `main` branch:
   - ✓ CI/CD pipeline (linting, tests, build)
   - ✓ Accessibility checks
   - ✓ Security audits (npm, Composer)
   - ✓ Code reviews

2. **Update version numbers** and changelog:
   - Update version in `theme.json`
   - Update version in `package.json`
   - Update `CHANGELOG.md` with release notes
   - Update `readme.txt` (WordPress theme readme)

3. **Create a release tag** using semantic versioning:
```bash
git tag v1.2.3
git push origin v1.2.3
```

4. **The release workflow will automatically**:
   - Validate the tag format (e.g., v1.2.3)
   - Run full test suite (PHPCS, PHPUnit, linting)
   - Build the production-ready package
   - Generate SHA256 checksums
   - Create a **draft release** on GitHub

5. **Review the draft release**:
   - Check release notes are accurate
   - Verify package contents are correct
   - Validate checksum file is present
   - Test the zip file locally

6. **Publish the release**:
   - Review the draft release carefully
   - Click "Publish release" on GitHub
   - The package becomes available for download

### Release Quality Checks

The following checks must pass before a release can be published:

- **Tag Format**: Must follow semantic versioning (v1.2.3, v1.2.3-rc1)
- **Linting**: All PHP, JavaScript, and CSS must pass linters
- **Tests**: PHPUnit and WPAudit tests must pass
- **Composer Validation**: composer.json and composer.lock must be valid
- **Package Integrity**: All required files (style.css, functions.php, theme.json, vendor/autoload.php) present

### Package Contents

The released package includes:

- ✓ Theme files (templates, parts, patterns)
- ✓ Built assets (minified CSS/JS)
- ✓ Compiled translations (.mo files)
- ✓ Vendored PHP dependencies (`vendor/` directory)
- ✓ theme.json configuration
- ✓ Block definitions and patterns

The package excludes:

- ✗ Development dependencies
- ✗ Tests and testing utilities
- ✗ Source maps and dev tools
- ✗ Git history and configuration
- ✗ Node modules

### Verifying a Release

To verify the integrity of a downloaded release:

```bash
# Download the release and checksum file
# Then verify:
sha256sum -c aegis.zip.sha256
```

If the checksum matches, the package is intact and safe to use.

## Branch Protection Rules

The `main` branch is protected and enforces:

- ✓ All status checks must pass:
  - CI workflow (linting, tests, build)
  - Accessibility checks
  - Spelling checks
- ✓ At least 1 pull request review required before merge
- ✓ Stale pull request reviews are dismissed
- ✓ Pull request must be up-to-date with base branch
- ✓ Administrators are included in restrictions

This ensures `main` is always in a releasable state.

### For Maintainers

- Ensure all CI checks pass before merging
- Review code quality and security
- Request changes if standards aren't met
- Dismiss reviews when PR is updated
- Merge with squash commits for clean history

## Feature Requests

## Getting Help

- **GitHub Issues**: For bug reports and feature requests
- **GitHub Discussions**: For general questions and discussions
- **Documentation**: Check README.md and inline code comments
- **WordPress.org**: For theme-specific questions

## Recognition

Contributors who make significant contributions will be:
- Added to the [CONTRIBUTORS.md](CONTRIBUTORS.md) file
- Mentioned in release notes
- Recognized in theme credits

## License

By contributing to Aegis, you agree that your contributions will be licensed under the same license as the project (GPL v2.0 or later).

## Questions?

Feel free to open an issue for questions or discussions. We welcome contributors of all experience levels.

---

Thank you for contributing to Aegis.
