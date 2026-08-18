@php
    $codigo = config('investigacion_contacto.codigo_etica_investigacion');
    $contacto = config('investigacion_contacto.direccion_investigacion');
    $whatsappUrl = 'https://wa.me/' . $contacto['whatsapp'] . '?text=' . rawurlencode($contacto['whatsapp_mensaje']);
@endphp

<div class="text-block investigacion-etica__codigo">
    <h3 class="title">{{ $codigo['titulo'] }}</h3>
    <p>{{ $codigo['descripcion'] }}</p>
    <a href="{{ $codigo['documento_url'] }}" class="edu-btn btn-medium investigacion-etica__btn" target="_blank" rel="noopener noreferrer">
        {{ $codigo['documento_label'] }}
        <i class="icon-4"></i>
    </a>
</div>

<div class="text-block investigacion-etica__contacto">
    <h3 class="title">Contacto</h3>
    <p>Para orientación o comunicación relacionada con aspectos éticos de la investigación, comuníquese directamente con la Dirección de Investigación:</p>
    <div class="investigacion-etica__contacto-card">
        <p class="investigacion-etica__contacto-label">{{ $contacto['etiqueta'] }}</p>
        <div class="investigacion-etica__contacto-actions">
            <a href="tel:{{ $contacto['telefono'] }}" class="investigacion-etica__contacto-link">
                {{ $contacto['telefono_display'] }}
            </a>
            <a href="{{ $whatsappUrl }}" class="investigacion-etica__contacto-whatsapp" target="_blank" rel="noopener noreferrer">
                WhatsApp
            </a>
        </div>
    </div>
</div>
