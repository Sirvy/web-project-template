Web Project Template
====================

Basic web project template using the following stack:
- PHP 8.0
- Nette Framework
- TypeScript
- Sass
- Docker


Setup 
-----

    cp .env.dist .env
    cp application/config/local.neon.dist application/config/local.neon

Run project
------------

	docker-compose build
	docker-compose up
	
Installation
------------

	cd application
	composer install
	yarn install
	
Compile assets
--------------
	
	yarn build