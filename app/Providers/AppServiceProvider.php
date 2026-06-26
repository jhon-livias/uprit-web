<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Categoria;
use App\Models\NivelAcademico;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $nivelAcademico = NivelAcademico::all();
        $pregrado = Categoria::with([
            'hijos',
            'carreras',
            'carreras.detalle_descripcion',
            'carreras.perfilEgresado',
            'carreras.docentes',
            'carreras.malla',
            'carreras.preguntas'
        ])
            ->whereHas('nivelAcademico', function ($q) {
                $q->where('nombre', 'Pregrado');
            })
            ->whereNull('padre_id')
            ->get();

        $pregradoPuede = Categoria::with([
            'hijos',
            'carreras',
            'carreras.detalle_descripcion',
            'carreras.perfilEgresado',
            'carreras.docentes',
            'carreras.malla',
            'carreras.preguntas'
        ])
            ->whereHas('nivelAcademico', function ($q) {
                $q->where('nombre', 'Pregrado Puede');
            })
            ->whereNull('padre_id')
            ->get();

        $posgrado = Categoria::with([
            'hijos.carreras',
            'hijos.carreras.detalle_descripcion',
            'hijos.carreras.perfilEgresado',
            'hijos.carreras.docentes',
            'hijos.carreras.malla',
            'hijos.carreras.preguntas'
        ])
            ->whereHas('nivelAcademico', function ($q) {
                $q->where('nombre', 'Posgrado');
            })
            ->whereNull('padre_id')
            ->get();

        View::share([
            'pregradoCategorias' => $pregrado,
            'pregradoPuedeCategorias' => $pregradoPuede,
            'posgradoCategorias' => $posgrado,
            'nivelAcademico' => $nivelAcademico
        ]);
    }
}
