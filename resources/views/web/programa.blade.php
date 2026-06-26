@extends('web.layouts.principal')
@section('content')
<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner" style="margin-top:40px">
            <div class="page-title">
                <h1 class="title">Servicios</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('futbol')}}">Servicios</a></li>
            </ul>
        </div>
    </div>

</div>
<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block">
                        <h3 class="title">Innovación y Emprendimiento</h3>
                        <ul>
                            <li>Aplicamos herramientas de resolución de problemas y una mentalidad creativa para construir un mundo más justo, cultivando líderes de cambio global.</li>
                        </ul>
                    </div>
                    <div class="text-block">
                        <h3 class="title">VIVE: Visión, Innovación y Valor Emprendedor</h3>
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
                                                        Asesoría Académica Personalizada
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                El Honors College de la UPRIT es tu camino para convertirte no solo en un profesional, sino en un líder y agente de cambio, preparado para dejar una marca en la sociedad y el mundo.
                                                                <br>

                                                                <span style="color: #000; display:block;">

                                                                    <a href="#" style="color:#91001E; font-weight:700;">
                                                                        Más información
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Quiero aprender una mentalidad emprendedora.
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Explora la oferta académica

                                                                <span style="color: #000; display:block;">

                                                                    <a href="#" style="color:#91001E; font-weight:700;">
                                                                        Más información
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Quiero explorar el espíritu emprendedor en el campus.
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Conoce los espacios

                                                                <span style="color: #000; display:block;">

                                                                    <a href="#" style="color:#91001E; font-weight:700;">
                                                                        Más información
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading4">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                        Quiero asistir a un evento de emprendimiento.
                                                    </button>
                                                </h2>
                                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Únase a nosotros en un evento

                                                                <span style="color: #000; display:block;">

                                                                    <a href="#" style="color:#91001E; font-weight:700;">
                                                                        Más información
                                                                    </a>
                                                                </span>
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
                        <h3 class="title">Innovación, Colaboración y Apoyo</h3>
                        <ul>
                            <li>La Dirección de Investigación cultiva un ambiente de excelencia científica y empresarial, conectando a la comunidad universitaria con la industria y las empresas emergentes.</li>
                        </ul>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Centro de Recursos de Patentes y Marcas Registradas</h3>
                        <p>Las bibliotecas de la UPRIT funcionan como un centro oficial para proporcionar acceso gratuito al público a materiales de patentes y marcas registradas. Ofrecemos:</p>
                        <ul>
                            <li>Acceso a la base de datos de patentes y búsquedas mejoradas de palabras clave.</li>
                            <li>Una gran colección de investigación sobre propiedad intelectual.</li>
                        </ul>
                        <p>Las bibliotecas de la UPRIT funcionan como un centro oficial para proporcionar acceso gratuito al público a materiales de patentes y marcas registradas. Ofrecemos:</p>
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

                                                        Lo que PODEMOS hacer

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">
                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Explicar el proceso de solicitud.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Enseñar a hacer una búsqueda de patentes o marcas.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Ayudar a encontrar respuestas sobre estrategia de búsqueda.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Mostrar un directorio de abogados locales licenciados para ejercer ante la USPTO.</p>
                                                            </div>                                                           

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

                                                        Lo que NO PODEMOS hacer

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">
                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Realizar una búsqueda de patente o marca registrada.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Presentar o procesar una solicitud.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Brindar asesoramiento legal sobre su búsqueda o solicitud.</p>
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
                    <div class="text-block text-center">
                        <h3>La Experiencia de la Clínica de Emprendimiento</h3>
                    </div>
                    <div class="tab-content" id="myTabContentExpe">

                        <div class="tab-pane fade show active"
                            id="overviewExpe"
                            role="tabpanel"
                            aria-labelledby="overview-tab-expe">

                            <div class="course-tab-content">

                                <div class="course-overview">

                                    <div class="course-curriculam mb--90">

                                        <div class="accordion edu-accordion edu-accordion-sec"
                                            id="accordionExampleExpe"
                                            data-sal-delay="150"
                                            data-sal="slide-up"
                                            data-sal-duration="800">

                                            <div class="accordion-item">

                                                <h3 class="accordion-header"
                                                    id="headingOneExpe">

                                                    <button class="accordion-button"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOneExpe"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOneExpe">

                                                        Para estudiantes

                                                    </button>

                                                </h3>

                                                <div id="collapseOneExpe"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneExpe"
                                                    data-bs-parent="#accordionExampleExpe">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">
                                                            <p>
                                                             Las clases de la Clínica de Emprendimiento de StartUprit ofrecen la oportunidad de trabajar 
                                                             con emprendedores reales en los problemas que buscan resolver. A través de proyectos de un 
                                                             semestre, desarrollarán y perfeccionarán habilidades clave para el emprendimiento y su carrera profesional.
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="headingTwoExpe">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwoExpe"
                                                        aria-expanded="false"
                                                        aria-controls="collapseTwoExpe">

                                                        Para socios de la empresa

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoExpe"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoExpe"
                                                    data-bs-parent="#accordionExampleExpe">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">
                                                            <p>
                                                                Participar en la Clínica de Emprendimiento es una excelente oportunidad
                                                                 para que las startups y empresas colaboren en sus proyectos. Este programa 
                                                                 es gratuito y les permite obtener un valor añadido de nuestros equipos de estudiantes,
                                                                  mientras contribuyen al desarrollo de la próxima generación de emprendedores.
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
                    <div class="text-block text-center">
                        <h3>Ingeniería de las Últimas Innovaciones</h3>
                        <p>El Programa de Emprendedores de Ingeniería (PEI) de la UPRIT ofrece una experiencia educativa inmersiva y multidisciplinaria.</p>
                        <ul>
                            <li>Aplicamos herramientas de resolución de problemas y una mentalidad creativa para construir un mundo más justo, cultivando líderes de cambio global.</li>
                        </ul>
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
                                    <li><a href="{{ route('soporte') }}">Uprit Data: Soporte Técnico </a></li>
                                    <li><a href="{{ route('salud') }}">Servicios Psicopedagógicos y Salud </a></li>
                                    <li><a href="{{ route('futbol') }}">Espacios y Servicios Deportivos</a></li>
                                    <li><a href="{{ route('talleres') }}">Talleres y Servicios Culturales</a></li>
                                    <li><a href="{{ route('becas') }}">Becas y Ayudas Financieras</a></li>
                                    <li><a href="{{ route('global') }}">Uprit Global/Internacional</a></li>
                                    <li><a href="{{ route('honors') }}">Honors Collage</a></li>
                                    <li><a href="{{ route('alumni') }}">Alumni - Red de Egresados</a></li>
                                    <li><a href="{{ route('programa') }}">Programa VIVE Emprededor</a></li>
                                    <li><a href="#">Uprit Store</a></li>

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