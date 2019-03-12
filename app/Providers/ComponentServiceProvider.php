<?php

namespace App\Providers;

use App\Modules\Components\WidgetManager;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('widget', function () {
            return WidgetManager::instance();
        });
    }
}
