# GitHub Actions Workflows Documentation

This document explains each GitHub Actions workflow used by the Aegis WordPress Block Theme. Use this as a reference for understanding CI/CD checks and troubleshooting workflow failures.

---

## Table of Contents

1. [Core Workflows](#core-workflows)
2. [Block Theme Workflows](#block-theme-workflows)
3. [Maintenance Workflows](#maintenance-workflows)
4. [Understanding Workflow Results](#understanding-workflow-results)
5. [Troubleshooting](#troubleshooting)

---

## Core Workflows

### 1. **CI (ci.yml)**
**Purpose:** Main quality gate - linting, testing, and dependency audits
**Triggers:** Push/PR to main/dev branches
**Duration:** ~10-15 minutes

#### What it checks:
- ✅ JavaScript/TypeScript linting (ESLint)
- ✅ CSS linting (Stylelint)
- ✅ npm dependency audit (`npm audit`)
- ✅ PHP linting and PHPCS standards
- ✅ Composer dependency audit (`composer audit`)
- ✅ PHP Unit tests with coverage
- ✅ WPAudit integration tests
- ✅ theme.json validation
- ✅ Required theme files (style.css, functions.php, index.php, theme.json)
- ✅ Code coverage report (Codecov)

#### If it fails:
1. Check the logs for specific linting errors
2. Run locally: `npm run lint:js` / `npm run lint:css` / `composer lint`
3. Run tests locally: `vendor/bin/phpunit`
4. Check dependency audit results; update vulnerable packages

#### Artifacts:
- Coverage report (uploaded to Codecov)
- Test results (in logs)

---

### 2. **Accessibility (accessibility.yml)**
**Purpose:** Automated accessibility scanning
**Triggers:** Push/PR to main/dev branches
**Duration:** ~5-7 minutes

#### What it checks:
- ✅ Page accessibility using pa11y-ci
- ✅ WCAG 2.1 AA compliance
- ✅ Keyboard navigation
- ✅ Screen reader compatibility
- ✅ Color contrast
- ✅ Focus indicators

#### If it fails:
1. Check pa11y-ci threshold (currently 5 violations max)
2. Run locally: `npm install -g pa11y-ci && pa11y-ci http://localhost:8080`
3. Fix reported issues (missing alt text, ARIA labels, etc.)

#### Environment:
- Starts local WordPress with Aegis theme
- Tests homepage at http://localhost:8080

---

### 3. **Spelling Check (spelling.yml)**
**Purpose:** Catch typos in documentation and code
**Triggers:** Push/PR to main/dev branches
**Duration:** ~1 minute

#### What it checks:
- ✅ Markdown files (README, CONTRIBUTING, etc.)
- ✅ Code comments
- ✅ Documentation strings
- Uses `.typos.toml` for configuration

#### If it fails:
1. Check the reported typos
2. Fix typos in affected files
3. If a word is correct but flagged, add it to `.typos.toml` exceptions

---

## Block Theme Workflows

### 4. **Theme.json Validation (theme-json-validation.yml)**
**Purpose:** Validate theme.json structure and properties
**Triggers:** Changes to theme.json
**Duration:** ~2 minutes

#### What it checks:
- ✅ Valid JSON syntax
- ✅ Required properties (version, settings, styles)
- ✅ Deprecated properties
- ✅ Color palette definition
- ✅ Typography settings
- ✅ Block-specific configurations

#### If it fails:
1. Check for JSON syntax errors
2. Verify `version`, `settings`, and `styles` are present
3. Review console output for specific warnings

#### Common issues:
- `Missing version` → Add `"version": 2` at top level
- `Missing settings` → Ensure settings object exists (even if empty)
- `Color palette undefined` → Add `settings.color.palette` array

---

### 5. **WordPress Compatibility Matrix (wordpress-compat.yml)**
**Purpose:** Test against multiple WordPress and PHP versions
**Triggers:** Schedule (weekly) + Push/PR to main/dev
**Duration:** ~30-40 minutes (9 parallel jobs)
**Matrix:** WordPress 6.4/6.5/latest × PHP 8.1/8.2/8.3

#### What it checks:
- ✅ Theme activation on each WP/PHP combination
- ✅ Theme loads without errors
- ✅ Core block registration
- ✅ WordPress CLI integration
- ✅ theme.json validity in WordPress context
- ✅ PHPCS checks

#### If it fails:
1. Note which WP/PHP combination failed
2. Check error message in workflow logs
3. Reproduce locally with that version:
   ```bash
   wp core download --version=6.4 --path=wp-test
   ```
4. Test theme activation and functionality

#### Matrix results:
- All 9 combinations should pass
- Failures indicate compatibility issues with specific versions
- Use results to update theme requirements (README, composer.json)

---

### 6. **Lighthouse CI (lighthouse-ci.yml)**
**Purpose:** Performance and accessibility metrics
**Triggers:** Push/PR to main/dev
**Duration:** ~10-12 minutes (3 audit runs averaged)

#### What it checks:
- ✅ **Performance** (target: 80+) - Core Web Vitals, asset optimization
- ✅ **Accessibility** (target: 90+) - ARIA, color contrast, focus
- ✅ **Best Practices** (target: 85+) - Security, performance patterns
- ✅ **SEO** (target: 90+) - Meta tags, structured data
- ✅ **Core Web Vitals:**
  - LCP (Largest Contentful Paint): ≤ 4000ms
  - CLS (Cumulative Layout Shift): ≤ 0.1
  - FCP (First Contentful Paint): ≤ 3000ms

#### If it fails:
1. Check which metric failed
2. Review Lighthouse report (link in PR comment)
3. Identify bottleneck (JS size, images, CSS, etc.)
4. Optimize and re-test

#### Optimization tips:
- Reduce JavaScript bundle size
- Optimize images (use WebP, lazy load)
- Minimize CSS and defer non-critical
- Use CSS containment for performance
- Defer non-critical blocks

---

## Maintenance Workflows

### 7. **Generate Composer Lock (composer-lock.yml)**
**Purpose:** Auto-update composer.lock when composer.json changes
**Triggers:** composer.json changes on main/dev branches
**Duration:** ~3-5 minutes

#### What it does:
- ✅ Runs `composer update --no-install`
- ✅ Validates composer files with `composer validate --strict`
- ✅ Auto-commits lock file with `[skip ci]` tag

#### If it fails:
1. Check for composer.json syntax errors
2. Verify dependencies are compatible
3. Run locally: `composer validate`
4. Check lock file for conflicts

---

### 8. **Development Checks (dev.yml)**
**Purpose:** Quick checks for feature branch development
**Triggers:** Push to feature/* branches and dev branch
**Duration:** ~5-8 minutes

#### What it checks:
- ✅ Quick linting (JS, CSS, PHP)
- ✅ Theme build
- ✅ PHP syntax validation
- ✅ PHPCS (errors only, not warnings)
- ✅ PHP Unit tests
- ✅ WPAudit tests

#### Purpose:
Faster feedback than full CI for development iterations

#### Note:
Warnings are not blockers on dev branch for faster iteration

---

### 9. **Release (release.yml)**
**Purpose:** Build production package and create GitHub release
**Triggers:** Version tags (v*.*.* format)
**Duration:** ~10-15 minutes

#### What it does:
- ✅ Validates tag format (semantic versioning)
- ✅ Runs full test suite (PHPCS, linting, PHPUnit)
- ✅ Builds production package
- ✅ Compiles translations (.po → .mo)
- ✅ Generates SHA256 checksum
- ✅ Creates **draft** GitHub release
- ✅ Includes validation checklist

#### If it fails:
1. Check tag format (must be v1.2.3 or v1.2.3-rc1)
2. Ensure all tests pass on main branch
3. Verify composer.lock is up-to-date

#### Release process:
1. Tag: `git tag v1.2.3 && git push origin v1.2.3`
2. Wait for release.yml to complete
3. Review draft release on GitHub
4. Verify package contents and checksum
5. Click "Publish release"

#### Package verification:
```bash
# Download the release and verify checksum
sha256sum -c aegis.zip.sha256
```

---

### 10. **Dependabot Auto-Merge (dependabot-auto-merge.yml)**
**Purpose:** Automatically merge safe dependency updates
**Triggers:** Dependabot pull requests
**Duration:** ~2 minutes

#### What it does:
- ✅ Parses version bump type (major/minor/patch)
- ✅ Auto-merges **patch** and **minor** updates
- ✅ Blocks **major** updates (requires manual review)
- ✅ Comments on major updates with warnings

#### Auto-merged:
- 1.2.3 → 1.2.4 (patch) ✅
- 1.2.3 → 1.3.0 (minor) ✅

#### Requires manual review:
- 1.2.3 → 2.0.0 (major) ⚠️

#### Note:
Only merges if all CI checks pass

---

### 11. **Mark Stale Issues/PRs (stale.yml)**
**Purpose:** Keep repository clean by marking inactive issues/PRs
**Triggers:** Daily at 1:00 AM UTC
**Duration:** ~2 minutes

#### What it does:
- ✅ Marks issues with no activity for 90 days as `status: stale`
- ✅ Closes stale issues after 30 more days (120 total)
- ✅ Marks PRs with no activity for 60 days as `status: stale`
- ✅ Closes stale PRs after 14 more days (74 total)
- ✅ Adds helpful comments with revival instructions

#### Exemptions:
Issues/PRs with labels: `pinned`, `roadmap`, or `epic` are exempt

#### To prevent closure:
- Comment on the issue/PR
- Add an exempt label
- Push new commits

---

## Understanding Workflow Results

### Workflow Status Indicators

| Icon | Status | Meaning |
|------|--------|---------|
| ✅ | Success | All checks passed |
| ❌ | Failed | One or more checks failed |
| ⏳ | In Progress | Workflow is currently running |
| ⏭️ | Skipped | Workflow was not triggered (e.g., path filter) |

### Reading Workflow Logs

1. Go to **Actions** tab in GitHub
2. Click the failed workflow run
3. Click the failed job
4. Expand the failed step
5. Review logs for error messages

### Common Log Patterns

```
❌ PHPCS Standards Failed
   →  Run: vendor/bin/phpcs
   →  Fix: composer run standards:fix

❌ npm audit vulnerability
   →  Fix: npm install or npm update <package>
   →  Check: npm audit fix

❌ Test Failed
   →  Run locally: vendor/bin/phpunit
   →  Check: Test output for specific failure

❌ Lighthouse score below threshold
   →  Performance < 80: Optimize JS/CSS/images
   →  Accessibility < 90: Fix ARIA/focus/color contrast
```

---

## Troubleshooting

### General Troubleshooting Steps

1. **Check the workflow logs** for specific error messages
2. **Reproduce locally** using the same commands/environment
3. **Check recent changes** - what changed since the last passing run?
4. **Clear cache** - some workflows cache dependencies that might be stale
5. **Check branch protection** - ensure you're pushing to the right branch

### Common Issues & Solutions

#### **"All checks must pass before merging"**
- One or more workflows failed
- Fix the specific errors and push new commits
- The workflow will re-run automatically

#### **"Workflow did not run"**
- Path filter may have skipped it (e.g., only .md changes)
- Or workflow is disabled
- Check `.github/workflows/` for the workflow configuration

#### **"Timeout during test"**
- Database/server startup taking too long
- Increase timeout in workflow file
- Check system resources

#### **"Dependency audit failing"**
- `npm audit` or `composer audit` found vulnerabilities
- Update vulnerable package: `npm update <package>`
- Use `npm audit fix` for automatic fixes
- Review breaking changes before updating major versions

#### **"Theme.json validation failed"**
- Check JSON syntax (use online validator if needed)
- Verify `version`, `settings`, and `styles` exist
- Run: `node -e "JSON.parse(require('fs').readFileSync('theme.json'))"`

#### **"WordPress compatibility test failed"**
- Note which WP/PHP version failed
- Check if there's a specific breaking change
- Test locally with that version
- Consider updating theme requirements

### Need Help?

1. **Check logs first** - most errors are obvious from logs
2. **Search issues** - similar problem may have been reported
3. **Check CONTRIBUTING.md** - development guidelines
4. **Open an issue** - provide logs and workflow name

---

## Workflow Performance Tips

- Workflows run in **parallel** when possible (independence)
- Use **caching** to speed up dependency installation
- **Concurrency** groups cancel in-progress runs when new code is pushed
- Avoid **long-running steps** (consider async or scheduled workflows)

## Updating Workflows

- Workflows are in `.github/workflows/`
- Changes to workflows take effect immediately
- Test workflow changes on a branch first
- Document significant changes in commit messages

---

**Last Updated:** April 2026  
**Aegis Theme Version:** 1.x  
**WordPress Minimum:** 6.4  
**PHP Minimum:** 8.1
