@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area posgrado-mvv-page">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <header class="posgrado-mvv-page__header text-center">
                        <span class="posgrado-mvv-page__eyebrow">Escuela de Posgrado</span>
                        <h2 class="posgrado-mvv-page__title">Misión y Visión</h2>
                        <p class="posgrado-mvv-page__lead">
                            Los principios que orientan la formación de excelencia, la investigación y el compromiso social de nuestros programas de posgrado.
                        </p>
                    </header>

                    <div class="posgrado-mvv-page__grid">
                        <article class="posgrado-mvv-card posgrado-mvv-card--mision">
                            <div class="posgrado-mvv-card__head">
                                <span class="posgrado-mvv-card__icon" aria-hidden="true">
                                    <iconify-icon icon="mdi:target"></iconify-icon>
                                </span>
                                <div>
                                    <h3 class="posgrado-mvv-card__title">Misión</h3>
                                    <p class="posgrado-mvv-card__subtitle">Nuestro propósito institucional</p>
                                </div>
                            </div>
                            <div class="posgrado-mvv-card__body">
                                <p>La Escuela de Posgrado de la Universidad Privada de Trujillo tiene como propósito formar, mediante una propuesta educativa humanista y científica, a profesionales líderes, capaces de participar armónicamente en la creación de riqueza moral y económica, y comprometidos con la creación de conocimiento y el desarrollo humano de nuestra sociedad.
                                </p>
                            </div>
                        </article>

                        <article class="posgrado-mvv-card posgrado-mvv-card--vision">
                            <div class="posgrado-mvv-card__head">
                                <span class="posgrado-mvv-card__icon" aria-hidden="true">
                                    <iconify-icon icon="mdi:eye-outline"></iconify-icon>
                                </span>
                                <div>
                                    <h3 class="posgrado-mvv-card__title">Visión</h3>
                                    <p class="posgrado-mvv-card__subtitle">Horizonte institucional</p>
                                </div>
                                <span class="posgrado-mvv-card__badge">2027</span>
                            </div>
                            <div class="posgrado-mvv-card__body">
                                <p>La Escuela de Posgrado de la Universidad Privada de Trujillo aspira a ser reconocida como una de las más importantes del Perú gracias a su alta calidad de enseñanza, a su moderna infraestructura, a la excelencia de sus egresados y al nivel de sus intercambios internacionales. La Escuela de Posgrado de la Universidad Privada de Trujillo estará caracterizada por la innovación, vocación social y compromiso con el desarrollo humano y social</p>
                            </div>
                        </article>
                    </div>

                    <div class="posgrado-mvv-page__cta">
                        <a href="{{ route('escuela-posgrado') }}" class="posgrado-mvv-page__cta-link">
                            Conocer la Escuela de Posgrado
                            <iconify-icon icon="mdi:arrow-right" aria-hidden="true"></iconify-icon>
                        </a>
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
