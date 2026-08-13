@php
    $pillars = [
        [
            'icon' => 'mdi:earth',
            'title' => 'Cultural',
            'text' => 'Valoramos y respetamos las diferentes culturas y tradiciones.',
            'tone' => 'red',
        ],
        [
            'icon' => 'mdi:gender-male-female',
            'title' => 'Sexual',
            'text' => 'Promovemos el respeto a la diversidad sexual y de género.',
            'tone' => 'orange',
        ],
        [
            'icon' => 'mdi:translate',
            'title' => 'Lingüística',
            'text' => 'Fomentamos la inclusión de diferentes idiomas y formas de comunicación.',
            'tone' => 'green',
        ],
        [
            'icon' => 'mdi:wheelchair',
            'title' => 'Funcional',
            'text' => 'Garantizamos la inclusión activa de personas con discapacidad y capacidades diversas.',
            'tone' => 'blue',
        ],
    ];
@endphp

<section class="sociales-diversidad" id="diversidad">
    <div class="container">
        <div class="sociales-diversidad__grid">
            <div class="sociales-diversidad__copy">
                <h2 class="sociales-diversidad__title">Diversidad e Inclusión</h2>
                <p class="sociales-diversidad__lead">
                    Valoramos nuestras diferencias y construimos juntos una universidad más humana, equitativa y accesible.
                </p>
                <a href="#diversidad-pilares" class="sociales-diversidad__btn">Conoce nuestros pilares</a>
            </div>

            <div class="sociales-pillars" id="diversidad-pilares">
                @foreach($pillars as $pillar)
                <article class="sociales-pillar">
                    <span class="sociales-pillar__icon sociales-pillar__icon--{{ $pillar['tone'] }}" aria-hidden="true">
                        <iconify-icon icon="{{ $pillar['icon'] }}"></iconify-icon>
                    </span>
                    <h3 class="sociales-pillar__title sociales-pillar__title--{{ $pillar['tone'] }}">{{ $pillar['title'] }}</h3>
                    <p class="sociales-pillar__text">{{ $pillar['text'] }}</p>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
