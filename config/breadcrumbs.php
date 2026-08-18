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
                'bienestar-rsu',
                'soporte',
                'salud',
                'servicios-deportivos',
                'actividades-artisticas',
                'servicios-sociales',
                'responsabilidad-social',
                'talleres',
                'becas',
                'honors',
                'global',
                'alumni',
                'programa',
            ],
            'tabs' => [
                'bienestar' => [
                    'label' => 'Bienestar universitario y RSU',
                    'column_title' => 'Bienestar Universitario y RSU',
                    'column_route' => 'bienestar-rsu',
                    'items' => [
                        ['label' => 'Servicio Psicopedagógico', 'route' => 'servicio-psicopedagogico'],
                        ['label' => 'Programa de Alimentación Saludable', 'route' => 'salud'],
                        ['label' => 'Servicios de Salud', 'route' => 'servicios-de-salud'],
                        ['label' => 'Servicios Deportivos y Programas Deportivos de Alta Competencia', 'route' => 'servicios-deportivos'],
                        ['label' => 'Programa de Actividades Artísticas y culturales', 'route' => 'actividades-artisticas'],
                        ['label' => 'Servicios Sociales y Ayudas', 'route' => 'servicios-sociales'],
                        ['label' => 'Responsabilidad social Universitaria', 'route' => 'responsabilidad-social'],
                    ],
                ],
                'otros' => [
                    'label' => 'Otros servicios',
                    'stacked' => true,
                    'routes' => [
                        'soporte',
                        'honors',
                        'alumni',
                        'programa',
                        'global',
                    ],
                ],
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
            'routes' => [],
        ],
        'posgrado' => [
            'routes' => [
                'escuela-posgrado',
                'posgrado-doble',
                'mision-academica',
                'vive',
            ],
        ],
        'innovacion' => [
            'items' => [
                ['route' => 'direccion'],
                ['route' => 'centro_investigacion'],
                ['route' => 'revista_cientifica'],
                ['route' => 'vinculacion_empresas'],
                ['route' => 'repositorio_publicaciones'],
                ['route' => 'denuncias_etica_investigacion'],
                [
                    'label' => 'Reglamentos de Investigación',
                    'url' => 'https://drive.google.com/drive/folders/136MRdt_fKaUNK7kLVfmbnlR863c7Ox8E',
                    'external' => true,
                ],
            ],
        ],
        'contactanos' => [
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
    ],

    /*
    |--------------------------------------------------------------------------
    | Rutas: title (H1 / breadcrumb), menu_label (menú y sidebar), parent
    |--------------------------------------------------------------------------
    */
    'routes' => [
        // Servicios
        'bienestar-rsu' => [
            'title' => 'Bienestar Universitario y RSU',
            'menu_label' => 'Bienestar Universitario y RSU',
            'parent' => ['label' => 'Servicios'],
        ],
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
        'servicios-de-salud' => [
            'title' => 'Servicios de Salud',
            'menu_label' => 'Servicios de Salud',
            'parent' => ['label' => 'RSU', 'route' => 'bienestar-rsu'],
        ],
        'servicio-psicopedagogico' => [
            'title' => 'Servicio Psicopedagógico',
            'menu_label' => 'Servicio Psicopedagógico',
            'parent' => ['label' => 'RSU', 'route' => 'bienestar-rsu'],
        ],
        'servicios-deportivos' => [
            'title' => 'Servicios Deportivos y Programas Deportivos de Alta Competencia',
            'menu_label' => 'Servicios Deportivos y Programas Deportivos de Alta Competencia',
            'parent' => ['label' => 'RSU', 'route' => 'bienestar-rsu'],
        ],
        'actividades-artisticas' => [
            'title' => 'Programa de Actividades Artísticas y Culturales',
            'menu_label' => 'Programa de Actividades Artísticas y culturales',
            'parent' => ['label' => 'RSU', 'route' => 'bienestar-rsu'],
        ],
        'servicios-sociales' => [
            'title' => 'Servicios Sociales y Ayudas',
            'menu_label' => 'Servicios Sociales y Ayudas',
            'parent' => ['label' => 'RSU', 'route' => 'bienestar-rsu'],
        ],
        'responsabilidad-social' => [
            'title' => 'Responsabilidad Social Universitaria',
            'menu_label' => 'Responsabilidad social Universitaria',
            'parent' => ['label' => 'RSU', 'route' => 'bienestar-rsu'],
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

        // Contáctanos — Infórmate Más / Admisión
        'convalidacion' => [
            'title' => 'Convalidación',
            'menu_label' => 'Convalidaciones / Traslados',
            'parent' => ['label' => 'Contáctanos'],
        ],
        'doble-grado' => [
            'title' => 'Programas Doble Grado',
            'menu_label' => 'Programas Doble Grado',
            'parent' => ['label' => 'Contáctanos'],
        ],
        'beca18' => [
            'title' => 'Beca18',
            'menu_label' => 'Beca18',
            'parent' => ['label' => 'Contáctanos'],
        ],
        'intercambio-peru' => [
            'title' => 'Tu intercambio en Perú',
            'menu_label' => 'Tu intercambio en Perú',
            'parent' => ['label' => 'Contáctanos'],
        ],
        'taller-titulacion' => [
            'title' => 'Taller de Titulación',
            'menu_label' => 'Taller de Titulación',
            'parent' => ['label' => 'Contáctanos'],
        ],
        'asesores' => [
            'title' => 'Asesores de Admisión',
            'menu_label' => 'Asesores de Admisión',
            'parent' => ['label' => 'Contáctanos'],
        ],

        // Pregrado — Infórmate Más (legacy keys removed; ver sección contactanos)

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

        // Investigación
        'web.noticias' => [
            'title' => 'Uprit Experts - Blog',
            'menu_label' => 'Uprit Experts - Blog',
            'parent' => ['label' => 'Investigación'],
        ],
        'direccion' => [
            'title' => 'Dirección de Investigación',
            'menu_label' => 'Dirección de Investigación',
            'parent' => ['label' => 'Investigación'],
        ],
        'direccion.docente' => [
            'parent' => ['label' => 'Dirección de Investigación', 'route' => 'direccion'],
        ],
        'centro_investigacion' => [
            'title' => 'Centros de Investigación',
            'menu_label' => 'Centros de Investigación',
            'parent' => ['label' => 'Investigación'],
        ],
        'revista_cientifica' => [
            'title' => 'Revista Científica UPRIT',
            'menu_label' => 'Revista Científica UPRIT',
            'parent' => ['label' => 'Investigación'],
        ],
        'vinculacion_empresas' => [
            'title' => 'Vinculación con empresas',
            'menu_label' => 'Vinculación con empresas',
            'parent' => ['label' => 'Investigación'],
        ],
        'repositorio_publicaciones' => [
            'title' => 'Repositorio de publicaciones',
            'menu_label' => 'Repositorio de publicaciones',
            'parent' => ['label' => 'Investigación'],
        ],
        'denuncias_etica_investigacion' => [
            'title' => 'Denuncias éticas en la investigación',
            'menu_label' => 'Denuncias éticas en la investigación',
            'parent' => ['label' => 'Investigación'],
        ],
        'web.detallenoticia' => [
            'parent' => ['label' => 'Uprit Experts - Blog', 'route' => 'web.noticias'],
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
