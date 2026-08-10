@php
    $modalidad = null;
    if (!empty($carrera->modalidades)) {
        $linea = trim(preg_split('/\R/', $carrera->modalidades)[0] ?? '');
        $modalidad = str_contains($linea, ':')
            ? trim(explode(':', $linea, 2)[1])
            : $linea;
    }
@endphp
<a href="{{ route('web.detallecarrera', $carrera->id) }}">
    {{ $carrera->nombre }}
    @if($modalidad)
    <span class="carrera-modalidad-badge">{{ $modalidad }}</span>
    @endif
</a>
