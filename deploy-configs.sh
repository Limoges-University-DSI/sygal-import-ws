#!/usr/bin/env bash

appname="sygal-import-ws"

set -x # expands variables and prints a little + sign before the line

# preprod
ssh root@sygal-pp mkdir -p /root/.ssh/${appname}
scp -p -r ./data/config/preprod/* root@sygal-pp:/root/.ssh/${appname}/

# prod
# ...
