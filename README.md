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

If you are making changes to Aeon core files, you should start the file watcher in order to build or copy the files as necessary:

```
npm run dev
```

To stop the file watcher, please press `ctrl+c`.


#### To run a [WP-CLI](https://make.wordpress.org/cli/handbook/) command

```
npm run env:cli <command>
```

WP-CLI has a plenty of [useful commands](https://developer.wordpress.org/cli/commands/) you can use to work on your Aeon site.

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


#### To start the development environment again

Starting the environment again is a single command:

```
npm run env:start
```