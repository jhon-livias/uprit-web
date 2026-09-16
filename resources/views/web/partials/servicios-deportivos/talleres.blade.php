@php
    $talleres = config('bienestar.deportes.talleres');
    $inscripcionUrl = config('bienestar.google_form_inscripcion');
@endphp

<section class="deportes-talleres" id="talleres">
    <div class="container">
        <header class="deportes-section-heading">
            <h2 class="deportes-section-heading__title">Nuestros Talleres</h2>
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
                </div>
                <div class="deportes-taller-card__body">
                    <h3 class="deportes-taller-card__title">{{ $taller['title'] }}</h3>
                    <ul class="deportes-taller-card__details">
                        @foreach($taller['details'] as $detail)
                        <li>
                            <span class="deportes-taller-card__icon" aria-hidden="true">
                                <iconify-icon icon="{{ $detail['icon'] }}"></iconify-icon>
                            </span>
                            <span>
                                <strong>{{ $detail['label'] }}:</strong>
                                {{ $detail['text'] }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ $inscripcionUrl }}" class="deportes-taller-card__btn" target="_blank" rel="noopener">
                        Inscríbete al taller
                    </a>
                    <a href="{{ config('bienestar.whatsapp_url') }}" class="deportes-taller-card__whatsapp" target="_blank" rel="noopener">
                        WhatsApp Bienestar
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
