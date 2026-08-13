@php
    $values = [
        [
            'icon' => 'mdi:account-group-outline',
            'title' => 'Inclusión',
            'text' => 'Un entorno respetuoso donde todas las personas pertenecen.',
        ],
        [
            'icon' => 'mdi:scale-balance',
            'title' => 'Equidad',
            'text' => 'Oportunidades justas para avanzar según cada realidad.',
        ],
        [
            'icon' => 'mdi:school-outline',
            'title' => 'Oportunidades',
            'text' => 'Acompañamos el talento para que alcance sus metas.',
        ],
        [
            'icon' => 'mdi:hand-heart-outline',
            'title' => 'Compromiso social',
            'text' => 'Formamos profesionales comprometidos con su entorno.',
        ],
    ];
@endphp

<section class="sociales-values">
    <div class="container">
        <div class="sociales-values__grid">
            @foreach($values as $value)
            <article class="sociales-value">
                <span class="sociales-value__icon" aria-hidden="true">
                    <iconify-icon icon="{{ $value['icon'] }}"></iconify-icon>
                </span>
                <div>
                    <h2 class="sociales-value__title">{{ $value['title'] }}</h2>
                    <p class="sociales-value__text">{{ $value['text'] }}</p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
