@php
    $categorias = $posgradoCategorias;
@endphp
<li class="has-droupdown">
    <a href="#">{{ $navGroup->label }}</a>
    <ul class="submenu">
        @foreach($categorias as $categoria)
        <li class="has-droupdown">
            <a href="#">{{ $categoria->nombre }}</a>
            <ul class="submenu">
                @foreach($categoria->hijos as $hijo)
                <li class="has-droupdown">
                    <a href="#">{{ $hijo->nombre }}</a>
                    <ul class="submenu">
                        @foreach($hijo->carreras as $carrera)
                        <li>
                            <a href="{{ route('web.detallecarrera', $carrera->id) }}">{{ $carrera->nombre }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
        @if($navGroup->informes_key)
        <li class="has-droupdown">
            <a href="#">Infórmate Más</a>
            <ul class="submenu">
                @include('web.partials.menu-nav-links', ['section' => $navGroup->informes_key, 'context' => 'mobile'])
            </ul>
        </li>
        @endif
    </ul>
</li>
