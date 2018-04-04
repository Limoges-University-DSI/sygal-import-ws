#!/usr/bin/env bash

dir=`dirname $0`
appdir='/var/www/sygal-import-ws'
set -x

cp ${dir}/files/local.php      ${appdir}/config/autoload/local.php
cp ${dir}/files/users.htpasswd ${appdir}/config/users.htpasswd
