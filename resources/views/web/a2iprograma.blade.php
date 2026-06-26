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
                        <h3>
                            Programa A2i: Aceleración hacia la Industria
                        </h3>

                        <p>El puente entre la academia y el éxito profesional global.</p>
                    </div>
                    <div>

                        <img
                            src="{{ asset('web/imagenes/ap.avif') }}"
                            alt="Escuela de Posgrado"
                            style="
            width:100%;
            height:300px;
            display:block;
            border-radius:20px;
            object-fit:cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        ">

                    </div>
                    <br><br>
                    <div class="text-block">
                        <h3>
                            ¿Cómo Funciona el Programa A2i?
                        </h3>

                        <ul>
                            <li>
                                A2i es un programa intensivo de entrenamiento profesional que se ejecuta a lo largo de un semestre académico, integrando formación, inmersión y vinculación con la industria.
                            </li>
                        </ul>
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
                                                        Selección Rigurosa
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Dirigido a estudiantes de posgrado y pregrado de los últimos años. El proceso de selección se basa en expediente académico, habilidades blandas y potencial de liderazgo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Preparación y Formación
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Participa en talleres y seminarios sobre gestión de proyectos, comunicación efectiva y análisis de datos para complementar tu formación técnica.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Inmersión en la Industria
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Trabaja en proyectos reales dentro de compañías líderes, aplicando tus conocimientos para resolver desafíos concretos del negocio.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        Mentoring y Acompañamiento
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Recibe el apoyo de un mentor en la empresa y un tutor de la UPRIT para asegurar un aprendizaje continuo y la aplicación de la metodología A2i.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        Exposición y Networking
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Presenta los resultados de tus proyectos ante directivos de la empresa y la comunidad académica, creando oportunidades invaluables para establecer contactos profesionales.</p>
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
                        <h3 class="title">Servicios y Ventajas para Nuestros Estudiantes</h3>
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

                                                        Certificación Internacional

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Obtén una certificación desarrollada por la UPRIT en convenio con la prestigiosa NC State University de los Estados Unidos.
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

                                                        Experiencia Profesional Relevante
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Participa en proyectos de alto impacto, lo que te permite desarrollar un portafolio profesional sólido antes de graduarte.
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

                                                        Puerta de Entrada Laboral
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Muchos egresados han recibido ofertas de trabajo directamente de las empresas en las que realizaron su inmersión.
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

                                                        Desarrollo de Liderazgo
                                                    </button>

                                                </h2>

                                                <div id="collapseFourSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>El programa te desafía a tomar la iniciativa y resolver problemas creativamente, preparándote para roles de liderazgo.
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

                                                        Aprendizaje Orientado a Resultados
                                                    </button>

                                                </h2>

                                                <div id="collapseFiveSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Aprende a manejar la presión, a trabajar bajo plazos y a entregar resultados tangibles que te diferenciarán como profesional.
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
                        <h3 class="title">Etapas y Componentes del Programa</h3>
                    </div>

                    <div class="tab-content" id="myTabContentLider">

                        <div class="tab-pane fade show active"
                            id="overviewLider"
                            role="tabpanel"
                            aria-labelledby="overview-tab-lider">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleLider"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneLider">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneLider"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneLider">

                                                        Perspectivas de la Industria

                                                    </button>

                                                </h3>

                                                <div id="collapseOneLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Empresas participantes comparten sus experiencias y participan en un diálogo con los estudiantes de A2i sobre aspectos del empleo en la industria, y los estudiantes aprenden sobre las mejores prácticas para el éxito.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoLider">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoLider"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoLider">

                                                        Estrategias de Búsqueda de Empleo

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Una serie de talleres, paneles y presentaciones diseñadas para brindar a los estudiantes las habilidades necesarias para buscar con éxito un puesto en la industria.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingThreeLider">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThreeLider"
                                                        aria-expanded="false"
                                                        aria-controls="collapseThreeLider">

                                                        Visitas a las Empresas
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Un grupo cuidadosamente seleccionado de estudiantes asisten a visitas para explorar posibles oportunidades profesionales con la empresa anfitriona.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFourLider">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFourLider"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFourLider">

                                                        Pasantías Industriales
                                                    </button>

                                                </h2>

                                                <div id="collapseFourLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Pasantías de diferentes duraciones que enseñan a los estudiantes a aplicar sus antecedentes técnicos y creatividad para hacer avanzar proyectos como parte de un equipo interdisciplinario.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingFiveLider">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFiveLider"
                                                        aria-expanded="false"
                                                        aria-controls="collapseFiveLider">

                                                        Experiencia de Inmersión
                                                    </button>

                                                </h2>

                                                <div id="collapseFiveLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Una oportunidad de aprendizaje intensiva que prepara a los estudiantes para el entorno corporativo, con sesiones de networking, proyectos en equipo, y más.</p>
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
                    
                    <div>

                        <img
                            src="{{ asset('web/imagenes/apro1.avif') }}"
                            alt="Escuela de Posgrado"
                            style="
            width:100%;
            height:300px;
            display:block;
            border-radius:20px;
            object-fit:cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        ">

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