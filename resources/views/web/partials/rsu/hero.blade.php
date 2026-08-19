<section class="rsu-hero">
    <div class="rsu-hero__bg" aria-hidden="true">
        <img
            src="{{ asset('web/imagenes/bienestar/rsu/hero.webp') }}"
            alt=""
            decoding="async">
    </div>

    <div class="container rsu-hero__container">
        <div class="rsu-hero__copy">
            <h1 class="rsu-hero__title">Responsabilidad Social Universitaria</h1>
            <p class="rsu-hero__lead">
                {{ config('bienestar.rsu.encabezado') }}
            </p>
            <a href="#sobre-rsu" class="rsu-btn rsu-btn--solid">
                Conoce más sobre RSU
                <span aria-hidden="true">→</span>
            </a>
        </div>

        <article class="rsu-hero-card">
            <img
                src="{{ asset('web/imagenes/bienestar/rsu/responsable.jpg') }}"
                alt="{{ config('bienestar.rsu.responsable') }}"
                class="rsu-hero-card__photo">
            <p class="rsu-hero-card__label">Responsable de RSU</p>
            <p class="rsu-hero-card__name">{{ config('bienestar.rsu.responsable') }}</p>
            <p class="rsu-hero-card__role">{{ config('bienestar.rsu.cargo') }}</p>
            <p class="rsu-hero-card__role">
                <a href="tel:{{ config('bienestar.rsu.telefono') }}">{{ config('bienestar.rsu.telefono') }}</a>
            </p>
            <a href="{{ route('contactenos') }}" class="rsu-btn rsu-btn--solid rsu-btn--sm">
                Conoce más sobre él
                <iconify-icon icon="mdi:file-document-outline" aria-hidden="true"></iconify-icon>
            </a>
        </article>
    </div>
</section>
