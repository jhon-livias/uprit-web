@php
    $pillars = [
        [
            'icon' => 'mdi:earth',
            'title' => 'Cultural',
            'text' => 'Valoramos las distintas identidades, tradiciones y formas de ver el mundo.',
            'tone' => 'red',
        ],
        [
            'icon' => 'mdi:gender-male-female',
            'title' => 'Sexual',
            'text' => 'Promovemos el respeto a la identidad y orientación de cada persona.',
            'tone' => 'orange',
        ],
        [
            'icon' => 'mdi:forum-outline',
            'title' => 'Lingüística',
            'text' => 'Reconocemos la riqueza de lenguas y formas de comunicación.',
            'tone' => 'green',
        ],
        [
            'icon' => 'mdi:wheelchair',
            'title' => 'Funcional',
            'text' => 'Garantizamos accesibilidad y condiciones equitativas de participación.',
            'tone' => 'blue',
        ],
    ];
@endphp

<section class="sociales-diversidad" id="diversidad">
    <div class="container">
        <div class="sociales-diversidad__grid">
            <div class="sociales-diversidad__copy">
                <header class="sociales-heading sociales-heading--left">
                    <h2 class="sociales-heading__title">Diversidad e Inclusión</h2>
                </header>
                <p class="sociales-diversidad__lead">
                    Trabajamos para que la universidad sea un espacio seguro, respetuoso y accesible, donde cada estudiante pueda desarrollarse sin barreras.
                </p>
                <a href="#contacto-sociales" class="sociales-btn sociales-btn--outline">Conoce nuestros pilares</a>
            </div>

            <div class="sociales-pillars">
                @foreach($pillars as $pillar)
                <article class="sociales-pillar">
                    <span class="sociales-pillar__icon sociales-pillar__icon--{{ $pillar['tone'] }}" aria-hidden="true">
                        <iconify-icon icon="{{ $pillar['icon'] }}"></iconify-icon>
                    </span>
                    <div>
                        <h3 class="sociales-pillar__title">{{ $pillar['title'] }}</h3>
                        <p class="sociales-pillar__text">{{ $pillar['text'] }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
