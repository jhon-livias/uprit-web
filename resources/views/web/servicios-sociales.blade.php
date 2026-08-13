@extends('web.layouts.principal')

@section('body_class', 'page-servicios-sociales')

@section('content')
@include('web.partials.servicios-sociales.hero')
@include('web.partials.servicios-sociales.values')
@include('web.partials.servicios-sociales.proceso')
@include('web.partials.servicios-sociales.docs-becas')
@include('web.partials.servicios-sociales.diversidad')
@include('web.partials.servicios-sociales.news-contact')

@include('web.partials.rsu.page-footer')
@endsection
