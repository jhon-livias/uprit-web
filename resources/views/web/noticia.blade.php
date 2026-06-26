@extends('web.layouts.principal')
@section('content')

<div class="edu-breadcrumb-area list-noticia-bg">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Noticias</h1>
            </div>
            <ul class="edu-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('web.index')}}">Inicio</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{route('web.noticias')}}">Noticias</a></li>
            </ul>
        </div>
    </div>
    
</div>

<section class="section-gap-equal">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                @foreach($noticias as $noticia)
                <div class="edu-blog blog-style-list" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="inner">
                        <div class="thumbnail list-noticia-img">
                            <a href="{{route('web.detallenoticia',$noticia->id)}}">
                                <img src="{{ asset('noticias_imagenes/' . $noticia->imagen) }}" alt="Blog Images">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="title"><a href="{{route('web.detallenoticia',$noticia->id)}}">{{$noticia->titulo}}</a></h5>
                            <ul class="blog-meta">
                                <li><i class="icon-27"></i>{{ ucfirst(\Carbon\Carbon::parse($noticia->fecha)->locale('es')->translatedFormat('d F, Y')) }}</li>
                                <li>{{$noticia->categoriaNoticia->nombre}}</li>
                            </ul>
                            <p class="tag-descripcion tag-descripcion-noticias">{{$noticia->descripcion_corta}}</p>
                            <div class="read-more-btn">
                                <a class="edu-btn btn-border btn-medium" href="{{route('web.detallenoticia',$noticia->id)}}">Leer Más<i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


                @if ($noticias->hasPages())

                <ul class="edu-pagination top-space-30 justify-content-start">

                    @if ($noticias->onFirstPage())

                    <li class="disabled">
                        <span>
                            <i class="icon-west"></i>
                        </span>
                    </li>

                    @else

                    <li>
                        <a href="{{ $noticias->previousPageUrl() }}" aria-label="Previous">
                            <i class="icon-west"></i>
                        </a>
                    </li>

                    @endif
                    @foreach ($noticias->links()->elements[0] ?? [] as $page => $url)

                    @if ($page == $noticias->currentPage())

                    <li class="active">
                        <span>{{ $page }}</span>
                    </li>

                    @else

                    <li>
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>

                    @endif

                    @endforeach

                    @if ($noticias->hasMorePages())

                    <li>
                        <a href="{{ $noticias->nextPageUrl() }}" aria-label="Next">
                            <i class="icon-east"></i>
                        </a>
                    </li>

                    @else

                    <li class="disabled">
                        <span>
                            <i class="icon-east"></i>
                        </span>
                    </li>

                    @endif

                </ul>

                @endif

            </div>
            <div class="col-lg-4">
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
</section>
@endsection