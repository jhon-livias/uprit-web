<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NavGroup;
use App\Models\NavLink;
use App\Services\WebNavigationCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.pages.menu.index');
    }

    public function getGroups()
    {
        $groups = NavGroup::with(['links' => fn ($q) => $q->whereNull('parent_id')->with('children.children')->orderBy('orden')])
            ->orderBy('orden')
            ->get()
            ->map(fn (NavGroup $group) => $this->formatGroup($group));

        return response()->json($groups);
    }

    public function getRouteNames()
    {
        $routes = collect(Route::getRoutes())
            ->filter(fn ($route) => in_array('GET', $route->methods(), true) && $route->getName())
            ->map(fn ($route) => [
                'name' => $route->getName(),
                'uri' => $route->uri(),
            ])
            ->sortBy('name')
            ->values();

        return response()->json($routes);
    }

    public function updateGroup(Request $request)
    {
        $group = NavGroup::findOrFail($request->id);
        $group->label = $request->label;
        $group->visible = filter_var($request->visible, FILTER_VALIDATE_BOOLEAN);
        $group->visible_desktop = filter_var($request->visible_desktop, FILTER_VALIDATE_BOOLEAN);
        $group->visible_mobile = filter_var($request->visible_mobile, FILTER_VALIDATE_BOOLEAN);
        $group->orden = $request->orden ?? $group->orden;
        $group->css_class = $request->css_class ?: $group->css_class;
        $group->informes_key = $request->informes_key ?: null;

        if ($group->isEditableLinks() && $request->has('meta')) {
            $meta = $group->meta ?? [];
            $meta['routes_only'] = filter_var($request->input('meta.routes_only', true), FILTER_VALIDATE_BOOLEAN);
            $group->meta = $meta;
        }

        $group->save();
        WebNavigationCache::forget();

        return response()->json($this->formatGroup($group->load('links')));
    }

    public function storeTopbarGroup(Request $request)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'key' => ['nullable', 'string', 'max:64', 'unique:nav_groups,key'],
            'visible' => ['nullable', 'boolean'],
            'visible_desktop' => ['nullable', 'boolean'],
            'visible_mobile' => ['nullable', 'boolean'],
            'route_name' => ['nullable', 'string', 'max:128'],
            'url' => ['nullable', 'string', 'max:500'],
            'external' => ['nullable', 'boolean'],
        ]);
        $key = $data['key'] ?: Str::slug($data['label']);
        $key = Str::limit($key, 58, '');
        $baseKey = $key;
        $suffix = 2;
        while (NavGroup::where('key', $key)->exists()) $key = $baseKey . '-' . $suffix++;

        $group = NavGroup::create([
            'key' => $key,
            'label' => $data['label'],
            'tipo' => 'topbar',
            'show_in_main_nav' => false,
            'show_in_topbar' => true,
            'visible' => $request->boolean('visible', true),
            'visible_desktop' => $request->boolean('visible_desktop', true),
            'visible_mobile' => $request->boolean('visible_mobile', true),
            'orden' => (int) NavGroup::where('show_in_topbar', true)->max('orden') + 1,
        ]);
        if ($request->filled('route_name') || $request->filled('url')) {
            NavLink::create([
                'group_id' => $group->id,
                'label' => $group->label,
                'route_name' => $request->route_name ?: null,
                'url' => $request->url ?: null,
                'external' => $request->boolean('external'),
                'orden' => 1,
            ]);
        }
        WebNavigationCache::forget();
        return response()->json(true);
    }

    public function reorderGroups(Request $request)
    {
        $data = $request->validate(['ids' => ['required', 'array'], 'ids.*' => ['integer', 'distinct', 'exists:nav_groups,id']]);
        DB::transaction(fn () => collect($data['ids'])->each(fn ($id, $index) => NavGroup::whereKey($id)->update(['orden' => $index + 1])));
        WebNavigationCache::forget();
        return response()->json(true);
    }

    public function reorderLinks(Request $request)
    {
        $data = $request->validate(['ids' => ['required', 'array'], 'ids.*' => ['integer', 'distinct', 'exists:nav_links,id']]);
        DB::transaction(fn () => collect($data['ids'])->each(fn ($id, $index) => NavLink::whereKey($id)->update(['orden' => $index + 1])));
        WebNavigationCache::forget();
        return response()->json(true);
    }

    public function storeLink(Request $request)
    {
        $group = NavGroup::findOrFail($request->group_id);

        if (!$group->isEditableLinks()) {
            return response()->json(false);
        }

        $link = new NavLink();
        $link->group_id = $group->id;
        $link->parent_id = $request->parent_id ?: null;
        $link->label = $request->label;
        $link->route_name = $request->route_name ?: null;
        $link->url = $request->url ?: null;
        $link->external = filter_var($request->external, FILTER_VALIDATE_BOOLEAN);
        $link->visible = filter_var($request->visible ?? true, FILTER_VALIDATE_BOOLEAN);
        $link->visible_desktop = filter_var($request->visible_desktop ?? true, FILTER_VALIDATE_BOOLEAN);
        $link->visible_mobile = filter_var($request->visible_mobile ?? true, FILTER_VALIDATE_BOOLEAN);
        $link->orden = $request->orden ?? ((int) NavLink::where('group_id', $group->id)->where('parent_id', $link->parent_id)->max('orden') + 1);
        $link->save();

        WebNavigationCache::forget();

        return response()->json($link);
    }

    public function updateLink(Request $request)
    {
        $link = NavLink::findOrFail($request->id);
        $link->parent_id = $request->parent_id ?: null;
        $link->label = $request->label;
        $link->route_name = $request->route_name ?: null;
        $link->url = $request->url ?: null;
        $link->external = filter_var($request->external, FILTER_VALIDATE_BOOLEAN);
        $link->visible = filter_var($request->visible, FILTER_VALIDATE_BOOLEAN);
        $link->visible_desktop = filter_var($request->visible_desktop, FILTER_VALIDATE_BOOLEAN);
        $link->visible_mobile = filter_var($request->visible_mobile, FILTER_VALIDATE_BOOLEAN);
        $link->orden = $request->orden ?? $link->orden;
        $link->save();

        WebNavigationCache::forget();

        return response()->json($link);
    }

    public function deleteLink($id)
    {
        NavLink::findOrFail($id)->delete();
        WebNavigationCache::forget();

        return response()->json(true);
    }

    private function formatGroup(NavGroup $group): array
    {
        return [
            'id' => $group->id,
            'key' => $group->key,
            'label' => $group->label,
            'tipo' => $group->tipo,
            'academic_nivel' => $group->academic_nivel,
            'informes_key' => $group->informes_key,
            'css_class' => $group->css_class,
            'show_in_main_nav' => $group->show_in_main_nav,
            'show_in_topbar' => $group->show_in_topbar,
            'visible' => $group->visible,
            'visible_desktop' => $group->visible_desktop,
            'visible_mobile' => $group->visible_mobile,
            'orden' => $group->orden,
            'meta' => $group->meta ?? [],
            'links' => $group->links,
            'editable_links' => $group->isEditableLinks(),
            'is_academic' => $group->isAcademic(),
        ];
    }
}
