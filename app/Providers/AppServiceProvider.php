<?php

namespace App\Providers;

use App\Services\WebNavigationCache;
use App\Services\WebVendorAssets;
use App\View\Composers\BreadcrumbComposer;
use App\View\Composers\SectionNavComposer;
use Illuminate\Support\Facades\URL;
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
        // CRIT-02 / MED-08: Forzar HTTPS en producción
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::share(WebNavigationCache::sharedViewData());
        WebVendorAssets::registerComposer();
        View::composer(['web.partials.section-nav', 'web.partials.menu-nav-links'], SectionNavComposer::class);
        View::composer('web.partials.breadcrumb', BreadcrumbComposer::class);
    }
}

