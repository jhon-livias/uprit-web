@php
    $inscripcionUrl = config('bienestar.google_form_inscripcion');
    $whatsappUrl = config('bienestar.whatsapp_url');

    $talleres = [
        [
            'title' => 'Taller de Danza',
            'icon' => 'mdi:human-female-dance',
            'image' => 'danza.jpg',
            'accent' => '#6b1221',
            'description' => 'Expresa tu creatividad a través del movimiento y comparte tu talento en escena.',
        ],
        [
            'title' => 'Taller de Música',
            'icon' => 'mdi:guitar-acoustic',
            'image' => 'musica.jpg',
            'accent' => '#6b1221',
            'description' => 'Aprende a tocar, canta y forma parte de nuestra comunidad musical universitaria.',
        ],
        [
            'title' => 'Taller de Teatro',
            'icon' => 'mdi:drama-masks',
            'image' => 'teatro.jpg',
            'accent' => '#6b1221',
            'description' => 'Desarrolla tu expresión oral, corporal y confianza en escena.',
        ],
    ];
@endphp

<section class="cultura-talleres" id="talleres">
    <div class="container">
        <header class="cultura-section-heading">
            <h2 class="cultura-section-heading__title">Nuestros Talleres</h2>
        </header>

        <div class="cultura-talleres__carousel">
            <button type="button" class="cultura-talleres__nav cultura-talleres__nav--prev" aria-label="Anterior">
                <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
            </button>

            <div class="swiper cultura-talleres-swiper">
                <div class="swiper-wrapper">
                    @foreach($talleres as $taller)
                    <div class="swiper-slide">
                        <article class="cultura-taller-card" style="--taller-accent: {{ $taller['accent'] }}">
                            <div class="cultura-taller-card__media">
                                <img
                                    src="{{ asset('web/imagenes/bienestar/artisticas/' . $taller['image']) }}"
                                    alt="{{ $taller['title'] }}"
                                    loading="lazy"
                                    decoding="async">
                                <span class="cultura-taller-card__icon" aria-hidden="true">
                                    <iconify-icon icon="{{ $taller['icon'] }}"></iconify-icon>
                                </span>
                            </div>
                            <div class="cultura-taller-card__body">
                                <h3 class="cultura-taller-card__title">{{ $taller['title'] }}</h3>
                                <p class="cultura-taller-card__desc">{{ $taller['description'] }}</p>
                                <a href="{{ $inscripcionUrl }}" class="cultura-taller-card__more" target="_blank" rel="noopener">
                                    Inscribirme
                                    <span aria-hidden="true">&gt;</span>
                                </a>
                                <a href="{{ $whatsappUrl }}" class="cultura-taller-card__whatsapp" target="_blank" rel="noopener">
                                    WhatsApp Bienestar
                                </a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="button" class="cultura-talleres__nav cultura-talleres__nav--next" aria-label="Siguiente">
                <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
            </button>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var el = document.querySelector('.cultura-talleres-swiper');
        if (!el || typeof Swiper === 'undefined') return;

        new Swiper(el, {
            slidesPerView: 3,
            spaceBetween: 16,
            watchOverflow: true,
            navigation: {
                nextEl: '.cultura-talleres__nav--next',
                prevEl: '.cultura-talleres__nav--prev',
            },
            breakpoints: {
                0: { slidesPerView: 1.15, spaceBetween: 12 },
                576: { slidesPerView: 2, spaceBetween: 14 },
                992: { slidesPerView: 3, spaceBetween: 16 },
            },
        });
    })();
</script>
@endpush
