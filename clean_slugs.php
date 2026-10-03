<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$oldToNewSlugs = [];

// Step A: Pregrado Regular
$carrerasRegular = DB::table('carreras')->where('slug', 'REGEXP', '-[0-9]+$')->get();
foreach ($carrerasRegular as $c) {
    DB::table('carreras')->where('id', $c->id)->update(['slug' => $c->slug . '-temp']);
}

// Step B: Pregrado Puede
$categoriasPuede = DB::table('categorias')->where('nivel_academico_id', 3)->pluck('id');
$carrerasPuede = DB::table('carreras')->whereIn('categoria_id', $categoriasPuede)->get();
foreach ($carrerasPuede as $c) {
    $newSlug = Str::slug($c->nombre) . '-puede';
    $oldToNewSlugs[$c->slug] = $newSlug;
    DB::table('carreras')->where('id', $c->id)->update(['slug' => $newSlug]);
}

// Step C: Clean up Pregrado Regular
foreach ($carrerasRegular as $c) {
    $cleanSlug = Str::slug($c->nombre);
    $oldToNewSlugs[$c->slug] = $cleanSlug;
    DB::table('carreras')->where('id', $c->id)->update(['slug' => $cleanSlug]);
}

// Update nav_links
$navLinks = DB::table('nav_links')->whereNotNull('url')->get();
foreach ($navLinks as $link) {
    foreach ($oldToNewSlugs as $oldSlug => $newSlug) {
        if ($link->url === '/pregrado/' . $oldSlug || $link->url === '/posgrado/' . $oldSlug) {
            $newUrl = str_replace('/' . $oldSlug, '/' . $newSlug, $link->url);
            DB::table('nav_links')->where('id', $link->id)->update(['url' => $newUrl]);
            break;
        }
    }
}
echo "Slugs cleaned and nav_links updated.\n";
