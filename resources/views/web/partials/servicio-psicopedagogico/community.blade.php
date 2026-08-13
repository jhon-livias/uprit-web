@php
    $communityTabs = [
        'alumnos' => [
            'label' => 'Alumnos',
            'items' => [
                ['image' => 'comunidad-1.jpg', 'caption' => 'Nuestros Alumnos'],
                ['image' => 'comunidad-2.jpg', 'caption' => 'Sesiones grupales'],
                ['image' => 'comunidad-3.jpg', 'caption' => 'Acompañamiento académico'],
            ],
        ],
        'docentes' => [
            'label' => 'Docentes',
            'items' => [
                ['image' => 'comunidad-2.jpg', 'caption' => 'Nuestros Docentes'],
                ['image' => 'comunidad-1.jpg', 'caption' => 'Capacitaciones'],
                ['image' => 'comunidad-3.jpg', 'caption' => 'Trabajo colaborativo'],
            ],
        ],
        'tutores' => [
            'label' => 'Tutores',
            'items' => [
                ['image' => 'comunidad-3.jpg', 'caption' => 'Nuestros Tutores y Mentores'],
                ['image' => 'comunidad-2.jpg', 'caption' => 'Orientación personalizada'],
                ['image' => 'comunidad-1.jpg', 'caption' => 'Apoyo continuo'],
            ],
        ],
    ];
@endphp

<section class="psico-community">
    <div class="container">
        <header class="psico-section-heading">
            <h2 class="psico-section-heading__title">Nuestra Comunidad</h2>
        </header>

        <div class="psico-community__tabs" role="tablist" aria-label="Comunidad">
            @foreach($communityTabs as $key => $tab)
            <button
                type="button"
                class="psico-community-tab{{ $loop->first ? ' is-active' : '' }}"
                role="tab"
                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                aria-controls="psico-community-panel-{{ $key }}"
                id="psico-community-tab-{{ $key }}"
                data-psico-tab="{{ $key }}">
                {{ $tab['label'] }}
            </button>
            @endforeach
        </div>

        @foreach($communityTabs as $key => $tab)
        <div
            class="psico-community-panel{{ $loop->first ? ' is-active' : '' }}"
            role="tabpanel"
            id="psico-community-panel-{{ $key }}"
            aria-labelledby="psico-community-tab-{{ $key }}"
            data-psico-panel="{{ $key }}"
            @unless($loop->first) hidden @endunless>
            <div class="psico-community-grid">
                @foreach($tab['items'] as $item)
                <figure class="psico-community-card">
                    <img
                        src="{{ asset('web/imagenes/bienestar/psicopedagogico/' . $item['image']) }}"
                        alt="{{ $item['caption'] }}"
                        class="psico-community-card__photo"
                        loading="lazy"
                        decoding="async">
                    <figcaption class="psico-community-card__caption">{{ $item['caption'] }}</figcaption>
                </figure>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

@push('scripts')
<script>
    document.querySelectorAll('[data-psico-tab]').forEach(function (button) {
        button.addEventListener('click', function () {
            var target = button.getAttribute('data-psico-tab');

            document.querySelectorAll('[data-psico-tab]').forEach(function (tab) {
                tab.classList.toggle('is-active', tab.getAttribute('data-psico-tab') === target);
                tab.setAttribute('aria-selected', tab.getAttribute('data-psico-tab') === target ? 'true' : 'false');
            });

            document.querySelectorAll('[data-psico-panel]').forEach(function (panel) {
                var isActive = panel.getAttribute('data-psico-panel') === target;
                panel.classList.toggle('is-active', isActive);
                panel.hidden = !isActive;
            });
        });
    });
</script>
@endpush
