@php
    $staff = [
        ['name' => 'Lic. Ana Torres', 'role' => 'Docente de Danza'],
        ['name' => 'Mg. Pedro Salas', 'role' => 'Docente de Música'],
        ['name' => 'Prof. Luis Mendoza', 'role' => 'Docente de Vóley'],
        ['name' => 'Prof. Carla Núñez', 'role' => 'Docente de Básquet'],
    ];

    $testimonials = [
        [
            'quote' => 'El taller de danza me ayudó a desconectarme del estrés académico y a conocer a personas increíbles. ¡Es el mejor momento de mi semana!',
            'name' => 'Estefany J.',
            'role' => 'Estudiante de Administración',
            'photo' => 'staff-1.jpg',
        ],
        [
            'quote' => 'Gracias al taller de música pude volver a tocar guitarra y ahora formo parte del ensamble universitario.',
            'name' => 'Carlos R.',
            'role' => 'Estudiante de Ingeniería',
            'photo' => 'staff-2.jpg',
        ],
        [
            'quote' => 'En vóley encontré un equipo, disciplina y mucha energía. Representar a la UPRIT es un orgullo.',
            'name' => 'Lucía M.',
            'role' => 'Estudiante de Derecho',
            'photo' => 'staff-3.jpg',
        ],
    ];
@endphp

<section class="cultura-team-testimonials">
    <div class="container">
        <div class="cultura-team-testimonials__grid">
            <div class="cultura-team">
                <header class="cultura-block-heading">
                    <h2>Nuestros Docentes</h2>
                </header>

                <div class="cultura-team__list">
                    @foreach($staff as $index => $member)
                    <article class="cultura-team-member">
                        <span class="cultura-avatar">
                            <img
                                src="{{ asset('web/imagenes/bienestar/artisticas/staff-' . ($index + 1) . '.jpg') }}"
                                alt="{{ $member['name'] }}"
                                loading="lazy"
                                decoding="async">
                        </span>
                        <p class="cultura-team-member__text">
                            <strong>{{ $member['name'] }}</strong>
                            <span>{{ $member['role'] }}</span>
                        </p>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="cultura-testimonials">
                <header class="cultura-block-heading">
                    <h2>Lo que dicen nuestros estudiantes</h2>
                </header>

                <div class="cultura-testimonials__wrap" data-cultura-testimonials>
                    <button type="button" class="cultura-testimonials__arrow" data-cultura-testimonial-prev aria-label="Testimonio anterior">
                        <iconify-icon icon="mdi:chevron-left" aria-hidden="true"></iconify-icon>
                    </button>

                    <div class="cultura-testimonials__slider">
                        @foreach($testimonials as $index => $testimonial)
                        <blockquote class="cultura-testimonial{{ $loop->first ? ' is-active' : '' }}" data-cultura-testimonial="{{ $index }}">
                            <span class="cultura-avatar cultura-avatar--sm">
                                <img
                                    src="{{ asset('web/imagenes/bienestar/artisticas/' . $testimonial['photo']) }}"
                                    alt="{{ $testimonial['name'] }}"
                                    loading="lazy"
                                    decoding="async">
                            </span>
                            <div class="cultura-testimonial__content">
                                <p class="cultura-testimonial__quote">“{{ $testimonial['quote'] }}”</p>
                                <footer>
                                    <cite class="cultura-testimonial__name">{{ $testimonial['name'] }}</cite>
                                    <span class="cultura-testimonial__role">{{ $testimonial['role'] }}</span>
                                </footer>
                            </div>
                        </blockquote>
                        @endforeach
                    </div>

                    <button type="button" class="cultura-testimonials__arrow" data-cultura-testimonial-next aria-label="Siguiente testimonio">
                        <iconify-icon icon="mdi:chevron-right" aria-hidden="true"></iconify-icon>
                    </button>
                </div>

                <div class="cultura-testimonials__dots" role="tablist" aria-label="Testimonios">
                    @foreach($testimonials as $index => $testimonial)
                    <button
                        type="button"
                        class="cultura-testimonials__dot{{ $loop->first ? ' is-active' : '' }}"
                        data-cultura-testimonial-dot="{{ $index }}"
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
        var wrap = document.querySelector('[data-cultura-testimonials]');
        if (!wrap) return;

        var items = wrap.querySelectorAll('[data-cultura-testimonial]');
        var dots = document.querySelectorAll('[data-cultura-testimonial-dot]');
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

        var prev = wrap.querySelector('[data-cultura-testimonial-prev]');
        var next = wrap.querySelector('[data-cultura-testimonial-next]');

        if (prev) prev.addEventListener('click', function () { show(current - 1); });
        if (next) next.addEventListener('click', function () { show(current + 1); });

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                show(parseInt(dot.getAttribute('data-cultura-testimonial-dot'), 10));
            });
        });
    })();
</script>
@endpush
