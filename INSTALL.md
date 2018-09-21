# Installation


## Première installation

S'il s'agit de la première installation du ws, vous devez lancer la commande suivante pour obtenir les sources :

```bash
git clone git@git.unicaen.fr:dsi/sygal-import-ws.git
```


## Installation d'une version précise

Placez-vous dans le répertoire du web service puis lancez la commande git suivante pour obtenir la liste des versions disponibles du ws :
```bash
git fetch && git fetch --tags && git tag
```

Si la version la plus récente est par exemple la `1.1.0`, utilisez la commande suivante pour "installer" sur cette version :
```bash
git checkout 1.1.0
```


## Installation des dépendances PHP

Installez les packages requis par le ws via [Composer](https://getcomposer.org/) comme ceci :
```bash
composer install --no-suggest --optimize-autoloader
```


## Fichier "users.htpasswd"

Ce fichier contient les utilisateurs/mot de passe autorisés à appeler le ws.

S'il s'agit d'une mise à jour du ws, vous avez déjà fait la manip, inutile de lire ce paragraphe.

S'il s'agit de la première installation du ws, placez-vous dans le répertoire [`config`](config) des sources et lancer la 
commande suivante pour créer le fichier "users.htpasswd" contenant un utilisateur `sygal-app` dont le mot de passe 
va vous être demandé :
```bash
htpasswd -c users.htpasswd sygal-app
```

Si vous manquez d'idée pour le mot de passe, utilsez la commande suivante :
```bash
pwgen 16 1 --symbols --secure
```

## Configuration du WS

S'il s'agit d'une mise à jour du ws, vous avez déjà fait la manip, inutile de lire ce paragraphe.
Reportez-vous au "release notes" de la version choisie (ex: [1.1.0](https://git.unicaen.fr/dsi/sygal-import-ws/tags/1.1.0)).

S'il s'agit de la première installation du ws, 2 fichiers situés dans le répertoire `config/autoload` ont besoin d'être 
complétés puis renommés :

  - **local.php.dist** : qui est notamment utilisé pour l'authentification.
    - clé `htpasswd` qui désigne le chemin du fichier "users.htpasswd" évoqué plus haut
  - **database.local.php.dist** : qui est utilisé pour la connection à la BDD.
    - clés `host`, `dbname`, `port`, `user`, `password` : les infos d'accès à la BDD.
 
Une fois ces fichiers complétés, changer leur extension `.php.dist` en `.php`.


## Configuration PHP

Selon le moteur PHP que vous avez installé, l'emplacement du fichier de config PHP à créer/modifier diffère.
  - php7.0-fpm         : `/etc/php/7.0/fpm/conf.d/`
  - apache2-mod-php7.0 : `/etc/php/7.0/apache2/conf.d/`
  
Voici le contenu du fichier `99-sygal-import-ws.ini` à créer/modifier :

    date.timezone = Europe/Paris
    short_open_tag = Off
    expose_php = Off
    #display_startup_errors = On
    #error_reporting = E_ALL & ~E_DEPRECATED & ~E_NOTICE
    display_errors = Off
    # NB: ne peut-être supérieur au memory_limit du php.ini
    memory_limit = 256M
    
    ;opcache.error_log=/var/log/php_opcache_error.log
    opcache.enable = 1
    opcache.memory_consumption = 256
    opcache.interned_strings_buffer = 8
    opcache.max_wasted_percentage = 5
    opcache.max_accelerated_files = 16000
    ; http://php.net/manual/en/opcache.configuration.php#ini.opcache.revalidate-freq
    ; defaults to zend opcache checking every 180 seconds for PHP file changes
    ; set to zero to check every second if you are doing alot of frequent
    ; php file edits/developer work
    ; opcache.revalidate_freq=0
    opcache.revalidate_freq = 180
    opcache.fast_shutdown = 0
    opcache.enable_cli = 0
    opcache.save_comments = 1
    opcache.enable_file_override = 1
    opcache.validate_timestamps = 1
    opcache.huge_code_pages = 0
    

## Interface d'admin Apigility

Cette interface de modification du WS est réservée aux développeurs et est **INTERDITE EN PRODUCTION**.
Assurez-vous de bien désactiver le mode développement :
```bash
composer development-disable
```

Pour passer en mode développement et ouvrir l'accès à cette interface de modification du WS :
```bash
composer development-enable
``` 
