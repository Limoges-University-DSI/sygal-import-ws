--
--
-- SyGAL
-- =====
--
-- Web Service d'import de données
-- -------------------------------
--
-- Vues Apogée URN.
--


create or replace view SYGAL_VARIABLE_MANU as
  select
    'apogee' as source_id,
    'EMAIL_ASSISTANCE' as id,
    'EMAIL_ASSISTANCE' as cod_vap,
    'Adresse mail de l''assistance utilisateur' as lib_vap,
    'assistance-sygal@univ-rouen.fr' as par_vap,
    to_date('2017-01-01', 'YYYY-MM-DD') as DATE_DEB_VALIDITE,
    to_date('9999-12-31', 'YYYY-MM-DD') as DATE_FIN_VALIDITE
  from dual
  union all
  select
    'apogee' as source_id,
    'EMAIL_BU' as id,
    'EMAIL_BU' as cod_vap,
    'Adresse mail de contact de la BU' as lib_vap,
    'scd.theses@univ-rouen.fr' as par_vap,
    to_date('2017-01-01', 'YYYY-MM-DD') as DATE_DEB_VALIDITE,
    to_date('9999-12-31', 'YYYY-MM-DD') as DATE_FIN_VALIDITE
  from dual
  union all
  select
    'apogee' as source_id,
    'EMAIL_BDD' as id,
    'EMAIL_BDD' as cod_vap,
    'Adresse mail de contact du bureau des doctorats' as lib_vap,
    'recherche.doctorat@univ-rouen.fr' as par_vap,
    to_date('2017-01-01', 'YYYY-MM-DD') as DATE_DEB_VALIDITE,
    to_date('9999-12-31', 'YYYY-MM-DD') as DATE_FIN_VALIDITE
  from dual
/

create or replace view SYGAL_ROLE_TR(FROM_COD_ROJ, TO_COD_ROJ) as
  select 'A', 'R' from dual union -- rapporteur du jury
  select 'C', 'K' from dual union -- co-dir
  select 'D', 'D' from dual union -- dir
  select 'E', 'M' from dual union -- examinateur => membre du jury (discutable)
  select 'M', 'M' from dual union -- membre du jury
  select 'N', 'B' from dual union -- co-encadrant
  select 'P', 'P' from dual union -- président du jury
  select 'R', 'R' from dual       -- rapporteur du jury
/

