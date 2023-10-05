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
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', ApplicationComposer::class);
        View::composer('*', NotificationComposer::class);

        Paginator::useBootstrapFive();
    }
}
