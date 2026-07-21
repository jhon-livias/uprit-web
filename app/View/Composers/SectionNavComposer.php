<?php

namespace App\View\Composers;

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

        $view->with('items', $section ? SiteNavigation::sectionItems($section, $routesOnly) : []);
    }
}
