DOCKER=docker-compose
DOCKER-EXEC=$(DOCKER) exec
EXEC-PHP=$(DOCKER-EXEC) php
CONSOLE= $(DOCKER-EXEC) php bin/console

#docker
build:
	$(DOCKER) build

start:
	$(DOCKER) up --detach --remove-orphans

stop:
	$(DOCKER) down

ps:
	$(DOCKER) ps

logs:
	$(DOCKER) logs -f

restart: stop start

#backend
bash-php:
	$(EXEC-PHP) bash

composer-install:
	$(EXEC-PHP) composer install --prefer-dist --no-progress --no-interaction

reset-db:
	$(CONSOLE) doctrine:database:drop --if-exists --force
	$(CONSOLE) doctrine:database:create
	$(CONSOLE) doctrine:schema:create

fixtures:
	$(CONSOLE) doctrine:fixtures:load --no-interaction --purge-with-truncate

db-reset-with-fixtures: reset-db fixtures

cs-fix:
	$(EXEC-PHP) vendor/bin/php-cs-fixer fix -v

cs-dump:
	$(EXEC-PHP) vendor/bin/php-cs-fixer fix --dry-run -v

static-analysis:
	$(EXEC-PHP) vendor/bin/phpstan analyse --memory-limit=2G

composer-validate:
	$(EXEC-PHP) composer validate

ci: cs-dump static-analysis composer-validate
