@php
    $workshops = [
        [
            'title' => 'Introducción a la Cita Psicopedagógica',
            'description' => 'Apoyo emocional, consejería y orientación.',
        ],
        [
            'title' => 'Técnicas de Estudio para Exámenes',
            'description' => 'Técnicas de estudio, gestión del tiempo y concentración.',
        ],
        [
            'title' => 'Taller de Orientación Vocacional',
            'description' => 'Descubre tu perfil y elige tu carrera profesional.',
        ],
        [
            'title' => 'Cápsula de Salud Mental: Manejo del Estrés',
            'description' => 'Técnicas de relajación y control de ansiedad.',
        ],
        [
            'title' => 'Testimonio: Superando Retos Académicos',
            'description' => 'Intervención en retos específicos de aprendizaje.',
        ],
        [
            'title' => 'Habilidades Sociales Universitarias',
            'description' => 'Comunicación asertiva y relaciones en el campus.',
        ],
        [
            'title' => 'Organización del Tiempo Académico',
            'description' => 'Planifica tu semana y mejora tu rendimiento.',
        ],
    ];
@endphp

<section class="psico-workshops" id="talleres">
    <div class="container">
        <header class="psico-section-heading">
            <h2 class="psico-section-heading__title">Nuestros Servicios y Talleres</h2>
        </header>

        <div class="psico-workshops__carousel">
            <button type="button" class="psico-workshops__nav psico-workshops__nav--prev" aria-label="Anterior">
                <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
            </button>

            <div class="swiper psico-workshops-swiper">
                <div class="swiper-wrapper">
                    @foreach($workshops as $workshop)
                    <div class="swiper-slide">
                        <article class="psico-workshop-card">
                            <div class="psico-workshop-card__media">
                                <img
                                    src="{{ asset('web/imagenes/bienestar/psicopedagogico/video-thumb.jpg') }}"
                                    alt="{{ $workshop['title'] }}"
                                    class="psico-workshop-card__thumb"
                                    loading="lazy"
                                    decoding="async">
                                <span class="psico-workshop-card__play" aria-hidden="true">
                                    <iconify-icon icon="mdi:play"></iconify-icon>
                                </span>
                                <div class="psico-workshop-card__bar" aria-hidden="true">
                                    <iconify-icon icon="mdi:play"></iconify-icon>
                                    <span class="psico-workshop-card__bar-track">
                                        <span></span>
                                    </span>
                                    <iconify-icon icon="mdi:volume-high"></iconify-icon>
                                    <iconify-icon icon="mdi:fullscreen"></iconify-icon>
                                </div>
                            </div>
                            <div class="psico-workshop-card__body">
                                <h3 class="psico-workshop-card__title">{{ $workshop['title'] }}</h3>
                                <p class="psico-workshop-card__description">{{ $workshop['description'] }}</p>
                                <a href="#consejeria" class="psico-workshop-card__btn">
                                    Ver más
                                    <span aria-hidden="true">&gt;</span>
                                </a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="button" class="psico-workshops__nav psico-workshops__nav--next" aria-label="Siguiente">
                <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
            </button>
        </div>

        <div class="psico-workshops__cta">
            <a href="#consejeria" class="psico-btn psico-btn--solid">
                ¡Solicita tu asesoría ahora!
                <span aria-hidden="true">&gt;</span>
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var el = document.querySelector('.psico-workshops-swiper');
        if (!el || typeof Swiper === 'undefined') return;

        new Swiper(el, {
            slidesPerView: 5,
            spaceBetween: 16,
            watchOverflow: true,
            navigation: {
                nextEl: '.psico-workshops__nav--next',
                prevEl: '.psico-workshops__nav--prev',
            },
            breakpoints: {
                0: { slidesPerView: 1.15, spaceBetween: 12 },
                576: { slidesPerView: 2, spaceBetween: 14 },
                768: { slidesPerView: 3, spaceBetween: 14 },
                992: { slidesPerView: 4, spaceBetween: 16 },
                1200: { slidesPerView: 5, spaceBetween: 16 },
            },
        });
    })();
</script>
@endpush
