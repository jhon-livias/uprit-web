@php
    $direccion = config('direccion_investigacion');
    $colaboracion = $direccion['colaboracion_internacional'];
    $produccion = $direccion['produccion_cientifica'];
    $rsu = $direccion['investigacion_rsu'];
    $repositorioUrl = $direccion['repositorio_url'];
@endphp

<div class="text-block">
    <h3 class="title">{{ $direccion['ejes']['titulo'] }}</h3>
    <p class="direccion-investigacion__intro">{{ $direccion['ejes']['intro'] }}</p>
</div>

<div class="accordion edu-accordion edu-accordion-sec direccion-investigacion-accordion" id="direccionInvestigacionAccordion">
    <div class="accordion-item">
        <h3 class="accordion-header" id="direccionColaboracionHeading">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#direccionColaboracion" aria-expanded="true" aria-controls="direccionColaboracion">
                {{ $colaboracion['titulo'] }}
            </button>
        </h3>
        <div id="direccionColaboracion" class="accordion-collapse collapse show" aria-labelledby="direccionColaboracionHeading" data-bs-parent="#direccionInvestigacionAccordion">
            <div class="accordion-body">
                <p class="direccion-investigacion__lead">{{ $colaboracion['descripcion'] }}</p>
                <p class="direccion-investigacion__lead"><strong>{{ $colaboracion['intro'] }}</strong></p>
                @if (!empty($colaboracion['convenios']))
                    <div class="direccion-investigacion-convenios">
                        @foreach ($colaboracion['convenios'] as $convenio)
                            <a href="{{ $convenio['url'] ?? '#' }}" class="direccion-investigacion-convenio" @if(!empty($convenio['url'])) target="_blank" rel="noopener noreferrer" @endif>
                                @if (!empty($convenio['logo']))
                                    <img src="{{ asset($convenio['logo']) }}" alt="{{ $convenio['nombre'] }}">
                                @endif
                                <span>{{ $convenio['nombre'] }}</span>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">Los logotipos de convenios de investigación se publicarán próximamente.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header" id="direccionProduccionHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#direccionProduccion" aria-expanded="false" aria-controls="direccionProduccion">
                {{ $produccion['titulo'] }}
            </button>
        </h3>
        <div id="direccionProduccion" class="accordion-collapse collapse" aria-labelledby="direccionProduccionHeading" data-bs-parent="#direccionInvestigacionAccordion">
            <div class="accordion-body">
                <p class="direccion-investigacion__lead">{{ $produccion['intro'] }}</p>
                <p class="direccion-investigacion__lead">{{ $produccion['descripcion'] }}</p>
                <h4 class="direccion-investigacion__subtitulo">{{ $produccion['proyectos_titulo'] }}</h4>
                @include('web.partials.direccion-investigacion.proyectos-table', [
                    'proyectos' => $produccion['proyectos'],
                    'columns' => ['titulo', 'investigador_principal', 'coautores', 'linea', 'producto'],
                ])
                <div class="direccion-investigacion-repositorio">
                    <a href="{{ $repositorioUrl }}" target="_blank" rel="noopener noreferrer" class="btn-ver-perfil-docente">
                        Acceder al Repositorio Institucional →
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h3 class="accordion-header" id="direccionRsuHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#direccionRsu" aria-expanded="false" aria-controls="direccionRsu">
                {{ $rsu['titulo'] }}
            </button>
        </h3>
        <div id="direccionRsu" class="accordion-collapse collapse" aria-labelledby="direccionRsuHeading" data-bs-parent="#direccionInvestigacionAccordion">
            <div class="accordion-body">
                <p class="direccion-investigacion__lead">{{ $rsu['intro'] }}</p>
                <p class="direccion-investigacion__lead">{{ $rsu['descripcion'] }}</p>
                @include('web.partials.direccion-investigacion.proyectos-table', [
                    'proyectos' => $rsu['proyectos'],
                    'columns' => ['titulo', 'investigador_principal', 'coautores', 'linea', 'aliado', 'producto'],
                ])
            </div>
        </div>
    </div>
</div>
