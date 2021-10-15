#!/bin/sh
# prepare composer file
. ./.env
sed -i "s/___MY_APP_SERVICE_NAME___/$COMPOSE_PROJECT_NAME_APP/g" ./docker-compose.yml
sed -i "s/___MY_DATABASE_SERVICE_NAME___/$COMPOSE_PROJECT_NAME_DB/g" ./docker-compose.yml
# A Simple Shell Script To launch ccrm-backend local DEV stack
UID=$(id -u ${USER}) GID=$(id -g ${USER}) UNAME=$(id -u -n) docker-compose up -d
exit