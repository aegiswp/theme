# Aegis

Welcome to the Aegis Theme development repository.

![Aegis](https://github.com/atmostfear-entertainment/aegis/assets/34287288/fedf4c3f-26a5-45f7-ac93-52b9d3e49fc8)


##### Table of Contents

- [Introduction](#introduction)
- [Description](#description)
- [Working with Block Themes](#working-with-block-themes)
  - [Site Editor](#site-editor)
  - [Patterns](#patterns)
  - [Global Styles](#global-styles)
  - [Template Parts](#template-parts)
  - [Export Your Site](#export-your-site)
- [Presets](#presets)
  - [Layout Presets](#layout-presets)
  - [Spacing Presets](#spacing-presets)
- [Development](#development)
- [Getting Started with Aegis](#getting-started-with-aegis)
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
- [Development](#development)
- [Experimenting](#experimenting)
- [Resources](#resources)
- [Demos](#demos)
- [Roadmap](#roadmap)
- [Credits](#credits)
- [Suggestions?](#suggestions)


## Introduction

Aegis stands tall in the realm of Full Site Editing (FSE) themes, offering a steadfast foundation that seamlessly fuses Vanilla JS with the adaptability of Flexbox Grid.


## Description

Aegis epitomizes a perfect balance between performance and aesthetics. Utilizing the prowess of Vanilla JavaScript, it ensures a lightweight and powerful foundation. The integration of Flexbox Grid means the theme is entirely responsive, flexible, and easy to extend, always prioritizing quality.

Upholding the highest coding standards, Aegis is the ultimate choice for creating scalable websites, from intimate personal blogs to professional portfolios and expansive business sites.

Designed for expansive compatibility, Aegis effortlessly supports multisite configurations and is primed for WooCommerce, search engine optimization, and learning management system functionalities. Every detail of this theme has been meticulously designed, emphasizing performance, accessibility, and user experience. Built to endure, Aegis is a theme destined to remain relevant and efficient through the ages.

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

## Presets

### Layout Presets

| `theme.json` preset | `theme.json` value |
|---------------|---------|
| `contentSize` | `720px` |
| `wideSize`    | `1620px` |

### Spacing Presets

| Figma Token | CSS Variable | `theme.json` value | `theme.json` slug |
|-------------|--------------|--------------------|-------------------|
| `Spacing/30` | `--wp--preset--spacing--30` | `min(2.5rem, 5vw)` | `30` |
| `Spacing/40` | `--wp--preset--spacing--40` | `min(4rem, 8vw)` | `40` |
| `Spacing/50` | `--wp--preset--spacing--50` | `min(6.5rem, 13vw)` | `50` |
| `Spacing/60` | `--wp--preset--spacing--60` | `min(10.5rem, 24vw)` | `60` |


### Pattern Creation Guidelines

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
<figure class="wp-block-image size-large"><img src="http://wp-stable.test/wp-content/themes/twentytwentyfour/assets/images/project.webp" alt="" class="wp-image-125"/></figure>
<!-- /wp:image -->
```

For example, turns into:

```
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/project.webp" alt="<?php echo esc_attr_x( 'Picture of a building', 'Alt text for project picture', 'twentytwentyfour' ); ?>"/></figure>
<!-- /wp:image -->
```

## Development

### Getting Started with Aegis

To get started with Aegis development:

1. Set up a [WordPress](#deploying-wordpress-locally) instance.
2. Download [Aegis](https://github.com/atmostfear-entertainment/aegis/releases/tag/alpha).
3. Unzip, and upload this repository into your `/wp-content/themes/` directory.

Just in case you find the method to install WordPress locally too overwhelming, then we would recommend experimenting with [wp-env](https://developer.wordpress.org/block-editor/getting-started/devenv/), [Local](https://localwp.com/) or [DevKinsta](https://kinsta.com/devkinsta/).


#### Requirements

- [Aegis](https://github.com/atmostfear-entertainment/aegis/releases/tag/alpha)
- [WordPress 6.0+](https://wordpress.org/download/)
- PHP 7.4+
- License: [GPLv2](https://www.gnu.org/licenses/gpl-2.0.html) or later.


> **Warning**
> Please note that the documentation below is based partially on the upcoming Aegis's [Full Site Editing](https://developer.wordpress.org/block-editor/getting-started/full-site-editing/) features.


Some Aegis features and/or [pull requests](https://github.com/atmostfear-entertainment/aegis/pulls) may require the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) trunk and will be described or tagged accordingly.

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

Start by cloning the current repository using `git clone https://github.com/WordPress/wordpress-develop.git`.

Then in your terminal move to the repository folder `cd wordpress-develop` and run the following commands:

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

Before contributing, please read the contributors' [Code of Conduct](https://github.com/atmostfear-entertainment/aegis/blob/main/CODE_OF_CONDUCT.md) and [Contributing](https://github.com/atmostfear-entertainment/aegis/blob/main/CONTRIBUTING.md) for information about how to open bug reports, contribute patches, test changes, write documentation, or get involved in any way you can.

If after reading you still wish to contribute with code, the list of [open issues](https://github.com/atmostfear-entertainment/aegis/issues) is a superb place to start scrutinising for tasks. However, [pull requests](https://github.com/atmostfear-entertainment/aegis/pulls) are preferred when linked to an existing issue.

Be advised that contributing is not just for developers. We welcome anyone willing to contribute with code, [testing](#getting-started), triage, discussion, designing while building patterns and templates, making Aegis more accessible, etcetera. So please, feel free to look through [open issues](https://github.com/atmostfear-entertainment/aegis/issues), and join wherever you feel most comfortable.


## Development
  
Aegis aims to load fewer assets as much as possible. With a very performant approach, it relies on the [Block Editor](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/) and [Global Styles](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/) to provide you with the grand part of the visuals, and will progressively move toward a more Full Site Editing experience.

We strongly advise refraining from building any custom-built PHP or JavaScript-based workarounds for functionality that either Aegis or the [Block Editor](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/) might provide. Aegis is the first of its kind, hybrid, minimalistic, lightweight, performant and aimed at individuals with color vision deficiency. So please, let us keep its code as simple as possible.

According to those last two points, Aegis has no unnecessary build process.

If you have [contributed](CONTRIBUTORS.md) to Aegis, due credit will be given. we will be updating [CONTRIBUTORS.md](CONTRIBUTORS.md) periodically with the names of contributors; however, feel free to open a [pull request](https://github.com/atmostfear-entertainment/aegis/pulls) or [issue](https://github.com/atmostfear-entertainment/aegis/issues) if we somehow omitted someone.


## Experimenting

If you wish to experiment with custom code, we will encourage you to install and use the Aegis Child for further custom customisation, or further extend it with code snippets.

| Repository | Description |
| --- | --- |
| [Aegis Child Theme](https://github.com/atmostfear-entertainment/aegis-child) | Official Aegis Child Theme |
| [Aegis Code Snippets](https://github.com/atmostfear-entertainment/aegis-snippets) | Official Aegis Code Snippets |


## Resources

Here are some resources that may be helpful to context for learning more about developing block-based themes:

- [Create a Block Theme (tutorial)](https://developer.wordpress.org/block-editor/how-to-guides/themes/create-block-theme/)
- [Full site editing development in the Gutenberg Repository](https://github.com/WordPress/gutenberg/labels/%5BFeature%5D%20Full%20Site%20Editing)
- [Block-based Theme Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/)
- [Global Styles and theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Global Styles development in the Gutenberg Repository](https://github.com/WordPress/gutenberg/issues?q=is%3Aissue+is%3Aopen+label%3A%22Global+Styles%22)
- [theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)


## Demos

Unfortunately, at the moment, we do not have any demos yet. Even so, we will be toiling on quite a few uniquely crafted demos without following what typically is offered within the ecosystem.


## Roadmap

Fortunately, Aegis has a [public roadmap](https://trello.com/b/x75Zqk7W/aegis-theme-roadmap) that can be accessed to observe both its development and progress.


## Credits

The thumbnail on this README.md file:

["AEON"](https://www.midjourney.com/) generated on Midjourney by Atmostfear Entertaiment SAS, CCO


## Suggestions?

If you would wish to propose any improvements to this repository, please feel free to open an [issue](https://github.com/atmostfear-entertainment/aegis/issues) or [pull request](https://github.com/atmostfear-entertainment/aegis/pulls).
