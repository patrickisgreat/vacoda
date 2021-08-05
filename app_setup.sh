#!/bin/bash

#copy env file
cp .env.example .env

#replace redist host with the container name
sed -i '' -e 's/REDIS_HOST=127\.0\.0\.1/REDIS_HOST=redis/g' .env

#generate a key inside the container
docker-compose exec app php artisan key:generate

#migrate
docker-compose exec app php artisan migrate

#docker-compose exec app php artisan db:seed
