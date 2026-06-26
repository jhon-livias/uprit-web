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
                        <h3 class="title">Comunidad de Egresados</h3>
                        <ul>
                            <li>La Universidad Privada de Trujillo mantiene una conexión sólida con sus egresados a través de la Asociación de Graduados y diversos programas de desarrollo profesional.</li>
                        </ul>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Asociación de Graduados (AGU)</h3>
                        <ul>
                            <li>La AGU está abierta a todos los egresados y sirve como un puente vital entre la vida universitaria y el mundo profesional.</li>
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
                                                        Eventos y Tradiciones
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Participa y apoya eventos clave del campus como la Semana de Ingeniería, la Semana de Derecho y la Celebración por el Aniversario Institucional.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Asesoramiento Profesional
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Conéctate con un grupo de exalumnos que ofrecen asesoramiento académico y profesional para guiar tu carrera.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Voluntariado y Networking
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Mantente conectado a través de comunidades de voluntarios y eventos de networking regionales.</p>
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
                        <h3 class="title">Desarrollo Profesional y Formación Continua</h3>
                        <ul>
                            <li>La UPRIT ofrece una variedad de recursos para mantener actualizadas las habilidades de sus egresados y potenciar sus carreras.</li>
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

                                                        Formación Académica

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Accede a **Webinars Temáticos** y **Cursos MOOC** (gratuitos), así como a **Cursos de Especialización**, **Maestrías**, **Doctorados** y **Postdoctorados** con descuentos especiales para exalumnos.
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

                                                        StartUPRIT

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Centro de emprendimiento y aceleración de la innovación, diseñado para ayudar a los egresados a lanzar y escalar sus proyectos.

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

                                                        Programas de Empleabilidad
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Certificado de Docencia Avanzada</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Estrategias de Búsqueda de Empleo</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Redacción de Curriculum Vitae y LinkedIn Avanzado</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Desarrollo de Liderazgo</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Talleres de Redacción Técnica y Legal</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Semana de Inmersión de Aceleración a la Industria (A2i)</p>
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

                        <h3 style="margin-bottom:20px;">
                            ¡Únete al Honors College!
                        </h3>

                        <p style="margin-bottom:30px;">
                            El Honors College de la UPRIT es tu camino para convertirte no solo en un profesional, sino en un líder y agente de cambio, preparado para dejar una marca en la sociedad y el mundo.
                        </p>

                        <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">

                            <!-- Botón WhatsApp -->
                            <a href="mailto:honor.college@uprit.edu.pe"
                                style="
                background:#91001E;
                color:#fff;
                padding:16px 32px;
                border-radius:50px;
                text-decoration:none;
                font-weight:600;
                display:inline-flex;
                align-items:center;
                gap:10px;
            ">
                                <i class="fab fa-whatsapp"></i>
                                honor.college@uprit.edu.pe
                            </a>

                            <!-- Botón flecha -->
                            <a href="#"
                                style="
                border:1px solid #91001E;
                color:#91001E;
                padding:16px 32px;
                border-radius:50px;
                text-decoration:none;
                font-weight:600;
                display:inline-flex;
                align-items:center;
                gap:10px;
            ">
                                <i class="feather icon-arrow-up-right"></i>
                                Más información
                            </a>

                        </div>

                    </div>
                    <div class="text-block">
                        <h3 class="title">Líder de Generación</h3>
                        <ul>
                            <li>En 2015 se creó el programa Líder de Generación (LDG), con el objetivo de identificar egresados de cada generación que sean voceros entre sus compañeros y amigos Alumnos Uprit, que les comuniquen las últimas noticias de la UPRIT y los inviten a participar en los eventos que organiza su campus.</li>
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

                                                        ¿Qué es un líder de generación?

                                                    </button>

                                                </h3>

                                                <div id="collapseOneLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">


                                                        <div class="lista-programas-custom">
                                                            <p>
                                                                Es esa persona de la generación que es optimista y entusiasta al que se le reconoce fácilmente como líder
                                                                del grupo y que motiva a mantener y fortalecer los lazos entre la generación y su "alma mater". <br> <br>
                                                                Puedes identificar fácilmente a tu líder de generación contestando las siguientes preguntas:
                                                            </p>
                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>¿Quién organiza nuestras reuniones de compañeros de Alumni UPRIT?</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>¿Quién administra el grupo de WhatsApp o redes sociales?</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>¿A quién buscamos para organizar una reunión?</p>
                                                            </div>

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

                                                        ¿Por qué ser un líder de generación?

                                                    </button>

                                                </h2>

                                                <div id="collapseTwoLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>El LDG pertenece a una comunidad de líderes UPRIT que la Institución reconoce a nivel global.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>El líder es portavoz del espíritu y orgullo del ALumni UPRIT de Monterrey.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>El líder funge como un vínculo que fortalece para toda la vida la unión de un grupo de compañeros <br> y amigos, pues inspira confianza y transmite entusiasmo.
                                                                </p>
                                                            </div>

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

                                                        ¿Quién puede ser un líder de generación?
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeLider"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeLider"
                                                    data-bs-parent="#accordionExampleLider">

                                                    <div class="accordion-body">

                                                        <div class="lista-programas-custom">
                                                            <p>
                                                               Un líder de generación es:
                                                            </p>
                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Egresado de preparatoria, profesional o posgrado del Tecnológico de Monterrey.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Entusiasta y orgulloso de pertenecer a su "alma mater".</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Respetado y seguido por sus compañeros de generación.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Sencillo, empático y con actitud de servicio.</p>
                                                            </div>

                                                            <div class="item-programa">
                                                                <span>✓</span>
                                                                <p>Proactivo y capaz de motivar a otros a la acción.</p>
                                                            </div>
                                                            <p>
                                                               Además, es dueño de una trayectoria universitaria integral, con proactividad estudiantil (liderazgo, historial de actividades deportivas, artísticas, de voluntariado, etc.) o poseedor de una trayectoria personal y profesional posterior a su vida estudiantil que le ha permitido ser reconocido por sus compañeros.
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
                                    <li><a href="{{ route('soporte') }}">Uprit Data: Soporte Técnico </a></li>
                                    <li><a href="{{ route('salud') }}">Servicios Psicopedagógicos y Salud </a></li>
                                    <li><a href="{{ route('futbol') }}">Espacios y Servicios Deportivos</a></li>
                                    <li><a href="{{ route('talleres') }}">Talleres y Servicios Culturales</a></li>
                                    <li><a href="{{ route('becas') }}">Becas y Ayudas Financieras</a></li>
                                    <li><a href="{{ route('global') }}">Uprit Global/Internacional</a></li>
                                    <li><a href="{{ route('honors') }}">Honors College</a></li>
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