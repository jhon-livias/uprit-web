@php
    $pregradoNavGroup = (object) [
        'label' => 'Pregrado',
        'meta' => [
            'tab_regular_label' => 'Pregrado Regular',
            'tab_puede_label' => 'Pregrado Puede',
            'tab_segunda_label' => 'Segunda Especialidad',
        ],
    ];
@endphp
@include('web.partials.nav.pregrado-mobile', ['navGroup' => $pregradoNavGroup])
