@php
    $strips = [
        ['file' => 'danza.jpg', 'alt' => 'Taller de danza'],
        ['file' => 'musica.jpg', 'alt' => 'Taller de música'],
        ['file' => 'volley.webp', 'alt' => 'Taller de vóley'],
        ['file' => 'basket.webp', 'alt' => 'Taller de básquet'],
        ['file' => 'chess.jpg', 'alt' => 'Taller de ajedrez'],
    ];
@endphp

<section class="cultura-hero">
    <div class="cultura-hero__strips" aria-hidden="true">
        @foreach($strips as $strip)
        <div class="cultura-hero__strip">
            <img
                src="{{ asset('web/imagenes/bienestar/artisticas/' . $strip['file']) }}"
                alt=""
                decoding="async">
        </div>
        @endforeach
    </div>

    <div class="cultura-hero__copy">
        <h1 class="cultura-hero__title">Talleres deportivos y artísticos</h1>
        <p class="cultura-hero__lead">
            Descubre tu talento, fortalece tu cuerpo y mente y forma parte de nuestra comunidad UPRIT.
        </p>
        <a href="#inscripciones" class="cultura-hero__cta">
            ¡Inscríbete ahora!
            <span aria-hidden="true">&gt;</span>
        </a>
    </div>
</section>
