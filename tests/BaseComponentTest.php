<?php

namespace OilSeller\Tests;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BaseComponentTest extends TestCase
{
    public function test_migration_success()
    {
        $tables = $this->app['db']->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $this->assertArrayHasKey($table, config('oilseller.tables'));
        }
    }

    public function test_route_contains_livewire()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) { return $route->uri(); });

        $exists = false;
        foreach ($routes as $route) {
            if (Str::startsWith($route, 'livewire')) {
                $exists = true;
                break;
            }
        }

        $this->assertTrue($exists);
    }
}
