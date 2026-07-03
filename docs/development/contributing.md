# Contributing

This page outlines how to contribute to the Aegis theme. Contributions are welcome from the community, whether they are bug fixes, new features, documentation improvements, or translations.

## Getting Started

1. Fork the [Aegis repository](https://github.com/aegiswp/theme) on GitHub.
2. Clone your fork locally.
3. Set up the [[development-setup|development setup]].
4. Create a branch for your contribution.
5. Make your changes.
6. Submit a pull request.

## Branch Strategy

Aegis uses a branching model with the following branches:

| Branch | Purpose | Merges Into |
|--------|---------|-------------|
| `main` | Production-ready releases | — |
| `develop` | Integration branch for next release | `main` |
| `feature/*` | New features | `develop` |
| `fix/*` | Bug fixes | `develop` |
| `hotfix/*` | Critical production fixes | `main` and `develop` |
| `docs/*` | Documentation updates | `develop` |

### Branch Naming

Use descriptive branch names with the appropriate prefix:

```
feature/add-accordion-block
fix/slider-navigation-a11y
hotfix/critical-php-error
docs/update-pattern-reference
```

## Creating a Branch

```bash
# Start from the develop branch
git checkout develop
git pull origin develop

# Create your feature branch
git checkout -b feature/your-feature-name
```

## Making Changes

### Coding Standards

All contributions must follow the project coding standards:

- **PHP** — WordPress PHP Coding Standards (enforced via PHPCS).
- **JavaScript** — WordPress JavaScript Coding Standards (enforced via ESLint).
- **CSS** — WordPress CSS Coding Standards (enforced via stylelint).
- **No abbreviations or contractions** in user-facing text.

See [[code-quality]] for detailed linting information.

### Commit Messages

Write clear, descriptive commit messages:

```
feat: add countdown block with configurable target date

- Register countdown block with block.json metadata
- Add editor component with date picker control
- Add frontend JavaScript for timer animation
- Add responsive styles for mobile viewports
- Add unit tests for countdown logic
```

#### Commit Prefixes

| Prefix | Usage |
|--------|-------|
| `feat:` | New feature |
| `fix:` | Bug fix |
| `docs:` | Documentation only |
| `style:` | Code style (formatting, no logic change) |
| `refactor:` | Code restructuring (no feature/fix) |
| `test:` | Adding or updating tests |
| `chore:` | Build process, dependencies, tooling |
| `perf:` | Performance improvement |
| `a11y:` | Accessibility improvement |

### Testing Your Changes

Before submitting a PR:

```bash
# Run linting
npm run lint

# Run tests
composer run test
npm run test

# Run accessibility tests
npm run test:a11y

# Build production assets
npm run build
```

All commands must pass without errors.

## Submitting a Pull Request

### PR Process

1. Push your branch to your fork:
   ```bash
   git push -u origin feature/your-feature-name
   ```

2. Open a pull request against the `develop` branch on the main repository.

3. Fill in the PR template with:
   - Summary of changes.
   - Related issue number (if applicable).
   - Testing steps.
   - Screenshots (for visual changes).

### PR Title

Keep PR titles concise and descriptive (under 70 characters):

```
feat: add countdown block with date picker
fix: resolve slider navigation focus issue
docs: update template reference table
```

### PR Description Template

```markdown
## Summary

Brief description of what this PR does.

## Related Issues

Closes #123

## Changes

- Added countdown block registration
- Added editor component with date picker
- Added frontend timer animation
- Added unit tests

## Testing

1. Start the local environment
2. Insert a Countdown block
3. Set a target date in the future
4. View the frontend and verify the timer counts down

## Screenshots

(Include screenshots for visual changes)

## Checklist

- [ ] Code follows project coding standards
- [ ] Tests pass locally
- [ ] No accessibility regressions (pa11y passes)
- [ ] Documentation updated (if applicable)
- [ ] Build completes without errors
```

## Code Review

All PRs go through code review:

1. **Automated checks** — CI runs linting, tests, and accessibility checks.
2. **Maintainer review** — A project maintainer reviews the code.
3. **Feedback** — Address any requested changes by pushing additional commits.
4. **Approval** — Once approved, the PR is merged.

### Review Criteria

| Criterion | Description |
|-----------|-------------|
| Code quality | Follows coding standards, well-structured |
| Functionality | Works as intended, no regressions |
| Performance | Does not degrade page load performance |
| Accessibility | Meets WCAG 2.1 AA, no a11y regressions |
| Testing | Appropriate tests included |
| Documentation | Code is documented, user docs updated if needed |

## Types of Contributions

### Bug Fixes

1. Check [existing issues](https://github.com/aegiswp/theme/issues) for duplicates.
2. Create an issue describing the bug (if one does not exist).
3. Reference the issue in your PR.
4. Include a test that verifies the fix.

### New Features

1. Open a feature request issue first to discuss the proposal.
2. Wait for maintainer feedback before investing significant effort.
3. Follow the established architecture patterns.
4. Include tests and documentation.

### Documentation

Documentation PRs use the `docs/*` branch prefix and typically update:

- Wiki pages (in the `.wiki/` directory).
- Code comments (PHPDoc, JSDoc).
- README files.
- Inline documentation.

### Translations

Translations are managed through WordPress.org or direct contributions:

1. Generate a fresh `.pot` file: `npm run translate`.
2. Create a `.po` file for your locale.
3. Submit the translation via PR or the WordPress translation platform.

## Reporting Issues

When reporting bugs:

1. Search [existing issues](https://github.com/aegiswp/theme/issues) first.
2. Include:
   - WordPress version.
   - PHP version.
   - Aegis version.
   - Steps to reproduce.
   - Expected behavior.
   - Actual behavior.
   - Screenshots or screen recordings (if visual).

## Community Guidelines

- Be respectful and constructive.
- Follow the [WordPress Community Code of Conduct](https://make.wordpress.org/handbook/community-code-of-conduct/).
- Help others when you can.
- Ask questions if something is unclear.

## Next Steps

- [[development-setup]] — Set up your local environment.
- [[code-quality]] — Understand coding standards.
- [[testing]] — Run the test suite.
- [[architecture]] — Understand the codebase structure.
