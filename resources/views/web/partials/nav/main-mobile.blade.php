@foreach($navGroups->where('show_in_main_nav', true)->where('visible', true)->sortBy('orden') as $navGroup)
    @continue(!$navGroup->visible_mobile)
    @continue($navGroup->key === 'pregrado_puede')
    @if($navGroup->tipo === 'academic')
        @include('web.partials.nav.academic-mobile', ['navGroup' => $navGroup])
    @elseif($navGroup->tipo === 'section')
        @if(in_array($navGroup->key, ['servicios', 'pregrado', 'posgrado']))
            @include('web.partials.nav.servicios-mobile', ['navGroup' => $navGroup])
        @else
            @include('web.partials.nav.section-mobile', ['navGroup' => $navGroup])
        @endif
    @elseif($navGroup->tipo === 'button')
    <li>
        <button type="button" class="edu-btn btn-secondary d-flex align-items-center gap-2" data-postula-trigger style="color: white !important">
            <iconify-icon icon="mdi:pencil" style="font-size:20px"></iconify-icon>
            {{ $navGroup->label }}
        </button>
    </li>
    @endif
@endforeach
