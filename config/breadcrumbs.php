<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Secciones del menú (sidebar, navegación lateral)
    | items: mezcla de ['route' => '...'] y links manuales ['label','url','external'?]
    |--------------------------------------------------------------------------
    */
    'sections' => [
        'servicios' => [
            'routes' => [
                'soporte',
                'salud',
                'futbol',
                'talleres',
                'becas',
                'honors',
                'global',
                'alumni',
                'programa',
            ],
        ],
        'conocenos' => [
            'routes' => [
                'porque',
                'modelo-educativo',
                'autoridades',
                'red-nexo',
                'a2iprograma',
                'defensoria',
                'medioambiental',
            ],
        ],
        'pregrado' => [
            'items' => [
                ['route' => 'convalidacion'],
                ['route' => 'doble-grado'],
                ['route' => 'beca18'],
                ['route' => 'intercambio-peru'],
                ['route' => 'taller-titulacion'],
                ['label' => 'Vive Previamente Nuestras Carreras', 'url' => ''],
                ['label' => 'Prospecto de Admisión', 'url' => '#'],
                ['label' => 'Resultados Admisión', 'url' => '#'],
                ['route' => 'asesores'],
                ['label' => 'Registra Amigo Referido', 'url' => '#'],
                ['label' => 'Prematricúlate', 'url' => '#'],
            ],
        ],
        'posgrado' => [
            'routes' => [
                'escuela-posgrado',
                'posgrado-doble',
                'mision-academica',
                'vive',
                'asesores',
            ],
        ],
        'innovacion' => [
            'items' => [
                ['route' => 'web.noticias'],
                ['route' => 'direccion'],
                ['route' => 'centro_investigacion'],
                ['label' => 'Servicios para Empresas', 'url' => '#'],
                [
                    'label' => 'Reglamentos de Investigación',
                    'url' => 'https://drive.google.com/drive/folders/136MRdt_fKaUNK7kLVfmbnlR863c7Ox8E',
                    'external' => true,
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Rutas: title (H1 / breadcrumb), menu_label (menú y sidebar), parent
    |--------------------------------------------------------------------------
    */
    'routes' => [
        // Servicios
        'soporte' => [
            'title' => 'Recursos y Soporte de UPRIT Data',
            'menu_label' => 'Uprit Data: Soporte Técnico',
            'parent' => ['label' => 'Servicios'],
        ],
        'salud' => [
            'title' => 'Servicios Psicopedagógicos y Salud',
            'menu_label' => 'Servicios Psicopedagógicos y Salud',
            'parent' => ['label' => 'Servicios'],
        ],
        'futbol' => [
            'title' => 'Espacios y Servicios Deportivos',
            'menu_label' => 'Espacios y Servicios Deportivos',
            'parent' => ['label' => 'Servicios'],
        ],
        'talleres' => [
            'title' => 'Talleres y Servicios Culturales',
            'menu_label' => 'Talleres y Servicios Culturales',
            'parent' => ['label' => 'Servicios'],
        ],
        'becas' => [
            'title' => 'Becas y Ayudas Financieras',
            'menu_label' => 'Becas y Ayudas Financieras',
            'parent' => ['label' => 'Servicios'],
        ],
        'honors' => [
            'title' => 'Honors College',
            'menu_label' => 'Honors College',
            'parent' => ['label' => 'Servicios'],
        ],
        'global' => [
            'title' => 'Uprit Global/Internacional',
            'menu_label' => 'Uprit Global/Internacional',
            'parent' => ['label' => 'Servicios'],
        ],
        'alumni' => [
            'title' => 'Alumni - Red de Egresados',
            'menu_label' => 'Alumni - Red de Egresados',
            'parent' => ['label' => 'Servicios'],
        ],
        'programa' => [
            'title' => 'Programa VIVE Emprendedor',
            'menu_label' => 'Programa VIVE Emprendedor',
            'parent' => ['label' => 'Servicios'],
        ],

        // Conócenos
        'porque' => [
            'title' => '¿Por qué Estudiar en la Uprit?',
            'menu_label' => '¿Por qué Estudiar en la Uprit?',
            'parent' => ['label' => 'Conócenos'],
        ],
        'modelo-educativo' => [
            'title' => 'Modelo Educativo: Método L4P',
            'menu_label' => 'Modelo Educativo: Método L4P',
            'parent' => ['label' => 'Conócenos'],
        ],
        'autoridades' => [
            'title' => 'Nuestras Autoridades',
            'menu_label' => 'Nuestras autoridades',
            'parent' => ['label' => 'Conócenos'],
        ],
        'red-nexo' => [
            'title' => 'Nuestra Red Nexo Uprit',
            'menu_label' => 'Nuestra Red Nexo Uprit',
            'parent' => ['label' => 'Conócenos'],
        ],
        'a2iprograma' => [
            'title' => 'A2i Programa Aceleración hacia la industria',
            'menu_label' => 'A2i Programa Aceleración hacia la industria',
            'parent' => ['label' => 'Conócenos'],
        ],
        'defensoria' => [
            'title' => 'Defensoría Universitaria',
            'menu_label' => 'Defensoría Universitaria',
            'parent' => ['label' => 'Conócenos'],
        ],
        'medioambiental' => [
            'title' => 'Política Medioambiental (S.S.O.M.A)',
            'menu_label' => 'Política Medioambiental (S.S.O.M.A)',
            'parent' => ['label' => 'Conócenos'],
        ],

        // Pregrado — Infórmate Más
        'convalidacion' => [
            'title' => 'Convalidación',
            'menu_label' => 'Convalidaciones / Traslados',
            'parent' => ['label' => 'Pregrado'],
        ],
        'doble-grado' => [
            'title' => 'Programas Doble Grado',
            'menu_label' => 'Programas Doble Grado',
            'parent' => ['label' => 'Pregrado'],
        ],
        'beca18' => [
            'title' => 'Beca18',
            'menu_label' => 'Beca18',
            'parent' => ['label' => 'Pregrado'],
        ],
        'intercambio-peru' => [
            'title' => 'Tu intercambio en Perú',
            'menu_label' => 'Tu intercambio en Perú',
            'parent' => ['label' => 'Pregrado'],
        ],
        'taller-titulacion' => [
            'title' => 'Taller de Titulación',
            'menu_label' => 'Taller de Titulación',
            'parent' => ['label' => 'Pregrado'],
        ],
        'asesores' => [
            'title' => 'Asesores de Admisión',
            'menu_label' => 'Asesores de Admisión',
            'parent' => ['label' => 'Pregrado'],
        ],

        // Posgrado — Infórmate Más
        'escuela-posgrado' => [
            'title' => 'UGS Escuela de Posgrado',
            'menu_label' => 'UGS Escuela de Posgrado',
            'parent' => ['label' => 'Posgrado'],
        ],
        'posgrado-doble' => [
            'title' => 'Programas Doble Grado',
            'menu_label' => 'Programas Doble Grado',
            'parent' => ['label' => 'Posgrado'],
        ],
        'mision-academica' => [
            'title' => 'Misiones Académicas Internacionales',
            'menu_label' => 'Misiones Académicas Internacionales',
            'parent' => ['label' => 'Posgrado'],
        ],
        'vive' => [
            'title' => 'Vive nuestros Másteres y Doctorados',
            'menu_label' => 'Vive nuestros Másteres y Doctorados',
            'parent' => ['label' => 'Posgrado'],
        ],

        // Innovación
        'web.noticias' => [
            'title' => 'Noticias',
            'menu_label' => 'Uprit Experts - Blog',
            'parent' => ['label' => 'Innovación'],
        ],
        'direccion' => [
            'title' => 'Dirección de Investigación',
            'menu_label' => 'Dirección de Investigación',
            'parent' => ['label' => 'Innovación'],
        ],
        'centro_investigacion' => [
            'title' => 'Centro de Investigación',
            'menu_label' => 'Centro de Investigación',
            'parent' => ['label' => 'Innovación'],
        ],
        'web.detallenoticia' => [
            'parent' => ['label' => 'Noticias', 'route' => 'web.noticias'],
        ],

        // Páginas de primer nivel
        'transparencia' => [
            'title' => 'Transparencia',
            'menu_label' => 'Transparencia',
        ],
        'libroreclamaciones' => [
            'title' => 'Libro de Reclamaciones',
            'menu_label' => 'Libro de Reclamaciones',
        ],
        'contactenos' => [
            'title' => 'Contáctenos',
            'menu_label' => 'Contáctenos',
            'url' => '/contactenos',
        ],
    ],
];
