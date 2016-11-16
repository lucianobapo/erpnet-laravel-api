<?php

namespace App\Providers;

use ErpNET\Models\Providers\ErpnetModelsServiceProvider;
use ErpNET\WidgetResource\Providers\ErpnetWidgetResourceServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ErpnetModelsServiceProvider::class);
        $this->app->register(ErpnetWidgetResourceServiceProvider::class);
    }
}
