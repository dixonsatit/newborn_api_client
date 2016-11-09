#!/bin/bash
FILE="newborn.sql"
docker exec nb_api_mariadb sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" --databases $MYSQL_DATABASE' > "./mysql/initdb/$FILE"
echo "Backing up to initdb complate."
