@php
    $page = config('investigacion_paginas.vinculacion_empresas');
@endphp

<div class="text-block text-center">
    <h3 class="title">{{ $page['hero']['titulo'] }}</h3>
    <p>{{ $page['hero']['subtitulo'] }}</p>
</div>

<div class="text-block investigacion-vinculacion">
    <h3 class="title">{{ $page['intro']['titulo'] }}</h3>
    <p class="investigacion-vinculacion__lead">{{ $page['intro']['lead'] }}</p>
    @foreach ($page['intro']['paragraphs'] as $paragraph)
        <p>{{ $paragraph }}</p>
    @endforeach
    <ul>
        @foreach ($page['intro']['bullets'] as $bullet)
            <li>{{ $bullet }}</li>
        @endforeach
    </ul>
    <p class="investigacion-vinculacion__contacto">
        <strong>{{ $page['intro']['contacto']['titulo'] }}</strong><br>
        <a href="{{ route($page['intro']['contacto']['route']) }}" class="edu-btn btn-medium">
            {{ $page['intro']['contacto']['label'] }}
            <i class="icon-4"></i>
        </a>
    </p>
</div>

<div class="text-block investigacion-vinculacion">
    <h3 class="title">{{ $page['alianzas']['titulo'] }}</h3>
    <p>{{ $page['alianzas']['texto'] }}</p>
</div>

<div class="text-block investigacion-vinculacion">
    <h3 class="title">{{ $page['propuesta_valor']['titulo'] }}</h3>
    <p>{{ $page['propuesta_valor']['intro'] }}</p>
    <p>{{ $page['propuesta_valor']['pilares_titulo'] }}</p>
    @foreach ($page['propuesta_valor']['pilares'] as $pilar)
        <h4 class="investigacion-vinculacion__subtitulo">{{ $pilar['titulo'] }}</h4>
        <p>{{ $pilar['texto'] }}</p>
    @endforeach
</div>

<div class="text-block investigacion-vinculacion">
    <h3 class="title">{{ $page['socios_corporativos']['titulo'] }}</h3>
    @foreach ($page['socios_corporativos']['items'] as $item)
        <h4 class="investigacion-vinculacion__subtitulo">{{ $item['titulo'] }}</h4>
        <p>{{ $item['texto'] }}</p>
    @endforeach
</div>

@foreach ($page['servicios'] as $bloque)
    <div class="text-block investigacion-vinculacion">
        <h3 class="title">{{ $bloque['titulo'] }}</h3>
        @if (!empty($bloque['intro']))
            <p>{{ $bloque['intro'] }}</p>
        @endif
        @foreach ($bloque['items'] as $item)
            <h4 class="investigacion-vinculacion__subtitulo">{{ $item['titulo'] }}</h4>
            <p>{{ $item['texto'] }}</p>
        @endforeach
    </div>
@endforeach
