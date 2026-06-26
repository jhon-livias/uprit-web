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
                            Programas de Doble Grado
                        </h3>

                        <p style="margin-bottom:30px;">
                            Obtén una formación integral y versátil que te abrirá más puertas profesionales.
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
                                                        Doble Grado 4+1 (Carrera + Maestría en la misma Uprit)
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Reduce la duración de tu formación profesional al estudiar cursos de las maestrías de Posgrado durante tu carrera.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Doble Grado Internacional
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Complementa tu grado de Maestro de la UPRIT con un Master degree de Florida Global University de Miami.</p>
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
                        <p style="margin-bottom:30px;">
                            Para más información sobre qué programas aplican a estos dobles grados, las condiciones y costos asociados, comunícate con el área de admisión de la Universidad.
                        </p>
                        <p style="margin-bottom:30px;">
                            <a href="" style="color: #91001E;">posgrado.admision@uprit.edu.pe</a>
                        </p>
                    </div>

                    <br><br>
                    <div class="text-block">
                        <h3> Ventajas del Doble Grado Internacional (UPRIT y Florida Global University)</h3>    
                        <ul>
                            <li>Esta opción es una inversión en tu futuro global. Te ofrece una combinación poderosa de conocimiento local con una visión y acreditación internacional. Sus principales ventajas son:</li>
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

                                                        Doble Titulación Internacional

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Obtener un grado peruano de la UPRIT y un grado estadounidense de Florida Global University te posiciona como un profesional competitivo en el mercado laboral global, abriendo puertas en Perú, Latinoamérica, EE. UU. y otras regiones.
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

                                                        Exposición y Visión Global
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Te familiarizarás con las tendencias globales y te prepararás para trabajar en entornos internacionales, ya sea en Perú o en el extranjero.
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

                                                        Mejora de Habilidades Interculturales
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Al interactuar con estudiantes y docentes de diferentes orígenes, desarrollas habilidades de comunicación y adaptación cruciales en el mundo globalizado de hoy.
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

                                                        Networking Global
                                                    </button>

                                                </h2>

                                                <div id="collapseFourSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFourSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Estableces una red de contactos con compañeros de clase y profesionales de Estados Unidos y otros países. Esta red puede ser fundamental para futuras oportunidades de empleo, posgrados o emprendimientos.
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

                                                        Diferenciación y Prestigio
                                                    </button>

                                                </h2>

                                                <div id="collapseFiveSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingFiveSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Un doble grado con una universidad extranjera te distingue de la mayoría de los profesionales en tu campo. Muestra iniciativa, ambición y una capacidad demostrada para sobresalir.
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

                                                        Mayor competitividad en el mercado laboral internacional
                                                    </button>

                                                </h2>

                                                <div id="collapseSixSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingSixSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Las empresas valoran la polivalencia y la formación integral que ofrece esta opción, haciendo de ti un candidato ideal para empresas transnacionales y puestos de liderazgo.
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