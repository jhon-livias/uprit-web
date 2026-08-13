@extends('web.layouts.principal')

@section('body_class', 'page-servicio-psicopedagogico')

@section('content')
@include('web.partials.servicio-psicopedagogico.hero')
@include('web.partials.servicio-psicopedagogico.workshops')
@include('web.partials.servicio-psicopedagogico.participate')
@include('web.partials.servicio-psicopedagogico.team-testimonials')

<section class="psico-page-footer">
    <div class="container">
        <div class="psico-footer-banner">
            <div class="psico-footer-banner__item">
                <iconify-icon icon="mdi:account-group-outline" aria-hidden="true"></iconify-icon>
                <div>
                    <p class="psico-footer-banner__title">Bienestar Universitario y Responsabilidad Social Universitaria</p>
                    <p class="psico-footer-banner__subtitle">Comprometidos con tu bienestar y el desarrollo integral.</p>
                </div>
            </div>
            <div class="psico-footer-banner__item">
                <iconify-icon icon="mdi:hand-heart-outline" aria-hidden="true"></iconify-icon>
                <p class="psico-footer-banner__title">Formación para toda la vida</p>
            </div>
        </div>
    </div>
</section>
@endsection
