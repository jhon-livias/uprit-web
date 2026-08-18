@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block text-center">
                        <h3 class="title">{{ config('centro_investigacion.hero.titulo') }}</h3>
                        <p>{{ config('centro_investigacion.hero.descripcion') }}</p>
                    </div>
                    @include('web.partials.centro-investigacion.principios-accordion')
                    <div class="text-block text-center">
                        <h3 class="title">Centros e Institutos de Investigación</h3>
                        <p>Nuestros centros realizan investigación, capacitación, consultoría y brindan servicios especializados a empresas, gobiernos y organizaciones.</p>
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

                                                        IMIRS

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                               Instituto de Investigaciones Minera y Responsabilidad Social <br>
                                                               <a href="{{ route('asesores') }}">Más Información</a>
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

                                                        IIVI

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Instituto de Investigación de Infraestructura y Vivienda <br>
                                                                <a href="{{ route('asesores') }}">Más Información</a>
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

                                                        Lex Global Center
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Instituto de Investigaciones Asuntos Legales y Judiciales Globales <br>
                                                                <a href="{{ route('asesores') }}">Más Información</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading4Seguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse4Seguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapse4Seguro">

                                                        Experienc-IA
                                                    </button>

                                                </h2>

                                                <div id="collapse4Seguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading4Seguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Ecosistema de difusión de la inteligencia artificial. <br>
                                                                <a href="{{ route('asesores') }}">Más Información</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading5Seguro">

                                                    <button class="accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseT5Seguro"
                                                        aria-expanded="false"
                                                        aria-controls="collapse5Seguro">

                                                        StarUprit
                                                    </button>

                                                </h2>

                                                <div id="collapse5Seguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading5Seguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                               Incubación e Innovation Factory. <br>
                                                                <a href="{{ route('asesores') }}">Más Información</a>
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
                        <h3 class="title">Laboratorios de Investigación</h3>
                        <p>Nuestros laboratorios de enseñanza e investigación brindan servicios a empresas. Puedes rentar espacio y equipos, o solicitar estudios y ensayos específicos.</p>
                        <a href="mailto:Laboratorios.ingenieria@uprit.edu.pe">Laboratorios.ingenieria@uprit.edu.pe</a>
                    </div>
                    
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