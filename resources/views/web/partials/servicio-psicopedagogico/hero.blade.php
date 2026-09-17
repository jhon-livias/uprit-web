@php
    $psico = config('bienestar.psicopedagogico');
@endphp

<div class="salud-flyer" id="psico-flyer" hidden>
    <div class="salud-flyer__backdrop" data-psico-flyer-close></div>
    <div class="salud-flyer__dialog" role="dialog" aria-modal="true" aria-labelledby="psico-flyer-title">
        <button type="button" class="salud-flyer__close" data-psico-flyer-close aria-label="Cerrar">
            <iconify-icon icon="mdi:close" aria-hidden="true"></iconify-icon>
            Cerrar
        </button>
        <h2 id="psico-flyer-title" class="visually-hidden">Flyer oficial del Servicio Psicopedagógico</h2>
        <img
            src="{{ asset('web/imagenes/bienestar/psicopedagogico/flyer-oficial.jpg') }}"
            alt="Flyer oficial del Servicio Psicopedagógico UPRIT"
            class="salud-flyer__image">
    </div>
</div>

<section class="psico-hero">
    <div class="container">
        <div class="psico-hero__grid">
            <div class="psico-hero__media">
                <img
                    src="{{ asset($psico['foto']) }}"
                    alt="{{ $psico['responsable'] }}"
                    class="psico-hero__photo"
                    loading="eager"
                    decoding="async">
                <div class="psico-hero__badge">
                    <strong>{{ $psico['responsable'] }}</strong>
                    <span>{{ $psico['cargo'] }}</span>
                </div>
            </div>

            <div class="psico-hero__content">
                <h1 class="psico-hero__title">Nuestro Servicio Psicopedagógico</h1>
                <p class="psico-hero__text">
                    En la UPRIT, entendemos que el éxito académico va de la mano con tu bienestar personal. Nuestro Servicio Psicopedagógico es un espacio seguro, cercano y confidencial diseñado para brindarte el apoyo integral que necesitas durante tu vida universitaria.
                </p>
                <p class="psico-hero__text">
                    Te acompañamos de forma personalizada para potenciar tus habilidades de aprendizaje, gestionar de manera saludable el estrés académico y fortalecer tus proyectos profesionales y personales.
                </p>
                <p class="psico-hero__text">
                    Para citas y consultas escríbenos a
                    <a href="mailto:{{ $psico['email'] }}">{{ $psico['email'] }}</a>.
                </p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var flyer = document.getElementById('psico-flyer');
        if (!flyer) return;

        function closeFlyer() {
            flyer.hidden = true;
            document.body.classList.remove('salud-flyer-open');
            try {
                if (window.sessionStorage) sessionStorage.setItem('uprit-psico-flyer-seen', '1');
            } catch (err) {}
        }

        flyer.querySelectorAll('[data-psico-flyer-close]').forEach(function (el) {
            el.addEventListener('click', closeFlyer);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeFlyer();
        });

        try {
            if (window.sessionStorage && sessionStorage.getItem('uprit-psico-flyer-seen')) {
                return;
            }
        } catch (err) {}

        flyer.hidden = false;
        document.body.classList.add('salud-flyer-open');
    })();
</script>
@endpush
