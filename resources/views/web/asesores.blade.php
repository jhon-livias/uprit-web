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
                            Asesores de Admisión
                        </h3>

                        <p style="margin-bottom:30px;">
                            Tines dudas en tu proceso de admisión, ¡Contactanos!
                        </p>
                    </div>
                    <div class="row g-4">

                        <!-- ASESOR 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,.08);height:100%;">

                                <img src="img/asesores/norman.jpg" alt="Norman Lazaro"
                                    style="width:100%;height:320px;object-fit:cover;">

                                <div style="padding:25px;text-align:center;">

                                    <h4 style="font-weight:700;margin-bottom:5px;">Norman Lazaro</h4>

                                    <p style="color:#777;margin-bottom:10px;">Trujillo</p>

                                    <div style="width:60px;height:3px;background:#c8102e;margin:15px auto;"></div>

                                    <p style="font-weight:600;">Asesor de Admisión</p>

                                    <a href="#" style="display:block;background:#25D366;color:#fff;padding:12px;border-radius:10px;text-decoration:none;margin-bottom:10px;">
                                        <i class="ri-whatsapp-line"></i> Contactar 
                                    </a>

                                    <a href="#" style="display:block;border:1px solid #ddd;color:#444;padding:12px;border-radius:10px;text-decoration:none;">
                                        <i class="ri-calendar-line"></i> Programa una cita 
                                    </a>

                                </div>
                            </div>
                        </div>

                        <!-- ASESOR 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,.08);height:100%;">

                                <img src="img/asesores/christian.jpg" alt="Christian Sanchez"
                                    style="width:100%;height:320px;object-fit:cover;">

                                <div style="padding:25px;text-align:center;">

                                    <h4 style="font-weight:700;margin-bottom:5px;">Christian Sanchez</h4>

                                    <p style="color:#777;margin-bottom:10px;">Trujillo</p>

                                    <div style="width:60px;height:3px;background:#c8102e;margin:15px auto;"></div>

                                    <p style="font-weight:600;">Asesor de Admisión</p>

                                    <a href="#" style="display:block;background:#25D366;color:#fff;padding:12px;border-radius:10px;text-decoration:none;margin-bottom:10px;">
                                        <i class="ri-whatsapp-line"></i> Contactar 
                                    </a>

                                    <a href="#" style="display:block;border:1px solid #ddd;color:#444;padding:12px;border-radius:10px;text-decoration:none;">
                                        <i class="ri-calendar-line"></i> Programa una cita 
                                    </a>

                                </div>
                            </div>
                        </div>

                        <!-- ASESOR 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,.08);height:100%;">

                                <img src="img/asesores/ericka.jpg" alt="Ericka Yacila"
                                    style="width:100%;height:320px;object-fit:cover;">

                                <div style="padding:25px;text-align:center;">

                                    <h4 style="font-weight:700;margin-bottom:5px;">Ericka Yacila</h4>

                                    <p style="color:#777;margin-bottom:10px;">Trujillo</p>

                                    <div style="width:60px;height:3px;background:#c8102e;margin:15px auto;"></div>

                                    <p style="font-weight:600;">Asesor de Admisión</p>

                                    <a href="#" style="display:block;background:#25D366;color:#fff;padding:12px;border-radius:10px;text-decoration:none;margin-bottom:10px;">
                                        <i class="ri-whatsapp-line"></i> Contactar 
                                    </a>

                                    <a href="#" style="display:block;border:1px solid #ddd;color:#444;padding:12px;border-radius:10px;text-decoration:none;">
                                        <i class="ri-calendar-line"></i> Programa una cita 
                                    </a>

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