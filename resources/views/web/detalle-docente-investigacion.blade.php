@extends('web.layouts.principal')
@section('content')

<div class="docente-investigador-hero">
    <div class="container">
        <div class="docente-investigador-hero__content">
            <h1 class="docente-investigador-hero__title">Detalles de {{ $docente->nombre }}</h1>
            <p class="docente-investigador-hero__quote">
                La raíz de la educación es amarga, pero su fruto es dulce. — Aristóteles
            </p>
        </div>
    </div>
</div>

<section class="docente-investigador-perfil">
    <div class="container">
        @if($docente->imagen)
        <div class="docente-investigador-perfil__foto-wrap">
            <img src="{{ asset($docente->imagen) }}" alt="{{ $docente->nombre }}" class="docente-investigador-perfil__foto">
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-5">
                <div class="docente-investigador-perfil__card">
                    <h2 class="docente-investigador-perfil__nombre">{{ $docente->nombre }}</h2>

                    @if(!empty($docente->tags))
                    <div class="docente-investigador-perfil__tags">
                        @foreach($docente->tags as $tag)
                        <span class="docente-investigador-perfil__tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif

                    @if($docente->correo)
                    <div class="docente-investigador-perfil__dato">
                        <span class="docente-investigador-perfil__label">Correo</span>
                        <a href="mailto:{{ $docente->correo }}" class="docente-investigador-perfil__valor">
                            <i class="icon-28"></i> {{ $docente->correo }}
                        </a>
                    </div>
                    @endif

                    @if($docente->departamento)
                    <div class="docente-investigador-perfil__dato">
                        <span class="docente-investigador-perfil__label">Departamento</span>
                        <span class="docente-investigador-perfil__valor">
                            <i class="icon-47"></i> {{ $docente->departamento }}
                        </span>
                    </div>
                    @endif

                    @if($docente->linkedin)
                    <div class="docente-investigador-perfil__dato">
                        <span class="docente-investigador-perfil__label">LinkedIn</span>
                        <a href="{{ $docente->linkedin }}" target="_blank" rel="noopener noreferrer" class="docente-investigador-perfil__valor">
                            Ver perfil
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="docente-investigador-perfil__historial">
                    <span class="docente-investigador-perfil__badge">Historial</span>
                    <div class="docente-investigador-perfil__bio">
                        @if($docente->resumen_investigacion)
                            {!! nl2br(e($docente->resumen_investigacion)) !!}
                        @else
                            <p class="text-muted mb-0">Información de perfil en actualización.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 mb-4">
            <a href="{{ route('direccion') }}" class="docente-investigador-perfil__volver">
                ← Volver a Dirección de Investigación
            </a>
        </div>
    </div>
</section>

@include('web.layouts.marquesina')
@endsection
