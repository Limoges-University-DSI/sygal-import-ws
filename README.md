# sygal-import-ws


## Que fait *sygal-import-ws* ?

*sygal-import-ws* est un web service (ws) qui interroge les données présentes dans un SI (via des vues en base de données) 
et les met à disposition pour leur lecture via des requêtes GET.


## Technologies employées

*sygal-import-ws* repose sur l'utilisation de :
- [Apigility](https://apigility.org/) pour la fourniture du ws ;
- [Doctrine](http://www.doctrine-project.org/) pour la gestion de la partie BDD (notamment des schémas des tables).


## Installation

### Obtention des sources

S'il s'agit de la première installation du ws, vous devez lancer la commande suivante pour obtenir les sources :

```bash
git clone git@git.unicaen.fr:dsi/sygal-import-ws.git
cd sygal-import-ws
```

### Installation d'une version précise

Lancer la commande suivante pour obtenir la liste des versions disponibles du ws.
```bash
git fetch && git fetch --tags && git tag
```

Et si la version la plus récente est par exemple la `1.0.0`, utilisez la commande suivante pour "installer" sur cette version :
```bash
git checkout 1.0.0
```

### Installation des dépendances

Installez les packages requis par le ws via [Composer](https://getcomposer.org/) comme ceci :
```bash
composer install --no-suggest --optimize-autoloader
```

### Fichier "users.htpasswd"

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

### Fichiers de config

S'il s'agit d'une mise à jour du ws, vous avez déjà fait la manip, inutile de lire ce paragraphe.
Reportez-vous au "release notes" de la version choisie (ex: [1.0.0](https://git.unicaen.fr/dsi/sygal-import-ws/tags/1.0.0)).

S'il s'agit de la première installation du ws, 2 fichiers situés dans le répertoire `config/autoload` ont besoin d'être 
complétés puis renommés :

  - **local.php.dist** : qui est notamment utilisé pour l'authentification.
    - clé `htpasswd` qui désigne le chemin du fichier "users.htpasswd" évoqué plus haut
  - **database.local.php.dist** : qui est utilisé pour la connection à la BDD.
    - clés `host`, `dbname`, `port`, `user`, `password` : les infos d'accès à la BDD.
 
Une fois ces fichiers complétés, changer leur extension `.php.dist` en `.php`.

### Interface d'admin Apigility

Passez en mode développement pour ouvrir l'accès à l'interface Apigility de modification du WS :
```bash
composer development-enable
``` 

Cette fonctionnalité est réservée aux développeurs du WS et est **INTERDIT EN PRODUCTION**.
Assurez-vous de bien désactiver le mode développement :
```bash
composer development-disable
``` 



## Lancement du web service *pour le dévelopement*

### Solution 1 : le serveur interne PHP
 
En phase de développement, la façon la plus simple consiste en l'utilisation 
du serveur interne de php :

 ```bash
php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
 ```

### Solution 2 : Docker

Se placer à la racine des sources du ws pour lancer la commande suivante :

```bash
docker-compose up -d --build
```

Vérifier que le container `sygal-import-ws-container` figure bien dans la liste des containers
lancés listés par la commande suivante (cf. colonne `NAMES`) :

```bash
docker ps
```

Le port sur lequel écoute le ws est indiqué dans la colonne `PORTS`. 
Par exemple, `0.0.0.0:443->8443/tcp` indique que le ws est accessible sur la machine hôte 
à l'adresse `https://localhost:8443`.


## Les services fournis
 
Chaque vue en base de données peut être interrogée via un service dédié :
* Acteur :              https://localhost:8443/acteur
* Doctorant :           https://localhost:8443/doctorant
* Individu :            https://localhost:8443/individu
* Role :                https://localhost:8443/role
* Source :              https://localhost:8443/source
* These :               https://localhost:8443/these
* Variable :            https://localhost:8443/variable
* Structure :           https://localhost:8443/structure
* Etablissement :       https://localhost:8443/etablissement
* Ecole doctorale :     https://localhost:8443/ecole-doctorale
* Unite de recherche :  https://localhost:8443/unite-recherche

Exemple :
```bash
curl --insecure --header "Accept: application/json" --header "Authorization: Basic xxxx" https://localhost:8443/variable
```

Remplacer `xxxx` par le token généré grâce à la commande suivante 
(le mot de passe est celui choisi lors de la commande `htpasswd -c users.htpasswd sygal-app`) :
```bash
echo -n 'sygal-app:motdepasse' | base64
```

Il se peut que vous soyez obligé de contourner le proxy en faisant ceci :
```bash
export no_proxy=localhost
```

L'interrogation d'un service sans paramètre va retourner l'intégralité des données concernées.

Afin d'obtenir les informations spécifiques à une donnée, il est possible d'ajouter son identifiant, exemple :
```bash
curl --insecure --header "Accept: application/json" --header "Authorization: Basic xxxx" https://localhost:8443/variable/ETB_LIB_NOM_RESP
```

Pour mettre en forme le JSON retourné et faciliter la lecture, une solution est d'utiliser `python -m json.tool`:
```bash
curl --insecure --header "Accept: application/json" --header "Authorization: Basic xxxx" https://localhost:8443/variable | python -m json.tool
```


## Remarques complémentaires

* Le web service ne répond qu'aux requêtes de type GET.
* Le web service retourne du json seulement.


## Service Acteur

Ce service accepte un paramètre supplémentaire : un identifiant de thèse (source code) peut être spécifié pour obtenir 
les acteurs de cette seule thèse. 
Exemple :
```bash
curl --insecure --header "Accept: application/json" --header "Authorization: Basic xxxxx" https://localhost:8443/acteur?these_id=13111
```
