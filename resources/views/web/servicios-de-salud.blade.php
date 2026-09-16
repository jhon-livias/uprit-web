@extends('web.layouts.principal')

@section('body_class', 'page-servicios-salud')

@section('content')
@include('web.partials.servicios-salud.hero')
@include('web.partials.servicios-salud.services')
@include('web.partials.servicios-salud.topics')
@include('web.partials.servicios-salud.team')
@include('web.partials.servicios-salud.cta')
@include('web.partials.servicios-salud.contact')

@include('web.partials.rsu.page-footer')
@endsection
