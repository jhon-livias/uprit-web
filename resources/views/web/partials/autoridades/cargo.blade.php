<article class="autoridades-actual">
    <div class="autoridades-actual__foto">
        @if(!empty($persona['foto']))
            <img src="{{ asset($persona['foto']) }}" alt="{{ $persona['nombre'] }}" class="{{ !empty($persona['medalla']) ? 'is-medalla' : '' }}">
        @else
            <span class="autoridades-iniciales" aria-hidden="true">{{ $persona['iniciales'] }}</span>
        @endif
    </div>
    <div class="autoridades-actual__cuerpo">
        <p class="autoridades-kicker">En el cargo</p>
        <h2>{{ $persona['nombre'] }}</h2>
        <p class="autoridades-actual__cargo">{{ $persona['cargo'] }}</p>
        <p class="autoridades-actual__periodo">{{ $persona['periodo'] }}</p>
        @if(!empty($persona['resumen']))
            <p class="autoridades-actual__resumen">{{ $persona['resumen'] }}</p>
        @endif
    </div>
</article>

@if(!empty($antecesores))
    <div class="autoridades-historial">
        <div class="autoridades-historial__head">
            <h3>Antecesores</h3>
            <p>Los nombres, periodos y reseñas con la marca «Ejemplo» son una muestra visual. Se reemplazan con el historial real.</p>
        </div>
        <ol class="autoridades-timeline">
            @foreach($antecesores as $antecesor)
                <li class="autoridades-timeline__item">
                    <div class="autoridades-timeline__marca" aria-hidden="true">
                        <span>{{ $antecesor['iniciales'] }}</span>
                    </div>
                    <div>
                        <p class="autoridades-timeline__periodo">{{ $antecesor['periodo'] }}</p>
                        <h4>
                            {{ $antecesor['nombre'] }}
                            @if(!empty($antecesor['ejemplo']))
                                <span class="autoridades-ejemplo">Ejemplo</span>
                            @endif
                        </h4>
                        <p>{{ $antecesor['resumen'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endif
