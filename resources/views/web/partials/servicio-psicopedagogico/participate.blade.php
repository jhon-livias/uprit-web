@php
    $benefits = [
        ['icon' => 'mdi:lightbulb-on-outline', 'label' => 'Desarrollas habilidades de estudio'],
        ['icon' => 'mdi:heart-outline', 'label' => 'Mejoras tu bienestar emocional'],
        ['icon' => 'mdi:briefcase-outline', 'label' => 'Fortaleces tu orientación vocacional'],
        ['icon' => 'mdi:trophy-outline', 'label' => 'Potencias tu rendimiento académico'],
        ['icon' => 'mdi:account-group-outline', 'label' => 'Mejoras tus relaciones interpersonales'],
    ];

    $events = [
        ['date' => '12 MAY', 'title' => 'Taller de técnicas de estudio'],
        ['date' => '19 MAY', 'title' => 'Charla: Manejo del estrés académico'],
        ['date' => '26 MAY', 'title' => 'Orientación vocacional grupal'],
        ['date' => '02 JUN', 'title' => 'Taller de habilidades sociales'],
    ];
@endphp

<section class="psico-participate">
    <div class="container">
        <div class="psico-participate__grid">
            <div class="psico-participate__main">
                <header class="psico-section-heading psico-section-heading--left">
                    <h2 class="psico-section-heading__title">¿Por qué participar?</h2>
                </header>

                <div class="psico-benefits">
                    @foreach($benefits as $benefit)
                    <article class="psico-benefit">
                        <span class="psico-benefit__icon" aria-hidden="true">
                            <iconify-icon icon="{{ $benefit['icon'] }}"></iconify-icon>
                        </span>
                        <p class="psico-benefit__label">{{ $benefit['label'] }}</p>
                    </article>
                    @endforeach
                </div>
            </div>

            <aside class="psico-sidebar">
                <article class="psico-sidebar-card">
                    <header class="psico-sidebar-card__head">
                        <iconify-icon icon="mdi:calendar-month-outline" aria-hidden="true"></iconify-icon>
                        <h3>Calendario de Actividades</h3>
                    </header>
                    <ul class="psico-event-list">
                        @foreach($events as $event)
                        <li class="psico-event-list__item">
                            <span class="psico-event-list__date">{{ $event['date'] }}</span>
                            <span class="psico-event-list__title">{{ $event['title'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('web.noticias') }}" class="psico-sidebar-card__btn">
                        Ver calendario completo
                        <span aria-hidden="true">→</span>
                    </a>
                </article>

                <article class="psico-sidebar-card" id="consejeria">
                    <header class="psico-sidebar-card__head">
                        <iconify-icon icon="mdi:calendar-check-outline" aria-hidden="true"></iconify-icon>
                        <h3>Consejería Abierta</h3>
                    </header>
                    <p class="psico-sidebar-card__text">
                        Atención presencial y virtual para ti.
                    </p>
                    <a href="{{ route('contactenos') }}" class="psico-sidebar-card__btn">
                        Regístrate aquí
                        <span aria-hidden="true">→</span>
                    </a>
                    <a href="https://wa.me/51933248429" class="psico-sidebar-card__whatsapp" target="_blank" rel="noopener">
                        <iconify-icon icon="mdi:whatsapp" aria-hidden="true"></iconify-icon>
                        ¿Dudas? Escríbenos por WhatsApp
                    </a>
                </article>
            </aside>
        </div>
    </div>
</section>
