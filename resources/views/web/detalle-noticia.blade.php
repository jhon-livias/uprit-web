@extends('web.layouts.principal')
@section('content')
<!--=====================================-->
<!--=       Breadcrumb Area Start      =-->
<!--=====================================-->


<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Detalle Noticia</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('web.detallenoticia',$noticia->id)}}">Detalle Noticia</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="blog-details-area section-gap-equal">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <div class="entry-content">
                        <span class="category">{{$noticia->categoriaNoticia->nombre}}</span>
                        <h3 class="title">{{$noticia->titulo}}</h3>
                        <ul class="blog-meta">
                            <li><i class="icon-27"></i>{{ ucfirst(\Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('d F, Y')) }}</li>

                        </ul>
                        <div class="thumbnail">
                            <img src="{{ asset('noticias_imagenes/' . $noticia->imagen) }}" alt="Blog Image">
                        </div>
                    </div>
                    <p class="tag-descripcion justificar">{{$noticia->descripcion_corta}}</p>
                    <div class="blog-share-area">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="blog-tags">
                                    <h6 class="title">Etiquetas:</h6>
                                    <div class="tag-list">

                                    @php
                                        $tags = is_array($noticia->tags)
                                            ? $noticia->tags
                                            : json_decode($noticia->tags ?? '[]', true) ?? [];
                                    @endphp
                                    @foreach($tags as $tag)
                                    <a href="#">{{ $tag }}</a>
                                    @endforeach

                                </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="blog-author">
                    <div class="thumbnail">
                        <img src="{{ asset('noticias_autor_imagenes/' . $noticia->autor_imagen) }}" alt="Author Images">
                    </div>
                    <div class="author-content">
                        <h5 class="title">{{$noticia->autor_nombre}}</h5>
                        <p class="justificar">{{$noticia->autor_descripcion}}</p>
                        
                    </div>
                </div>
                <div class="des-completa">
                    <p class="tag-descripcion justificar">{!! $noticia->descripcion_total !!}</p>

                </div>

                <p class="tag-descripcion descargos-responsabilidad justificar">
                    <b>Descargos de responsabilidad</b> <br>
                    Recordamos a los lectores que el blog que leen cada artículo se basa en opiniones exclusivas e independientes de sus respectivos autores y que estas no reflejan las ideas, ideologías ni puntos de vista de la Universidad Privada de Trujillo, ni de ninguna organización vinculada a la Universidad o a los autores. <br>

                    La información del blog es proporcionada por los respectivos autores de los artículos y es auténtica según su leal saber y entender y, como tal, es propensa a errores y a la ausencia de información clave. El contenido del blog se genera con fines de educación y/o informativos, pero no debe percibirse como asesoramiento profesional sobre temas técnicos, legales, financieros, o de cualquier otro campo.
                </p>

            </div>
            <div class="col-lg-4" style="position: relative;box-sizing: border-box;">
                <div class="edu-blog-sidebar textos-derecha">
                    <div class="edu-blog-widget widget-search">
                        <div class="inner">
                            <h4 class="widget-title">Buscar</h4>
                            <div class="content">
                                <form class="blog-search" action="{{ route('web.noticias') }}" method="GET">
                                    <button class="search-button"><i class="icon-2"></i></button>
                                    <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar...">
                                </form>
                            </div>
                        </div>
                    </div>
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
                    <div class="edu-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categorias</h4>
                            <div class="content">
                                <ul class="category-list">
                                    @foreach($categorias as $categoria)
                                    <li><a href="{{ route('web.noticias', $categoria->id) }}">{{$categoria->nombre}}<span>({{$categoria->noticias->count()}})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.querySelector('.edu-blog-sidebar');
        const container = sidebar.closest('.row');
        const marginTop = 120;

        
        const sidebarWidth = sidebar.offsetWidth;

        window.addEventListener('scroll', () => {
            const containerRect = container.getBoundingClientRect();
            const sidebarHeight = sidebar.offsetHeight;
            const limiteFondo = containerRect.bottom - sidebarHeight - marginTop;

            if (containerRect.top > marginTop) {
                sidebar.style.position = 'static';
                sidebar.style.transform = 'translateY(0px)';
                sidebar.style.width = 'auto'; 
            } else if (containerRect.top <= marginTop && limiteFondo > 0) {
                
                sidebar.style.position = 'fixed';
                sidebar.style.top = `${marginTop}px`;
                sidebar.style.transform = 'translateY(0px)';
                
                sidebar.style.width = `${sidebarWidth}px`;
            } else {
                sidebar.style.position = 'absolute';
                sidebar.style.top = 'auto';
                sidebar.style.transform = `translateY(${container.offsetHeight - sidebarHeight}px)`;
                
                sidebar.style.width = `${sidebarWidth}px`;
            }
        });
    });
</script>
@endsection