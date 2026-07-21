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
