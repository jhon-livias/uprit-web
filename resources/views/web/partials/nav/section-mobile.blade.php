@php
    use App\Services\NavMenuService;
    $routesOnly = NavMenuService::routesOnlyForGroup($navGroup);
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="submenu">
        @include('web.partials.menu-nav-links', [
            'section' => $navGroup->key,
            'routesOnly' => $routesOnly,
            'context' => 'mobile',
        ])
    </ul>
</li>
