<?php

namespace OilSeller\Tests;

use Illuminate\Support\Facades\File;
use OilSeller\OilSellerServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
        });

        $this->beforeApplicationDestroyed(function () {
        });

        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    protected function setUpDatabase($app)
    {
        include_once __DIR__.'/../database/migrations/create_oilseller_tables.php.stub';

        (new \CreateOilSellerTables())->up();
    }

    protected function getPackageProviders($app)
    {
        return [
            OilSellerServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
