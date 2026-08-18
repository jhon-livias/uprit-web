@php
    $columna = config('direccion_investigacion.columna');
@endphp

<div class="edu-blog-widget widget-latest-post direccion-columna-widget">
    <div class="inner">
        <h4 class="widget-title">{{ $columna['titulo'] }}</h4>
        <p class="direccion-columna-widget__intro">{{ $columna['intro'] }}</p>
        <div class="content direccion-columna-list">
            @forelse ($columnaInvestigador as $articulo)
                <article class="direccion-columna-item">
                    <div class="direccion-columna-item__author">
                        @if (!empty($articulo['imagen']))
                            <img src="{{ asset($articulo['imagen']) }}" alt="{{ $articulo['nombre_con_titulo'] }}" class="direccion-columna-item__foto">
                        @endif
                        <p class="direccion-columna-item__nombre">{{ $articulo['nombre_con_titulo'] }}</p>
                    </div>
                    <div class="direccion-columna-item__content">
                        <h6 class="direccion-columna-item__titulo">{{ $articulo['titulo'] }}</h6>
                        @if (!empty($articulo['url']))
                            <a href="{{ $articulo['url'] }}" class="direccion-columna-item__link">Leer artículo →</a>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-muted mb-0">Próximamente publicaremos artículos de opinión de nuestros investigadores.</p>
            @endforelse
        </div>
    </div>
</div>
