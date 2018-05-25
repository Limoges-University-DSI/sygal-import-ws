# sygal-import-ws


## Que fait *sygal-import-ws* ?

*sygal-import-ws* est un web service (ws) qui interroge les données présentes dans un SI (via des vues en base de données) 
et les met à disposition pour leur lecture via des requêtes GET.


## Technologies employées

*sygal-import-ws* repose sur l'utilisation de :
- Apigility (https://apigility.org/) pour la fourniture du ws ;
- Doctrine (http://www.doctrine-project.org/) pour la gestion de la partie BDD (notamment des schémas des tables).


## Installation

### Obtention des sources

La première fois que vous installez le ws, vous devez lancer la commande suivante :

```bash
$ git clone git@git.unicaen.fr:dsi/sygal-import-ws.git
$ cd sygal-import-ws
```

Lancer la commande suivante pour obtenir la liste des versions disponibles du ws.
```bash
$ git fetch && git fetch --tags && git tag
```

Et si la version la plus récente est par exemple la `1.0`, utilisez la commande suivante pour "basculer" sur cette version :
```bash
$ git checkout 1.0
```

### Installation des dépendances

Installez les packages requis par le ws via *composer* (https://getcomposer.org/) comme ceci :
```bash
$ composer install
```

### Fichier "users.htpasswd"

Ce fichier contient les utilisateurs/mot de passe autorisés à appeler le ws.

S'il s'agit d'une mise à jour du ws, vous avez déjà fait la manip, inutile de lire ce paragraphe.

S'il s'agit de la première installation du ws, placez-vous dans le répertoire `config` des sources et lancer la 
commande suivante pour créer le fichier "users.htpasswd" contenant un utilisateur `sygal-app` dont le mot de passe 
va vous être demandé :
```bash
$ htpasswd -c users.htpasswd sygal-app
```

Si vous manquez d'idée pour le mot de passe, utilsez la commande suivante :
```bash
$ pwgen 16 1 --symbols --secure
```

### Fichiers de config

S'il s'agit d'une mise à jour du ws, vous avez déjà fait la manip, inutile de lire ce paragraphe.

S'il s'agit de la première installation du ws, 2 fichiers situés dans le répertoire `config/autoload` ont besoin d'être 
complétés puis renommés :

  - **local.php.dist** : qui est notamment utilisé pour l'authentification.
    - clé `htpasswd` qui désigne le chemin du fichier "users.htpasswd" évoqué plus haut
  - **database.local.php.dist** : qui est utilisé pour la connection à la BDD.
    - clés `host`, `dbname`, `port`, `user`, `password` : les infos d'accès à la BDD.
 
Une fois ces fichiers complétés, changer leur extension `.php.dist` en `.php`.

### Interface d'admin Apigility

Passer en mode développement ouvre l'accès à l'interface Apigility de modification du ws.
Cette fonctionnalité est réservée aux développeurs du ws et est **INTERDIT EN PRODUCTION**.

Désactivez le mode développement ainsi :
```bash
$ composer development-disable
``` 



## Lancement du web service *pour le dévelopement*

### Solution 1 : le serveur interne PHP
 
En phase de développement, la façon la plus simple consiste en l'utilisation 
du serveur interne de php :

 ```bash
$ php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
 ```

### Solution 2 : Docker

Se placer à la racine des sources du ws pour lancer la commande suivante :

```bash
$ docker-compose up -d --build
```

Vérifier que le container `sygal-import-ws-container` figure bien dans la liste des containers
lancés listés par la commande suivante (cf. colonne `NAMES`) :

```bash
$ docker ps
```

Le port sur lequel écoute le ws est indiqué dans la colonne `PORTS`. 
Par exemple, `0.0.0.0:8080->8080/tcp` indique que le ws est accessible sur la machine hôte 
à l'adresse `localhost:8080`.


## Les services fournis
 
Chaque vue en base de données peut être interrogée via un service dédié :
* Acteur :              localhost:8080/acteur
* Doctorant :           localhost:8080/doctorant
* Individu :            localhost:8080/individu
* Role :                localhost:8080/role
* Source :              localhost:8080/source
* These :               localhost:8080/these
* Variable :            localhost:8080/variable
* Structure :           localhost:8080/structure
* Etablissement :       localhost:8080/etablissement
* Ecole doctorale :     localhost:8080/ecole-doctorale
* Unite de recherche :  localhost:8080/unite-recherche

Exemple :
```bash
$ curl --header "Accept: application/json" --header "Authorization: Basic xxxx" localhost:8080/variable
```

Ou en https :
```bash
$ curl --insecure --header "Accept: application/json" --header "Authorization: Basic xxxx" https://localhost:8443/variable
```

Remplacer `xxxx` par le token généré grâce à la commande suivante 
(le mot de passe est celui choisi lors de la commande `htpasswd -c users.htpasswd sygal-app`) :
```bash
$ echo -n 'sygal-app:motdepasse' | base64
```

L'interrogation directe de ces adresses va retourner l'intégralité des données du BDD.
Afin d'obtenir les informations spécifiques à une donnée, il est possible d'ajouter son identifiant, exemple :
```bash
$ curl --header "Accept: application/json" --header "Authorization: Basic xxxx" localhost:8080/variable/ETB_LIB_NOM_RESP
```


## Remarques complémentaires

* Le web service ne répond qu'aux requêtes de type GET.
* Le web service retourne du json seulement.
