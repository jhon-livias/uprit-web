@php
    use App\Services\NavMenuService;
    $routesOnly = NavMenuService::routesOnlyForGroup($navGroup);
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="mega-menu {{ $navGroup->css_class }}">
        <li>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @include('web.partials.menu-nav-links', [
                    'section' => $navGroup->key,
                    'routesOnly' => $routesOnly,
                    'context' => 'desktop',
                ])
            </ul>
        </li>
    </ul>
</li>
