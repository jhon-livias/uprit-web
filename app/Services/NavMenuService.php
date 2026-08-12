<?php

namespace App\Services;

use App\Models\NavGroup;
use App\Models\NavLink;
use App\Support\SiteNavigation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

class NavMenuService
{
    public const CONTEXT_DESKTOP = 'desktop';

    public const CONTEXT_MOBILE = 'mobile';

    /**
     * @return Collection<int, NavGroup>
     */
    public static function mainNavGroups(string $context = self::CONTEXT_DESKTOP): Collection
    {
        return NavGroup::query()
            ->where('show_in_main_nav', true)
            ->where('visible', true)
            ->when(
                $context === self::CONTEXT_DESKTOP,
                fn ($q) => $q->where('visible_desktop', true),
                fn ($q) => $q->where('visible_mobile', true)
            )
            ->orderBy('orden')
            ->get();
    }

    /**
     * @return Collection<int, NavGroup>
     */
    public static function topbarGroups(string $context = self::CONTEXT_DESKTOP): Collection
    {
        return NavGroup::query()
            ->where('show_in_topbar', true)
            ->where('visible', true)
            ->when(
                $context === self::CONTEXT_DESKTOP,
                fn ($q) => $q->where('visible_desktop', true),
                fn ($q) => $q->where('visible_mobile', true)
            )
            ->orderBy('orden')
            ->get();
    }

    public static function groupByKey(string $key): ?NavGroup
    {
        return NavGroup::query()->where('key', $key)->first();
    }

    /**
     * @return array<int, array{label: string, url: string, external: bool}>
     */
    public static function linksForGroupKey(string $key, string $context = self::CONTEXT_DESKTOP, bool $routesOnly = false): array
    {
        $group = self::groupByKey($key);

        if (!$group || !$group->visible) {
            return [];
        }

        return self::formatLinks(
            self::visibleLinksQuery($group->id, $context)->get(),
            $routesOnly
        );
    }

    /**
     * @return array<int, array{label: string, url: string, external: bool}>
     */
    public static function formatLinks(Collection $links, bool $routesOnly = false): array
    {
        $items = [];

        foreach ($links as $link) {
            if ($routesOnly && !$link->route_name) {
                continue;
            }

            $url = self::resolveUrl($link);

            if ($url === null) {
                continue;
            }

            $items[] = [
                'label' => $link->label,
                'url' => $url,
                'external' => (bool) $link->external,
            ];
        }

        return $items;
    }

    public static function resolveUrl(NavLink $link): ?string
    {
        if ($link->route_name) {
            if (!Route::has($link->route_name)) {
                return null;
            }

            return route($link->route_name);
        }

        if ($link->url === null || $link->url === '') {
            return null;
        }

        if ($link->external || str_starts_with($link->url, 'http://') || str_starts_with($link->url, 'https://')) {
            return $link->url;
        }

        return url($link->url);
    }

    public static function topbarUrl(NavGroup $group): ?string
    {
        if ($group->tipo === 'platform') {
            return null;
        }

        $link = self::visibleLinksQuery($group->id, self::CONTEXT_DESKTOP)->first();

        if ($link) {
            return self::resolveUrl($link);
        }

        $routeName = $group->meta['route_name'] ?? null;

        if ($routeName && Route::has($routeName)) {
            return route($routeName);
        }

        return null;
    }

    public static function routesOnlyForGroup(NavGroup $group): bool
    {
        return (bool) ($group->meta['routes_only'] ?? true);
    }

    public static function informesLabel(NavGroup $group): string
    {
        return $group->meta['informes_label'] ?? 'Infórmate Más';
    }

    /**
     * @param  NavGroup|object|null  $group
     * @return array<int, array{key: string, label: string, column_title: ?string, column_url: ?string, stacked: bool}>
     */
    public static function serviciosTabDefinitions(object|null $group = null): array
    {
        $tabs = config('breadcrumbs.sections.servicios.tabs', []);
        $metaLabels = $group instanceof NavGroup ? ($group->meta['tab_labels'] ?? []) : [];
        $definitions = [];

        foreach ($tabs as $key => $tab) {
            $columnRoute = $tab['column_route'] ?? null;
            $columnUrl = $columnRoute && Route::has($columnRoute) ? route($columnRoute) : null;

            $definitions[] = [
                'key' => $key,
                'label' => $metaLabels[$key] ?? $tab['label'] ?? $key,
                'column_title' => $tab['column_title'] ?? null,
                'column_url' => $columnUrl,
                'stacked' => (bool) ($tab['stacked'] ?? false),
            ];
        }

        return $definitions;
    }

    /**
     * @return array<int, array{label: string, url: string, external: bool, column_title: ?string}>
     */
    public static function serviciosTabItems(string $tabKey, string $context = self::CONTEXT_DESKTOP): array
    {
        $tabConfig = config("breadcrumbs.sections.servicios.tabs.{$tabKey}");

        if (!$tabConfig) {
            return [];
        }

        $dbLabels = self::serviciosRouteLabels($context);

        if (!empty($tabConfig['items'])) {
            $items = [];

            foreach ($tabConfig['items'] as $entry) {
                $item = self::resolveServiciosEntry($entry, $dbLabels);

                if ($item !== null) {
                    $items[] = $item;
                }
            }

            return $items;
        }

        $items = [];

        foreach ($tabConfig['routes'] ?? [] as $routeKey) {
            $label = $dbLabels[$routeKey] ?? SiteNavigation::label($routeKey);

            if (!Route::has($routeKey)) {
                continue;
            }

            $items[] = [
                'label' => $label,
                'url' => route($routeKey),
                'external' => false,
                'column_title' => $label,
            ];
        }

        return $items;
    }

    /**
     * @return array<string, string>
     */
    private static function serviciosRouteLabels(string $context): array
    {
        $group = self::groupByKey('servicios');

        if (!$group || !$group->visible) {
            return [];
        }

        $labels = [];

        foreach (self::visibleLinksQuery($group->id, $context)->get() as $link) {
            if ($link->route_name) {
                $labels[$link->route_name] = $link->label;
            }
        }

        return $labels;
    }

    /**
     * @param  array<string, mixed>  $entry
     * @param  array<string, string>  $dbLabels
     * @return array{label: string, url: string, external: bool, column_title: ?string}|null
     */
    private static function resolveServiciosEntry(array $entry, array $dbLabels): ?array
    {
        $routeKey = $entry['route'] ?? null;

        if ($routeKey) {
            if (!Route::has($routeKey)) {
                return null;
            }

            $label = $entry['label'] ?? $dbLabels[$routeKey] ?? SiteNavigation::label($routeKey);

            return [
                'label' => $label,
                'url' => route($routeKey),
                'external' => false,
                'column_title' => $entry['column_title'] ?? null,
            ];
        }

        $url = $entry['url'] ?? null;

        if ($url === null || $url === '' || $url === '#') {
            return null;
        }

        return [
            'label' => $entry['label'] ?? $url,
            'url' => $url,
            'external' => (bool) ($entry['external'] ?? false),
            'column_title' => $entry['column_title'] ?? null,
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder<NavLink>
     */
    private static function visibleLinksQuery(int $groupId, string $context)
    {
        return NavLink::query()
            ->where('group_id', $groupId)
            ->whereNull('parent_id')
            ->where('visible', true)
            ->when(
                $context === self::CONTEXT_DESKTOP,
                fn ($q) => $q->where('visible_desktop', true),
                fn ($q) => $q->where('visible_mobile', true)
            )
            ->orderBy('orden');
    }
}
