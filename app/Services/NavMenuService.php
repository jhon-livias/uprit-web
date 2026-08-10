<?php

namespace App\Services;

use App\Models\NavGroup;
use App\Models\NavLink;
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
