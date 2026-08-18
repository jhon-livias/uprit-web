@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block text-center">
                        <h3 class="title">Ciencia e Innovación para un Futuro Sostenible</h3>
                        <p>En la UPRIT promovemos una cultura de investigación, innovación y emprendimiento científico que integra a estudiantes, docentes y aliados estratégicos para desarrollar proyectos multidisciplinarios, generar nuevo conocimiento y contribuir al desarrollo sostenible de la región y del país.</p>
                    </div>
                    <div class="text-block">
                        @include('web.partials.direccion-investigacion.ejes-accordion')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="edu-blog-sidebar textos-derecha">
                    <div class="edu-blog-widget widget-categories">
                        <div class="inner">
                            <h4 class="widget-title">Categorias</h4>
                            <div class="content">
                                @include('web.partials.section-nav')
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    @include('web.partials.direccion-investigacion.columna-sidebar')

                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="text-block text-center">
            <h3 class="title">Equipo Directivo de Investigación</h3>
            <p style="padding-left: 58px; padding-right: 58px;">Un grupo de profesionales con amplia experiencia académica y de gestión, comprometidos con brindar una educación de calidad, formar líderes y transformar el futuro de nuestros estudiantes.</p>
        </div>
        <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:30px;margin-top:50px;">
            @foreach($docentesInvestigadores as $docente)
            <div style="width:260px;border:1px solid #e5e5e5;border-radius:18px;padding:30px 20px;text-align:center;background:#fff;transition:.3s;">
                @if($docente->imagen)
                <img src="{{ asset($docente->imagen) }}" alt="{{ $docente->nombre_con_titulo }}" style="width:120px;height:120px;border-radius:50%;object-fit:cover;margin-bottom:20px;">
                @endif
                <h5 style="font-weight:700;margin-bottom:10px;">{{ $docente->nombre_con_titulo }}</h5>
                @if($docente->resumen_investigacion)
                <p style="font-size:14px;color:#666;line-height:1.6;margin-bottom:20px;max-height:80px;overflow:hidden;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;text-overflow:ellipsis;">
                    {{ $docente->resumen_investigacion }}
                </p>
                @endif
                @foreach($docente->tags ?? [] as $tag)
                <span style="display:inline-block;border:1px solid #c4002f;color:#c4002f;border-radius:20px;padding:4px 12px;font-size:12px;margin:3px;">{{ $tag }}</span>
                @endforeach
                <div style="margin-top:18px;">
                    <a href="{{ route('direccion.docente', $docente->id) }}" class="btn-ver-perfil-docente">
                        Ver Perfil →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
@include('web.layouts.marquesina')
@endsection