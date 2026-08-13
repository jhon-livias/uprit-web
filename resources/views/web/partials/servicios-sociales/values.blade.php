@php
    $values = [
        [
            'icon' => 'mdi:account-group-outline',
            'title' => 'Inclusión',
            'text' => 'Fomentamos un entorno respetuoso y accesible para todos.',
        ],
        [
            'icon' => 'mdi:scale-balance',
            'title' => 'Equidad',
            'text' => 'Brindamos oportunidades justas para el desarrollo de cada estudiante.',
        ],
        [
            'icon' => 'mdi:school-outline',
            'title' => 'Oportunidades',
            'text' => 'Apoyamos el talento y esfuerzo para que alcancen sus metas.',
        ],
        [
            'icon' => 'mdi:hand-heart-outline',
            'title' => 'Compromiso Social',
            'text' => 'Formamos profesionales comprometidos con la sociedad.',
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
