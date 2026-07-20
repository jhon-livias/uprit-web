<?php

namespace App\Providers;

use App\Services\WebNavigationCache;
use App\Services\WebVendorAssets;
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
        View::share(WebNavigationCache::sharedViewData());
        WebVendorAssets::registerComposer();
    }
}
