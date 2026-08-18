@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

@php
    $page = config('investigacion_paginas.denuncias_etica_investigacion');
@endphp

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy investigacion-pagina">
                    <div class="text-block text-center">
                        <h3 class="title">{{ $page['hero']['titulo'] }}</h3>
                        <p>{{ $page['hero']['subtitulo'] }}</p>
                    </div>
                    <div class="text-block">
                        @foreach ($page['intro'] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                    @include('web.partials.investigacion.codigo-etica-contacto')
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
