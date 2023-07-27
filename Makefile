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

clear-cache:
	$(CONSOLE) c:c

composer-install:
	$(EXEC-PHP) composer install --prefer-dist --no-progress --no-interaction

db-create:
	$(CONSOLE) doctrine:database:create --if-not-exists

db-drop:
	$(CONSOLE) doctrine:database:drop --if-exists --force

migrations-apply:
	$(CONSOLE) doctrine:migration:migrate --no-interaction

fixtures:
	$(CONSOLE) doctrine:fixtures:load --no-interaction

db-reset: db-drop db-create migrations-apply
db-reset-with-fixtures: db-reset fixtures

cs-fix:
	$(EXEC-PHP) vendor/bin/php-cs-fixer fix -v

cs-dump:
	$(EXEC-PHP) vendor/bin/php-cs-fixer fix --dry-run -v

static-analysis:
	$(EXEC-PHP) vendor/bin/phpstan analyse --memory-limit=2G

composer-validate:
	$(EXEC-PHP) composer validate

ci: cs-dump static-analysis composer-validate
