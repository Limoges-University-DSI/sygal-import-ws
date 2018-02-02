# SygalImportWS


## Que fait SygalImportWS

SygalImportWS est un Web Service qui interroge les données présentent dans un SI et les mets à disposition pour leur lecture via des requêtes GET.


## Technologies employées

SygalImportWS repose sur l'utilisation de :
* Apigility (https://apigility.org/) pour la mise en place du web service ;
* Doctrine (http://www.doctrine-project.org/) pour la gestion de la partie BDD (notamment des schémas des tables).


## Installation du Web Service

### Récupération du dépôt

La récupération se fait directement via le clone du dépôt git. 

```bash
$ git clone git@git.unicaen.fr:dsi/sygal-import-ws.git
```

### Installation des vendors

Cette installation passe directement via l'utilisation de *composer*.

```bash
$ composer install
```

### Création du fichier "users.htpasswd"

Ce fichier contient les utilisateurs/mot de passe autorisés à appeler le web service.

Se placer dans le répertoire "config" du projet et lancer la commande suivante 
en remplaçant `gauthierb` par l'utilisateur voulu :

```bash
$ htpasswd -cb users.htpasswd gauthierb
```

### Complétion des fichiers locaux

Deux fichiers locaux ont besoins d'être complétés :

  * local.php : qui est notamment utilisé pour l'authentification.
    * `htpasswd` qui désigne le chemin du fichier "users.htpasswd" contenant le mot de passe htaccess 
  * database.local.php : qui est utilisé pour la connection au BDD</tt>.
    * `host`, `dbname` et `port` : les infos d'accés à la BDD.
    * `user` et `password` : les infos de l'utilisateur accédant à la BDD.
 
NB: ces deux fichiers sont présents sur le dépôt avec l'extension <tt>*.dist*</tt>. 

### Activer le mode développement (Facultatif)

L'interface admin permettant de modifier les services n'est accéssible seulement en mode développement.
```bash
$ composer development-enable
``` 


## Lancement du WebService

### Soit avec le built-in serveur PHP
 
 La façon la plus simple consiste en l'utilisation du serveur interne de php grâce à la commande suivante :
 ```bash
  php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
 ```

### Soit avec Docker

<span style='color:red;'>**TODO**</span> après la création de la bonne image 


## Les services fournis
 
Les sept vues de SyGAL peuvent être atteintes via des services spécifiques.
Ainsi, on retrouve les adresses suivantes :
* Acteur : localhost:8080/acteur
* Doctorant : localhost:8080/doctorant
* Individu : localhost:8080/individu
* Role : localhost:8080/role
* Source : localhost:8080/source
* These : localhost:8080/these
* Variable : localhost:8080/variable

L'interrogation directe de ces adresses va retourner l'intégralité des données du BDD.
Afin d'obtenir de les informations spécifiques à une donnée, il est nécessaire d'ajouter le *source_code* de celle-ci.

Par exemple, dans le cas de la thèse identifiée 12047 :

```bash
localhost:8080/these/12047
```

## Remarques complémentaires

* Le web service ne répond qu'aux requêtes de type GET.
* Le web service retourne du json seulement, le header de la requête doit en tenir compte 

```bash
Accept: application/json
```

* Le Web service nécessite un authentification (basique). 
