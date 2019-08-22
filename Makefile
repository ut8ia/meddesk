include .env
up-dev:
	docker-compose -f environments/dev/docker/docker-compose.yml up -d
	sudo ./environments/dev/docker/update_hosts.sh
upb-dev:
	docker-compose -f environments/dev/docker/docker-compose.yml up -d --force-recreate --build
	sudo ./environments/dev/docker/update_hosts.sh
stop-dev:
	docker-compose -f environments/dev/docker/docker-compose.yml stop
renew-dev:
	docker-compose -f environments/dev/docker/docker-compose.yml up -d --build --force-recreate --renew-anon-volumes md_db
	sudo ./environments/dev/docker/update_hosts.sh
r:
	docker exec -it test_redis  /usr/local/bin/redis-cli
test:
	docker exec -it test_api pytest
