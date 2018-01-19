<?php

namespace ImportData\V1\Entity\Db;


/**
 * Doctorant
 */
class These
{

    /**
     * @var integer
     */
    protected $id;
    protected $title;
    protected $individuId;
    protected $etatThese;
    protected $uniteRechId;
    protected $ecoleDoctId;
    protected $libDiscipline;
    protected $libEtabCotut;
    protected $libPaysCotut;
    protected $datePremiereInsc;
    protected $dateSoutenanceAutorisee;
    protected $dateSoutenancePrev;
    protected $dateSoutenance;
    protected $dateConfidFin;
    protected $resultat;
    protected $correctionAutorisee;
    protected $sourceCode;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getIndividuId()
    {
        return $this->individuId;
    }

    /**
     * @param mixed $individuId
     */
    public function setIndividuId($individuId)
    {
        $this->individuId = $individuId;
    }

    /**
     * @return mixed
     */
    public function getEtatThese()
    {
        return $this->etatThese;
    }

    /**
     * @param mixed $etatThese
     */
    public function setEtatThese($etatThese)
    {
        $this->etatThese = $etatThese;
    }

    /**
     * @return mixed
     */
    public function getUniteRechId()
    {
        return $this->uniteRechId;
    }

    /**
     * @param mixed $uniteRechId
     */
    public function setUniteRechId($uniteRechId)
    {
        $this->uniteRechId = $uniteRechId;
    }

    /**
     * @return mixed
     */
    public function getEcoleDoctId()
    {
        return $this->ecoleDoctId;
    }

    /**
     * @param mixed $ecoleDoctId
     */
    public function setEcoleDoctId($ecoleDoctId)
    {
        $this->ecoleDoctId = $ecoleDoctId;
    }

    /**
     * @return mixed
     */
    public function getLibDiscipline()
    {
        return $this->libDiscipline;
    }

    /**
     * @param mixed $libDiscipline
     */
    public function setLibDiscipline($libDiscipline)
    {
        $this->libDiscipline = $libDiscipline;
    }

    /**
     * @return mixed
     */
    public function getLibEtabCotut()
    {
        return $this->libEtabCotut;
    }

    /**
     * @param mixed $libEtabCotut
     */
    public function setLibEtabCotut($libEtabCotut)
    {
        $this->libEtabCotut = $libEtabCotut;
    }

    /**
     * @return mixed
     */
    public function getLibPaysCotut()
    {
        return $this->libPaysCotut;
    }

    /**
     * @param mixed $libPaysCotut
     */
    public function setLibPaysCotut($libPaysCotut)
    {
        $this->libPaysCotut = $libPaysCotut;
    }

    /**
     * @return mixed
     */
    public function getDatePremiereInsc()
    {
        return $this->datePremiereInsc;
    }

    /**
     * @param mixed $datePremiereInsc
     */
    public function setDatePremiereInsc($datePremiereInsc)
    {
        $this->datePremiereInsc = $datePremiereInsc;
    }



    /**
     * @return mixed
     */
    public function getDateSoutenanceAutorisee()
    {
        return $this->dateSoutenanceAutorisee;
    }

    /**
     * @param mixed $dateSoutenanceAutorisee
     */
    public function setDateSoutenanceAutorisee($dateSoutenanceAutorisee)
    {
        $this->dateSoutenanceAutorisee = $dateSoutenanceAutorisee;
    }

    /**
     * @return mixed
     */
    public function getDateSoutenancePrev()
    {
        return $this->dateSoutenancePrev;
    }

    /**
     * @param mixed $dateSoutenancePrev
     */
    public function setDateSoutenancePrev($dateSoutenancePrev)
    {
        $this->dateSoutenancePrev = $dateSoutenancePrev;
    }

    /**
     * @return mixed
     */
    public function getDateSoutenance()
    {
        return $this->dateSoutenance;
    }

    /**
     * @param mixed $dateSoutenance
     */
    public function setDateSoutenance($dateSoutenance)
    {
        $this->dateSoutenance = $dateSoutenance;
    }

    /**
     * @return mixed
     */
    public function getDateConfidFin()
    {
        return $this->dateConfidFin;
    }

    /**
     * @param mixed $dateConfidFin
     */
    public function setDateConfidFin($dateConfidFin)
    {
        $this->dateConfidFin = $dateConfidFin;
    }

    /**
     * @return mixed
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * @param mixed $resultat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }

    /**
     * @return mixed
     */
    public function getCorrectionAutorisee()
    {
        return $this->correctionAutorisee;
    }

    /**
     * @param mixed $correctionAutorisee
     */
    public function setCorrectionAutorisee($correctionAutorisee)
    {
        $this->correctionAutorisee = $correctionAutorisee;
    }

    /**
     * @return mixed
     */
    public function getSourceCode()
    {
        return $this->sourceCode;
    }

    /**
     * @param mixed $sourceCode
     */
    public function setSourceCode($sourceCode)
    {
        $this->sourceCode = $sourceCode;
    }



}
