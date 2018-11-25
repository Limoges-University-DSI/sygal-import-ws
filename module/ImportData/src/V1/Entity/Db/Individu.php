<?php

namespace ImportData\V1\Entity\Db;

/**
 * These
 *
 * @codeCoverageIgnore
 */
class Individu
{

    protected $id;
    protected $sourceId;
    protected $supannId;
    protected $type;
    protected $civilite;
    protected $nomUsuel;
    protected $nomPatronymique;
    protected $prenom1;
    protected $prenom2;
    protected $prenom3;
    protected $email;
    protected $dateNaissance;
    protected $nationalite;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return string
     */
    public function getSupannId()
    {
        return $this->supannId;
    }

    /**
     * @param string $supannId
     */
    public function setSupannId($supannId)
    {
        $this->supannId = $supannId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }

    /**
     * @return mixed
     */
    public function getNomUsuel()
    {
        return $this->nomUsuel;
    }

    /**
     * @param mixed $nomUsuel
     */
    public function setNomUsuel($nomUsuel)
    {
        $this->nomUsuel = $nomUsuel;
    }

    /**
     * @return mixed
     */
    public function getNomPatronymique()
    {
        return $this->nomPatronymique;
    }

    /**
     * @param mixed $nomPatronymique
     */
    public function setNomPatronymique($nomPatronymique)
    {
        $this->nomPatronymique = $nomPatronymique;
    }

    /**
     * @return mixed
     */
    public function getPrenom1()
    {
        return $this->prenom1;
    }

    /**
     * @param mixed $prenom1
     */
    public function setPrenom1($prenom1)
    {
        $this->prenom1 = $prenom1;
    }

    /**
     * @return mixed
     */
    public function getPrenom2()
    {
        return $this->prenom2;
    }

    /**
     * @param mixed $prenom2
     */
    public function setPrenom2($prenom2)
    {
        $this->prenom2 = $prenom2;
    }

    /**
     * @return mixed
     */
    public function getPrenom3()
    {
        return $this->prenom3;
    }

    /**
     * @param mixed $prenom3
     */
    public function setPrenom3($prenom3)
    {
        $this->prenom3 = $prenom3;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param mixed $nationalite
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }
}
