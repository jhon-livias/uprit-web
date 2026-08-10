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
    <ul class="submenu">
        @foreach($categorias as $categoria)
        <li class="has-droupdown">
            <a href="#">{{ $categoria->nombre }}</a>
            <ul class="submenu">
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
        <li class="has-droupdown">
            <a href="#">Infórmate Más</a>
            <ul class="submenu">
                @include('web.partials.menu-nav-links', ['section' => $informesKey, 'context' => 'mobile'])
            </ul>
        </li>
        @endif
    </ul>
</li>
