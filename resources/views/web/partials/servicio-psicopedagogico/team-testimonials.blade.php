@php
    $staff = [
        ['name' => 'Lic. María Elena Torres', 'role' => 'Coordinadora Responsable'],
        ['name' => 'Lic. Juan Pérez', 'role' => 'Psicopedagogo'],
        ['name' => 'Prof. Marta Díaz', 'role' => 'Orientadora'],
        ['name' => 'Lic. Luis Ramos', 'role' => 'Terapeuta'],
        ['name' => 'Lic. Carmen Solís', 'role' => 'Especialista'],
    ];

    $testimonials = [
        [
            'quote' => 'El servicio psicopedagógico me ayudó a organizar mi tiempo y a entender mis fortalezas. ¡Ahora me siento más segura en mis estudios!',
            'name' => 'Estefany J.',
            'role' => 'Beneficiaria Psicopedagógica',
            'photo' => 'staff-1.jpg',
        ],
        [
            'quote' => 'Gracias a la orientación vocacional pude confirmar que estaba en la carrera correcta y mejorar mi rendimiento académico.',
            'name' => 'Carlos R.',
            'role' => 'Beneficiario Psicopedagógico',
            'photo' => 'staff-2.jpg',
        ],
        [
            'quote' => 'Las sesiones me dieron herramientas para manejar el estrés de los exámenes y concentrarme mejor en mis clases.',
            'name' => 'Lucía M.',
            'role' => 'Beneficiaria Psicopedagógica',
            'photo' => 'staff-3.jpg',
        ],
    ];
@endphp

<section class="psico-team-testimonials">
    <div class="container">
        <div class="psico-team-testimonials__grid">
            <div class="psico-team">
                <header class="psico-block-heading">
                    <h2>Nuestros Psicopedagogos</h2>
                </header>

                <div class="psico-team__list">
                    @foreach($staff as $index => $member)
                    <article class="psico-team-member">
                        <span class="psico-avatar">
                            <img
                                src="{{ asset('web/imagenes/bienestar/psicopedagogico/staff-' . ($index + 1) . '.jpg') }}"
                                alt="{{ $member['name'] }}"
                                loading="lazy"
                                decoding="async">
                        </span>
                        <p class="psico-team-member__text">
                            {{ $member['name'] }} – {{ $member['role'] }}
                        </p>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="psico-testimonials">
                <header class="psico-block-heading">
                    <h2>Lo que dicen nuestros estudiantes</h2>
                </header>

                <div class="psico-testimonials__wrap" data-psico-testimonials>
                    <button type="button" class="psico-testimonials__arrow" data-psico-testimonial-prev aria-label="Testimonio anterior">
                        <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
                    </button>

                    <div class="psico-testimonials__slider">
                        @foreach($testimonials as $index => $testimonial)
                        <blockquote class="psico-testimonial{{ $loop->first ? ' is-active' : '' }}" data-psico-testimonial="{{ $index }}">
                            <span class="psico-avatar psico-avatar--sm">
                                <img
                                    src="{{ asset('web/imagenes/bienestar/psicopedagogico/' . $testimonial['photo']) }}"
                                    alt="{{ $testimonial['name'] }}"
                                    loading="lazy"
                                    decoding="async">
                            </span>
                            <div class="psico-testimonial__content">
                                <p class="psico-testimonial__quote">“{{ $testimonial['quote'] }}”</p>
                                <footer>
                                    <cite class="psico-testimonial__name">{{ $testimonial['name'] }}</cite>
                                    <span class="psico-testimonial__role">{{ $testimonial['role'] }}</span>
                                </footer>
                            </div>
                        </blockquote>
                        @endforeach
                    </div>

                    <button type="button" class="psico-testimonials__arrow" data-psico-testimonial-next aria-label="Siguiente testimonio">
                        <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
                    </button>
                </div>

                <div class="psico-testimonials__dots" role="tablist" aria-label="Testimonios">
                    @foreach($testimonials as $index => $testimonial)
                    <button
                        type="button"
                        class="psico-testimonials__dot{{ $loop->first ? ' is-active' : '' }}"
                        data-psico-testimonial-dot="{{ $index }}"
                        aria-label="Ver testimonio {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var wrap = document.querySelector('[data-psico-testimonials]');
        if (!wrap) return;

        var items = wrap.querySelectorAll('[data-psico-testimonial]');
        var dots = document.querySelectorAll('[data-psico-testimonial-dot]');
        if (items.length < 2) return;

        var current = 0;

        function show(index) {
            current = (index + items.length) % items.length;
            items.forEach(function (item, i) {
                item.classList.toggle('is-active', i === current);
            });
            dots.forEach(function (dot, i) {
                dot.classList.toggle('is-active', i === current);
            });
        }

        var prev = wrap.querySelector('[data-psico-testimonial-prev]');
        var next = wrap.querySelector('[data-psico-testimonial-next]');

        if (prev) prev.addEventListener('click', function () { show(current - 1); });
        if (next) next.addEventListener('click', function () { show(current + 1); });

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                show(parseInt(dot.getAttribute('data-psico-testimonial-dot'), 10));
            });
        });
    })();
</script>
@endpush
