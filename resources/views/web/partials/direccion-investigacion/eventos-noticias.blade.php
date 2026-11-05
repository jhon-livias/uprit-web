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
                @foreach ($items as $index => $item)
                    @php
                        $fecha = !empty($item['fecha'])
                            ? \Carbon\Carbon::parse($item['fecha'])->locale('es')
                            : null;
                        $links = $item['links'] ?? [];
                        if (empty($links) && !empty($item['url'])) {
                            $links = [[
                                'label' => $item['cta'] ?? 'Ver más',
                                'url' => $item['url'],
                            ]];
                        }
                        $primary = $links[0] ?? null;
                        $modalId = 'evento-detalle-'.$index;
                    @endphp
                    <article class="direccion-eventos-card">
                        <div class="direccion-eventos-card__media">
                            @if (!empty($item['imagen']))
                                <img
                                    src="{{ asset($item['imagen']) }}"
                                    alt="{{ $item['titulo'] ?? 'Evento de investigación' }}"
                                    class="direccion-eventos-card__image{{ ($item['imagen_fit'] ?? '') === 'contain' ? ' direccion-eventos-card__image--contain' : '' }}"
                                    loading="lazy"
                                    decoding="async">
                            @else
                                <div class="direccion-eventos-card__placeholder" aria-hidden="true">
                                    <iconify-icon icon="mdi:calendar-blank-outline"></iconify-icon>
                                </div>
                            @endif
                            @if (!empty($item['categoria']) && ($item['imagen_fit'] ?? '') !== 'contain')
                                <span class="direccion-eventos-card__categoria">{{ $item['categoria'] }}</span>
                            @endif
                        </div>
                        <div class="direccion-eventos-card__body">
                            <h4 class="direccion-eventos-card__titulo">{{ $item['titulo'] ?? '' }}</h4>
                            @if (!empty($item['descripcion']))
                                <p class="direccion-eventos-card__descripcion">{{ $item['descripcion'] }}</p>
                            @endif
                            <ul class="direccion-eventos-card__chips">
                                @if ($fecha)
                                    <li>{{ $fecha->translatedFormat('d/m/Y') }}</li>
                                @endif
                                @if (!empty($item['hora']))
                                    <li>{{ $item['hora'] }}</li>
                                @endif
                                @if (!empty($item['modalidad']))
                                    <li>{{ $item['modalidad'] }}</li>
                                @endif
                            </ul>
                            <div class="direccion-eventos-card__actions">
                                <button type="button" class="direccion-eventos-card__more" data-evento-open="{{ $modalId }}">
                                    Ver más
                                </button>
                                @if ($primary)
                                    <a href="{{ $primary['url'] }}" class="direccion-eventos-card__link" @if(str_starts_with($primary['url'], 'http')) target="_blank" rel="noopener noreferrer" @endif>
                                        {{ $primary['label'] }}
                                        <span aria-hidden="true">→</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @foreach ($items as $index => $item)
                @php
                    $fecha = !empty($item['fecha'])
                        ? \Carbon\Carbon::parse($item['fecha'])->locale('es')
                        : null;
                    $links = $item['links'] ?? [];
                    if (empty($links) && !empty($item['url'])) {
                        $links = [[
                            'label' => $item['cta'] ?? 'Ver más',
                            'url' => $item['url'],
                        ]];
                    }
                    $modalId = 'evento-detalle-'.$index;
                    $detalleImagen = $item['imagen_detalle'] ?? $item['imagen'] ?? null;
                @endphp
                <div class="direccion-evento-modal" id="{{ $modalId }}" hidden>
                    <div class="direccion-evento-modal__backdrop" data-evento-close></div>
                    <div class="direccion-evento-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="{{ $modalId }}-title">
                        <button type="button" class="direccion-evento-modal__close" data-evento-close aria-label="Cerrar">
                            <iconify-icon icon="mdi:close" aria-hidden="true"></iconify-icon>
                            Cerrar
                        </button>
                        @if ($detalleImagen)
                            <img
                                src="{{ asset($detalleImagen) }}"
                                alt="{{ $item['titulo'] ?? 'Evento de investigación' }}"
                                class="direccion-evento-modal__image">
                        @endif
                        @if (!empty($item['categoria']))
                            <span class="direccion-evento-modal__categoria">{{ $item['categoria'] }}</span>
                        @endif
                        <h3 id="{{ $modalId }}-title" class="direccion-evento-modal__title">{{ $item['titulo'] ?? '' }}</h3>
                        @if (!empty($item['descripcion']))
                            <p class="direccion-evento-modal__text">{{ $item['descripcion'] }}</p>
                        @endif
                        <ul class="direccion-evento-modal__meta">
                            @if ($fecha)
                                <li><iconify-icon icon="mdi:calendar-blank-outline" aria-hidden="true"></iconify-icon> Fecha: {{ $fecha->translatedFormat('d/m/Y') }}</li>
                            @endif
                            @if (!empty($item['hora']))
                                <li><iconify-icon icon="mdi:clock-outline" aria-hidden="true"></iconify-icon> Hora: {{ $item['hora'] }}</li>
                            @endif
                            @if (!empty($item['modalidad']))
                                <li><iconify-icon icon="mdi:monitor-account" aria-hidden="true"></iconify-icon> Modalidad: {{ $item['modalidad'] }}</li>
                            @endif
                            @if (!empty($item['lugar']))
                                <li><iconify-icon icon="mdi:map-marker-outline" aria-hidden="true"></iconify-icon> Lugar: {{ $item['lugar'] }}</li>
                            @endif
                            @if (!empty($item['dirigido']))
                                <li><iconify-icon icon="mdi:account-group-outline" aria-hidden="true"></iconify-icon> Dirigido a: {{ $item['dirigido'] }}</li>
                            @endif
                        </ul>
                        @if (!empty($links))
                            <div class="direccion-evento-modal__actions">
                                @foreach ($links as $link)
                                    <a href="{{ $link['url'] }}" class="direccion-evento-modal__cta" @if(str_starts_with($link['url'], 'http')) target="_blank" rel="noopener noreferrer" @endif>
                                        {{ $link['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted mb-0">Las actividades y novedades de investigación se publicarán próximamente en este espacio.</p>
        @endif
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var openClass = 'direccion-evento-modal-open';
        var current = null;

        function closeModal() {
            if (!current) return;
            current.hidden = true;
            document.body.classList.remove(openClass);
            current = null;
        }

        document.querySelectorAll('[data-evento-open]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var modal = document.getElementById(btn.getAttribute('data-evento-open'));
                if (!modal) return;
                closeModal();
                current = modal;
                modal.hidden = false;
                document.body.classList.add(openClass);
            });
        });

        document.querySelectorAll('[data-evento-close]').forEach(function (el) {
            el.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeModal();
        });
    })();
</script>
@endpush
