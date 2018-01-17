<?php

namespace FirstRest\V1\Entity\Db;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Doctorant
 */
class Doctorant
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $civilite;

    /**
     * @var string
     */
    protected $nationalite;

    /**
     * @var \DateTime
     */
    protected $dateNaissance;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $nomPatronymique;

    /**
     * @var string
     */
    protected $nomUsuel;

    /**
     * @var string
     */
    protected $prenom;

    /**
     * @var string
     */
    protected $prenoms;

    /**
     * @var string
     */
    protected $sourceCode;

    /**
     * @var string
     */
    protected $tel;

    /**
     * @var Collection
     */
    private $complements;

    protected $histoCreation;
    protected $histoDestruction;
    protected $histoModification;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->complements = new ArrayCollection();
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return self
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param string $nationalite
     * @return Doctorant
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nomPatronymique
     *
     * @param string $nomPatronymique
     *
     * @return self
     */
    public function setNomPatronymique($nomPatronymique)
    {
        $this->nomPatronymique = $nomPatronymique;

        return $this;
    }

    /**
     * Get nomPatronymique
     *
     * @return string
     */
    public function getNomPatronymique()
    {
        return $this->nomPatronymique;
    }

    /**
     * Set nomUsuel
     *
     * @param string $nomUsuel
     *
     * @return self
     */
    public function setNomUsuel($nomUsuel)
    {
        $this->nomUsuel = $nomUsuel;

        return $this;
    }

    /**
     * Get nomUsuel
     *
     * @return string
     */
    public function getNomUsuel()
    {
        return $this->nomUsuel;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @param bool $tous
     * @return string
     */
    public function getPrenom($tous = false)
    {
        return $tous ? $this->prenoms : $this->prenom;
    }

    /**
     * Get prenoms
     *
     * @return string
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * Set prenoms
     *
     * @param string $prenoms
     *
     * @return self
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    /**
     * Set sourceCode
     *
     * @param string $sourceCode
     *
     * @return self
     */
    public function setSourceCode($sourceCode)
    {
        $this->sourceCode = $sourceCode;

        return $this;
    }

    /**
     * Get sourceCode
     *
     * @return string
     */
    public function getSourceCode()
    {
        return $this->sourceCode;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return self
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return self
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCiviliteToString()
    {
        return $this->getCivilite();
    }

    /**
     * Get estUneFemme
     *
     * @return bool
     */
    public function estUneFemme()
    {
        return 'Mme' === $this->getCivilite();
    }

    /**
     * @return mixed
     */
    public function getHistoCreation()
    {
        return $this->histoCreation;
    }

    /**
     * @param mixed $histoCreation
     */
    public function setHistoCreation($histoCreation)
    {
        $this->histoCreation = $histoCreation;
    }

    /**
     * @return mixed
     */
    public function getHistoDestruction()
    {
        return $this->histoDestruction;
    }

    /**
     * @param mixed $histoDestruction
     */
    public function setHistoDestruction($histoDestruction)
    {
        $this->histoDestruction = $histoDestruction;
    }

    /**
     * @return mixed
     */
    public function getHistoModification()
    {
        return $this->histoModification;
    }

    /**
     * @param mixed $histoModification
     */
    public function setHistoModification($histoModification)
    {
        $this->histoModification = $histoModification;
    }

}
