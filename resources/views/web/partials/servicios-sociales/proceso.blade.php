@php
    $steps = [
        ['icon' => 'mdi:bullhorn-outline', 'title' => 'Convocatoria', 'date' => 'Del 1 al 10 de agosto'],
        ['icon' => 'mdi:file-document-edit-outline', 'title' => 'Presentación', 'date' => 'Del 11 al 16 de agosto'],
        ['icon' => 'mdi:inbox-arrow-down-outline', 'title' => 'Recepción', 'date' => 'Del 17 al 19 de agosto'],
        ['icon' => 'mdi:clipboard-check-outline', 'title' => 'Verificación', 'date' => 'Del 20 al 22 de agosto'],
        ['icon' => 'mdi:magnify', 'title' => 'Evaluación', 'date' => 'Del 23 al 27 de agosto'],
        ['icon' => 'mdi:home-search-outline', 'title' => 'Visita', 'date' => 'Del 28 al 31 de agosto'],
        ['icon' => 'mdi:account-voice', 'title' => 'Entrevista', 'date' => 'Del 1 al 3 de septiembre'],
        ['icon' => 'mdi:gavel', 'title' => 'Dictamen', 'date' => 'Del 4 al 6 de septiembre'],
        ['icon' => 'mdi:trophy-outline', 'title' => 'Resultados', 'date' => '8 de septiembre'],
        ['icon' => 'mdi:file-sign', 'title' => 'Formalización', 'date' => 'Del 9 al 12 de septiembre'],
    ];
@endphp

<section class="sociales-proceso" id="proceso">
    <div class="container">
        <header class="sociales-heading">
            <h2 class="sociales-heading__title">Proceso de Solicitud de Becas y Medias Becas</h2>
        </header>

        <ol class="sociales-steps">
            @foreach($steps as $index => $step)
            <li class="sociales-step">
                <span class="sociales-step__number">{{ $index + 1 }}</span>
                <span class="sociales-step__icon" aria-hidden="true">
                    <iconify-icon icon="{{ $step['icon'] }}"></iconify-icon>
                </span>
                <strong class="sociales-step__title">{{ $step['title'] }}</strong>
                <span class="sociales-step__date">{{ $step['date'] }}</span>
            </li>
            @endforeach
        </ol>

        <div class="sociales-proceso__cta">
            <a href="#documentacion" class="sociales-btn sociales-btn--solid">
                <iconify-icon icon="mdi:file-document-outline" aria-hidden="true"></iconify-icon>
                Ver requisitos completos
            </a>
        </div>
    </div>
</section>
