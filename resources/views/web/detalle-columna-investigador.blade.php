@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb', [
    'title' => $articulo['titulo'],
    'routeParams' => ['slug' => $articulo['slug']],
])

<section class="blog-details-area section-gap-equal">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <article class="blog-details-content direccion-columna-articulo">
                    <div class="entry-content">
                        <span class="category">Columna del Investigador</span>
                        <h3 class="title">{{ $articulo['titulo'] }}</h3>
                    </div>

                    <div class="blog-author">
                        @if (!empty($docente?->imagen))
                            <div class="thumbnail">
                                <img src="{{ asset($docente->imagen) }}" alt="{{ $docente->nombre_con_titulo }}">
                            </div>
                        @endif
                        <div class="author-content">
                            <h5 class="title">{{ $docente?->nombre_con_titulo ?? $articulo['docente_nombre'] }}</h5>
                            @if ($docente?->rol_investigacion_label)
                                <p class="justificar">{{ $docente->rol_investigacion_label }}</p>
                            @else
                                <p class="justificar">Investigador RENACYT</p>
                            @endif
                        </div>
                    </div>

                    <div class="des-completa direccion-columna-articulo__cuerpo">
                        @foreach ($articulo['parrafos'] ?? [] as $parrafo)
                            <p class="tag-descripcion justificar">{{ $parrafo }}</p>
                        @endforeach

                        @if (!empty($articulo['cita']))
                            <blockquote class="direccion-columna-articulo__cita">
                                <p>“{{ $articulo['cita'] }}”</p>
                            </blockquote>
                        @endif
                    </div>

                    <p class="tag-descripcion descargos-responsabilidad justificar">
                        <b>Descargos de responsabilidad</b><br>
                        Recordamos a los lectores que cada artículo se basa en opiniones exclusivas e independientes de sus respectivos autores y que estas no reflejan las ideas, ideologías ni puntos de vista de la Universidad Privada de Trujillo, ni de ninguna organización vinculada a la Universidad o a los autores.
                    </p>

                    <div class="text-center mt-5 mb-4">
                        <a href="{{ route('direccion') }}" class="docente-investigador-perfil__volver">
                            ← Volver a Dirección de Investigación
                        </a>
                    </div>
                </article>
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
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection
