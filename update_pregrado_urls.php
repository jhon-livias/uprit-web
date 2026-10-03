<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// 1. Drop the UNIQUE index on slug
try {
    DB::statement('ALTER TABLE carreras DROP INDEX slug');
    echo "Dropped UNIQUE index on slug.\n";
} catch (\Exception $e) {
    echo "Index might not exist or already dropped: " . $e->getMessage() . "\n";
}

// 2. Remove '-puede' from all slugs
$carreras = DB::table('carreras')->where('slug', 'LIKE', '%-puede')->get();
foreach ($carreras as $c) {
    $cleanSlug = str_replace('-puede', '', $c->slug);
    DB::table('carreras')->where('id', $c->id)->update(['slug' => $cleanSlug]);
}
echo "Cleaned '-puede' from slugs.\n";

// 3. Rebuild nav_links URLs for Pregrado and Segunda Especialidad
$navLinks = DB::table('nav_links')
    ->where(function($q) {
        $q->where('url', 'LIKE', '/pregrado/%')
          ->orWhere('url', 'LIKE', '/segunda-especialidad/%');
    })
    ->get();

foreach ($navLinks as $link) {
    // If it's already using the new structure, skip (e.g. /pregrado/pregrado-regular/...)
    if (preg_match('/^\/pregrado\/(pregrado-regular|pregrado-puede|segunda-especialidad)\/.+$/', $link->url)) {
        continue;
    }

    // Extract the slug (might have -puede or might not)
    $slug = basename($link->url);
    $cleanSlug = str_replace('-puede', '', $slug);

    // We must find the correct Carrera and determine its modality
    // Since there can be multiple careers with the same slug now, we need to find the one that corresponds
    // to the category it's in. Wait! We don't have the category in nav_links!
    // But we know that if the old url was /pregrado/xxx-puede, it was pregrado-puede!
    // If it was /segunda-especialidad/xxx, it was segunda-especialidad!
    // If it was /pregrado/xxx (without puede), it was pregrado-regular!
    
    $modalidad = '';
    if (str_starts_with($link->url, '/segunda-especialidad/')) {
        $modalidad = 'segunda-especialidad';
    } elseif (str_ends_with($slug, '-puede')) {
        $modalidad = 'pregrado-puede';
    } else {
        $modalidad = 'pregrado-regular';
    }
    
    $newUrl = '/pregrado/' . $modalidad . '/' . $cleanSlug;
    DB::table('nav_links')->where('id', $link->id)->update(['url' => $newUrl]);
}
echo "Updated nav_links URLs.\n";
