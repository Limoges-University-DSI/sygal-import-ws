<?php

namespace ImportData\V1\Entity\Db;

/**
 * Structure
 *
 * @codeCoverageIgnore
 */
class Etablissement
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
     * @var string
     */
    private $code;

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

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }
}
