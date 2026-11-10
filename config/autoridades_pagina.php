<?php

return [
    'intro' => 'Consejo Directivo, rectorado, vicerrectorados y decanatos de la Universidad Privada de Trujillo.',

    'presidente' => [
        'match' => 'Juan Mauricio Noriega',
        'cargo' => 'Presidente de la Asamblea General de Asociados y del Consejo Directivo de la UPRIT',
        'credenciales' => ['MBA', 'Catedrático'],
    ],

    'cargos' => [
        [
            'id' => 'rectorado',
            'tab' => 'Rectores',
            'match' => 'Sibina',
            'cargo' => 'Rector',
            'periodo' => 'En ejercicio',
            'resumen' => 'Responsable de la dirección académica y de la representación institucional de la universidad.',
            'intro' => 'Quien ejerce el rectorado y quienes lo ocuparon antes.',
            'antecesores' => [
                [
                    'nombre' => 'Dr. Carlos Eduardo Vargas León',
                    'periodo' => '2019 — 2023',
                    'resumen' => 'Texto de ejemplo para mostrar la reseña de una gestión. Aquí iría el detalle real del periodo.',
                ],
                [
                    'nombre' => 'Mg. Elena Rosario Paredes Quispe',
                    'periodo' => '2015 — 2019',
                    'resumen' => 'Texto de ejemplo. Se reemplaza con el resumen de la gestión y las fechas confirmadas.',
                ],
            ],
        ],
        [
            'id' => 'vicerrectorado-academico',
            'tab' => 'Vr. Académico',
            'match' => 'Olenka',
            'cargo' => 'Vicerrectora Académica',
            'periodo' => 'En ejercicio',
            'resumen' => 'Conduce la gestión académica, la calidad formativa y el acompañamiento de las facultades.',
            'intro' => 'Vicerrectorado Académico y su historial.',
            'antecesores' => [
                [
                    'nombre' => 'Dra. Lucía Fernanda Campos Ríos',
                    'periodo' => '2020 — 2024',
                    'resumen' => 'Texto de ejemplo sobre la gestión académica de ese periodo.',
                ],
                [
                    'nombre' => 'Dr. Andrés Felipe Quispe Navarro',
                    'periodo' => '2016 — 2020',
                    'resumen' => 'Texto de ejemplo. Sirve para ver cómo se lee un segundo antecesor.',
                ],
            ],
        ],
        [
            'id' => 'vicerrectorado-investigacion',
            'tab' => 'Vr. Investigación',
            'match' => 'Marco Antonio Sevilla',
            'cargo' => 'Vicerrector de Investigación',
            'periodo' => 'En ejercicio',
            'resumen' => 'Impulsa la investigación, la producción científica y la vinculación con el entorno.',
            'intro' => 'Vicerrectorado de Investigación y su historial.',
            'respaldo' => [
                'nombre' => 'Dr. Marco Antonio Sevilla Gamarra',
                'foto' => 'investigacion/marco-sevilla-medalla.png',
            ],
            'antecesores' => [
                [
                    'nombre' => 'Dr. Héctor Manuel Rojas Cerna',
                    'periodo' => '2018 — 2024',
                    'resumen' => 'Texto de ejemplo sobre la gestión de investigación de ese periodo.',
                ],
                [
                    'nombre' => 'Dra. Patricia Elena Ruiz Mondragón',
                    'periodo' => '2014 — 2018',
                    'resumen' => 'Texto de ejemplo. Se reemplaza cuando se confirme el historial del cargo.',
                ],
            ],
        ],
    ],

    'decanatos' => [
        'id' => 'decanatos',
        'tab' => 'Decanatos',
        'intro' => 'Decanos por facultad y una muestra de cómo se verán sus antecesores.',
        'facultades' => [
            [
                'id' => 'derecho',
                'nombre' => 'Derecho y Ciencias Sociales',
                'match' => 'Alexander Máximo',
                'cargo' => 'Decano',
                'periodo' => 'En ejercicio',
                'resumen' => 'Conduce la facultad y representa a su comunidad académica.',
                'antecesores' => [
                    [
                        'nombre' => 'Dr. Ramón Ignacio Salazar Peña',
                        'periodo' => '2018 — 2023',
                        'resumen' => 'Texto de ejemplo del decanato anterior en esta facultad.',
                    ],
                    [
                        'nombre' => 'Mg. Rosa Elvira Chávez Díaz',
                        'periodo' => '2014 — 2018',
                        'resumen' => 'Texto de ejemplo para el segundo periodo del historial.',
                    ],
                ],
            ],
            [
                'id' => 'empresariales',
                'nombre' => 'Ciencias Empresariales',
                'match' => 'Aponte',
                'cargo' => 'Decano',
                'periodo' => 'En ejercicio',
                'resumen' => 'Conduce la facultad y representa a su comunidad académica.',
                'antecesores' => [
                    [
                        'nombre' => 'Dr. Julio César Benites Alfaro',
                        'periodo' => '2017 — 2022',
                        'resumen' => 'Texto de ejemplo del decanato anterior en esta facultad.',
                    ],
                    [
                        'nombre' => 'Dra. Carmen Luisa Otoya Mendoza',
                        'periodo' => '2013 — 2017',
                        'resumen' => 'Texto de ejemplo para el segundo periodo del historial.',
                    ],
                ],
            ],
            [
                'id' => 'ingenieria',
                'nombre' => 'Ingeniería y Arquitectura',
                'match' => 'Acosta',
                'cargo' => 'Decano',
                'periodo' => 'En ejercicio',
                'resumen' => 'Conduce la facultad y representa a su comunidad académica.',
                'antecesores' => [
                    [
                        'nombre' => 'Ing. Fernando Alonso Ruiz Cabrera',
                        'periodo' => '2019 — 2024',
                        'resumen' => 'Texto de ejemplo del decanato anterior en esta facultad.',
                    ],
                    [
                        'nombre' => 'Dra. Isabel Nora Vásquez León',
                        'periodo' => '2015 — 2019',
                        'resumen' => 'Texto de ejemplo para el segundo periodo del historial.',
                    ],
                ],
            ],
        ],
    ],
];
