@php
    $quickLinks = [
        [
            'icon' => 'mdi:account-heart-outline',
            'title' => 'Orientación en salud',
            'subtitle' => 'Consejería y educación',
            'anchor' => '#nuestros-servicios',
        ],
        [
            'icon' => 'mdi:heart-pulse',
            'title' => 'Promoción y prevención',
            'subtitle' => 'Charlas, talleres y campañas',
            'anchor' => '#nuestros-servicios',
        ],
        [
            'icon' => 'mdi:medical-bag',
            'title' => 'Primeros auxilios',
            'subtitle' => 'Atención inmediata',
            'anchor' => '#nuestros-servicios',
        ],
        [
            'icon' => 'mdi:calendar-month-outline',
            'title' => 'Agenda informativa',
            'subtitle' => 'Charlas y actividades',
            'anchor' => '#actividades',
        ],
    ];
@endphp

<section class="salud-quick-links">
    <div class="container">
        <div class="salud-quick-links__grid">
            @foreach($quickLinks as $link)
            <a href="{{ $link['anchor'] }}" class="salud-quick-link">
                <span class="salud-quick-link__icon" aria-hidden="true">
                    <iconify-icon icon="{{ $link['icon'] }}"></iconify-icon>
                </span>
                <span class="salud-quick-link__text">
                    <strong>{{ $link['title'] }}</strong>
                    <span>{{ $link['subtitle'] }}</span>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>
