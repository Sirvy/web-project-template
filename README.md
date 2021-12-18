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