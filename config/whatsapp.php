<?php

return [
    /*
    | Número institucional de Angela (WhatsApp Business).
    | El widget de la web abre wa.me con un mensaje marcado WEB_UPRIT.
    */
    'phone' => env('WHATSAPP_ADMISSION_PHONE', '51933248429'),

    /** Marcador que el backend de Angela reconoce para no reiniciar el menú. */
    'marker' => 'WEB_UPRIT',
];
