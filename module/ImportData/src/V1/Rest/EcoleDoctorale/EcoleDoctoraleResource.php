<?php
namespace ImportData\V1\Rest\EcoleDoctorale;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;

class EcoleDoctoraleResource extends DoctrineResource
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
