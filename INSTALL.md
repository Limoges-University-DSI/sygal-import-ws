# Installation

## v1.0

### Configuration du web service

Dans le fichier `config/autoload/local.php`, ajoutez une nouvelle clé `CURRENT_SCHEMA` avec pour valeur le 
nom du schéma dans lequel se trouvent les vues sources. 
Exemple :

    return [
        'doctrine' => [
            'connection' => [
                'orm_default' => [
                    //...
                    'params' => [
                        //...
                        'CURRENT_SCHEMA' => 'APOGEE',
                    ],
                ],
            ],
        ],

### Mise à jour des vues sources

NB: Le prefixe de nommage `OBJECTH_*` est abandonné au profit de `SYGAL_*`. 

#### Pour Apogée 

- Vous n'avez pas à renommer vous-même les vues en `SYGAL_*`.
- Récupérez le script `data/sql/vues-apogee-{etab}.sql` où `{etab}` correspond à votre établissement 
(ex: `vues-apogee-urn.sql` est pour l'Université de Rouen Normandie), personnalisez la requête pour votre établissement 
puis lancez la requête SQL. 
- Exécutez ensuite le script `data/sql/vues-apogee.sql`.

#### Pour Physalis 

- Renommer les vues existantes à l'aide du script `data/sql/vues-physalis.sql`.
- Écrire les 4 nouvelles vues suivantes en s'inspirant du script `data/sql/vues-apogee.sql` :
  - SYGAL_STRUCTURE : factorisation des attributs communs aux établissements, UR, ED.
  - SYGAL_ETAB
  - SYGAL_ECOLE_DOCT
  - SYGAL_UNITE_RECH

