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
