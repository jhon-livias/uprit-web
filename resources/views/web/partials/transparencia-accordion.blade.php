@if($secciones->isNotEmpty())
<div class="accordion edu-accordion edu-accordion-sec" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
    @foreach($secciones as $seccion)
        @php
            $collapseId = 'collapseTrans' . $seccion->id;
            $headingId = 'headingTrans' . $seccion->id;
            $expanded = $seccion->abierta_por_defecto;
        @endphp
        <div class="accordion-item">
            @if($loop->first)
                <h3 class="accordion-header" id="{{ $headingId }}">
            @else
                <h2 class="accordion-header" id="{{ $headingId }}">
            @endif
                <button class="accordion-button {{ $expanded ? '' : 'collapsed' }}" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                    aria-expanded="{{ $expanded ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                    @include('web.partials.transparencia-icon', ['icono' => $seccion->icono])
                    <div class="ms-3 text-start">
                        <div>{{ $seccion->titulo }}</div>
                        @if($seccion->subtitulo)
                            <small>{{ $seccion->subtitulo }}</small>
                        @endif
                    </div>
                </button>
            @if($loop->first)
                </h3>
            @else
                </h2>
            @endif

            <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $expanded ? 'show' : '' }}"
                aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="course-lesson espacio-trans">
                        @foreach($seccion->documentos as $documento)
                            <a href="{{ $documento->enlace() }}" target="_blank"
                                class="d-flex align-items-center {{ !$loop->last ? 'mb-2' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 text-muted-foreground">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                    <path d="M10 9H8"></path>
                                    <path d="M16 13H8"></path>
                                    <path d="M16 17H8"></path>
                                </svg>
                                {{ $documento->etiqueta }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
    @include('web.partials.transparencia-legacy')
@endif
