@php
    $staff = [
        ['name' => 'Lic. Juan Pérez', 'role' => 'Psicopedagogo'],
        ['name' => 'Lic. Ana García', 'role' => 'Orientadora'],
        ['name' => 'Lic. Carlos Ruiz', 'role' => 'Psicólogo'],
        ['name' => 'Lic. Laura Mendoza', 'role' => 'Psicopedagoga'],
        ['name' => 'Lic. Pedro Sánchez', 'role' => 'Orientador'],
    ];

    $testimonials = [
        [
            'quote' => 'El servicio psicopedagógico me ayudó a organizar mi tiempo de estudio y reducir el estrés durante los exámenes finales.',
            'name' => 'María González',
            'role' => 'Beneficiaria Psicopedagógica',
            'photo' => 'staff-1.jpg',
        ],
        [
            'quote' => 'Gracias a la orientación vocacional pude confirmar que estaba en la carrera correcta y mejorar mi rendimiento académico.',
            'name' => 'Carlos Ramírez',
            'role' => 'Beneficiario Psicopedagógico',
            'photo' => 'staff-2.jpg',
        ],
    ];
@endphp

<section class="psico-team-testimonials">
    <div class="container">
        <div class="psico-team-testimonials__grid">
            <div class="psico-team">
                <header class="psico-section-heading psico-section-heading--left">
                    <h2 class="psico-section-heading__title">Nuestros Psicopedagogos</h2>
                </header>

                <div class="psico-team__list">
                    @foreach($staff as $index => $member)
                    <article class="psico-team-member">
                        <img
                            src="{{ asset('web/imagenes/bienestar/psicopedagogico/staff-' . ($index + 1) . '.jpg') }}"
                            alt="{{ $member['name'] }}"
                            class="psico-team-member__photo"
                            loading="lazy"
                            decoding="async">
                        <h3 class="psico-team-member__name">{{ $member['name'] }}</h3>
                        <p class="psico-team-member__role">{{ $member['role'] }}</p>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="psico-testimonials">
                <header class="psico-section-heading psico-section-heading--left">
                    <h2 class="psico-section-heading__title">Lo que dicen nuestros estudiantes</h2>
                </header>

                <div class="psico-testimonials__slider" data-psico-testimonials>
                    @foreach($testimonials as $index => $testimonial)
                    <blockquote class="psico-testimonial{{ $loop->first ? ' is-active' : '' }}" data-psico-testimonial="{{ $index }}">
                        <img
                            src="{{ asset('web/imagenes/bienestar/psicopedagogico/' . $testimonial['photo']) }}"
                            alt="{{ $testimonial['name'] }}"
                            class="psico-testimonial__photo"
                            loading="lazy"
                            decoding="async">
                        <div class="psico-testimonial__content">
                            <p class="psico-testimonial__quote">“{{ $testimonial['quote'] }}”</p>
                            <footer>
                                <cite class="psico-testimonial__name">{{ $testimonial['name'] }}</cite>
                                <span class="psico-testimonial__role">{{ $testimonial['role'] }}</span>
                            </footer>
                        </div>
                    </blockquote>
                    @endforeach

                    @if(count($testimonials) > 1)
                    <div class="psico-testimonials__nav">
                        <button type="button" class="psico-testimonials__arrow" data-psico-testimonial-prev aria-label="Testimonio anterior">
                            <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
                        </button>
                        <button type="button" class="psico-testimonials__arrow" data-psico-testimonial-next aria-label="Siguiente testimonio">
                            <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var slider = document.querySelector('[data-psico-testimonials]');
        if (!slider) return;

        var items = slider.querySelectorAll('[data-psico-testimonial]');
        if (items.length < 2) return;

        var current = 0;

        function show(index) {
            current = (index + items.length) % items.length;
            items.forEach(function (item, i) {
                item.classList.toggle('is-active', i === current);
            });
        }

        var prev = slider.querySelector('[data-psico-testimonial-prev]');
        var next = slider.querySelector('[data-psico-testimonial-next]');

        if (prev) prev.addEventListener('click', function () { show(current - 1); });
        if (next) next.addEventListener('click', function () { show(current + 1); });
    })();
</script>
@endpush
