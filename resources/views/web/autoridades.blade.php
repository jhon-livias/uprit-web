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
                            Nuestras Autoridades
                        </h3>

                        <p style="margin-bottom:30px;">
                            Conoce a los integrantes del Consejo Directivo de la Universidad Privada de Trujillo, <br> maxima instancia de direccion ejecutiva de nuestra Universidad.
                        </p>
                    </div>
                    <!-- AUTORIDAD 1 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-top:60px;margin-bottom:80px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <img src="{{ asset('web/imagenes/au1.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;">
                                Juan Mauricio Noriega Escobedo
                            </h3>

                            <p style="margin:0;font-size:17px;line-height:1.8;">
                                Presidente del Consejo Directivo UPRIT, MBA, Catedrático.
                            </p>
                        </div>

                    </div>

                    <!-- AUTORIDAD 2 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-bottom:50px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;">
                                Rómulo Mucho Mamani
                            </h3>

                            <p style="margin:0;font-size:17px;line-height:1.8;">
                                Director, Ingeniero, ex Ministro de Energía y Minas, Catedrático.
                            </p>
                        </div>

                        <div style="flex:1;min-width:300px;text-align:right;">
                            <img src="{{ asset('web/imagenes/au2.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                    </div>
                    <div style="display:flex;align-items:center;gap:50px;margin-top:60px;margin-bottom:80px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <img src="{{ asset('web/imagenes/au3.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;">

                                Enrique Manuel Durand Bazán
                            </h3>

                            <p style="margin:0;font-size:17px;line-height:1.8;">
                                Director, Phd, empresario del sector construcción, Catedrático.
                            </p>
                        </div>

                    </div>

                    <!-- AUTORIDAD 2 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-bottom:50px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;">
                                Militza Jovick Muñoz
                            </h3>

                            <p style="margin:0;font-size:17px;line-height:1.8;">
                                Director, Médico Cirujano, ex Presidente de la FILACP.
                            </p>
                        </div>

                        <div style="flex:1;min-width:300px;text-align:right;">
                            <img src="{{ asset('web/imagenes/au4.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                    </div>
                    <div style="display:flex;align-items:center;gap:50px;margin-top:60px;margin-bottom:80px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <img src="{{ asset('web/imagenes/au5.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
                        </div>

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;">
                                Diego Emilio Leyton Martínez
                            </h3>

                            <p style="margin:0;font-size:17px;line-height:1.8;">
                                Director, MBA, Director Sostenibilidad Cia.M.B, Catedrático.
                            </p>
                        </div>

                    </div>

                    <!-- AUTORIDAD 2 -->
                    <div style="display:flex;align-items:center;gap:50px;margin-bottom:50px;flex-wrap:wrap;">

                        <div style="flex:1;min-width:300px;">
                            <h3 style="font-weight:700;margin-bottom:15px;">
                                Juan Carlos Noriega Escobedo
                            </h3>

                            <p style="margin:0;font-size:17px;line-height:1.8;">
                                Director, MBA, Gerente Regional Bioreg Pharma, Catedrático.
                            </p>
                        </div>

                        <div style="flex:1;min-width:300px;text-align:right;">
                            <img src="{{ asset('web/imagenes/au1.jpg') }}"
                                alt="Autoridad"
                                style="width:100%;max-width:450px;border-radius:15px;height:350px">
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