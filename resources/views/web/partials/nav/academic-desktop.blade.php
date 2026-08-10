@php
    $categoriasMap = [
        'pregrado' => $pregradoCategorias,
        'pregrado_puede' => $pregradoPuedeCategorias,
        'posgrado' => $posgradoCategorias,
    ];
    $categorias = $categoriasMap[$navGroup->key] ?? collect();
    $informesKey = $navGroup->informes_key;
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="mega-menu {{ $navGroup->css_class }}">
        @foreach($categorias as $categoria)
        <li>
            <h6 class="menu-title menu-title-brand">{{ $categoria->nombre }}</h6>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @foreach($categoria->carreras as $carrera)
                <li><a href="{{ route('web.detallecarrera', $carrera->id) }}">{{ $carrera->nombre }}</a></li>
                @endforeach
                @foreach($categoria->hijos as $hijo)
                    @foreach($hijo->carreras as $carrera)
                    <li><a href="{{ route('web.detallecarrera', $carrera->id) }}">{{ $carrera->nombre }}</a></li>
                    @endforeach
                @endforeach
            </ul>
        </li>
        @endforeach
        @if($informesKey)
        <li>
            <h6 class="menu-title menu-title-brand">Infórmate Más</h6>
            <ul class="submenu mega-sub-menu mega-sub-menu-01">
                @include('web.partials.menu-nav-links', ['section' => $informesKey, 'context' => 'desktop'])
            </ul>
        </li>
        @endif
    </ul>
</li>
