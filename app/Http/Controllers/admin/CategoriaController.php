<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\NivelAcademico;

class CategoriaController extends Controller
{
    //
    public function index()
    {
        
        return view('admin.pages.categoria.index');
    }

    public function getCategoria(){
        $categorias = Categoria::orderby('nivel_academico_id', 'asc')->get();
        $categorias->load('nivelAcademico','padre','hijos','carreras');
        return response()->json($categorias);
    }


    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nivel_academico_id = $request->nivel_academico_id;
        $categoria->padre_id = $request->padre_id;
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()->json(true);
    }
    public function update(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $categoria->nivel_academico_id = $request->nivel_academico_id;
        $categoria->padre_id = $request->padre_id;
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()->json(true);
    }

    public function delete($id)
    {
        $categoria = Categoria::with(['hijos', 'carreras'])->findOrFail($id);

        if ($categoria->hijos->count() > 0) {
            return redirect()
                ->route('categorias.index')
                ->with('error_sub', 'ok');
        }

        if ($categoria->carreras->count() > 0) {
            return response()->json(false);
        }

        $categoria->delete();

        return response()->json(true);
    }
}
