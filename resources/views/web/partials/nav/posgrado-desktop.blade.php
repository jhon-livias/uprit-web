@php
    $categorias = $posgradoCategorias;
@endphp
<li class="has-droupdown mega-posgrado">
    <a href="#">{{ $navGroup->label }}</a>
<div class="mega-posgrado-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="{{ $navGroup->label }}">
            @foreach($categorias as $index => $categoria)
            <button type="button" class="cat-btn {{ $index == 0 ? 'active' : '' }}"
                data-target="cat-{{ $categoria->id }}"
                role="tab"
                aria-selected="{{ $index == 0 ? 'true' : 'false' }}"
                aria-controls="cat-{{ $categoria->id }}">
                {{ $categoria->nombre }}
            </button>
            @endforeach
            @if($navGroup->informes_key)
            <button type="button" class="cat-btn" data-target="informes" role="tab" aria-selected="false" aria-controls="informes">
                Infórmate Más
            </button>
            @endif
        </div>
        <div class="mega-contenido">
            @foreach($categorias as $index => $categoria)
            <div class="mega-box {{ $index == 0 ? 'active' : '' }}" id="cat-{{ $categoria->id }}" role="tabpanel">
                @foreach($categoria->hijos as $hijo)
                <div class="mega-col">
                    <h6 class="menu-title">{{ $hijo->nombre }}</h6>
                    <ul class="content-lista">
                        @foreach($hijo->carreras as $carrera)
                        <li>
                            <a href="{{ route('web.detallecarrera', $carrera->id) }}">{{ $carrera->nombre }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            @endforeach
            @if($navGroup->informes_key)
            <div class="mega-box" id="informes" role="tabpanel">
                <div class="mega-col">
                    <ul class="content-lista">
                        @include('web.partials.menu-nav-links', ['section' => $navGroup->informes_key, 'context' => 'desktop'])
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</li>
