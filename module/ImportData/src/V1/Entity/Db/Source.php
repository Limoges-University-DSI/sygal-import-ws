<?php

namespace ImportData\V1\Entity\Db;


/**
 * Source
 */
class Source
{

    /**
     * @var integer
     */
    protected $id;
    protected $libelle;
    protected $importable;

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getImportable()
    {
        return $this->importable;
    }

    /**
     * @param mixed $importable
     */
    public function setImportable($importable)
    {
        $this->importable = $importable;
    }



}