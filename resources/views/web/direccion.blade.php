@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="privacy-policy">
                    <div class="text-block text-center">
                        <h3 class="title">Promoción del Deporte y Actividad Física</h3>
                        <p>La investigación es el corazón de la innovación en UPRIT. Nuestros estudiantes aprenden haciendo, resolviendo problemas reales junto a expertos de talla mundial.</p>
                    </div>
                    <div class="text-block">
                        <h3 class="title">Nuestros Principios de Investigación</h3>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">
                                    <div class="course-curriculam mb--90">
                                        <div class="accordion edu-accordion edu-accordion-sec" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Colaboración Internacional
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>
                                                                Promovemos espacios de investigación que fortalecen las redes de colaboración con universidades y organizaciones en todo el mundo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Producción Científica
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Creamos un entorno para la producción científica, buscando posicionar a UPRIT como un referente de conocimiento y vanguardia.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Investigación con Impacto
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="course-lesson">
                                                            <p>Nuestros proyectos impulsan la innovación en ciencia, tecnología, agricultura, humanidades y más, beneficiando al país y al mundo.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <div class="edu-blog-widget widget-latest-post">
                        <div class="inner">
                            <h4 class="widget-title">Últimas Noticias</h4>
                            <div class="content latest-post-list">
                                @foreach($ultimasnoticias as $ultima)
                                <div class="latest-post">
                                    <div class="thumbnail">
                                        <a href="{{route('web.detallenoticia',$ultima->id)}}">
                                            <img src="{{ asset('noticias_imagenes/' . $ultima->imagen) }}" alt="Blog Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a href="{{route('web.detallenoticia',$ultima->id)}}">{{$ultima->titulo}}</a></h6>
                                        <ul class="blog-meta">
                                            <li><i class="icon-27"></i>{{ ucfirst(\Carbon\Carbon::parse($ultima->fecha)->locale('es')->translatedFormat('d F, Y')) }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

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
                <img src="{{ asset($docente->imagen) }}" alt="{{ $docente->nombre }}" style="width:120px;height:120px;border-radius:50%;object-fit:cover;margin-bottom:20px;">
                @endif
                <h5 style="font-weight:700;margin-bottom:10px;">{{ $docente->nombre }}</h5>
                @if($docente->resumen_investigacion)
                <p style="font-size:14px;color:#666;line-height:1.6;margin-bottom:20px;max-height:80px;overflow:hidden;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;text-overflow:ellipsis;">
                    {{ $docente->resumen_investigacion }}
                </p>
                @endif
                @foreach($docente->tags ?? [] as $tag)
                <span style="display:inline-block;border:1px solid #c4002f;color:#c4002f;border-radius:20px;padding:4px 12px;font-size:12px;margin:3px;">{{ $tag }}</span>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>

</section>
@include('web.layouts.marquesina')
@endsection