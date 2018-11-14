# Changelog

## v1.0.0 (24/05/2018)

- [FEATURE] Nouveaux services `structure`, `etablissement`, `unite-recherche`, `ecole-doctorale`.
- [BUGFIX]  Le schéma Oracle dans lequel se trouve les vues sources est désormais spécifié dans la config.
- [CLEANUP] Abandon du prefixe de nommage des vues sources `OBJECTH_*` au profit de `SYGAL_*`. 

## v1.1.0 (13/09/2018)

- [FEATURE] Import des établissements des (co-)directeurs de thèses, rapporteurs et membres du jury, 
nécessaires à la génération des pages de couverture.
- [BUGFIX] Le script de la vue SYGAL_ACTEUR ne produisait pas des id totalement uniques !

## v1.1.1 (21/09/2018)

- Pagination des données retournées par les services, c'est plus sérieux.
- Pour ceux qui ont Apogée, amélioration du temps de réponse du service "individu" 
grâce à l'utilisation d'une vue matérialisée des emails des individus, rafraîchie toutes les 10 minutes.

## v1.1.2 (04/10/2018)

- [BUGFIX] Les données n'étaient pas triées correctement, entraînant la présence possible du même enregistrement
sur 2 pages distinctes retournées par le web service.

## v1.1.3 (22/10/2018)

- [BUGFIX] Correction du script de la vue Apogée SYGAL_INDIVIDU qui inversait le nom usuel et le nom de naissance 
des acteurs.

## v1.2.0 (08/11/2018)

- [FEATURE] Sygal peut désormais avoir connaissance de tous les acteurs des thèses (ex: co-directeurs sur les thèses de Rouen) 
            tout en permettant à l'établissement source de conserver sa propre codification des rôles des acteurs.
- [FEATURE] Deux nouveaux services apparaissent pour que Sygal puisse importer les informations concernant le financement 
            des thèses en cours : 'financement' et 'origine-financement'. 
- [FEATURE] Le service 'version' retourne désormais la version déployée effective (à l'aide de git).

## v1.2.1 (??/11/2018)

- [BUGFIX] supann_id dans individu...
