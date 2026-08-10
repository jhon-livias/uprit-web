@php
    use App\Services\NavMenuService;
@endphp
@foreach($navGroups->where('show_in_main_nav', true)->where('visible', true)->sortBy('orden') as $navGroup)
    @continue(!$navGroup->visible_desktop)
    @continue($navGroup->key === 'pregrado_puede')
    @if($navGroup->tipo === 'academic')
        @if($navGroup->key === 'posgrado')
            @include('web.partials.nav.posgrado-desktop', ['navGroup' => $navGroup])
        @elseif($navGroup->key === 'pregrado')
            @include('web.partials.nav.pregrado-desktop', ['navGroup' => $navGroup])
        @else
            @include('web.partials.nav.academic-desktop', ['navGroup' => $navGroup])
        @endif
    @elseif($navGroup->tipo === 'section')
        @include('web.partials.nav.section-desktop', ['navGroup' => $navGroup])
    @elseif($navGroup->tipo === 'button')
        @include('web.partials.nav.postula-desktop', ['navGroup' => $navGroup])
    @endif
@endforeach
