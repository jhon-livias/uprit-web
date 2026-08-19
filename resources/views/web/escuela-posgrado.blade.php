@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

@php
    $programas = [
        [
            'id' => 'posgrado-posdoc',
            'titulo' => 'Posdoctorados',
            'abierto' => true,
            'texto' => 'Estancias cortas de actualización y especialización en una línea de investigación. Requisito: Tener el grado de Doctor.',
        ],
        [
            'id' => 'posgrado-doctorados',
            'titulo' => 'Doctorados',
            'abierto' => false,
            'texto' => 'Seis semestres de estudios de alta especialización en investigación, desde 2 años. Requisito: Tener el grado de Maestro o Magister.',
        ],
        [
            'id' => 'posgrado-maestrias',
            'titulo' => 'Maestrías',
            'abierto' => false,
            'texto' => 'Cuarenta y ocho créditos académicos en plazos desde 1 año, de especialización profesional. Requisito: Tener el grado de Bachiller.',
        ],
        [
            'id' => 'posgrado-diplomados',
            'titulo' => 'Diplomados y Cursos de Formación Continua',
            'abierto' => false,
            'texto' => 'Programas especializados de 3 meses a 1 año en áreas como: Derecho, Gestión, Logística, Gerencia de Proyectos, entre otros.',
        ],
    ];

    $ventajas = [
        ['id' => 'ventaja-modelo', 'titulo' => 'Modelo Educativo Centrado en el Aprendizaje Activo', 'abierto' => true, 'texto' => 'Aplicamos un modelo que combina teoría y práctica de forma innovadora, empleando casos reales y simulaciones para resolver problemas del contexto social y organizacional.'],
        ['id' => 'ventaja-liderazgo', 'titulo' => 'Formación en Liderazgo Transformacional', 'abierto' => false, 'texto' => 'Impulsamos el desarrollo de habilidades directivas y de liderazgo estratégico para que te conviertas en un agente de cambio en tu entorno laboral y comunitario.'],
        ['id' => 'ventaja-curriculo', 'titulo' => 'Currículo Basado en Competencias', 'abierto' => false, 'texto' => 'Nuestros planes de estudio están diseñados para desarrollar competencias profesionales y de investigación, alineadas a las demandas del mercado.'],
        ['id' => 'ventaja-docentes', 'titulo' => 'Docentes Expertos y Vinculados al Sector', 'abierto' => false, 'texto' => 'Contamos con un equipo docente con sólida formación académica y amplia trayectoria profesional, asegurando un aprendizaje conectado con la realidad laboral.'],
        ['id' => 'ventaja-certificaciones', 'titulo' => 'Certificaciones y Experiencias Internacionales', 'abierto' => false, 'texto' => 'Accede a certificaciones internacionales y participa en misiones académicas con ponentes de universidades y centros de investigación líderes a nivel global.'],
        ['id' => 'ventaja-horarios', 'titulo' => 'Horarios Flexibles para Profesionales', 'abierto' => false, 'texto' => 'Diseñamos horarios ejecutivos y flexibles que permiten a los estudiantes continuar con sus actividades laborales y personales sin interrupciones.', 'lista' => ['A Distancia en Vivo: Clases síncronas en horarios nocturnos y fines de semana.', 'A Distancia Hyflex: Clases asíncronas grabadas que se ajustan a tu propio ritmo.']],
        ['id' => 'ventaja-tecnologia', 'titulo' => 'Innovación Educativa con Tecnología', 'abierto' => false, 'texto' => 'Integramos tecnologías como BIM, IA, simuladores y plataformas virtuales avanzadas para que domines las herramientas del mercado actual y futuro.'],
        ['id' => 'ventaja-doble-grado', 'titulo' => 'Programas de Doble Grado Internacional', 'abierto' => false, 'texto' => 'Muchos de nuestros programas te ofrecen la opción de obtener un segundo grado con nuestro partner Florida Global University, con un título válido en los Estados Unidos.'],
    ];

    $lideres = [
        ['nombre' => 'Dr. Edmundo González Zavaleta', 'cargo' => 'Director General de la Escuela de Posgrado'],
        ['nombre' => 'Mtra. Milagros Rivas Mendoza', 'cargo' => 'Director Académico'],
        ['nombre' => 'Dr. Roberto Mimbela', 'cargo' => 'Director de Programas de Administración'],
        ['nombre' => 'Dr. Gustavo Silva', 'cargo' => 'Director de Programas de Derecho'],
        ['nombre' => 'Dr. Miguel Sibina', 'cargo' => 'Director de Programas de Educación'],
        ['nombre' => 'Mg. Diego Reyes', 'cargo' => 'Director de Programas de Gerencia de Proyectos PMI'],
    ];
@endphp

<section class="privacy-policy-area escuela-posgrado-page">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <header class="escuela-posgrado-page__header text-center">
                        <span class="escuela-posgrado-page__eyebrow">Escuela de Posgrado</span>
                        <h2 class="escuela-posgrado-page__title">Transforma tu futuro profesional</h2>
                        <p class="escuela-posgrado-page__lead">
                            Nuestros programas de posgrado están diseñados para profesionales que buscan excelencia académica, visión global e innovación.
                        </p>
                    </header>

                    <section class="escuela-posgrado-director" aria-labelledby="director-heading">
                        <div class="escuela-posgrado-director__content">
                            <span class="escuela-posgrado-page__section-label">Mensaje institucional</span>
                            <h3 id="director-heading" class="escuela-posgrado-page__section-title">Mensaje del Director</h3>
                            <p class="escuela-posgrado-director__nombre">Dr. Edmundo González Zavaleta</p>
                            <p class="escuela-posgrado-director__cargo">Director de la Escuela de Posgrado</p>
                            <p>Bienvenidos a la Escuela de Posgrado de la Universidad Privada de Trujillo, un espacio académico donde la excelencia, la innovación y el compromiso con el desarrollo profesional son nuestros pilares.</p>
                            <p>Nuestros programas rigurosos y actualizados están diseñados para fortalecer sus competencias y prepararlos para enfrentar los desafíos del entorno global.</p>
                        </div>
                        <div class="escuela-posgrado-director__video">
                            <div class="escuela-posgrado-video">
                                <iframe
                                    src="https://www.youtube.com/embed/AXGtkzAeQYU?start=70"
                                    title="Mensaje del Director de la Escuela de Posgrado"
                                    allowfullscreen
                                    loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </section>

                    <section class="escuela-posgrado-section" aria-labelledby="programas-heading">
                        <span class="escuela-posgrado-page__section-label">Oferta académica</span>
                        <h3 id="programas-heading" class="escuela-posgrado-page__section-title">Tenemos para ti...</h3>
                        <div class="accordion edu-accordion edu-accordion-sec escuela-posgrado-accordion" id="accordionProgramas">
                            @foreach ($programas as $programa)
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="heading-{{ $programa['id'] }}">
                                    <button class="accordion-button {{ $programa['abierto'] ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $programa['id'] }}" aria-expanded="{{ $programa['abierto'] ? 'true' : 'false' }}" aria-controls="collapse-{{ $programa['id'] }}">
                                        {{ $programa['titulo'] }}
                                    </button>
                                </h4>
                                <div id="collapse-{{ $programa['id'] }}" class="accordion-collapse collapse {{ $programa['abierto'] ? 'show' : '' }}" aria-labelledby="heading-{{ $programa['id'] }}" data-bs-parent="#accordionProgramas">
                                    <div class="accordion-body">
                                        <p>{{ $programa['texto'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="escuela-posgrado-section" aria-labelledby="lideres-heading">
                        <span class="escuela-posgrado-page__section-label">Equipo directivo</span>
                        <h3 id="lideres-heading" class="escuela-posgrado-page__section-title">Nuestros líderes</h3>
                        <p class="escuela-posgrado-page__section-intro">Conoce al equipo directivo que conduce la formación de posgrado de alta calidad en nuestra Universidad.</p>
                        <div class="escuela-posgrado-lideres">
                            @foreach ($lideres as $lider)
                            <article class="escuela-posgrado-lider-card">
                                <span class="escuela-posgrado-lider-card__avatar" aria-hidden="true">
                                    <iconify-icon icon="mdi:account-tie-outline"></iconify-icon>
                                </span>
                                <h4 class="escuela-posgrado-lider-card__nombre">{{ $lider['nombre'] }}</h4>
                                <p class="escuela-posgrado-lider-card__cargo">{{ $lider['cargo'] }}</p>
                            </article>
                            @endforeach
                        </div>
                    </section>

                    <section class="escuela-posgrado-section" aria-labelledby="ventajas-heading">
                        <span class="escuela-posgrado-page__section-label">Propuesta de valor</span>
                        <h3 id="ventajas-heading" class="escuela-posgrado-page__section-title">Nuestras ventajas</h3>
                        <div class="accordion edu-accordion edu-accordion-sec escuela-posgrado-accordion" id="accordionVentajas">
                            @foreach ($ventajas as $ventaja)
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="heading-{{ $ventaja['id'] }}">
                                    <button class="accordion-button {{ $ventaja['abierto'] ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $ventaja['id'] }}" aria-expanded="{{ $ventaja['abierto'] ? 'true' : 'false' }}" aria-controls="collapse-{{ $ventaja['id'] }}">
                                        {{ $ventaja['titulo'] }}
                                    </button>
                                </h4>
                                <div id="collapse-{{ $ventaja['id'] }}" class="accordion-collapse collapse {{ $ventaja['abierto'] ? 'show' : '' }}" aria-labelledby="heading-{{ $ventaja['id'] }}" data-bs-parent="#accordionVentajas">
                                    <div class="accordion-body">
                                        <p>{{ $ventaja['texto'] }}</p>
                                        @if (!empty($ventaja['lista']))
                                        <ul class="escuela-posgrado-accordion__list">
                                            @foreach ($ventaja['lista'] as $item)
                                            <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="edu-blog-sidebar textos-derecha">
                    <div class="edu-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categorias</h4>
                            <div class="content">
                                @include('web.partials.section-nav')
                            </div>
                        </div>
                    </div>
                    {{-- Últimas noticias oculto temporalmente --}}
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection
