# Aegis

Welcome to the Aegis WordPress Block Theme development repository.

![Aegis](https://github.com/user-attachments/assets/4bb9bafd-cbdc-4931-b924-a2ef5f332745)

##### Table of Contents

-   [Introduction](#introduction)
    -   [What is Full Site Editing (FSE)?](#what-is-full-site-editing-fse)
    -   [Unique Benefits of Aegis](#unique-benefits-of-aegis)
-   [Working with Block Themes](#working-with-block-themes)
    -   [Site Editor](#site-editor)
    -   [Patterns](#patterns)
        -   [Creating page designs with patterns](#creating-page-designs-with-patterns)
    -   [Global Styles](#global-styles)
    -   [Template Parts](#template-parts)
    -   [Export Your Site](#export-your-site)
-   [Presets](#presets)
    -   [Layout Presets](#layout-presets)
    -   [Spacing Presets](#spacing-presets)
    -   [Token Cheat-sheet](#token-cheat-sheet)
        -   [Default Global Style](#default-global-style)
        -   [Onyx Global Style](#onyx-global-style)
    -   [Pattern Creation Guidelines](#pattern-creation-guidelines)
-   [Development](#development)
-   [Getting Started with Aegis](#getting-started-with-aegis)
    -   [Requirements](#requirements)
-   [Deploying WordPress Locally](#deploying-wordpress-locally)
    -   [Development Environment Commands](#development-environment-commands)
    -   [Starting the Development Environment](#starting-the-development-environment)
    -   [Stopping and Restarting the Development Environment](#stopping-and-restarting-the-development-environment)
    -   [Watching for Changes](#watching-for-changes)
    -   [Running WP-CLI Commands](#running-wp-cli-commands)
    -   [Running Tests](#running-tests)
    -   [Additional Commands](#additional-commands)
    -   [Credentials](#credentials)
    -   [To restart the development environment](#how-to-restart-the-development-environment)
    -   [Credentials](#credentials)
-   [Contributing](#contributing)
    -   [Communication and Collaboration](#communication-and-collaboration)
    -   [Code Quality](#code-quality)
    -   [Testing and Validation](#testing-and-validation)
    -   [Version Control](#version-control)
    -   [Pull Requests and Reviews](#pull-requests-and-reviews)
    -   [Final Checks](#final-checks)
-   [Experimenting](#experimenting)
-   [Resources](#resources)
-   [Demos](#demos)
-   [Roadmap](#roadmap)
-   [Credits](#credits)
-   [Suggestions?](#suggestions)

## Introduction

Aegis is a modern WordPress block theme built to fully utilize the capabilities of Full Site Editing (FSE). With its foundation in Vanilla JavaScript and Flexbox Grid, Aegis provides a lightweight, highly flexible, and accessible platform for building and managing WordPress sites.

### What is Full Site Editing (FSE)?

Full Site Editing (FSE) is a set of features introduced in WordPress that allows users to build and customize all parts of their website using blocks, without needing to rely on custom code or external page builders. FSE enables the creation and modification of templates, headers, footers, sidebars, and more directly within the WordPress site editor, providing a more intuitive and cohesive editing experience.

### Unique Benefits of Aegis

Aegis is designed to offer a range of benefits for both developers and end-users:

-   **Wireframed Structure:** Aegis is wireframed for clarity and simplicity, offering a clean and minimalist foundation that allows developers and designers to focus on the content and user experience without unnecessary visual distractions.

-   **Intrinsic Design for Responsiveness:** Utilizing Intrinsic Design principles, Aegis ensures that the layout adapts naturally to any screen size or device. This approach to responsive design provides an optimal viewing experience by allowing content to scale fluidly, ensuring consistency and readability across all devices.

-   **Performance Optimization:** Aegis is built with a focus on speed and efficiency, ensuring quick load times and a smooth user experience.

-   **Accessibility First:** The theme adheres to accessibility standards to ensure that all users, regardless of their abilities, have a seamless experience.

-   **Flexible Customization:** Aegis allows for complete customization using the block editor, enabling users to create unique layouts and designs without touching a line of code.

-   **Multisite and Plugin Compatibility:** Supports multisite configurations and integrates seamlessly with popular plugins such as WooCommerce, SEO tools, and Learning Management Systems (LMS).

-   **Future-Proof Design:** Regular updates ensure compatibility with the latest WordPress developments, keeping your website up-to-date with new features and improvements.

Whether you are building a simple blog, a portfolio site, or a complex e-commerce platform, Aegis provides the tools and flexibility needed to create beautiful, functional, and scalable websites with ease.

## Working with Block Themes

When you activate Aegis, it operates in a manner similar to traditional WordPress themes, allowing you to seamlessly create posts and pages as you are accustomed to. However, Aegis distinguishes itself as a block theme, offering enhanced features such as the site editor, patterns, global styles, and much more.

In essence, a block theme like Aegis is a WordPress theme constructed entirely of blocks. This means that in addition to editing the content of posts and pages, you have the capability to use the block editor for modifying every other component of your website, including headers, footers, and various templates. It serves as a comprehensive editor for your website's entire design and layout.

### Site Editor

The WordPress site editor heralds a transformative phase in the art of website creation with WordPress. Utilizing the capabilities of blocks, patterns, and a wide array of drag-and-drop design tools, the site editor enables you to construct pages directly within WordPress, obviating the need for a separate page builder.

To refine your website through the site editor, simply navigate to` Appearance → Editor`. This interface grants you the ability to create and modify templates, develop menus, tailor your site's styles, choose your color palette, fine-tune typography, adjust block styles, and much more. Essentially, this platform serves as your digital canvas, allowing you to design, build, and perfect your website prior to its official launch.

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

| `theme.json` preset | `theme.json` value |
| ------------------- | ------------------ |
| `contentSize`       | `720px`            |
| `wideSize`          | `1620px`           |

### Spacing Presets

| Figma Token   | CSS Variable                 | `theme.json` value       | `theme.json` slug |
| ------------- | ---------------------------- | ------------------------ | ----------------- |
| `Spacing/10`  | `--wp--preset--spacing--10`  | `min(0.625rem, 1vw)`     | `10`              |
| `Spacing/20`  | `--wp--preset--spacing--20`  | `min(1.25rem, 1vw)`      | `20`              |
| `Spacing/30`  | `--wp--preset--spacing--30`  | `min(2rem, 5vw)`         | `30`              |
| `Spacing/40`  | `--wp--preset--spacing--40`  | `min(4rem, 8vw)`         | `40`              |
| `Spacing/50`  | `--wp--preset--spacing--50`  | `min(6.5rem, 13vw)`      | `50`              |
| `Spacing/60`  | `--wp--preset--spacing--60`  | `min(10.5rem, 24vw)`     | `60`              |
| `Spacing/70`  | `--wp--preset--spacing--70`  | `min(5rem, 14vw)`        | `70`              |
| `Spacing/80`  | `--wp--preset--spacing--80`  | `min(7rem, 14vw)`        | `80`              |
| `Spacing/90`  | `--wp--preset--spacing--90`  | `min(5.625rem, 5.625vw)` | `90`              |
| `Spacing/100` | `--wp--preset--spacing--100` | `min(6.25rem, 6.25vw)`   | `100`             |

### Token Cheat-sheet

#### Default Global Style

| Figma Token | CSS Variable                    | Color     | Name       | Slug       | Visual                                               |
| ----------- | ------------------------------- | --------- | ---------- | ---------- | ---------------------------------------------------- |
| N/A         | --wp--preset--color--background | `#f6f5f2` | Background | background | ![jpg](https://placehold.co/20x20/f6f5f2/f6f5f2/jpg) |
| N/A         | --wp--preset--color--foreground | `#1c1c1e` | Foreground | foreground | ![jpg](https://placehold.co/20x20/1c1c1e/1c1c1e/jpg) |
| N/A         | --wp--preset--color--primary    | `#252528` | Primary    | primary    | ![jpg](https://placehold.co/20x20/252528/252528/jpg) |
| N/A         | --wp--preset--color--secondary  | `#5a5a60` | Secondary  | secondary  | ![jpg](https://placehold.co/20x20/5a5a60/5a5a60/jpg) |
| N/A         | --wp--preset--color--tertiary   | `#f0eee9` | Tertiary   | tertiary   | ![jpg](https://placehold.co/20x20/f0eee9/f0eee9/jpg) |
| N/A         | --wp--preset--color--quaternary | `#e6e2da` | Quaternary | quaternary | ![jpg](https://placehold.co/20x20/e6e2da/e6e2da/jpg) |
| N/A         | --wp--preset--color--quinary    | `#dcd6cb` | Quinary    | quinary    | ![jpg](https://placehold.co/20x20/dcd6cb/dcd6cb/jpg) |
| N/A         | --wp--preset--color--senary     | `#d2cabc` | Senary     | senary     | ![jpg](https://placehold.co/20x20/d2cabc/d2cabc/jpg) |

#### Onyx Global Style

| Figma Token | CSS Variable                    | Color     | Name       | Slug       | Visual                                               |
| ----------- | ------------------------------- | --------- | ---------- | ---------- | ---------------------------------------------------- |
| N/A         | --wp--preset--color--background | `#f9f9f9` | Background | background | ![jpg](https://placehold.co/20x20/f9f9f9/f9f9f9/jpg) |
| N/A         | --wp--preset--color--foreground | `#0a0a0a` | Foreground | foreground | ![jpg](https://placehold.co/20x20/0a0a0a/0a0a0a/jpg) |
| N/A         | --wp--preset--color--primary    | `#252528` | Primary    | primary    | ![jpg](https://placehold.co/20x20/252528/252528/jpg) |
| N/A         | --wp--preset--color--secondary  | `#3e3d3d` | Secondary  | secondary  | ![jpg](https://placehold.co/20x20/3e3d3d/3e3d3d/jpg) |
| N/A         | --wp--preset--color--tertiary   | `#ebebef` | Tertiary   | tertiary   | ![jpg](https://placehold.co/20x20/ebebef/ebebef/jpg) |
| N/A         | --wp--preset--color--quaternary | `#d7dade` | Quaternary | quaternary | ![jpg](https://placehold.co/20x20/d7dade/d7dade/jpg) |
| N/A         | --wp--preset--color--quinary    | `#ccd0d4` | Quinary    | quinary    | ![jpg](https://placehold.co/20x20/ccd0d4/ccd0d4/jpg) |
| N/A         | --wp--preset--color--senary     | `#b5bcc2` | Senary     | senary     | ![jpg](https://placehold.co/20x20/b5bcc2/b5bcc2/jpg) |

### Pattern Creation Guidelines

For the construction of patterns pertaining to the default theme, kindly consult the guidelines delineated in the [block-patterns handbook](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/).

-   **Category Selection**

When crafting block patterns for WordPress, it is imperative to judiciously select the appropriate category for each pattern. WordPress offers a predefined set of categories, each designed to serve a distinct purpose. We would recommend adhering to these default categories. Multiple categories may be applied by separating them with commas. A list of the relevant slugs is [available for your reference](https://github.com/WordPress/gutenberg/blob/c20350c1d246163201375f090b0b7b4ab49b1dad/packages/block-editor/src/components/inserter/block-patterns-tab.js#L35).

-   **Hiding patterns from the inserter**

To regulate the visibility of your block pattern within the WordPress inserter, one can include a specific line of code during the pattern's registration process. This practice is generally employed for utility patterns that are not intended for direct user access via the inserter or the pattern library.

Such utility patterns are often created for specialized purposes, like translation, as exemplified by the 404 pattern.

The requisite line of code to accomplish this is provided below:

` * Inserter: no`

For the purpose of maintaining consistency and clarity, we would recommend prefixing the filenames of hidden block patterns with `hidden-` when naming the pattern files. This convention will facilitate easier identification and management of such patterns.

-   **Different translation functions and when to use them**

In software development, especially in the context of internationalization, various translation functions serve distinct purposes. Understanding when to use each one is crucial for effective localization. Here is an overview of different types of translation functions and their recommended use-cases:

`esc_html_x()`: Utilize this function when translation and HTML safety are required for text display. It is particularly beneficial for multilingual websites, as it offers both translation support and HTML security.

`esc_html__()`: Utilize the `esc_html__()` function for the translation and secure rendering of text embedded in HTML, especially when context-specific translations are not necessary. This function serves as a simpler alternative to `esc_html_x()`.

`esc_attr__()` and `esc_attr_x()`: Employ the `esc_attr__()` and `esc_attr_x()` functions for the secure translation and rendering of text intended for HTML attributes, including elements like image source URLs or link targets. These functions contribute to security by sanitizing user inputs, making them safe for attribute usage.

`esc_html_e`: The `esc_html_e` function operates similarly to `esc_html__()`, with the added convenience of directly outputting the string, thereby eliminating the need for an explicit echo statement.

When dealing with simple HTML tags within translatable strings, employing `echo wp_kses_post( __( 'Lorem ipsum <em>Hello</em> dolor sit amet.', 'textdomain' ) );` is advisable. This approach not only makes the syntax more transparent for translators but also affords them the flexibility to remove the markup should it prove incompatible with their respective languages.

These functions serve to bolster both security measures and localization initiatives within WordPress block patterns. They ensure that the text is not only secure for display but also readily translatable, thereby accommodating a global audience.

-   **Patterns with images**

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

-   **Use of Post Types, Block Types and Template Types**

We employ Block Types when a pattern incorporates custom markup tailored for a specific block or one of the default template parts, such as the footer or header. Utilizing Block Types will prompt the pattern as a suggestion when a user inserts the corresponding block or template part. This is particularly useful for specialized blocks like query and post-content, as well as for template parts like the footer.

Template Types are used when we wish to offer our pattern as a suggestion for a specific template. In such instances, we provide the template slug, which could be identifiers like `404`, `home`, or `single`, among others.

Post Types serve to limit the types of posts for which a pattern can be used. This is most commonly employed for full-page patterns, allowing you to specify the kind of posts that can utilize the particular pattern.

-   **Spacing, Colors and Font Sizes**

Utilizing presets for elements like spacing, font sizes, and colors in WordPress block patterns is favored over using hardcoded values, and this preference is underpinned by three primary considerations:

_Consistency_: Presets contribute to a harmonious design throughout the theme, thereby fostering a unified visual aesthetic.

_Scalability_: Employing presets simplifies the process of making global design adjustments, thereby conserving both time and development effort.

_Accessibility_: The use of presets aids in complying with accessibility guidelines, thereby rendering your patterns more usable and legible for a diverse audience.

-   **Additional Tips**

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

1. Set up a [WordPress](#deploying-wordpress-locally) instance.
2. Download [Aegis](https://github.com/aegiswp/theme/
3. Unzip, and upload this repository into your `/wp-content/themes/` directory.

Just in case you find the method to install WordPress locally too overwhelming, then we would recommend experimenting with [wp-env](https://developer.wordpress.org/block-editor/getting-started/devenv/), [Local](https://localwp.com/) or [DevKinsta](https://kinsta.com/devkinsta/).

#### Requirements

-   [Aegis](https://github.com/aegiswp/theme/releases/)
-   [WordPress 6.0+](https://wordpress.org/download/)
-   PHP 7.4+
-   License: [GPLv3](https://www.gnu.org/licenses/gpl-3.0.html) or later.

> **Warning**
> Please note that the documentation below is based partially on the upcoming Aegis's [Full Site Editing](https://developer.wordpress.org/block-editor/getting-started/full-site-editing/) features.

Some Aegis features and/or [pull requests](https://github.com/aegiswp/theme/pulls) may require the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) trunk and will be described or tagged accordingly.

To optionally run tests locally, it will also be required:

-   [Node.js](https://nodejs.org/en/)
-   [Composer](https://getcomposer.org/)

You can install the test-specific development dependencies by running `npm i && composer install`.

The following test commands are then available:

-   `npm run lint:css` lints and autofixes where possible the CSS
-   `composer run analyze [filename.php]` statically analyzes PHP for bugs
-   `composer run lint` checks PHP for syntax errors
-   `composer run standards:check` checks PHP for standards errors according to [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
-   `composer run standards:fix` attempts to automatically fix errors

### Deploying WordPress Locally

Just in case you prefer to install WordPress from the ground up:

You will need a basic understanding of how to use the command line on your computer. This will allow you to set up the local development environment, start it and stop it when necessary, and run the tests.

You will need Node and npm installed on your computer. Node is a JavaScript runtime used for developer tooling, and npm is the package manager included with Node. If you have a package manager installed for your operating system, setup can be as straightforward as:

-   macOS: `brew install node`
-   Windows: `choco install nodejs`
-   Ubuntu: `apt install nodejs npm`

If you are not using a package manager, please check the [Node.js download page](https://nodejs.org/en/download/) for installers and binaries.

You will also need [Docker](https://www.docker.com/products/docker-desktop) installed and running on your computer. Docker is the virtualization software that powers the local development environment. Docker can be installed just like any other regular application.

### Development Environment Commands

To work effectively with the Aegis theme, you need a properly configured development environment. The following commands will help you set up, manage, and maintain your local WordPress environment for Aegis development.

#### Starting the Development Environment

Before you begin, ensure that Docker is running on your machine.

1. **Clone the Repository:**

```
git clone https://github.com/atmostfear-entertainment/aegis.git
cd aegis
```

2. **Install Dependencies:**

Install the required Node.js and Composer dependencies:

```
npm install
composer install
```

3. **Build the Environment:**

Build the development environment:

```
npm run build:dev
```

4. **Start the Environment:**

Start the development environment using Docker:

```
npm run env:start
npm run env:install
```

Your local WordPress site will be accessible at [https://localhost:8889](https://localhost:8889)

#### Stopping and Restarting the Development Environment

-   **Stop the Environment:** To stop the development environment and free up system resources:

```
npm run env:stop
```

-   **Restart the Environment:** To restart the environment, use:

```
npm run env:restart
```

#### Watching for Changes

If you are actively developing and want to watch for changes in the codebase, use the following command to start a file watcher:

```
npm run dev
```

To stop the file watcher, press `Ctrl + C.`

#### Running WP-CLI Commands

To run WP-CLI commands within your development environment:

```
npm run env:cli <command>
```

Replace `<command>` with the desired WP-CLI command. For example, to check the available WP-CLI commands:

```
npm run env:cli help
```

#### Running Tests

To run PHP and end-to-end tests for the Aegis theme, use the following commands:

-   **PHP Tests:**

```
npm run test:php
```

-   **End-to-End Tests:**

```
npm run test:e2e
```

#### Additional Commands

-   **Rebuild the Environment:** If you make changes to environment configuration files (like `docker-compose.yml` or `.env`), rebuild the environment with:

```
npm run env:restart
```

-   **Update Dependencies:** To update dependencies for both `Node.js` and `Composer,` run:

```
npm update
composer update
```

#### Credentials

These are the default credentials for the development environment:

-   **Database Name:** `wordpress_develop`
-   **Username:** `root`
-   **Password:** `password`

To access the local WordPress admin dashboard, navigate to [https://localhost:8889/wp-admin](https://localhost:8889/wp-admin).

-   **Admin Username:** `admin`
-   **Password:** `password`

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

## Experimenting

If you wish to experiment with custom code, we will encourage you to install and use the Aegis Child for further custom customisation, or further extend it with code snippets.

| Repository                                                                        | Description                  |
| --------------------------------------------------------------------------------- | ---------------------------- |
| [Aegis Child Theme](https://github.com/atmostfear-entertainment/aegis-child)      | Official Aegis Child Theme   |
| [Aegis Code Snippets](https://github.com/atmostfear-entertainment/aegis-snippets) | Official Aegis Code Snippets |

## Resources

Here are some resources that may be helpful to context for learning more about developing block-based themes:

-   [Create a Block Theme (tutorial)](https://developer.wordpress.org/block-editor/how-to-guides/themes/create-block-theme/)
-   [Full site editing development in the Gutenberg Repository](https://github.com/WordPress/gutenberg/labels/%5BFeature%5D%20Full%20Site%20Editing)
-   [Block-based Theme Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/)
-   [Global Styles and theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
-   [Global Styles development in the Gutenberg Repository](https://github.com/WordPress/gutenberg/issues?q=is%3Aissue+is%3Aopen+label%3A%22Global+Styles%22)
-   [theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)

## Demos

Unfortunately, at the moment, we do not have any demos yet. Even so, we will be toiling on quite a few uniquely crafted demos without following what typically is offered within the ecosystem.

## Roadmap

Fortunately, Aegis has a [public roadmap](https://trello.com/b/x75Zqk7W/aegis-theme-roadmap) that can be accessed to observe both its development and progress.

## Credits

The thumbnail on this README.md file:

Aegis by Atmostfear Entertaiment SAS, CCO

## Suggestions?

If you would wish to propose any improvements to this repository, please feel free to open an [issue](https://github.com/aegiswp/theme/issues) or [pull request](https://github.com/aegiswp/theme/pulls).
