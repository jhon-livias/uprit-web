@php
    $topics = [
        [
            'title' => 'Ergonomía en el estudio',
            'description' => 'Consejos para mejorar tu postura y evitar lesiones.',
            'image' => 'web/imagenes/bienestar/salud/ergonomia.jpg',
            'icon' => 'mdi:human-handsup',
        ],
        [
            'title' => 'Higiene del sueño',
            'description' => 'Hábitos que favorecen un descanso saludable.',
            'image' => 'web/imagenes/bienestar/salud/sueno.jpg',
            'icon' => 'mdi:sleep',
        ],
        [
            'title' => 'Primeros auxilios básicos',
            'description' => 'Aprende qué hacer ante emergencias comunes y cómo actuar de forma segura.',
            'image' => 'web/imagenes/bienestar/salud/auxilios-basicos.jpg',
            'icon' => 'mdi:medical-bag',
        ],
        [
            'title' => 'Técnicas de respiración',
            'description' => 'Estrategias sencillas para regular tu respiración y cuidar tu bienestar físico y mental.',
            'image' => 'web/imagenes/bienestar/salud/respiracion.jpg',
            'icon' => 'mdi:weather-windy',
        ],
    ];
@endphp

<section class="salud-topics">
    <div class="container">
        <header class="salud-section-header">
            <h2 class="salud-section-header__title">Temas de interés</h2>
            <p class="salud-section-header__subtitle">
                Información y consejos para cuidar tu salud cada día.
            </p>
        </header>

        <div class="salud-topics__grid">
            @foreach($topics as $topic)
            <article class="salud-topic-card">
                <div class="salud-topic-card__media">
                    <img
                        src="{{ asset($topic['image']) }}"
                        alt="{{ $topic['title'] }}"
                        class="salud-topic-card__photo"
                        loading="lazy"
                        decoding="async">
                </div>
                <div class="salud-topic-card__body">
                    <div class="salud-topic-card__head">
                        <span class="salud-topic-card__icon" aria-hidden="true">
                            <iconify-icon icon="{{ $topic['icon'] }}"></iconify-icon>
                        </span>
                        <h3 class="salud-topic-card__title">{{ $topic['title'] }}</h3>
                    </div>
                    <p class="salud-topic-card__description">{{ $topic['description'] }}</p>
                    <a href="#contacto" class="salud-topic-card__link">
                        Leer más
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
