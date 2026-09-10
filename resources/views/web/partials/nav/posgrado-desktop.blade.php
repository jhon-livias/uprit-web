@php
    use App\Services\NavMenuService;
    $categorias = $posgradoCategorias;
    $presentacionLabel = NavMenuService::informesLabel($navGroup);
    $hasCategorias = $categorias->isNotEmpty();
@endphp
<li class="has-droupdown mega-posgrado">
    <a href="#">{{ $navGroup->label }}</a>
<div class="mega-posgrado-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="{{ $navGroup->label }}">
            @foreach($categorias as $index => $categoria)
            <button type="button" class="cat-btn {{ $loop->first ? 'active' : '' }}"
                data-target="cat-{{ $categoria->id }}"
                role="tab"
                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                aria-controls="cat-{{ $categoria->id }}">
                {{ $categoria->nombre }}
            </button>
            @endforeach
            @if($navGroup->informes_key)
            <button type="button" class="cat-btn {{ !$hasCategorias ? 'active' : '' }}" data-target="informes" role="tab" aria-selected="{{ !$hasCategorias ? 'true' : 'false' }}" aria-controls="informes">
                {{ $presentacionLabel }}
            </button>
            @endif
        </div>
        <div class="mega-contenido">
            @foreach($categorias as $index => $categoria)
            <div class="mega-box {{ $loop->first ? 'active' : '' }}" id="cat-{{ $categoria->id }}" role="tabpanel">
                @foreach($categoria->hijos as $hijo)
                @continue($hijo->carreras->isEmpty())
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
            <div class="mega-box {{ !$hasCategorias ? 'active' : '' }}" id="informes" role="tabpanel">
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
