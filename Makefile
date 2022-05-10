sail := ./vendor/bin/sail
create:
	@make setup
	@make up
	@make seed
	@make npm
setup:
	@docker run --rm \
		-u "$(id -u):$(id -g)" \
		-v $(CURDIR):/var/www/html \
		-w /var/www/html \
		laravelsail/php81-composer:latest \
		composer install --ignore-platform-reqs
npm:
	@$(sail) npm install
up:
	@$(sail) up -d
down:
	@$(sail) down
migrate:
	@$(sail) artisan migrate
migrate-refresh:
	@$(sail) artisan migrate:refresh
migrate-fresh:
	@$(sail) artisan migrate:fresh --seed
seed:
	@$(sail) artisan db:seed
tinker:
	@$(sail) artisan tinker
