@php
    $tabRegular = $navGroup->meta['tab_regular_label'] ?? 'Pregrado Regular';
    $tabPuede = $navGroup->meta['tab_puede_label'] ?? 'Pregrado Puede';
    $tabSegunda = $navGroup->meta['tab_segunda_label'] ?? 'Segunda Especialidad';
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="submenu">
        <li class="has-droupdown">
            <a href="#">{{ $tabRegular }}</a>
            <ul class="submenu">
                @include('web.partials.nav.pregrado-facultades-mobile', ['categorias' => $pregradoCategorias])
            </ul>
        </li>
        <li class="has-droupdown">
            <a href="#">{{ $tabPuede }}</a>
            <ul class="submenu">
                @include('web.partials.nav.pregrado-facultades-mobile', ['categorias' => $pregradoPuedeCategorias])
            </ul>
        </li>
        <li class="has-droupdown">
            <a href="#">{{ $tabSegunda }}</a>
            <ul class="submenu">
                @include('web.partials.nav.pregrado-facultades-mobile', ['categorias' => $segundaEspecialidadCategorias])
            </ul>
        </li>
        <li>
            <a href="{{ route('contactenos') }}">Admisión y becas (Contáctanos)</a>
        </li>
    </ul>
</li>
