<?php

/**
 * Estados del kanban (import_id => estado) — Jovana Bracamonte / Bienestar-RSU (#21–#27).
 * Deploy staging 2026-08-18: contenido y enlaces implementados; pendiente validación institucional y multimedia.
 * Tras cierre con Bienestar: ajustar estados y ejecutar observaciones:sync-bienestar-estados.
 */
return [
    'en_revision' => [
        21, // Servicios sociales y diversidad — página y responsable
        22, // Hub bienestar-universitario-rsu
        25, // Deportes — copy, docentes/horarios, Google Form
        27, // RSU — responsable, teléfono, encabezado
    ],
    'en_progreso' => [
        23, // Psicopedagógico — falta sistema de reserva de citas (decisión pendiente)
        24, // Salud — falta flyer/flujograma y definición seguros legacy
        26, // Artísticas — FAQ listo; falta multimedia y confirmación de forms
    ],
    'pendiente' => [],
    'hecho' => [],
    'rechazado' => [],
];
