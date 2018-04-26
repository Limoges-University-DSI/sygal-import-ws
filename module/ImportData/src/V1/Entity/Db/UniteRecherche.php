<?php

namespace ImportData\V1\Entity\Db;

/**
 * Structure
 */
class UniteRecherche
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
    private $structureId;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * @param string $sourceId
     */
    public function setSourceId(string $sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return string
     */
    public function getStructureId(): string
    {
        return $this->structureId;
    }

    /**
     * @param string $structureId
     */
    public function setStructureId(string $structureId)
    {
        $this->structureId = $structureId;
    }
}
