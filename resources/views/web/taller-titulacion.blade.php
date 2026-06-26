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
                            Sistema de Titulación Acelerada
                        </h3>

                        <p style="margin-bottom:30px;">
                            En la UPRIT, no solo terminas tu carrera con el bachiller automático, sino que también sales con tu tesis lista para sustentar.
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
                                                        Bachiller Automático
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Finaliza tu carrera con tu grado de Bachiller de forma automática, sin trámites adicionales.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Taller de Investigación
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Recibe asesoría y acompañamiento para tener tu tesis lista para sustentar, todo dentro de tu plan de estudios.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Asesoría Personalizada
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Si deseas terminar tu tesis en menor tiempo, pregunta por nuestro servicio de asesoría individualizada.</p>
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
                        <h3>
                            Modalidad para Bachilleres o Egresados de Universidades No Licenciadas
                        </h3>
                        <ul>
                            <li>Esta modalidad está dirigida a personas egresadas y bachilleres de universidades o programas no licenciados. Las personas postulantes deben acreditar su condición de egresadas o bachilleres de una universidad o programa no licenciado.</li>
                            <li>La UPRIT tiene mecanismos de reconocimiento o convalidación de estudios para que puedas obtener tu grado académico o título profesional en el menor tiempo posible.</li>
                            <li>Además, te ofrecemos talleres de actualización en investigación, elaboración de trabajos de investigación o tesis para que puedas titularte rápidamente.</li>
                        </ul>
                    </div>

                    <div class="text-block">
                        <h3>
                            Requisitos de Postulación
                        </h3>
                        <p>Deberás subir los siguientes documentos en formato PDF a través del Sistema Integrado de Gestión Académica (SIGA Uprit ERP):</p>
                        <ul>
                           <li>Copia de DNI</li>
                           <li>Constancia de primera matrícula de la universidad de origen</li>
                           <li>Constancia de egresado</li>
                           <li>Certificado de Notas <br>
                        <p style="font-size: 12px;">Necesario si solicitas el grado de bachiller y/o grado de maestro.</p></li>
                           <li>Constancia de Inscripción del Grado de Bachiller en SUNEDU <br> 
                        <p style="font-size: 12px;">Necesaria si solicitas el título profesional. Puedes obtenerla en: enlinea.sunedu.gob.pe.</p></li>
                           <li>Declaración jurada de autenticidad de documentos</li>
                        </ul>
                    </div>
                    <div class="text-block text-center">

                        <p>Para más información sobre programas, condiciones y costos, comunícate con el área de admisión.</p>
                        <p><a href="mailto:admision@uprit.edu.pe" class="flex items-center gap-2 text-primary underline hover:opacity-80 transition-opacity" style="color:#91001E !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-6 w-6"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>admision@uprit.edu.pe</a>
                  &nbsp;&nbsp;&nbsp;  <a href="tel:+51970597183" class="flex items-center gap-2 text-primary underline hover:opacity-80 transition-opacity" style="color:#91001E !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-6 w-6"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>+51 970 597 183</a></p>
                        
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