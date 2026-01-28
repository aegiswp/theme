# Aegis

Welcome to the Aegis Theme development repository.


![Aegis](https://github.com/user-attachments/assets/365b757e-43c1-4701-831f-aa4e6d5368b1)

##### Table of Contents

- [Introduction](#introduction)
- [Working with Block Themes](#working-with-block-themes)
  - [Site Editor](#site-editor)
  - [Patterns](#patterns)
  - [Global Styles](#global-styles)
  - [Template Parts](#template-parts)
  - [Export Your Site](#export-your-site)
- [Presets](#presets)
  - [Layout Presets](#layout-presets)
  - [Spacing Presets](#spacing-presets)
  - [Typography Presets](#typography-presets)
  - [Shadow Presets](#shadow-presets)
  - [Gradient Presets](#gradient-presets)
- [Features](#features)
- [Getting Started](#getting-started-with-aegis)
  - [Requirements](#requirements)
- [Deploying WordPress Locally](#deploying-wordpress-locally)
  - [Development Environment Commands](#development-environment-commands)
  - [How to start the development environment for the first time](#how-to-start-the-development-environment-for-the-first-time)
  - [How to watch for changes](#how-to-watch-for-changes)
  - [How to run a WP-CLI command](#how-to-run-a-wp-cli-command)
  - [How to run the tests](#how-to-run-the-tests)
  - [To restart the development environment](#how-to-restart-the-development-environment)
  - [How to stop the development environment](#how-to-stop-the-development-environment)
  - [How to start the development environment again](#how-to-start-the-development-environment-again)
  - [Credentials](#credentials)
- [Contributing](#contributing)
  - [Communication and Collaboration](#communication-and-collaboration)
  - [Code Quality](#code-quality)
  - [Testing and Validation](#testing-and-validation)
  - [Version Control](#version-control)
  - [Pull Requests and Reviews](#pull-requests-and-reviews)
  - [Final Checks](#final-checks)
- [Development Philosophy](#development)
- [Pattern Creation Guidelines](#pattern-creation-guidelines)
- [Experimenting](#experimenting)
- [Resources](#resources)
- [Demos](#demos)
- [Roadmap](#roadmap)
- [Credits](#credits)
- [Suggestions?](#suggestions)


## Introduction

Aegis is a cutting-edge Full Site Editing (FSE) theme that combines performance with aesthetics. Built with Vanilla JavaScript and Flexbox Grid, Aegis provides a lightweight yet powerful foundation for modern WordPress development.

Upholding the highest coding standards, Aegis is engineered for scalability—from personal blogs to professional portfolios and expansive business sites. The theme seamlessly supports multisite configurations, WooCommerce, SEO optimization, and learning management systems.

Every detail emphasizes performance, accessibility, and user experience. Aegis is particularly optimized for users with color vision deficiency, making it a truly inclusive design solution built to remain relevant for years to come.

## Working with Block Themes

When you activate Aegis, it operates in a manner similar to traditional WordPress themes, allowing you to seamlessly create posts and pages as you are accustomed to. However, Aegis distinguishes itself as a block theme, offering enhanced features such as the site editor, patterns, global styles, and much more.

In essence, a block theme like Aegis is a WordPress theme constructed entirely of blocks. This means that in addition to editing the content of posts and pages, you have the capability to use the block editor for modifying every other component of your website, including headers, footers, and various templates. It serves as a comprehensive editor for your website's entire design and layout.

### Site Editor

The WordPress site editor heralds a transformative phase in the art of website creation with WordPress. Utilizing the capabilities of blocks, patterns, and a wide array of drag-and-drop design tools, the site editor enables you to construct pages directly within WordPress, obviating the need for a separate page builder.

To refine your website through the site editor, simply navigate to `Appearance → Editor`. This interface grants you the ability to create and modify templates, develop menus, tailor your site's styles, choose your color palette, fine-tune typography, adjust block styles, and much more. Essentially, this platform serves as your digital canvas, allowing you to design, build, and perfect your website prior to its official launch.

### Patterns

Patterns are carefully designed page components that provide a quick method for constructing a specific section of a page or even an entire page layout. Instead of building a page from scratch, WordPress users can now leverage these handy patterns for efficient website design directly within the WordPress Site Editor.

To make use of Aegis's patterns, simply access them via the block inserter while working on posts, pages, or within the site editor itself. These patterns function as flexible design elements that significantly streamline the website construction process.

#### Creating page designs with patterns

Creating pages featured in the Aegis theme is a streamlined process. Simply insert Aegis's full-page patterns onto any page you desire to design.

For optimal compatibility with the full-page patterns, select the `No Page Title` template via the editor sidebar. This template effectively removes the default page title from your design. Nevertheless, it is imperative to incorporate an H1 tag within your design to comply with SEO best practices, thereby enabling search engines to accurately identify the primary subject of your page and enhance its ranking.

### Global Styles

Global styles constitute a robust feature that enables the comprehensive customization of your website's appearance through the Site Editor. This feature offers a centralized hub where you can modify various styling elements such as typography, fonts, and colors for buttons and links, as well as layout defaults.

Under the hood, the Global styles functionality is driven by a configuration file named `theme.json`, situated at the root of the theme's directory. This file allows the theme to establish default styles on both a site-wide and block-specific basis. These default styles are then applied universally across your website and can be further customized by users via the Global styles interface.

By leveraging the `theme.json` file, you can achieve a uniform aesthetic across your website while also providing avenues for customization to meet particular needs or branding objectives. The ultimate outcome is a website that not only exudes a professional design but is also amenable to customization by you or your clients to suit specific requirements.

### Template Parts

Template parts in WordPress serve as reusable sections of your website that can be applied across multiple pages or templates. They operate similarly to reusable blocks but function at the template level, making them ideal for elements like headers, footers, or sidebars—components that usually remain constant across most or all pages on your site.

For instance, to maintain a uniform header across all pages, you could create a header template part. Any modifications made to this template part will be automatically reflected on all pages where it is implemented, thereby enhancing the efficiency of site-wide updates.

This methodology not only expedites the design process but also reinforces consistency throughout your website. Instead of laboriously updating identical elements across individual pages, a single modification to the template part will propagate the changes universally.

Within the framework of Full Site Editing (FSE), these template parts can be created and edited directly via the WordPress site editor, offering a cohesive and simplified approach to site construction.

### Export Your Site

Here is a comprehensive, step-by-step guide on how to export your custom theme:

1. Navigate to `Appearance → Editor` to open the WordPress site editor.
2. Upon entering the site editor, locate the `Options` menu, typically symbolized by three vertical dots, often referred to as the "kebab" menu, situated in the upper right-hand corner of the interface.
3. Click on the `Options` menu, and under the `Tools` section, you'll find the `Export` option.
4. Select `Export`, at which point WordPress will begin compiling all the modifications and customizations you've made through the site editor. This includes custom blocks, global styles, patterns, templates, and template parts.
5. WordPress will package these custom elements into a `.zip` file, effectively creating your new custom theme.
6. This `.zip` file will then automatically download to your computer.

This functionality essentially transforms the site editor into a theme builder. After downloading the `.zip` file, you can upload and install it on any other WordPress website, much like you would with a conventional theme. This feature serves as a convenient mechanism for migrating your custom designs from a local development environment to a live production site, or for sharing your design work with others.

## Presets

### Layout Presets

Aegis utilizes responsive layout constraints that ensure optimal content width across all devices:

| `theme.json` preset | `theme.json` value |
|---------------------|--------------------------------------------------|
| `contentSize` | `min(calc(100dvw - var(--wp--preset--spacing--lg,2rem) * 2), 720px)` |
| `wideSize` | `min(calc(100vw - var(--wp--preset--spacing--lg,2rem) * 2), 1620px)` |

### Spacing Presets

Aegis employs a fluid spacing system that scales intelligently across viewport sizes:

| Name | Slug | CSS Variable | Size |
|------|------|--------------|------|
| XXS (8px) | `xxs` | `--wp--preset--spacing--xxs` | `var(--wp--preset--font-size--8)` |
| XS (16px) | `xs` | `--wp--preset--spacing--xs` | `var(--wp--preset--font-size--16)` |
| S (24px) | `sm` | `--wp--preset--spacing--sm` | `var(--wp--preset--font-size--24)` |
| M (32px) | `md` | `--wp--preset--spacing--md` | `var(--wp--preset--font-size--32)` |
| L (48px) | `lg` | `--wp--preset--spacing--lg` | `var(--wp--preset--font-size--48)` |
| XL (64px) | `xl` | `--wp--preset--spacing--xl` | `var(--wp--preset--font-size--64)` |
| XXL (96px) | `xxl` | `--wp--preset--spacing--xxl` | `var(--wp--preset--font-size--96)` |

### Typography Presets

Aegis features a comprehensive fluid typography system with 22 font size presets:

| Name | Slug | Size | Fluid Range |
|------|------|------|-------------|
| 96px | `96` | `clamp(80px,9.6vw,96px)` | 80px → 96px |
| 88px | `88` | `clamp(72px,8.8vw,88px)` | 72px → 88px |
| 80px | `80` | `clamp(64px,8vw,80px)` | 64px → 80px |
| 72px | `72` | `clamp(56px,7.2vw,72px)` | 56px → 72px |
| 64px | `64` | `clamp(52px,6.4vw,64px)` | 52px → 64px |
| 60px | `60` | `clamp(48px,6vw,60px)` | 48px → 60px |
| 52px | `52` | `clamp(44px,5.2vw,52px)` | 44px → 52px |
| 48px | `48` | `clamp(40px,4.8vw,48px)` | 40px → 48px |
| 44px | `44` | `clamp(40px,4.4vw,44px)` | 40px → 44px |
| 40px | `40` | `clamp(36px,4vw,40px)` | 36px → 40px |
| 36px | `36` | `clamp(32px,3.6vw,36px)` | 32px → 36px |
| 32px | `32` | `clamp(28px,3.2vw,32px)` | 28px → 32px |
| 28px | `28` | `clamp(24px,2.8vw,28px)` | 24px → 28px |
| 24px | `24` | `clamp(22px,2.4vw,24px)` | 22px → 24px |
| 22px | `22` | `clamp(20px,2.2vw,22px)` | 20px → 22px |
| 20px | `20` | `clamp(19px,2vw,20px)` | 19px → 20px |
| 18px | `18` | `clamp(17px,1.8vw,18px)` | 17px → 18px |
| 16px | `16` | `clamp(16px,1.6vw,16px)` | 16px → 16px |
| 14px | `14` | `clamp(14px,1.4vw,14px)` | 14px → 14px |
| 12px | `12` | `clamp(12px,1.2vw,12px)` | 12px → 12px |
| 10px | `10` | `clamp(10px,1.0vw,10px)` | 10px → 10px |
| 8px | `8` | `clamp(8px,0.8vw,8px)` | 8px → 8px |

**Font Families**

| Name | Slug | Font Family | Weight Range |
|------|------|-------------|-------------|
| Lexend | `lexend` | `Lexend, sans-serif` | 300–900 |
| JetBrains | `jetbrains` | `JetBrains, monospace` | 100–900 |

### Shadow Presets

Aegis provides seven box shadow presets for depth and elevation:

| Name | Slug | Shadow Value |
|------|------|-------------|
| None | `none` | `none` |
| XX Small | `xxs` | `0 1px 2px 0 var(--wp--custom--box-shadow--color)` |
| X Small | `xs` | `0 1px 2px var(--wp--custom--box-shadow--color), 0 2px 4px 0 var(--wp--custom--box-shadow--color)` |
| Small | `sm` | `0 1px 2px 0 var(--wp--custom--box-shadow--color), 0 4px 12px -4px var(--wp--custom--box-shadow--color)` |
| Medium | `md` | `0 1px 2px 0 var(--wp--custom--box-shadow--color), 0 4px 8px var(--wp--custom--box-shadow--color)` |
| Large | `lg` | `0 2px 4px 0 var(--wp--custom--box-shadow--color), 0 8px 24px var(--wp--custom--box-shadow--color)` |
| X Large | `xl` | `0 4px 8px -4px var(--wp--custom--box-shadow--color), 0 16px 24px -4px var(--wp--custom--box-shadow--color)` |
| XX Large | `xxl` | `0 4px 8px 0 var(--wp--custom--box-shadow--color), 0 24px 48px 0 var(--wp--custom--box-shadow--color)` |

### Gradient Presets

Aegis includes 12 pre-configured gradients for sophisticated visual effects:

| Name | Slug | Gradient |
|------|------|----------|
| Primary 700/500 | `primary-700-500` | `linear-gradient(135deg, primary-700 0%, primary-500 100%)` |
| Primary 500/300 | `primary-500-300` | `linear-gradient(135deg, primary-500 0%, primary-300 100%)` |
| Primary Transparent | `primary-transparent` | `linear-gradient(180deg, transparent 0%, primary-100 100%)` |
| Primary Foreground | `primary-foreground` | `linear-gradient(135deg, primary-900 0%, neutral-950 100%)` |
| Body/Heading | `body-heading` | `linear-gradient(135deg, neutral-600 0%, neutral-950 100%)` |
| Surface/Border | `surface-border` | `linear-gradient(135deg, neutral-100 0%, neutral-200 100%)` |
| Background/Transparent | `background-transparent` | `linear-gradient(0deg, background 50%, transparent 50%)` |
| Transparent/Background | `transparent-background` | `linear-gradient(180deg, background 50%, transparent 50%)` |
| Fade Left | `fade-left` | `linear-gradient(90deg, neutral-0 0%, transparent 100%)` |
| Fade Right | `fade-right` | `linear-gradient(-90deg, neutral-0 0%, transparent 100%)` |
| Checkerboard | `checkerboard` | `repeating-conic-gradient(neutral-200 0% 25%, transparent 0% 50%)` |
| Grid | `grid` | `conic-gradient(from 90deg at 1px 1px, transparent 90deg, neutral-100 0)` |

### Token Cheat-sheet

#### Default Global Style

The Aegis theme features a comprehensive color system with Primary, Neutral, and Semantic colors optimized for accessibility and visual hierarchy:

**Primary Colors**

| CSS Variable | Color | Name | Slug | Visual |
|--------------|-------|------|------|--------|
| `--wp--preset--color--primary-950` | `#1e2225` | Primary 950 | `primary-950` | ![jpg](https://placehold.co/20x20/1e2225/1e2225/jpg) |
| `--wp--preset--color--primary-900` | `#212528` | Primary 900 | `primary-900` | ![jpg](https://placehold.co/20x20/212528/212528/jpg) |
| `--wp--preset--color--primary-800` | `#24282c` | Primary 800 | `primary-800` | ![jpg](https://placehold.co/20x20/24282c/24282c/jpg) |
| `--wp--preset--color--primary-700` | `#343a40` | Primary 700 | `primary-700` | ![jpg](https://placehold.co/20x20/343a40/343a40/jpg) |
| `--wp--preset--color--primary-600` | `#495057` | Primary 600 | `primary-600` | ![jpg](https://placehold.co/20x20/495057/495057/jpg) |
| `--wp--preset--color--primary-500` | `#6c757d` | Primary 500 | `primary-500` | ![jpg](https://placehold.co/20x20/6c757d/6c757d/jpg) |
| `--wp--preset--color--primary-400` | `#8d959d` | Primary 400 | `primary-400` | ![jpg](https://placehold.co/20x20/8d959d/8d959d/jpg) |
| `--wp--preset--color--primary-300` | `#a9b1b9` | Primary 300 | `primary-300` | ![jpg](https://placehold.co/20x20/a9b1b9/a9b1b9/jpg) |
| `--wp--preset--color--primary-200` | `#9da5ad` | Primary 200 | `primary-200` | ![jpg](https://placehold.co/20x20/9da5ad/9da5ad/jpg) |
| `--wp--preset--color--primary-100` | `#a5adb5` | Primary 100 | `primary-100` | ![jpg](https://placehold.co/20x20/a5adb5/a5adb5/jpg) |
| `--wp--preset--color--primary-50` | `#c9cfd4` | Primary 50 | `primary-50` | ![jpg](https://placehold.co/20x20/c9cfd4/c9cfd4/jpg) |
| `--wp--preset--color--primary-25` | `#edf0f2` | Primary 25 | `primary-25` | ![jpg](https://placehold.co/20x20/edf0f2/edf0f2/jpg) |

**Neutral Colors**

| CSS Variable | Color | Name | Slug | Visual |
|--------------|-------|------|------|--------|
| `--wp--preset--color--neutral-950` | `#202427` | Neutral 950 | `neutral-950` | ![jpg](https://placehold.co/20x20/202427/202427/jpg) |
| `--wp--preset--color--neutral-900` | `#25292d` | Neutral 900 | `neutral-900` | ![jpg](https://placehold.co/20x20/25292d/25292d/jpg) |
| `--wp--preset--color--neutral-800` | `#313539` | Neutral 800 | `neutral-800` | ![jpg](https://placehold.co/20x20/313539/313539/jpg) |
| `--wp--preset--color--neutral-700` | `#40454a` | Neutral 700 | `neutral-700` | ![jpg](https://placehold.co/20x20/40454a/40454a/jpg) |
| `--wp--preset--color--neutral-600` | `#50555b` | Neutral 600 | `neutral-600` | ![jpg](https://placehold.co/20x20/50555b/50555b/jpg) |
| `--wp--preset--color--neutral-500` | `#7e858c` | Neutral 500 | `neutral-500` | ![jpg](https://placehold.co/20x20/7e858c/7e858c/jpg) |
| `--wp--preset--color--neutral-400` | `#8e959d` | Neutral 400 | `neutral-400` | ![jpg](https://placehold.co/20x20/8e959d/8e959d/jpg) |
| `--wp--preset--color--neutral-300` | `#dee2e6` | Neutral 300 | `neutral-300` | ![jpg](https://placehold.co/20x20/dee2e6/dee2e6/jpg) |
| `--wp--preset--color--neutral-200` | `#e4e7eb` | Neutral 200 | `neutral-200` | ![jpg](https://placehold.co/20x20/e4e7eb/e4e7eb/jpg) |
| `--wp--preset--color--neutral-100` | `#e9ecef` | Neutral 100 | `neutral-100` | ![jpg](https://placehold.co/20x20/e9ecef/e9ecef/jpg) |
| `--wp--preset--color--neutral-50` | `#f1f3f5` | Neutral 50 | `neutral-50` | ![jpg](https://placehold.co/20x20/f1f3f5/f1f3f5/jpg) |
| `--wp--preset--color--neutral-0` | `#f8f9fa` | Neutral 0 | `neutral-0` | ![jpg](https://placehold.co/20x20/f8f9fa/f8f9fa/jpg) |

**Semantic Colors**

| CSS Variable | Color | Name | Slug | Visual |
|--------------|-------|------|------|--------|
| `--wp--preset--color--success-600` | `#40916c` | Success 600 | `success-600` | ![jpg](https://placehold.co/20x20/40916c/40916c/jpg) |
| `--wp--preset--color--success-500` | `#52b788` | Success 500 | `success-500` | ![jpg](https://placehold.co/20x20/52b788/52b788/jpg) |
| `--wp--preset--color--success-100` | `#d8f3dc` | Success 100 | `success-100` | ![jpg](https://placehold.co/20x20/d8f3dc/d8f3dc/jpg) |
| `--wp--preset--color--warning-600` | `#e85d04` | Warning 600 | `warning-600` | ![jpg](https://placehold.co/20x20/e85d04/e85d04/jpg) |
| `--wp--preset--color--warning-500` | `#f48c06` | Warning 500 | `warning-500` | ![jpg](https://placehold.co/20x20/f48c06/f48c06/jpg) |
| `--wp--preset--color--warning-100` | `#ffdd00` | Warning 100 | `warning-100` | ![jpg](https://placehold.co/20x20/ffdd00/ffdd00/jpg) |
| `--wp--preset--color--error-600` | `#dc2f02` | Error 600 | `error-600` | ![jpg](https://placehold.co/20x20/dc2f02/dc2f02/jpg) |
| `--wp--preset--color--error-500` | `#ec5766` | Error 500 | `error-500` | ![jpg](https://placehold.co/20x20/ec5766/ec5766/jpg) |
| `--wp--preset--color--error-100` | `#f4998d` | Error 100 | `error-100` | ![jpg](https://placehold.co/20x20/f4998d/f4998d/jpg) |

**Utility Colors**

| CSS Variable | Color | Name | Slug | Visual |
|--------------|-------|------|------|--------|
| `--wp--preset--color--transparent` | `transparent` | Transparent | `transparent` | — |
| `--wp--preset--color--current` | `currentcolor` | Current | `current` | — |
| `--wp--preset--color--inherit` | `inherit` | Inherit | `inherit` | — |

## Features

Aegis is a comprehensive Full Site Editing (FSE) theme that extends the capabilities of WordPress with powerful features designed for modern web development. Built with performance, accessibility, and developer experience in mind, Aegis provides an extensive toolkit for creating stunning, high-performance websites.

### Core Architecture

**Enhanced Block Supports**: Aegis extends WordPress core blocks with additional appearance controls including box shadows, absolute positioning, CSS transforms, and CSS filters. These enhancements provide granular control over block presentation without requiring custom code.

**Advanced Global Styles**: Leveraging the full power of `theme.json`, Aegis implements a sophisticated design system with comprehensive color palettes, fluid typography scales, intelligent spacing presets, and responsive layout constraints. All styling is managed through the Site Editor for a seamless customization experience.

**Optimized CSS Framework**: The theme features a minimal, performance-focused CSS framework where all stylesheets are conditionally loaded only when required by a page. This intelligent asset loading ensures optimal performance while addressing common core CSS issues.

### Content & Design Tools

**SVG Icon System**: Create inline SVG icons directly within the image block or as inline text. Aegis includes WordPress, Dashicons, and Social Icons by default, with full support for custom SVGs. Simply search for "Icon" in the block inserter to get started.

**Variable Font Library**: Access a curated collection of popular variable Google Fonts, with fonts conditionally loaded based on selections made in Site Editor > Styles. This ensures optimal typography without unnecessary asset bloat.

**Gradient Toolset**: Rich text gradient formats and comprehensive gradient settings for text blocks enable sophisticated visual treatments. The theme includes pre-configured gradients for common use cases, with support for custom gradient creation.

**Advanced Text Formats**: Extended text formatting options including clear formatting, underline, gradient text, dynamic font sizes, and more. These formatting tools provide fine-grained control over typography and text presentation.

### Layout & Navigation

**Full Site Editing Support**: Enhanced page, post, and template part settings make customizing individual pages intuitive and powerful. Aegis provides additional controls and options beyond core WordPress FSE capabilities.

**Responsive Controls**: Built-in responsive utilities including reverse-on-mobile layouts, hide-on-mobile visibility controls, and intelligent breakpoint management ensure your designs look perfect on all devices.

**Flexible Header Styles**: Support for absolute positioned headers, transparent header overlays, and sticky navigation styles. These options enable sophisticated header designs that adapt to different page contexts.

**Mega Menu System**: Create sophisticated multi-column dropdown menus using the core submenu block. Aegis's mega menu implementation leverages native WordPress blocks for maximum compatibility and ease of use.

**CSS-Only Search Toggle**: Full-screen search functionality with a pure CSS implementation—no JavaScript required. This search toggle provides an elegant user experience while maintaining optimal performance.

### User Experience

**Intelligent Dark Mode**: Automatic dark mode support that adapts to user preferences and system settings. Dark mode can be customized or deactivated through the Blockify settings in the page editor, providing flexibility for different use cases.

**Accessibility First**: Designed with accessibility at its core, Aegis prioritizes WCAG compliance, semantic HTML, proper heading hierarchies, and keyboard navigation. The theme is optimized for users with color vision deficiency.

**Performance Optimized**: Every aspect of Aegis is engineered for speed. From conditional asset loading to optimized CSS delivery and minimal JavaScript footprint, the theme ensures fast page loads and excellent Core Web Vitals scores.

### Enhanced Core Blocks

Aegis extends the following WordPress core blocks with additional functionality, styling options, and performance optimizations:

| Block | WordPress Block | Description |
|-------|-----------------|-------------|
| Button | `core/button` | Enhanced button styling with additional appearance controls and hover effects |
| Buttons | `core/buttons` | Extended button group layouts with responsive alignment options |
| Calendar | `core/calendar` | Improved calendar styling and DOM manipulation |
| Code | `core/code` | Enhanced code block with syntax highlighting support |
| Columns | `core/columns` | Extended column layouts with responsive controls |
| Cover | `core/cover` | Advanced cover block with overlay and positioning options |
| Details | `core/details` | Styled accordion/disclosure elements |
| Group | `core/group` | Enhanced group block with additional layout options |
| Heading | `core/heading` | Extended heading styles with gradient and decoration support |
| Image | `core/image` | SVG icon support and advanced image controls |
| List | `core/list` | Enhanced list styling with custom markers |
| Navigation | `core/navigation` | Mega menu support and advanced navigation styles |
| Navigation Submenu | `core/navigation-submenu` | Multi-column dropdown menu support |
| Page List | `core/page-list` | Improved page list rendering |
| Paragraph | `core/paragraph` | Extended text formatting and gradient support |
| Post Author | `core/post-author` | Enhanced author display options |
| Post Comments Form | `core/post-comments-form` | Styled comment form with accessibility improvements |
| Post Content | `core/post-content` | Extended post content rendering |
| Post Date | `core/post-date` | Flexible date formatting options |
| Post Excerpt | `core/post-excerpt` | Enhanced excerpt display with length controls |
| Post Featured Image | `core/post-featured-image` | Advanced featured image options with aspect ratios |
| Post Template | `core/post-template` | Extended query loop template options |
| Post Terms | `core/post-terms` | Enhanced taxonomy term display |
| Post Title | `core/post-title` | Extended title styling options |
| Query | `core/query` | Advanced query block configurations |
| Query Pagination | `core/query-pagination` | Styled pagination with multiple layouts |
| Query Title | `core/query-title` | Enhanced query title rendering |
| Search | `core/search` | CSS-only search toggle with full-screen mode |
| Shortcode | `core/shortcode` | Improved shortcode block rendering |
| Social Link | `core/social-link` | Extended social icon options |
| Social Links | `core/social-links` | Enhanced social links container styling |
| Spacer | `core/spacer` | Responsive spacer with breakpoint controls |
| Table of Contents | `core/table-of-contents` | Styled TOC with smooth scrolling |
| Tag Cloud | `core/tag-cloud` | Enhanced tag cloud styling |
| Template Part | `core/template-part` | Extended template part rendering |
| Video | `core/video` | Advanced video block with lazy loading |

### Custom Blocks

Aegis includes the following custom blocks built specifically for the theme:

| Block | Block Name | Description |
|-------|------------|-------------|
| Modal | `aegis/modal` | An accessible modal dialog with popup, off-canvas, bottom sheet, and fullscreen modes |
| Slider | `aegis/slider` | A responsive slider/carousel with multiple slide types, transitions, and navigation options |
| Slide | `aegis/slide` | An individual slide within a slider block with support for content, image, and video slide types |

### Block Variations

Aegis includes the following custom block variations that extend WordPress core blocks with specialized functionality:

| Block Variation | Base Block | Description |
|-----------------|------------|-------------|
| Accordion List | `core/list` | Transforms list blocks into interactive accordion/collapsible elements |
| Counter | `core/paragraph` | Animated number counter with customizable start/end values and duration |
| Curved Text | `core/paragraph` | Text displayed along a curved SVG path for creative typography |
| Grid | `core/group` | Advanced CSS grid layout with responsive column controls |
| Icon | `core/image` | Inline SVG icons with WordPress, Dashicons, and Social Icons support |
| Marquee | `core/group` | Continuously scrolling horizontal content ticker animation |
| Newsletter | `core/group` | Pre-styled newsletter signup form layout |
| Related Posts | `core/query` | Automatically queries and displays related posts based on taxonomy |
| SVG | `core/image` | Inline SVG rendering with sanitization and styling support |

### Plugin Integrations

Aegis provides seamless integration with popular WordPress plugins, automatically applying theme styling and enhancing compatibility:

| Plugin | Category | Description |
|--------|----------|-------------|
| Advanced Custom Fields | Custom Fields | ACF JSON save/load paths, theme color palette integration, Block Bindings source for Query Loop |
| BunnyCDN | Media/CDN | Theme border radius for iframe embeds, dark/light mode styling for player containers |
| Code Block Pro | Development | Conditional style registration with theme compatibility |
| Fluent Booking | Scheduling | Dark/light mode support for booking calendars, theme-styled patterns |
| Fluent Forms | Forms | Theme-styled form elements and layouts |
| LearnDash | LMS | Focus Mode integration, theme colors and typography, custom block patterns |
| LifterLMS | LMS | Theme colors and typography, custom block patterns replacing defaults |
| Rank Math | SEO | Fallback meta description support, hook integration |
| Sensei LMS | LMS | Theme support declaration, colors and typography, custom block patterns |
| Syntax Highlighting Code Block | Development | Theme color integration for code highlighting |
| WooCommerce | E-commerce | Plugin detection and conditional hook registration |

## Pattern Creation Guidelines

For the construction of patterns pertaining to the default theme, kindly consult the guidelines delineated in the [block-patterns handbook](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/).

- **Category Selection**

When crafting block patterns for WordPress, it is imperative to judiciously select the appropriate category for each pattern. WordPress offers a predefined set of categories, each designed to serve a distinct purpose. We would recommend adhering to these default categories. Multiple categories may be applied by separating them with commas. A list of the relevant slugs is [available for your reference](https://github.com/WordPress/gutenberg/blob/c20350c1d246163201375f090b0b7b4ab49b1dad/packages/block-editor/src/components/inserter/block-patterns-tab.js#L35).

- **Hiding patterns from the inserter**

To regulate the visibility of your block pattern within the WordPress inserter, one can include a specific line of code during the pattern's registration process. This practice is generally employed for utility patterns that are not intended for direct user access via the inserter or the pattern library.

Such utility patterns are often created for specialized purposes, like translation, as exemplified by the 404 pattern.

The requisite line of code to accomplish this is provided below:

` * Inserter: no`

For the purpose of maintaining consistency and clarity, we would recommend prefixing the filenames of hidden block patterns with `hidden-` when naming the pattern files. This convention will facilitate easier identification and management of such patterns.

- **Different translation functions and when to use them**

In software development, especially in the context of internationalization, various translation functions serve distinct purposes. Understanding when to use each one is crucial for effective localization. Here is an overview of different types of translation functions and their recommended use-cases:

`esc_html_x()`: Utilize this function when translation and HTML safety are required for text display. It is particularly beneficial for multilingual websites, as it offers both translation support and HTML security.

`esc_html__()`: Utilize the `esc_html__()` function for the translation and secure rendering of text embedded in HTML, especially when context-specific translations are not necessary. This function serves as a simpler alternative to `esc_html_x()`.

`esc_attr__()` and `esc_attr_x()`: Employ the `esc_attr__()` and `esc_attr_x()` functions for the secure translation and rendering of text intended for HTML attributes, including elements like image source URLs or link targets. These functions contribute to security by sanitizing user inputs, making them safe for attribute usage.

`esc_html_e`: The `esc_html_e` function operates similarly to `esc_html__()`, with the added convenience of directly outputting the string, thereby eliminating the need for an explicit echo statement.

When dealing with simple HTML tags within translatable strings, employing `echo wp_kses_post( __( 'Lorem ipsum <em>Hello</em> dolor sit amet.', 'textdomain' ) );` is advisable. This approach not only makes the syntax more transparent for translators but also affords them the flexibility to remove the markup should it prove incompatible with their respective languages.

These functions serve to bolster both security measures and localization initiatives within WordPress block patterns. They ensure that the text is not only secure for display but also readily translatable, thereby accommodating a global audience.

- **Patterns with images**

To generate dynamic image links within your block patterns, it is advisable to employ the `get_template_directory_uri()` function. This function fetches the URL of the active theme's directory, thereby ensuring that the image links remain relative to the theme. This is crucial for maintaining link integrity, particularly if the website's directory structure undergoes changes or if a child theme is in use. Such a practice is integral for ensuring the long-term stability and portability of your patterns.

It is imperative to include alternative text (alt text) for your images to enhance accessibility. Additionally, removing the IDs from these images is crucial for ensuring their versatility across different implementations.

```
<!-- wp:image {"id":125,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://aegis.local/wp-content/themes/aegis/assets/images/project.webp" alt="" class="wp-image-125"/></figure>
<!-- /wp:image -->
```

For example, turns into:

```
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/project.webp" alt="<?php echo esc_attr_x( 'Picture of a Project', 'Alt text for project picture', 'aegis' ); ?>"/></figure>
<!-- /wp:image -->
```

- **Use of Post Types, Block Types and Template Types**

We employ Block Types when a pattern incorporates custom markup tailored for a specific block or one of the default template parts, such as the footer or header. Utilizing Block Types will prompt the pattern as a suggestion when a user inserts the corresponding block or template part. This is particularly useful for specialized blocks like query and post-content, as well as for template parts like the footer.

Template Types are used when we wish to offer our pattern as a suggestion for a specific template. In such instances, we provide the template slug, which could be identifiers like `404`, `home`, or `single`, among others.

Post Types serve to limit the types of posts for which a pattern can be used. This is most commonly employed for full-page patterns, allowing you to specify the kind of posts that can utilize the particular pattern.

- **Spacing, Colors and Font Sizes**

Utilizing presets for elements like spacing, font sizes, and colors in WordPress block patterns is favored over using hardcoded values, and this preference is underpinned by three primary considerations:

*Consistency*: Presets contribute to a harmonious design throughout the theme, thereby fostering a unified visual aesthetic.

*Scalability*: Employing presets simplifies the process of making global design adjustments, thereby conserving both time and development effort.

*Accessibility*: The use of presets aids in complying with accessibility guidelines, thereby rendering your patterns more usable and legible for a diverse audience.

- **Additional Tips**

It is essential to maintain a clean and adaptable codebase when working with WordPress themes and blocks. Just as it is prudent to remove IDs from image blocks for versatility and broader applicability, it is similarly important to remove the `queryId` attribute from query blocks. This practice enhances the flexibility of your query blocks, making them more reusable and portable.

Additionally, if any of your template parts possess a `theme` attribute, this should be eliminated as well. Removing the `theme` attribute ensures that the template parts can be easily transferred and reused across different themes without being tightly bound to a specific one.

By adhering to these guidelines, you further standardize your blocks and template parts, thereby making them more universally applicable and easier to manage.

```
<!-- wp:query {"queryId":18,"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
```

Turns into:

```
<!-- wp:query {"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
```

And:

```
<!-- wp:template-part {"slug":"header","theme":"aegis","area":"header"} /-->
```

Turns into:

```
<!-- wp:template-part {"slug":"header","area":"header"} /-->
```

Here are some best practices that can optimize your workflow and enhance our theme's functionality:

1. **Centralizing Common Properties**: If you find yourself repeatedly assigning the same properties to a particular block type—such as applying a border radius to image blocks—consider consolidating these recurring settings in the `theme.json` file. This promotes a more efficient, DRY (Don't Repeat Yourself) approach to theme development.

2. **Prefixing Full-Page Patterns**: For clarity and ease of identification, prefix all full-page patterns with `page-`. This nomenclature makes it easier to distinguish these patterns from others and streamlines the pattern selection process.

3. **Pattern Order in the Inserter**: The order in which patterns appear in the inserter is determined alphabetically by the name of the file. If you wish to influence this order, consider renaming the files accordingly.

By adhering to these practices, you can make your development process more streamlined, your codebase more maintainable, and your user experience more intuitive.

## Development

### Getting Started with Aegis

To get started with Aegis development:

1. Set up a [WordPress instance locally](#deploying-wordpress-locally).
2. Download [Aegis](https://github.com/aegiswp/theme/releases/).
3. Unzip and upload the theme into your `/wp-content/themes/` directory.

If you find setting up WordPress locally overwhelming, consider using [wp-env](https://developer.wordpress.org/block-editor/getting-started/devenv/), [Local](https://localwp.com/), or [DevKinsta](https://kinsta.com/devkinsta/).


#### Requirements

- [Aegis](https://github.com/aegiswp/theme/releases/)
- [WordPress 6.6+](https://wordpress.org/download/)
- PHP 7.4+
- License: [GPLv3](https://www.gnu.org/licenses/gpl-3.0.html) or later.


> **Note**
> Some features may require the latest WordPress version or the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) for full functionality.


Some Aegis features and/or [pull requests](https://github.com/aegiswp/theme/pulls) may require the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) trunk and will be described or tagged accordingly.

To optionally run tests locally, it will also be required:

- [Node.js](https://nodejs.org/en/)
- [Composer](https://getcomposer.org/)

You can install the test-specific development dependencies by running `npm i && composer install`.

The following test commands are then available:

- `npm run lint:css` lints and autofixes where possible the CSS
- `composer run analyze [filename.php]` statically analyzes PHP for bugs
- `composer run lint` checks PHP for syntax errors
- `composer run standards:check` checks PHP for standards errors according to [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- `composer run standards:fix` attempts to automatically fix errors


### Deploying WordPress Locally

Just in case you prefer to install WordPress from the ground up:

You will need a basic understanding of how to use the command line on your computer. This will allow you to set up the local development environment, start it and stop it when necessary, and run the tests.

You will need Node and npm installed on your computer. Node is a JavaScript runtime used for developer tooling, and npm is the package manager included with Node. If you have a package manager installed for your operating system, setup can be as straightforward as:

* macOS: `brew install node`
* Windows: `choco install nodejs`
* Ubuntu: `apt install nodejs npm`

If you are not using a package manager, please check the [Node.js download page](https://nodejs.org/en/download/) for installers and binaries.

You will also need [Docker](https://www.docker.com/products/docker-desktop) installed and running on your computer. Docker is the virtualization software that powers the local development environment. Docker can be installed just like any other regular application.


### Development Environment Commands

Ensure [Docker](https://www.docker.com/products/docker-desktop) is running before using these commands.


#### How to start the development environment for the first time

Start by cloning the Aegis theme repository using `git clone https://github.com/aegiswp/theme.git`.

Then navigate to the repository folder `cd theme` and run the following commands:

```
npm install
npm run build:dev
npm run env:start
npm run env:install
```

Your WordPress site will accessible at http://localhost:8889. You can see or change configurations in the `.env` file located at the root of the project directory.


#### To watch for changes

If you are making changes to Aegis core files, you should start the file watcher in order to build or copy the files as necessary:

```
npm run dev
```

To stop the file watcher, please press `ctrl+c`.


#### To run a [WP-CLI](https://make.wordpress.org/cli/handbook/) command

```
npm run env:cli <command>
```

WP-CLI has a plenty of [useful commands](https://developer.wordpress.org/cli/commands/) you can use to work on your Aegis site.

Where the documentation mentions running `wp`, run `npm run env:cli` instead. For example:

```
npm run env:cli help
```


#### How to run the tests

These commands run the PHP and end-to-end test suites, respectively:

```
npm run test:php
npm run test:e2e
```


#### How to restart the development environment

You may want to restart the environment if you have made changes to the configuration in the `docker-compose.yml` or `.env` files.

You can restart the environment with:

```
npm run env:restart
```


#### How to stop the development environment

You can stop the environment when you are not using it to preserve your computer's power and resources:

```
npm run env:stop
```


#### How to start the development environment again

Starting the environment again is a single command:

```
npm run env:start
```


## Credentials

These are the default environment credentials:

* Database Name: `wordpress_develop`
* Username: `root`
* Password: `password`

To login to the site, navigate to http://localhost:8889/wp-admin.

* Username: `admin`
* Password: `password`

To generate a new password (recommended):

1. Go to the Dashboard.
2. Click the Users menu on the left.
3. Click the Edit link below the admin user.
4. Scroll down and click 'Generate password'. Either use this password (recommended) or change it, then click 'Update User'. If you use the generated password be sure to save it somewhere (password manager, etcetera).


## Contributing

Contributing to the Aegis theme or any other open-source project can be a rewarding experience, both for personal growth and for the community at large. Here are some advices for contributors to ensure a smooth and effective contribution process:

### Communication and Collaboration

**Read the Documentation**: Always start by reading the project's documentation and guidelines. Understanding the project's structure and coding standards is crucial for effective contribution.

**Join Community Channels**: Most projects have a [community chat or forum](https://www.facebook.com/groups/aegiswp). Join these channels to ask questions, share ideas, and stay updated.

**Start Small**: If you are new to the project, begin with "good first issue" or "beginner-friendly" tags. These are usually easier to tackle and a good place to start.

### Code Quality

**Follow Coding Standards**: Adhere to the coding standards and guidelines provided by the project. This ensures consistency and readability.

**Write Clean Code**: Keep your code as clean and as simple as possible. Simplicity often leads to fewer bugs and easier maintenance.

**Comment Wisely**: Comment your code to explain why you did something, not what you did. Good code mostly speaks for itself.

### Testing and Validation

**Test Thoroughly**: Before submitting a pull request, test your changes rigorously to ensure they do not introduce new bugs.

**Cross-Browser Compatibility**: Make sure to test the features in various browsers to ensure compatibility.

### Version Control

**Use Descriptive Commit Messages**: Your commit messages should be descriptive enough to let other contributors understand the changes you have made.

**Keep Commits Focused**: Each commit should represent a single logical change. Avoid mixing multiple changes into a single commit.

### Pull Requests and Reviews

**Pull Requests Descriptions**: When submitting a pull request, include a comprehensive description explaining the need for the changes, how you have implemented them, and any additional context.

**Be Open to Feedback**: Once you submit a Pull Request, maintainers or other community members may suggest changes. Be open to feedback and willing to make revisions.

### Final Checks

**Check for Upstream Changes**: Before making a pull request, make sure you have updated your fork with the latest changes from the main repository to minimize merge conflicts.

**Documentation**: If your changes include new features or significant modifications, update the relevant documentation.

By adhering to these tips and best practices, you will be making a valuable contribution to the project and fostering a healthy, collaborative community.

Before contributing, please read the contributors' [Code of Conduct](https://github.com/aegiswp/theme/blob/main/CODE_OF_CONDUCT.md) and [Contributing](https://github.com/aegiswp/theme/blob/main/CONTRIBUTING.md) for information about how to open bug reports, contribute patches, test changes, write documentation, or get involved in any way you can.

If after reading you still wish to contribute with code, the list of [open issues](https://github.com/aegiswp/theme/issues) is a superb place to start scrutinising for tasks. However, [pull requests](https://github.com/aegiswp/theme/pulls) are preferred when linked to an existing issue.

Be advised that contributing is not just for developers. We welcome anyone willing to contribute with code, [testing](#getting-started), triage, discussion, designing while building patterns and templates, making Aegis more accessible, etcetera. So please, feel free to look through [open issues](https://github.com/aegiswp/theme/issues), and join wherever you feel most comfortable.


## Development

Aegis aims to minimize asset loading through a highly performant approach. The theme relies on the [Block Editor](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/) and [Global Styles](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/) for most visual rendering, embracing a Full Site Editing philosophy.

Avoid building custom PHP or JavaScript workarounds for functionality already provided by Aegis or the Block Editor. Aegis is minimalistic, lightweight, and performant—designed with accessibility in mind, particularly for users with color vision deficiency. Keep the code simple.

Aegis has no unnecessary build process, maintaining simplicity and performance.

If you have [contributed](CONTRIBUTORS.md) to Aegis, you will receive proper credit. We update [CONTRIBUTORS.md](CONTRIBUTORS.md) periodically. If we have missed anyone, please open a [pull request](https://github.com/aegiswp/theme/pulls) or [issue](https://github.com/aegiswp/theme/issues).


## Experimenting

If you wish to experiment with custom code, consider using the Aegis Child Theme for customization or extending functionality with code snippets.

| Repository | Description |
| --- | --- |
| [Aegis Child Theme](https://github.com/aegiswp/theme-child) | Official Aegis Child Theme |
| [Aegis Code Snippets](https://github.com/aegiswp/code-snippets) | Official Aegis Code Snippets |


## Resources

Here are some resources that may be helpful to context for learning more about developing block-based themes:

- [Create a Block Theme (tutorial)](https://developer.wordpress.org/block-editor/how-to-guides/themes/create-block-theme/)
- [Full site editing development in the Gutenberg Repository](https://github.com/WordPress/gutenberg/labels/%5BFeature%5D%20Full%20Site%20Editing)
- [Block-based Theme Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/)
- [Global Styles and theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Global Styles development in the Gutenberg Repository](https://github.com/WordPress/gutenberg/issues?q=is%3Aissue+is%3Aopen+label%3A%22Global+Styles%22)
- [theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)


## Demos

Explore Aegis in action through our official child themes:

| Child Theme | Description |
| --- | --- |
| [Aegis Child Theme](https://github.com/aegiswp/theme-child) | Official starter child theme for Aegis |
| [Aegis Code Snippets](https://gist.github.com/atmostfear-entertainment) | Collection of code snippets and customizations |


## Roadmap

**Is there a public roadmap?**

No, and this is by design. Although we follow a strict internal roadmap, we choose not to broadcast it to protect our innovations and give our team the peace of mind to perfect complex features without public pressure. We prefer the element of surprise by delivering unique tools that delight you rather than just ticking boxes on a public list.


## Credits

The thumbnail on this README.md file:

Aegis by [Atmostfear Entertainment S.A.S.](https://www.atmostfear-entertainment.com/), CCO


## Suggestions?

To propose improvements to this repository, please open an [issue](https://github.com/aegiswp/theme/issues) or [pull request](https://github.com/aegiswp/theme/pulls).
