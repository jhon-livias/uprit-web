@php
    $fallbackNews = [
        [
            'day' => '15',
            'month' => 'MAY',
            'title' => 'Convocatoria de Becas 2026-I',
            'excerpt' => 'Ya está abierta la convocatoria para el proceso de becas y medias becas 2026-I.',
            'url' => route('web.noticias'),
        ],
        [
            'day' => '08',
            'month' => 'MAY',
            'title' => 'Taller: Inclusión y Respeto',
            'excerpt' => 'Participa en nuestro taller sobre diversidad e inclusión en la vida universitaria.',
            'url' => route('web.noticias'),
        ],
        [
            'day' => '02',
            'month' => 'MAY',
            'title' => 'Resultados de medias becas',
            'excerpt' => 'Consulta el cronograma de publicación y los canales oficiales de notificación.',
            'url' => route('web.noticias'),
        ],
        [
            'day' => '28',
            'month' => 'ABR',
            'title' => 'Orientación sobre documentación',
            'excerpt' => 'Revisa cómo presentar tus documentos de forma legible y vigente.',
            'url' => route('web.noticias'),
        ],
    ];

    $newsItems = collect($noticias ?? [])->map(function ($noticia) {
        return [
            'day' => \Carbon\Carbon::parse($noticia->fecha)->format('d'),
            'month' => strtoupper(\Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('M')),
            'title' => $noticia->titulo,
            'excerpt' => \Illuminate\Support\Str::limit(strip_tags($noticia->descripcion_corta ?? ''), 110),
            'url' => route('web.detallenoticia', $noticia->id),
        ];
    });

    if ($newsItems->count() < 2) {
        $newsItems = collect($fallbackNews);
    }
@endphp

<section class="sociales-bottom">
    <div class="container">
        <div class="sociales-bottom__grid">
            <div class="sociales-news">
                <header class="sociales-news__header">
                    <h2 class="sociales-news__title">Noticias y Novedades</h2>
                    <div class="sociales-news__nav">
                        <button type="button" class="sociales-news__arrow sociales-news__arrow--prev" aria-label="Anterior">
                            <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
                        </button>
                        <button type="button" class="sociales-news__arrow sociales-news__arrow--next" aria-label="Siguiente">
                            <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
                        </button>
                    </div>
                </header>

                <div class="swiper sociales-news-swiper">
                    <div class="swiper-wrapper">
                        @foreach($newsItems as $item)
                        <div class="swiper-slide">
                            <article class="sociales-news-card">
                                <span class="sociales-news-card__date">
                                    <strong>{{ $item['day'] }}</strong>
                                    <small>{{ $item['month'] }}</small>
                                </span>
                                <div class="sociales-news-card__body">
                                    <h3 class="sociales-news-card__title">{{ $item['title'] }}</h3>
                                    <p class="sociales-news-card__excerpt">{{ $item['excerpt'] }}</p>
                                    <a href="{{ $item['url'] }}" class="sociales-news-card__link">
                                        Leer más
                                        <span aria-hidden="true">→</span>
                                    </a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <aside class="sociales-contact" id="contacto-sociales">
                <div class="sociales-contact__content">
                    <h2 class="sociales-contact__title">¿Tienes dudas?</h2>
                    <p class="sociales-contact__subtitle">Estamos para ayudarte</p>
                    <ul class="sociales-contact__list">
                        <li>
                            <iconify-icon icon="mdi:email-outline" aria-hidden="true"></iconify-icon>
                            <a href="mailto:becas@uprit.edu.pe">becas@uprit.edu.pe</a>
                        </li>
                        <li>
                            <iconify-icon icon="mdi:phone" aria-hidden="true"></iconify-icon>
                            <a href="tel:+5144604444">(044) 604444 anexo 123</a>
                        </li>
                        <li>
                            <iconify-icon icon="mdi:map-marker-outline" aria-hidden="true"></iconify-icon>
                            <span>Av. América Sur 3145, Trujillo</span>
                        </li>
                        <li>
                            <iconify-icon icon="mdi:clock-outline" aria-hidden="true"></iconify-icon>
                            <span>Lunes a Viernes: 8:00 a.m. - 5:00 p.m.</span>
                        </li>
                    </ul>
                </div>
                <div class="sociales-contact__art" aria-hidden="true">
                    <span class="sociales-contact__chat">
                        <span></span><span></span><span></span>
                    </span>
                    <img
                        src="{{ asset('web/imagenes/bienestar/sociales/asesora-ilustracion.png') }}"
                        alt=""
                        class="sociales-contact__photo"
                        loading="lazy"
                        decoding="async">
                </div>
            </aside>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var el = document.querySelector('.sociales-news-swiper');
        if (!el || typeof Swiper === 'undefined') return;

        new Swiper(el, {
            slidesPerView: 2,
            spaceBetween: 0,
            watchOverflow: true,
            navigation: {
                nextEl: '.sociales-news__arrow--next',
                prevEl: '.sociales-news__arrow--prev',
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
            },
        });
    })();
</script>
@endpush
