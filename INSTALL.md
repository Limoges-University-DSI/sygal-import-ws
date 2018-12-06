# Installation du web service `sygal-import-ws`


## Applicatif


### Première obtention des sources et configuration du serveur 

Sur un serveur Debian Stretch, lancez les commandes suivantes :
```bash
git clone https://git.unicaen.fr/open-source/sygal-import-WS.git /var/www/sygal-import-WS
cd /var/www/sygal-import-WS
source Dockerfile.sh
```

- La config Apache pour le WS est dans le répertoire `docker/` : `apache-site.conf`, `apache-site-ssl.conf` et `apache-ports.conf`.
- La config PHP est aussi dans le répertoire `docker/` : `php.conf`.
- Le WS doit écouter sur les port 8080 (en http) et 8443 (en https).
- Autoriser l'accès depuis l'extérieur sur ces ports (on vous dira notre IP de sortie si besoin).


### Installation d'une version précise

Placez-vous dans le répertoire des sources du web service puis lancez la commande git suivante pour obtenir la liste des
versions disponibles du WS :
```bash
git fetch && git fetch --tags && git tag
```

Si la version la plus récente est par exemple la `1.2.1`, utilisez la commande suivante pour "installer" sur cette version :
```bash
git checkout --force 1.1.0 && bash install.sh
```


### Fichier "users.htpasswd"

Ce fichier contient les utilisateurs/mot de passe autorisés à appeler le WS.

S'il s'agit d'une mise à jour du WS, vous avez déjà fait la manip, inutile de lire ce paragraphe.

S'il s'agit de la première installation du WS, placez-vous dans le répertoire [`config`](config) des sources et lancer la 
commande suivante pour créer le fichier "users.htpasswd" contenant un utilisateur `sygal-app` dont le mot de passe 
va vous être demandé :
```bash
htpasswd -c users.htpasswd sygal-app
```

Si vous manquez d'idée pour le mot de passe, utilsez la commande suivante :
```bash
pwgen 16 1 --symbols --secure
```

### Configuration du WS

S'il s'agit d'une mise à jour du WS, vous avez déjà fait la manip, inutile de lire ce paragraphe.
Reportez-vous simplement aux "release notes" de la version choisie situées dans `doc/release-notes`.

S'il s'agit de la première installation du WS, 2 fichiers situés dans le répertoire `config/autoload` ont besoin d'être 
complétés puis renommés :

  - **local.php.dist** : qui est notamment utilisé pour l'authentification.
    - clé `htpasswd` qui désigne le chemin du fichier "users.htpasswd" évoqué plus haut
  - **database.local.php.dist** : qui est utilisé pour la connection à la BDD.
    - clés `host`, `dbname`, `port`, `user`, `password` : les infos d'accès à la BDD.
 
Une fois ces fichiers complétés, changer leur extension `.php.dist` en `.php`.


### Configuration PHP

Selon le moteur PHP que vous avez installé, l'emplacement du fichier de config PHP à créer/modifier diffère.
  - php7.0-fpm         : `/etc/php/7.0/fpm/conf.d/`
  - apache2-mod-php7.0 : `/etc/php/7.0/apache2/conf.d/`
  
Voici le contenu du fichier `99-sygal-import-WS.ini` à créer/modifier :

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
    

### Interface d'admin Apigility

Cette interface de modification du WS est réservée aux développeurs et est **INTERDITE EN PRODUCTION**.
Assurez-vous de bien désactiver le mode développement :
```bash
composer development-disable
```

Pour passer en mode développement et ouvrir l'accès à cette interface de modification du WS :
```bash
composer development-enable
``` 


## Vues dans votre base de données

Le WS interroge des vues que vous devez créer dans la base de données de votre logiciel de scolarité, ou autre part
si c'est possible, à vous de voir.

En fonction du logiciel de scolarité que votre établissement utilise, reportez-vous dans le répertoire `data/sql` 
à l'un des dossiers suivants :
- `apogee`
- `physalis`

Chacun des répertoires contient :
- Un script pour créer les vues communes à tous les établissements ayant le logiciel de scolarité en question.
- Un script pour créer les vues propres à un établissement en particulier.
  Si votre établissement ne figure pas dans la liste, il faudra écrire les vues adaptées à votre contexte.
