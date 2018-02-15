# sygal-import-ws


## Que fait *sygal-import-ws* ?

*sygal-import-ws* est un web service (ws) qui interroge les données présentes dans un SI (via des vues en base de données) 
et les met à disposition pour leur lecture via des requêtes GET.


## Technologies employées

*sygal-import-ws* repose sur l'utilisation de :
- Apigility (https://apigility.org/) pour la fourniture du ws ;
- Doctrine (http://www.doctrine-project.org/) pour la gestion de la partie BDD (notamment des schémas des tables).


## Installation

### Installation des dépendances

Une fois les sources obtenues, il faut installer les packages requis par le ws.

Cette installation se fait via *composer* (https://getcomposer.org/) :

```bash
$ composer install
```

### Création du fichier "users.htpasswd"

Ce fichier contient les utilisateurs/mot de passe autorisés à appeler le ws.

Se placer dans le répertoire **config** des sources et lancer la commande suivante pour créer le fichier "users.htpasswd" 
contenant un utilisateur `sygal-app` dont le mot de passe va vous être demandé :

```bash
$ htpasswd -c users.htpasswd sygal-app
```

### Complétion des fichiers de config

Deux fichiers situés dans le répertoire **config** ont besoin d'être complétés puis renommés :

  - **local.php.dist** : qui est notamment utilisé pour l'authentification.
    - clé `htpasswd` qui désigne le chemin du fichier "users.htpasswd" évoqué plus haut
  - **database.local.php.dist** : qui est utilisé pour la connection à la BDD.
    - clés `host`, `dbname`, `port`, `user`, `password` : les infos d'accès à la BDD.
 
Une fois ces fichiers complétés, changer leur extension `.php.dist` en `.php`.

### Activer/désactiver le mode développement

Passer en mode développement ouvre l'accès à l'interface de modification du ws.
Cette fonctionnalité est réservée aux développeurs du ws.
 
Attention: Le mode développement est **INTERDIT EN PRODUCTION**.

Pour activer/désactiver le mode développement :

```bash
$ composer development-enable
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
* Acteur :      localhost:8080/acteur
* Doctorant :   localhost:8080/doctorant
* Individu :    localhost:8080/individu
* Role :        localhost:8080/role
* Source :      localhost:8080/source
* These :       localhost:8080/these
* Variable :    localhost:8080/variable

Exemple :

```bash
$ curl --header "Accept: application/json" --header "Authorization: Basic Xxxxxxxxxxxx" localhost:8080/variable
```

L'interrogation directe de ces adresses va retourner l'intégralité des données du BDD.
Afin d'obtenir les informations spécifiques à une donnée, il est possible d'ajouter son identifiant, exemple :

```bash
$ curl --header "Accept: application/json" --header "Authorization: Basic Xxxxxxxxxxxx" localhost:8080/variable/ETB_LIB_NOM_RESP
```


## Remarques complémentaires

* Le web service ne répond qu'aux requêtes de type GET.
* Le web service retourne du json seulement.
