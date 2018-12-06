--
--
-- SyGAL
-- =====
--
-- Web Service d'import de données
-- -------------------------------
--
-- Vues Apogée ULHN.
--


create or replace view SYGAL_VARIABLE_MANU as
  select
    'apogee' as source_id,
    'EMAIL_ASSISTANCE' as id,
    'EMAIL_ASSISTANCE' as cod_vap,
    'Adresse mail de l''assistance utilisateur' as lib_vap,
    'assistance-sygal@univ-lehavre.fr' as par_vap,
    to_date('2017-01-01', 'YYYY-MM-DD') as DATE_DEB_VALIDITE,
    to_date('9999-12-31', 'YYYY-MM-DD') as DATE_FIN_VALIDITE
  from dual
  union all
  select
    'apogee' as source_id,
    'EMAIL_BU' as id,
    'EMAIL_BU' as cod_vap,
    'Adresse mail de contact de la BU' as lib_vap,
    'scd.theses@univ-lehavre.fr' as par_vap,
    to_date('2017-01-01', 'YYYY-MM-DD') as DATE_DEB_VALIDITE,
    to_date('9999-12-31', 'YYYY-MM-DD') as DATE_FIN_VALIDITE
  from dual
  union all
  select
    'apogee' as source_id,
    'EMAIL_BDD' as id,
    'EMAIL_BDD' as cod_vap,
    'Adresse mail de contact du bureau des doctorats' as lib_vap,
    'recherche.doctorat@univ-lehavre.fr' as par_vap,
    to_date('2017-01-01', 'YYYY-MM-DD') as DATE_DEB_VALIDITE,
    to_date('9999-12-31', 'YYYY-MM-DD') as DATE_FIN_VALIDITE
  from dual
/

create or replace view SYGAL_ROLE_TR as
  select 'A', 'A' from dual union
  select 'B', 'B' from dual union
  select 'C', 'C' from dual union
  select 'D', 'D' from dual union
  select 'K', 'K' from dual union
  select 'M', 'M' from dual union
  select 'P', 'P' from dual union
  select 'R', 'R' from dual
/
