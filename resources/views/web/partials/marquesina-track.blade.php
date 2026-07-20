@php
    $marquesinaItems = [
        'Licenciamiento SUNEDU',
        'Bolsa de Trabajo',
        'Metodología L4P',
        'Certificados Blockchain',
        'Sistema STA',
        'Cátedra Rockstar',
        'Campus Ecológico',
        'Actitud Emprendedora',
        'Movilidad Internacional',
    ];
    $marquesinaIconClass = !empty($marquesinaIconHome) ? ' features-icon--home' : '';
@endphp
@foreach(array_merge($marquesinaItems, $marquesinaItems) as $item)
<span class="features-icon{{ $marquesinaIconClass }}" aria-hidden="true"></span>
<div class="feature-text">{{ $item }}</div>
@endforeach
