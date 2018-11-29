<?php
namespace ImportData;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    /**
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
