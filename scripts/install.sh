#!/bin/bash

bash ./scripts/generate-cert-include.sh

if ! [ -x "$(command -v docker-compose)" ]; then
  echo '### Error: docker-compose is not installed.' >&2
  exit 1
fi

bash ./scripts/init-letsencrypt.sh $1

echo '### Running composer install...'
docker-compose -f docker-compose-helpers.yml run --rm composer install --ignore-platform-reqs

echo "### Preparing backend containers for data seeding"
touch api/database/database.sqlite 
docker-compose up -d --build api php

echo '###Waiting for containers to start...'
sleep 30

echo '###Setting file permissions'
if [ "$OS" = "Windows_NT" ]; then
winpty docker-compose exec php chown -R $USER:www-data storage
winpty docker-compose exec php chown -R $USER:www-data bootstrap/cache
winpty docker-compose exec php chmod -R 775 storage
winpty docker-compose exec php chmod -R 775 bootstrap/cache
else
docker-compose exec php chown -R $USER:www-data storage
docker-compose exec php chown -R $USER:www-data bootstrap/cache
docker-compose exec php chmod -R 775 storage
docker-compose exec php chmod -R 775 bootstrap/cache
fi

echo "### Seeding default database data"
if [ "$OS" = "Windows_NT" ]; then
  winpty docker-compose exec php php artisan key:generate
  winpty docker-compose exec php php artisan config:cache
  winpty docker-compose exec php php artisan migrate:fresh --seed

else
  docker-compose exec php php artisan key:generate
  docker-compose exec php php artisan config:cache
  docker-compose exec php php artisan migrate:fresh --seed

fi

echo "### Turning down containers"
docker-compose down

