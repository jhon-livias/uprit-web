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
                            Misiones Académicas Internacionales ✈️
                        </h3>

                        <p style="margin-bottom:30px;">
                            ¡Expande tu mundo y tu carrera profesional con UPRIT!
                        </p>
                        <p style="margin-bottom:30px;">
                            En UPRIT, te ofrecemos la oportunidad única de complementar tu formación con misiones académicas internacionales diseñadas para conectar el conocimiento con la práctica real de los negocios en Latinoamérica y el mundo.
                        </p>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Un Viaje que Transforma tu Futuro</h3>
                        <ul>
                            <li>Participar en estas misiones no es solo una oportunidad para viajar, sino una inversión en tu carrera. Volverás no solo con conocimientos prácticos, sino también con una red de contactos global, una visión más amplia de los negocios y un perfil profesional altamente competitivo. Nuestros programas te permiten vivir experiencias de inmersión en diferentes países, aprendiendo directamente de expertos, visitando empresas líderes y estableciendo una red de contactos invaluable.</li>
                        </ul>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Programa Doing Business: Conectando la Teoría con el Mundo Real 💼</h3>
                        <ul>
                            <li>Cada misión "Doing Business" está meticulosamente planificada para que entiendas las dinámicas económicas, culturales y de innovación de cada destino.</li>
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
                                                        Doing Business Perú - Lima
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Descubre por qué la capital peruana es el corazón financiero y de servicios del país. Este programa se centra en las finanzas corporativas, el marketing digital y la gestión empresarial en el contexto de una de las economías más dinámicas de la región. Visitarás empresas multinacionales y emprendimientos innovadores.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Doing Business Perú - Agronegocios Trujillo
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Aprovecha que estás en la capital de la agroindustria. Este programa te sumerge en el exitoso modelo de agronegocios del norte de Perú, una potencia en exportación de productos. Conocerás de cerca la cadena de valor, la tecnología aplicada al campo y la sostenibilidad en las empresas agrícolas.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Doing Business México
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Explora el vibrante ecosistema de la segunda economía más grande de Latinoamérica. La misión se enfoca en el comercio exterior, la manufactura y la cultura empresarial, permitiéndote entender cómo operan las grandes corporaciones y las Pymes que impulsan su crecimiento.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        Doing Business Colombia
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Sumérgete en el dinamismo de la economía colombiana, reconocida por su innovación, su emprendimiento y su creatividad. Conoce las estrategias de negocio de sectores clave como la tecnología, la moda y el café, y entiende cómo su resiliencia cultural se traduce en éxitos empresariales.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        Doing Business Ecuador
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Analiza el potencial de una economía dolarizada y la diversidad de su matriz productiva. Este programa te ofrece una visión integral de los sectores clave como el petróleo, el turismo y la industria pesquera, mostrando cómo las empresas ecuatorianas se adaptan a un entorno de negocios único.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                        Doing Business Reino Unido
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Vive una experiencia global en el epicentro de las finanzas y la innovación en Europa. Esta misión te brinda una perspectiva única sobre los mercados internacionales, el sistema financiero global y las últimas tendencias en tecnología y emprendimiento que surgen de ciudades como Londres.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSeven">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                        Doing Business Chile
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Estudia el modelo de negocios de una de las economías más estables y desarrolladas de la región. El programa se centra en la minería, el sector vitivinícola y los servicios financieros, analizando su apertura al comercio internacional y su liderazgo en innovación.</p>
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
                        <h3 class="title">Descarga más información</h3>
                        <ul>
                            <li>Para obtener más detalles sobre los programas de misiones internacionales y sus condiciones, haz clic en el siguiente enlace: <a href="" style="color: #91001E;">Descargar PDF</a></li>
                        </ul>
                        <h3>Más Información</h3>
                        <ul>
                            <li>Para más informes sobre misiones internacionales, comunícate con nosotros a través de nuestro correo electrónico: <a href="" style="color: #91001E;">doing.business@uprit.edu.pe</a></li>
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