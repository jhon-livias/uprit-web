@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

@php
    $page = config('investigacion_paginas.repositorio_publicaciones');
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
                        <a href="{{ $page['cta']['url'] }}" class="edu-btn btn-medium" target="_blank" rel="noopener noreferrer">
                            {{ $page['cta']['label'] }}
                            <i class="icon-4"></i>
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
