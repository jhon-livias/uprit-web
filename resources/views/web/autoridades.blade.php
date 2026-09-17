@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="course-details-content course-details-7 autoridades-tabs">
                        <ul class="nav nav-tabs" id="autoridadesTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="directivo-tab" data-bs-toggle="tab" data-bs-target="#directivo" type="button" role="tab" aria-controls="directivo" aria-selected="true">Consejo Directivo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="academicos-tab" data-bs-toggle="tab" data-bs-target="#academicos" type="button" role="tab" aria-controls="academicos" aria-selected="false">Académicos</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="autoridadesTabContent">
                            <div class="tab-pane fade show active" id="directivo" role="tabpanel" aria-labelledby="directivo-tab">
                                <p class="autoridades-intro">
                                    Integrantes del Consejo Directivo, máxima instancia de dirección ejecutiva de la Universidad Privada de Trujillo.
                                </p>

                                @foreach($directivo as $index => $autoridad)
                                <div class="autoridad-fila{{ $index % 2 === 1 ? ' autoridad-fila--invertida' : '' }}">
                                    <div class="autoridad-fila__foto">
                                        <img src="{{ asset($autoridad['foto']) }}"
                                            alt="{{ $autoridad['nombre'] }}"
                                            class="autoridad-foto">
                                    </div>
                                    <div class="autoridad-fila__texto">
                                        <h3>{{ $autoridad['nombre'] }}</h3>
                                        <p>{{ $autoridad['cargo'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="academicos" role="tabpanel" aria-labelledby="academicos-tab">
                                <p class="autoridades-intro">
                                    Equipo académico que conduce las facultades y el gobierno universitario.
                                </p>

                                @foreach($academicas as $index => $autoridad)
                                <div class="autoridad-fila{{ $index % 2 === 1 ? ' autoridad-fila--invertida' : '' }}">
                                    <div class="autoridad-fila__foto">
                                        <img src="{{ $autoridad['foto'] ? asset($autoridad['foto']) : asset('web/assets/images/svg-icons/instructor.svg') }}"
                                            alt="{{ $autoridad['nombre'] }}"
                                            class="autoridad-foto">
                                    </div>
                                    <div class="autoridad-fila__texto">
                                        <h3>{{ $autoridad['nombre'] }}</h3>
                                        <p>{{ $autoridad['cargo'] }}</p>
                                    </div>
                                </div>
                                @endforeach
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
