<?php

namespace App\Console\Commands;

use App\Models\NavGroup;
use App\Models\NavLink;
use App\Services\WebNavigationCache;
use Illuminate\Console\Command;

class UnifyPregradoNav extends Command
{
    protected $signature = 'nav:unify-pregrado';

    protected $description = 'Unifica Pregrado y Pregrado Puede en un solo ítem de menú';

    public function handle(): int
    {
        $pregrado = NavGroup::where('key', 'pregrado')->first();
        $puede = NavGroup::where('key', 'pregrado_puede')->first();

        if (!$pregrado) {
            $this->error('No existe el grupo pregrado. Ejecuta nav:import-legacy primero.');

            return self::FAILURE;
        }

        $pregrado->informes_key = null;
        $pregrado->css_class = 'mega-pregrado';
        $pregrado->meta = array_merge($pregrado->meta ?? [], [
            'tab_regular_label' => 'Pregrado Regular',
            'tab_puede_label' => 'Pregrado Puede',
            'tab_puede_hint' => 'Para personas que trabajan',
        ]);
        $pregrado->save();

        if ($puede) {
            $puede->show_in_main_nav = false;
            $puede->informes_key = null;
            $puede->save();

            NavLink::where('group_id', $puede->id)
                ->where('url', '#')
                ->update(['visible' => false, 'visible_mobile' => false]);
        }

        WebNavigationCache::forget();
        $this->info('Menú Pregrado unificado. Pregrado Puede oculto del nav principal.');

        return self::SUCCESS;
    }
}
