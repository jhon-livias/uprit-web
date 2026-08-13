@php
    $documents = [
        ['icon' => 'mdi:file-document-edit-outline', 'label' => 'Solicitud de pedido'],
        ['icon' => 'mdi:clipboard-account-outline', 'label' => 'Ficha socio-económica'],
        ['icon' => 'mdi:file-check-outline', 'label' => 'Declaración Jurada'],
        ['icon' => 'mdi:card-account-details-outline', 'label' => 'Copia del DNI'],
        ['icon' => 'mdi:home-map-marker', 'label' => 'Croquis y foto de la vivienda'],
        ['icon' => 'mdi:water-outline', 'label' => 'Recibo de agua o luz'],
        ['icon' => 'mdi:file-certificate-outline', 'label' => 'Constancia de no adeudo'],
        ['icon' => 'mdi:file-document-outline', 'label' => 'Boleta de Matrícula'],
        ['icon' => 'mdi:notebook-outline', 'label' => 'Boleta de Notas'],
    ];

    $scholarships = [
        [
            'icon' => 'mdi:medal-outline',
            'title' => 'Excelencia Académica',
            'text' => 'Primer puesto de cada carrera (mínimo 18 créditos aprobados).',
        ],
        [
            'icon' => 'mdi:run',
            'title' => 'Deportiva',
            'text' => 'Para selecciones universitarias (cobertura parcial del 50%, total del 100% o especial con beneficios extra).',
        ],
        [
            'icon' => 'mdi:hand-heart-outline',
            'title' => 'Orfandad (Ley 23585)',
            'text' => 'Por fallecimiento, inhabilitación o sentencia del tutor económico, acreditando falta de recursos.',
        ],
        [
            'icon' => 'mdi:account-group-outline',
            'title' => 'Socioeconómica (50% a 100%)',
            'text' => 'Para alumnos con buen rendimiento y situación económica desfavorable.',
        ],
        [
            'icon' => 'mdi:handshake-outline',
            'title' => 'Especiales por Convenio',
            'text' => 'Financiadas por instituciones externas bajo sus propias reglas.',
        ],
    ];
@endphp

<section class="sociales-info" id="documentacion">
    <div class="container">
        <div class="sociales-info__grid">
            <article class="sociales-panel">
                <header class="sociales-panel__header">
                    <h2 class="sociales-panel__title">Documentación a Presentar</h2>
                    <p class="sociales-panel__lead">
                        El estudiante solicitante deberá adjuntar los siguientes documentos:
                    </p>
                </header>

                <div class="sociales-docs">
                    @foreach($documents as $document)
                    <article class="sociales-doc">
                        <span class="sociales-doc__icon" aria-hidden="true">
                            <iconify-icon icon="{{ $document['icon'] }}"></iconify-icon>
                        </span>
                        <p class="sociales-doc__label">{{ $document['label'] }}</p>
                    </article>
                    @endforeach
                </div>

                <aside class="sociales-alert">
                    <span class="sociales-alert__icon" aria-hidden="true">!</span>
                    <div>
                        <h3 class="sociales-alert__title">¡Importante!</h3>
                        <p>Adjuntar todos los documentos de manera legible y vigente, según el reglamento de becas UPRIT.</p>
                    </div>
                </aside>
            </article>

            <article class="sociales-panel" id="tipos-becas">
                <header class="sociales-panel__header">
                    <h2 class="sociales-panel__title">Tipos de Becas UPRIT</h2>
                </header>

                <div class="sociales-becas">
                    @foreach($scholarships as $beca)
                    <article class="sociales-beca">
                        <span class="sociales-beca__icon" aria-hidden="true">
                            <iconify-icon icon="{{ $beca['icon'] }}"></iconify-icon>
                        </span>
                        <div>
                            <h3 class="sociales-beca__title">{{ $beca['title'] }}</h3>
                            <p class="sociales-beca__text">{{ $beca['text'] }}</p>
                        </div>
                    </article>
                    @endforeach
                </div>
            </article>
        </div>
    </div>
</section>
