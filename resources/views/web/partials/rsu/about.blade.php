@php
    $stats = [
        ['icon' => 'mdi:account-group-outline', 'value' => '+45', 'label' => 'Proyectos sociales'],
        ['icon' => 'mdi:earth', 'value' => '+2000', 'label' => 'Beneficiarios directos'],
        ['icon' => 'mdi:office-building-outline', 'value' => '15', 'label' => 'Alianzas estratégicas'],
    ];
@endphp

<section class="rsu-about" id="sobre-rsu">
    <div class="container">
        <div class="rsu-about__grid">
            <div class="rsu-about__copy">
                <header class="rsu-heading rsu-heading--left">
                    <h2 class="rsu-heading__title">Sobre RSU</h2>
                </header>
                <p>
                    En UPRIT impulsamos una gestión ética, inclusiva y sostenible. Articulamos docencia, investigación y vinculación con el entorno para generar valor social y contribuir al desarrollo de nuestra comunidad.
                </p>
            </div>

            <div class="rsu-stats">
                @foreach($stats as $stat)
                <article class="rsu-stat">
                    <span class="rsu-stat__icon" aria-hidden="true">
                        <iconify-icon icon="{{ $stat['icon'] }}"></iconify-icon>
                    </span>
                    <strong class="rsu-stat__value">{{ $stat['value'] }}</strong>
                    <span class="rsu-stat__label">{{ $stat['label'] }}</span>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
