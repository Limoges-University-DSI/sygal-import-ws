#!/usr/bin/env bash

#
# This script runs required operations in order to set up the application.
#

# Composer install
composer install --no-dev --no-suggest --optimize-autoloader
# NB: 'bin/generate-deploy-info-config.php' est lancé lors d'un composer install.

# Désactivation de l'interface d'admin Apigility
composer development-disable

# Répertoires de travail de Doctrine
mkdir -p data/cache                   && chmod -R 777 data/cache
mkdir -p data/DoctrineModule/cache    && chmod -R 777 data/DoctrineModule/cache
mkdir -p data/DoctrineORMModule/Proxy && chmod -R 777 data/DoctrineORMModule/Proxy
rm -rf data/cache/*
rm -rf data/DoctrineModule/cache/*
rm -rf data/DoctrineORMModule/Proxy/*

# Commandes Doctrine
vendor/bin/doctrine-module orm:clear-cache:query
vendor/bin/doctrine-module orm:clear-cache:metadata
vendor/bin/doctrine-module orm:clear-cache:result
vendor/bin/doctrine-module orm:generate-proxies
