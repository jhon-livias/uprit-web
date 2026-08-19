@php
    $breadcrumb = \App\Support\SiteNavigation::breadcrumb('servicios-de-salud');

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
        [
            'icon' => 'mdi:shield-check-outline',
            'title' => 'Seguros de salud',
            'subtitle' => 'Información y requisitos',
            'anchor' => route('salud') . '#seguro-de-salud',
        ],
    ];
@endphp

<section class="salud-banner">
    <div class="container salud-banner__container">
        <div class="salud-banner__layout">
            <div class="salud-banner__content">
                <nav class="salud-banner__breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('web.index') }}">Inicio</a>
                    <span class="salud-banner__breadcrumb-sep" aria-hidden="true">&rsaquo;</span>
                    @if(!empty($breadcrumb['parent']))
                        @if(!empty($breadcrumb['parent']['route']))
                        <a href="{{ route($breadcrumb['parent']['route'], $breadcrumb['parent']['params'] ?? []) }}">
                            {{ $breadcrumb['parent']['label'] }}
                        </a>
                        @else
                        <span>{{ $breadcrumb['parent']['label'] }}</span>
                        @endif
                        <span class="salud-banner__breadcrumb-sep" aria-hidden="true">&rsaquo;</span>
                    @endif
                    <span class="salud-banner__breadcrumb-current" aria-current="page">{{ $breadcrumb['title'] }}</span>
                </nav>

                <h1 class="salud-banner__title">Servicios de Salud</h1>
                <p class="salud-banner__lead">
                    Cuidamos de tu bienestar para que alcances tu mejor versión.
                </p>
                <p class="salud-banner__text">
                    {{ config('bienestar.salud.intro') }}
                </p>
                <a href="#nuestros-servicios" class="salud-banner__btn">
                    Conoce más sobre nuestros servicios
                    <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="salud-banner__media">
                <img
                    src="{{ asset('web/imagenes/bienestar/salud/hero.jpg') }}"
                    alt="Atención médica en el Tópico UPRIT"
                    class="salud-banner__photo"
                    loading="eager"
                    decoding="async">
            </div>
        </div>

        <div class="salud-banner__quick-links">
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
