@php
    $tabRegular = $navGroup->meta['tab_regular_label'] ?? 'Pregrado Regular';
    $tabPuede = $navGroup->meta['tab_puede_label'] ?? 'Pregrado Puede';
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
        <li>
            <a href="{{ route('contactenos') }}">Admisión y becas (Contáctanos)</a>
        </li>
    </ul>
</li>
