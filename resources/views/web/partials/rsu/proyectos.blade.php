@php
    $proyectos = [
        [
            'image' => 'proyecto-1.webp',
            'title' => 'Educar para transformar',
            'text' => 'Talleres y acompañamiento educativo en comunidades vecinas.',
        ],
        [
            'image' => 'proyecto-2.webp',
            'title' => 'Campus sostenible',
            'text' => 'Acciones de reciclaje, reforestación y cultura ambiental en UPRIT.',
        ],
        [
            'image' => 'proyecto-3.webp',
            'title' => 'Salud para todos',
            'text' => 'Campañas preventivas y jornadas de atención junto a aliados.',
        ],
        [
            'image' => 'proyecto-4.jpg',
            'title' => 'Voluntariado UPRIT',
            'text' => 'Estudiantes y docentes que se suman a iniciativas de impacto social.',
        ],
    ];
@endphp

<section class="rsu-proyectos" id="proyectos">
    <div class="container">
        <div class="rsu-proyectos__grid">
            <div class="rsu-proyectos__copy">
                <h2 class="rsu-proyectos__title">Proyectos que transforman</h2>
                <p class="rsu-proyectos__lead">
                    Cada iniciativa busca generar un cambio concreto en las personas y en el territorio donde nos desenvolvemos.
                </p>
                <a href="{{ route('web.noticias') }}" class="rsu-btn rsu-btn--light">
                    Ver todos los proyectos
                    <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="rsu-proyectos__carousel">
                <button type="button" class="rsu-proyectos__nav rsu-proyectos__nav--prev" aria-label="Anterior">
                    <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
                </button>

                <div class="swiper rsu-proyectos-swiper">
                    <div class="swiper-wrapper">
                        @foreach($proyectos as $proyecto)
                        <div class="swiper-slide">
                            <article class="rsu-card rsu-card--light">
                                <img
                                    src="{{ asset('web/imagenes/bienestar/rsu/' . $proyecto['image']) }}"
                                    alt="{{ $proyecto['title'] }}"
                                    class="rsu-card__image"
                                    loading="lazy"
                                    decoding="async">
                                <div class="rsu-card__body">
                                    <h3 class="rsu-card__title">{{ $proyecto['title'] }}</h3>
                                    <p class="rsu-card__text">{{ $proyecto['text'] }}</p>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>

                <button type="button" class="rsu-proyectos__nav rsu-proyectos__nav--next" aria-label="Siguiente">
                    <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var el = document.querySelector('.rsu-proyectos-swiper');
        if (!el || typeof Swiper === 'undefined') return;

        new Swiper(el, {
            slidesPerView: 3,
            spaceBetween: 16,
            watchOverflow: true,
            navigation: {
                nextEl: '.rsu-proyectos__nav--next',
                prevEl: '.rsu-proyectos__nav--prev',
            },
            breakpoints: {
                0: { slidesPerView: 1.15, spaceBetween: 12 },
                768: { slidesPerView: 2, spaceBetween: 14 },
                1200: { slidesPerView: 3, spaceBetween: 16 },
            },
        });
    })();
</script>
@endpush
