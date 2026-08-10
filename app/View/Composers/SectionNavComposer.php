<?php

namespace App\View\Composers;

use App\Services\NavMenuService;
use App\Support\SiteNavigation;
use Illuminate\View\View;

class SectionNavComposer
{
    public function compose(View $view): void
    {
        $section = $view->getData()['section']
            ?? SiteNavigation::sectionForRoute(request()->route()?->getName());

        $routesOnly = $view->getData()['routesOnly']
            ?? $view->name() === 'web.partials.menu-nav-links';

        $context = $view->getData()['context'] ?? NavMenuService::CONTEXT_DESKTOP;

        $view->with('items', $section ? SiteNavigation::sectionItems($section, $routesOnly, $context) : []);
    }
}
