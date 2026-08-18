@php
    $modalidad = modalidades_oficiales($carrera->modalidades)[0] ?? null;
    if ($modalidad !== null && str_contains($modalidad, ':')) {
        $modalidad = trim(explode(':', $modalidad, 2)[1]);
    }
@endphp
<a href="{{ route('web.detallecarrera', $carrera->id) }}">
    {{ $carrera->nombre }}
    @if($modalidad)
    <span class="carrera-modalidad-badge">{{ $modalidad }}</span>
    @endif
</a>
