@php
    $contacto = config('investigacion_contacto.direccion_investigacion');
    $whatsappUrl = 'https://wa.me/' . $contacto['whatsapp'] . '?text=' . rawurlencode($contacto['whatsapp_mensaje']);
@endphp

<div class="text-block investigacion-etica__contacto">
    <h3 class="title">Contacto</h3>
    <p>Para orientación o comunicación con la Dirección de Investigación, utilice los siguientes medios oficiales:</p>
    <div class="investigacion-etica__contacto-card">
        <p class="investigacion-etica__contacto-label">{{ $contacto['etiqueta'] }}</p>
        <div class="investigacion-etica__contacto-actions">
            <a href="tel:{{ $contacto['telefono'] }}" class="investigacion-etica__contacto-link">
                {{ $contacto['telefono_display'] }}
            </a>
            @if (!empty($contacto['email']))
                <a href="mailto:{{ $contacto['email'] }}" class="investigacion-etica__contacto-email">
                    {{ $contacto['email'] }}
                </a>
            @endif
            <a href="{{ $whatsappUrl }}" class="investigacion-etica__contacto-whatsapp" target="_blank" rel="noopener noreferrer">
                WhatsApp
            </a>
        </div>
    </div>
</div>
