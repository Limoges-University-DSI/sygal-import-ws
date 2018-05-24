# Mise à jour du web service

Cette page explique la procédure d'installation d'une nouvelle version du web service (ws).

## Mise à jour des sources

  - Sur le serveur où est installé le web service, placez-vous dans le répertoire du web service : 
  normalement, c'est "/var/www/html/sygal-import-ws/".
  - Lancez la commande `git fetch && git fetch --tags && git tag` pour obtenir la liste des versions disponibles du ws.
  - Si la version la plus récente est par exemple la `1.0`, lancez la commande `git checkout 1.0` pour "basculer" sur la version 1.0 du ws. 
  - Ouvrez le fichier README.md et suivez les instructions du paragraphe "Installation". 
  NB: n'activez pas le "mode développement".

## Configuration

Cf. `INSTALL.md` au paragraphe correspondant à la version choisie.

## Vues Oracle

Idem.
