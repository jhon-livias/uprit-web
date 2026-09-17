@php
    $strips = [
        ['file' => 'danza.jpg', 'alt' => 'Taller de danza'],
        ['file' => 'musica.jpg', 'alt' => 'Taller de música'],
        ['file' => 'teatro.jpg', 'alt' => 'Taller de teatro'],
        ['file' => 'comunidad-1.jpg', 'alt' => 'Ensamble musical'],
        ['file' => 'comunidad-2.jpg', 'alt' => 'Comunidad artística UPRIT'],
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
        <h1 class="cultura-hero__title">Descubre tu talento</h1>
        <p class="cultura-hero__lead">
            Programa de Actividades Artísticas y Culturales. Fortalece tu expresión, comparte en comunidad y forma parte de UPRIT.
        </p>
        <p class="cultura-hero__lead">
            {{ config('bienestar.cultura.responsable') }} — {{ config('bienestar.cultura.cargo') }}
        </p>
        <a href="#inscripciones" class="cultura-hero__cta">
            ¡Inscríbete ahora!
            <span aria-hidden="true">&gt;</span>
        </a>
    </div>
</section>
