<?php

namespace App\Providers;

use App\Http\Middleware\cacheResMiddleware;
use App\Http\Middleware\CacheResponseMiddleware;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(cacheResMiddleware::class);
    }


}
