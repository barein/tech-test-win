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
