<?php

namespace OilSeller;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\ServiceProvider;
use Livewire\LivewireComponentsFinder;
use OilSeller\Http\Livewire\OilAppSelect;

class OilSellerServiceProvider extends ServiceProvider
{
    use ServiceBindings;

    public function register()
    {
        if (! defined('OILSELLER_PATH')) {
            define('OILSELLER_PATH', realpath(__DIR__.'/../'));
        }

        $this->mergeConfigFrom(
            __DIR__.'/../config/oilseller.php',
            'oilseller'
        );
    }

    public function boot(Filesystem $filesystem)
    {
        $this->registerPublishables($filesystem);
        $this->registerViews();
        $this->registerRoutes();
        $this->defineAssetPublishing();
        $this->registerLivewireComponents();
        $this->registerServerBinds();
    }

    protected function registerPublishables(Filesystem $filesystem)
    {
        $this->publishesToGroups([
            __DIR__.'/../config/oilseller.php' => base_path('config/oilseller.php'),
        ], ['oilseller', 'oilseller:config']);

        $this->publishesToGroups([
            __DIR__.'/../database/migrations/create_oilseller_tables.php.stub' => $this->getMigrationFileName($filesystem),
        ], ['oilseller', 'migrations']);
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(
            __DIR__.'/../resources/views',
            'oilseller'
        );
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

    protected function defineAssetPublishing()
    {
        $this->publishes([
            OILSELLER_PATH.'/public' => public_path('vendor/oilseller'),
        ], ['oilseller', 'oilseller:assets']);
    }

    protected function registerLivewireComponents()
    {
        $this->app
            ->make(LivewireComponentsFinder::class)
            ->registerExternal('oil-app-select', OilAppSelect::class);
    }

    protected function registerServerBinds()
    {
        foreach ($this->serviceBindings as $key => $value) {
            is_numeric($key)
                    ? $this->app->singleton($value)
                    : $this->app->singleton($key, $value);
        }
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
