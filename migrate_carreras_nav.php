<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    return strtolower($text);
}

// 1. Populate Pregrado
$pregradoGroupId = DB::table('nav_groups')->where('key', 'pregrado')->value('id');

if ($pregradoGroupId) {
    // Delete existing links for Pregrado to avoid duplicates during migration
    DB::table('nav_links')->where('group_id', $pregradoGroupId)->delete();

    // Get Pregrado (3) and Pregrado Puede (4) categories that have NO parent
    $facultades = DB::table('categorias')
        ->whereIn('nivel_academico_id', [3, 4])
        ->whereNull('padre_id')
        ->orderBy('nombre')
        ->get();

    $ordenTab = 1;
    // Map to keep track of created tabs to merge Pregrado and Pregrado Puede under same name
    $createdTabs = [];

    foreach ($facultades as $facultad) {
        $tabName = $facultad->nombre;
        
        if (!isset($createdTabs[$tabName])) {
            $tabId = DB::table('nav_links')->insertGetId([
                'group_id' => $pregradoGroupId,
                'parent_id' => null,
                'label' => $tabName,
                'orden' => $ordenTab++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $createdTabs[$tabName] = $tabId;
        } else {
            $tabId = $createdTabs[$tabName];
        }

        // Get Carreras for this category
        $carreras = DB::table('carreras')
            ->where('categoria_id', $facultad->id)
            ->orderBy('nombre')
            ->get();

        $ordenLink = 1;
        foreach ($carreras as $carrera) {
            DB::table('nav_links')->insert([
                'group_id' => $pregradoGroupId,
                'parent_id' => $tabId,
                'label' => $carrera->nombre,
                'url' => '/carreras/' . $carrera->id . '-' . slugify($carrera->nombre),
                'orden' => $ordenLink++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// 2. Populate Posgrado
$posgradoGroupId = DB::table('nav_groups')->where('key', 'posgrado')->value('id');

if ($posgradoGroupId) {
    // We will NOT delete existing Posgrado links, because the user manually added "Presentación General" and "Misión".
    // We will just fetch the maximum order and append.
    $ordenTab = DB::table('nav_links')->where('group_id', $posgradoGroupId)->whereNull('parent_id')->max('orden') + 1;

    // Get Posgrado (5) categories that have NO parent (e.g. Maestrías, Doctorados, Diplomados)
    $tiposPosgrado = DB::table('categorias')
        ->where('nivel_academico_id', 5)
        ->whereNull('padre_id')
        ->orderBy('nombre')
        ->get();

    foreach ($tiposPosgrado as $tipo) {
        $tabId = DB::table('nav_links')->insertGetId([
            'group_id' => $posgradoGroupId,
            'parent_id' => null,
            'label' => $tipo->nombre,
            'orden' => $ordenTab++,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Posgrado careers are usually in subcategories (e.g. Posgrado Derecho)
        $subcategorias = DB::table('categorias')->where('padre_id', $tipo->id)->pluck('id');
        
        $catIds = $subcategorias->push($tipo->id)->toArray();

        $carreras = DB::table('carreras')
            ->whereIn('categoria_id', $catIds)
            ->orderBy('nombre')
            ->get();

        $ordenLink = 1;
        foreach ($carreras as $carrera) {
            DB::table('nav_links')->insert([
                'group_id' => $posgradoGroupId,
                'parent_id' => $tabId,
                'label' => $carrera->nombre,
                'url' => '/carreras/' . $carrera->id . '-' . slugify($carrera->nombre),
                'orden' => $ordenLink++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

echo "Migrated Pregrado and Posgrado careers to nav_links successfully.\n";
