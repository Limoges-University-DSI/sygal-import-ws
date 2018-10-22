<?php

namespace ImportData\V1\Rest\Version;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class VersionResource extends AbstractResourceListener
{
    /**
     * @var VersionEntity
     */
    private $versionEntity;

    /**
     * VersionResource constructor.
     *
     * @param VersionEntity $versionEntity
     */
    public function __construct(VersionEntity $versionEntity)
    {
        $this->versionEntity = $versionEntity;
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->versionEntity;
    }
}
