<?php

namespace OilSeller;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route as RouteFacade;

class OilSellerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/oilseller.php',
            'oilseller'
        );
    }

    public function boot(Filesystem $filesystem)
    {
        $this->registerPublishables($filesystem);
        $this->registerRoutes();
    }

    protected function registerPublishables(Filesystem $filesystem)
    {
        $this->publishesToGroups([
            __DIR__.'/../config/oilseller.php' => base_path('config/oilseller.php'),
        ], ['oilseller', 'oilseller:config']);

        $this->publishesToGroups([
            __DIR__.'/../database/migrations/create_oilseller_tables.php.stub' => $this->getMigrationFileName($filesystem),
        ], ['migrations']);
    }

    protected function registerRoutes()
    {
        RouteFacade::group([
            'domain' => config('oilseller.domain', null),
            'prefix' => config('oilseller.path'),
            'namespace' => 'OilSeller\Http\Controllers',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function getMigrationFileName(Filesystem $filesystem)
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*create_oilseller_tables.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}create_oilseller_tables.php")
            ->first();
    }

    protected function publishesToGroups(array $paths, $groups = null)
    {
        if (is_null($groups)) {
            $this->publishes($paths);

            return;
        }

        foreach ((array) $groups as $group) {
            $this->publishes($paths, $group);
        }
    }
}
