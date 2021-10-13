.PHONY: start
start:
	@docker-compose up -d --build

.PHONY: stop
stop:
	@docker-compose stop

.PHONY: login-php
login-php:
	@docker-compose -f docker-compose.yaml exec behatquickstart-php sh

.PHONY: test
test:
	@docker exec behatquickstart-php ./vendor/bin/behat --format=progress -v