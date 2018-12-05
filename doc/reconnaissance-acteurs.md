# Reconnaissance des différents acteurs par l'application


## Etablissements ayant Apogée

### Acteurs de thèses

Pour permettre à chaque établissement de faire un état des lieux des acteurs de thèses (ex: directeurs de thèses) qui 
pourront retrouver leurs petits dans Sygal, je vous propose d'utiliser une requête à lancer sur votre base Apogée.

Une fois que vous aurez mis à jour les vues SYGAL comme demandé dans la version 1.2.1 du WS, lancez cette requête pour 
lister les individus que Sygal sera en mesure de "reconnaître" comme acteur d'une thèse :

    select r.lib_roj, t.id as cod_ths, civ, lib_nom_usu_ind, lib_pr1_ind, substr(i.id, 9) as cod_per, i.supann_id
    from sygal_individu i
        join sygal_acteur a on a.individu_id = i.id
        join sygal_these t on a.these_id = t.id and t.eta_ths in ('E') -- thèses en cours
        join sygal_role r on r.id = a.role_id -- and r.ID in ('D', 'K') -- directeur et co-directeur de thèse
    --where i.supann_id is null -- code harpege manquant
    order by i.supann_id nulls first, r.id, lib_nom_usu_ind;

Remarques :
- Seules les thèses en cours (E) sont prises en compte.
- Vous pouvez décommenter "and r.ID in ('D', 'K')" pour ne prendre en compte que les directeurs et co-directeurs de 
thèses, c'est suffisant.

Points importants :
- Colonne COD_PER : c'est le code "personnel" Apogée de l'individu, elle est forcément renseignée.
- Colonne SUPANN_ID :
  - Si elle est renseignée, l'individu possède dans Apogée un code Harpege (cf. colonne "num_dos_har_per" de la table 
  "personnel" pour le COD_PER en question). Lorsque l'individu se connecte avec la fédération d'identité Renater, c'est 
  ce code Harpege que Sygal obtient via l'attribut shibboleth "supannEmpId". Par exemple, lorsque Patrice Lerouge se 
  connecte, Sygal obtient un supannEmpId=4203.
  - Si lette colonne est null, l'individu pourra se connecter mais il ne sera pas reconnu par Sygal comme acteur d'une 
  thèse. C'est ce genre de situation que Sygal signale pour les directeurs de thèses par un triangle rouge sur la page 
  Thèse.

Pour renseigner dans Apogée le code Harpege qui ferait défaut, il faut aller sur la fiche "Personnel" de l'individu en 
question, cadre "Infos administratives".

### Doctorants

A priori, pas d'inquiétude concernant les doctorants.



## Etablissements ayant Physalis

### Acteurs de thèses

Pour permettre aux acteurs de thèses de retrouver leurs petits...

Dans la vue `SYGAL_INDIVIDU `:
- la colonne ID contient le "supannEmpId" de l'individu ou, si ce n'est pas possible, un autre identifiant unique de l'individu (ex: équivalent Physalis du COD_PER Apogée) ;
- la colonne SUPANN_ID contient le "supannEmpId" de l'individu ou, si ce n'est pas possible, NULL.

Dans la vue `SYGAL_ACTEUR `:
- la colonne INDIVIDU_ID référence un ID de la la vue `SYGAL_INDIVIDU`.
- la colonne ROLE_ID référence un ID de la vue `SYGAL_ROLE` (ex: 'D' pour directeur de thèse).

### Doctorants

Pour permettre aux doctorants de retrouver leurs thèses...

Dans la vue `SYGAL_INDIVIDU `:
- la colonne ID contient le "supannEtuId" de l'étudiant ou, si ce n'est pas possible, un autre identifiant unique ;
- la colonne SUPANN_ID contient le "supannEtuId" de l'étudiant ou, si ce n'est pas possible, NULL.

Dans la vue `SYGAL_DOCTORANT `:
- la colonne ID contient le "supannEtuId" de l'étudiant ou, si ce n'est pas possible, un autre identifiant unique ;
- la colonne INDIVIDU_ID référence un ID de la vue `SYGAL_INDIVIDU`.

Dans la vue `SYGAL_THESE `:
- la colonne DOCTORANT_ID référence un ID de la la vue `SYGAL_INDIVIDU`.
- la colonne ROLE_ID référence un ID de la vue `SYGAL_ROLE `(ex: 'D' pour directeur de thèse).
