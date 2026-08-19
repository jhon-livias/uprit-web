@php
    $benefits = [
        ['icon' => 'mdi:account-outline', 'label' => 'Desarrolla nuevas habilidades'],
        ['icon' => 'mdi:heart-outline', 'label' => 'Mejora la salud física y mental'],
        ['icon' => 'mdi:basketball', 'label' => 'Aumenta la concentración'],
        ['icon' => 'mdi:account-group-outline', 'label' => 'Conoce nuevas personas'],
        ['icon' => 'mdi:trophy-outline', 'label' => 'Representa a la UPRIT en competencias'],
    ];

    $events = [
        ['day' => '18', 'month' => 'MAY', 'title' => 'Inicio Talleres de Danza y Música'],
        ['day' => '18', 'month' => 'MAY', 'title' => 'Campeonato interno de Vóley'],
        ['day' => '22', 'month' => 'MAY', 'title' => 'Torneo de Básquet'],
        ['day' => '25', 'month' => 'MAY', 'title' => 'Torneo de Ajedrez'],
        ['day' => '30', 'month' => 'MAY', 'title' => 'Festival Artístico Cultural'],
    ];

    $gallery = [
        ['image' => 'comunidad-4.webp', 'alt' => 'Premiación universitaria', 'filter' => 'eventos'],
        ['image' => 'danza.jpg', 'alt' => 'Taller de danza', 'filter' => 'artisticos'],
        ['image' => 'basket.webp', 'alt' => 'Equipo de básquet', 'filter' => 'deportes'],
        ['image' => 'volley.webp', 'alt' => 'Equipo de vóley', 'filter' => 'deportes'],
        ['image' => 'chess.jpg', 'alt' => 'Taller de ajedrez', 'filter' => 'competencias'],
    ];

    $tabs = [
        'todos' => 'Todos',
        'deportes' => 'Deportes',
        'artisticos' => 'Artístico',
        'eventos' => 'Eventos',
        'competencias' => 'Competencias',
    ];
@endphp

<section class="cultura-mid">
    <div class="container">
        <div class="cultura-mid__grid">
            <div class="cultura-mid__col cultura-mid__col--main">
                <article class="cultura-card cultura-card--why">
                    <header class="cultura-card__title">
                        <h2>¿Por qué participar?</h2>
                    </header>
                    <div class="cultura-benefits">
                        @foreach($benefits as $benefit)
                        <article class="cultura-benefit">
                            <span class="cultura-benefit__icon" aria-hidden="true">
                                <iconify-icon icon="{{ $benefit['icon'] }}"></iconify-icon>
                            </span>
                            <p class="cultura-benefit__label">{{ $benefit['label'] }}</p>
                        </article>
                        @endforeach
                    </div>
                </article>

                <article class="cultura-card cultura-card--community">
                    <header class="cultura-card__title">
                        <h2>Somos Comunidad</h2>
                    </header>

                    <div class="cultura-community__tabs" role="tablist" aria-label="Galería comunitaria">
                        @foreach($tabs as $key => $label)
                        <button
                            type="button"
                            class="cultura-community-tab{{ $loop->first ? ' is-active' : '' }}"
                            role="tab"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            data-cultura-tab="{{ $key }}">
                            {{ $label }}
                        </button>
                        @endforeach
                    </div>

                    <div class="cultura-community-grid" data-cultura-gallery>
                        @foreach($gallery as $item)
                        <img
                            src="{{ asset('web/imagenes/bienestar/artisticas/' . $item['image']) }}"
                            alt="{{ $item['alt'] }}"
                            class="cultura-community-grid__photo"
                            data-cultura-filter="{{ $item['filter'] }}"
                            loading="lazy"
                            decoding="async">
                        @endforeach
                    </div>

                    <div class="cultura-community__cta">
                        <a href="{{ route('web.noticias') }}" class="cultura-btn cultura-btn--outline">
                            Ver toda la galería
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </div>
                </article>

                <article class="cultura-card cultura-card--why">
                    <header class="cultura-card__title">
                        <h2>Preguntas frecuentes</h2>
                    </header>
                    <div class="cultura-benefits">
                        @foreach(config('bienestar.cultura.faq') as $item)
                        <article class="cultura-benefit">
                            <span class="cultura-benefit__icon" aria-hidden="true">
                                <iconify-icon icon="mdi:help-circle-outline"></iconify-icon>
                            </span>
                            <p class="cultura-benefit__label">
                                <strong>{{ $item['pregunta'] }}</strong><br>
                                {{ $item['respuesta'] }}
                            </p>
                        </article>
                        @endforeach
                    </div>
                </article>
            </div>

            <div class="cultura-mid__col cultura-mid__col--side">
                <article class="cultura-card cultura-card--calendar">
                    <header class="cultura-card__banner">
                        <iconify-icon icon="mdi:calendar-month-outline" aria-hidden="true"></iconify-icon>
                        <h3>Calendario de Actividades</h3>
                    </header>
                    <div class="cultura-card__body">
                        <ul class="cultura-event-list">
                            @foreach($events as $event)
                            <li class="cultura-event-list__item">
                                <span class="cultura-event-list__date">
                                    <strong>{{ $event['day'] }}</strong>
                                    <small>{{ $event['month'] }}</small>
                                </span>
                                <span class="cultura-event-list__title">{{ $event['title'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('web.noticias') }}" class="cultura-card__btn">
                            Ver calendario completo
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </div>
                </article>

                <article class="cultura-card cultura-card--signup" id="inscripciones">
                    <header class="cultura-card__banner">
                        <iconify-icon icon="mdi:bullhorn-outline" aria-hidden="true"></iconify-icon>
                        <h3>Inscripciones abiertas</h3>
                    </header>
                    <div class="cultura-card__body cultura-card__body--signup">
                        <p class="cultura-signup__lead">Únete a nuestros talleres y vive una experiencia única.</p>
                        <a href="{{ config('bienestar.google_form_inscripcion') }}" class="cultura-card__btn" target="_blank" rel="noopener">
                            Regístrate aquí
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </div>
                    <a href="{{ config('bienestar.whatsapp_url') }}" class="cultura-card__whatsapp" target="_blank" rel="noopener">
                        <iconify-icon icon="mdi:whatsapp" aria-hidden="true"></iconify-icon>
                        <span>¿Dudas? Escríbenos<br>por WhatsApp</span>
                    </a>
                </article>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var buttons = document.querySelectorAll('[data-cultura-tab]');
        var photos = document.querySelectorAll('[data-cultura-filter]');
        if (!buttons.length) return;

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                var target = button.getAttribute('data-cultura-tab');

                buttons.forEach(function (tab) {
                    var active = tab.getAttribute('data-cultura-tab') === target;
                    tab.classList.toggle('is-active', active);
                    tab.setAttribute('aria-selected', active ? 'true' : 'false');
                });

                photos.forEach(function (photo) {
                    var match = target === 'todos' || photo.getAttribute('data-cultura-filter') === target;
                    photo.hidden = !match;
                });
            });
        });
    })();
</script>
@endpush
