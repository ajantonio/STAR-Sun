<?php

namespace Modules\TermPeriodEvent\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class TermPeriodEventServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('TermPeriodEvent', 'Database/Migrations'));
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
            module_path('TermPeriodEvent', 'Config/config.php') => config_path('termperiodevent.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('TermPeriodEvent', 'Config/config.php'), 'termperiodevent'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/termperiodevent');

        $sourcePath = module_path('TermPeriodEvent', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom($sourcePath, 'termperiodevent');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/termperiodevent');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'termperiodevent');
        } else {
            $this->loadTranslationsFrom(module_path('TermPeriodEvent', 'Resources/lang'), 'termperiodevent');
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
            app(Factory::class)->load(module_path('TermPeriodEvent', 'Database/factories'));
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
