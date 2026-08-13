@php
    $workshops = [
        [
            'title' => 'Introducción a la Cita Psicopedagógica',
            'description' => 'Conoce el proceso de atención y cómo prepararte para tu primera sesión.',
        ],
        [
            'title' => 'Técnicas de Estudio Efectivas',
            'description' => 'Aprende métodos para organizar tu tiempo y mejorar tu concentración.',
        ],
        [
            'title' => 'Manejo del Estrés Académico',
            'description' => 'Herramientas prácticas para enfrentar la presión de los exámenes.',
        ],
        [
            'title' => 'Orientación Vocacional',
            'description' => 'Descubre tus intereses y fortalezas para tomar mejores decisiones.',
        ],
        [
            'title' => 'Habilidades Sociales Universitarias',
            'description' => 'Desarrolla tu comunicación y relaciones en el entorno universitario.',
        ],
    ];
@endphp

<section class="psico-workshops" id="talleres">
    <div class="container">
        <header class="psico-section-heading">
            <h2 class="psico-section-heading__title">Nuestros Servicios y Talleres</h2>
        </header>

        <div class="psico-workshops__track">
            @foreach($workshops as $workshop)
            <article class="psico-workshop-card">
                <div class="psico-workshop-card__media">
                    <img
                        src="{{ asset('web/imagenes/bienestar/psicopedagogico/video-thumb.jpg') }}"
                        alt="{{ $workshop['title'] }}"
                        class="psico-workshop-card__thumb"
                        loading="lazy"
                        decoding="async">
                    <button type="button" class="psico-workshop-card__play" aria-label="Reproducir {{ $workshop['title'] }}">
                        <iconify-icon icon="mdi:play" aria-hidden="true"></iconify-icon>
                    </button>
                    <div class="psico-workshop-card__progress" aria-hidden="true">
                        <span></span>
                    </div>
                </div>
                <div class="psico-workshop-card__body">
                    <h3 class="psico-workshop-card__title">{{ $workshop['title'] }}</h3>
                    <p class="psico-workshop-card__description">{{ $workshop['description'] }}</p>
                    <a href="#consejeria" class="psico-workshop-card__btn">
                        Ver más
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="psico-workshops__cta">
            <a href="#consejeria" class="psico-btn psico-btn--outline-light">
                ¡Solicita tu asesoría ahora!
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>
