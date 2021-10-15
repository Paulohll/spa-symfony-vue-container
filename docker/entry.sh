#!/bin/sh
# A Simple Shell Script To entry into container
. ./.env
echo "$COMPOSE_PROJECT_NAME_APP - [local DEV enviroment ]"
echo "--> To close session type exit..."
docker exec -u $USER -it $COMPOSE_PROJECT_NAME_APP /bin/bash


exit