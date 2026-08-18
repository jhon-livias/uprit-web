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
                    <div class="text-block">
                        <h3 class="title">{{ $page['codigo_etica']['titulo'] }}</h3>
                        <p>{{ $page['codigo_etica']['descripcion'] }}</p>
                        <a href="{{ $page['codigo_etica']['documento_url'] }}" class="investigacion-pagina__documento" target="_blank" rel="noopener noreferrer">
                            {{ $page['codigo_etica']['documento_label'] }}
                        </a>
                    </div>
                    <div class="text-block">
                        <h3 class="title">{{ $page['contacto']['titulo'] }}</h3>
                        <p>{{ $page['contacto']['descripcion'] }}</p>
                        <p>
                            <a href="tel:{{ $page['contacto']['telefono'] }}" class="investigacion-pagina__telefono">
                                {{ $page['contacto']['telefono_display'] }}
                            </a>
                        </p>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
