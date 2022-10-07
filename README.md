# Aeon

Welcome to the Aeon development repository.

![Aeon](https://repository-images.githubusercontent.com/537639296/331524d2-317c-4f3c-ad1d-71525b7f9050)

##### Table of Contents

- [Introduction](#introduction)
- [Description](#description)
- [Getting Started with Séance](#getting-started-with-seance)
- [Requirements](#requirements)
- [Deploying WordPress Locally](#deploying-wordpress-locally)
- [Development Environment Commands](#development-environment-commands)
- [How to start the development environment for the first time](#how-to-start-the-development-environment-for-the-first-time)
- [How to watch for changes](#how-to-watch-for-changes)
- [How to run a WP-CLI command](#how-to-run-a-wp-cli-command)
- [How to run the tests](#how-to-run-the-tests)
- [To restart the development environment](#how-to-restart-the-development-environment)
- [How to stop the development environment](#how-to-stop-the-development-environment)
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
## Description

### Getting Started with Aeon

To get started with Aeon development:

1. Set up a [WordPress](#deploying-wordpress-locally) instance.
2. Download [Aeon]().
3. Unzip, and upload this repository into your `/wp-content/themes/` directory.

Just in case you find the method to install WordPress locally too overwhelming, then we would recommend experimenting with [wp-env](https://developer.wordpress.org/block-editor/getting-started/devenv/), [Local](https://localwp.com/) or [DevKinsta](https://kinsta.com/devkinsta/).

#### Requirements

- [Aeon](https://github.com/alexdeborba/seance)
- [WordPress 6.0+](https://wordpress.org/download/)
- PHP 7.4+
- License: [GPLv2](https://www.gnu.org/licenses/gpl-2.0.html) or later.

Some Aeon features and/or [pull requests](https://github.com/atmostfear-entertainment/aeon/pulls) may require the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) trunk and will be described or tagged accordingly.

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