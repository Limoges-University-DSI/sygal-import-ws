<?php

namespace ImportData\V1\Rest\Version;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class VersionResource extends AbstractResourceListener
{
    const VERSION_NUMBER = '1.1.3';

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new VersionEntity(self::VERSION_NUMBER);
    }
}
