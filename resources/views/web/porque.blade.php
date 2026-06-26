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
                            UPRIT: Formación para Toda la Vida
                        </h3>

                        <p style="margin-bottom:30px;">
                            En la Universidad Privada de Trujillo, la educación va más allá de un título. Nos comprometemos con tu crecimiento profesional y personal a lo largo de toda tu carrera.
                        </p>
                    </div>

                    <div class="text-block">
                        <h3 class="title">Nuestra Filosofía de Aprendizaje Continuo</h3>
                        <ul>
                            <li>Creemos que la capacidad de aprender y adaptarse es la habilidad más valiosa en el mundo actual. Por eso, nuestra formación se centra en tres pilares clave:</li>
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
                                                        Desarrollo de Habilidades Transversales
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Cultivamos habilidades como el pensamiento crítico, la creatividad y el liderazgo, preparándote para afrontar cualquier desafío profesional y ser un agente de cambio.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Mentalidad de Crecimiento Constante
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Inculcamos la curiosidad intelectual y el deseo de seguir aprendiendo, asegurando que siempre te mantengas relevante en tu campo y nunca te estanques.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Empoderamiento para el Autoaprendizaje
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Te enseñamos a ser autodidacta y a encontrar información confiable, para que puedas dominar nuevas tecnologías o habilidades por tu cuenta.</p>
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
                        <h3 class="title">Cómo Reflejamos Esta Filosofía</h3>
                        <ul>
                            <li>Nuestra oferta académica está diseñada para que te prepares para los desafíos del futuro, tanto en tus estudios de pregrado como en los de posgrado.</li>
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

                                                        Carreras Profesionales de Pregrado

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
                                                                <p> <strong style="color: #000;">Currículo Adaptable:</strong> Actualizamos constantemente nuestros planes de estudio con las últimas tecnologías y demandas del mercado, incluyendo IA y análisis de datos.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p><strong style="color: #000;">Vinculación con el Sector Productivo: </strong>Fomentamos proyectos de investigación aplicada y el contacto con empresas locales para que construyas un portafolio relevante.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p><strong style="color: #000;">Énfasis en Habilidades Digitales:</strong> Todas nuestras carreras incorporan módulos de competencias digitales, desde software especializado hasta ciberseguridad.</p>
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

                                                        Programas de Posgrado y Educación Continua
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
                                                                <p> <strong style="color: #000;">Currículo Adaptable:</strong>Ofrecemos diplomados y bootcamps intensivos para que te especialices en áreas emergentes y de nicho.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p><strong style="color: #000;">Vinculación con el Sector Productivo: </strong>Nuestros posgrados están diseñados con modalidades híbridas o a tiempo parcial para profesionales que ya trabajan.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p><strong style="color: #000;">Énfasis en Habilidades Digitales:</strong> Mantenemos un vínculo constante con nuestra comunidad, ofreciendo webinars y talleres exclusivos para que sigas aprendiendo y conectándote con otros profesionales.</p>
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

                    <div style="display:flex;align-items:center;gap:50px;flex-wrap:wrap;margin-top:50px;">

                        <!-- Texto izquierda -->
                        <div style="flex:1;min-width:350px;">

                            <h2 style="margin-bottom:10px;">
                                Conectando Talento con Oportunidades
                            </h2>


                            <p>
                                Nuestra filosofía no termina en el aula. Te damos las herramientas para que prosperes a lo largo de toda tu carrera.
                            </p>


                        </div>
                        

                        <!-- Video derecha -->
                        <!-- Imagen derecha -->
                        <div style=" flex:1;min-width:350px;">

                            <div style="overflow:hidden;border-radius:15px;">

                                <img
                                    src="{{ asset('web/imagenes/por.jpg') }}"
                                    alt="Mensaje del Director"
                                    style="width:100%;height:auto;display:block;">

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
                                    <li><a href="{{ route('porque') }}">¿Por qué Estudiar en la Uprit?</a></li>
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