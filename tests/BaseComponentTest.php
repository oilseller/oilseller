<?php

namespace OilSeller\Tests;

class BaseComponentTest extends TestCase
{
    public function test_migration_success()
    {
        $tables = $this->app['db']->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $this->assertArrayHasKey($table, config('oilseller.tables'));
        }
    }
}
