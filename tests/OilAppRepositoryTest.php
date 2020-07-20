<?php

namespace OilSeller\Tests;

use OilSeller\Repository\OilAppRepositoryInterface;

class OilAppRepositoryTest extends TestCase
{
    public function test_get_all()
    {
        $oilApps = resolve(OilAppRepositoryInterface::class)->getAll();

        $this->assertNotEquals(count($oilApps), 0);
    }
}
