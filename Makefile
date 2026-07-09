.PHONY: help install build dev lint lint-php test translate clean validate audit-patterns



help: ## Show this help message

	@echo 'Usage: make [target]'

	@echo ''

	@echo 'Available targets:'

	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-20s %s\n", $$1, $$2}' $(MAKEFILE_LIST)



install: ## Install Node dependencies

	npm ci



install\:composer: ## Install Composer dependencies

	composer install



build: ## Build block and admin assets (webpack)

	npm run build



dev: ## Start webpack watch mode

	npm run start



lint: ## Run JavaScript, CSS, and package.json linters

	npm run lint



lint\:php: ## Run PHP CodeSniffer

	vendor/bin/phpcs



test: ## Run WPAudit PHPUnit suite

	composer test:wpaudit



translate: ## Generate translation POT file

	npm run translate



clean: ## Clean build artifacts, caches, and node_modules

	npm run clean

	rm -rf node_modules/



validate: ## Validate theme.json syntax

	@node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8')); console.log('theme.json is valid')"



audit-patterns: ## Validate pattern slugs, blocks, and templates

	wp eval-file tools/audit-patterns.php


