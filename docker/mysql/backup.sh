#!/bin/bash
NOW=$(date +"%m-%d-%Y_%H-%M")
FILE="backup-$NOW.sql"
docker exec nb_api_mariadb sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" --databases $MYSQL_DATABASE' > "./mysql/backup/$FILE"
echo "Backing up data complate."
