#!/usr/bin/env bash

set -x # expands variables and prints a little + sign before the line

appname="sygal-import-ws"

# preprod
scp ./config/autoload/local.php      root@sygal-pp:/root/.ssh/${appname}/local.php
scp ./config/users.sygal-pp.htpasswd root@sygal-pp:/root/.ssh/${appname}/users.htpasswd
