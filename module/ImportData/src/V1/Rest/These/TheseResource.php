<?php
namespace ImportData\V1\Rest\These;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;

class TheseResource extends DoctrineResource
{
    public function fetchAll($data = [])
    {
        $data['order-by'] = [
            'type' => 'field',
            'field' => 'id',
            'directeion' => 'asc',
        ];

        return parent::fetchAll($data);
    }
}
