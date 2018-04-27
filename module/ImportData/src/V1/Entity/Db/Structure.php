<?php

namespace ImportData\V1\Entity\Db;

/**
 * Structure
 */
class Structure
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $sourceId;

    /**
     * @var string
     */
    private $typeStructureId;

    /**
     * @var string
     */
    private $sigle;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var string
     */
    private $codePays;

    /**
     * @var string
     */
    private $libellePays;


    /**
     * Set id
     *
     * @param string $id
     *
     * @return Structure
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sourceId
     *
     * @param string $sourceId
     *
     * @return Structure
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    /**
     * Get sourceId
     *
     * @return string
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Set typeStructureId
     *
     * @param string $typeStructureId
     *
     * @return Structure
     */
    public function setTypeStructureId($typeStructureId)
    {
        $this->typeStructureId = $typeStructureId;

        return $this;
    }

    /**
     * Get typeStructureId
     *
     * @return string
     */
    public function getTypeStructureId()
    {
        return $this->typeStructureId;
    }

    /**
     * Set sigle
     *
     * @param string $sigle
     *
     * @return Structure
     */
    public function setSigle($sigle)
    {
        $this->sigle = $sigle;

        return $this;
    }

    /**
     * Get sigle
     *
     * @return string
     */
    public function getSigle()
    {
        return $this->sigle;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Structure
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set codePays
     *
     * @param string $codePays
     *
     * @return Structure
     */
    public function setCodePays($codePays)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return string
     */
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * Set libellePays
     *
     * @param string $libellePays
     *
     * @return Structure
     */
    public function setLibellePays($libellePays)
    {
        $this->libellePays = $libellePays;

        return $this;
    }

    /**
     * Get libellePays
     *
     * @return string
     */
    public function getLibellePays()
    {
        return $this->libellePays;
    }
}
