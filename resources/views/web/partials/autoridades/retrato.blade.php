<button
    type="button"
    class="galeria-autoridad {{ $modificador ?? '' }}"
    data-galeria-persona
    data-nombre="{{ $persona['nombre'] }}"
    data-rol="{{ $persona['rol'] }}"
    data-facultad="{{ $persona['facultad'] }}"
    data-detalle="{{ $persona['detalle'] }}"
    data-credenciales="{{ implode('|', $persona['credenciales']) }}"
    data-foto="{{ !empty($persona['foto']) ? asset($persona['foto']) : '' }}"
    data-medalla="{{ !empty($persona['medalla']) ? '1' : '0' }}"
    data-iniciales="{{ $persona['iniciales'] }}"
    aria-label="Ver retrato de {{ $persona['nombre'] }}">
    <span class="galeria-autoridad__foto">
        @if(!empty($persona['foto']))
            <img
                src="{{ asset($persona['foto']) }}"
                alt=""
                class="{{ !empty($persona['medalla']) ? 'is-medalla' : '' }}">
        @else
            <span class="galeria-autoridad__iniciales" aria-hidden="true">{{ $persona['iniciales'] }}</span>
        @endif
    </span>
    <span class="galeria-autoridad__meta">
        <span class="galeria-autoridad__kicker">{{ $persona['facultad'] ?: $persona['rol'] }}</span>
        <span class="galeria-autoridad__nombre">{{ $persona['nombre'] }}</span>
        @if(!empty($persona['facultad']))
            <span class="galeria-autoridad__rol">{{ $persona['rol'] }}</span>
        @endif
    </span>
</button>
