#!/usr/bin/env bash

# find current ip`s of containers
NGINX_IP=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' md_nginx)
DB_IP=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' md_db)
DB_ADMIN_IP=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' md_db_admin)


# clear existing docker.local entry from /etc/hosts
$(sudo sed -i '/[[:space:]]md\.local$/d' /etc/hosts)
$(sudo sed -i '/[[:space:]]db\.md\.local$/d' /etc/hosts)
$(sudo sed -i '/[[:space:]]dba\.md\.local$/d' /etc/hosts)

$(sudo echo "$NGINX_IP   md.local" >> /etc/hosts)
$(sudo echo "$DB_IP   db.md.local" >> /etc/hosts)
$(sudo echo "$DB_ADMIN_IP   dba.md.local" >> /etc/hosts)

echo "md.local binded to $NGINX_IP "
echo "db.md.local binded to $DB_IP "
echo "dba.md.local binded to $DB_ADMIN_IP "