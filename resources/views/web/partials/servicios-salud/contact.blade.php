@php
    $contactItems = [
        [
            'icon' => 'mdi:clock-outline',
            'title' => 'Horario de atención',
            'lines' => [
                'Lunes a viernes 8:00 a.m. – 9:00 p.m.',
                'Sábados 9:00 a.m. – 1:00 p.m.',
                '*Horario sujeto a cambios.',
            ],
        ],
        [
            'icon' => 'mdi:map-marker-outline',
            'title' => '¿Dónde estamos?',
            'lines' => [
                'Tópico UPRIT, Campus Universitario,',
                'Av. América Sur 3145, Trujillo – Perú.',
            ],
        ],
        [
            'icon' => 'mdi:email-outline',
            'title' => 'Contáctanos',
            'lines' => [
                'bienestarinstitucional@uprit.edu.pe',
            ],
            'email' => 'bienestarinstitucional@uprit.edu.pe',
        ],
    ];
@endphp

<section class="salud-contact" id="contacto">
    <div class="container">
        <div class="salud-contact__grid">
            @foreach($contactItems as $item)
            <article class="salud-contact-item">
                <span class="salud-contact-item__icon" aria-hidden="true">
                    <iconify-icon icon="{{ $item['icon'] }}"></iconify-icon>
                </span>
                <div>
                    <h3 class="salud-contact-item__title">{{ $item['title'] }}</h3>
                    @foreach($item['lines'] as $line)
                    <p class="salud-contact-item__line">
                        @if(!empty($item['email']) && $line === $item['email'])
                        <a href="mailto:{{ $item['email'] }}">{{ $line }}</a>
                        @else
                        {{ $line }}
                        @endif
                    </p>
                    @endforeach
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
