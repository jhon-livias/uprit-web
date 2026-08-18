<?php

/**
 * Estados del kanban (import_id => estado) — bloque Dirección de Investigación (#28–#80).
 * Actualizar tras revisar implementación en staging.
 */
return [
    'rechazado' => [28, 29, 47],
    'hecho' => [
        30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42,
        43, 44, 45, 46,
        48, 49, 50, 51, 55, 56, 57, 58, 59, 60, 61,
        69, 70, 71, 76, 77, 78, 79, 80,
    ],
    'en_revision' => [33, 52, 53, 54, 62, 63, 72, 73, 74, 75],
    'pendiente' => [64, 65, 66, 67, 68],
];
