<?php

namespace App\Providers;

use App\View\Composers\ApplicationComposer;
use App\View\Composers\NotificationComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        View::composer('*', ApplicationComposer::class);
        View::composer('*', NotificationComposer::class);

        Paginator::useBootstrap();
    }
}
