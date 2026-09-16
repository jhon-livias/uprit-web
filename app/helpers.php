<?php

if (! function_exists('static_asset')) {
    /**
     * URL de asset estático con cache busting (?v=) para evitar CSS/JS obsoletos en CDN.
     */
    function static_asset(string $path): string
    {
        $normalized = ltrim(str_replace('\\', '/', $path), '/');
        $fullPath = public_path($normalized);

        if (is_file($fullPath)) {
            $version = (string) filemtime($fullPath);
        } else {
            $version = (string) config('app.asset_version', '1');
        }

        return asset($normalized) . '?v=' . $version;
    }
}

if (! function_exists('modalidad_oficial')) {
    /**
     * Normaliza la nomenclatura institucional de modalidad (p. ej. Virtual → A Distancia).
     */
    function modalidad_oficial(?string $modalidad): ?string
    {
        if ($modalidad === null) {
            return null;
        }

        $modalidad = trim($modalidad);

        if ($modalidad === '') {
            return null;
        }

        if (str_contains($modalidad, ':')) {
            [$etiqueta, $valor] = explode(':', $modalidad, 2);

            return trim($etiqueta) . ': ' . modalidad_oficial(trim($valor));
        }

        return preg_replace('/\bVirtual\b/u', 'A Distancia', $modalidad) ?? $modalidad;
    }
}

if (! function_exists('modalidades_oficiales')) {
    /**
     * @return list<string>
     */
    function modalidades_oficiales(?string $raw): array
    {
        if ($raw === null || trim($raw) === '') {
            return [];
        }

        $lineas = preg_split('/\R+/', trim($raw)) ?: [];

        return array_values(array_filter(array_map(
            static fn (string $linea) => modalidad_oficial(trim($linea)),
            $lineas
        )));
    }
}

if (! function_exists('perfil_egresado_bloques')) {
    /**
     * Separa el perfil de egresado en párrafos y viñetas para no mostrarlas amontonadas.
     *
     * @return list<array{type: 'p', text: string}|array{type: 'ul', items: list<string>}>
     */
    function perfil_egresado_bloques(?string $texto): array
    {
        $texto = trim(preg_replace("/\r\n?/", "\n", (string) $texto) ?? '');

        if ($texto === '') {
            return [];
        }

        if (str_contains($texto, '•')) {
            return perfil_egresado_partir($texto, '/\s*•\s*/u');
        }

        $guiones = preg_match_all('/(?:^|\n|:)\s*[-–]\s*\S|(?<=\.)\s+[-–]\s*\S/u', $texto);

        if ($guiones >= 2) {
            return perfil_egresado_partir(
                $texto,
                '/(?:^|\n)\s*[-–]\s*|(?<=:)\s*[-–]\s*|(?<=\.)\s+[-–]\s*/u'
            );
        }

        $parrafos = preg_split('/\n{2,}/', $texto) ?: [$texto];

        return array_values(array_map(
            static fn (string $parrafo) => ['type' => 'p', 'text' => trim($parrafo)],
            array_filter(array_map('trim', $parrafos))
        ));
    }
}

if (! function_exists('perfil_egresado_partir')) {
    /**
     * @return list<array{type: 'p', text: string}|array{type: 'ul', items: list<string>}>
     */
    function perfil_egresado_partir(string $texto, string $patron): array
    {
        $partes = preg_split($patron, $texto) ?: [];
        $partes = array_values(array_filter(array_map('trim', $partes)));

        if ($partes === []) {
            return [['type' => 'p', 'text' => $texto]];
        }

        $empiezaConVineta = (bool) preg_match('/^\s*[-–•]/u', $texto);
        $intro = $empiezaConVineta ? '' : (string) array_shift($partes);
        $items = $partes;

        $bloques = [];

        if ($intro !== '') {
            $bloques[] = ['type' => 'p', 'text' => $intro];
        }

        if ($items !== []) {
            $bloques[] = ['type' => 'ul', 'items' => $items];
        }

        return $bloques !== [] ? $bloques : [['type' => 'p', 'text' => $texto]];
    }
}
