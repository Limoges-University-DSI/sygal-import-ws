<?php
/**
 * Created by PhpStorm.
 * User: gauthierb
 * Date: 2018-11-25
 * Time: 09:45
 */

namespace ImportDataTest\V1\Rest\Version;

use ImportData\V1\Rest\Version\VersionEntity;
use PHPUnit\Framework\TestCase;

class VersionEntityTest extends TestCase
{

    public function testCanConstructUsingSpecifiedId()
    {
        $entity = new VersionEntity('1.0.0');

        $this->assertSame('1.0.0', $entity->getId());
    }
}
