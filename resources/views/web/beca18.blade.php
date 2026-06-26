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
                    <div class="text-block">
                        <h3 style="margin-bottom:20px;font-weight:700;font-size:30px;">
                            ¿Que es Beca18?
                        </h3>
                        <ul>
                            <li>Es un programa del Estado dirigido a escolares y egresados de 5to de secundaria con alto rendimiento académico, quienes podrán acceder a becas integrales para estudiar una carrera en las mejores universidades e instituciones del país.*
                                *Revisa los requisitos completos en la página web de Pronabec.</li>
                        </ul>
                    </div>

                    <div class="text-block">
                        <h3 style="margin-bottom:20px;font-weight:700;font-size:30px;">
                            Beneficios de la Beca

                        </h3>
                        <ul>
                            <li>Acceso a recursos digitales y físicos para reforzamiento de conocimientos del postulante.</li>
                            <li>Orientación sobre las propuestas académicas que brindan las instituciones de educación superior en el país.</li>
                            <li>Cobertura de costos académicos como la matrícula, pensión de estudios, idioma inglés, materiales de estudio, movilidad local, alimentación, alojamiento (cuando corresponda), laptop, costos administrativos para la obtención del grado y/o titulación, acompañamiento académico, socioemocional y de bienestar, entre otros beneficios más.</li>
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