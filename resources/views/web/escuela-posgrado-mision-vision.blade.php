@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block">
                        <div class="about-mvv">
                            <ul class="nav nav-tabs about-mvv__tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#posgrado-mision" type="button" role="tab" aria-selected="true">
                                        <iconify-icon icon="mdi:target" aria-hidden="true"></iconify-icon>
                                        Misión
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#posgrado-vision" type="button" role="tab" aria-selected="false">
                                        <iconify-icon icon="mdi:eye-outline" aria-hidden="true"></iconify-icon>
                                        Visión
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content about-mvv__content">
                                <div class="tab-pane fade show active" id="posgrado-mision" role="tabpanel">
                                    <div class="about-mvv__panel">
                                        <p>La Universidad Privada de Trujillo brinda una formación profesional integral y humanista de excelencia, generando conocimiento científico y tecnológico que contribuye al desarrollo armónico y sostenible de la sociedad, abordando los problemas, retos y desafíos sociales, económicos, culturales, y ambientales que la aquejan con un alto espíritu de responsabilidad social y ética.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="posgrado-vision" role="tabpanel">
                                    <div class="about-mvv__panel">
                                        <p>Al 2027 nuestra universidad está integrada al mundo, reconocida por su aporte significativo al desarrollo humano, al responder a las demandas, retos y desafíos del entorno, favoreciendo con ello la competitividad y la sostenibilidad a través de la excelencia de sus egresados y la investigación e innovación actuando con un alto sentido de responsabilidad social y ética.</p>
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
                                @include('web.partials.section-nav')
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
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection
