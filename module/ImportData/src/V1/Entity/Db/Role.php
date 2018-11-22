<?php

namespace ImportData\V1\Entity\Db;

/**
 * Role
 */
class Role
{
    protected $id;
    protected $sourceId;
    protected $libLongRole;
    protected $libCourtRole;

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
    public function getLibLongRole()
    {
        return $this->libLongRole;
    }

    /**
     * @param mixed $libLongRole
     */
    public function setLibLongRole($libLongRole)
    {
        $this->libLongRole = $libLongRole;
    }

    /**
     * @return mixed
     */
    public function getLibCourtRole()
    {
        return $this->libCourtRole;
    }

    /**
     * @param mixed $libCourtRole
     */
    public function setLibCourtRole($libCourtRole)
    {
        $this->libCourtRole = $libCourtRole;
    }
}
