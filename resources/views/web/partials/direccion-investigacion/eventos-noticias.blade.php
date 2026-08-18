@php
    $eventos = config('direccion_investigacion.eventos_noticias', []);
    $items = $eventos['items'] ?? [];
@endphp

<section class="direccion-eventos-noticias" id="eventos-noticias">
    <div class="container">
        <header class="direccion-eventos-noticias__header text-center">
            <h3 class="title">{{ $eventos['titulo'] ?? 'Eventos y Noticias' }}</h3>
            @if (!empty($eventos['intro']))
                <p class="direccion-eventos-noticias__intro">{{ $eventos['intro'] }}</p>
            @endif
        </header>

        @if (!empty($items))
            <div class="direccion-eventos-noticias__grid">
                @foreach ($items as $item)
                    @php
                        $fecha = !empty($item['fecha'])
                            ? \Carbon\Carbon::parse($item['fecha'])->locale('es')
                            : null;
                        $imagen = !empty($item['imagen'])
                            ? asset($item['imagen'])
                            : asset('web/imagenes/slider/slider01.webp');
                    @endphp
                    <article class="direccion-eventos-card">
                        <div class="direccion-eventos-card__media">
                            <img
                                src="{{ $imagen }}"
                                alt="{{ $item['titulo'] ?? 'Evento de investigación' }}"
                                class="direccion-eventos-card__image"
                                loading="lazy"
                                decoding="async">
                            @if (!empty($item['categoria']))
                                <span class="direccion-eventos-card__categoria">{{ $item['categoria'] }}</span>
                            @endif
                        </div>
                        <div class="direccion-eventos-card__body">
                            <h4 class="direccion-eventos-card__titulo">{{ $item['titulo'] ?? '' }}</h4>
                            @if (!empty($item['descripcion']))
                                <p class="direccion-eventos-card__descripcion">{{ $item['descripcion'] }}</p>
                            @endif
                            <ul class="direccion-eventos-card__meta">
                                @if ($fecha)
                                    <li>
                                        <iconify-icon icon="mdi:calendar-blank-outline" aria-hidden="true"></iconify-icon>
                                        <span>Fecha: {{ $fecha->translatedFormat('d/m/Y') }}</span>
                                    </li>
                                @endif
                                @if (!empty($item['modalidad']))
                                    <li>
                                        <iconify-icon icon="mdi:monitor-account" aria-hidden="true"></iconify-icon>
                                        <span>Modalidad: {{ $item['modalidad'] }}</span>
                                    </li>
                                @endif
                                @if (!empty($item['lugar']))
                                    <li>
                                        <iconify-icon icon="mdi:map-marker-outline" aria-hidden="true"></iconify-icon>
                                        <span>Lugar: {{ $item['lugar'] }}</span>
                                    </li>
                                @endif
                            </ul>
                            @if (!empty($item['url']))
                                <a href="{{ $item['url'] }}" class="direccion-eventos-card__link" @if(str_starts_with($item['url'], 'http')) target="_blank" rel="noopener noreferrer" @endif>
                                    Ver más
                                    <span aria-hidden="true">→</span>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted mb-0">Las actividades y novedades de investigación se publicarán próximamente en este espacio.</p>
        @endif
    </div>
</section>
