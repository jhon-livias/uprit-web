<?php

namespace App\View\Composers;

use App\Support\SiteNavigation;
use Illuminate\View\View;

class BreadcrumbComposer
{
    public function compose(View $view): void
    {
        $data = $view->getData();
        $breadcrumb = SiteNavigation::breadcrumb(
            $data['route'] ?? null,
            array_filter([
                'title' => $data['title'] ?? null,
                'parent' => $data['parent'] ?? null,
                'routeParams' => $data['routeParams'] ?? null,
                'url' => $data['url'] ?? null,
            ], static fn ($value) => $value !== null)
        );

        $view->with($breadcrumb);
    }
}
