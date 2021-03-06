<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
{
    //check that app is local
    if (!$this->app->isLocal()) {
        //else register your services you require for production
        $this->app['request']->server->set('HTTPS', true);
    }
}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->app['request']->server->set('HTTPS', $this->app->environment() != 'local');
    }
}
