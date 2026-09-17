@php
    $testimonials = [
        [
            'quote' => 'El servicio psicopedagógico me ayudó a organizar mi tiempo y a entender mis fortalezas. ¡Ahora me siento más segura en mis estudios!',
            'name' => 'Estefany J.',
            'role' => 'Estudiante UPRIT',
            'photo' => 'student-1.jpg',
        ],
        [
            'quote' => 'Gracias a la orientación vocacional pude confirmar que estaba en la carrera correcta y mejorar mi rendimiento académico.',
            'name' => 'Carlos R.',
            'role' => 'Estudiante UPRIT',
            'photo' => 'student-2.jpg',
        ],
        [
            'quote' => 'Las sesiones me dieron herramientas para manejar el estrés de los exámenes y concentrarme mejor en mis clases.',
            'name' => 'Lucía M.',
            'role' => 'Estudiante UPRIT',
            'photo' => 'student-3.jpg',
        ],
    ];
@endphp

<section class="psico-team-testimonials">
    <div class="container">
        <div class="psico-testimonials psico-testimonials--solo">
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
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var wrap = document.querySelector('[data-psico-testimonials]');
        if (!wrap) return;

        var items = wrap.querySelectorAll('[data-psico-testimonial]');
        if (items.length < 2) return;

        var current = 0;

        function show(index) {
            current = (index + items.length) % items.length;
            items.forEach(function (item, i) {
                item.classList.toggle('is-active', i === current);
            });
        }

        var prev = wrap.querySelector('[data-psico-testimonial-prev]');
        var next = wrap.querySelector('[data-psico-testimonial-next]');

        if (prev) prev.addEventListener('click', function () { show(current - 1); });
        if (next) next.addEventListener('click', function () { show(current + 1); });
    })();
</script>
@endpush
