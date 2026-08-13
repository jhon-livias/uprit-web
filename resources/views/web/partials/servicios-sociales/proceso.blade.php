@php
    $steps = [
        [
            'icon' => 'mdi:file-document-edit-outline',
            'title' => 'Presentación',
            'date' => 'Del 17 al 19 de agosto',
        ],
        [
            'icon' => 'mdi:email-arrow-up-outline',
            'title' => 'Recepción',
            'date' => 'Del 20 al 25 de agosto',
        ],
        [
            'icon' => 'mdi:clipboard-check-outline',
            'title' => 'Subsanación',
            'date' => '2 días para expedientes incompletos',
        ],
        [
            'icon' => 'mdi:magnify',
            'title' => 'Evaluación',
            'date' => 'Del 28 al 31 de agosto',
        ],
        [
            'icon' => 'mdi:shield-check-outline',
            'title' => 'Verificación',
            'date' => 'Del 28 de agosto al 1 de septiembre',
        ],
        [
            'icon' => 'mdi:clipboard-edit-outline',
            'title' => 'Cumplimiento',
            'date' => 'Del 1 al 5 de septiembre',
        ],
        [
            'icon' => 'mdi:file-chart-outline',
            'title' => 'Informe',
            'date' => 'Del 7 al 9 de septiembre',
        ],
        [
            'icon' => 'mdi:account-check-outline',
            'title' => 'Aprobación',
            'date' => 'Del 10 al 14 de septiembre',
        ],
        [
            'icon' => 'mdi:file-certificate-outline',
            'title' => 'Resolución',
            'date' => 'Del 18 al 20 de septiembre',
        ],
        [
            'icon' => 'mdi:email-seal-outline',
            'title' => 'Notificación',
            'date' => 'Del 19 al 22 de septiembre',
        ],
    ];
@endphp

<section class="sociales-proceso" id="proceso">
    <div class="container">
        <header class="sociales-proceso__header">
            <h2 class="sociales-proceso__title">
                Proceso de Solicitud de <span>Becas y Medias Becas</span>
            </h2>
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
            <a href="#documentacion" class="sociales-proceso__btn">
                Ver requisitos completos
                <iconify-icon icon="mdi:file-document-outline" aria-hidden="true"></iconify-icon>
            </a>
        </div>
    </div>
</section>
