@extends('web.layouts.principal')

@section('body_class', 'page-servicios-deportivos')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500;1,600&display=swap" rel="stylesheet">
@endsection

@section('content')
@include('web.partials.servicios-deportivos.hero')
@include('web.partials.servicios-deportivos.about')
@include('web.partials.servicios-deportivos.talleres')
@include('web.partials.servicios-deportivos.docentes')
@include('web.partials.servicios-deportivos.videos')
@include('web.partials.servicios-deportivos.page-footer')
@endsection
