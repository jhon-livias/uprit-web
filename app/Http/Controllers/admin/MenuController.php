<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NavGroup;
use App\Models\NavLink;
use App\Services\WebNavigationCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.pages.menu.index');
    }

    public function getGroups()
    {
        $groups = NavGroup::with(['links' => fn ($q) => $q->orderBy('orden')])
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

    public function storeLink(Request $request)
    {
        $group = NavGroup::findOrFail($request->group_id);

        if (!$group->isEditableLinks()) {
            return response()->json(false);
        }

        $link = new NavLink();
        $link->group_id = $group->id;
        $link->label = $request->label;
        $link->route_name = $request->route_name ?: null;
        $link->url = $request->url ?: null;
        $link->external = filter_var($request->external, FILTER_VALIDATE_BOOLEAN);
        $link->visible = filter_var($request->visible ?? true, FILTER_VALIDATE_BOOLEAN);
        $link->visible_desktop = filter_var($request->visible_desktop ?? true, FILTER_VALIDATE_BOOLEAN);
        $link->visible_mobile = filter_var($request->visible_mobile ?? true, FILTER_VALIDATE_BOOLEAN);
        $link->orden = $request->orden ?? ((int) NavLink::where('group_id', $group->id)->max('orden') + 1);
        $link->save();

        WebNavigationCache::forget();

        return response()->json($link);
    }

    public function updateLink(Request $request)
    {
        $link = NavLink::findOrFail($request->id);
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
