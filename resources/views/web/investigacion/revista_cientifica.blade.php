@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

@php
    $page = config('investigacion_paginas.revista_cientifica');
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
                    <div class="text-block investigacion-pagina__cta">
                        <h4 class="investigacion-pagina__subtitulo">{{ $page['cta']['titulo'] }}</h4>
                        <p>{{ $page['cta']['texto'] }}</p>
                        <p><em>{{ $page['cta']['eslogan'] }}</em></p>
                        <a href="{{ $page['cta']['url'] }}" class="edu-btn btn-medium" target="_blank" rel="noopener noreferrer">
                            {{ $page['cta']['label'] }}
                            <i class="icon-4"></i>
                        </a>
                    </div>
                    <div class="text-block">
                        <h3 class="title">{{ $page['fondo_editorial']['titulo'] }}</h3>
                        <p>{{ $page['fondo_editorial']['descripcion'] }}</p>
                        <a href="{{ $page['fondo_editorial']['documento_url'] }}" class="investigacion-pagina__documento" target="_blank" rel="noopener noreferrer">
                            {{ $page['fondo_editorial']['documento_label'] }}
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
