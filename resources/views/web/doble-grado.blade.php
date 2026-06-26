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
                        <h3 style="margin-bottom:20px;font-weight:700;font-size:30px;">
                            Programas de Doble Grado
                        </h3>

                        <p style="margin-bottom:30px;">
                            Obtén una formación integral y versátil que te abrirá más puertas profesionales.
                        </p>

                        <div style="display:flex;justify-content:center;align-items:center;gap:80px;flex-wrap:wrap;margin-top:40px;">

                            <div style="text-align:center;">
                                <img src="{{ asset('web/imagenes/flo.png') }}"
                                    alt="Florida Global University"
                                    style="max-width:280px;width:100%;height:auto;">
                            </div>

                            <div style="text-align:center;">
                                <img src="{{ asset('web/imagenes/usa.png') }}"
                                    alt="Learn in the USA"
                                    style="max-width:280px;width:100%;height:auto;">
                            </div>

                        </div>
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
                                                        Doble Grado 4+1
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Reduce la duración de tu formación profesional al estudiar cursos de maestría durante tu carrera.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Doble Grado 5+1
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Estudia dos carreras profesionales en la UPRIT y obtén ambos títulos en solo seis años.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Bachiller Internacional
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Obtén tu bachiller de la UPRIT y un bachelor's degree de Florida Global University.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        Maestría Internacional
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Complementa tu maestría de la UPRIT con un master degree de Florida Global University.</p>
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
                        <p>
                            Para más información sobre qué programas aplican a estos dobles grados, las condiciones y costos asociados, comunícate con el área de admisión de la Universidad.
                        </p>
                        <p> <a href="" style="color: #91001E;"> admision@uprit.edu.pe</a></p>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Ventajas del Doble Grado de la misma universidad (UPRIT)</h3>
                        <ul>
                            <li>Este modelo te permite obtener dos títulos profesionales en un período de tiempo reducido, optimizando tus recursos y tu tiempo. Sus principales ventajas son:</li>
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

                                                        Perfil Multidisciplinario y Especialización

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Puedes combinar carreras que se complementan entre sí, como Ingeniería de Sistemas e Ingeniería Industrial, o Administración y Marketing. Esto te dota de un perfil profesional mucho más completo y versátil, altamente valorado por las empresas.
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

                                                        Ahorro de Tiempo y Dinero

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Al cursar materias de forma simultánea, reduces los años de estudio, lo que se traduce en un menor costo total de la educación y una salida más rápida al mercado laboral con dos títulos. </p>
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

                                                       Mayor competitividad en el mercado laboral
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Contar con un doble grado puede marcar la diferencia en un proceso de selección, ya que las empresas valoran la polivalencia y la formación integral que ofrece esta opción.
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

                                                        Reducción de la Curva de Adaptación
                                                    </button>

                                                </h2>

                                                <div id="collapseFourSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Al estar en un entorno que ya conoces, evitas los desafíos de adaptarte a una nueva cultura, metodologías de enseñanza y sistemas administrativos, permitiéndote enfocarte 100% en tus estudios.
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
                        <h3 class="title">Ventajas del Doble Grado Internacional (UPRIT y Florida Global University)</h3>
                        <ul>
                            <li> Esta opción es una inversión en tu futuro global. Te ofrece una combinación poderosa de conocimiento local con una visión y acreditación internacional. Sus principales ventajas son:</li>
                        </ul>
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

                                                        Networking Global

                                                    </button>

                                                </h3>

                                                <div id="collapseOneLider"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Estableces una red de contactos con compañeros de clase y profesionales de Estados Unidos y otros países. Esta red puede ser fundamental para futuras oportunidades de empleo, posgrados o emprendimientos.
                                                            </p>
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

                                                        Diferenciación y Prestigio
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Un doble grado con una universidad extranjera te distingue de la mayoría de los profesionales en tu campo. Muestra iniciativa, ambición y una capacidad demostrada para sobresalir.
                                                            </p>
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

                                                        Mayor competitividad en el mercado laboral internacional
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p style="text-align: justify;">Las empresas valoran la polivalencia y la formación integral que ofrece esta opción, haciendo de ti un candidato ideal para empresas transnacionales y puestos de liderazgo.
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
                                    <li><a href="{{ route('convalidacion') }}">Convalidaciones / Traslados</a></li>
                                            <li><a href="{{ route('doble-grado') }}">Programas Doble Grado</a></li>
                                            <li><a href="{{ route('beca18') }}">Beca18</a></li>
                                            <li><a href="{{ route('intercambio-peru') }}">Tu intercambio en Perú</a></li>
                                            <li><a href="{{ route('taller-titulacion') }}">Taller de Titulación</a></li>
                                            <li><a href="">Vive Previamente Nuestras Carreras</a></li>
                                            <li><a href="#">Prospecto de Admisión</a></li>
                                            <li><a href="#">Resultados Admisión</a></li>
                                            <li><a href="{{ route('asesores') }}">Asesores de Admisión</a></li>
                                            <li><a href="#">Registra Amigo Referido</a></li>
                                            <li><a href="#">Prematricúlate</a></li>

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