<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Categoria;
use App\Models\CarreraDescripcion;
use App\Models\CarreraPregunta;
use App\Models\CarreraMalla;
use App\Models\CarreraPerfilEgresado;
use App\Models\CarreraDocente;


class CarreraController extends Controller
{
    //
    public function getCarrera()
    {
        $carreras = Carrera::with('categoria.nivelAcademico')->get()->sortBy('categoria.nivel_academico_id');
        $carreras->load('categoria.nivelAcademico', 'categoria.padre', 'preguntas', 'docentes', 'malla', 'detalle_descripcion', 'perfilEgresado');
        return response()->json($carreras);
    }
    public function index()
    {
        $carreras = Carrera::with('categoria.nivelAcademico')->get()->sortBy('categoria.nivel_academico_id');
        $categorias = Categoria::orderby('nivel_academico_id', 'asc')->get();
        return view('admin.pages.carrera.index', compact('carreras', 'categorias'));
    }

    public function store(Request $request)
    {
        $carrera = new Carrera();
        $carrera->categoria_id = $request->categoria_id;
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->admision = $request->admision;
        $carrera->duracion = $request->duracion;
        $carrera->grado_obtenido = $request->grado_obtenido;
        $carrera->titulacion = $request->titulacion;
        $carrera->modalidades = $request->modalidades;
        if ($request->hasFile('brochure')) {
            $file = $request->file('brochure');
            $nameimg = 'brochure_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/brochures_carreras/';
            $file->move($path, $nameimg);
            $carrera->brochure = $nameimg;
        }
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nameimg = 'imagen_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/brochures_imagenes/';
            $file->move($path, $nameimg);
            $carrera->imagen = $nameimg;
        }
        $carrera->save();
        return response()->json(true);
    }

    public function update(Request $request)
    {
        $carrera = Carrera::find($request->id);
        $carrera->categoria_id = $request->categoria_id;
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->admision = $request->admision;
        $carrera->duracion = $request->duracion;
        $carrera->grado_obtenido = $request->grado_obtenido;
        $carrera->titulacion = $request->titulacion;
        $carrera->modalidades = $request->modalidades;
        if ($request->hasFile('brochure')) {
            if ($carrera->brochure) {
                $oldFilePath = public_path() . '/brochures_carreras/' . $carrera->brochure;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('brochure');
            $nameimg = 'brochure_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/brochures_carreras/';
            $file->move($path, $nameimg);
            $carrera->brochure = $nameimg;
        }
        if ($request->hasFile('imagen')) {
            if ($carrera->imagen) {
                $oldFilePath = public_path() . '/brochures_imagenes/' . $carrera->imagen;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('imagen');
            $nameimg = 'imagen_' . time() . rand(1, 200) . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/brochures_imagenes/';
            $file->move($path, $nameimg);
            $carrera->imagen = $nameimg;
        }


        $carrera->save();
        return response()->json(true);
    }

    public function delete($id)
    {
        $carrera = Carrera::find($id);
        if ($carrera->brochure) {
            $oldFilePath = public_path() . '/brochures_carreras/' . $carrera->brochure;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $carrera->delete();

        return response()->json(true);
    }


    public function storeDescipcion(Request $request)
    {

        $carrera_descripcion = CarreraDescripcion::where('carrera_id', $request->carrera_id)->first();
        if (isset($carrera_descripcion)) {
            $carrera_descripcion->descripcion = $request->descripcion;
            $carrera_descripcion->oportunidades = json_decode($request->oportunidades, true);
        } else {
            $carrera_descripcion = new CarreraDescripcion();
            $carrera_descripcion->carrera_id = $request->carrera_id;
            $carrera_descripcion->descripcion = $request->descripcion;
            $carrera_descripcion->oportunidades = json_decode($request->oportunidades, true);
        }

        $carrera_descripcion->save();

        CarreraPregunta::where('carrera_id', $request->carrera_id)->delete();

        if ($request->pregunta && $request->respuesta) {

            foreach ($request->pregunta as $index => $pregunta) {

                if (
                    trim($pregunta) != '' ||
                    trim($request->respuesta[$index]) != ''
                ) {

                    $faq = new CarreraPregunta();

                    $faq->carrera_id = $request->carrera_id;
                    $faq->pregunta = $pregunta;
                    $faq->respuesta = $request->respuesta[$index];

                    $faq->save();
                }
            }
        }

        return response()->json(true);
    }

    public function storeMalla(Request $request)
    {

        CarreraMalla::where('carrera_id', $request->carrera_id)->delete();


        if ($request->ciclo) {

            foreach ($request->ciclo as $index => $ciclo) {

                if (
                    trim($ciclo) != '' ||
                    trim($request->descripcion[$index]) != ''
                ) {

                    $malla = new CarreraMalla();

                    $malla->carrera_id = $request->carrera_id;

                    $malla->ciclo = $ciclo;

                    $malla->descripcion = $request->descripcion[$index];

                    $malla->cursos = json_decode(
                        $request->cursos[$index] ?? '[]',
                        true
                    );

                    $malla->save();
                }
            }
        }

        return response()->json(true);
    }

    public function storePerfilEgresado(Request $request)
    {
        $carrera_perfil = CarreraPerfilEgresado::where('carrera_id', $request->carrera_id)->first();
        if (isset($carrera_perfil)) {
            $carrera_perfil->descripcion = $request->descripcion;
        } else {
            $carrera_perfil = new CarreraPerfilEgresado();
            $carrera_perfil->carrera_id = $request->carrera_id;
            $carrera_perfil->descripcion = $request->descripcion;
        }

        $carrera_perfil->save();

        return response()->json(true);
    }

    public function storeDocente(Request $request)
    {
        CarreraDocente::where('carrera_id', $request->carrera_id)->delete();


        if ($request->nombre) {

            foreach ($request->nombre as $index => $nombre) {

                if (trim($nombre) != '') {

                    $docente = new CarreraDocente();

                    $docente->carrera_id = $request->carrera_id;

                    $docente->nombre = $nombre;

                    $docente->correo = $request->correo[$index] ?? null;

                    $docente->departamento = $request->departamento[$index] ?? null;

                    $docente->descripcion = $request->descripcion[$index] ?? null;

                    $docente->linkedin = $request->linkedin[$index] ?? null;


                    $tags = json_decode(
                        $request->etiquetas_tags[$index] ?? '[]',
                        true
                    );

                    $tags = array_map(function ($tag) {
                        return $tag['value'];
                    }, $tags);

                    $docente->tags = $tags;

                    if ($request->hasFile("imagen_$index")) {
                        $imagen = $request->file("imagen_$index");

                        $nombreImagen =
                            time() . '_' . $imagen->getClientOriginalName();

                        $imagen->move(
                            public_path('carreras_docentes'),
                            $nombreImagen
                        );

                        $docente->imagen =
                            'carreras_docentes/' . $nombreImagen;
                    } else {
                        $docente->imagen =
                            $request->imagen_actual[$index] ?? null;
                    }


                    $docente->save();
                }
            }
        }

        return response()->json(true);
    }
}
