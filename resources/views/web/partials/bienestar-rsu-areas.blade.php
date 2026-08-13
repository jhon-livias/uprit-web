@php
    $areas = [
        [
            'title' => 'Servicio Psicopedagógico',
            'description' => 'Orientación psicológica para fortalecer tu bienestar emocional y académico.',
            'url' => route('servicio-psicopedagogico'),
            'icon' => 'mdi:brain',
            'tone' => 'maroon',
        ],
        [
            'title' => 'Programa de alimentación saludable',
            'description' => 'Fomentamos hábitos alimenticios saludables y un estilo de vida equilibrado.',
            'url' => route('salud'),
            'icon' => 'mdi:food-apple-outline',
            'tone' => 'orange',
        ],
        [
            'title' => 'Servicios de Salud',
            'description' => 'Atención médica y cuidado preventivo para tu salud integral.',
            'url' => route('servicios-de-salud'),
            'icon' => 'mdi:stethoscope',
            'tone' => 'maroon',
        ],
        [
            'title' => 'Servicios Deportivos y Programas Deportivos de Alta Competencia',
            'description' => 'Fomentamos la práctica deportiva y los programas de alta competencia para tu desarrollo integral.',
            'url' => route('servicios-deportivos'),
            'icon' => 'mdi:run',
            'tone' => 'orange',
        ],
        [
            'title' => 'Programa de actividades artísticas y culturales',
            'description' => 'Impulsamos el talento y la creatividad a través del arte y la cultura.',
            'url' => route('actividades-artisticas'),
            'icon' => 'mdi:drama-masks',
            'tone' => 'orange',
        ],
        [
            'title' => 'Servicios sociales y programa de atención a la diversidad',
            'description' => 'Promovemos la inclusión, equidad y apoyo social dentro de la comunidad universitaria.',
            'url' => route('becas'),
            'icon' => 'mdi:account-group-outline',
            'tone' => 'maroon',
        ],
        [
            'title' => 'Responsabilidad Social Universitaria',
            'description' => 'Desarrollamos proyectos con impacto social y compromiso comunitario.',
            'url' => route('becas'),
            'icon' => 'mdi:hand-heart-outline',
            'tone' => 'orange',
        ],
    ];
@endphp

<section class="bienestar-areas-section">
    <div class="container">
        <div class="row g-4 g-xl-5 align-items-start">
            <aside class="col-lg-4 col-xl-3">
                <div class="bienestar-director-card">
                    <h2 class="bienestar-director-card__heading">Nuestra Directora</h2>
                    <div class="bienestar-director-card__photo-wrap">
                        <img
                            src="{{ asset('web/imagenes/bienestar/directora.jpg') }}"
                            alt="Jovana Bracamonte"
                            class="bienestar-director-card__photo"
                            loading="lazy"
                            decoding="async">
                    </div>
                    <h3 class="bienestar-director-card__name">Jovana Bracamonte</h3>
                    <p class="bienestar-director-card__role">
                        Directora de Bienestar Universitario y Responsabilidad Social Universitaria.
                    </p>
                    <blockquote class="bienestar-director-card__quote">
                        <span class="bienestar-director-card__quote-mark" aria-hidden="true">“</span>
                        Trabajamos cada día por una universidad más humana, inclusiva y comprometida con el bienestar de nuestra comunidad.
                    </blockquote>
                    <a href="{{ route('contactenos') }}" class="bienestar-director-card__cta">
                        <iconify-icon icon="mdi:email-outline" aria-hidden="true"></iconify-icon>
                        Contáctanos
                    </a>
                </div>
            </aside>

            <div class="col-lg-8 col-xl-9">
                <header class="bienestar-areas-header">
                    <h2 class="bienestar-areas-header__title">Nuestras Áreas</h2>
                    <p class="bienestar-areas-header__subtitle">
                        Conoce los servicios y programas que contribuyen a tu bienestar y desarrollo integral.
                    </p>
                </header>

                <div class="bienestar-areas-grid">
                    @foreach($areas as $area)
                    <article class="bienestar-area-card">
                        <div class="bienestar-area-card__head">
                            <div class="bienestar-area-card__icon bienestar-area-card__icon--{{ $area['tone'] }}">
                                <iconify-icon icon="{{ $area['icon'] }}" aria-hidden="true"></iconify-icon>
                            </div>
                            <h3 class="bienestar-area-card__title">{{ $area['title'] }}</h3>
                        </div>
                        <p class="bienestar-area-card__description">{{ $area['description'] }}</p>
                        <a href="{{ $area['url'] }}" class="bienestar-area-card__link">Ver más →</a>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>

        @include('web.partials.bienestar-rsu-campaign-banner')
    </div>
</section>
