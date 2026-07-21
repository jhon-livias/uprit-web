@php
    $routeKey = $route ?? null;
    $config = $routeKey ? (config('breadcrumbs.routes.' . $routeKey) ?? []) : [];
    $title = $title ?? ($config['title'] ?? '');
    $parent = $parent ?? ($config['parent'] ?? null);
    $breadcrumbParams = $routeParams ?? [];
    $currentUrl = $routeKey
        ? route($routeKey, $breadcrumbParams)
        : ($url ?? '#');
@endphp
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">{{ $title }}</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Inicio</a></li>
                @if(!empty($parent))
                    <li class="separator"><i class="icon-angle-right"></i></li>
                    <li class="breadcrumb-item">
                        @if(!empty($parent['route']))
                            <a href="{{ route($parent['route'], $parent['params'] ?? []) }}">{{ $parent['label'] }}</a>
                        @else
                            <span>{{ $parent['label'] }}</span>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
