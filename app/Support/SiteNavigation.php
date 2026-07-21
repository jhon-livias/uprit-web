<?php

namespace App\Support;

class SiteNavigation
{
    public static function routeConfig(?string $routeKey): array
    {
        if ($routeKey === null) {
            return [];
        }

        $routes = config('breadcrumbs.routes', []);

        return $routes[$routeKey] ?? [];
    }

    public static function label(string $routeKey): string
    {
        $route = self::routeConfig($routeKey);

        return $route['menu_label'] ?? $route['title'] ?? $routeKey;
    }

    public static function title(string $routeKey): string
    {
        $route = self::routeConfig($routeKey);

        return $route['title'] ?? $route['menu_label'] ?? $routeKey;
    }

    /**
     * @param  array{title?: string, parent?: array, routeParams?: array, url?: string}  $overrides
     * @return array{title: string, parent: ?array, currentUrl: string}
     */
    public static function breadcrumb(?string $routeKey = null, array $overrides = []): array
    {
        $routeKey = $routeKey ?? request()->route()?->getName();
        $config = self::routeConfig($routeKey);
        $routeParams = $overrides['routeParams'] ?? [];

        if (isset($overrides['url'])) {
            $currentUrl = $overrides['url'];
        } elseif (!empty($config['url'])) {
            $currentUrl = url($config['url']);
        } elseif ($routeKey) {
            $currentUrl = route($routeKey, $routeParams);
        } else {
            $currentUrl = '#';
        }

        return [
            'title' => $overrides['title'] ?? ($routeKey ? self::title($routeKey) : ''),
            'parent' => $overrides['parent'] ?? ($config['parent'] ?? null),
            'currentUrl' => $currentUrl,
        ];
    }

    public static function sectionForRoute(?string $routeName): ?string
    {
        if ($routeName === null) {
            return null;
        }

        foreach (config('breadcrumbs.sections', []) as $key => $section) {
            foreach (self::sectionEntries($section) as $entry) {
                if (($entry['route'] ?? null) === $routeName) {
                    return $key;
                }
            }
        }

        return null;
    }

    public static function sectionItems(string $section, bool $routesOnly = false): array
    {
        $sectionConfig = config('breadcrumbs.sections.' . $section, []);
        $items = [];

        foreach (self::sectionEntries($sectionConfig) as $entry) {
            if (isset($entry['route'])) {
                $routeKey = $entry['route'];
                $items[] = [
                    'label' => $entry['label'] ?? self::label($routeKey),
                    'url' => route($routeKey),
                    'external' => false,
                ];

                continue;
            }

            if ($routesOnly) {
                continue;
            }

            $items[] = [
                'label' => $entry['label'],
                'url' => $entry['url'] ?? '#',
                'external' => (bool) ($entry['external'] ?? false),
            ];
        }

        return $items;
    }

    private static function sectionEntries(array $section): array
    {
        if (!empty($section['items'])) {
            return $section['items'];
        }

        return array_map(
            static fn (string $routeKey) => ['route' => $routeKey],
            $section['routes'] ?? []
        );
    }
}
