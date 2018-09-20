<?php
namespace ImportData\V1\Rest\Individu;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;

class IndividuResource extends DoctrineResource
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
