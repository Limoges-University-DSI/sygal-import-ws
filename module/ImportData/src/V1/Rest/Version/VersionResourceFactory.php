<?php

namespace ImportData\V1\Rest\Version;

use Zend\ServiceManager\ServiceLocatorInterface as ContainerInterface;

class VersionResourceFactory
{
    /**
     * @param ContainerInterface $container
     * @return VersionResource
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        if (isset($config['version'])) {
            $version = $config['version'];
        } else {
            $version = "Inconnue";
        }

        $entity = new VersionEntity($version);

        return new VersionResource($entity);
    }
}
