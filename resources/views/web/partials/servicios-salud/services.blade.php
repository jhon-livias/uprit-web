@php
    $services = [
        [
            'title' => 'Orientación en salud',
            'description' => 'Consejería y educación en temas de salud para tomar decisiones informadas y cuidar tu bienestar.',
            'image' => 'web/imagenes/bienestar/salud/orientacion.webp',
            'icon' => 'mdi:account-heart-outline',
        ],
        [
            'title' => 'Promoción y prevención',
            'description' => 'Charlas, campañas y talleres para prevenir enfermedades y adoptar hábitos saludables.',
            'image' => 'web/imagenes/bienestar/salud/promocion.webp',
            'icon' => 'mdi:heart-pulse',
        ],
        [
            'title' => 'Primeros auxilios',
            'description' => 'Atención inmediata ante accidentes o malestares dentro del campus.',
            'image' => 'web/imagenes/bienestar/salud/primeros-auxilios.webp',
            'icon' => 'mdi:medical-bag',
        ],
    ];
@endphp

<section class="salud-services" id="nuestros-servicios">
    <div class="container">
        <header class="salud-section-header">
            <h2 class="salud-section-header__title">Nuestros servicios</h2>
            <p class="salud-section-header__subtitle">
                Contamos con un equipo profesional comprometido con tu bienestar.
            </p>
        </header>

        <div class="salud-services__grid">
            @foreach($services as $service)
            <article class="salud-service-card">
                <div class="salud-service-card__media">
                    <img
                        src="{{ asset($service['image']) }}"
                        alt="{{ $service['title'] }}"
                        class="salud-service-card__photo"
                        loading="lazy"
                        decoding="async">
                    <span class="salud-service-card__icon" aria-hidden="true">
                        <iconify-icon icon="{{ $service['icon'] }}"></iconify-icon>
                    </span>
                </div>
                <div class="salud-service-card__body">
                    <h3 class="salud-service-card__title">{{ $service['title'] }}</h3>
                    <p class="salud-service-card__description">{{ $service['description'] }}</p>
                    <a href="#contacto" class="salud-service-card__btn">
                        Conocer más
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
