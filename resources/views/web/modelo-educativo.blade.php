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
                            Modelo Educativo Innovador
                        </h3>

                        <p style="margin-bottom:30px;">
                            En la Universidad Privada de Trujillo, creemos que aprender es un camino que no termina. Por eso, nuestra propuesta educativa está basada en el principio de formación para toda la vida.
                        </p>
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
                                                        Formación para Toda la Vida en UPRIT
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Acompañamos a nuestros estudiantes desde su ingreso al pregrado, durante su especialización en posgrado, y a lo largo de su desarrollo profesional y personal.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Carreras Profesionales y Posgrados
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p> Carreras profesionales actualizadas, con una sólida base técnica, ética y humanista.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Maestrías y diplomados, orientados a los retos reales del mundo laboral.</p>
                                                            </div>
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

                                                        <div class="lista-programas-custom">

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p> Educación continua, con programas flexibles, virtuales y presenciales.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Actualización permanente, mediante cursos cortos, especializaciones y capacitación para todas las etapas de tu vida profesional.</p>
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

                    <div style="margin-top:40px;">

                        <img
                            src="{{ asset('web/imagenes/mode.png') }}"
                            alt="Escuela de Posgrado"
                            style="
            width:100%;
            height:auto;
            display:block;
            border-radius:20px;
            object-fit:cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        ">

                    </div>
                    <br> <br>

                    <div class="text-block text-center">
                        <h3 style="margin-bottom:20px;font-weight: 700;font-size:30px">
                            Más allá de un Título
                        </h3>

                        <p style="margin-bottom:30px;">
                            En UPRIT, no solo te formas para obtener un título: te formas para transformar tu entorno, liderar con propósito y seguir creciendo siempre.
                        </p>
                    </div>
                    <div class="text-block">
                        <h3>Método L4P (Learning for Practice)</h3>
                        <ul>
                            <li>
                                Nuestra metodología innovadora se basa en cuatro componentes o ejes principales para garantizar una educación orientada a la práctica.
                            </li>
                        </ul>
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

                                                        Docentes con Experiencia Práctica

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Nuestros profesores tienen experiencia relevante en su campo profesional, aportando conocimiento real y aplicable al aula.
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

                                                        Programas de Cooperación Educativa
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Participa en nuestros programas de cooperación educativa que te permiten adquirir valiosa experiencia laboral.
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

                                                        Programa A2i (Aceleración a la Industria)
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Programas diseñados para acelerar tu inmersión y desarrollo en el sector industrial.
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

                                                        Prácticas en Investigación
                                                    </button>

                                                </h2>

                                                <div id="collapseFourSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Integra equipos de investigación con docentes para aplicar la teoría y generar nuevo conocimiento.
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

                                                        Uso del Método del Caso Harvard
                                                    </button>

                                                </h2>

                                                <div id="collapseFiveSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Aprende a resolver problemas complejos a través de estudios de caso reales.
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

                    <div class="text-block">
                        <h3>Programa de Cooperación Educativa</h3>
                        <ul>
                            <li>
                                En la UPRIT, el conocimiento más valioso es el que se aplica en el mundo real. Por eso, hemos adoptado el método de Cooperación Educativa, respaldado por nuestra alianza con WACE. Este enfoque revoluciona tu experiencia universitaria al integrar un semestre completo de trabajo remunerado en tu plan de estudios.
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExperiencia"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <!-- Item 1 -->
                                            <div class="accordion-item">

                                                <h3 class="accordion-header" id="headingExperienciaOne">
                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaOne"
                                                        aria-expanded="true"
                                                        aria-controls="collapseExperienciaOne">

                                                        ¿Cómo Funciona?

                                                    </button>
                                                </h3>

                                                <div id="collapseExperienciaOne"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaOne"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Diseño Curricular Integrado: El quinto semestre está reservado exclusivamente para tu experiencia de trabajo.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Preparación Previa: Recibirás talleres sobre habilidades blandas, currículum y entrevistas de trabajo antes de tu semestre laboral.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Experiencia Laboral Auténtica: Trabajarás en proyectos reales en empresas de la región de La Libertad.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Evaluación Integral: Tu desempeño será evaluado por la empresa y la universidad, y los resultados se integrarán en tu registro académico.</p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- Item 2 -->
                                            <div class="accordion-item">

                                                <h2 class="accordion-header" id="headingExperienciaTwo">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExperienciaTwo"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExperienciaTwo">

                                                        Beneficios Clave

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaTwo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaTwo"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Experiencia Laboral Real: Obtienes 6 meses de experiencia laboral relevante antes de graduarte, lo que te da una ventaja significativa.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Networking Profesional: Estableces contactos valiosos con profesionales de la industria que pueden abrirte puertas.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Claridad Vocacional: La experiencia de trabajo te ayuda a confirmar tu elección de carrera y a tomar decisiones más informadas sobre tu futuro.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Desarrollo de Habilidades Prácticas: Pones a prueba tus conocimientos teóricos y desarrollas habilidades esenciales para el trabajo.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Ingresos y Autonomía: El trabajo es remunerado, dándote la oportunidad de obtener ingresos y mayor independencia financiera.</p>
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
                    <div class="text-block text-center" style="margin-top: -30px;">
                        <p>Contacto: <a href="" style="color: #91001E;"> Cooperación.educativa@uprit.edu.pe</a> </p>
                        <p>El Programa A2i, con similar objetivo, se desarrolla con la asesoría de la Universidad Estatal de Carolina del Norte (NC State University).</p>
                    </div>

                    <div class="text-block">
                        <h3>Método del Caso de Harvard</h3>
                        <ul>
                            <li>
                                En la UPRIT, vamos más allá de la memorización. Hemos incorporado el Método del Caso de Harvard para sumergirte en situaciones reales y desarrollar habilidades críticas para tu futuro profesional.
                            </li>
                        </ul>
                    </div>
                    <div class="accordion edu-accordion edu-accordion-sec"
                        id="accordionInternacional">

                        <!-- Item 1 -->
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingInternacionalOne">
                                <button class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseInternacionalOne"
                                    aria-expanded="true"
                                    aria-controls="collapseInternacionalOne">

                                    ¿Cómo lo Aplicamos?

                                </button>
                            </h3>

                            <div id="collapseInternacionalOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalOne"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">

                                    <div class="lista-programas-custom">

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Análisis Individual: Analizas un caso real, identificas problemas y propones soluciones de forma individual.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Discusión en Grupo: Debates tu análisis con compañeros, simulando el trabajo en equipo de una empresa.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Sesión Plenaria: El docente guía el debate para que construyas la solución, fomentando el pensamiento crítico y la colaboración.</p>
                                        </div>



                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingInternacionalTwo">
                                <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseInternacionalTwo"
                                    aria-expanded="false"
                                    aria-controls="collapseInternacionalTwo">

                                    Programas de Intercambio

                                </button>
                            </h3>

                            <div id="collapseInternacionalTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalTwo"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">

                                    <div class="lista-programas-custom">

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Pensamiento Crítico: Te entrenas para tomar decisiones basadas en evidencia.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Resolución de Problemas: Te enfrentas a problemas complejos sin una única respuesta correcta.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Comunicación y Colaboración: Aprendes a defender tus ideas, a escuchar y a trabajar en equipo.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Teoría y Práctica: Conectas los conceptos teóricos con los desafíos del mundo real.
                                            </p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div style="margin-top:40px;">

                        <div style="
        position:relative;
        padding-bottom:56.25%;
        height:0;
        overflow:hidden;
        border-radius:20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    ">

                            <iframe
                                src="https://www.youtube.com/embed/BWZq195ccPM"
                                title="Video de YouTube"
                                allowfullscreen
                                style="
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
                border:0;
            ">
                            </iframe>

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
                                    <li><a href="{{ route('porque') }}">¿Por qué Estudiar en la Uprit?</a></li>
                                            <li><a href="{{ route('modelo-educativo') }}">Modelo Educativo: Método L4P</a></li>  
                                            <li><a href="{{ route('autoridades') }}">Nuestras autoridades</a></li> 
                                            <li><a href="{{ route('red-nexo') }}">Nuestra Red Nexo Uprit</a></li>
                                            <li><a href="{{ route('a2iprograma') }}">A2i Programa Aceleración hacia la industria</a></li>  
                                            <li><a href="{{ route('defensoria') }}">Defensoría Universitaria</a></li> 
                                            <li><a href="{{ route('medioambiental') }}">Política Medioambiental (S.S.O.M.A)</a></li>

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