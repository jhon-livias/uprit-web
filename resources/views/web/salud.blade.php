@extends('web.layouts.principal')

@section('body_class', 'page-alimentacion-saludable')

@section('content')
<section class="alimentacion-hero">
    <div class="container">
        <div class="alimentacion-hero__inner">
            <h1 class="alimentacion-hero__title">Programa de alimentación saludable</h1>
            <p class="alimentacion-hero__lead">
                Fomentamos hábitos alimenticios saludables y un estilo de vida equilibrado para toda la comunidad universitaria.
            </p>
            <p class="alimentacion-hero__text">
                Desde Bienestar Universitario impulsamos una cultura de alimentación consciente, prevención y autocuidado, en articulación con los Servicios de Salud de la UPRIT.
            </p>
            <div class="alimentacion-hero__actions">
                <a href="{{ route('servicios-de-salud') }}" class="alimentacion-hero__btn">
                    Ver Servicios de Salud
                    <span aria-hidden="true">→</span>
                </a>
                <a href="mailto:{{ config('bienestar.email') }}" class="alimentacion-hero__link">
                    {{ config('bienestar.email') }}
                </a>
            </div>
        </div>
    </div>
</section>

@include('web.partials.rsu.page-footer')
@endsection
