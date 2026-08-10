@foreach($categorias as $categoria)
<li class="has-droupdown">
    <a href="#">{{ $categoria->nombre }}</a>
    <ul class="submenu">
        @foreach($categoria->carreras as $carrera)
        <li>
            @include('web.partials.nav.carrera-link', ['carrera' => $carrera])
        </li>
        @endforeach
        @foreach($categoria->hijos as $hijo)
            @foreach($hijo->carreras as $carrera)
            <li>
                @include('web.partials.nav.carrera-link', ['carrera' => $carrera])
            </li>
            @endforeach
        @endforeach
    </ul>
</li>
@endforeach
