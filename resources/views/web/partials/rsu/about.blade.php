@php
    $stats = [
        ['icon' => 'mdi:account-group-outline', 'value' => '+45', 'label' => 'Proyectos<br>sociales'],
        ['icon' => 'mdi:hand-heart-outline', 'value' => '+2000', 'label' => 'Beneficiarios<br>directos'],
        ['icon' => 'mdi:bank-outline', 'value' => '15', 'label' => 'Alianzas<br>estratégicas'],
    ];
@endphp

<section class="rsu-about" id="sobre-rsu">
    <div class="container">
        <div class="rsu-about__grid">
            <div class="rsu-about__copy">
                <h2 class="rsu-about__title">Sobre RSU</h2>
                <p>
                    En UPRIT contribuimos al desarrollo sostenible de la sociedad mediante la formación integral, la gestión responsable, la investigación y la vinculación con nuestro entorno.
                </p>
            </div>

            <div class="rsu-stats">
                @foreach($stats as $stat)
                <article class="rsu-stat">
                    <span class="rsu-stat__icon" aria-hidden="true">
                        <iconify-icon icon="{{ $stat['icon'] }}"></iconify-icon>
                    </span>
                    <strong class="rsu-stat__value">{{ $stat['value'] }}</strong>
                    <span class="rsu-stat__label">{!! $stat['label'] !!}</span>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
