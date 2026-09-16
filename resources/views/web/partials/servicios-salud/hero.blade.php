@php
    $breadcrumb = \App\Support\SiteNavigation::breadcrumb('servicios-de-salud');
@endphp

<div class="salud-flyer" id="salud-flyer" hidden>
    <div class="salud-flyer__backdrop" data-salud-flyer-close></div>
    <div class="salud-flyer__dialog" role="dialog" aria-modal="true" aria-labelledby="salud-flyer-title">
        <button type="button" class="salud-flyer__close" data-salud-flyer-close aria-label="Cerrar">
            <iconify-icon icon="mdi:close" aria-hidden="true"></iconify-icon>
            Cerrar
        </button>
        <h2 id="salud-flyer-title" class="visually-hidden">Flyer oficial de Servicios de Salud</h2>
        <img
            src="{{ asset('web/imagenes/bienestar/salud/flyer-oficial.jpg') }}"
            alt="Flyer oficial de Servicios de Salud UPRIT"
            class="salud-flyer__image">
    </div>
</div>

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
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var flyer = document.getElementById('salud-flyer');
        if (!flyer) return;

        function closeFlyer() {
            flyer.hidden = true;
            document.body.classList.remove('salud-flyer-open');
            try {
                if (window.sessionStorage) sessionStorage.setItem('uprit-salud-flyer-seen', '1');
            } catch (err) {}
        }

        flyer.querySelectorAll('[data-salud-flyer-close]').forEach(function (el) {
            el.addEventListener('click', closeFlyer);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeFlyer();
        });

        var storageKey = 'uprit-salud-flyer-seen';
        try {
            if (window.sessionStorage && sessionStorage.getItem(storageKey)) {
                return;
            }
        } catch (err) {}

        flyer.hidden = false;
        document.body.classList.add('salud-flyer-open');
    })();
</script>
@endpush
