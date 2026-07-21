<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Breadcrumbs por ruta
    | parent.label = sección del menú (sin enlace si no hay route)
    |--------------------------------------------------------------------------
    */
    'routes' => [
        // Servicios
        'soporte' => [
            'title' => 'Recursos y Soporte de UPRIT Data',
            'parent' => ['label' => 'Servicios'],
        ],
        'salud' => [
            'title' => 'Servicios Psicopedagógicos y Salud',
            'parent' => ['label' => 'Servicios'],
        ],
        'futbol' => [
            'title' => 'Espacios y Servicios Deportivos',
            'parent' => ['label' => 'Servicios'],
        ],
        'talleres' => [
            'title' => 'Talleres y Servicios Culturales',
            'parent' => ['label' => 'Servicios'],
        ],
        'becas' => [
            'title' => 'Becas y Ayudas Financieras',
            'parent' => ['label' => 'Servicios'],
        ],
        'honors' => [
            'title' => 'Honors College',
            'parent' => ['label' => 'Servicios'],
        ],
        'global' => [
            'title' => 'Uprit Global/Internacional',
            'parent' => ['label' => 'Servicios'],
        ],
        'alumni' => [
            'title' => 'Alumni - Red de Egresados',
            'parent' => ['label' => 'Servicios'],
        ],
        'programa' => [
            'title' => 'Programa VIVE Emprendedor',
            'parent' => ['label' => 'Servicios'],
        ],

        // Conócenos
        'porque' => [
            'title' => '¿Por qué Estudiar en la Uprit?',
            'parent' => ['label' => 'Conócenos'],
        ],
        'modelo-educativo' => [
            'title' => 'Modelo Educativo: Método L4P',
            'parent' => ['label' => 'Conócenos'],
        ],
        'autoridades' => [
            'title' => 'Nuestras Autoridades',
            'parent' => ['label' => 'Conócenos'],
        ],
        'red-nexo' => [
            'title' => 'Nuestra Red Nexo Uprit',
            'parent' => ['label' => 'Conócenos'],
        ],
        'a2iprograma' => [
            'title' => 'A2i Programa Aceleración hacia la industria',
            'parent' => ['label' => 'Conócenos'],
        ],
        'defensoria' => [
            'title' => 'Defensoría Universitaria',
            'parent' => ['label' => 'Conócenos'],
        ],
        'medioambiental' => [
            'title' => 'Política Medioambiental (S.S.O.M.A)',
            'parent' => ['label' => 'Conócenos'],
        ],

        // Pregrado — Infórmate Más
        'convalidacion' => [
            'title' => 'Convalidación',
            'parent' => ['label' => 'Pregrado'],
        ],
        'doble-grado' => [
            'title' => 'Programas Doble Grado',
            'parent' => ['label' => 'Pregrado'],
        ],
        'beca18' => [
            'title' => 'Beca18',
            'parent' => ['label' => 'Pregrado'],
        ],
        'intercambio-peru' => [
            'title' => 'Tu intercambio en Perú',
            'parent' => ['label' => 'Pregrado'],
        ],
        'taller-titulacion' => [
            'title' => 'Taller de Titulación',
            'parent' => ['label' => 'Pregrado'],
        ],
        'asesores' => [
            'title' => 'Asesores de Admisión',
            'parent' => ['label' => 'Pregrado'],
        ],

        // Posgrado — Infórmate Más
        'escuela-posgrado' => [
            'title' => 'UGS Escuela de Posgrado',
            'parent' => ['label' => 'Posgrado'],
        ],
        'posgrado-doble' => [
            'title' => 'Programas Doble Grado',
            'parent' => ['label' => 'Posgrado'],
        ],
        'mision-academica' => [
            'title' => 'Misiones Académicas Internacionales',
            'parent' => ['label' => 'Posgrado'],
        ],
        'vive' => [
            'title' => 'Vive nuestros Másteres y Doctorados',
            'parent' => ['label' => 'Posgrado'],
        ],

        // Innovación
        'direccion' => [
            'title' => 'Dirección de Investigación',
            'parent' => ['label' => 'Innovación'],
        ],
        'centro_investigacion' => [
            'title' => 'Centro de Investigación',
            'parent' => ['label' => 'Innovación'],
        ],
        'web.noticias' => [
            'title' => 'Noticias',
            'parent' => ['label' => 'Innovación'],
        ],
        'web.detallenoticia' => [
            'parent' => ['label' => 'Noticias', 'route' => 'web.noticias'],
        ],

        // Páginas de primer nivel (sin sección intermedia)
        'transparencia' => [
            'title' => 'Transparencia',
        ],
        'libroreclamaciones' => [
            'title' => 'Libro de Reclamaciones',
        ],
    ],
];
