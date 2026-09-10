@php
    $tabRegular = $navGroup->meta['tab_regular_label'] ?? 'Pregrado Regular';
    $tabPuede = $navGroup->meta['tab_puede_label'] ?? 'Pregrado Puede';
    $tabSegunda = $navGroup->meta['tab_segunda_label'] ?? 'Segunda Especialidad';
    $pregradoTabs = array_values(array_filter([
        [
            'label' => $tabRegular,
            'categorias' => $pregradoCategorias,
        ],
        [
            'label' => $tabPuede,
            'categorias' => $pregradoPuedeCategorias,
        ],
        [
            'label' => $tabSegunda,
            'categorias' => $segundaEspecialidadCategorias,
        ],
    ], fn (array $tab) => $tab['categorias']->isNotEmpty()));
@endphp
@if(!empty($pregradoTabs))
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="submenu">
        @foreach($pregradoTabs as $tab)
        <li class="has-droupdown">
            <a href="#">{{ $tab['label'] }}</a>
            <ul class="submenu">
                @include('web.partials.nav.pregrado-facultades-mobile', ['categorias' => $tab['categorias']])
            </ul>
        </li>
        @endforeach
        <li>
            <a href="{{ route('contactenos') }}">Admisión y becas (Contáctanos)</a>
        </li>
    </ul>
</li>
@endif
