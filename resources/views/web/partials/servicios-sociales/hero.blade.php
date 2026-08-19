<section class="sociales-hero">
    <div class="sociales-hero__stage">
        <div class="sociales-hero__visual" aria-hidden="true">
            <img
                src="{{ asset('web/imagenes/bienestar/sociales/hero-art.png') }}"
                alt=""
                class="sociales-hero__photo"
                decoding="async">
        </div>

        <div class="container sociales-hero__container">
            <div class="sociales-hero__copy">
                <h1 class="sociales-hero__title">Servicio Social y Programa de Atención a la Diversidad.</h1>
                <p class="sociales-hero__kicker">{{ config('bienestar.sociales.cargo') }}</p>
                <p class="sociales-hero__lead">
                    Promovemos oportunidades, inclusión y desarrollo integral para una comunidad universitaria diversa y comprometida con la construcción de un futuro mejor.
                </p>
                <div class="sociales-hero__actions">
                    <a href="#proceso" class="sociales-btn sociales-btn--solid">
                        <span class="sociales-btn__icon" aria-hidden="true">
                            <iconify-icon icon="mdi:file-document-outline"></iconify-icon>
                        </span>
                        Solicita tu beca
                    </a>
                    <a href="#diversidad" class="sociales-btn sociales-btn--outline">
                        <span class="sociales-btn__icon" aria-hidden="true">
                            <iconify-icon icon="mdi:school-outline"></iconify-icon>
                        </span>
                        Conoce más sobre diversidad
                    </a>
                </div>
            </div>

            <article class="sociales-hero-card">
                <img
                    src="{{ asset('web/imagenes/bienestar/sociales/responsable.jpg') }}"
                    alt="{{ config('bienestar.sociales.responsable') }}"
                    class="sociales-hero-card__photo">
                <div class="sociales-hero-card__text">
                    <p class="sociales-hero-card__label">Responsable:</p>
                    <p class="sociales-hero-card__name">{{ config('bienestar.sociales.responsable') }}</p>
                    <p class="sociales-hero-card__role">{{ config('bienestar.sociales.cargo') }}</p>
                </div>
                <span class="sociales-hero-card__icon" aria-hidden="true">
                    <iconify-icon icon="mdi:badge-account-horizontal-outline"></iconify-icon>
                </span>
            </article>
        </div>
    </div>
    <div class="sociales-hero__accent"></div>
</section>
