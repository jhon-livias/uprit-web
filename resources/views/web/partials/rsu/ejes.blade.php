@php
    $ejes = [
        [
            'image' => 'eje-1.jpg',
            'title' => 'Formación con impacto',
            'text' => 'Integramos la responsabilidad social en la formación para que cada estudiante genere valor en su entorno.',
        ],
        [
            'image' => 'eje-2.jpg',
            'title' => 'Vinculación con la comunidad',
            'text' => 'Trabajamos junto a organizaciones y vecinos en iniciativas que responden a necesidades reales.',
        ],
        [
            'image' => 'eje-3.jpg',
            'title' => 'Gestión ambiental responsable',
            'text' => 'Promovemos prácticas sostenibles en el campus y campañas de cuidado del medio ambiente.',
        ],
        [
            'image' => 'eje-4.webp',
            'title' => 'Investigación e innovación social',
            'text' => 'Impulsamos proyectos que conectan el conocimiento académico con soluciones de impacto social.',
        ],
    ];
@endphp

<section class="rsu-ejes" id="ejes">
    <div class="container">
        <header class="rsu-heading">
            <h2 class="rsu-heading__title">Nuestros ejes de acción</h2>
        </header>

        <div class="rsu-ejes__grid">
            @foreach($ejes as $eje)
            <article class="rsu-card">
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
