# Première installation du web service

Cette page présente la procédure à suivre pour installer le web service pour la première fois.

## A/ Préalables

- Rendez-vous à l'adresse https://git.unicaen.fr/dsi/sygal-import-ws.
- Connectez-vous via la fédération d'identité Renater.
Si vous n'accédez à rien, c'est que par défaut vous n'avez pas accès au projet "sygal-import-ws", il faut nous demander de vous habiliter sur le projet pour pouvoir continuer, envoyez-nous un mail...

## B/ Config serveur et sources du ws

- Installez une Debian Stretch + PHP7 + Apache comme base de départ.

- Installez les sources de l'appli :
  - Créez une clé SSH sur le serveur : https://git.unicaen.fr/help/ssh/README
  - Sur Gitlab, déclarez cette clé SSH dans les paramètres de votre compte : https://git.unicaen.fr/profile/keys
  - Sur le serveur, placez-vous dans le répertoire `/var/www/html/`.
  - Faites un `git clone git@git.unicaen.fr:dsi/sygal-import-ws.git`, ce qui va "installer" les sources du ws dans le répertoire "sygal-import-ws".
  - Placez-vous dans le répertoire "/var/www/html/sygal-import-ws/".
  - Lancez la commande `git fetch && git fetch --tags && git tag` pour obtenir la liste des versions disponibles du ws.
  - Si la version la plus récente est par exemple la `1.0`, lancez la commande `git checkout 1.0` pour "basculer" sur la version 1.0 du ws. 
  - Ouvrez le fichier README.md et suivez les instructions du paragraphe "Installation". 
  NB: n'activez pas le "mode développement".

- Poursuivez l'installation du serveur :
  - Même sans connaître Docker, le fichier `Dockerfile.php7.dev` fourni avec les sources est compréhensible et fournit toutes les étapes nécessaires pour atteindre la config parfaite!
Une remarque sur l'installation du package PHP Oracle OCI8 : vous aurez besoin des 3 fichiers `instantclient-*` situés dans le répertoire `docker/`.
  - La config Apache pour le ws est dans le répertoire `docker/` : `apache-site.conf`, `apache-site-ssl.conf` et `apache-ports.conf`.
  - La config PHP est aussi dans le répertoire `docker/` : `php.conf`.

## C/ Réseau

- Le ws doit écouter sur les port 8080 (en http) et 8443 (en https).
- Autoriser l'accès depuis l'extérieur sur ces ports (on vous dira notre IP de sortie si besoin).
