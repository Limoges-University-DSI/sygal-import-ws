<?php
namespace ImportData\V1\Rest\Variable;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;

class VariableResource extends DoctrineResource
{
    public function fetchAll($data = [])
    {
        $data['order-by'] = [
            'type' => 'field',
            'field' => 'id',
            'direction' => 'asc',
        ];

        return parent::fetchAll($data);
    }
}
