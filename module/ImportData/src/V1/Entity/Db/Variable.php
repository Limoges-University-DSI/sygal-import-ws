<?php

namespace ImportData\V1\Entity\Db;


/**
 * Variable
 */
class Variable
{

    /**
     * @var integer
     */
    protected $id;
    protected $sourceId;
    protected $libEtablissement;
    protected $libResponsable;
    protected $libTitre;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibEtablissement()
    {
        return $this->libEtablissement;
    }

    /**
     * @param mixed $libEtablissement
     */
    public function setLibEtablissement($libEtablissement)
    {
        $this->libEtablissement = $libEtablissement;
    }

    /**
     * @return mixed
     */
    public function getLibResponsable()
    {
        return $this->libResponsable;
    }

    /**
     * @param mixed $libResponsable
     */
    public function setLibResponsable($libResponsable)
    {
        $this->libResponsable = $libResponsable;
    }

    /**
     * @return mixed
     */
    public function getLibTitre()
    {
        return $this->libTitre;
    }

    /**
     * @param mixed $libTitre
     */
    public function setLibTitre($libTitre)
    {
        $this->libTitre = $libTitre;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param mixed $sourceId
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }


}