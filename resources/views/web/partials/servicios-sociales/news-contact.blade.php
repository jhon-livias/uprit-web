@php
    $fallbackNews = [
        ['day' => '15', 'month' => 'MAY', 'title' => 'Convocatoria de becas 2026-I'],
        ['day' => '22', 'month' => 'MAY', 'title' => 'Taller de inclusión y diversidad'],
    ];
@endphp

<section class="sociales-bottom">
    <div class="container">
        <div class="sociales-bottom__grid">
            <div class="sociales-news">
                <header class="sociales-heading sociales-heading--left">
                    <h2 class="sociales-heading__title">Noticias y Novedades</h2>
                </header>

                <div class="sociales-news__list">
                    @forelse(($noticias ?? []) as $noticia)
                    <article class="sociales-news-card">
                        <span class="sociales-news-card__date">
                            <strong>{{ \Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('d') }}</strong>
                            <small>{{ strtoupper(\Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('M')) }}</small>
                        </span>
                        <div>
                            <h3 class="sociales-news-card__title">{{ $noticia->titulo }}</h3>
                            <a href="{{ route('web.detallenoticia', $noticia->id) }}" class="sociales-news-card__link">
                                Leer más
                                <span aria-hidden="true">&gt;</span>
                            </a>
                        </div>
                    </article>
                    @empty
                    @foreach($fallbackNews as $item)
                    <article class="sociales-news-card">
                        <span class="sociales-news-card__date">
                            <strong>{{ $item['day'] }}</strong>
                            <small>{{ $item['month'] }}</small>
                        </span>
                        <div>
                            <h3 class="sociales-news-card__title">{{ $item['title'] }}</h3>
                            <a href="{{ route('web.noticias') }}" class="sociales-news-card__link">
                                Leer más
                                <span aria-hidden="true">&gt;</span>
                            </a>
                        </div>
                    </article>
                    @endforeach
                    @endforelse
                </div>
            </div>

            <aside class="sociales-contact" id="contacto-sociales">
                <div class="sociales-contact__content">
                    <h2 class="sociales-contact__title">¿Tienes dudas? Estamos para ayudarte</h2>
                    <ul class="sociales-contact__list">
                        <li>
                            <iconify-icon icon="mdi:email-outline" aria-hidden="true"></iconify-icon>
                            <a href="mailto:bienestarinstitucional@uprit.edu.pe">bienestarinstitucional@uprit.edu.pe</a>
                        </li>
                        <li>
                            <iconify-icon icon="mdi:phone" aria-hidden="true"></iconify-icon>
                            <a href="tel:+51933248429">+51 933 248 429</a>
                        </li>
                        <li>
                            <iconify-icon icon="mdi:map-marker-outline" aria-hidden="true"></iconify-icon>
                            <span>Av. América Sur 3145, Trujillo – Perú</span>
                        </li>
                        <li>
                            <iconify-icon icon="mdi:clock-outline" aria-hidden="true"></iconify-icon>
                            <span>Lunes a viernes, 8:00 a.m. – 5:00 p.m.</span>
                        </li>
                    </ul>
                    <a href="{{ route('contactenos') }}" class="sociales-btn sociales-btn--light">Escríbenos</a>
                </div>
                <img
                    src="{{ asset('web/imagenes/bienestar/sociales/asesora.jpg') }}"
                    alt=""
                    class="sociales-contact__photo"
                    loading="lazy"
                    decoding="async">
            </aside>
        </div>
    </div>
</section>
