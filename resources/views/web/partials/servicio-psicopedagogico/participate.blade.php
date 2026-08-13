@php
    $benefits = [
        ['icon' => 'mdi:lightbulb-on-outline', 'label' => 'Desarrollas habilidades de estudio.'],
        ['icon' => 'mdi:hand-heart-outline', 'label' => 'Mejoras tu bienestar emocional.'],
        ['icon' => 'mdi:briefcase-outline', 'label' => 'Clarificas tu futuro profesional.'],
        ['icon' => 'mdi:trophy-outline', 'label' => 'Superas retos académicos.'],
        ['icon' => 'mdi:account-group-outline', 'label' => 'Te integras a la comunidad UPRIT.'],
    ];

    $events = [
        ['day' => '12', 'month' => 'MAY', 'title' => 'Charla sobre Hábitos de Estudio'],
        ['day' => '19', 'month' => 'MAY', 'title' => 'Taller de Orientación Vocacional'],
        ['day' => '26', 'month' => 'MAY', 'title' => 'Sesión de Manejo del Estrés'],
        ['day' => '02', 'month' => 'JUN', 'title' => 'Taller de Técnicas de Memorización'],
        ['day' => '09', 'month' => 'JUN', 'title' => 'Foro sobre Salud Mental Universitaria'],
    ];

    $communityTabs = [
        'alumnos' => [
            'label' => 'Alumnos',
            'caption' => 'Nuestros Alumnos',
            'images' => ['comunidad-1.jpg', 'comunidad-2.jpg', 'comunidad-3.jpg', 'comunidad-1.jpg', 'comunidad-2.jpg'],
        ],
        'docentes' => [
            'label' => 'Docentes',
            'caption' => 'Nuestros Docentes en Formación',
            'images' => ['comunidad-2.jpg', 'comunidad-3.jpg', 'comunidad-1.jpg', 'comunidad-2.jpg', 'comunidad-3.jpg'],
        ],
        'tutores' => [
            'label' => 'Tutores',
            'caption' => 'Nuestros Tutores y Mentores',
            'images' => ['comunidad-3.jpg', 'comunidad-1.jpg', 'comunidad-2.jpg', 'comunidad-3.jpg', 'comunidad-1.jpg'],
        ],
    ];
@endphp

<section class="psico-mid">
    <div class="container">
        <div class="psico-mid__grid">
            <div class="psico-mid__col psico-mid__col--main">
                <article class="psico-card psico-card--why">
                    <header class="psico-card__title">
                        <h2>¿Por qué participar?</h2>
                    </header>
                    <div class="psico-benefits">
                        @foreach($benefits as $benefit)
                        <article class="psico-benefit">
                            <span class="psico-benefit__icon" aria-hidden="true">
                                <iconify-icon icon="{{ $benefit['icon'] }}"></iconify-icon>
                            </span>
                            <p class="psico-benefit__label">{{ $benefit['label'] }}</p>
                        </article>
                        @endforeach
                    </div>
                </article>

                <article class="psico-card psico-card--community">
                    <header class="psico-card__title">
                        <h2>Nuestra Comunidad</h2>
                    </header>

                    <div class="psico-community__tabs" role="tablist" aria-label="Comunidad">
                        @foreach($communityTabs as $key => $tab)
                        <button
                            type="button"
                            class="psico-community-tab{{ $loop->first ? ' is-active' : '' }}"
                            role="tab"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            aria-controls="psico-community-panel-{{ $key }}"
                            id="psico-community-tab-{{ $key }}"
                            data-psico-tab="{{ $key }}">
                            {{ $tab['label'] }}
                        </button>
                        @endforeach
                    </div>

                    @foreach($communityTabs as $key => $tab)
                    <div
                        class="psico-community-panel{{ $loop->first ? ' is-active' : '' }}"
                        role="tabpanel"
                        id="psico-community-panel-{{ $key }}"
                        aria-labelledby="psico-community-tab-{{ $key }}"
                        data-psico-panel="{{ $key }}"
                        @unless($loop->first) hidden @endunless>
                        <div class="psico-community-grid">
                            @foreach($tab['images'] as $image)
                            <img
                                src="{{ asset('web/imagenes/bienestar/psicopedagogico/' . $image) }}"
                                alt="{{ $tab['caption'] }}"
                                class="psico-community-grid__photo"
                                loading="lazy"
                                decoding="async">
                            @endforeach
                        </div>
                        <p class="psico-community-grid__caption">{{ $tab['caption'] }}</p>
                    </div>
                    @endforeach
                </article>
            </div>

            <div class="psico-mid__col psico-mid__col--side">
                <article class="psico-card psico-card--calendar">
                    <header class="psico-card__banner">
                        <iconify-icon icon="mdi:calendar-month-outline" aria-hidden="true"></iconify-icon>
                        <h3>Calendario de Actividades</h3>
                    </header>
                    <div class="psico-card__body">
                        <ul class="psico-event-list">
                            @foreach($events as $event)
                            <li class="psico-event-list__item">
                                <span class="psico-event-list__date">
                                    <strong>{{ $event['day'] }}</strong>
                                    <small>{{ $event['month'] }}</small>
                                </span>
                                <span class="psico-event-list__title">{{ $event['title'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('web.noticias') }}" class="psico-card__btn">
                            Ver calendario completo
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </div>
                </article>

                <article class="psico-card psico-card--counseling" id="consejeria">
                    <div class="psico-counseling__main">
                        <header class="psico-counseling__head">
                            <iconify-icon icon="mdi:calendar-month-outline" aria-hidden="true"></iconify-icon>
                            <div>
                                <h3>Consejería Abierta</h3>
                                <p>Atención presencial y virtual para ti.</p>
                            </div>
                        </header>
                        <a href="{{ route('contactenos') }}" class="psico-card__btn">
                            Regístrate aquí
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </div>
                    <a href="https://wa.me/51933248429" class="psico-card__whatsapp" target="_blank" rel="noopener">
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
    document.querySelectorAll('[data-psico-tab]').forEach(function (button) {
        button.addEventListener('click', function () {
            var target = button.getAttribute('data-psico-tab');

            document.querySelectorAll('[data-psico-tab]').forEach(function (tab) {
                tab.classList.toggle('is-active', tab.getAttribute('data-psico-tab') === target);
                tab.setAttribute('aria-selected', tab.getAttribute('data-psico-tab') === target ? 'true' : 'false');
            });

            document.querySelectorAll('[data-psico-panel]').forEach(function (panel) {
                var isActive = panel.getAttribute('data-psico-panel') === target;
                panel.classList.toggle('is-active', isActive);
                panel.hidden = !isActive;
            });
        });
    });
</script>
@endpush
