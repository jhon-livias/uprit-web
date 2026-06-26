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
                            Plan de Seguridad Institucional
                        </h3>

                        <p style="margin-bottom:30px;">
                            La Universidad Privada de Trujillo se compromete con la salvaguarda de la integridad física de toda su comunidad, con políticas y procedimientos de seguridad rigurosos.
                        </p>
                    </div>
                    <br><br>
                    <div class="text-block">
                        <h3 class="title">Contacto y Reporte de Incidentes</h3>
                        <ul>
                            <li>
                                Para solicitar apoyo o reportar incidentes que pongan en riesgo a personas o bienes, utiliza los siguientes canales:
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
                                                        Teléfonos de Emergencia
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Emergencias en campus: (81) 8215-1133

                                                                Centro de Seguridad: (81) 1022-6631
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Correo Electrónico
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p><a href="">seguridad@uprit.edu.pe</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Redes Sociales
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p> <a href="">SeguridadUPRIT</a> <br> Whatsapp:<a href="">Lista de Difusión</a></p>
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
                        <h3 class="title">Protocolo para Visitantes y Voluntarios</h3>
                        <ul>
                            <li>Conoce al equipo directivo que conduce la formación de posgrado de alta calidad en nuestra Universidad.</li>
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

                                                        Requisitos

                                                    </button>

                                                </h3>

                                                <div id="collapseOneSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingOneSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                Los visitantes y voluntarios deben recibir información sobre riesgos, procedimientos de emergencia y uso de EPP. Deben usar el EPP adecuado y cumplir con todas las políticas habituales de seguridad.

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

                                                        Nota importante
                                                    </button>

                                                </h2>

                                                <div id="collapseTwoSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwoSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Los menores de edad no pueden ingresar a entornos de investigación o académicos si no participan en una visita o voluntariado aprobado por la universidad.
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

                                                        Aprobación por escrito
                                                    </button>

                                                </h2>

                                                <div id="collapseThreeSeguro"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingThreeSeguro"
                                                    data-bs-parent="#accordionExampleSeguro">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>Los responsables deben obtener la aprobación de su departamento para visitas de solo observación o actividades de investigación con sustancias o equipos peligrosos.
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
                        <h3 class="title">Manejo de Residuos</h3>
                        <p>Al llamar para la recolección, proporcione</p>
                        <ul>
                            <li>Nombre y número de teléfono de contacto</li>
                            <li>Número de edificio y habitación donde están los residuos</li>
                            <li>Tipo de residuo y número/descripción de contenedores</li>
                            <li>Si necesita contenedores de reemplazo</li>
                            <li>Instrucciones especiales de manipulación o peligro</li>
                        </ul>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Seguridad en Laboratorios y Construcciones</h3>
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

                                                        Seguridad en Laboratorio
                                                    </button>
                                                </h3>

                                                <div id="collapseExperienciaOne"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaOne"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Utilice contenedores en buen estado, manténgalos cerrados y asegure un sistema de contención secundaria.</p>
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

                                                        Seguridad en Construcciones

                                                    </button>

                                                </h2>

                                                <div id="collapseExperienciaTwo"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="headingExperienciaTwo"
                                                    data-bs-parent="#accordionExperiencia">

                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Nuestro objetivo es cero lesiones. Los contratistas deben identificar peligros, prevenir accidentes y realizar reportes mensuales de seguridad. <br>

                                                                El programa incluye una lista de verificación, un procedimiento de informe de incidentes y la obligación de un reporte mensual de seguridad.</p>
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
                        <h3 class="title">Objetos Extraviados</h3>
                        <ul>
                            <li>
                                Si extraviaste o encontraste algo, dirígete a la Oficina 3203, Edificio 3.
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

                                    Horario

                                </button>
                            </h3>

                            <div id="collapseInternacionalOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalOne"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">
                                    <div class="course-lesson">
                                        <p>Lunes a viernes de 7:00 a 13:00 y de 14:00 a 18:00. Sábados de 7:00 a 14:00.</p>
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

                                    Teléfono

                                </button>
                            </h3>

                            <div id="collapseInternacionalTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalTwo"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">
                                    <div class="course-lesson">
                                        <p>(81) 8215-1000 ext. 1751</p>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingInternacionalFour">
                                <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseInternacionalFour"
                                    aria-expanded="false"
                                    aria-controls="collapseInternacionalFour">

                                    Correo

                                </button>
                            </h3>

                            <div id="collapseInternacionalFour"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingInternacionalFour"
                                data-bs-parent="#accordionInternacional">

                                <div class="accordion-body">
                                    <div class="course-lesson">
                                        <p><a href="">objetos.extraviados@udem.edu.mx</a></p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <br> <br>
                    <div class="text-block">
                        <h3 class="title">Acceso y Reglamento del Campus</h3>
                    </div>
                    <div class="accordion edu-accordion edu-accordion-sec"
                        id="accordionServicios">

                        <!-- Item 1 -->
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingServiciosOne">
                                <button class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseServiciosOne"
                                    aria-expanded="true"
                                    aria-controls="collapseServiciosOne">

                                    Requisitos de Acceso

                                </button>
                            </h3>

                            <div id="collapseServiciosOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingServiciosOne"
                                data-bs-parent="#accordionServicios">

                                <div class="accordion-body">

                                    <div class="lista-programas-custom">

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Identificación y registro para ingresar.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Estudiantes, Colaboradores y Profesores usan su UpritCard.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Visitantes y Proveedores usan su DNI.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Obedecer las indicaciones del guardia.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Toda persona o vehículo puede ser sujeto a revisión.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Autorización para sacar material o equipo.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Menores de edad deben estar acompañados por un adulto.</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="headingServiciosTwo">
                                <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseServiciosTwo"
                                    aria-expanded="false"
                                    aria-controls="collapseServiciosTwo">

                                    Documentación

                                </button>
                            </h3>

                            <div id="collapseServiciosTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingServiciosTwo"
                                data-bs-parent="#accordionServicios">

                                <div class="accordion-body">

                                    <div class="lista-programas-custom">

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>En estado inconveniente.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Con bebidas alcohólicas o sustancias prohibidas.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Con armas.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Con materiales inflamables o explosivos.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Con mascotas.</p>
                                        </div>

                                        <div class="item-programa">
                                            <span>✓</span>
                                            <p>Con cuatrimotos.</p>
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