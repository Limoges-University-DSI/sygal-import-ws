<?php

namespace ImportData\V1\Entity\Db;

/**
 * Acteur
 */
class Acteur
{
    protected $id;
    protected $sourceId;
    protected $theseId;
    protected $roleId;
    protected $individuId;
    protected $acteurEtablissementId;
    protected $codeRoleJury;
    protected $libRoleJury;
    protected $codeQualite;
    protected $libQualite;
    protected $temoinHDR;
    protected $temoinRapport;

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
     * @return mixed
     */
    public function getTheseId()
    {
        return $this->theseId;
    }

    /**
     * @param mixed $theseId
     */
    public function setTheseId($theseId)
    {
        $this->theseId = $theseId;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param mixed $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
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
    public function getActeurEtablissementId()
    {
        return $this->acteurEtablissementId;
    }

    /**
     * @param mixed $acteurEtablissementId
     * @return Acteur
     */
    public function setActeurEtablissementId($acteurEtablissementId)
    {
        $this->acteurEtablissementId = $acteurEtablissementId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeRoleJury()
    {
        return $this->codeRoleJury;
    }

    /**
     * @param mixed $codeRoleJury
     */
    public function setCodeRoleJury($codeRoleJury)
    {
        $this->codeRoleJury = $codeRoleJury;
    }

    /**
     * @return mixed
     */
    public function getLibRoleJury()
    {
        return $this->libRoleJury;
    }

    /**
     * @param mixed $libRoleJury
     */
    public function setLibRoleJury($libRoleJury)
    {
        $this->libRoleJury = $libRoleJury;
    }

    /**
     * @return mixed
     */
    public function getCodeQualite()
    {
        return $this->codeQualite;
    }

    /**
     * @param mixed $codeQualite
     */
    public function setCodeQualite($codeQualite)
    {
        $this->codeQualite = $codeQualite;
    }

    /**
     * @return mixed
     */
    public function getLibQualite()
    {
        return $this->libQualite;
    }

    /**
     * @param mixed $libQualite
     */
    public function setLibQualite($libQualite)
    {
        $this->libQualite = $libQualite;
    }

    /**
     * @return mixed
     */
    public function getTemoinHDR()
    {
        return $this->temoinHDR;
    }

    /**
     * @param mixed $temoinHDR
     */
    public function setTemoinHDR($temoinHDR)
    {
        $this->temoinHDR = $temoinHDR;
    }

    /**
     * @return mixed
     */
    public function getTemoinRapport()
    {
        return $this->temoinRapport;
    }

    /**
     * @param mixed $temoinRapport
     */
    public function setTemoinRapport($temoinRapport)
    {
        $this->temoinRapport = $temoinRapport;
    }
}