@php
    $fallbackNews = [
        [
            'src' => asset('web/imagenes/bienestar/rsu/noticia-1.jpg'),
            'date' => '10 Mayo, 2024',
            'title' => 'Jornada de reforestación UPRIT 2024',
            'url' => route('web.noticias'),
        ],
        [
            'src' => asset('web/imagenes/bienestar/rsu/noticia-2.jpg'),
            'date' => '22 Abril, 2024',
            'title' => 'Campaña de donación de útiles escolares',
            'url' => route('web.noticias'),
        ],
        [
            'src' => asset('web/imagenes/bienestar/rsu/noticia-3.jpg'),
            'date' => '08 Marzo, 2024',
            'title' => 'Taller: Liderazgo y responsabilidad social',
            'url' => route('web.noticias'),
        ],
    ];

    $newsItems = collect($noticias ?? [])->take(3)->map(function ($noticia) {
        return [
            'src' => $noticia->imagen
                ? asset('noticias_imagenes/' . $noticia->imagen)
                : asset('web/imagenes/bienestar/rsu/noticia-1.jpg'),
            'date' => ucfirst(\Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('d F, Y')),
            'title' => $noticia->titulo,
            'url' => route('web.detallenoticia', $noticia->id),
        ];
    });

    if ($newsItems->count() < 3) {
        $newsItems = collect($fallbackNews);
    }
@endphp

<section class="rsu-news" id="noticias">
    <div class="container">
        <header class="rsu-news__header">
            <h2 class="rsu-heading__title">Noticias y actividades</h2>
            <a href="{{ route('web.noticias') }}" class="rsu-news__all">
                Ver todas las noticias
                <span aria-hidden="true">→</span>
            </a>
        </header>

        <div class="rsu-news__grid">
            @foreach($newsItems as $item)
            <article class="rsu-card">
                <img
                    src="{{ $item['src'] }}"
                    alt="{{ $item['title'] }}"
                    class="rsu-card__image"
                    loading="lazy"
                    decoding="async">
                <div class="rsu-card__body">
                    <p class="rsu-news-card__date">
                        <iconify-icon icon="mdi:calendar-month-outline" aria-hidden="true"></iconify-icon>
                        {{ $item['date'] }}
                    </p>
                    <h3 class="rsu-card__title">{{ $item['title'] }}</h3>
                    <a href="{{ $item['url'] }}" class="rsu-card__link">
                        Leer más
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
