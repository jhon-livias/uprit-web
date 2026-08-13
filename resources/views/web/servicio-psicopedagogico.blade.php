@extends('web.layouts.principal')

@section('body_class', 'page-servicio-psicopedagogico')

@section('content')
@include('web.partials.servicio-psicopedagogico.hero')
@include('web.partials.servicio-psicopedagogico.workshops')
@include('web.partials.servicio-psicopedagogico.participate')
@include('web.partials.servicio-psicopedagogico.team-testimonials')

@include('web.partials.rsu.page-footer')
@endsection
