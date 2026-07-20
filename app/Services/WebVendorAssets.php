<?php

namespace App\Services;

use Illuminate\Support\Facades\View;

class WebVendorAssets
{
    /** @var list<string> */
    private const HOME_ONLY = [
        'vivus',
        'parallax',
    ];

    /**
     * Vendors opcionales del theme (no usados en la mayoría de vistas UPRIT).
     *
     * @var array<string, array{css?: string, js?: list<string>}>
     */
    private const OPTIONAL = [
        'magnifypopup' => [
            'css' => 'web/assets/css/vendor/magnifypopup.min.css',
            'js' => ['web/assets/js/vendor/magnifypopup.min.js'],
        ],
        'odometer' => [
            'css' => 'web/assets/css/vendor/odometer.min.css',
            'js' => ['web/assets/js/vendor/odometer.min.js'],
        ],
        'lightbox' => [
            'css' => 'web/assets/css/vendor/lightbox.min.css',
            'js' => ['web/assets/js/vendor/lightbox.min.js'],
        ],
        'jquery_ui' => [
            'css' => 'web/assets/css/vendor/jqueru-ui-min.css',
            'js' => ['web/assets/js/vendor/jquery-ui.min.js'],
        ],
        'tipped' => [
            'css' => 'web/assets/css/vendor/tipped.min.css',
            'js' => ['web/assets/js/vendor/tipped.min.js'],
        ],
        'countdown' => [
            'js' => ['web/assets/js/vendor/jquery.countdown.min.js'],
        ],
        'isotope' => [
            'js' => [
                'web/assets/js/vendor/isotop.min.js',
                'web/assets/js/vendor/imageloaded.min.js',
            ],
        ],
        'svg_inject' => [
            'js' => ['web/assets/js/vendor/svg-inject.min.js'],
        ],
        'vivus' => [
            'js' => ['web/assets/js/vendor/vivus.min.js'],
        ],
        'parallax' => [
            'js' => [
                'web/assets/js/vendor/paralax.min.js',
                'web/assets/js/vendor/paralax-scroll.min.js',
            ],
        ],
    ];

    public static function registerComposer(): void
    {
        View::composer('web.layouts.principal', function ($view) {
            $view->with('webVendorAssets', self::resolve());
        });
    }

    /**
     * @return array{
     *     css: list<string>,
     *     js: list<string>,
     *     load_stubs: bool,
     *     enabled_keys: list<string>
     * }
     */
    public static function resolve(): array
    {
        $enabled = self::enabledKeys();

        return [
            'css' => self::cssFiles($enabled),
            'js' => self::jsFiles($enabled),
            'load_stubs' => self::shouldLoadStubs($enabled),
            'enabled_keys' => $enabled,
        ];
    }

    /**
     * @return list<string>
     */
    public static function enabledKeys(): array
    {
        $route = request()->route()?->getName();
        $enabled = [];

        if ($route === 'web.index') {
            $enabled = self::HOME_ONLY;
        }

        return $enabled;
    }

    /**
     * @param list<string> $enabled
     * @return list<string>
     */
    public static function cssFiles(array $enabled): array
    {
        $files = [];

        foreach ($enabled as $key) {
            if (! empty(self::OPTIONAL[$key]['css'])) {
                $files[] = self::OPTIONAL[$key]['css'];
            }
        }

        return $files;
    }

    /**
     * @param list<string> $enabled
     * @return list<string>
     */
    public static function jsFiles(array $enabled): array
    {
        $files = [];

        foreach ($enabled as $key) {
            foreach (self::OPTIONAL[$key]['js'] ?? [] as $js) {
                $files[] = $js;
            }
        }

        return $files;
    }

    /**
     * @param list<string> $enabled
     */
    public static function shouldLoadStubs(array $enabled): bool
    {
        return count(array_diff(array_keys(self::OPTIONAL), $enabled)) > 0;
    }
}
