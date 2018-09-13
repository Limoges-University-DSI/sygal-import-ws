# Vues sources

Une "vue source" est une vue dans la base de données d'un établissement, qui est 
interrogée par le web service pour rappatrier les données dans Sygal.

Elle interroge soit la base de données Apogée (Caen, Le Havre, Rouen), soit Physalys (INSA Rouen).

## Inventaire

Il existe une vue par "service" :

    Service "acteur"            : vue SYGAL_ACTEUR
    Service "doctorant"         : vue SYGAL_DOCTORANT
    Service "ecole-doctorale"   : vue SYGAL_ECOLE_DOCT
    Service "etablissement"     : vue SYGAL_ETAB
    Service "individu"          : vue SYGAL_INDIVIDU
    Service "role"              : vue SYGAL_ROLE
    Service "source"            : vue SYGAL_SOURCE
    Service "structure"         : vue SYGAL_STRUCTURE
    Service "these"             : vue SYGAL_THESE
    Service "unite-recherche"   : vue SYGAL_UNITE_RECH
    Service "variable"          : vue SYGAL_VARIABLE
  
## Colonnes

Une vue comporte systématiquement les colonnes suivantes :
  - `ID` : NUMBER ou VARCHAR2, identifiant unique de la données.
  - `SOURCE_ID` : VARCHAR2, identifiant la source (provenance) de la données, ex: 'apogee'.
  
## Contraintes de référence

Les données de ces vues ont des liens entre elles. Si bien qu'une colonne de la forme `*_ID`
référence une données d'une autre vue. Exemples : 
  - C'est le cas de la colonne `SOURCE_ID` qui contient des `ID` issus de la vue `SYGAL_SOURCE`.
  - Dans la vue `SYGAL_THESE`, la colonne `DOCTORANT_ID` contient des `ID` issus de la 
  vue `SYGAL_THESE`.
  - Dans la vue `SYGAL_DOCTORANT`, la colonne `INDIVIDU_ID` contient des `ID` issus de la 
  vue `SYGAL_INDIVIDU`.
  
Ce ne sont pas des vraies contraintes de références
puisqu'on est dans des vues mais charge à vous de garantir la cohérence de ces références.
