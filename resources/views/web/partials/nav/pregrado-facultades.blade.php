@foreach($categorias as $categoria)
<div class="mega-col">
    <h6 class="menu-title">{{ $categoria->nombre }}</h6>
    <ul class="content-lista">
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
</div>
@endforeach
