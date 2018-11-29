<?php

namespace ImportDataTest\V1\Rest\Version;

use ImportData\V1\Rest\Version\VersionEntity;
use ImportData\V1\Rest\Version\VersionResource;
use PHPUnit\Framework\TestCase;

class VersionResourceTest extends TestCase
{
    public function testFetchCanReturnUnknownVersionEntity()
    {
        $instance = new VersionResource();

        $entity = $instance->fetch('peu importe');
        $this->assertInstanceOf(VersionEntity::class, $entity);
        $this->assertEquals(VersionResource::VERSION_INCONNUE, $entity->getId());
    }

    public function testFetchCanReturnExpectedVersionEntity()
    {
        $instance = new VersionResource('1.0.0');

        $entity = $instance->fetch('peu importe');
        $this->assertInstanceOf(VersionEntity::class, $entity);
        $this->assertEquals('1.0.0', $entity->getId());
    }


}
