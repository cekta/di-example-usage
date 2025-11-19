.PHONY: shell run

run:
	docker compose run -it --rm --build app make run-docker

run-docker:
	composer install
	php app.php

shell:
	docker compose run -it --rm --build app sh