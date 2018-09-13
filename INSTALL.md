# Installation

## Obtention des sources

S'il s'agit de la première installation du ws, vous devez lancer la commande suivante pour obtenir les sources :

```bash
git clone git@git.unicaen.fr:dsi/sygal-import-ws.git
cd sygal-import-ws
```

## Installation d'une version précise

Lancer la commande suivante pour obtenir la liste des versions disponibles du ws.
```bash
git fetch && git fetch --tags && git tag
```

Et si la version la plus récente est par exemple la `1.1.0`, utilisez la commande suivante pour "installer" sur cette version :
```bash
git checkout 1.1.0
```

## Installation des dépendances

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

## Fichiers de config

S'il s'agit d'une mise à jour du ws, vous avez déjà fait la manip, inutile de lire ce paragraphe.
Reportez-vous au "release notes" de la version choisie (ex: [1.1.0](https://git.unicaen.fr/dsi/sygal-import-ws/tags/1.1.0)).

S'il s'agit de la première installation du ws, 2 fichiers situés dans le répertoire `config/autoload` ont besoin d'être 
complétés puis renommés :

  - **local.php.dist** : qui est notamment utilisé pour l'authentification.
    - clé `htpasswd` qui désigne le chemin du fichier "users.htpasswd" évoqué plus haut
  - **database.local.php.dist** : qui est utilisé pour la connection à la BDD.
    - clés `host`, `dbname`, `port`, `user`, `password` : les infos d'accès à la BDD.
 
Une fois ces fichiers complétés, changer leur extension `.php.dist` en `.php`.

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
