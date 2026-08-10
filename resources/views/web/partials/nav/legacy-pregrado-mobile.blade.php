@php
    $pregradoNavGroup = (object) [
        'label' => 'Pregrado',
        'meta' => [
            'tab_regular_label' => 'Pregrado Regular',
            'tab_puede_label' => 'Pregrado Puede',
        ],
    ];
@endphp
@include('web.partials.nav.pregrado-mobile', ['navGroup' => $pregradoNavGroup])
