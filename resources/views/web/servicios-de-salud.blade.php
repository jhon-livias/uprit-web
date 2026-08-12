@extends('web.layouts.principal')
@section('content')
@include('web.partials.servicios-salud.hero')
@include('web.partials.servicios-salud.services')
@include('web.partials.servicios-salud.topics')
@include('web.partials.servicios-salud.team')
@include('web.partials.servicios-salud.cta')
@include('web.partials.servicios-salud.contact')

<section class="salud-page-footer">
    <div class="container">
        @include('web.partials.bienestar-rsu-campaign-banner')
    </div>
</section>
@endsection
