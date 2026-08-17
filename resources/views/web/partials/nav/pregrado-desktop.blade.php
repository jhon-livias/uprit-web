@php
    $tabRegular = $navGroup->meta['tab_regular_label'] ?? 'Pregrado Regular';
    $tabPuede = $navGroup->meta['tab_puede_label'] ?? 'Pregrado Puede';
    $tabPuedeHint = $navGroup->meta['tab_puede_hint'] ?? 'Para personas que trabajan';
    $tabSegunda = $navGroup->meta['tab_segunda_label'] ?? 'Segunda Especialidad';
@endphp
<li class="has-droupdown mega-pregrado">
    <a href="#">{{ $navGroup->label }}</a>
    <div class="mega-pregrado-wrapper mega-tabs-wrapper">
        <div class="mega-categorias" role="tablist" aria-label="{{ $navGroup->label }}">
            <button type="button" class="cat-btn active"
                data-target="pregrado-regular"
                role="tab"
                aria-selected="true"
                aria-controls="pregrado-regular">
                {{ $tabRegular }}
            </button>
            <button type="button" class="cat-btn"
                data-target="pregrado-puede"
                role="tab"
                aria-selected="false"
                aria-controls="pregrado-puede">
                {{ $tabPuede }}
                <small class="cat-btn-hint d-block">{{ $tabPuedeHint }}</small>
            </button>
            <button type="button" class="cat-btn"
                data-target="pregrado-segunda"
                role="tab"
                aria-selected="false"
                aria-controls="pregrado-segunda">
                {{ $tabSegunda }}
            </button>
        </div>
        <div class="mega-contenido">
            <div class="mega-box active" id="pregrado-regular" role="tabpanel">
                @include('web.partials.nav.pregrado-facultades', ['categorias' => $pregradoCategorias])
            </div>
            <div class="mega-box" id="pregrado-puede" role="tabpanel">
                @include('web.partials.nav.pregrado-facultades', ['categorias' => $pregradoPuedeCategorias])
            </div>
            <div class="mega-box" id="pregrado-segunda" role="tabpanel">
                @include('web.partials.nav.pregrado-facultades', ['categorias' => $segundaEspecialidadCategorias])
            </div>
        </div>
    </div>
</li>
