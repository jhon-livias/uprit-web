@php
    $talleres = config('bienestar.deportes.talleres');
    $inscripcionUrl = config('bienestar.google_form_inscripcion');
@endphp

<section class="deportes-talleres">
    <div class="container">
        <header class="deportes-talleres__header">
            <p class="deportes-talleres__kicker">Talleres deportivos</p>
            <h2 class="deportes-talleres__title">¡Actívate, aprende y crece!</h2>
            <p class="deportes-talleres__lead">
                Desarrolla tu talento, fortalece tu cuerpo y mente y forma parte de nuestra comunidad.
            </p>
        </header>

        <div class="deportes-talleres__grid">
            @foreach($talleres as $taller)
            <article class="deportes-taller-card">
                <div class="deportes-taller-card__media">
                    <img
                        src="{{ asset($taller['image']) }}"
                        alt="{{ $taller['title'] }}"
                        loading="lazy"
                        decoding="async">
                    <div class="deportes-taller-card__label">
                        <span class="deportes-taller-card__sport-icon" aria-hidden="true">
                            <iconify-icon icon="{{ $taller['icon'] }}"></iconify-icon>
                        </span>
                        <h3>{{ $taller['title'] }}</h3>
                    </div>
                </div>
                <div class="deportes-taller-card__body">
                    <p class="deportes-taller-card__desc">{{ $taller['description'] }}</p>
                    <p class="cultura-taller-card__meta">
                        <strong>Docente:</strong> {{ $taller['teacher'] }}
                    </p>
                    <p class="cultura-taller-card__meta">
                        <strong>Horario:</strong> {{ $taller['schedule'] }}
                    </p>
                    <p class="deportes-taller-card__benefits-title">Beneficios</p>
                    <ul class="deportes-taller-card__benefits">
                        @foreach($taller['benefits'] as $benefit)
                        <li>
                            <span aria-hidden="true">
                                <iconify-icon icon="{{ $benefit['icon'] }}"></iconify-icon>
                            </span>
                            {{ $benefit['text'] }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ $inscripcionUrl }}" class="deportes-taller-card__btn" target="_blank" rel="noopener">
                        Inscríbete aquí
                        <span aria-hidden="true">&gt;</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="deportes-talleres__cta">
            <p class="deportes-talleres__cta-left">
                <iconify-icon icon="mdi:account-group-outline" aria-hidden="true"></iconify-icon>
                <span>¡Tú eliges tu reto, nosotros te acompañamos!</span>
            </p>
            <p class="deportes-talleres__cta-right">
                <iconify-icon icon="mdi:calendar-month-outline" aria-hidden="true"></iconify-icon>
                <span>
                    <strong>Inscripciones abiertas</strong>
                    ¡No te quedes fuera!
                </span>
            </p>
        </div>
    </div>
</section>
