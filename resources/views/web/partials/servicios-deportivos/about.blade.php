@php
    $deportes = config('bienestar.deportes');
@endphp

<section class="deportes-about">
    <div class="container">
        <div class="deportes-about__grid">
            <div class="deportes-about__intro">
                <h2 class="deportes-about__title">{{ $deportes['intro_titulo'] }}</h2>
                <p class="deportes-about__text">{{ $deportes['intro'] }}</p>
                <p class="deportes-about__quote">{{ $deportes['cita'] }}</p>
            </div>

            <div class="deportes-about__benefits">
                <h3 class="deportes-about__benefits-title">Beneficios de participar</h3>
                <ul class="deportes-benefits">
                    @foreach($deportes['beneficios'] as $beneficio)
                    <li class="deportes-benefits__item">
                        <span class="deportes-benefits__icon" aria-hidden="true">
                            <iconify-icon icon="{{ $beneficio['icon'] }}"></iconify-icon>
                        </span>
                        <span>{{ $beneficio['text'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
