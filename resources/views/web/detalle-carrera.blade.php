@extends('web.layouts.principal')

@section('content')
<div class="hero-banner hero-style-3 hero-style-3-sec bg-image">
    <div class="swiper university-activator swiper-formulario">
        <div class="swiper-wrapper">

            <div class="swiper-slide slider-principal">
                <img src="{{asset('web/imagenes/slider/slider03.webp')}}"
                    class="slider-img"
                    alt="image">

                <div class="thumbnail-bg-content detalle-bg-content">
                    <div class="container edublink-animated-shape">

                        <div class="row align-items-center">

                            <div class="col-lg-7 text-list-sec">
                                <div class="banner-content slider-lista">
                                    <h1 class="title"
                                        data-sal-delay="100"
                                        data-sal="slide-up"
                                        data-sal-duration="1000">
                                        {{$categoria->nombre}}
                                    </h1>

                                    <div class="banner-btn"
                                        data-sal-delay="400"
                                        data-sal="slide-up"
                                        data-sal-duration="1000">

                                        <ul class="lista-carreras">
                                            @foreach($categoria->carreras as $item)
                                            <li>
                                                <a href="{{route('web.detallecarrera', $item->id)}}">
                                                    {{$item->nombre}}
                                                </a>
                                            </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="formulario-slider">

                                    <div class="form-header">
                                        Solicita Información
                                    </div>

                                    <form>

                                        <div class="form-checks">
                                            <label>
                                                <input type="radio" name="modalidad">
                                                Presencial
                                            </label>

                                            <label>
                                                <input type="radio" name="modalidad">
                                                Virtual
                                            </label>

                                            <label>
                                                <input type="radio" name="modalidad">
                                                Semipresencial
                                            </label>

                                            <label>
                                                <input type="radio" name="modalidad">
                                                Hyflex
                                            </label>
                                        </div>

                                        <!-- INPUTS -->
                                        <div class="form-group">
                                            <select>
                                                <option value="" selected="" disabled>Tipo de Programa</option>
                                                <option value="PREGRADO">Pregrado Regular</option>
                                                <option value="MAESTRIA">Maestría</option>
                                                <option value="DOCTORADO">Doctorado</option>
                                                <option value="DIPLOMADO">Diplomados y Cursos de Especialización</option>
                                                <option value="POST_DOCTORADO">Posdoctorado</option>
                                                <option value="SECOND_SPECIALITY">Segunda Especialidad</option>
                                                <option value="CAREERS_FOR_WORKERS">Pregrado Puede</option>
                                                <option value="TRANSFER">Traslado de Carrera Profesional</option>
                                                <option value="DEGREE_COMPLETION">Titulación / Licenciatura</option>
                                                <option value="EXPERIENCE_INTERNATIONAL_PERU">Experiencia Internacional en Perú</option>
                                                <option value="MISION_ACADEMIC_INTERNATIONAL">Misiones Académicas Internacionales</option>
                                                <option value="CONGRESS_SUMMITS">Congresos - SUMMITS</option>
                                                <option value="BOOTCAMPS">Bootcamps</option>
                                                <option value="MOOC">MOOC</option>
                                                <option value="WEBINARS">Webinars</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select>
                                                <option value="" selected="" disabled>Programa de Interés</option>
                                                <option value="Administración Portuaria y de Transporte Intermodal">Administración Portuaria y de Transporte Intermodal</option>
                                                <option value="Psicología">Psicología</option>
                                                <option value="Derecho (Presencial)">Derecho (Presencial)</option>
                                                <option value="Arquitectura y Urbanismo">Arquitectura y Urbanismo</option>
                                                <option value="Ingenieria Industrial">Ingenieria Industrial</option>
                                                <option value="Educación Inicial">Educación Inicial</option>
                                                <option value="Educación Primaria">Educación Primaria</option>
                                                <option value="Educación Secundaria con Mención en Ciencias Sociales">Educación Secundaria con Mención en Ciencias Sociales</option>
                                                <option value="Administración de Empresas">Administración de Empresas</option>
                                                <option value="Contabilidad y Finanzas">Contabilidad y Finanzas</option>
                                                <option value="Ingeniería Civil">Ingeniería Civil</option>
                                            </select>
                                        </div>

                                        <div class="form-row-custom">
                                            <input type="text" placeholder="Nombres">
                                            <input type="text" placeholder="Apellidos">
                                        </div>

                                        <div class="form-row-custom">
                                            <input type="text" placeholder="DNI">
                                            <input type="text" placeholder="Documento">
                                        </div>

                                        <div class="form-row-custom">
                                            <input type="email" placeholder="Correo">
                                            <input type="text" placeholder="Whatsapp">
                                        </div>
                                        <button type="submit" class="btn-postular">
                                            Postular
                                        </button>

                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        
    </div>

</div>



<div class="edu-breadcrumb-area breadcrumb-style-8 banner-carrera">

    <div class="breadcrumb-right-wrapper">
        <div class="container">

            <div class="breadcrumb-inner">

                <div class="contenido-banner">

                    <!-- TEXTO -->
                    <div class="contenido-texto">

                        <h1 class="titulo-carrera">
                            {{$carrera->nombre}}
                        </h1>

                        <p class="descripcion-carrera">
                            {{$carrera->descripcion}}
                        </p>

                        <div class="fecha-examen">
                            Exámen de Admisión: {{ \Carbon\Carbon::parse($carrera->admision)->locale('es')->translatedFormat('j \d\e F \d\e Y') }}
                        </div>

                    </div>



                </div>

            </div>

        </div>
    </div>

</div>

<section class="edu-section-gap course-details-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="course-details-content course-details-7">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">Descripción</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="carriculam-tab" data-bs-toggle="tab" data-bs-target="#carriculam" type="button" role="tab" aria-controls="carriculam" aria-selected="false">Malla Curricular</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor" type="button" role="tab" aria-controls="instructor" aria-selected="false">Perfil de Egresado</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Nuestros Docentes</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">

                                    <p class="tag-descripcion">{{$carrera->detalle_descripcion?->descripcion ?? '' }}</p>
                                    @php

                                    $oportunidades = $carrera->detalle_descripcion?->oportunidades ?? [];

                                    $mitad = ceil(count($oportunidades) / 2);

                                    $columna1 = array_slice($oportunidades, 0, $mitad);

                                    $columna2 = array_slice($oportunidades, $mitad);

                                    @endphp
                                    <div class="border-box">
                                        <h5 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Oportunidades en el mercado</h5>
                                        <div class="row g-5">
                                            <div class="col-lg-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                                <ul class="tag-descripcion">
                                                    @foreach($columna1 as $item)

                                                    <li>{{ $item }}</li>

                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-lg-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                                <ul class="tag-descripcion">
                                                    @foreach($columna2 as $item)

                                                    <li>{{ $item }}</li>

                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="course-curriculam mb--90">
                                        @if(isset($carrera->preguntas))
                                        <div class="accordion edu-accordion" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                            @foreach($carrera->preguntas as $index => $pregunta)

                                            <div class="accordion-item">

                                                <h2 class="accordion-header"
                                                    id="heading{{ $index }}">

                                                    <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $index }}"
                                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                        aria-controls="collapse{{ $index }}">

                                                        {{ $pregunta->pregunta }}

                                                    </button>

                                                </h2>

                                                <div id="collapse{{ $index }}"
                                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $index }}"
                                                    data-bs-parent="#accordionExample">

                                                    <div class="accordion-body">

                                                        <div class="course-lesson">

                                                            <p>
                                                                {{ $pregunta->respuesta }}
                                                            </p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            @endforeach

                                        </div>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="carriculam" role="tabpanel" aria-labelledby="carriculam-tab">
                            <div class="course-tab-content">
                                <div class="course-curriculam mb--90">

                                    @if($carrera->malla && count($carrera->malla) > 0)

                                    <div class="accordion edu-accordion"
                                        id="accordionExample2"
                                        data-sal-delay="150"
                                        data-sal="slide-up"
                                        data-sal-duration="800">

                                        @foreach($carrera->malla as $index => $malla)

                                        @php

                                        $cursos = $malla->cursos ?? [];

                                        @endphp

                                        <div class="accordion-item">

                                            <h3 class="accordion-header"
                                                id="headingMalla{{ $index }}">

                                                <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseMalla{{ $index }}"
                                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                    aria-controls="collapseMalla{{ $index }}">

                                                    {{ $malla->ciclo }}

                                                </button>

                                            </h3>

                                            <div id="collapseMalla{{ $index }}"
                                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                aria-labelledby="headingMalla{{ $index }}"
                                                data-bs-parent="#accordionExample2">

                                                <div class="accordion-body">

                                                    <div class="course-lesson curso-carrera">

                                                        <p>
                                                            {{ $malla->descripcion }}
                                                        </p>

                                                        @if($cursos && count($cursos) > 0)

                                                        <div class="titulo-cursos">

                                                            <iconify-icon
                                                                icon="mdi:book-open-page-variant"
                                                                style="font-size:20px">
                                                            </iconify-icon>

                                                            <span>Cursos</span>

                                                        </div>

                                                        <ul>

                                                            @foreach($cursos as $curso)

                                                            <li>

                                                                <div class="text">

                                                                    {{ $curso }}

                                                                </div>

                                                            </li>

                                                            @endforeach

                                                        </ul>

                                                        @endif

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        @endforeach

                                    </div>

                                    @endif


                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                            <div class="course-tab-content">
                                <div class="course-instructor">

                                    <div class="author-content">
                                        <p class="tag-descripcion">{{$carrera->perfilEgresado?->descripcion ?? '' }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">

                            @if($carrera->docentes && count($carrera->docentes) > 0)

                            <div class="course-tab-content">

                                <div class="course-review">

                                    <div class="comment-area">

                                        <div class="comment-list-wrapper">

                                            @foreach($carrera->docentes as $docente)

                                            @php

                                            $tags = is_array($docente->tags)
                                            ? $docente->tags
                                            : json_decode($docente->tags ?? '[]', true);

                                            @endphp

                                            <div class="comment">

                                                <div class="thumbnail">

                                                    <img src="{{ $docente->imagen ? asset($docente->imagen) : asset('web/imagenes/docente.jpeg') }}"
                                                        alt="{{ $docente->nombre }}" style="height:192px;">

                                                </div>

                                                <div class="comment-content">

                                                    <h5 class="title">

                                                        {{ $docente->nombre }}

                                                    </h5>

                                                    @if($tags && count($tags) > 0)

                                                    <div class="docente-tags">

                                                        @foreach($tags as $tag)

                                                        <span class="tag-docente">

                                                            {{ $tag }}

                                                        </span>

                                                        @endforeach

                                                    </div>

                                                    @endif

                                                    <div class="docente-contacto">

                                                        @if($docente->correo)

                                                        <div class="contact-item">

                                                            <iconify-icon
                                                                icon="mdi:email-outline"
                                                                class="contact-icon">
                                                            </iconify-icon>

                                                            <span>

                                                                {{ $docente->correo }}

                                                            </span>

                                                        </div>

                                                        @endif

                                                        @if($docente->departamento)

                                                        <div class="contact-item">

                                                            <iconify-icon
                                                                icon="mdi:office-building-outline"
                                                                class="contact-icon">
                                                            </iconify-icon>

                                                            <span>

                                                                {{ $docente->departamento }}

                                                            </span>

                                                        </div>

                                                        @endif

                                                        @if($docente->linkedin)

                                                        <div class="contact-item">

                                                            <iconify-icon
                                                                icon="mdi:linkedin"
                                                                class="contact-icon">
                                                            </iconify-icon>

                                                            <a href="{{ $docente->linkedin }}"
                                                                target="_blank">

                                                                Linkedin

                                                            </a>

                                                        </div>

                                                        @endif

                                                    </div>

                                                    @if($docente->descripcion)

                                                    <p class="tag-descripcion">

                                                        {{ $docente->descripcion }}

                                                    </p>

                                                    @endif

                                                </div>

                                            </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="course-sidebar-3 sidebar-top-position">

                    <div class="edu-course-widget widget-course-summery carrera-sidebar">

                        <div class="inner">

                            <div class="thumbnail">
                                @if(isset($carrera->imagen))
                                <img src="{{ asset('brochures_imagenes/' . $carrera->imagen) }}"
                                    alt="Carrera">
                                @else
                                <img src="{{asset('web/imagenes/carrera/carrera01.webp')}}"
                                    alt="Carrera">
                                @endif
                            </div>
                            <div class="content">

                                <div class="carrera-info">

                                    <div class="info-item">

                                        <div class="info-icon">
                                            <i class="icon-61"></i>
                                        </div>

                                        <div class="info-content">

                                            <span class="titulo">
                                                Duración:
                                            </span>

                                            <span class="texto">
                                                {{$carrera->duracion}}
                                            </span>

                                        </div>

                                    </div>

                                    <div class="info-item">

                                        <div class="info-icon">
                                            <i class="icon-63"></i>
                                        </div>

                                        <div class="info-content">

                                            <span class="titulo">
                                                Grado Obtenido:
                                            </span>

                                            <span class="texto">
                                                {{$carrera->grado_obtenido}}
                                            </span>

                                        </div>

                                    </div>

                                    <div class="info-item">

                                        <div class="info-icon">
                                            <i class="icon-64"></i>
                                        </div>

                                        <div class="info-content">

                                            <span class="titulo">
                                                Titulación:
                                            </span>

                                            <span class="texto">
                                                {{$carrera->titulacion}}
                                            </span>

                                        </div>

                                    </div>

                                    <div class="info-item">

                                        <div class="info-icon">
                                            <i class="icon-62"></i>
                                        </div>

                                        <div class="info-content">

                                            <span class="titulo">
                                                Modalidades:
                                            </span>

                                            <span class="texto modalidad-item">
                                                {{$carrera->modalidades}}
                                            </span>



                                        </div>

                                    </div>
                                    <a href="{{ asset('brochures_carreras/' . $carrera->brochure) }}" class="edu-btn btn-secondary detalle-button d-flex align-items-center justify-content-center gap-2">

                                        <iconify-icon icon="mdi:book-open-page-variant"
                                            style="font-size:20px; margin-right:6px;">
                                        </iconify-icon>

                                        <span>Brochure</span>
                                    </a>

                                </div>

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
@section('scripts')
<script>
window.addEventListener('load', function () {

    setTimeout(() => {

        const heroSwiper = document.querySelector('.university-activator')?.swiper;

        document.body.classList.add('stop-animations');

        if (heroSwiper?.autoplay) {
            heroSwiper.autoplay.stop();
        }

    }, 300);

});
</script>
@endsection