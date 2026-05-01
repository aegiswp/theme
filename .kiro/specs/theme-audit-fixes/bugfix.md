# Bugfix Requirements Document

## Introduction

A comprehensive audit of the Aegis block theme identified 5 issues spanning accessibility, security, SEO, and coding standards. The `center-logo.php` header variant is missing ARIA attributes and focus management that the `default.php` header already implements correctly. The `skip-to-content` accessibility pattern exists but is never included in any template. The `center-logo.php` dark mode cookies lack the `SameSite` flag. The 404 template displays a misleading "Search Results" heading. And the PHPCS configuration omits the `patterns/` directory and `embed-content.php` from scans.

## Bug Analysis

### Current Behavior (Defect)

1.1 WHEN a user navigates the center-logo header (`patterns/header/center-logo.php`) with a screen reader THEN the search modal `<div>` is missing `role="dialog"`, `aria-modal="true"`, `aria-label`, and `aria-hidden="true"` attributes, making the modal invisible to assistive technology

1.2 WHEN a user navigates the center-logo header with a screen reader THEN the search toggle button is missing its `ariaLabel` ("Open search"), the search close button is missing its `ariaLabel` ("Close search"), the dark mode toggle button is missing its `ariaLabel` ("Switch to dark mode"), and the light mode toggle button is missing its `ariaLabel` ("Switch to light mode"), leaving all four buttons unlabeled for assistive technology

1.3 WHEN a user opens the search modal via the search toggle in the center-logo header THEN the onclick JavaScript does not set `aria-hidden="false"` on the modal and does not move focus to the search input field

1.4 WHEN a user closes the search modal via the close button in the center-logo header THEN the onclick JavaScript does not set `aria-hidden="true"` on the modal and does not return focus to the search toggle opener button

1.5 WHEN any page loads using the header template part (`parts/header.html`) THEN the skip-to-content pattern (`aegis/skip-to-content`) is not included, so keyboard-only users have no way to bypass navigation

1.6 WHEN the dark mode toggle is clicked in the center-logo header THEN the cookie is set as `aegisDarkMode=true;path=/;max-age=86400` without the `SameSite=Lax` flag, and similarly the light mode toggle sets `aegisDarkMode=false;path=/;max-age=86400` without `SameSite=Lax`

1.7 WHEN a visitor lands on a 404 page THEN the heading text displays "Search Results" instead of a contextually correct message like "Page Not Found"

1.8 WHEN PHPCS is run on the project THEN only `./src` and `./functions.php` are scanned, so PHP code in `./patterns` and `./embed-content.php` is not checked against WordPress coding standards

### Expected Behavior (Correct)

2.1 WHEN a user navigates the center-logo header with a screen reader THEN the search modal `<div>` SHALL include `role="dialog"`, `aria-modal="true"`, `aria-label="<?php esc_attr_e( 'Search', 'aegis' ); ?>"`, and `aria-hidden="true"` attributes, matching the `default.php` header implementation

2.2 WHEN a user navigates the center-logo header with a screen reader THEN the search toggle button SHALL have `ariaLabel` set to "Open search", the search close button SHALL have `ariaLabel` set to "Close search", the dark mode toggle button SHALL have `ariaLabel` set to "Switch to dark mode", and the light mode toggle button SHALL have `ariaLabel` set to "Switch to light mode", matching the `default.php` header implementation

2.3 WHEN a user opens the search modal via the search toggle in the center-logo header THEN the onclick JavaScript SHALL set `aria-hidden` to `"false"` on the modal and SHALL move focus to the search input field inside the modal

2.4 WHEN a user closes the search modal via the close button in the center-logo header THEN the onclick JavaScript SHALL set `aria-hidden` to `"true"` on the modal and SHALL return focus to the search toggle opener button

2.5 WHEN any page loads using the header template part (`parts/header.html`) THEN the skip-to-content pattern (`aegis/skip-to-content`) SHALL be included before the header pattern reference so keyboard-only users can bypass navigation on every page

2.6 WHEN the dark mode or light mode toggle is clicked in the center-logo header THEN the cookie SHALL be set with the `SameSite=Lax` flag appended (e.g., `aegisDarkMode=true;path=/;max-age=86400;SameSite=Lax`), matching the `default.php` header implementation

2.7 WHEN a visitor lands on a 404 page THEN the heading text SHALL display a contextually correct message (e.g., "Page Not Found") wrapped in `esc_html__()` with the `'aegis'` text domain

2.8 WHEN PHPCS is run on the project THEN the `./patterns` directory and `./embed-content.php` file SHALL be included as scan targets in `phpcs.xml` so all PHP code is checked against WordPress coding standards

### Unchanged Behavior (Regression Prevention)

3.1 WHEN a user navigates the default header (`patterns/header/default.php`) with a screen reader THEN the system SHALL CONTINUE TO provide all existing ARIA attributes, focus management, and `ariaLabel` values unchanged

3.2 WHEN a user interacts with the search modal in the default header THEN the system SHALL CONTINUE TO toggle `aria-hidden`, move focus to the search input on open, and return focus to the opener on close

3.3 WHEN the dark mode or light mode toggle is clicked in the default header THEN the system SHALL CONTINUE TO set cookies with the `SameSite=Lax` flag

3.4 WHEN a visitor lands on a search results page (not a 404 page) THEN the system SHALL CONTINUE TO display the search results template with its existing heading and layout

3.5 WHEN PHPCS is run THEN the existing scan targets (`./src` and `./functions.php`) and all exclusion patterns SHALL CONTINUE TO be scanned and excluded as before

3.6 WHEN any non-header template part or pattern is rendered THEN the system SHALL CONTINUE TO function without any changes to its markup or behavior

3.7 WHEN the center-logo header is rendered THEN all existing visual layout, styling, navigation, social links, WooCommerce blocks, and button functionality (Subscribe, Log In, Sign Up) SHALL CONTINUE TO work unchanged
