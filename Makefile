.PHONY: help init dev test test-group lint create-block zip clean

# Variables
blocks_path = resources/blocks
build_path = build

# Commands
help: ## Display this help message
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

init: ## Install project dependencies
	composer install
	npm install

server\:start: ## Launch wp-env dev server at localhost:8888 by default
	wp-env start

server\:stop: ## Stop wp-env dev server
	wp-env stop

test: ## Run all phpunit tests
	./vendor/bin/phpunit tests

test-group: ## Run phpunit tests based on the group in "group" variable (make test-group group=GROUP_NAME)
	./vendor/bin/phpunit --group $(group) tests

lint: ## Run Psalm static analysis
	./vendor/bin/psalm

clean: ## Remove all generated files
	rm -rf $(build_path)
	rm -rf *.zip
	rm -rf node_modules
	rm -rf vendor

##### Theme Assets #####
start\:theme: ## Watch CSS/JS assets for development
	npm run start:theme

build\:theme: ## Build CSS/JS assets for production
	npm run build:theme

start\:blocks: ## Watch blocks for development
	npm run start:blocks

build\:blocks: ## Build blocks for production
	npm run build:blocks

##### Builder file helpers #####
create-block: ## Create a new block with @wordpress/create-block (make create-block slug=test-block)
	cd $(blocks_path) && \
	npx @wordpress/create-block $(slug) --no-plugin

zip: ## Generate a ready-to-use version of the theme
	npm run theme-zip
