<?php

test('separa viñetas con punto medio en intro y lista', function () {
    $texto = 'El egresado será capaz de: • Diseña procesos flexibles. • Gestiona proyectos productivos. • Domina herramientas digitales.';

    $bloques = perfil_egresado_bloques($texto);

    expect($bloques)->toHaveCount(2)
        ->and($bloques[0])->toMatchArray([
            'type' => 'p',
            'text' => 'El egresado será capaz de:',
        ])
        ->and($bloques[1]['type'])->toBe('ul')
        ->and($bloques[1]['items'])->toBe([
            'Diseña procesos flexibles.',
            'Gestiona proyectos productivos.',
            'Domina herramientas digitales.',
        ]);
});

test('separa listas con guion tras dos puntos', function () {
    $texto = 'El egresado tendrá habilidades para: - Analizar mercados. - Gestionar operaciones. - Liderar equipos.';

    $bloques = perfil_egresado_bloques($texto);

    expect($bloques[0]['text'])->toBe('El egresado tendrá habilidades para:')
        ->and($bloques[1]['items'])->toBe([
            'Analizar mercados.',
            'Gestionar operaciones.',
            'Liderar equipos.',
        ]);
});

test('mantiene párrafos sin viñetas', function () {
    $texto = 'El egresado es un profesional íntegro, humanista y ético.';

    expect(perfil_egresado_bloques($texto))->toBe([
        ['type' => 'p', 'text' => $texto],
    ]);
});
