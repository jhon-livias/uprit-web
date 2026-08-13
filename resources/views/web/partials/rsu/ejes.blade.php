@php
    $ejes = [
        [
            'image' => 'eje-1.jpg',
            'title' => 'Formación con impacto',
            'text' => 'Promovemos una educación con valores y compromiso social en nuestra comunidad universitaria.',
        ],
        [
            'image' => 'eje-2.jpg',
            'title' => 'Vinculación con la comunidad',
            'text' => 'Desarrollamos proyectos y programas que generan bienestar social y desarrollo local.',
        ],
        [
            'image' => 'eje-3.jpg',
            'title' => 'Gestión ambiental responsable',
            'text' => 'Promovemos el cuidado del medio ambiente y la cultura de sostenibilidad.',
        ],
        [
            'image' => 'eje-4.webp',
            'title' => 'Investigación e innovación social',
            'text' => 'Fomentamos la investigación aplicada para aportar soluciones a problemas sociales.',
        ],
    ];
@endphp

<section class="rsu-ejes" id="ejes">
    <div class="container">
        <h2 class="rsu-ejes__title">Nuestros ejes de acción</h2>

        <div class="rsu-ejes__grid">
            @foreach($ejes as $eje)
            <article class="rsu-card rsu-eje-card">
                <img
                    src="{{ asset('web/imagenes/bienestar/rsu/' . $eje['image']) }}"
                    alt="{{ $eje['title'] }}"
                    class="rsu-card__image"
                    loading="lazy"
                    decoding="async">
                <div class="rsu-card__body">
                    <h3 class="rsu-card__title">{{ $eje['title'] }}</h3>
                    <p class="rsu-card__text">{{ $eje['text'] }}</p>
                    <a href="#proyectos" class="rsu-card__link">
                        Ver más
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
