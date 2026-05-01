.PHONY: help install build dev lint translate clean validate

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Available targets:'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-20s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

install: ## Install Node dependencies
	npm ci

build: ## Build block and admin assets (webpack)
	npm run build

dev: ## Start webpack watch mode
	npm run start

lint: ## Run JavaScript and CSS linters
	npm run lint:js --if-present
	npm run lint:css --if-present
	npm run lint:pkg-json --if-present

translate: ## Generate translation POT file
	npm run translate

clean: ## Clean build artifacts and caches
	rm -rf node_modules/
	rm -rf build/
	rm -rf dist/
	rm -rf src/Admin/build/
	rm -f .eslintcache
	rm -f .stylelintcache

validate: ## Validate theme.json syntax
	@node -e "JSON.parse(require('fs').readFileSync('theme.json', 'utf8')); console.log('theme.json is valid')"
