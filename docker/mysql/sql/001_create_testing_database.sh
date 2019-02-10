#!/bin/sh

echo "CREATE DATABASE IF NOT EXISTS \`"$MYSQL_TESTING_DATABASE"\` ;" | "${mysql[@]}"
echo "GRANT ALL ON \`"$MYSQL_TESTING_DATABASE"\`.* TO '"$MYSQL_USER"'@'%' ;" | "${mysql[@]}"
echo 'FLUSH PRIVILEGES ;' | "${mysql[@]}"
