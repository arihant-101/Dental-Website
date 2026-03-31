#!/bin/sh
set -eu

# Render disks may mount as root-owned. Ensure mysql can write datadir.
mkdir -p /var/lib/mysql
chown -R mysql:mysql /var/lib/mysql

exec /usr/local/bin/docker-entrypoint.sh "$@"
