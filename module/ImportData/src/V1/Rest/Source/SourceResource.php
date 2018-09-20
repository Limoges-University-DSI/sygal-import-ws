<?php
namespace ImportData\V1\Rest\Source;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;

class SourceResource extends DoctrineResource
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
