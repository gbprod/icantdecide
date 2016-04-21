.SILENT:
.PHONY: help

## Colors
COLOR_RESET   = \033[0m
COLOR_INFO    = \033[32m
COLOR_COMMENT = \033[33m

## Help
help:
	printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	printf " make [target]\n\n"
	printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	awk '/^[a-zA-Z\-\_0-9\.@]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

#########
# Start #
#########

start:
	mysql-ctl start
	../elasticsearch/bin/elasticsearch
	
###########
# Install #
###########

## Install application
install: install-deps install-database

install-deps:
	composer install

install-database:
	php bin/console doctrine:database:create --if-not-exists
	php bin/console doctrine:schema:update --force

##########
# Update #
##########

## Update application
update: update-deps update-database

update-deps:
	composer update

update-database:
	php bin/console doctrine:schema:update --force

#################
# Elasticsearch #
#################

provide-elasticsearch:
	php bin/console elasticsearch:provide

delete-elasticsearch:
	php bin/console elasticsearch:index:delete views --force

create-elasticsearch:
	php bin/console elasticsearch:index:create views

########
# Test #
########

## Run tests
test: 
	vendor/bin/phpunit

## Code coverage
coverage:
	vendor/bin/phpunit --coverage-text

##########
# Deploy #
##########

## Deploy application
deploy: deploy-deps deploy-assets deploy-warmup

deploy-deps:
	composer install -o --no-dev

deploy-assets:
	php bin/console assetic:dump --env=prod
	php bin/console assets:install --env=prod
	php bin/console braincrafted:bootstrap:install --env=prod

deploy-warmup:
	php bin/console cache:warmup --env=prod

#########
# Tools #
#########

reset-data: reset-database delete-elasticsearch create-elasticsearch provide-elasticsearch
	
reset-database: drop-database install-database

drop-database:
	php bin/console doctrine:database:drop --if-exists --force
