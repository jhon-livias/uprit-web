@extends('web.layouts.principal')

@section('body_class', 'page-noticias')

@section('styles')
<style>
.news-hub { padding: 150px 0 90px; background: linear-gradient(135deg, #f8f8fa 0%, #fff 55%, #f4e8eb 100%); }
.news-hub__hero { max-width: 780px; margin: 0 auto 42px; text-align: center; }.news-hub__eyebrow { color: #91001e; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; }.news-hub__hero h1 { margin: 8px 0 12px; color: #20272f; font-size: clamp(34px,5vw,55px); }.news-hub__hero p { margin: 0; color: #5f6368; font-size: 18px; }
.news-hub__tools { display:flex; align-items:center; justify-content:space-between; gap:20px; margin-bottom:30px; }.news-hub__filters { display:flex; flex-wrap:wrap; gap:9px; }.news-hub__filter { padding:8px 14px; border-radius:999px; background:#fff; color:#3d4248; box-shadow:0 2px 10px rgba(0,0,0,.06); font-size:14px; font-weight:600; }.news-hub__filter:hover,.news-hub__filter.is-active { background:#91001e; color:#fff; }.news-hub__search { position:relative; min-width:260px; }.news-hub__search input { width:100%; height:43px; padding:0 44px 0 15px; border:1px solid #dedfe2; border-radius:10px; background:#fff; }.news-hub__search button { position:absolute; right:0; top:0; width:43px; height:43px; border:0; background:transparent; color:#91001e; }
.news-hub__grid { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:26px; }.news-card { display:flex; flex-direction:column; min-height:100%; overflow:hidden; border-radius:16px; background:#fff; box-shadow:0 8px 26px rgba(28,31,35,.09); color:inherit; text-decoration:none; transition:transform .2s,box-shadow .2s; }.news-card:hover { color:inherit; transform:translateY(-6px); box-shadow:0 18px 35px rgba(28,31,35,.16); }.news-card__image { width:100%; height:220px; object-fit:cover; background:#ececef; }.news-card__body { display:flex; flex:1; flex-direction:column; padding:22px; }.news-card__meta { display:flex; justify-content:space-between; gap:12px; color:#91001e; font-size:12px; font-weight:700; text-transform:uppercase; }.news-card h2 { margin:13px 0 10px; color:#20272f; font-size:21px; line-height:1.3; }.news-card p { margin:0 0 18px; color:#65686d; line-height:1.55; }.news-card__more { margin-top:auto; color:#91001e; font-size:14px; font-weight:700; }.news-hub__empty { grid-column:1/-1; padding:58px 25px; border-radius:16px; background:#fff; color:#65686d; text-align:center; }
@media(max-width:991px){.news-hub{padding-top:115px}.news-hub__grid{grid-template-columns:repeat(2,minmax(0,1fr));}} @media(max-width:650px){.news-hub{padding:100px 0 55px}.news-hub__tools{align-items:stretch;flex-direction:column}.news-hub__search{min-width:0}.news-hub__grid{grid-template-columns:1fr}.news-card__image{height:205px}}
</style>
@endsection

@section('content')
<main class="news-hub">
    <div class="container">
        <header class="news-hub__hero"><span class="news-hub__eyebrow">Comunidad UPRIT</span><h1>Noticias y actualidad</h1><p>Encuentra convocatorias, eventos, logros e iniciativas que conectan a nuestra comunidad.</p></header>
        <div class="news-hub__tools">
            <nav class="news-hub__filters" aria-label="Filtrar por categoría"><a class="news-hub__filter {{ request()->route('categoria') ? '' : 'is-active' }}" href="{{ route('web.noticias') }}">Todas</a>@foreach($categorias as $categoria)<a class="news-hub__filter {{ (string) request()->route('categoria') === (string) $categoria->id ? 'is-active' : '' }}" href="{{ route('web.noticias', $categoria->id) }}">{{ $categoria->nombre }}</a>@endforeach</nav>
            <form class="news-hub__search" action="{{ route('web.noticias', request()->route('categoria')) }}" method="GET"><input name="buscar" value="{{ request('buscar') }}" placeholder="Buscar noticias"><button aria-label="Buscar"><i class="icon-2"></i></button></form>
        </div>
        <div class="news-hub__grid">
            @forelse($noticias as $noticia)
                @php($url = $noticia->enlace_externo ?: route('web.detallenoticia', ['slug' => $noticia->slug]))
                <a class="news-card" href="{{ $url }}" @if($noticia->enlace_externo && $noticia->abrir_nueva_pestana) target="_blank" rel="noopener noreferrer" @endif>
                    @if($noticia->imagen)<img class="news-card__image" src="{{ asset('noticias_imagenes/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" loading="lazy">@endif
                    <div class="news-card__body"><div class="news-card__meta"><span>{{ $noticia->categoriaNoticia?->nombre }}</span><time datetime="{{ $noticia->fecha }}">{{ $noticia->fecha_rango }}</time></div><h2>{{ $noticia->titulo }}</h2><p>{{ \Illuminate\Support\Str::limit($noticia->descripcion_corta, 145) }}</p><span class="news-card__more">{{ $noticia->enlace_externo ? 'Ir al enlace' : 'Leer noticia' }} <i class="icon-4"></i></span></div>
                </a>
            @empty <div class="news-hub__empty"><h2>No encontramos noticias</h2><p>Prueba con otra búsqueda o categoría.</p></div>
            @endforelse
        </div>
        @if($noticias->hasPages())<div class="mt-5">{{ $noticias->links() }}</div>@endif
    </div>
</main>
@endsection
