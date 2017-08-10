#!/usr/bin/env bash

sudo sed -i '/192.168.56.107 sso.local/d' /etc/hosts || true
echo "192.168.56.107 sso.local" | sudo tee -a /etc/hosts || true
php ./bin/console doctrine:migrations:migrate -n
