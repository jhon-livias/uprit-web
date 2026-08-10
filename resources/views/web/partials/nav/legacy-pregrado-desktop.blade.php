@php
    $pregradoNavGroup = (object) [
        'label' => 'Pregrado',
        'meta' => [
            'tab_regular_label' => 'Pregrado Regular',
            'tab_puede_label' => 'Pregrado Puede',
            'tab_puede_hint' => 'Para personas que trabajan',
        ],
    ];
@endphp
@include('web.partials.nav.pregrado-desktop', ['navGroup' => $pregradoNavGroup])
