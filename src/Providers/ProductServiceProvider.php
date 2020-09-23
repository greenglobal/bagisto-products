<?php
namespace GGPHP\Product\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    * @return void
    */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/admin-routes.php');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'ggphp');
    }

    /**
    * Register services.
    * @return void
    */
    public function register()
    {
        $this->registerConfig();
        $this->registerFacades();
    }

    protected function registerFacades()
    {
        $this->app->bind(
            \Webkul\Admin\DataGrids\ProductDataGrid::class,
            \GGPHP\Product\DataGrids\ProductDataGrid::class
        );
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
        );
    }
}