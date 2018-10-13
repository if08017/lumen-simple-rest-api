start:
	php -S localhost:8000 -t public
migrate:
	php artisan migrate
provision:
	cp -r .env.example .env
