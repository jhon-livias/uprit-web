@foreach($navGroups->where('show_in_main_nav', true)->where('visible', true)->sortBy('orden') as $navGroup)
    @continue(!$navGroup->visible_mobile)
    @continue($navGroup->key === 'pregrado_puede')
    @if($navGroup->tipo === 'academic')
        @if($navGroup->key === 'posgrado')
            @include('web.partials.nav.posgrado-mobile', ['navGroup' => $navGroup])
        @elseif($navGroup->key === 'pregrado')
            @include('web.partials.nav.pregrado-mobile', ['navGroup' => $navGroup])
        @else
            @include('web.partials.nav.academic-mobile', ['navGroup' => $navGroup])
        @endif
    @elseif($navGroup->tipo === 'section')
        @include('web.partials.nav.section-mobile', ['navGroup' => $navGroup])
    @elseif($navGroup->tipo === 'button')
    <li>
        <button type="button" class="edu-btn btn-secondary d-flex align-items-center gap-2" data-postula-trigger style="color: white !important">
            <iconify-icon icon="mdi:pencil" style="font-size:20px"></iconify-icon>
            {{ $navGroup->label }}
        </button>
    </li>
    @endif
@endforeach
