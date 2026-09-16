@php
    $team = [
        [
            'name' => 'Lic. Tatiana Aponte Garcis',
            'role' => 'Responsable de Servicios de Salud',
        ],
        [
            'name' => 'Lic. Romelia Ormeño Ordoñez',
            'role' => 'Asistente de Servicios de Salud',
        ],
    ];
@endphp

<section class="salud-team">
    <div class="container">
        <div class="salud-team__inner">
            <div class="salud-team__intro">
                <span class="salud-team__icon" aria-hidden="true">
                    <iconify-icon icon="mdi:account-group-outline"></iconify-icon>
                </span>
                <div>
                    <h2 class="salud-team__title">Equipo de Servicios de Salud</h2>
                    <p class="salud-team__text">
                        Profesionales comprometidos con tu bienestar y el cuidado de nuestra comunidad universitaria.
                    </p>
                </div>
            </div>

            <div class="salud-team__members">
                @foreach($team as $member)
                <article class="salud-team-member salud-team-member--text">
                    <div class="salud-team-member__info">
                        <h3 class="salud-team-member__name">{{ $member['name'] }}</h3>
                        <p class="salud-team-member__role">{{ $member['role'] }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
