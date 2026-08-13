@extends('web.layouts.principal')

@section('body_class', 'page-servicio-psicopedagogico')

@section('content')
@include('web.partials.servicio-psicopedagogico.hero')
@include('web.partials.servicio-psicopedagogico.workshops')
@include('web.partials.servicio-psicopedagogico.participate')
@include('web.partials.servicio-psicopedagogico.community')
@include('web.partials.servicio-psicopedagogico.team-testimonials')

<section class="psico-page-footer">
    <div class="container">
        @include('web.partials.bienestar-rsu-campaign-banner')
    </div>
</section>
@endsection
