<?php

namespace Modules\ParentalMaritalStatus\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ParentalMaritalStatusServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('ParentalMaritalStatus', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('ParentalMaritalStatus', 'Config/config.php') => config_path('parentalmaritalstatus.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('ParentalMaritalStatus', 'Config/config.php'), 'parentalmaritalstatus'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/parentalmaritalstatus');

        $sourcePath = module_path('ParentalMaritalStatus', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom($sourcePath, 'parentalmaritalstatus');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/parentalmaritalstatus');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'parentalmaritalstatus');
        } else {
            $this->loadTranslationsFrom(module_path('ParentalMaritalStatus', 'Resources/lang'), 'parentalmaritalstatus');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('ParentalMaritalStatus', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
