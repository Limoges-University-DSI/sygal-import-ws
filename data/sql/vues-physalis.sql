--
--
-- SyGAL
-- =====
--
-- Web Service d'import de données
-- -------------------------------
--
-- Vues PHYSALIS : INSA Rouen
--


-- Changement de préfixe des vues existantes :

rename OBJECTH_SOURCE     to SYGAL_SOURCE    ;
rename OBJECTH_VARIABLE   to SYGAL_VARIABLE  ;
rename OBJECTH_INDIVIDU   to SYGAL_INDIVIDU  ;
rename OBJECTH_ROLE       to SYGAL_ROLE      ;
rename OBJECTH_DOCTORANT  to SYGAL_DOCTORANT ;
rename OBJECTH_THESE      to SYGAL_THESE     ;
rename OBJECTH_ACTEUR     to SYGAL_ACTEUR    ;



-- 4 nouvelles vues à écrire :

/*
create view SYGAL_STRUCTURE as
...
;

create view SYGAL_ECOLE_DOCT as
...
;

create view SYGAL_UNITE_RECH as
...
;

create view SYGAL_ETABLISSEMENT as
...
;
*/
