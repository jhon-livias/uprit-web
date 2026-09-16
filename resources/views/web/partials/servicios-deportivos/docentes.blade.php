@php
    $docentes = config('bienestar.deportes.docentes');
@endphp

<section class="deportes-docentes" id="docentes">
    <div class="container">
        <header class="deportes-section-heading">
            <h2 class="deportes-section-heading__title">Nuestros Docentes</h2>
        </header>

        <div class="deportes-docentes__grid">
            @foreach($docentes as $docente)
            <article class="deportes-docente">
                <img
                    src="{{ asset($docente['photo']) }}"
                    alt="{{ $docente['name'] }}"
                    class="deportes-docente__photo"
                    loading="lazy"
                    decoding="async">
                <h3 class="deportes-docente__name">{{ $docente['name'] }}</h3>
            </article>
            @endforeach
        </div>
    </div>
</section>
