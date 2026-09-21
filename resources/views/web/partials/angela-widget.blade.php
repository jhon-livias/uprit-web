@php
    $angelaPhone = preg_replace('/\D+/', '', (string) config('whatsapp.phone', '51933248429'));
    $angelaMarker = (string) config('whatsapp.marker', 'WEB_UPRIT');
    $angelaCatalog = \App\Services\WebNavigationCache::angelaWidgetCatalog();
    $angelaAvatar = file_exists(public_path('admin/imagenes/perfil.jpg'))
        ? asset('admin/imagenes/perfil.jpg')
        : asset('web/imagenes/favicon.png');
@endphp

<button type="button" class="angela-fab" id="angelaFab" aria-label="Chatea con Angela, asesora de admisión" aria-expanded="false" aria-controls="angelaPanel">
    <iconify-icon icon="mdi:whatsapp" aria-hidden="true"></iconify-icon>
    <span class="angela-fab__pulse" aria-hidden="true"></span>
</button>

<div class="angela-panel" id="angelaPanel" hidden>
    <div class="angela-panel__header">
        <div class="angela-panel__identity">
            <div class="angela-panel__avatar">
                <img src="{{ $angelaAvatar }}" alt="">
            </div>
            <div>
                <p class="angela-panel__name">Angela</p>
                <p class="angela-panel__status"><span class="angela-panel__dot"></span> Admisión UPRIT · En línea</p>
            </div>
        </div>
        <button type="button" class="angela-panel__close" id="angelaPanelClose" aria-label="Cerrar chat">
            <iconify-icon icon="mdi:close" aria-hidden="true"></iconify-icon>
        </button>
    </div>

    <div class="angela-panel__body" id="angelaPanelBody"></div>
</div>

@push('after_app_scripts')
<script>
    window.UPRIT_ANGELA_WIDGET = {
        phone: @json($angelaPhone),
        marker: @json($angelaMarker),
        catalog: @json($angelaCatalog)
    };
</script>
<script src="{{ static_asset('web/assets/js/angela-widget.js') }}"></script>
@endpush
