<?php

namespace ImportData\V1\Rest\Acteur;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use ZF\Apigility\Doctrine\Server\Query\Provider\AbstractQueryProvider;
use ZF\Rest\ResourceEvent;

class ActeurFetchAll extends AbstractQueryProvider
{
    /**
     * @param ResourceEvent $event
     * @param string        $entityClass
     * @param array         $parameters
     * @return QueryBuilder
     */
    public function createQuery(ResourceEvent $event, $entityClass, $parameters)
    {
        /** @var EntityRepository $repo */
        $repo = $this->getObjectManager()->getRepository($entityClass);

        $qb = $repo->createQueryBuilder('a');

        if (isset($parameters['these_id'])) {
            $qb
                ->andWhere('a.theseId = :theseId')
                ->setParameter('theseId', $parameters['these_id']);
        }

        return $qb;
    }
}