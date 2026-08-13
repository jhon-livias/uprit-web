@php
    $documents = [
        ['icon' => 'mdi:file-document-outline', 'label' => 'Solicitud de beca'],
        ['icon' => 'mdi:clipboard-text-outline', 'label' => 'Ficha socioeconómica'],
        ['icon' => 'mdi:file-sign', 'label' => 'Declaración jurada'],
        ['icon' => 'mdi:card-account-details-outline', 'label' => 'DNI (copia)'],
        ['icon' => 'mdi:map-outline', 'label' => 'Croquis de vivienda'],
        ['icon' => 'mdi:receipt', 'label' => 'Recibos de servicios'],
        ['icon' => 'mdi:school-outline', 'label' => 'Constancia de estudios'],
        ['icon' => 'mdi:notebook-outline', 'label' => 'Boletas de notas'],
        ['icon' => 'mdi:cash', 'label' => 'Certificado de ingresos'],
    ];

    $scholarships = [
        [
            'icon' => 'mdi:trophy-outline',
            'title' => 'Excelencia Académica',
            'text' => 'Reconoce el alto rendimiento y el mérito académico sostenido.',
        ],
        [
            'icon' => 'mdi:run',
            'title' => 'Deportiva',
            'text' => 'Para estudiantes que representan a la UPRIT en competencias.',
        ],
        [
            'icon' => 'mdi:heart-outline',
            'title' => 'Orfandad',
            'text' => 'Apoyo económico a estudiantes en situación de orfandad.',
        ],
        [
            'icon' => 'mdi:home-heart',
            'title' => 'Socioeconómica',
            'text' => 'Ayuda para continuar estudios ante dificultades económicas.',
        ],
        [
            'icon' => 'mdi:handshake-outline',
            'title' => 'Especiales por Convenio',
            'text' => 'Becas derivadas de alianzas institucionales y convenios.',
        ],
    ];
@endphp

<section class="sociales-info" id="documentacion">
    <div class="container">
        <div class="sociales-info__grid">
            <article class="sociales-panel">
                <header class="sociales-heading sociales-heading--left">
                    <h2 class="sociales-heading__title">Documentación a Presentar</h2>
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
                        <p>Los documentos deben ser legibles, vigentes y presentarse completos. Las copias ilegibles o vencidas no serán admitidas.</p>
                    </div>
                </aside>
            </article>

            <article class="sociales-panel">
                <header class="sociales-heading sociales-heading--left">
                    <h2 class="sociales-heading__title">Tipos de Becas UPRIT</h2>
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
