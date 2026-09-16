@php
    $workshops = [
        [
            'title' => 'Atención psicopedagógica',
            'description' => 'Apoyo emocional, consejería y acompañamiento personalizado.',
        ],
        [
            'title' => 'Técnicas de estudio',
            'description' => 'Gestión del tiempo, concentración y estrategias para exámenes.',
        ],
        [
            'title' => 'Orientación vocacional',
            'description' => 'Descubre tu perfil y fortalece tus proyectos profesionales.',
        ],
        [
            'title' => 'Salud mental universitaria',
            'description' => 'Herramientas para el manejo del estrés y la ansiedad académica.',
        ],
        [
            'title' => 'Habilidades sociales',
            'description' => 'Comunicación asertiva y relaciones en el campus.',
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
                            <div class="psico-workshop-card__body">
                                <h3 class="psico-workshop-card__title">{{ $workshop['title'] }}</h3>
                                <p class="psico-workshop-card__description">{{ $workshop['description'] }}</p>
                                <a href="#consejeria" class="psico-workshop-card__btn">
                                    Reservar atención
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
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var el = document.querySelector('.psico-workshops-swiper');
        if (!el || typeof Swiper === 'undefined') return;

        new Swiper(el, {
            slidesPerView: 4,
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
                1200: { slidesPerView: 4, spaceBetween: 16 },
            },
        });
    })();
</script>
@endpush
