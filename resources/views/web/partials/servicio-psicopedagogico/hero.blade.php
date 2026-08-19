<section class="psico-hero">
    <div class="container">
        <div class="psico-hero__grid">
            <div class="psico-hero__media">
                <img
                    src="{{ asset('web/imagenes/bienestar/psicopedagogico/coordinadora.jpg') }}"
                    alt="Lic. María Elena Torres"
                    class="psico-hero__photo"
                    loading="eager"
                    decoding="async">
                <div class="psico-hero__badge">
                    <strong>Lic. María Elena Torres</strong>
                    <span>Coordinadora Responsable</span>
                </div>
            </div>

            <div class="psico-hero__content">
                <h1 class="psico-hero__title">Nuestro Servicio Psicopedagógico</h1>
                <p class="psico-hero__lead">
                    Apoyo integral para tu éxito académico y personal.
                </p>
                <p class="psico-hero__text">
                    Brindamos atención individualizada para fortalecer tus habilidades de aprendizaje, orientación vocacional y bienestar emocional durante tu formación universitaria.
                </p>
                <p class="psico-hero__text">
                    Nuestro equipo te acompaña en el desarrollo de estrategias que potencien tu rendimiento académico y tu crecimiento personal.
                </p>
                <p class="psico-hero__text">
                    Contáctanos en
                    <a href="mailto:{{ config('bienestar.email') }}">{{ config('bienestar.email') }}</a>
                    o por WhatsApp al
                    <a href="{{ config('bienestar.whatsapp_url') }}" target="_blank" rel="noopener">+51 933 248 429</a>.
                </p>
                <a href="#consejeria" class="psico-hero__btn">
                    ¡Solicita tu asesoría ahora!
                    <span aria-hidden="true">&gt;</span>
                </a>
            </div>
        </div>
    </div>
</section>
