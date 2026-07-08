# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

<<<<<<< Updated upstream
=======
### Breaking Changes

- Removed **`aegis/video`** custom block. Use **`core/video`** with Aegis framework, companion plugin, and Pro enhancements. Migrate existing content with `tools/migrate-aegis-video.php` (see `docs/getting-started/updating.md`).
- Removed **`core/query` Related Posts** block variation. Use the **`aegis/related-posts`** theme block instead. Advanced related-post querying on Query Loop remains available via **`aegisProRelatedPosts`** in Aegis Pro.

>>>>>>> Stashed changes
### Documentation

- Reorganized documentation for the theme/plugin/Pro split.
- Plugin-specific docs moved to `wp-content/plugins/aegis/docs/` and `wp-content/plugins/aegis-pro/docs/`.
- Theme docs updated for four-layer architecture (theme, framework, free plugin, Pro).

### Architecture

<<<<<<< Updated upstream
- Companion plugin owns admin dashboard, Map/Modal blocks, analytics, snippets, conditionals, and integrations.
- Theme continues to register countdown, slider, toggle, video, and related-posts blocks.
=======
- Companion plugin owns admin dashboard, Map/Modal blocks, analytics, snippets, conditionals, and integrations (requires Aegis theme).
- Theme registers six custom blocks: countdown, slider, slide, toggle, toggle-content, and related-posts.
>>>>>>> Stashed changes

## [1.0.0] - 0000-00-00

- Initial release.

## [1.0.0-rc.3] - 2026-05-01

- RC 3 Release

## [1.0.0-rc.2] - 2026-01-28

- RC 2 Release

## [1.0.0-rc.1] - 2026-01-17

- RC 1 Release

## [1.0.0-beta.3] - 2025-02-28

- Beta 3 Release

## [1.0.0-beta.2] - 2024-02-16

- Beta 2 Release

## [1.0.0-beta.1] - 2023-12-23

- Beta 1 Release

## [1.0.0-alpha.3] - 2023-11-10

- Alpha 3 Release

## [1.0.0-alpha.2] - 2023-10-27

- Alpha 2 Release

## [1.0.0-alpha.1] - 2023-10-13

- Alpha 1 Release
