@php
    $tabRegular = $navGroup->meta['tab_regular_label'] ?? 'Pregrado Regular';
    $tabPuede = $navGroup->meta['tab_puede_label'] ?? 'Pregrado Puede';
    $tabPuedeHint = $navGroup->meta['tab_puede_hint'] ?? 'Para personas que trabajan';
    $tabSegunda = $navGroup->meta['tab_segunda_label'] ?? 'Segunda Especialidad';
    $pregradoTabs = array_values(array_filter([
        [
            'id' => 'pregrado-regular',
            'label' => $tabRegular,
            'hint' => null,
            'categorias' => $pregradoCategorias,
        ],
        [
            'id' => 'pregrado-puede',
            'label' => $tabPuede,
            'hint' => $tabPuedeHint,
            'categorias' => $pregradoPuedeCategorias,
        ],
        [
            'id' => 'pregrado-segunda',
            'label' => $tabSegunda,
            'hint' => null,
            'categorias' => $segundaEspecialidadCategorias,
        ],
    ], fn (array $tab) => $tab['categorias']->isNotEmpty()));
@endphp
@if(!empty($pregradoTabs))
<li class="has-droupdown mega-pregrado">
    <a href="#">{{ $navGroup->label }}</a>
    <div class="mega-pregrado-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="{{ $navGroup->label }}">
            @foreach($pregradoTabs as $index => $tab)
            <button type="button" class="cat-btn {{ $index === 0 ? 'active' : '' }}"
                data-target="{{ $tab['id'] }}"
                role="tab"
                aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                aria-controls="{{ $tab['id'] }}">
                {{ $tab['label'] }}
                @if($tab['hint'])
                <small class="cat-btn-hint d-block">{{ $tab['hint'] }}</small>
                @endif
            </button>
            @endforeach
        </div>
        <div class="mega-contenido">
            @foreach($pregradoTabs as $index => $tab)
            <div class="mega-box {{ $index === 0 ? 'active' : '' }}" id="{{ $tab['id'] }}" role="tabpanel">
                @include('web.partials.nav.pregrado-facultades', ['categorias' => $tab['categorias']])
            </div>
            @endforeach
        </div>
    </div>
</li>
@endif
