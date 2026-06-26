@extends('web.layouts.principal')
@section('content')
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner" style="margin-top:40px">
            <div class="page-title">
                <h1 class="title">Más Información</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('convalidacion')}}">Más Información</a></li>
            </ul>
        </div>
    </div>

</div>
<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block text-center">
                        <h3 style="margin-bottom:20px;font-weight: 700;font-size:30px">
                            Transforma tu Futuro Profesional
                        </h3>

                        <p style="margin-bottom:30px;">
                            Nuestros programas de posgrado están diseñados para profesionales que buscan excelencia académica, visión global e innovación.
                        </p>
                    </div>
                    <div style="display:flex;align-items:center;gap:50px;flex-wrap:wrap;margin-top:50px;">

                        <!-- Texto izquierda -->
                        <div style="flex:1;min-width:350px;">

                            <h2 style="margin-bottom:10px;">
                                Mensaje del Director
                            </h2>

                            <h5 style="margin-bottom:25px;">
                                Dr. Edmundo González Zavaleta
                            </h5>

                            <p>
                                Director de la Escuela de Posgrado
                            </p>

                            <p style="text-align: justify;font-size:13px">
                                Bienvenidos a la Escuela de Posgrado de la Universidad Privada de Trujillo, un espacio académico donde la excelencia, la innovación y el compromiso con el desarrollo profesional son nuestros pilares.
                            </p>

                            <p style="text-align: justify;font-size:13px"">
                                Nuestros programas rigurosos y actualizados están diseñados para fortalecer sus competencias y prepararlos para enfrentar los desafíos del entorno global.
                            </p>

                        </div>
                        

                        <!-- Video derecha -->
                        <div style=" flex:1;min-width:350px;">

                            <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:15px;">

                                <iframe
                                    src="https://www.youtube.com/embed/AXGtkzAeQYU?start=70"
                                    title="Mensaje del Director"
                                    allowfullscreen
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;">
                                </iframe>

                            </div>

                        </div>

                    </div>
                    <br><br>
                    <div class="text-block">
                        <h3 class="title">Tenemos para ti...</h3>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">



                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Posdoctorados
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Estancias cortas de actualización y especialización en una línea de investigación.
                                                                Requisito: Tener el grado de Doctor.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Doctorados
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Seis semestres de estudios de alta especialización en investigación, desde 2 años.
                                                                Requisito: Tener el grado de Maestro o Magister.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Maestrías
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Cuarenta y ocho créditos académicos en plazos desde 1 año, de especialización profesional.
                                                                Requisito: Tener el grado de Bachiller.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        Títulos de Segunda Especialidad
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Programas de un año para ampliar conocimientos en un área específica y obtener habilidades prácticas.
                                                                Requisito: Tener un título profesional a nombre de la Nación.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        Diplomados y Cursos de Formación Continua
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Programas especializados de 3 meses a 1 año en áreas como: Derecho, Gestión, Logística, Gerencia de Proyectos, entre otros.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="text-block">
                        <h3 class="title">Nuestros Líderes</h3>
                        <ul>
                            <li>Conoce al equipo directivo que conduce la formación de posgrado de alta calidad en nuestra Universidad.</li>
                        </ul>
                    </div>
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:25px;margin-top:40px;">

                        <!-- CARD 1 -->
                        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:15px;padding:35px 25px;text-align:center;">

                            <div style="width:90px;height:90px;border-radius:50%;background:#f3f4f6;margin:auto;display:flex;align-items:center;justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none" stroke="#6b7280" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3-6 8-6s8 2 8 6" />
                                </svg>
                            </div>

                            <h4 style="margin-top:25px;font-weight:700;color:#111827;">
                                Dr. Edmundo González Zavaleta
                            </h4>

                            <p style="color:#6b7280;margin-top:15px;">
                                Director General de la Escuela de Posgrado
                            </p>


                        </div>

                        <!-- CARD 2 -->
                        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:15px;padding:35px 25px;text-align:center;">

                            <div style="width:90px;height:90px;border-radius:50%;background:#f3f4f6;margin:auto;display:flex;align-items:center;justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none" stroke="#6b7280" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3-6 8-6s8 2 8 6" />
                                </svg>
                            </div>

                            <h4 style="margin-top:25px;font-weight:700;color:#111827;">
                                Dr. Miguel Sibina
                            </h4>

                            <p style="color:#6b7280;margin-top:15px;">
                                Director Académico
                            </p>



                        </div>

                        <!-- CARD 3 -->
                        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:15px;padding:35px 25px;text-align:center;">

                            <div style="width:90px;height:90px;border-radius:50%;background:#f3f4f6;margin:auto;display:flex;align-items:center;justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none" stroke="#6b7280" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3-6 8-6s8 2 8 6" />
                                </svg>
                            </div>

                            <h4 style="margin-top:25px;font-weight:700;color:#111827;">
                                Dr. Roberto Mimbela
                            </h4>

                            <p style="color:#6b7280;margin-top:15px;">
                                Director de Programas de Administración
                            </p>



                        </div>

                        <!-- CARD 4 -->
                        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:15px;padding:35px 25px;text-align:center;">

                            <div style="width:90px;height:90px;border-radius:50%;background:#f3f4f6;margin:auto;display:flex;align-items:center;justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none" stroke="#6b7280" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3-6 8-6s8 2 8 6" />
                                </svg>
                            </div>

                            <h4 style="margin-top:25px;font-weight:700;color:#111827;">
                                Dr. Gustavo Silva
                            </h4>

                            <p style="color:#6b7280;margin-top:15px;">
                                Director de Programas de Derecho
                            </p>



                        </div>

                        <!-- CARD 5 -->
                        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:15px;padding:35px 25px;text-align:center;">

                            <div style="width:90px;height:90px;border-radius:50%;background:#f3f4f6;margin:auto;display:flex;align-items:center;justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none" stroke="#6b7280" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3-6 8-6s8 2 8 6" />
                                </svg>
                            </div>

                            <h4 style="margin-top:25px;font-weight:700;color:#111827;">
                                Mg. Milagros Rivas
                            </h4>

                            <p style="color:#6b7280;margin-top:15px;">
                                Directora de Programas de Educación
                            </p>



                        </div>

                        <!-- CARD 6 -->
                        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:15px;padding:35px 25px;text-align:center;">
                            <div style="width:90px;height:90px;border-radius:50%;background:#f3f4f6;margin:auto;display:flex;align-items:center;justify-content:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none" stroke="#6b7280" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3-6 8-6s8 2 8 6" />
                                </svg>
                            </div>

                            <h4 style="margin-top:25px;font-weight:700;color:#111827;">
                                Mg. Diego Reyes
                            </h4>

                            <p style="color:#6b7280;margin-top:15px;">
                                Director de Programas de Gerencia de Proyectos PMI
                            </p>


                        </div>

                    </div>
                    <br><br>
                    <div class="text-block">
                        <h3> Nuestras Ventajas</h3>               
                    </div>
                    <div class="tab-content" id="myTabContentSeguro">

                        <div class="tab-pane fade show active"
                            id="overviewSeguro"
                            role="tabpanel"
                            aria-labelledby="overview-tab-seguro">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleSeguro"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneSeguro">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneSeguro"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneSeguro">

                                                        Modelo Educativo Centrado en el Aprendizaje Activo

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Aplicamos un modelo que combina teoría y práctica de forma innovadora, empleando casos reales y simulaciones para resolver problemas del contexto social y organizacional.
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoSeguro">

                                                        Formación en Liderazgo Transformacional
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Impulsamos el desarrollo de habilidades directivas y de liderazgo estratégico para que te conviertas en un agente de cambio en tu entorno laboral y comunitario.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeSeguro">

                                                        Currículo Basado en Competencias
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Nuestros planes de estudio están diseñados para desarrollar competencias profesionales y de investigación, alineadas a las demandas del mercado.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFourSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFourSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFourSeguro">

                                                        Docentes Expertos y Vinculados al Sector
                                                    </button>

                                                </h2>

                                                <div id="collapseFourSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Contamos con un equipo docente con sólida formación académica y amplia trayectoria profesional, asegurando un aprendizaje conectado con la realidad laboral.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFiveSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFiveSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFiveSeguro">

                                                        Certificaciones y Experiencias Internacionales
                                                    </button>

                                                </h2>

                                                <div id="collapseFiveSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Accede a certificaciones internacionales y participa en misiones académicas con ponentes de universidades y centros de investigación líderes a nivel global.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingSixSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSixSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSixSeguro">

                                                        Horarios Flexibles para Profesionales
                                                    </button>

                                                </h2>

                                                <div id="collapseSixSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSixSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Diseñamos horarios ejecutivos y flexibles que permiten a los estudiantes continuar con sus actividades laborales y personales sin interrupciones. 
                                                                <br> **A Distancia en Vivo:** Clases síncronas en horarios nocturnos y fines de semana.
                                                                <br> **A Distancia Hyflex:** Clases asíncronas grabadas que se ajustan a tu propio ritmo.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingSevenSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSevenSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseSevenSeguro">

                                                        Innovación Educativa con Tecnología
                                                    </button>

                                                </h2>

                                                <div id="collapseSevenSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSevenSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Integramos tecnologías como BIM, IA, simuladores y plataformas virtuales avanzadas para que domines las herramientas del mercado actual y futuro.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingNineSeguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseNineSeguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapseNineSeguro">

                                                        Programas de Doble Grado Internacional
                                                    </button>

                                                </h2>

                                                <div id="collapseNineSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingNineSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Muchos de nuestros programas te ofrecen la opción de obtener un segundo grado con nuestro partner Florida Global University, con un título válido en los Estados Unidos.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="edu-blog-sidebar textos-derecha">
                    <div class="edu-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categorias</h4>
                            <div class="content">
                                <ul class="category-list lista-vist-sec">
                                    <li><a href="{{ route('escuela-posgrado') }}">UGS Escuela de Posgrado</a></li>
                                                    <li><a href="{{ route('posgrado-doble') }}">Programas Doble Grado</a></li>  
                                                    <li><a href="{{ route('mision-academica') }}">Misiones Académicas Internacionales</a></li>
                                                    <li><a href="{{ route('vive') }}">Vive nuestros Másteres y Doctorados</a></li>
                                                    <li><a href="{{ route('asesores') }}">Asesores de Admisión</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <div class="edu-blog-widget widget-latest-post">
                        <div class="inner">
                            <h4 class="widget-title">Últimas Noticias</h4>
                            <div class="content latest-post-list">
                                @foreach($ultimasnoticias as $ultima)
                                <div class="latest-post">
                                    <div class="thumbnail">
                                        <a href="{{route('web.detallenoticia',$ultima->id)}}">
                                            <img src="{{ asset('noticias_imagenes/' . $ultima->imagen) }}" alt="Blog Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a href="{{route('web.detallenoticia',$ultima->id)}}">{{$ultima->titulo}}</a></h6>
                                        <ul class="blog-meta">
                                            <li><i class="icon-27"></i>{{ ucfirst(\Carbon\Carbon::parse($ultima->fecha)->locale('es')->translatedFormat('d F, Y')) }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection