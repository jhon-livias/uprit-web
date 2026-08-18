@php
    $principios = config('centro_investigacion.principios');
@endphp

<div class="text-block">
    <h3 class="title">{{ $principios['titulo'] }}</h3>
</div>

<div class="accordion edu-accordion edu-accordion-sec centro-investigacion-principios" id="centroInvestigacionPrincipios">
    @foreach ($principios['items'] as $index => $principio)
        @php
            $headingId = 'centroPrincipioHeading' . $index;
            $collapseId = 'centroPrincipioCollapse' . $index;
            $isFirst = $index === 0;
        @endphp
        <div class="accordion-item">
            <h3 class="accordion-header" id="{{ $headingId }}">
                <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#{{ $collapseId }}"
                    aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                    aria-controls="{{ $collapseId }}">
                    {{ $principio['titulo'] }}
                </button>
            </h3>
            <div id="{{ $collapseId }}"
                class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                aria-labelledby="{{ $headingId }}"
                data-bs-parent="#centroInvestigacionPrincipios">
                <div class="accordion-body">
                    <p>{{ $principio['descripcion'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
