@extends('web.layouts.principal')
@section('content')

@include('web.partials.breadcrumb')

<section class="quienes-somos-area py-5">
    <div class="container">
        <!-- Bloque 1: Historia -->
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="title">Nuestra Historia</h2>
                    <p class="description">
                        La Universidad Privada de Trujillo (UPRIT) nace con el firme propósito de transformar
                        la educación superior en el Perú, formando profesionales íntegros y competitivos que
                        aporten al desarrollo de nuestra región y país.
                    </p>
                    <p class="description">
                        Desde nuestros inicios, nos hemos comprometido con la excelencia académica, la
                        innovación tecnológica y la responsabilidad social.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0 text-center">
                <img src="{{ asset('admin/demo/blo.avif') }}" alt="Historia UPRIT" class="img-fluid rounded" style="max-height: 250px;">
            </div>
        </div>

        <!-- Bloque 2: Misión y Visión -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="card-body text-center p-5">
                        <i class="icon-target fs-1 mb-3" style="color: var(--color-primary);"></i>
                        <h3 class="title">Nuestra Misión</h3>
                        <p class="description">
                            Formar profesionales líderes, competitivos y emprendedores, con sólidos principios
                            éticos, capacidad de investigación e innovación, que contribuyan al desarrollo
                            sostenible de la sociedad.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-light">
                    <div class="card-body text-center p-5">
                        <i class="icon-eye fs-1 mb-3" style="color: var(--color-primary);"></i>
                        <h3 class="title">Nuestra Visión</h3>
                        <p class="description">
                            Ser una universidad líder a nivel nacional e internacional, reconocida por su
                            excelencia académica, investigación científica e innovación tecnológica,
                            comprometida con el desarrollo social y empresarial.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bloque 3: Autoridades -->
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="title">Nuestras Autoridades</h2>
                <p class="description">Conoce al equipo líder que guía el camino de nuestra universidad.</p>
            </div>
        </div>

        @if(count($alta_direccion) > 0)
        <div class="row justify-content-center mb-5">
            @foreach($alta_direccion as $autoridad)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="rounded-circle overflow-hidden mx-auto mb-3 shadow-sm border border-2 border-white" style="width: 150px; height: 150px; background-color: #eee;">
                            <img src="{{ $autoridad['foto'] ? asset($autoridad['foto']) : asset('web/assets/images/svg-icons/instructor.svg') }}" alt="{{ $autoridad['nombre'] }}" class="img-fluid h-100 w-100" style="object-fit: cover;">
                        </div>
                        <h5 class="title mb-1 fs-5">{{ $autoridad['nombre'] }}</h5>
                        <p class="text-muted mb-3 small">{{ $autoridad['cargo'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
