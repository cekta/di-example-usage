.PHONY: shell run

build:
	docker compose build
	docker compose run -it --rm app make build-docker

build-docker:
	composer install
	php ./bin/compile.php

run:
	docker compose run -it --rm app make run-docker

run-docker:
	php app.php

shell:
	docker compose run -it --rm app sh